<?php
/* Smarty version 3.1.30, created on 2016-12-15 17:19:39
  from "/Users/shinjimaruyama/Sites/Colopl/WebService/templates/main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5852521bc889e2_06614899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '012eb9d54c40ad1397e90a5a534207537009d53d' => 
    array (
      0 => '/Users/shinjimaruyama/Sites/Colopl/WebService/templates/main.tpl',
      1 => 1481742091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5852521bc889e2_06614899 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Main</title>
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
        <h1 class="text-primary"><b>Home</b></h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <!-- ユーザー名をechoで表示 -->
        <p class="text-primary">Hello <b><?php echo $_smarty_tpl->tpl_vars['login_user']->value;?>
</b>! 
        <a href="Logout.php"><u>Logout</u></a>
        </p>
        <!-- 投稿フォーム -->
        <div><font class="text-danger"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</font></div>
        <form method='post' action=''>
            <p class="bg-primary">Your status:</p>
            <textarea class="bg-success" name='body' rows='5' cols='40' wrap=VIRTUAL></textarea>
            <button type="submit" id="post" name="post" class="btn btn-primary btn-block btn-large">Submit</button>
        </form>

        <p><a href='Users.php'><u>see list of users</u></a></p>

        <h2 class="bg-primary">Follow comment</h2>

        <!-- 投稿表示 -->
        <?php if ($_smarty_tpl->tpl_vars['count_posts']->value) {?>
            <div class="container">
            <div class="table-responsive">
            <table border='1' cellspacing='0' cellpadding='5' width='500' class="table table-bordered bg-success">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_post']->value, 'list');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['list']->value) {
?>
                    <tr valign='top'>
                    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['userid'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['body'];?>
<br/>
                    <small><?php echo $_smarty_tpl->tpl_vars['list']->value['stamp'];?>
</small></td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </table>
            </div>
            </div>
        <?php } else { ?>
            <p class="text-primary"><b>You haven't posted anything yet!</b></p>
        <?php }?>

    </body>
</html><?php }
}
