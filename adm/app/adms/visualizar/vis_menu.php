<?php
//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_men_vis = "SELECT men.*,
        sit.nome nome_sit,
        cors.cor cor_cors
        FROM adms_menus men
        INNER JOIN adms_sits sit ON sit.id=men.adms_sit_id
        INNER JOIN adms_cors cors ON cors.id=sit.adms_cor_id
        WHERE men.id=$id LIMIT 1";
    $resultado_men_vis = mysqli_query($conn, $result_men_vis);
    if (($resultado_men_vis) AND ( $resultado_men_vis->num_rows != 0)) {
        $row_men_vis = mysqli_fetch_assoc($resultado_men_vis);
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
                                <h2 class ="display-4 titulo"> Detalhes do menu </h2>
                            </div>
                            <div class="p-2">
                                <span class="d-none d-md-block">
                                    <?php
                                    $btn_list = carregar_btn('listar/list_menu', $conn);
                                    if ($btn_list) {
                                        echo "<a href='" . pg . "/listar/list_menu' class='btn btn-outline-info btn-sm'>Listar</a> ";
                                    }
                                    $btn_edit = carregar_btn('editar/edit_menu', $conn);
                                    if ($btn_edit) {
                                        echo "<a href='" . pg . "/editar/edit_menu?id=" . $row_men_vis['id'] . "' class='btn btn-outline-warning btn-sm'>Editar </a> ";
                                    }
                                    $btn_apagar = carregar_btn('processa/apagar_menu', $conn);
                                    if ($btn_apagar) {
                                        echo "<a href='" . pg . "/processa/apagar_menu?id=" . $row_men_vis['id'] . "' class='btn btn-outline-danger btn-sm' data-confirm='VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?'>Apagar</a> ";
                                    }
                                    ?>
                                </span>
                                <div class="dropdown d-block d-md-none">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                        <?php
                                        if ($btn_list) {
                                            echo "<a class='dropdown-item' href='" . pg . "/listar/list_menu?id=" . $row_men_vis['id'] . "'>Listar</a> ";
                                        }
                                        if ($btn_edit) {
                                            echo "<a class='dropdown-item' href='" . pg . "/editar/edit_menu?id=" . $row_men_vis['id'] . "'>Editar</a> ";
                                        }
                                        if ($btn_apagar) {
                                            echo "<a class='dropdown-item' href='" . pg . "/processa/apagar_menu?id=" . $row_men_vis['id'] . "'data-confirm='VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?'>Apagar</a> ";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-6">ID</dt>
                            <dd class="col-sm-6"><?php echo $row_men_vis['id']; ?></dd>

                            <dt class="col-sm-6">Nome</dt>
                            <dd class="col-sm-6"><?php echo $row_men_vis['nome']; ?></dd>

                            <dt class="col-sm-6">Ícone do menu</dt>
                            <dd class="col-sm-6"><?php
                                if (!empty($row_men_vis['icone'])) {
                                    echo "<i class = '" . $row_men_vis['icone'] . "'></i> | " . $row_men_vis['icone'];
                                } else {
                                    echo "Não contém ícone";
                                }
                                ?></dd>

                            <dt class="col-sm-6">Ordem</dt>
                            <dd class="col-sm-6"><?php echo $row_men_vis['ordem']; ?></dd>

                            <dt class="col-sm-6">Situação</dt>
                            <dd class="col-sm-6"><?php
                                echo "<span class='badge badge-" . $row_men_vis['cor_cors'] . "'>" . $row_men_vis['nome_sit'] . "</span>";
                                ?>
                            </dd>

                            <dt class = "col-sm-6 text-truncate">Data do cadastro</dt>
                            <dd class = "col-sm-6"><?php echo date('d/m/Y - H:i:s', strtotime($row_men_vis['created']));
                                ?></dd>

                            <dt class="col-sm-6 text-truncate">Data do alteração</dt>
                            <dd class="col-sm-6">
                                <?php
                                if (!empty($row_men_vis['modified'])) {
                                    echo date('d/m/Y - H:i:s', strtotime($row_men_vis['modified']));
                                }
                                ?>
                        </dl>

                    </div>
                </div>

                <?php
                include_once 'app/adms/include/rodape_lib.php';
                ?>
            </div>
        </body>
        <?php
    } else {
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Menu não encontrada!</div>";
        $url_destino = pg . '/listar/list_menu';
        header("Location: $url_destino");
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}