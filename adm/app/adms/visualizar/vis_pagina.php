<?php
//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_pg_vis = "SELECT pg. * ,
            grpg.nome nome_grpg,
            tpg.tipo tipo_tpg, tpg.nome nome_tpg,
            rb.tipo tipo_rb, rb.nome nome_rb,
            sitpg.nome nome_sitpg, sitpg.cor,
            depg.id id_depg, depg.nome_pagina nome_depg
            FROM adms_paginas pg
            LEFT JOIN adms_grps_pgs grpg ON grpg.id=pg.adms_grps_pg_id
            LEFT JOIN adms_tps_pgs tpg ON tpg.id=pg.adms_tps_pg_id
            LEFT JOIN adms_robots rb ON rb.id=pg.adms_robot_id
            INNER JOIN adms_sits_pgs sitpg ON sitpg.id=pg.adms_sits_pg_id
            LEFT JOIN adms_paginas depg ON depg.id=pg.depend_pg
            WHERE pg.id=$id LIMIT 1";
    $resultado_pg_vis = mysqli_query($conn, $result_pg_vis);
    if (($resultado_pg_vis) AND ( $resultado_pg_vis->num_rows != 0)) {
        $row_pag_vis = mysqli_fetch_assoc($resultado_pg_vis);
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
                                <h2 class ="display-4 titulo"> Detalhe da Página </h2>
                            </div>
                            <div class="p-2">
                                <span class="d-none d-md-block">
                                    <?php
                                    $btn_list = carregar_btn('listar/list_pagina', $conn);
                                    if ($btn_list) {
                                        echo "<a href='" . pg . "/listar/list_pagina' class='btn btn-outline-info btn-sm'>Listar</a> ";
                                    }
                                    $btn_edit = carregar_btn('editar/edit_pagina', $conn);
                                    if ($btn_edit) {
                                        echo "<a href='" . pg . "/editar/edit_pagina?id=" . $row_pag_vis['id'] . "' class='btn btn-outline-warning btn-sm'>Editar </a> ";
                                    }
                                    $btn_apagar = carregar_btn('processa/apagar_pagina', $conn);
                                    if ($btn_apagar) {
                                        echo "<a href='" . pg . "/processa/apagar_pagina?id=" . $row_pag_vis['id'] . "' class='btn btn-outline-danger btn-sm' data-confirm='VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?'>Apagar</a> ";
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
                                            echo "<a class='dropdown-item' href='" . pg . "/listar/list_pagina?id=" . $row_pag_vis['id'] . "'>Listar</a> ";
                                        }
                                        if ($btn_edit) {
                                            echo "<a class='dropdown-item' href='" . pg . "/editar/edit_pagina?id=" . $row_pag_vis['id'] . "'>Editar</a> ";
                                        }
                                        if ($btn_apagar) {
                                            echo "<a class='dropdown-item' href='" . pg . "/processa/apagar_pagina?id=" . $row_pag_vis['id'] . "'data-confirm='VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?'>Apagar</a> ";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-6">ID</dt>
                            <dd class="col-sm-6"><?php echo $row_pag_vis['id']; ?></dd>

                            <dt class="col-sm-6">Nome Página</dt>
                            <dd class="col-sm-6"><?php echo $row_pag_vis['nome_pagina']; ?></dd>

                            <dt class="col-sm-6">Endereço Página</dt>
                            <dd class="col-sm-6"><?php echo $row_pag_vis['endereco']; ?></dd>

                            <dt class="col-sm-6">Observações da Página</dt>
                            <dd class="col-sm-6"><?php echo $row_pag_vis['obs']; ?></dd>

                            <dt class="col-sm-6">Chaves de Identificação</dt>
                            <dd class="col-sm-6"><?php echo $row_pag_vis['keywords']; ?></dd>

                            <dt class="col-sm-6">Descrições</dt>
                            <dd class="col-sm-6"><?php echo $row_pag_vis['description']; ?></dd>

                            <dt class="col-sm-6">Desenvolvedor da Página</dt>
                            <dd class="col-sm-6"><?php echo $row_pag_vis['author']; ?></dd>

                            <dt class="col-sm-6">Liberação ao Público </dt>
                            <dd class="col-sm-6"><?php
                                if ($row_pag_vis['lib_pub'] == 1) {
                                    echo "<span class='badge badge-success'>Sim, liberado ao público</span>";
                                } else {
                                    echo "<span class='badge badge-danger'>Não, liberado ao público</span>";
                                }
                                ?></dd>

                            <dt class="col-sm-6">Descriçaõ do Ícone </dt>
                            <dd class="col-sm-6"><?php
                                if (!empty($row_pag_vis['icone'])) {
                                    echo "<i class = '" . $row_pag_vis['icone'] . "'></i> : " . $row_pag_vis['icone'];
                                } else {
                                    echo "Não contém ícone";
                                }
                                ?></dd>

                            <dt class="col-sm-6">Dependências de outras Páginas</dt>
                            <dd class="col-sm-6"><?php
                                if ($row_pag_vis['nome_depg'] != 0) {
                                    echo "<a href = '" . pg . "/visualizar/vis_pagina?id=" . $row_pag_vis['id_depg'] . "'>" . $row_pag_vis['nome_depg'] . "</a>";
                                } else {
                                    echo "<span class='badge badge-danger'>Não depende de outras páginas</span>";
                                }
                                ?></dd>

                            <dt class="col-sm-6">Grupo</dt>
                            <dd class="col-sm-6"><?php echo $row_pag_vis['nome_grpg']; ?></dd>

                            <dt class="col-sm-6">Projeto</dt>
                            <dd class="col-sm-6"><?php echo $row_pag_vis['tipo_tpg'] . " - " . $row_pag_vis['nome_tpg']; ?></dd>

                            <dt class="col-sm-6">Indexar ou não</dt>
                            <dd class="col-sm-6"><?php
                                echo $row_pag_vis['tipo_rb'] . " - " . $row_pag_vis['nome_rb'];
                                ?></dd>

                            <dt class="col-sm-6">Situação da página</dt>
                            <dd class="col-sm-6"><?php
                                echo "<span class='badge badge-" . $row_pag_vis['cor'] . "'>" . $row_pag_vis['nome_sitpg'] . "</span>";
                                ?></dd>

                            <dt class = "col-sm-6 text-truncate">Data do cadastro</dt>
                            <dd class = "col-sm-6"><?php echo date('d/m/Y - H:i:s', strtotime($row_pag_vis['created']));
                                ?></dd>

                            <dt class="col-sm-6 text-truncate">Data do alteração</dt>
                            <dd class="col-sm-6">
                            <?php
                            if (!empty($row_pag_vis['modified'])) {
                                echo date('d/m/Y - H:i:s', strtotime($row_pag_vis['modified']));
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
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
        $url_destino = pg . '/listar/list_pagina';
        header("Location: $url_destino");
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}