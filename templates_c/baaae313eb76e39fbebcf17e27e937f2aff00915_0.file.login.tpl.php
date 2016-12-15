<?php
/* Smarty version 3.1.30, created on 2016-12-15 17:19:51
  from "/Users/shinjimaruyama/Sites/Colopl/WebService/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_585252277ce9e6_14758324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'baaae313eb76e39fbebcf17e27e937f2aff00915' => 
    array (
      0 => '/Users/shinjimaruyama/Sites/Colopl/WebService/templates/login.tpl',
      1 => 1481742091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_585252277ce9e6_14758324 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
        <h1>Login</h1>
        <form id="loginForm" name="loginForm" action="" method="post">
            <div><font class="text-danger"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</font></div>
            <input type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" required="required" value="<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
">
            <input type="password" id="password" name="password" required="required" value="" placeholder="パスワードを入力">
            <!-- トークンを送る -->
            <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
            <button type="submit" id="login" name="login" class="btn btn-primary btn-block btn-large">Let me in.</button>
        </form>
        <br>
        <h1>Sign Up</h1>
        <form action="SignUp.php">
            <fieldset>
                <input type="submit" class="btn-primary" value="Sign Up page">
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
