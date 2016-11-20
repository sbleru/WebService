<?php 
session_start();
include_once("Header.php");
include_once("Functions.php");

?>

<!doctype html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Microblogging Application - Users</title>
</head>
<body>

<h1>List of Users</h1>
<?php
$users = show_users();
$following = following($_SESSION['USERID']);

if (count($users)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
foreach ($users as $key => $value){
	echo "<tr valign='top'>\n";
	echo "<td>".$key ."</td>\n";
	echo "<td>".$value;
	// $followingに$keyが入っているかどうか　フォローしているユーザの中にIDが$keyのものがいるか
	if (in_array($key,$following,true)){
		echo " <small>
		<a href='Action.php?id=$key&do=unfollow'>unfollow</a>
		</small>";
	}else{
		echo " <small>
		<a href='Action.php?id=$key&do=follow'>follow</a>
		</small>";
	}
	echo "</td>\n";
	echo "</tr>\n";
}
?>
</table>
<?php
}else{
?>
<p><b>There are no users in the system!</b></p>
<?php
}
?>
</body>
</html>

