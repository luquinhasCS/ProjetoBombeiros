<?php
require "Db.php";
$db = new db();

$cpfBombeiro = $_POST['cpfBombeiro'];

if ($db->delete('bombeiro', 'bombeiro.cpf = '$cpfBombeiro'')) {
    echo "Bombeiro deletado com sucesso!";
} else {
    echo "Ocorreu um erro ao deletar o bombeiro.";
}

echo $insertData;

$db->close();
?>