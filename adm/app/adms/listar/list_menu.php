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
                    <div class="mr-auto p-2">
                        <h2 class ="display-4 titulo"> Listar menu </h2>
                        <?php
                        $result_contador = "SELECT *FROM adms_menus";
                        $resultado_contador = mysqli_query($conn, $result_contador);
                        $total_contador = mysqli_num_rows($resultado_contador)
                        ?>
                        <h6 class="lead">Listado temos <?php echo "$total_contador"; ?> itens de menu até o momento.</h6>
                    </div>
                    <div class="p-2">
                        <?php
                        $btn_cad = carregar_btn('cadastrar/cad_menu', $conn);
                        if ($btn_cad) {
                            echo "<a href='" . pg . "/cadastrar/cad_menu' class='btn btn-outline-success btn-sm'>Cadastrar menu</a>";
                        }
                        ?>

                    </div>
                </div>
                <?php
                if (isset($_SESSION['msg_de_erro'])) {
                    echo $_SESSION['msg_de_erro'];
                    unset($_SESSION['msg_de_erro']);
                }
                //Receber o número da página.
                $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                //Setar a quantidade de itens por página.
                $qnt_result_pg = 40;

                //Calcular o inicio da visualização.
                $inicio = ($qnt_result_pg * $pagina ) - $qnt_result_pg;

                $resul_menu = "SELECT * FROM adms_menus ORDER BY ordem ASC LIMIT $inicio, $qnt_result_pg";
                $resultado_menu = mysqli_query($conn, $resul_menu);

                if (($resultado_menu) AND ( $resultado_menu->num_rows != 0)) {
                    ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th class="d-none d-sm-table-cell">Ordem</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qnt_linhas_exe = 1;
                                while ($row_menu = mysqli_fetch_assoc($resultado_menu)) {
                                    ?>
                                    <tr>

                                        <td><?php echo $row_menu['id']; ?></td>
                                        <td>
                                            <?php
                                            if ($row_menu['icone']) {
                                                echo"<i class = '" . $row_menu['icone'] . "'></i> ";
                                            }
                                            echo $row_menu['nome'];
                                            ?>
                                        </td>
                                        <td><?php echo $row_menu['ordem']; ?></td>
                                        <td class="text-center">
                                            <span class="d-none d-md-block">
                                                <?php
                                                $btn_or_nivac = carregar_btn('processa/proc_ordem_menu_item', $conn);
                                                if ($qnt_linhas_exe == 1) {
                                                    if ($btn_or_nivac) {
                                                        echo "<button class='btn btn-outline-secondary btn-sm disabled'><i class='fa fa-angle-double-up' aria-hidden='true'></i></button> ";
                                                    }
                                                } else {

                                                    if ($btn_or_nivac) {
                                                        echo "<a href='" . pg . "/processa/proc_ordem_menu_item?id=" . $row_menu['id'] . "' class='btn btn-outline-secondary btn-sm'><i class='fa fa-angle-double-up' aria-hidden='true'></i></a> ";
                                                    }
                                                }
                                                $qnt_linhas_exe ++;

                                                $btn_vis = carregar_btn('visualizar/vis_menu', $conn);
                                                if ($btn_vis) {
                                                    echo "<a href='" . pg . "/visualizar/vis_menu?id=" . $row_menu['id'] . "' class='btn btn-outline-primary btn-sm'>Visualizar</a> ";
                                                }
                                                $btn_edit = carregar_btn('editar/edit_menu', $conn);
                                                if ($btn_edit) {
                                                    echo "<a href='" . pg . "/editar/edit_menu?id=" . $row_menu['id'] . "' class='btn btn-outline-warning btn-sm'>Editar </a> ";
                                                }
                                                $btn_apagar = carregar_btn('processa/apagar_menu', $conn);
                                                if ($btn_apagar) {
                                                    echo "<a href='" . pg . "/processa/apagar_menu?id=" . $row_menu['id'] . "' class='btn btn-outline-danger btn-sm' data-confirm='VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?'>Apagar</a> ";
                                                }
                                                ?>
                                            </span>
                                            <div class="dropdown d-block d-md-none">
                                                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Ações
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                                    <?php
                                                    if ($btn_vis) {
                                                        echo "<a class='dropdown-item' href='" . pg . "/visualizar/vis_menu?id=" . $row_menu['id'] . "'>Visualizar</a> ";
                                                    }
                                                    if ($btn_edit) {
                                                        echo "<a class='dropdown-item' href='" . pg . "/editar/list_menu?id=" . $row_menu['id'] . "'>Editar</a> ";
                                                    }
                                                    if ($btn_apagar) {
                                                        echo "<a class='dropdown-item' href='" . pg . "/processa/apagar_menu?id=" . $row_menu['id'] . "' data-confirm='VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?'>Apagar</a> ";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            </tbody>
                        </table>
                                                <?php
                        $result_pg = "SELECT COUNT(id) AS num_result FROM adms_menus";
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
                        echo "<a class='page-link' href='" . pg . "/listar/list_menu?pagina=1' tabindex='-1'>Primeira</a>";
                        echo "</li>";

                        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                            if ($pag_ant >= 1) {
                                echo "<li class='page-item'><a class='page-link' href='" . pg . "/listar/list_menu?pagina=$pag_ant'>$pag_ant</a></li>";
                            }
                        }

                        echo "<li class='page-item active'>";
                        echo "<a class='page-link' href='#'>$pagina</a>";
                        echo "</li>";

                        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                            if ($pag_dep <= $quantidade_pg) {
                                echo "<li class='page-item'><a class='page-link' href='" . pg . "/listar/list_menu?pagina=$pag_dep'>$pag_dep</a></li>";
                            }
                        }

                        echo "<li class='page-item'>";
                        echo "<a class='page-link' href='" . pg . "/listar/list_menu?pagina=$quantidade_pg'>Última</a>";
                        echo "</li>";
                        echo "</ul>";
                        echo "</nav>";
                        ?>  
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Nenhum registro encontrado!
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
        include_once 'app/adms/include/rodape_lib.php';
        ?>
    </div>
</body>
