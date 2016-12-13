<?php
session_start();
include_once("index.php");

$id = $_GET['id'];
$do = $_GET['do'];

switch ($do){
	case "follow":
		$function->follow_user($_SESSION['USERID'],$id);
		$msg = "You have followed a user!";
	break;

	case "unfollow":
		$function->unfollow_user($_SESSION['USERID'],$id);
		$msg = "You have unfollowed a user!";
	break;

}
$_SESSION['MESSAGE'] = $msg;

header("Location:Main.php");
