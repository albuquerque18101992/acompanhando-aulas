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
                        <h2 class="display-4 titulo"> Listar Equipamentos </h2>
                        <?php
                        $result_contador = "SELECT *FROM adms_equipamentos";
                        $resultado_contador = mysqli_query($conn, $result_contador);
                        $total_contador = mysqli_num_rows($resultado_contador)
                        ?>
                        <h6 class="lead">Listado temos <?php echo "$total_contador"; ?> equipamentos.</h6>
                    </div>
                    <div class="p-2">
                        <?php
                        $btn_cad_computer = carregar_btn('cadastrar/cad_pc', $conn);
                        if ($btn_cad_computer) {
                            echo "<a href='" . pg . "/cadastrar/cad_pc' class='btn btn-outline-success btn-sm'>Cadastrar computador</a>";
                        }
                        ?>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['msg_de_erro'])) {
                    echo $_SESSION['msg_de_erro'];
                    unset($_SESSION['msg_de_erro']);
                }

                //Receber o número da página
                $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                //Setar a quantidade de itens por pagina
                $qnt_result_pg = 50;

                //Calcular o inicio visualização
                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                if ($_SESSION['adms_niveis_acesso_id'] == 1) {
                    $resul_pg = "SELECT nivelpagina.*, unidade.nome_da_unidade, lugarpc.localizacao
                            FROM adms_equipamentos nivelpagina
                            INNER JOIN adms_unidades unidade ON unidade.id=nivelpagina.adms_unidade_id
                            INNER JOIN adms_setor lugarpc ON lugarpc.id=nivelpagina.adms_setores_id
                            ORDER BY id ASC LIMIT $inicio, $qnt_result_pg";
                } else {
                    $resul_pg = "SELECT nivelpagina.*, unidade.nome_da_unidade, lugarpc.localizacao
                            FROM adms_equipamentos nivelpagina
                            INNER JOIN adms_unidades unidade ON unidade.id=nivelpagina.adms_unidade_id
                            INNER JOIN adms_setor lugarpc ON lugarpc.id=nivelpagina.adms_setores_id
                            ORDER BY id ASC LIMIT $inicio, $qnt_result_pg";
                }
                $resultado_pg = mysqli_query($conn, $resul_pg);
                if (($resultado_pg) and ( $resultado_pg->num_rows != 0)) {
                    ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Setor</th>
                                    <th class="d-none d-sm-table-cell">Cpu T.I</th>
                                    <th class="d-none d-sm-table-cell">Monitor T.I</th>
                                    <th class="d-none d-sm-table-cell">Unidade</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row_pg = mysqli_fetch_assoc($resultado_pg)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row_pg['localizacao']; ?></td>
                                        <td class="d-none d-sm-table-cell"><?php echo $row_pg['numero_ti_cpu']; ?></td>
                                        <td class="d-none d-sm-table-cell"><?php echo $row_pg['numero_ti_monitor']; ?></td>
                                        <td class="d-none d-sm-table-cell"><?php echo $row_pg['nome_da_unidade']; ?></td>
                                        <td class="text-center">
                                            <span class="d-none d-md-block">
                                                <?php
                                                $btn_vis = carregar_btn('visualizar/vis_unidade', $conn);
                                                if ($btn_vis) {
                                                    echo "<a href='" . pg . "/visualizar/vis_computer?id=" . $row_pg['id'] . "' class='btn btn-outline-primary btn-sm'>Visualizar</a> ";
                                                }
                                                $btn_edit = carregar_btn('editar/edit_computer', $conn);
                                                if ($btn_edit) {
                                                    echo "<a href='" . pg . "/editar/edit_computer?id=" . $row_pg['id'] . "' class='btn btn-outline-warning btn-sm'>Editar </a> ";
                                                }
                                                $btn_apagar = carregar_btn('processa/apagar_computer', $conn);
                                                if ($btn_apagar) {
                                                    echo "<a href='" . pg . "/processa/apagar_computer?id=" . $row_pg['id'] . "' class='btn btn-outline-danger btn-sm' data-confirm='VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?'>Apagar</a> ";
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
                                                        echo "<a class='dropdown-item' href='" . pg . "/visualizar/vis_computer?id=" . $row_pg['id'] . "'>Visualizar</a> ";
                                                    }
                                                    if ($btn_edit) {
                                                        echo "<a class='dropdown-item' href='" . pg . "/editar/edit_computer?id=" . $row_pg['id'] . "'>Editar</a> ";
                                                    }
                                                    if ($btn_apagar) {
                                                        echo "<a class='dropdown-item' href='" . pg . "/processa/apagar_computer?id=" . $row_pg['id'] . "' data-confirm='VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?'>Apagar</a> ";
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
                        </table>
                        <?php
                        $result_pg = "SELECT COUNT(id) AS num_result FROM adms_equipamentos";
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
                        echo "<a class='page-link' href='" . pg . "/listar/list_computer?pagina=1' tabindex='-1'>Primeira</a>";
                        echo "</li>";

                        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                            if ($pag_ant >= 1) {
                                echo "<li class='page-item'><a class='page-link' href='" . pg . "/listar/list_computer?pagina=$pag_ant'>$pag_ant</a></li>";
                            }
                        }

                        echo "<li class='page-item active'>";
                        echo "<a class='page-link' href='#'>$pagina</a>";
                        echo "</li>";

                        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                            if ($pag_dep <= $quantidade_pg) {
                                echo "<li class='page-item'><a class='page-link' href='" . pg . "/listar/list_computer?pagina=$pag_dep'>$pag_dep</a></li>";
                            }
                        }

                        echo "<li class='page-item'>";
                        echo "<a class='page-link' href='" . pg . "/listar/list_computer?pagina=$quantidade_pg'>Última</a>";
                        echo "</li>";
                        echo "</ul>";
                        echo "</nav>";
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include_once 'app/adms/include/rodape_lib.php';
    ?>
</body>