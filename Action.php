<?php
session_start();
include_once("Header.php");
include_once("Functions.php");

$id = $_GET['id'];
$do = $_GET['do'];

switch ($do){
	case "follow":
		follow_user($_SESSION['USERID'],$id);
		$msg = "You have followed a user!";
	break;

	case "unfollow":
		unfollow_user($_SESSION['USERID'],$id);
		$msg = "You have unfollowed a user!";
	break;

}
$_SESSION['MESSAGE'] = $msg;

header("Location:Index.php");
?>