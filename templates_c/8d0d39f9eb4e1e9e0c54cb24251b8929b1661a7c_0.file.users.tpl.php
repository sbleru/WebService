<?php
/* Smarty version 3.1.30, created on 2016-12-15 17:19:45
  from "/Users/shinjimaruyama/Sites/Colopl/WebService/templates/users.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58525221dec0f3_51205098',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d0d39f9eb4e1e9e0c54cb24251b8929b1661a7c' => 
    array (
      0 => '/Users/shinjimaruyama/Sites/Colopl/WebService/templates/users.tpl',
      1 => 1481742091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58525221dec0f3_51205098 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Users</title>
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
		<h1 class="text-primary"><b>List of Users</b></h1>
		<?php if ($_smarty_tpl->tpl_vars['count_users']->value) {?>
		<div class="container">
        <div class="table-responsive">
			<table border='1' cellspacing='0' cellpadding='5' width='500' class="bg-success">
		        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_users']->value, 'list', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['list']->value) {
?>
		            <tr valign='top'>
		            <td><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</td>
		            <td><?php echo $_smarty_tpl->tpl_vars['list']->value;?>

			            <?php if (in_array($_smarty_tpl->tpl_vars['key']->value,$_smarty_tpl->tpl_vars['following']->value)) {?>
			            	<small>
							<a href='Action.php?id=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
&do=unfollow'>unfollow</a>
							</small>
			            <?php } else { ?>
			            	<small>
							<a href='Action.php?id=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
&do=follow'>follow</a>
							</small>
			            <?php }?>
		            </td>
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
		<p><b>There are no users in the system!</b></p>
		<?php }?>
		<a href="Main.php" class="text-primary">Back to home page</a>
	</body>
</html><?php }
}
