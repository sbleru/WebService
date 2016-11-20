<?php
function add_user($username, $email, $password){
	global $pdo, $SignUpMessage;  //グローバル変数を使うにはこの宣言が必要

	try {
        $stmt = $pdo->prepare("INSERT INTO users(username, email, password, status) VALUES (?, ?, ?, ?)");

        $stmt->execute(array($username, $email, password_hash($password, PASSWORD_DEFAULT), 'active'));  // パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
        $userid = $pdo->lastinsertid();  // 登録した(DB側でauto_incrementした)IDを$useridに入れる

        $SignUpMessage = '登録が完了しました。あなたの登録IDは '. $userid. ' です。メールアドレスは　'.$email. '　です．パスワードは '. $password. ' です。';  // ログイン時に使用するIDとパスワード
    } catch (PDOException $e) {
        $errorMessage = 'データベースエラー';
        // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
        echo $e->getMessage();
    }
}

function login($userid, $password){
	global $pdo;

	try {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute(array($userid));

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $row['password'])) {
                session_regenerate_id(true);

                // 入力したIDのユーザー名を取得
                $sql = "SELECT * FROM users WHERE id = $userid";  //入力した$useridのユーザー名を取得
                $stmt = $pdo->query($sql);
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
                $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
            }
        } else {
            // 4. 認証成功なら、セッションIDを新規に発行する
            // 該当データなし
            $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
        }
    } catch (PDOException $e) {
        $errorMessage = 'データベースエラー';
        //$errorMessage = $sql;
        // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
        // echo $e->getMessage();
    }
}

// 投稿
function add_post($userid,$body){
	global $pdo;
	date_default_timezone_set('Asia/Tokyo'); // タイムゾーン設定

	try {
		$stmt = $pdo->prepare('INSERT INTO posts (user_id, body, stamp) 
			VALUES (?, ?, ?)');
        $stmt->execute(array($userid, htmlspecialchars($body, ENT_QUOTES, "UTF-8"), date("Y-m-d H:i:s")));
	} catch (Exception $e) {
		$errorMessage = 'データベースエラー';
		echo $e->getMessage();
	}
}

// 投稿メッセージ表示
function show_posts($userid){
	global $pdo;

	$posts = array();

	try {
		$stmt = $pdo->prepare('SELECT body, stamp FROM posts WHERE user_id = ? order by stamp desc');
        $stmt->execute(array($userid));

        foreach ($stmt as $row) {
        	$posts[] = array( 	'stamp' => $row['stamp'], 
								'userid' => $userid, 
								'body' => $row['body']
						);
        }

        return $posts;

	} catch (Exception $e) {
		$errorMessage = 'データベースエラー';
		echo $e->getMessage();
	}	

}
?>