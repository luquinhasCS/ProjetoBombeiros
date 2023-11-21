<?php
session_start();
require '../php/Db.php';
$db = new db();

$formData = json_decode($_SESSION['formData'], true);

if ($formData) {
    $ocurrenceStructure = array('ocurrence_date' => date('d/m/Y'));
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

$_SESSION['formData'] = [];
$db->close();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
?>