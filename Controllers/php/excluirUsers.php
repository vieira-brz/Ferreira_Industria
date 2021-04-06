<?php
session_start();
include '../../Models/Mysql.php';
include '../../Config/database.php';
include '../../Models/Usuarios.php';

$value = $_POST['IDEX'];

$con = Mysql::getInstance();
$dbf = new Usuarios($con);
$dbf->excluirUsers($db, $tabela1, $value);
?>