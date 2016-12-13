<!doctype html>
	<head>
		<meta charset="UTF-8">
		<title>miniblog Application - Users</title>
	</head>
	<body>
		<h1>List of Users</h1>
		{if $count_users}
		<table border='1' cellspacing='0' cellpadding='5' width='500'>
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
		{else}
		<p><b>There are no users in the system!</b></p>
		{/if}
	</body>
</html>