<?php
session_start();
require '../php/Db.php';
$db = new db();

$formData = json_decode($_SESSION['formData'], true)
$formPartAllData = array()

foreach ($formData as $formPart) {
    $formPartData = array();
    $values = array();
    foreach ($formPart as $property => $value){
        if($property === 'formPartId'){$formPartData[] = $value;}
        $values[] = array($property, $value);

    }
    $formPartData[] = $values;
    $formPartAllData[] = $formPartData;
}

foreach($formPartAllData as $dataPart){
    $ocurrenceStructure = array('date' => date('d/m/Y'))
    $newOccurence = $db->insert('ocorrencia', $dataPartValues)
    if ($newOccurence) {
        echo "ocorrência registrada com sucesso!";
    } else {
        echo "Ocorreu um erro no registro da ocorrência.";
    }
    $dataPartValues = array('ocorrencia_id' => )
    foreach($dataPart[1] as $propertyValuePair){
        $propertyName = $propertyValuePair[0];
        $propertyValue = $propertyValuePair[1];
        if ($propertyValuePair[1] === 'true'){$propertyValue = 1}
        $dataPartValues[$propertyName] = $propertyValue;
    }
    if ($db->insert($tabelaNome, $dataPartValues)) {
        echo " registrado com sucesso!";
    } else {
        echo "Ocorreu um erro no registro.";
    }
    // id ocorrencia, coluna_nome, value/estado
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
?>