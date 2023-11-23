<?php
    require '../php/Db.php';
    $db = new db();

    $ocorrenciaId = $_POST['ocorrenciaId'];

    $response = array();
    $formparts = $db -> select (
        $table = "botao",
        $select = "*",
        $condition = ""
    ); 

    function removeAccents($str) {
        return iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    }
    
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
    }

    foreach($formparts as $part){
        $label = toSnakeCase($part["label"]);
        $condicao = "$label.ocorrencia_id = $ocorrenciaId";
        $selectData = $db->select(
            $table = $label,
            $select = "*",
            $condition = $condicao
        );
        if (!$selectData){
            $response[toSnakeCase($part["label"])] = $selectData;
        } else {
            $response[toSnakeCase($part["label"])] = {}
        }
        echo json_encode($selectData);
    };

?>