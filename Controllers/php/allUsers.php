<?php
include '../../Models/Mysql.php';
include '../../Config/database.php';

$dbf = new Mysql;
$query = "SELECT * FROM ".$db.".".$tabela1;
$dados = $dbf->readQuery($query);
?>