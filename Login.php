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

// $smarty = new Smarty();
// // テンプレート格納ディレクトリを指定
// $smarty->template_dir = 'templates/';
// // テンプレートの{$abc}に「World」という文字列を割り当てる
// $smarty->assign('abc', 'World');
// // 結果出力
// $smarty->display('sample.tpl');
?>

<!doctype html>
<html>
    <head>
            <meta charset="UTF-8">
            <title>ログイン</title>
    </head>
    <body>
        <h1>ログイン画面</h1>
        <!-- $_SERVER['PHP_SELF']はXSSの危険性があるので、actionは空にしておく -->
        <form id="loginForm" name="loginForm" action="" method="POST">
            <fieldset>
                <legend>ログインフォーム</legend>
                <div><font color="#ff0000"><?php echo $function->get_error(); ?></font></div>
                <label for="userid">ユーザーID</label><input type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" value="<?php if (!empty($_POST["userid"])) {echo htmlspecialchars($_POST["userid"], ENT_QUOTES, "UTF-8");} ?>">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <input type="submit" id="login" name="login" value="ログイン">
            </fieldset>
        </form>
        <br>
        <form action="SignUp.php">
            <fieldset>
                <legend>新規登録フォーム</legend>
                <input type="submit" value="新規登録">
            </fieldset>
        </form>
    </body>
</html>