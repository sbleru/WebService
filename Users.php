<?php 
session_start();
include_once("index.php");

$users = $function->show_all_users();
$following = $function->following($_SESSION['USERID']);


$smarty = new Smarty();
// テンプレート格納ディレクトリを指定
$smarty->template_dir = 'templates/';
// 割り当て
$smarty->assign('count_users', count($users));
$smarty->assign('array_users', $users);
$smarty->assign('following', $following);
// 結果出力
$smarty->display('users.tpl');
?>