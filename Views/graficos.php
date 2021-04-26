<?php $titulo = 'FERREIRA | GRÁFICOS'; include 'layout/header.php'; ?>

    <style>
        .content_datas {
            padding: 0 30px 0 30px;
        }
    </style>

    <main class="content">
        <div class="d-flex justify-content-center mt-5">
            <div class="content_datas">
                <label for="datai">Selecione uma data inicial: &nbsp</label>
                <input type="date" name="datai">
            </div>
            <div class="content_datas">
                <label for="datai">Selecione uma data final: &nbsp</label>
                <input type="date" name="dataf">
            </div>
            <button class="btn btn-primary">Buscar</button>
        </div>

        <section class="second_section_content mt-5 mb-5">
            <div class="second_section_content_body">
                <form action="../Controllers/php/dashboard.php"></form>
                <canvas id="myChart"></canvas>
            </div>
        </section>
    </main>

    <script src="../Scripts/info.js"></script>
    <script src="../Scripts/select_chart.js"></script>

<?php include 'layout/footer.php'; ?>