<?php $titulo = "FERREIRA | HOME"; include_once 'layout/header.php'; ?>

    <main class="content">
        <!-- PRIMEIRO PARTE DO SITE -->
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

        <!-- SEGUNDO PARTE DO SITE -->
        <section class="second_section_content mb-3">
            <div class="second_section_content_body">
                <form action="../Controllers/php/dashboard.php"></form>
                <canvas id="myChart"></canvas>
            </div>
        </section>
        
        <div class="mostraGastos mb-5">
        </div>
    </main>

    <script src="../Scripts/chart.js"></script>
    
<?php include_once 'layout/footer.php'; ?>