<?php
error_reporting(0);
require("conn.php");
header('Content-type: application/json');

$q = $_GET['q'];

$statement = $conn->prepare("SELECT id, nome FROM condominios WHERE nome like CONCAT( '%', upper(:q), '%') ORDER BY nome
");
$statement->bindParam(':q', $q);
$statement->execute();

$rows = $statement->fetchAll();

$res = array();

foreach($rows as $row) {    
    $mini_res = array();
    $mini_res['value'] = intval($row['id']);
    $mini_res['text'] = $row['nome'];

    array_push($res, $mini_res);
}

echo json_encode($res, JSON_PRETTY_PRINT);

?>