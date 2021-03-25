<?php

$host = "187.73.224.67";
$user = "Prema";
$pwd = "25GlQacRRsdAq5RgSkl5fr4df#3w";
$db = "isupergaus";

try {
    $rbx = new PDO("mysql:host=$host;dbname=$db", $user, $pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $rbx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    echo "Erro ao conectar ao db: " . $e->getMessage();
}

?>