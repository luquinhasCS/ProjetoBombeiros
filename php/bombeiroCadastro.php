<?php
require "Db.php";

$db = new db();

$username = $_POST['f_username'];
$email = $_POST['f_email'];
$password = $_POST['f_password'];
$telefone = $_POST['f_telefone'];
$sexo = $_POST['f_sexo'];
$cpf = $_POST['f_cpf'];

$senha_criptografada = md5($password);

$insertData = array(
    'cpf' => $cpf,
    'username' => $username,
    'sexo' => $sexo,
    'password' => $senha_criptografada,
    'email' => $email,
    'telefone' => $telefone
);

if ($db->insert('bombeiro', $insertData)) {
    echo "Bombeiro registrado com sucesso!";
} else {
    echo "Ocorreu um erro no registro do bombeiro.";
}

echo $insertData;

$db->close();
?>