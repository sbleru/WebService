<!doctype html>
<html>
    <head>
            <meta charset="UTF-8">
            <title>新規登録</title>
    </head>
    <body>
        <h1>新規登録画面</h1>
        <form id="loginForm" name="loginForm" action="" method="POST">
            <fieldset>
                <legend>新規登録フォーム</legend>
                <div><font color="#ff0000">{$error_message}</font></div>
                <div><font color="#0000ff">{$sign_up_message}</font></div>
                <label for="username">ユーザー名</label><input type="text" id="username" name="username" placeholder="ユーザー名を入力" value="{$username}">
                <br>
                <label for="email">メールアドレス</label><input type="text" id="email" name="email" placeholder="メールアドレスを入力" value="{$usermail}">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <label for="password2">パスワード(確認用)</label><input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力">
                <br>
                <input type="submit" id="signUp" name="signUp" value="新規登録">
            </fieldset>
        </form>
        <br>
        <form action="Login.php">
            <input type="submit" value="戻る">
        </form>
    </body>
</html>