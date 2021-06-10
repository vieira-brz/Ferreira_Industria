<?php
session_start();
include '../../Models/Grafico.php';
include '../../Models/Mysql.php';
include '../../Config/database.php';

$con = Mysql::getInstance();
$graf = new Grafico($con);

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

$retorno = array();

$dataBox[] = $graf->buscaDadosHoje($db, $tabelanode);

echo json_encode($dataBox);
?>
