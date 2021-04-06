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
                <?php if(isset($_SESSION['acesso']) && $_SESSION['acesso'] == 'Master'): ?>
                    <li class="navbar_ul_li navbar_ul_li_fechado"><a class="navbar_ul_li_a" href="funcionarios.php">Funcionários</a></li>
                <?php endif; ?>
                <li class="navbar_ul_li navbar_ul_li_fechado"><a class="navbar_ul_li_a" href="../mais.php">Conta</a></li>
                <li class="navbar_ul_li navbar_ul_li_fechado" id="liu"><a class="navbar_ul_li_a liu" href="../../Controllers/php/sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main class="content cntt">
        <?php if (isset($_SESSION['deletado'])): ?>
            <div class="alert alert-success">
                <label>Deletado com sucesso!</label>
            </div>
        <?php endif; unset($_SESSION['deletado']); ?>

        <?php if (isset($_SESSION['alterado'])): ?>
            <div class="alert alert-success">
                <label>Alterado com sucesso!</label>
            </div>
        <?php endif; unset($_SESSION['alterado']); ?>

        <?php if (isset($_SESSION['nao_deletado'])): ?>
            <div class="alert alert-danger">
                <label>Não deletado!</label>
            </div>
        <?php endif; unset($_SESSION['nao_deletado']); ?>

        <?php if (isset($_SESSION['nao_alterado'])): ?>
            <div class="alert alert-danger">
                <label>Não alterado!</label>
            </div>
        <?php endif; unset($_SESSION['nao_alterado']); ?>

        <?php if(isset($_SESSION['status_cadastro'])): ?>
            <div class="alert alert-success">
                <label>Cadastrado com sucesso.</label>
            </div>
        <?php endif; unset($_SESSION['status_cadastro']); ?>

        <table class="table table-striped table-bordered table-dark">
            <tbody>
                <tr>
                    <td style="color: #fff;">MATRÍCULA</td>
                    <td style="color: #fff;">NOME</td>
                    <td style="color: #fff;">ACESSO</td>
                    <td style="color: #fff;">AÇÕES</td>
                    <td style="color: #fff;">NOVO</td>
                </tr>
                
        <?php 
        foreach ($dados as $key)
        {
            echo 
            '
            <tr>
                <td>'.$key['ID'].'</td>
                <td>'.$key['NOME'].'</td>
                <td>'.$key['ACESSO'].'</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <form action="editarFuncionarios.php" method="post">
                            <input type="hidden" name="IDED" value="'.$key['ID'].'">
                            <button class="btn btn-primary">EDITAR</button>
                        </form>
                        &nbsp
                        <form action="../../Controllers/php/excluirUsers.php" method="post">
                            <input type="hidden" name="IDEX" value="'.$key['ID'].'">
                            <button class="btn btn-danger">EXCLUIR</button>
                        </form>
                    </div>
                </td>
                <td>
                    <a href="cadastrarFuncionarios.php"><i style="color: #fff;" class="fas fa-user-plus"></i></a> 
                </td>
            </tr>
            ';
        }
        ?>

            </tbody>
        </table>
    </main>

    <footer class="footer">
        <!-- PRIMEIRA PARTE FOOTER -->
        <div class="footer_copyright d-flex">
            TODOS OS DIREITOS RESERVADOS &nbsp - &nbsp FERREIRA ©
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="../../Scripts/menu.js"></script>
</body>
</html>