<?php 
require '../php/Db.php';
$db = new db();

$cpfBombeiro = $_POST['cpfBombeiro'];

$selectData = $db->select(
    $table = 'bombeiro',
    $select = "*",
    $condition = "bombeiro.cpf = $cpfBombeiro"
);

echo json_encode($selectData);
?>