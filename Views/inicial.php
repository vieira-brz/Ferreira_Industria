<?php $titulo = "FERREIRA | HOME"; include_once 'layout/header.php'; ?>

    <main class="content">
<!-- 
        PRIMEIRO PARTE DO SITE 
        <section class="section_content d-flex">
            <div class="section_content_apresentation">
                <h1 class="section_content_apresentation_name mb-4">FERREIRA INDÚSTRIA</h1>
                <p class="section_content_apresentation_description">Comércio, Importação e Exportação de Produtos Químicos Ltda.</p>
            </div>
        </section>

            <section class="maps_google_content mb-5 mt-5 d-flex flex-column">
            <h1 class="mb-5 mt-3" style="font-weight: bold;">LOCALIZAÇÃO</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9070.004210690817!2d-49.21148456400598!3d-25.557239532734776!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbe95bf4ba50550ff!2zRmVycmVpcmEgSW5kw7pzdHJpYSwgQ29tw6lyY2lvLCBpbXBvcnRhw6fDo28gZSBFeHBvcnRhw6fDo28gZGUgUHJvZHV0b3MgUXXDrW1pY29zIEx0ZGEu!5e0!3m2!1spt-BR!2sbr!4v1616540090580!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </section> 
-->

        <!-- SEGUNDO PARTE DO SITE -->
        <div class="containerCanvas mb-4">
            <p>POTÊNCIA DIÁRIA</p>
        </div>
        <section class="second_section_content mb-3" style="height: 65vh; width: 100%;">
            <div class="second_section_content_body" style="width: 100%; height: 100%;">
                <canvas class="mb-3" id="dayChart"></canvas>
            </div>
        </section>

        <!-- SEGUNDO PARTE DO SITE -->
        <div class="containerCanvas mb-4 mt-5">
            <p>GASTO ATUAL</p>
        </div>
        <section class="second_section_content mb-3">
            <input value="Carregando potência atual..." class="inputGrafico inputGrafico2" readonly disabled>
            <input value="Carregando gasto atual..." class="inputGrafico" readonly disabled>
            <div class="second_section_content_body" style="width: 100%; height: 400px;">
                <canvas class="mb-3" id="chartGasto"></canvas>
            </div>
        </section>

        <div class="containerCanvas mb-4 mt-5">
            <p>USOS DE ENERGIA SEMANAL</p>
        </div>
        <section class="second_section_content mb-3">
            <div class="second_section_content_body">
                <canvas class="mb-3" id="myChart"></canvas>
            </div>
        </section>

        <!--<div class="containerCanvas mb-4 mt-5">-->
        <!--    <p>HORÁRIOS DE PICO SEMANAL</p>-->
        <!--</div>-->
        <!--<section class="second_section_content mb-3">-->
        <!--    <div class="second_section_content_body">-->
        <!--        <canvas class="mb-3" id="myChart2"></canvas>-->
        <!--    </div>-->
        <!--</section>-->
        
        <div class="containerCanvas mb-4 mt-5">
            <p>GASTO SEMANAL</p>
        </div>
        <section class="second_section_content mb-3">
            <div class="second_section_content_body">
                <canvas class="mb-3" id="myChart3"></canvas>
            </div>
        </section>
        
        <div class="mostraGastos mb-5">
        </div>
    </main>

    <script src="../Scripts/chart.js"></script>
    <script src="../Scripts/chartDiario.js"></script>
    
<?php include_once 'layout/footer.php'; ?>