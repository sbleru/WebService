<?php
// これ書くとセッションがタイムアウトする．https以外だとcookieが送信できないから？
// ini_set('session.cookie_secure', 1); // httpsによる通信時のみ Cookie の内容を送信
// セッション開始
session_start();
include_once('index.php');


// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // ユーザIDの入力チェック
    if (empty($_POST["userid"])) {
        $function->set_error('ユーザーIDが未入力です。');
    } else if (empty($_POST["password"])) {
        $function->set_error('パスワードが未入力です。');
    }

    if (!empty($_POST["userid"]) && !empty($_POST["password"])) {
        // 入力したユーザID，パスワードをもとにログイン
        $function->login($_POST["userid"], $_POST["password"]);
    }
}

$smarty = new Smarty();
// テンプレート格納ディレクトリを指定
$smarty->template_dir = 'templates/';
// 割り当て
$smarty->assign('error_message', $function->get_error());
if(!empty($_POST["userid"])){
    $smarty->assign('userid', htmlspecialchars($_POST["userid"], ENT_QUOTES, "UTF-8"));
} else {
    $smarty->assign('userid', "");
}
// 結果出力
$smarty->display('login.tpl');
?>