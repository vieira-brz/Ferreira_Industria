<?php
session_start();
include '../../Models/Mysql.php';
include '../../Config/database.php';
include '../../Models/Usuarios.php';

$value = $_POST['IDED'];
$nome = utf8_encode(ucwords(strtolower($_POST['nome'])));
$email = ucwords($_POST['email']);
$acesso = ucwords(strtolower($_POST['acesso']));

$con = Mysql::getInstance();
$dbf = new Usuarios($con);
$dbf->editaUsers($db, $tabela1, $nome, $email, $acesso, $value);
?>