<?php
/* Smarty version 3.1.30, created on 2016-12-15 03:38:49
  from "/Users/shinjimaruyama/Sites/Colopl/WebService/templates/signup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_585191b9c7a931_56722039',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2be5ca02f88bed236a668179d45bdd340326d80b' => 
    array (
      0 => '/Users/shinjimaruyama/Sites/Colopl/WebService/templates/signup.tpl',
      1 => 1481740719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_585191b9c7a931_56722039 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
        <!-- BootstrapのJS読み込み -->
        <?php echo '<script'; ?>
 src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    </head>
    <body>
        <div class="login">
        <h1>Sign Up</h1>
        <form id="loginForm" name="loginForm" action="" method="post">
            <div><font class="text-danger"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</font></div>
            <div><font class="text-primary"><?php echo $_smarty_tpl->tpl_vars['sign_up_message']->value;?>
</font></div>
            <input type="text" id="username" name="username" placeholder="ユーザー名を入力" required="required" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
            <input type="text" id="email" name="email" placeholder="メールアドレスを入力" required="required" value="<?php echo $_smarty_tpl->tpl_vars['usermail']->value;?>
">
            <input type="password" id="password" name="password" value="" placeholder="パスワードを入力" required="required">
            <input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力" required="required">
            <!-- トークンを送る -->
            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
            <button type="submit" id="signUp" name="signUp" class="btn btn-primary btn-block btn-large">Sign Up</button>
        </form>
        <br>
        <h1>Login</h1>
        <form action="Login.php">
            <fieldset>
                <input type="submit" class="btn-primary" value="Login page">
            </fieldset>
        </form>
        <?php echo '<script'; ?>
 async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"><?php echo '</script'; ?>
>
        <!-- login bootsnipp -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9155049400353686"
             data-ad-slot="9589048256"
             data-ad-format="auto"></ins>
        </div>
    </body>
</html><?php }
}
