<?php
// ini_set('session.cookie_secure', 1);
session_start();
include_once('Header.php');
include_once('Functions.php');

if (isset($_SESSION["USERID"])) {
    $errorMessage = "ログアウトしました。";
} else {
    $errorMessage = "セッションがタイムアウトしました。";
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア @の意味理解してる？
@session_destroy();
// TODO:クッキークリア

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログアウト</title>
    </head>
    <body>
        <h1>ログアウト画面</h1>
        <div><?php echo $errorMessage; ?></div>
        <ul>
            <li><a href="Login.php">ログイン画面に戻る</a></li>
        </ul>
    </body>
</html>