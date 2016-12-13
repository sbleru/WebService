<?php
session_start();
include_once("index.php");

$userid = $_SESSION['USERID'];
$body = substr($_SESSION['BODY'],0,140);

$function->add_post($userid,$body);

$_SESSION['MESSAGE'] = "Your post has been added!";

header("Location:Main.php");
