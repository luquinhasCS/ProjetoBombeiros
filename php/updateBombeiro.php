<?php
require "Db.php";
$db = new db();

parse_str($_POST['dataForm'], $dataForm);

$bombeiroCPF = $_POST['cpfBombeiro'];
$username = $dataForm["f_username"];
$email = $dataForm["f_email"];
$password = $dataForm["f_password"];
$telefone = $dataForm["f_telefone"];
$sexo = $dataForm["f_sexo"];
$cpf = $dataForm["f_cpf"];

$senha_criptografada = md5($password);

$insertData = array(
    'cpf' => $cpf,
    'username' => $username,
    'sexo' => $sexo,
    'password' => $senha_criptografada,
    'email' => $email,
    'telefone' => $telefone
);

if ($db->update('bombeiro', $insertData, 'bombeiro.cpf = '.$bombeiroCPF.'')) {
    echo "Bombeiro alterado com sucesso!";
} else {
    echo "Ocorreu um erro na alteração do bombeiro.";
}

echo json_encode($dataForm["f_email"]);

$db->close();
?>