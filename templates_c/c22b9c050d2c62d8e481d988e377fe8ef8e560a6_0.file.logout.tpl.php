<?php
/* Smarty version 3.1.30, created on 2016-12-15 17:19:49
  from "/Users/shinjimaruyama/Sites/Colopl/WebService/templates/logout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58525225cc3526_57907153',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c22b9c050d2c62d8e481d988e377fe8ef8e560a6' => 
    array (
      0 => '/Users/shinjimaruyama/Sites/Colopl/WebService/templates/logout.tpl',
      1 => 1481742091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58525225cc3526_57907153 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Logout</title>
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
        <h1 class="text-primary"><b>Logout</b></h1>
        <div class="text-danger"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</div>
        <ul>
            <li><a href="Login.php" class="text-primary">Back to login page</a></li>
        </ul>
    </body>
</html><?php }
}
