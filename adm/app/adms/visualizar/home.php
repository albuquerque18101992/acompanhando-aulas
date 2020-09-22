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
                                <?php
                                $result_usuarios = "SELECT * FROM adms_usuarios";
                                $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                                $total_usuarios = mysqli_num_rows($resultado_usuarios)
                                ?>
                                <h2 class="lead"><?php echo "$total_usuarios"; ?></h2>
                            </div>
                        </div>
                    </div>                      
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <i class="fas fa-file-medical fa-3x"></i>
                                <h6 class="card-title">Documentos PHP</h6>
                                <?php
                                $result_pgs = "SELECT * FROM adms_paginas";
                                $resultado_pgs = mysqli_query($conn, $result_pgs);
                                $total_pgs = mysqli_num_rows($resultado_pgs)
                                ?>
                                <h2 class="lead"><?php echo "$total_pgs"; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <i class="fas fa-eye fa-3x"></i>
                                <h6 class="card-title">Níveis de Acesso</h6>
                                <?php
                                $result_acessos = "SELECT * FROM adms_niveis_acessos";
                                $resultado_acessos = mysqli_query($conn, $result_acessos);
                                $total_niveis_acessos = mysqli_num_rows($resultado_acessos)
                                ?>
                                <h2 class="lead"><?php echo "$total_niveis_acessos"; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <i class="fa fa-hospital-o fa-3x"></i>
                                <h6 class="card-title">Unidades</h6>
                                <?php
                                $result_unidades = "SELECT * FROM adms_unidades ";
                                $resultado_unidades = mysqli_query($conn, $result_unidades);
                                $total_unidades = mysqli_num_rows($resultado_unidades);
                                ?>
                                <h2 class="lead"><?php echo"$total_unidades"; ?></h2>
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
