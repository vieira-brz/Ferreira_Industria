<?php session_start(); if(isset($_SESSION['logado'])):header('Location: Views/inicial.php');endif;?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../Content/favicon.ico.png">

    <!-- ARQUIVO CSS -->
    <link rel="stylesheet" href="../Content/style.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- ICONES -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>FERREIRA | CADASTRO</title>
</head>
<body id="body">

    <!-- AREA DE FORMULÁRIO -->
    <div class="container">
        <div class="logMessages text-center">
            <h1 class="logMessages_title mt-5 mb-3">FERREIRA INDÚSTRIA</h1>
            <p class="logMessages_subtitle mb-5">COMÉRCIO, INPORTAÇÃO E EXPORTAÇÃO DE PRODUTOS QUÍMICOS LTDA.</p>
        </div>

        <div class="d-flex justify-content-center">
            <div class="card shadow p-2" style="width: 20rem;">
                <div class="card-body" style="background: var(--cor-principal);">
                    <div class="formulario">
                        <h3 class="mb-1">CADASTRAR</h3>

                        <?php if(isset($_SESSION['usuario_existe'])): ?>
                            <span class="alert_danger afo" role="alert">
                                <label>Usuário já existe.</label>
                            </span>
                        <?php endif; unset($_SESSION['usuario_existe']); ?>

                        <?php if(isset($_SESSION['nao_cadastrado'])): ?>
                            <span class="alert_warning afo" role="alert">
                                <label>Erro ao cadastrar.</label>
                            </span>
                        <?php endif; unset($_SESSION['nao_cadastrado']); ?>

                        <form class="formulario_form" action="../Controllers/php/cadastra.php" method="post">
                            <div class="formulario_form_column">
                                <i class="fas fa-user"></i><input type="text" placeholder="Nome completo" name="nome" required>
                                <i class="fas fa-at"></i><input type="email" placeholder="E-mail" name="email" required>
                                <i class="fas fa-key"></i><input type="password" placeholder="Senha" name="senha" required>
                                <i class="fas fa-lock"></i><input class="mb-3" type="text" placeholder="Palavra-chave" name="palavra" id="pckey" required>
                            </div>

                            <div class="formulario_form_row justify-content-center mb-3">
                                <a href="../index.php">Já possui uma conta?</a>
                            </div>
                        
                            <button class="btn btn-primary mb-2" id="button_exceptions">CADASTRAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="../Scripts/info.js"></script>
</body>
</html>