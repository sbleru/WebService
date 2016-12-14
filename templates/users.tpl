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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- BootstrapのJS読み込み -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h1 class="text-primary"><b>List of Users</b></h1>
		{if $count_users}
		<div class="container">
        <div class="table-responsive">
			<table border='1' cellspacing='0' cellpadding='5' width='500' class="bg-success">
		        {foreach from=$array_users key=key item=list}
		            <tr valign='top'>
		            <td>{$key}</td>
		            <td>{$list}
			            {if in_array($key,$following)}
			            	<small>
							<a href='Action.php?id={$key}&do=unfollow'>unfollow</a>
							</small>
			            {else}
			            	<small>
							<a href='Action.php?id={$key}&do=follow'>follow</a>
							</small>
			            {/if}
		            </td>
		            </tr>
		        {/foreach}
			</table>
		</div>
        </div>
		{else}
		<p><b>There are no users in the system!</b></p>
		{/if}
		<a href="Main.php" class="text-primary">Back to home page</a>
	</body>
</html>