<?php
session_start();
include_once('Header.php');
include_once('Functions.php');

$userid = $_SESSION['USERID'];
$body = substr($_SESSION['BODY'],0,140);

add_post($userid,$body);

$_SESSION['MESSAGE'] = "Your post has been added!";

header("Location:Main.php");
?>