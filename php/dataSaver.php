<?php
session_start();
require '../php/Db.php';
$db = new db();

if ($_SESSION['formData']) {
    $formData = json_decode($_SESSION['formData'], true);
} else {
    $formData = [];
}
if (isset($_GET['ocorrenciaId'])) {
    $ocorrenciaId = $_GET['ocorrenciaId'];
} else {
    $ocorrenciaId = '';
}

if ($formData){
    if (!$ocorrenciaId){
        $ocurrenceStructure = array('ocurrence_date' => date('Y-m-d'));
        $newOccurence = $db->insert('ocorrencia', $ocurrenceStructure);

        foreach($formData as $formPartName => $formPartData){
            $insertData = array('ocorrencia_id' => $newOccurence['id']);
            foreach($formPartData as $column => $value){
                if($value === 'true'){
                    $insertData[$column] = 1;
                } else {
                    $insertData[$column] = $value;
                }
            }
            $insertedData = $db->insert($formPartName, $insertData);
        }
    } else {
        $ocurrenceStructure = array('ocurrence_date' => date('Y-m-d'));
        $newOccurence = $db-> update('ocorrencia', $ocurrenceStructure, 'ocorrencia.id =' . $ocorrenciaId);

        foreach($formData as $formPartName => $formPartData){
            $insertData = array('ocorrencia_id' => $ocorrenciaId);
            foreach($formPartData as $column => $value){
                if($value === 'true'){
                    $insertData[$column] = 1;
                } else {
                    $insertData[$column] = $value;
                }
            }
            $insertedData = $db->update($formPartName, $insertData, 'ocorrencia_id =' . $ocorrenciaId);
        }
    }
    echo $newOccurence["id"];
    $_SESSION['formData'] = [];
    $db->close();  
} else {
    echo "data não foi salva corretamente";
}
?>