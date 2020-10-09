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
    $qnt_result_pg = 60;

    //calcular o inicio visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
    //if para super-administrador
    if ($_SESSION['adms_niveis_acesso_id'] == 1) {
        $result_niv_ac = "SELECT nivpg. *,
        pg.nome_pagina, pg.obs
        FROM adms_nivacs_pgs nivpg
        INNER JOIN adms_paginas pg ON pg.id=nivpg.adms_pagina_id
        WHERE nivpg.adms_niveis_acesso_id='$id' AND pg.depend_pg=0
        ORDER BY nivpg.ordem ASC 
        LIMIT $inicio, $qnt_result_pg";
        //else para outro niveis de acesso
    } else {
        $result_niv_ac = "SELECT nivpg. *,
        pg.nome_pagina, pg.obs
        FROM adms_nivacs_pgs nivpg
        INNER JOIN adms_paginas pg ON pg.id=nivpg.adms_pagina_id
        WHERE nivpg.adms_niveis_acesso_id='$id' 
        ORDER BY nivpg.ordem ASC 
        LIMIT $inicio, $qnt_result_pg";
    }

    $resultado_niv_ac = mysqli_query($conn, $result_niv_ac);

    //Verificar se encontrou algum cadastro
    if (($resultado_niv_ac) and ( $resultado_niv_ac->num_rows != 0)) {


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
                                <?php
                                $result_nome_niv_ac = "SELECT nome FROM adms_niveis_acessos WHERE id='$id' LIMIT 1";
                                $resultado_nome_niv_ac = mysqli_query($conn, $result_nome_niv_ac);
                                $row_nome_niv_ac = mysqli_fetch_assoc($resultado_nome_niv_ac);
                                ?>
                                <h2 class="display-4 titulo">Listar Permissões - <?php echo $row_nome_niv_ac['nome'] ?></h2>

                                <?php
                                //$result_contador = "SELECT * FROM adms_nivacs_pgs WHERE adms_niveis_acesso_id ='" . $_SESSION['id'] . "'";
                                //$resultado_contador = mysqli_query($conn, $result_contador);
                                //$total_contador = mysqli_num_rows($resultado_contador)
                                ?>
                                        <!--<h6 class="lead">Nesta lista de permissões temos <?php echo "$total_contador"; ?> até o momento.</h6>-->
                            </div>

                            <div class="p-2">
                                <?php
                                $btn_list = carregar_btn('listar/list_niv_aces', $conn);
                                if ($btn_list) {
                                    echo "<a href='" . pg . "/listar/list_niv_aces' class='btn btn-outline-info btn-sm'>Níveis de Acesso</a>";
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
                            <table class="table table-hover table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Página</th>
                                        <th class="d-none d-sm-table-cell text-center">Permissão</th>
                                        <th class="d-none d-sm-table-cell text-center">Menu</th>
                                        <th class="d-none d-sm-table-cell text-center">Dropdown</th>
                                        <th class="d-none d-sm-table-cell text-center">Ordem</th>
                                        <th class="d-none d-sm-table-cell text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qnt_linhas_exe = 1;
                                    while ($row_niv_ac = mysqli_fetch_assoc($resultado_niv_ac)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row_niv_ac['id']; ?></td>
                                            <td>
                                                <span tabindex="0" data-toggle="tooltip" title="<?php echo $row_niv_ac['obs']; ?>" data-placement="top">
                                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                </span>
                                                <?php echo $row_niv_ac['nome_pagina']; ?>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center">
                                                <?php
                                                $btn_lib_per = carregar_btn('processa/proc_lib_per', $conn);

                                                if ($btn_lib_per) {
                                                    if ($row_niv_ac['permissao'] == 1) {
                                                        echo "<a href='" . pg . "/processa/proc_lib_per?id=" . $row_niv_ac['id'] . "'><span class='badge badge-pill badge-success'>Liberado</sapn><a/>";
                                                    } else {
                                                        echo "<a href='" . pg . "/processa/proc_lib_per?id=" . $row_niv_ac['id'] . "'><span class='badge badge-pill badge-danger'>Bloqueado</sapn><a/>";
                                                    }
                                                } else {
                                                    if ($row_niv_ac['permissao'] == 1) {
                                                        echo "<span class='badge badge-pill badge-success'>Liberado</sapn>";
                                                    } else {
                                                        echo "<span class='badge badge-pill badge-danger'>Bloqueado</sapn>";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center">
                                                <?php
                                                $btn_lib_menu = carregar_btn('processa/proc_lib_menu', $conn);

                                                if ($btn_lib_menu) {
                                                    if ($row_niv_ac['lib_menu'] == 1) {
                                                        echo "<a href='" . pg . "/processa/proc_lib_menu?id=" . $row_niv_ac['id'] . "'><span class='badge badge-pill badge-success'>Liberado</sapn><a/>";
                                                    } else {
                                                        echo "<a href='" . pg . "/processa/proc_lib_menu?id=" . $row_niv_ac['id'] . "'><span class='badge badge-pill badge-danger'>Bloqueado</sapn><a/>";
                                                    }
                                                } else {
                                                    if ($row_niv_ac['lib_menu'] == 1) {
                                                        echo "<span class='badge badge-pill badge-success'>Liberado</sapn>";
                                                    } else {
                                                        echo "<span class='badge badge-pill badge-danger'>Bloqueado</sapn>";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center">
                                                <?php
                                                $btn_lib_dropdown = carregar_btn('processa/proc_lib_dropdown', $conn);

                                                if ($btn_lib_dropdown) {
                                                    if ($row_niv_ac['dropdown'] == 1) {
                                                        echo "<a href='" . pg . "/processa/proc_lib_dropdown?id=" . $row_niv_ac['id'] . "'><span class='badge badge-pill badge-success'>Dropdown Liberado</sapn><a/>";
                                                    } else {
                                                        echo "<a href='" . pg . "/processa/proc_lib_dropdown?id=" . $row_niv_ac['id'] . "'><span class='badge badge-pill badge-danger'>Dropdown Bloqueado</sapn><a/>";
                                                    }
                                                } else {
                                                    if ($row_niv_ac['dropdown'] == 1) {
                                                        echo "<span class='badge badge-pill badge-success'>Dropdown Liberado</sapn>";
                                                    } else {
                                                        echo "<span class='badge badge-pill badge-danger'>Dropdown Bloqueado</sapn>";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center"><?php echo $row_niv_ac['ordem']; ?></td>
                                            <td>
                                                <?php
                                                $btn_edit = carregar_btn('editar/edit_permissao', $conn);
                                                if ($btn_edit) {
                                                    echo"<a href='" . pg . "/editar/edit_permissao?id=" . $row_niv_ac['id'] . "' class='btn btn-outline-warning btn-sm'>Editar </a>   ";
                                                }

                                                $btn_ordem_menu = carregar_btn('processa/proc_ordem_menu', $conn);
                                                if ($btn_ordem_menu) {
                                                    if ($qnt_linhas_exe == 1) {
                                                        echo "<button class='btn btn-outline-secondary btn-sm disabled'><i class='fas fa-angle-double-up'></i></button>";
                                                    } else {
                                                        echo "<a href='" . pg . "/processa/proc_ordem_menu?id=" . $row_niv_ac['id'] . "' class='btn btn-outline-secondary btn-sm'><i class='fa fa-angle-double-up' aria-hidden='true'></i></a> ";
                                                    }
                                                } else {
                                                    
                                                }
                                                $qnt_linhas_exe ++;
                                                ?>
                                            </td>
                                        <?php } ?>
                                </tbody>
                            </table>

                            <?php
                            $result_pg = "SELECT COUNT(id) AS num_result FROM adms_nivacs_pgs                            
                            WHERE adms_niveis_acesso_id='$id'";
                            $resultado_pg = mysqli_query($conn, $result_pg);
                            $row_pg = mysqli_fetch_assoc($resultado_pg);
                            //echo $row_pg['num_result'];
                            //Quantidade de pagina 
                            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                            //Limitar os link antes depois
                            $max_links = 2;
                            echo "<nav aria-label='paginacao-blog'>";
                            echo "<ul class='pagination pagination-sm justify-content-center'>";
                            echo "<li class='page-item'>";
                            echo "<a class='page-link' href='" . pg . "/listar/list_permissao?id=$id&pagina=1' tabindex='-1'>Primeira</a>";
                            echo "</li>";

                            for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                                if ($pag_ant >= 1) {
                                    echo "<li class='page-item'><a class='page-link' href='" . pg . "/listar/list_permissao?id=$id&pagina=$pag_ant'>$pag_ant</a></li>";
                                }
                            }

                            echo "<li class='page-item active'>";
                            echo "<a class='page-link' href='#'>$pagina</a>";
                            echo "</li>";

                            for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                                if ($pag_dep <= $quantidade_pg) {
                                    echo "<li class='page-item'><a class='page-link' href='" . pg . "/listar/list_permissao?id=$id&pagina=$pag_dep'>$pag_dep</a></li>";
                                }
                            }

                            echo "<li class='page-item'>";
                            echo "<a class='page-link' href='" . pg . "/listar/list_permissao?id=$id&pagina=$quantidade_pg'>Última</a>";
                            echo "</li>";
                            echo "</ul>";
                            echo "</nav>";
                            ?>
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
        $url_destino = pg . '/listar/list_permissao';
        header("Location: $url_destino");
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}
?>