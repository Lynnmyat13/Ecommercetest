<?php

$server = "localhost";
$port =3306;
$user = "root";
$password = "";
try {
    $connection = new PDO("mysql:host=$server;port=$port;dbname=testdb",$user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>