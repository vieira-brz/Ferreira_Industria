<?php
session_start();
include '../../Models/Mysql.php';
include '../../Config/database.php';
include '../../Models/Usuarios.php';

$con = Mysql::getInstance();
$users = new Usuarios($con);

$email = $_SESSION['email'];
$u8 = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $_POST['nome']);
$nome = ucwords(strtolower($u8));

$dados = $users->alteraSomenteNome($db, $tabela1, $nome, $email);

echo $dados;
?>