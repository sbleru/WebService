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

// TODO:クッキークリア
// セッションを切断するにはセッションクッキーも削除する。
// Note: セッション情報だけでなくセッションを破壊する。
// if (ini_get("session.use_cookies")) {
//     $params = session_get_cookie_params();
//     setcookie(session_name(), '', time() - 42000,
//         $params["path"], $params["domain"],
//         $params["secure"], $params["httponly"]
//     );
// }

// セッションクリア
session_destroy();
?>

