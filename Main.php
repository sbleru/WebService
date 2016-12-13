<?php
session_start();
include_once('index.php');

// ログイン状態チェック
if (!isset($_SESSION["USERID"])) {
    header("Location: Logout.php");
    exit;
}

// 投稿メッセージ 
if (isset($_SESSION['MESSAGE'])){
    echo "<b>". $_SESSION['MESSAGE']."</b>";
    unset($_SESSION['MESSAGE']);
}

if(isset($_POST['post'])){
    // メッセージの入力チェック
    if(empty($_POST['body'])){
        $this->set_error('メッセージが未入力です。');
    }
    if(!empty($_POST['body'])){
        $_SESSION['BODY'] = $_POST['body'];
        header("Location: Add.php");
    }
}

$users = $function->show_users($_SESSION['USERID']);
$posts = $function->show_posts($_SESSION['USERID'],5);

$smarty = new Smarty();
// テンプレート格納ディレクトリを指定
$smarty->template_dir = 'templates/';
// 割り当て
$smarty->assign('errorMessage', $function->get_error());
$smarty->assign('loginUser', htmlspecialchars($_SESSION["USERNAME"], ENT_QUOTES, "UTF-8"));
$smarty->assign('count_posts', count($posts));
$smarty->assign('arrayPost', $posts);
// 結果出力
$smarty->display('main.tpl');
?>