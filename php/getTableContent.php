<?php 
require '../php/Db.php';
$db = new db();

$tableName = $_POST['table'];

$selectData = $db->select(
    $table = $tableName,
    $select = "*",
    $condition = ""
);

echo json_encode($selectData);
?>