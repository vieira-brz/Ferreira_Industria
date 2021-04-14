<?php $titulo = "FERREIRA | CONTATO"; include_once 'layout/header.php'; ?>

    <main class="content" style="height: 76vh;">
        <center><h2 class="logMessages_title mt-5 mb-3">SELECIONE A FORMA DE CONTATO QUE DESEJA UTILIZAR.</h2></center>
        <div class="container ctcards">
            <div class="card col-md-3 cardct">
                <div class="card-body cdbd bg-primary">
                    <a href="mailto:ferreira@gmail.com?subject=Assunto:%20&body=Boa tarde, Ferreira Indústria%0A%0AEscreva sua mensagem...%0A%0AAss: ...%0A%0A"><i class="fas fa-envelope"></i></a>
                </div>
                <div class="mt-3 text-center d-flex justify-content-center">
                    <small>Redirecionamento para o &nbsp</small><small>E-mail.</small>
                </div>
            </div>
        
            <div class="card col-md-3 cardct">
                <div class="card-body cdbd bg-success">
                    <a href="https://api.whatsapp.com/send?phone=55419xxxxxxxx&text=Olá,%20Ferreira%20Indústria!" target="blank"><i class="fas fa-phone-alt"></i></a>
                </div>
                <div class="mt-3 text-center d-flex justify-content-center">
                    <small>Redirecionamento o &nbsp</small><small>WhatsApp Web.</small>
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
    <script src="../Scripts/info.js"></script>
    <script src="../Scripts/menu.js"></script>
</body>
</html>