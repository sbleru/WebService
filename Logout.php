<?php
// ini_set('session.cookie_secure', 1);
session_start();
include_once("index.php");

if (isset($_SESSION["USERID"])) {
    $function->set_error('ログアウトしました。');
} else {
    $function->set_error('セッションがタイムアウトしました。');
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
session_destroy();
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
        <div><?php echo $function->get_error(); ?></div>
        <ul>
            <li><a href="Login.php">ログイン画面に戻る</a></li>
        </ul>
    </body>
</html>