<?php 
session_start();
include '../../Controllers/php/allUsers.php';

if (empty($_SESSION['logado'])) 
{ header('Location: ../../index.php'); }

if ($_SESSION['acesso'] != 'Master') 
{ header('Location: ../inicial.php'); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../../Content/favicon.ico.png">

    <!-- ARQUIVO CSS -->
    <link rel="stylesheet" href="../../Content/style.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- SWEET ALERT JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- TRENDLINE -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/Chart.min.js"></script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- ICONES -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>FERREIRA | FUNCIONÁRIOS</title>
</head>
<body id="body">

    <header class="header">
        <!-- NAV - CABEÇALHO -->
        <nav class="navbar_off_context d-flex">
            <div class="d-flex justify-content-between">
                <a href="https://www.google.com/search?q=Ferreira+Ind%C3%BAstria+Com%C3%A9rcio+e+Representa%C3%A7%C3%B5es+de+Produtos+Qu%C3%ADmicos" target="blank">
                    <img src="../../Content/assets/logo.png" class="navbar_logo" alt="Logo da empresa"/>
                </a>
                <button class="btnMenu fas fa-bars"></button>
            </div>
            <ul class="navbar_ul d-flex">
                <li class="navbar_ul_li navbar_ul_li_fechado"><a class="navbar_ul_li_a" href="../inicial.php">Home</a></li>
                <li class="navbar_ul_li navbar_ul_li_fechado"><a class="navbar_ul_li_a" href="../sobre.php">Sobre</a></li>
                <li class="navbar_ul_li navbar_ul_li_fechado"><a class="navbar_ul_li_a" href="../contato.php">Contato</a></li>
                <li class="navbar_ul_li navbar_ul_li_fechado"><a class="navbar_ul_li_a" href="../graficos.php">Gráficos</a></li>
                <?php if(isset($_SESSION['acesso']) && $_SESSION['acesso'] == 'Master'): ?>
                    <li class="navbar_ul_li navbar_ul_li_fechado"><a class="navbar_ul_li_a" href="funcionarios.php">Funcionários</a></li>
                <?php endif; ?>
                <li class="navbar_ul_li navbar_ul_li_fechado"><a class="navbar_ul_li_a" href="../conta.php">Conta</a></li>
                <li class="navbar_ul_li navbar_ul_li_fechado" id="liu"><a class="navbar_ul_li_a liu" href="../../Controllers/php/sair">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main class="content cntt d-flex justify-content-center" style="height: 76vh;">
        <div class="card shadow p-2 mt-3 mb-3" style="width: 20rem;">
            <div class="card-body" style="background: var(--cor-principal);">
                <div class="formulario">
                    <h3 class="mb-1">CADASTRAR</h3>

                    <?php if(isset($_SESSION['usuario_existe'])): ?>
                        <script>
                            swal({
                                title: "Erro!",
                                text: "Usuário já existe!",
                                icon: "error",
                                button: "Ok",
                            });
                        </script>
                    <?php endif; unset($_SESSION['usuario_existe']); ?>

                    <?php if(isset($_SESSION['nao_cadastrado'])): ?>
                        <script>
                            swal({
                                title: "Erro!",
                                text: "Usuário não cadastrado!",
                                icon: "success",
                                button: "Ok",
                            });
                        </script>
                    <?php endif; unset($_SESSION['nao_cadastrado']); ?>

                        <form class="formulario_form" action="../../Controllers/php/cadastraAdmin" method="post">
                            <div class="formulario_form_column">
                                <i class="fas fa-user"></i><input type="text" placeholder="Nome completo" name="nome" required>
                                <i class="fas fa-at"></i><input type="email" placeholder="E-mail" name="email" required>
                                <i class="fas fa-key"></i><input type="password" placeholder="Senha" name="senha" required>
                                <i class="fas fa-key"></i><input type="text" placeholder="Palavra-chave" name="palavra" id="pckey" required>
                                <i class="fas fa-key"></i><input class="mb-3" type="text" placeholder="Acesso" name="acesso" required>
                            </div>
                            <button class="btn btn-primary mb-2" id="button_exceptions">CADASTRAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <!-- PRIMEIRA PARTE FOOTER -->
        <div class="footer_copyright d-flex">
            TODOS OS DIREITOS RESERVADOS &nbsp - &nbsp FERREIRA ©
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="../../Scripts/menu.js"></script>
    <script src="../../Scripts/info.js"></script>
</body>
</html>