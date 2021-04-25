<?php
session_start();
include '../../Models/Grafico.php';
include '../../Models/Mysql.php';
include '../../Config/database.php';

$dbf = new Mysql;
$query = "SELECT * FROM ".$db.".".$tabelanode;
$dados = $dbf->readQuery($query);

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

$semana = date("d/m/Y", strtotime("- 365 days"));

$retorno = array();

$graf = new Grafico;
$dataBox[] = $graf->buscaDados($semana, $dados, $retorno);

echo json_encode($dataBox);
?>
