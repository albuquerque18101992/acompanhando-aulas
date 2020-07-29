<?php
//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

include_once 'app/adms/include/head.php';
?>

<body>

    <?php
    include_once 'app/adms/include/header.php';
    ?>

    <div class="d-flex">
        <?php
        include_once 'app/adms/include/menu.php';
        ?>

        <div class="content p-1">
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p2">
                        <h2 class ="display-4 titulo"> Dashboard </h2>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <i class="fas fa-users-cog fa-3x"></i>
                                <h6 class="card-title">Usuários</h6>
                                <h2 class="lead">148</h2>
                            </div>
                        </div>
                    </div>                      
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <i class="fas fa-file-medical fa-3x"></i>
                                <h6 class="card-title">Artigos</h6>
                                <h2 class="lead">64</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <i class="fas fa-eye fa-3x"></i>
                                <h6 class="card-title">Visitas</h6>
                                <h2 class="lead">2648</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <i class="fas fa-comments fa-3x"></i>
                                <h6 class="card-title">Comentários</h6>
                                <h2 class="lead">941</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <i class="fas fa-user-tie fa-3x"></i>
                                <h6 class="card-title">Administradores</h6>
                                <h2 class="lead">148</h2>
                            </div>
                        </div>
                    </div>                      
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-light text-black">
                            <div class="card-body">
                                <i class="far fa-keyboard fa-3x"></i>
                                <h6 class="card-title">Acessos</h6>
                                <h2 class="lead">64</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <i class="fas fa-print fa-3x"></i>
                                <h6 class="card-title">Impressoras</h6>
                                <h2 class="lead">1420</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-secondary text-white">
                            <div class="card-body">
                                <i class="fas fa-university fa-3x"></i>
                                <h6 class="card-title">Unidades</h6>
                                <h2 class="lead">53</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <?php
        include_once 'app/adms/include/rodape_lib.php';
        ?>
    </div>
</body>
