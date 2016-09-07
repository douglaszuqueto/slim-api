<?php
$app = require __DIR__ . '/bootstrap/app.php';

$app->run();

//$db = new MySQLi('192.168.33.20','root', 'root','test');
//$db->set_charset('UTF8');

//$result = $db->query('select * from users');

//$pdo = new PDO('mysql:host=192.168.33.20;dbname=test', 'root', 'root',
//    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
//
//$result = $pdo->query('SELECT * FROM users');
//
//echo json_encode( (Array) $result->fetchAll());