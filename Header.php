<?php
$db['host'] = "localhost";
$db['user'] = "root";
$db['pass'] = "root";
$db['unix_socket'] = "/tmp/mysql.sock";	// 自分のmysql設定では必要
$db['dbname'] = "miniblog";

// エラーメッセージの初期化
$errorMessagge = "";

$dsn = sprintf('mysql: host=%s; dbname=%s; unix_socket=%s; charset=utf8', $db['host'], $db['dbname'], $db['unix_socket']);

try {
    $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
        $errorMessage = 'データベースエラー';
        //$errorMessage = $sql;
        // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
        // echo $e->getMessage();
}
?>