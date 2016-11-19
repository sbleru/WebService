<?php
// ini_set('session.cookie_secure', 1);
session_start();

// ログイン状態チェック
if (!isset($_SESSION["USERID"])) {
    header("Location: Logout.php");
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メイン</title>
    </head>
    <body>
        <h1>メイン画面</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <p>Hello <u><?php echo htmlspecialchars($_SESSION["USERID"], ENT_QUOTES, "UTF-8"); ?></u>!</p>  <!-- ユーザー名をechoで表示 -->
        <ul>
            <li><a href="Logout.php">ログアウト</a></li>
        </ul>
    </body>
</html>