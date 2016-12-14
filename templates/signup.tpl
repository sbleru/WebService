<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up</title>
        <!-- BootstrapのCSS読み込み -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="bootstrap/css/login.css" rel="stylesheet"> -->
        <link href="bootstrap/css/form.css" rel="stylesheet">
        <!-- jQuery読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- BootstrapのJS読み込み -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="login">
        <h1>Sign Up</h1>
        <form id="loginForm" name="loginForm" action="" method="post">
            <div><font class="text-danger">{$error_message}</font></div>
            <div><font class="text-primary">{$sign_up_message}</font></div>
            <input type="text" id="username" name="username" placeholder="ユーザー名を入力" required="required" value="{$username}">
            <input type="text" id="email" name="email" placeholder="メールアドレスを入力" required="required" value="{$usermail}">
            <input type="password" id="password" name="password" value="" placeholder="パスワードを入力" required="required">
            <input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力" required="required">
            <!-- トークンを送る -->
            <input type="hidden" name="token" value="{$token}">
            <button type="submit" id="signUp" name="signUp" class="btn btn-primary btn-block btn-large">Sign Up</button>
        </form>
        <br>
        <h1>Login</h1>
        <form action="Login.php">
            <fieldset>
                <input type="submit" class="btn-primary" value="Login page">
            </fieldset>
        </form>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- login bootsnipp -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9155049400353686"
             data-ad-slot="9589048256"
             data-ad-format="auto"></ins>
        </div>
    </body>
</html>