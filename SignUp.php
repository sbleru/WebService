<?php
// ini_set('session.cookie_secure', 1);
// セッション開始
session_start();
include_once('index.php');

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["username"])) {  // 値が空のとき
        $function->set_error('ユーザーIDが未入力です。');
    } else if (empty($_POST["email"])) {
        $function->set_error('E-mailが未入力です。');
    } else if (empty($_POST["password"])) {
        $function->set_error('パスワードが未入力です。');
    } else if (empty($_POST["password2"])) {
        $function->set_error('パスワードが未入力です。');
    }

    else if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] == $_POST["password2"]) {
        // 入力したユーザIDとメールアドレス，パスワードを登録
        $function->add_user($_POST["username"], $_POST["email"], $_POST["password"]);

    } else if($_POST["password"] != $_POST["password2"]) {
        $function->set_error('パスワードに誤りがあります。');
    }
}

$smarty = new Smarty();
// テンプレート格納ディレクトリを指定
$smarty->template_dir = 'templates/';
// 割り当て
$smarty->assign('error_message', $function->get_error());
$smarty->assign('sign_up_message', $function->get_message());
if(!empty($_POST["username"])){
    $smarty->assign('username', htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8"));
} else {
    $smarty->assign('username', "");
}
if(!empty($_POST["email"])){
    $smarty->assign('usermail', htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8"));
} else {
    $smarty->assign('usermail', "");
}
// 結果出力
$smarty->display('signup.tpl');
?>