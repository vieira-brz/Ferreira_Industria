<?php $titulo = "FERREIRA | MAIS"; include_once 'layout/header.php'; ?>
    
    <main class="content" style="padding: 20px;">
        <div class="container mt-3">
            <div class="main-body">            
                <div class="row gutters-sm d-flex justify-content-center">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <i class="fas fa-user-tie" style="font-size: 150px;"></i>
                                <div class="mt-3">
                                <h4 style="font-weight: bold;"><?php echo $_SESSION['primeiroNome']; ?></h4>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                            <div class="row mb-1 mt-1">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $_SESSION['nome']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-1 mt-1">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $_SESSION['email']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-1 mt-1">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Senha</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $_SESSION['senha']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-1 mt-1">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Acesso</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $_SESSION['acesso']; ?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include_once 'layout/footer.php'; ?>