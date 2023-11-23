<?php
require "Db.php";
$db = new db();

$ocorrenciaId = $_POST['ocorrenciaId'];

$response = array();
    $formparts = $db -> select (
        $table = "botao",
        $select = "*",
        $condition = ""
);

foreach($formparts as $part){
    $label = toSnakeCase($part["label"]);
    $condicao = "$label.ocorrencia_id = $ocorrenciaId";
    $delete = $db->delete(
        $table = $label,
        $condition = $condicao
    );
};

if ($db->delete('ocorrencia', 'ocorrencia.id = '$ocorrenciaId'') && $db->delete('cabecalho', 'ocorrencia.id = '$ocorrenciaId'')) {
    echo "Bombeiro deletado com sucesso!";
} else {
    echo "Ocorreu um erro ao deletar o bombeiro.";
}

echo $insertData;

$db->close();
?>