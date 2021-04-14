<?php
session_start();
include '../../Models/Mysql.php';
include '../../Config/database.php';
include '../../Models/Usuarios.php';

$con = Mysql::getInstance();
$users = new Usuarios($con);

$email = $_SESSION['email'];
$nome = $_POST['nome'];

$dados = $users->alteraSomenteNome($db, $tabela1, $nome, $email);

echo $dados;
?>