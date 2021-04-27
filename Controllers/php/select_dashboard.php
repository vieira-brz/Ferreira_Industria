<?php
session_start();
include '../../Models/Grafico.php';
include '../../Models/Mysql.php';
include '../../Config/database.php';

$con = Mysql::getInstance();
$graf = new Grafico($con);

$datai = date('Y-m-d', strtotime($_POST['datai']));
$dataf = date('Y-m-d', strtotime($_POST['dataf']));

$retorno = array();

$dataBox[] = $graf->dataSelecionada($datai, $dataf, $retorno, $db, $tabelanode);

echo json_encode($dataBox);
?>
