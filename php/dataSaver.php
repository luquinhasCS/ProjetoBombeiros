<?php
session_start();
require '../php/Db.php';
$db = new db();

$formData = json_decode($_SESSION['formData'], true);
if (isset($_GET['ocorrenciaId'])) {
    $ocorrenciaId = $_GET['ocorrenciaId'];
} else {
    $ocorrenciaId = ''
}

if (!$ocorrenciaId) {
    if ($formData) {
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
    }
} else {
    if ($formData) {
        $ocurrenceStructure = array('ocurrence_date' => date('Y-m-d'));
        $newOccurence = $db-> update('ocorrencia', $ocurrenceStructure, 'ocorrencia.id ='$ocorrenciaId'');
        
        foreach($formData as $formPartName => $formPartData){
            $insertData = array('ocorrencia_id' => $ocorrenciaId);
            foreach($formPartData as $column => $value){
                if($value === 'true'){
                    $insertData[$column] = 1;
                } else {
                    $insertData[$column] = $value;
                }
            }
    
            $insertedData = $db->update($formPartName, $insertData, 'ocorrencia_id ='$ocorrenciaId'');
        }
    }
}

$_SESSION['formData'] = [];
$db->close();
echo $newOccurence["id"];
?>