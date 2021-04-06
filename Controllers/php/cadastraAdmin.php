<?php
session_start();
include '../../Models/Mysql.php';
include '../../Config/database.php';
include '../../Models/Usuarios.php';

$nome = utf8_encode(ucwords(strtolower($_POST['nome'])));
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$palavra = $_POST['palavra'];

if (empty($_POST['acesso']))
{
    $acesso = 'Padrao';
}
else
{
    $acesso = ucwords(strtolower($_POST['acesso']));
}

$con = Mysql::getInstance();
$dbf = new Usuarios($con);
$resultado = $dbf->verificaExistenciaUsers($db, $tabela1, $email);

if (count($resultado) > 0) 
{
    $_SESSION['usuario_existe'] = true;
    header('Location: ../../Views/admin/cadastrarFuncionarios.php');
} 
else
{
    $resultadoCad = $dbf->cadastraUsers($db, $tabela1, $nome, $email, $senha, $palavra, $acesso);

    if ($resultadoCad == true) 
    {
        $_SESSION['status_cadastro'] = true;
        header('Location: ../../Views/admin/funcionarios.php');
    } 
    else 
    {
        $_SESSION['nao_cadastrado'] = true;
        header('Location: ../../Views/admin/cadastrarFuncionarios.php');
    }
}


?>