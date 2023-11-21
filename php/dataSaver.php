<?php
session_start();
require '../php/Db.php';
$db = new db();

$formData = json_decode($_SESSION['formData'], true);

// $ocurrenceStructure = array('date' => date('d/m/Y'))
// $newOccurence = $db->insert('ocorrencia', $dataPartValues)
$ocorrenciaID = 1
foreach($formPart as $formPartName => $formPartData){
    $insertData = array('ocorrencia_id' => $ocorrenciaID);
    foreach($formPartData as $column => $value){
        if($value === 'true'){
            $insertData[$column] = 1;
        } else {
            $insertData[$column] = $value;
        }
    }
    echo json_encode($insertData);
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
?>