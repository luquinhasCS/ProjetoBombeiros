<?php
    require '../php/Db.php';
    $db = new db();

    $ocorrenciaId = $_POST['ocorrenciaId'];
    $formparts = json_decode($_SESSION["FORMPARTS"]);

    $response = array();

    foreach($formparts as $part){
        $selectData = $db->select(
            $table = $part,
            $select = "*",
            $condition = "where $part.ocorrencia_id = $ocorrenciaId"
        );
        $response[$part] = $selectData;
    }

    echo json_encode($response);
?>