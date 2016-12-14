<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
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
        <h1>Login</h1>
        <form id="loginForm" name="loginForm" action="" method="post">
            <div><font class="text-danger">{$error_message}</font></div>
            <input type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" required="required" value="{$userid}">
            <input type="password" id="password" name="password" required="required" value="" placeholder="パスワードを入力">
            <!-- トークンを送る -->
            <input type="hidden" name="token" value="{$token}">
            <button type="submit" id="login" name="login" class="btn btn-primary btn-block btn-large">Let me in.</button>
        </form>
        <br>
        <h1>Sign Up</h1>
        <form action="SignUp.php">
            <fieldset>
                <input type="submit" class="btn-primary" value="Sign Up page">
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