<?php
session_start();
    unset($_SESSION['logado']);
session_destroy();

$con = null;
header('Location: ../../index.php');
?>