<?php
session_start();
require "Db.php";

$db = new db();

$bombeiro = $_SESSION['bombeiro_logado'];
$bombeiroId = $bombeiro['id']

echo $bombeiroId;

?>