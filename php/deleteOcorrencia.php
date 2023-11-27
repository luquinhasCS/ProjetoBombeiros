<?php
require "Db.php";
$db = new db();

function removeAccents($str) {
    return iconv('UTF-8', 'ASCII//TRANSLIT', $str);
};

function toSnakeCase($inputString) {
    // Remove accents
    $withoutAccents = removeAccents($inputString);

    // Remove special characters and replace spaces with underscores
    $formattedString = preg_replace('/[^a-zA-Z0-9\s]/', '', $withoutAccents);
    $formattedString = preg_replace('/\s+/', '_', $formattedString);

    // Convert the string to lowercase
    $snakeCaseString = strtolower($formattedString);

    // Remove leading and trailing underscores
    $finalSnakeCase = trim($snakeCaseString, '_');

    return $finalSnakeCase;
};

$ocorrenciaId = $_POST['id'];

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

if ($db->delete('cabecalho', 'ocorrencia_id = ' . $ocorrenciaId) && $db->delete('ocorrencia', 'ocorrencia.id = ' . $ocorrenciaId)) {
    echo "Ocorrência deletada com sucesso!";
} else {
    echo "Ocorreu um erro ao deletar a ocorrência.";
}

$db->close();
?>