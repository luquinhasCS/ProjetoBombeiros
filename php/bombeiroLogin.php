<?php
session_start();
require "Db.php";

$db = new db();

$email = $_POST['f_email'];
$password = $_POST['f_password'];
$hashedPassword = md5($password);

$userData = $db -> select(
    $table = "bombeiro",
    $select = "*",
    $condition = "bombeiro.email = '$email'"
);

$db -> close();

if (!empty($userData)) {
    $storedHashedPassword = $userData[0]['password'];

    if ( $hashedPassword === $storedHashedPassword) {
        $idBombeiro = $userData[0]['id'];
        $_SESSION["logado"] = $idBombeiro;
        echo '{"res": 2}';

    } else {
        echo '{"res": 0}';
    }
} else {
    echo '{"res": 1}';
}

?>