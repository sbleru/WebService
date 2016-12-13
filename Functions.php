<?php
class Functions extends Header
{
	// 親のコンストラクタを呼ぶ	
	function __construct() {
	    parent::__construct();
	}

	public function add_user($username, $email, $password){
		try {
	        $stmt = $this->pdo->prepare("INSERT INTO users(username, email, password, status) VALUES (?, ?, ?, ?)");

	        $stmt->execute(array($username, $email, password_hash($password, PASSWORD_DEFAULT), 'active'));  // パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
	        $userid = $this->pdo->lastInsertid();  // 登録した(DB側でauto_incrementした)IDを$useridに入れる

	        // ログイン時に使用するIDとパスワード
	        $this->set_message('登録が完了しました。あなたの登録IDは '. $userid. ' です。メールアドレスは　'.$email. '　です．パスワードは '. $password. ' です。');
	    } catch (PDOException $e) {
	    	$this->set_error('データベースエラー');
	        // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
	        echo $e->getMessage();
	    }
	}

	// TODO:staticじゃだめ？
	public function login($userid, $password){
		try {
			// ATTENTION:pdoには$this->でアクセス
	        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
	        $stmt->execute(array($userid));

	        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	            if (password_verify($password, $row['password'])) {
	                session_regenerate_id(true);

	                // 入力したIDのユーザー名を取得
	                $sql = "SELECT * FROM users WHERE id = ?";
	                $stmt->execute(array($userid));
	 
	                // TODO:これ必要か？
	                foreach ($stmt as $row) {
	                    $row['username'];  // ユーザー名
	                }
	                $_SESSION["USERID"] = $row['id'];
	                $_SESSION["USERNAME"] = $row['username'];
	                header("Location: Main.php");  // メイン画面へ遷移
	                exit();  // 処理終了
	            } else {
	                // 認証失敗	        
	                $this->set_error('ユーザーIDあるいはパスワードに誤りがあります。');
	            }
	        } else {
	            // 該当データなし
                $this->set_error('ユーザーIDあるいはパスワードに誤りがあります。');
	        }
	    } catch (PDOException $e) {
	    	$this->set_error('データベースエラー');
	        //$errorMessage = $sql;
	        // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
	        echo $e->getMessage();
	    }
	}

	// 投稿
	public function add_post($userid,$body){

		try {
			$stmt = $this->pdo->prepare('INSERT INTO posts (user_id, body, stamp) 
				VALUES (?, ?, ?)');
	        $stmt->execute(array($userid, htmlspecialchars($body, ENT_QUOTES, "UTF-8"), date("Y-m-d H:i:s")));
		} catch (Exception $e) {
			$this->set_error('データベースエラー');
			echo $e->getMessage();
		}
	}

	// フォローユーザの投稿メッセージ表示
	public function show_posts($userid,$limit=0){
		if ($userid > 0){
			$follow = array();

			try {
				$stmt = $this->pdo->prepare('SELECT user_id from following where follower_id=?');
		        $stmt->execute(array($userid));

		        // フォローしているユーザと自分のidを格納
		        foreach ($stmt as $row) {
		        	array_push($follow, $row['user_id']);
		        }
		        array_push($follow, $userid);
		        
		        // 
				if (count($follow)){
					$id_string = implode(',', $follow);
					$user_string = "($id_string)";
					$extra =  " and id in ($id_string)";
				}else{
					return array();
				}

				// 投稿数を制限
				if ($limit > 0){
					$extra = "limit $limit";
				}else{
					$extra = '';	
				}

			} catch (Exception $e) {
				$this->set_error('データベースエラー');
				echo $e->getMessage();
			}
		}

		$users = array();
		try {
			$stmt = $this->pdo->prepare("SELECT user_id, body, stamp FROM posts WHERE user_id in $user_string order by stamp desc $extra");
	        $stmt->execute();

	        foreach ($stmt as $row) {
	        	$posts[] = array( 	'stamp' => $row['stamp'], 
									'userid' => $row['user_id'], 
									'body' => $row['body']
							);
	        }

	        return $posts;

	    } catch (Exception $e){
	    	$this->set_error('データベースエラー');
			echo $e->getMessage();
	    }
	}


	public function show_all_users($user_id=0){

		$users = array();

		try {
			$stmt = $this->pdo->prepare('SELECT id, username from users where status=? order by username');
	        $stmt->execute(array('active'));

	        // idに対応させてユーザ名を保存する
	        foreach ($stmt as $row) {
	        	$users[$row['id']] = $row['username'];
	        }

	        return $users;

		} catch (Exception $e) {
			$this->set_error('データベースエラー');
			echo $e->getMessage();
		}

		return $users;
	}

	public function show_users($user_id=0){

		if ($user_id > 0){
			$follow = array();

			try {
				$stmt = $this->pdo->prepare('SELECT user_id from following where follower_id=?');
		        $stmt->execute(array($user_id));

		        foreach ($stmt as $row) {
		        	array_push($follow, $row['user_id']);
		        }
		        
				if (count($follow)){
					$id_string = implode(',', $follow);
					$extra =  " and id in ($id_string)";
				}else{
					return array();
				}

			} catch (Exception $e) {
				$this->set_error('データベースエラー');
				echo $e->getMessage();
			}

		}

		$users = array();
		try {
			$stmt = $this->pdo->prepare("SELECT id, username FROM users WHERE status=? $extra order by username");
	        $stmt->execute(array('active'));

	    	foreach ($stmt as $row) {
	        	$users[$row['id']] = $row['username'];
	        }

	    } catch (Exception $e){
	    	$this->set_error('データベースエラー');
			echo $e->getMessage();
	    }

		return $users;
	}


	public function following($userid){

		$users = array();

		try {
			// 重複を省いてユーザIDを得る
			$stmt = $this->pdo->prepare('SELECT distinct user_id FROM following
				WHERE follower_id = ?');
	        $stmt->execute(array($userid));

	        // 
	        foreach ($stmt as $row) {
	        	// 配列$usersに値$row['user_id']をスタックさせる
	        	array_push($users, $row['user_id']);
	        }

	        return $users;

		} catch (Exception $e) {
			$this->set_error('データベースエラー');
			echo $e->getMessage();
		}	
	}

	// 自分$firstが誰か$secondをフォローしているかどうか，フォローテーブルに列があるかカウント
	private function check_count($first, $second){

		try {
			$stmt = $this->pdo->prepare('SELECT count(*) FROM following 
				WHERE user_id=? and follower_id=?');
	        $stmt->execute(array($second, $first));

	        // 
	        foreach ($stmt as $row) {

	        }

	        return $row[0];

		} catch (Exception $e) {
			$this->set_error('データベースエラー');
			echo $e->getMessage();
		}	
	}


	public function follow_user($me,$other){

		$count = $this->check_count($me,$other);

		if ($count == 0){
			try {
				$stmt = $this->pdo->prepare('INSERT INTO following (user_id, follower_id) 
					values (?,?)');
		        $stmt->execute(array($other, $me));

			} catch (Exception $e) {
				$this->set_error('データベースエラー');
				echo $e->getMessage();
			}	
		}
	}


	public function unfollow_user($me,$other){

		$count = $this->check_count($me,$other);

		if ($count != 0){
			try {
				$stmt = $this->pdo->prepare('DELETE FROM following 
					WHERE user_id=? and follower_id=?
					limit 1');
		        $stmt->execute(array($other, $me));

			} catch (Exception $e) {
				$this->set_error('データベースエラー');
				echo $e->getMessage();
			}	
		}
	}

}
