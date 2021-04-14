<?php
session_start();
include '../../Models/Mysql.php';
include '../../Config/database.php';
include '../../Models/Usuarios.php';

$con = Mysql::getInstance();
$users = new Usuarios($con);

$email = $_SESSION['email'];
$emailnovo = $_POST['email'];

$resultado = $users->verificaExistenciaUsers($db, $tabela1, $emailnovo);

if (count($resultado) > 0) 
{
    $dados = 3;
}
else
{
    $dados = $users->alteraSomenteEmail($db, $tabela1, $emailnovo, $email);
}

echo $dados;
?>