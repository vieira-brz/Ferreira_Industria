<?php
session_start();
    unset($_SESSION['logado']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['acesso']);
session_destroy();

$con = null;
header('Location: ../../index.php');
?>