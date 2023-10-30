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
    $newOccurence = $db->insert('ocorrencia', $dataPartValues) // isso aqui ta incompleto, falta passar os dados da ocorrencia
    if ($newOccurence) {
        echo "ocorrência registrada com sucesso!";
    } else {
        echo "Ocorreu um erro no registro da ocorrência.";
    }
    $dataPartValues[]
    foreach($dataPart[1] as $propertyValuePair){
        $propertyName = $propertyValuePair[0]; // isso aqui é na verdade o id da data form structure
        $propertyValue = $propertyValuePair[1];
        $dataPartValues[$propertyName] = $propertyValue;
    }
    if ($db->insert($tabelaNome, $dataPartValues)) {
        echo " registrado com sucesso!";
    } else {
        echo "Ocorreu um erro no registro.";
    }
    // id ocorrencia, id botao associado, value
}
// , ocorrencia, pegar o label ao inves do id                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
?>