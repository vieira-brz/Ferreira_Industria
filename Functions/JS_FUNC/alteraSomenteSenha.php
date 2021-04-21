<?php
session_start();
include '../../Models/Mysql.php';
include '../../Config/database.php';
include '../../Models/Usuarios.php';

$con = Mysql::getInstance();
$users = new Usuarios($con);

$email = $_SESSION['email'];
$senha = md5($_POST['senha']);

$dados = $users->alteraSomenteSenha($db, $tabela1, $senha, $email);

echo $dados;
?>