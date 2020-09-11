<?php
//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
//Recer o numero da página 
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual) ? $pagina_atual : 1);

//Setar quantidade de itens por pagina
    $qnt_result_pg = 50;

//calcular o inicio visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    if ($_SESSION['adms_niveis_acesso_id'] == 1) {
        $result_niv_ac = "SELECT * FROM adms_nivacs_pgs WHERE adms_niveis_acesso_id='$id' ORDER BY ordem ASC LIMIT $inicio, $qnt_result_pg";
    } else {
        
    }

    $resultado_niv_ac = mysqli_query($conn, $result_niv_ac);

//Verificar se encontrou algum cadastro
    if (($resultado_niv_ac)AND ( $resultado_niv_ac->num_rows != 0)) {


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
                            <div class="mr-auto p-2">
                                <h2 class="display-4 titulo">Listar Permissões</h2>
                            </div>
                            <div class="p-2">
                                <?php
                                $btn_cad = carregar_btn('cadastrar/cad_pagina', $conn);
                                if ($btn_cad) {
                                    echo "<a href='" . pg . "/cadastrar/cad_pagina' class='btn btn-outline-success btn-sm'>Cadastrar</a>";
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Página</th>
                                        <th class="d-none d-sm-table-cell">Permissão</th>
                                        <th class="d-none d-sm-table-cell">Menu</th>
                                        <th class="d-none d-sm-table-cell">Dropdown</th>
                                        <th class="d-none d-sm-table-cell">Ordem</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>                        
                    </div>


                    <?php
                    include_once 'app/adms/include/rodape_lib.php';
                    ?>
                </div>
            </div>
        </body>

        <?php
    } else {
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Permissão não encontrada!</div>";
        $url_destino = pg . '/listar/list_niv_aces';
        header("Location: $url_destino");
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}
?>