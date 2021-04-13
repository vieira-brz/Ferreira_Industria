<?php
session_start();
include '../../Models/Mysql.php';
include '../../Config/database.php';
include '../../Models/Usuarios.php';

$con = Mysql::getInstance();
$users = new Usuarios($con);

$email = $_POST['email'];
$senha = md5($_POST['senha']);
$palavra = $_POST['palavra'];

$dados = $users->verificaExistenciaUsers($db, $tabela1, $email);

$id = $dados[0]['ID'];
$palavra_db = $dados[0]['PALAVRA'];

if ($palavra == $palavra_db)
{
    $users->alteraSenha($db, $tabela1, $senha, $id);
}
else
{
    $_SESSION['wordkey_error'] = true;
    header('Location: ../../Views/relembrar-senha.php');
}
?>