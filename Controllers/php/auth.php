<?php
session_start();
include '../../Models/Mysql.php';
include '../../Config/database.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$dbf = new Mysql;

if (isset($email) && !empty($email) && isset($senha) && !empty($senha)) 
{
    $query = "SELECT * FROM ".$db.".".$tabela1." WHERE EMAIL = '". $email ."' AND SENHA = '".md5($senha)."'";
    $dados = $dbf->readQuery($query);

    if (count($dados) == 1) 
    {
        $_SESSION['nome'] = utf8_encode($dados[0]['NOME']);

        $primeiroNome = explode(" ", $dados[0]['NOME']);
        $_SESSION['primeiroNome'] = utf8_encode(strtoupper($primeiroNome[0]));

        $_SESSION['email'] = $dados[0]['EMAIL'];
        $_SESSION['senha'] = $dados[0]['SENHA'];
        $_SESSION['acesso'] = $dados[0]['ACESSO'];
        $_SESSION['logado'] = true;

        header('Location: ../../Views/inicial.php');
        exit();
    }

    else
    {
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../../index.php');
        exit();
    }
}
?>