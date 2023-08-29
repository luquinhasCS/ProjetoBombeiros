<?php
session_start();
require "Db.php";

$db = new db();

$email = $_POST['f_email'];
$password = $_POST['f_password'];
$hashedPassword = md5($password);

$userData = $db -> select(
    $table = "bombeiro",
    $condition = "bombeiro.email = :email",
    $params = array(':email' => $email)
);

$db -> close();

if (!empty($userData)) {
    $storedHashedPassword = $userData[0]['password'];

    if (password_verify($hashedPassword, $storedHashedPassword)) {
        echo "O login foi bem sucedido.";
        $idBombeiro = $userData[0]['id'];
        $_SESSION["logado"] = $idBombeiro;
        header("Location: ../telas/tela");
        exit();
    } else {
        echo "0"
    }
} else {
    echo "1"
}

?>