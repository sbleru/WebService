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
                foreach ($stmt as $row) {
                    $row['username'];  // ユーザー名
                    // $_SESSION["USERID"] = $row['name'];
                }
                $_SESSION["USERID"] = $row['username'];
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
?>