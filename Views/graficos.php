<?php $titulo = 'FERREIRA | GRÁFICOS'; include 'layout/header.php'; ?>

    <style>
        .content_datas {
            padding: 0 30px 0 30px;
        }
    </style>

    <main class="content" style="height: 76vh;">
        <center><h2 class="mt-5">SELECIONE DUAS DATAS PARA VISUALIZAR O GRÁFICO</h2></center>
        <div class="d-flex justify-content-center mt-5 mb-3">
            <div class="content_datas d-flex">
                <center class="mb-2">
                    <label for="datai">Selecione uma data inicial</label>
                </center>
                <input class="text-center" type="date" name="datai">
            </div>
            <div class="content_datas d-flex">
                <center class="mb-2">
                    <label for="dataf">Selecione uma data final</label>
                </center>
                <input class="text-center" type="date" name="dataf">
            </div>
        </div>

        <div class="d-flex justify-content-center mb-5">
            <center><button class="btn btn-primary" style="width:205px; margin:10px 30px;">Buscar</button></center>
            <center><button class="btn btn-danger" style="width:205px; margin:10px 30px;">Limpar</button></center>
        </div>

        <section class="second_section_content mb-5" style="display:none">
            <div class="second_section_content_body">
                <canvas id="myChart"></canvas>
            </div>
        </section>
    </main>

    <script src="../Scripts/info.js"></script>
    <script src="../Scripts/select_chart.js"></script>

    <footer class="footer">
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