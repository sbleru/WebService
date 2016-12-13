<?php
include_once('Header.php');
include_once('Functions.php');
include_once('libs/Smarty.class.php');

// DB接続情報設定
$connInfo = array(
    'host'     => 'localhost',
    'dbname'   => 'miniblog',
    'dbuser'   => 'root',
    'password' => 'root',
    'unix_socket' => '/tmp/mysql.sock'
);
Header::setConnectionInfo($connInfo);

date_default_timezone_set('Asia/Tokyo'); // タイムゾーン設定

$function = new Functions();
// $smarty = new Smarty();