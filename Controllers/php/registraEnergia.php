<?php
session_start();
include '../../Config/database.php';
include '../../Models/Mysql.php';

if (isset($_GET['valor']) && !empty($_GET['valor']))
{
    $valor = $_GET['valor'];

    $dbf = new Mysql;
    $campos = '(potenciamento)';
    $values = 'VALUES('.$valor.')';
    $dados = $dbf->insertQuery($db, $tabelanode, $campos, $values);
}

?>