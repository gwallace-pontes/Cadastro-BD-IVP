<?php

$host = "******";
$user = "Prema";
$pwd = "******";
$db = "isupergaus";

try {
    $rbx = new PDO("mysql:host=$host;dbname=$db", $user, $pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $rbx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    echo "Erro ao conectar ao db: " . $e->getMessage();
}

?>
