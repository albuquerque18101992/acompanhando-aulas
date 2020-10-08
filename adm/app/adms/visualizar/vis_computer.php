<?php
//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_pg_vis = "SELECT * FROM adms_equipamentos WHERE id='$id'";
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
                                <h2 class ="display-4 titulo"> Detalhes do equipamento</h2>
                            </div>
                            <div class="p-2">
                                <span class="d-none d-md-block">
                                    <?php
                                    $btn_list = carregar_btn('listar/', $conn);
                                    if ($btn_list) {
                                        echo "<a href='" . pg . "/listar/list_unidades' class='btn btn-outline-info btn-sm'>Listar</a> ";
                                    }
                                    $btn_edit = carregar_btn('editar/', $conn);
                                    if ($btn_edit) {
                                        echo "<a href='" . pg . "/editar/edit_computer?id=" . $row_pag_vis['id'] . "' class='btn btn-outline-warning btn-sm'>Editar </a> ";
                                    }
                                    $btn_apagar = carregar_btn('processa/apagar_unidade', $conn);
                                    if ($btn_apagar) {
                                        echo "<a href='" . pg . "/processa/apagar_unidade?id=" . $row_pag_vis['id'] . "' class='btn btn-outline-danger btn-sm' data-confirm='VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?'>Apagar</a> ";
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
                                            echo "<a class='dropdown-item' href='" . pg . "/listar/?id=" . $row_pag_vis['id'] . "'>Listar</a> ";
                                        }
                                        if ($btn_edit) {
                                            echo "<a class='dropdown-item' href='" . pg . "/editar/?id=" . $row_pag_vis['id'] . "'>Editar</a> ";
                                        }
                                        if ($btn_apagar) {
                                            echo "<a class='dropdown-item' href='" . pg . "/processa/?id=" . $row_pag_vis['id'] . "'data-confirm='VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?'>Apagar</a> ";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-3">ID da equipamento</dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['id']; ?></dd>

                            <dt class="col-sm-3">Número de série CPU</dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['numero_serie_cpu']; ?></dd>

                            <dt class="col-sm-3">Número de série monitor</dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['numero_serie_monitor']; ?></dd>

                            <dt class="col-sm-3">Número de série Mouse </dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['numero_serie_mouse']; ?></dd>

                            <dt class="col-sm-3">Número de série teclado</dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['numero_serie_teclado']; ?></dd>                                                       

                            <dt class="col-sm-3">Número de série T.I da CPU</dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['numero_ti_cpu']; ?></dd>

                            <dt class="col-sm-3">Número de série T.I do monitor</dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['numero_ti_monitor']; ?></dd>

                            <dt class="col-sm-3">Setor onde se enconttra máquina)</dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['adms_setores_id']; ?></dd>

                            <dt class="col-sm-3">Marca/Fabricante</dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['adms_fabricantes_id']; ?></dd>

                            <dt class="col-sm-3">Tipo de contrato</dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['adms_contratos_id']; ?></dd> 

                            <dt class="col-sm-3">Unidade da máquina </dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['adms_unidade_id']; ?></dd>
							
							<dt class="col-sm-3">Informações sobre o equipamento</dt>
                            <dd class="col-sm-9"><?php echo $row_pag_vis['inform_computer']; ?></dd>


                            <dt class="col-sm-3">Data do cadastro</dt>
                            <dd class="col-sm-9"><?php echo date('d/m/Y - H:i:s', strtotime($row_pag_vis['created'])); ?></dd>

                            <dt class="col-sm-3">Data da alteração</dt>
                            <dd class="col-sm-9"><?php
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