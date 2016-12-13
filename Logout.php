<?php
// ini_set('session.cookie_secure', 1);
session_start();
include_once("index.php");

if (isset($_SESSION["USERID"])) {
    $function->set_error('ログアウトしました。');
} else {
    $function->set_error('セッションがタイムアウトしました。');
}

$smarty = new Smarty();
// テンプレート格納ディレクトリを指定
$smarty->template_dir = 'templates/';
// 割り当て
$smarty->assign('error_message', $function->get_error());
// 結果出力
$smarty->display('logout.tpl');

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
session_destroy();
// TODO:クッキークリア

?>

