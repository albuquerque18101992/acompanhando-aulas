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
                                            echo "<a class='dropdown-item' href='" . pg . "/editar/list_npagina?id=" . $row_pag_vis['id'] . "'>Editar</a> ";
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
                            <dt class="col-sm-3">ID</dt>
                            <dd class="col-sm-4"><?php echo $row_pag_vis['id']; ?></dd>
                            <dd class="col-sm-5" > Campo ID da página cadastrada no banco de dados. </dd>

                            <dt class="col-sm-3">Nome Página</dt>
                            <dd class="col-sm-4"><?php echo $row_pag_vis['nome_pagina']; ?></dd>
                            <dd class="col-sm-5" > Neste campo como o nome já mostra temos o nome da página. </dd>

                            <dt class="col-sm-3">Endereço Página</dt>
                            <dd class="col-sm-4"><?php echo $row_pag_vis['endereco']; ?></dd>
                            <dd class="col-sm-5" > Caminho do arquivo. </dd>

                            <dt class="col-sm-3">Observações da Página</dt>
                            <dd class="col-sm-4"><?php echo $row_pag_vis['obs']; ?></dd>
                            <dd class="col-sm-5" > Observações feita pelo Desenvolvedor. </dd>

                            <dt class="col-sm-3">Chaves de Identificação</dt>
                            <dd class="col-sm-4"><?php echo $row_pag_vis['keywords']; ?></dd>
                            <dd class="col-sm-5" > Palavras chaves para os robos do google. </dd>

                            <dt class="col-sm-3">Descrições</dt>
                            <dd class="col-sm-4"><?php echo $row_pag_vis['description']; ?></dd>
                            <dd class="col-sm-5" > Neste campo como o nome já mostra temos o nome da página. </dd>

                            <dt class="col-sm-3">Desenvolvedor da Página</dt>
                            <dd class="col-sm-4"><?php echo $row_pag_vis['author']; ?></dd>
                            <dd class="col-sm-5" > Programador, Desenvolvedor ou Equipe do projeto. </dd>

                            <dt class="col-sm-3">Liberação ao Público </dt>
                            <dd class="col-sm-4"><?php
                                if ($row_pag_vis['lib_pub'] == 1) {
                                    echo "<span class='badge badge-success'>Sim, liberado ao público</span>";
                                } else {
                                    echo "<span class='badge badge-danger'>Não, liberado ao público</span>";
                                }
                                ?></dd>
                            <dd class="col-sm-5" > Liberação ao público. </dd>

                            <dt class="col-sm-3">Descriçaõ do Ícone </dt>
                            <dd class="col-sm-4"><?php
                                if (!empty($row_pag_vis['icone'])) {
                                    echo "<i class = '" . $row_pag_vis['icone'] . "'></i> : " . $row_pag_vis['icone'];
                                } else {
                                    echo "Não contém ícone";
                                }
                                ?></dd>
                            <dd class="col-sm-5" > Campo com o nome do ícone mostrado na página. </dd>

                            <dt class="col-sm-3">Dependências de outras Páginas</dt>
                            <dd class="col-sm-4"><?php
                                if ($row_pag_vis['nome_depg'] != 0) {
                                    echo "<a href = '" . pg . "/visualizar/vis_pagina?id=" . $row_pag_vis['id_depg'] . "'>" . $row_pag_vis['nome_depg'] . "</a>";
                                } else {
                                    echo "<span class='badge badge-danger'>Não depende de outras páginas</span>";
                                }
                                ?></dd>
                            <dd class="col-sm-5" > Caso a página dependa de outra página teremos aqui o ID na página. </dd>

                            <dt class="col-sm-3">Grupo</dt>
                            <dd class="col-sm-4"><?php echo $row_pag_vis['nome_grpg']; ?></dd>
                            <dd class="col-sm-5" > Qual grupo a página pertence. </dd>

                            <dt class="col-sm-3">Projeto</dt>
                            <dd class="col-sm-4"><?php echo $row_pag_vis['tipo_tpg'] . " - " . $row_pag_vis['nome_tpg']; ?></dd>
                            <dd class="col-sm-5" > Qual o diretório/projeto. </dd>

                            <dt class="col-sm-3">Indexar ou não</dt>
                            <dd class="col-sm-4"><?php
                                echo $row_pag_vis['tipo_rb'] . " - " . $row_pag_vis['nome_rb'];
                                ?></dd>
                            <dd class="col-sm-5" > Caso queira indexar suas páginas aos robos do google. </dd>

                            <dt class="col-sm-3">Situação da página</dt>
                            <dd class="col-sm-4"><?php
                                echo "<span class='badge badge-" . $row_pag_vis['cor'] . "'>" . $row_pag_vis['nome_sitpg'] . "</span>";
                                ?></dd>
                            <dd class = "col-sm-5" > Situação da página. </dd>

                            <dt class = "col-sm-3 text-truncate">Data do cadastro</dt>
                            <dd class = "col-sm-4"><?php echo date('d/m/Y - H:i:s', strtotime($row_pag_vis['created']));
                                ?></dd>
                            <dd class="col-sm-5" > Data de inserção/criação do dado. </dd>

                            <dt class="col-sm-3 text-truncate">Data do alteração</dt>
                            <dd class="col-sm-4">
                            <dd class="col-sm-5" > Qualquer mudança de informação na página ficará registrado a data do acontecimento. </dd>
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