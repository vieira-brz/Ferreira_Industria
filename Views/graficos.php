<?php $titulo = 'FERREIRA | GRÁFICOS'; include 'layout/header.php'; ?>

    <style>
        .content_datas {
            padding: 0 30px 0 30px;
        }
    </style>

    <div class="carregamento" style="display:none;">
        <center>
            <img src="../Content/assets/load-unscreen.gif" alt="Carregamento">
            <br>
            <text style="font-weight:bold; font-size:20px">Carregando Dados</text>
        </center>
    </div>

    <main class="content">
        <center><h2 class="mt-5">SELECIONE DUAS DATAS PARA VISUALIZAR O GRÁFICO</h2></center>
        <div class="d-flex justify-content-center mt-5 mb-1 content_data_select">
            <div class="content_datas d-flex mb-3">
                <center class="mb-2">
                    <label for="datai">Selecione uma data inicial</label>
                </center>
                <input class="text-center" type="date" name="datai">
            </div>
            <div class="content_datas d-flex mb-3">
                <center class="mb-2">
                    <label for="dataf">Selecione uma data final</label>
                </center>
                <input class="text-center" type="date" name="dataf">
            </div>
        </div>

        <div class="d-flex justify-content-center mb-5 content_buttons_select">
            <center><button class="btn btn-primary" style="width:205px; margin:10px 30px;">Buscar</button></center>
            <center><button class="btn btn-danger" style="width:205px; margin:10px 30px;">Limpar</button></center>
        </div>

        <section class="second_section_content mb-5" style="display:none">
            <div class="second_section_content_body">
                <canvas id="myChartSelected"></canvas>
            </div>
        </section>

        <div class="mostraGastos mb-5" style="display:none">
        </div>
    </main>

    <script src="../Scripts/info.js"></script>
    <script src="../Scripts/select_chart.js"></script>

    <footer class="footer" style="margin-bottom: -1% !important;">
        <!-- PRIMEIRA PARTE FOOTER -->
        <div class="footer_copyright d-flex">
            TODOS OS DIREITOS RESERVADOS &nbsp - &nbsp FERREIRA ©
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="../Scripts/menu.js"></script>
    <script src="../Scripts/info.js"></script>
    <script src="../Scripts/select_chart.js"></script>
</body>
</html>