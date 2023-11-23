<?php
require "Db.php";
$db = new db();

$bombeiroId = $_POST['bombeiroId'];

if ($db->delete('bombeiro', 'bombeiro.id = '$bombeiroId'')) {
    echo "Bombeiro deletado com sucesso!";
} else {
    echo "Ocorreu um erro ao deletar o bombeiro.";
}

echo $insertData;

$db->close();
?>