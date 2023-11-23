<?php 
require '../php/Db.php';
$db = new db();

$bombeiroId = $_POST['bombeiroId'];

$selectData = $db->select(
    $table = 'bombeiro',
    $select = "*",
    $condition = "bombeiro.id = $bombeiroId"
);

echo json_encode($selectData);
?>