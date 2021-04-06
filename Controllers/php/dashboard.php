<?php
session_start();
include '../../Models/Grafico.php';
include '../../Models/Mysql.php';
include '../../Config/database.php';

$dbf = new Mysql;
$query = "SELECT * FROM ".$db.".".$tabela2;
$dados = $dbf->readQuery($query);

setlocale(LC_TIME, 'Portuguese_Brazil');
$semana = date("d/m/Y", strtotime("- 14 days"));

$retorno = array();

$graf = new Grafico;
$dataBox[] = $graf->buscaDados($semana, $dados, $retorno);

echo json_encode($dataBox);
?>