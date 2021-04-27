<?php
session_start();
include '../../Models/Mysql.php';
include '../../Config/database.php';
include '../../Models/Usuarios.php';

$value = $_POST['IDED'];
$u8 = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $_POST['nome']);
$nome = ucwords(strtolower($u8));
$email = ucwords($_POST['email']);
$acesso = ucwords(strtolower($_POST['acesso']));

$con = Mysql::getInstance();
$dbf = new Usuarios($con);
$dbf->editaUsers($db, $tabela1, $nome, $email, $acesso, $value);
?>