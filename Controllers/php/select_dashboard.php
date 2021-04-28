<?php
session_start();
include '../../Models/Grafico.php';
include '../../Models/Mysql.php';
include '../../Config/database.php';

$con = Mysql::getInstance();
$graf = new Grafico($con);

$datai = $_POST['inicial'];
$dataf = $_POST['final'];

$retorno = array();

$dataBox[] = $graf->dataSelecionada($datai, $dataf, $retorno, $db, $tabelanode);

echo json_encode($dataBox);
?>
