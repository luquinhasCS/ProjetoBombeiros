<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = $_POST['jsonData'];
    $jsonData = json_decode($json, true);

    if($_SESSION['formData']){
        $storedData = json_decode($_SESSION['formData'], true);
        $updatedData = array_merge($storedData, $jsonData);
        $_SESSION['formData'] = json_encode($updatedData);
    } else {
        $_SESSION['formData'] = json_encode($jsonData);
    }

    echo $_SESSION['formData'];
}
?>