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
                        <h2 class ="display-4 titulo"> Cadastrar Computador </h2>
                    </div>
                    <div class="p-2">
                        <?php
                        $btn_list = carregar_btn('listar/list_computer', $conn);
                        if ($btn_list) {
                            echo "<a href='" . pg . "/listar/list_computer' class='btn btn-outline-info btn-sm'>Listar Computadores</a> ";
                        }
                        ?>
                    </div>
                </div><hr>
                <?php
                if (isset($_SESSION['msg_de_erro'])) {
                    echo $_SESSION['msg_de_erro'];
                    unset($_SESSION['msg_de_erro']);
                }
                ?>

                <form method="POST" action="<?php echo pg; ?>/processa/proc_cad_pc">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <span tabindex="0" data-toggle="tooltip" title="Coloque o número de série da cpu, geralmente se encontra na parte de trás do equipamento." data-placement="top">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </span>
                            <label><span class="text-danger">*</span> Número de série Cpu</label>
                            <input name="numero_serie_cpu" text="text" class="form-control" placeholder="CPU" value="<?php
                            if (isset($_SESSION['dados']['numero_serie_cpu'])) {
                                echo $_SESSION['dados']['numero_serie_cpu'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <span tabindex="0" data-toggle="tooltip" title="Coloque o número de série do monitor, geralmente se encontra na parte de trás do equipamento." data-placement="top">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </span>
                            <label><span class="text-danger">*</span> Número de série Monitor</label>
                            <input name="numero_serie_monitor" type="text" class="form-control" placeholder="MONITOR" value="<?php
                            if (isset($_SESSION['dados']['numero_serie_monitor'])) {
                                echo $_SESSION['dados']['numero_serie_monitor'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <span tabindex="0" data-toggle="tooltip" title="Coloque o número de série do mouse, geralmente se encontra na parte de inferior do equipamento." data-placement="top">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </span>
                            <label> Número de série Mouse</label>
                            <input name="numero_serie_mouse" type="text" class="form-control" placeholder="MOUSE" value="<?php
                            if (isset($_SESSION['dados']['numero_serie_mouse'])) {
                                echo $_SESSION['dados']['numero_serie_mouse'];
                            }
                            ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <span tabindex="0" data-toggle="tooltip" title="Coloque o número de série do teclado, geralmente se encontra na parte de inferior do equipamento." data-placement="top">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </span>
                            <label> Número de série Teclado</label>
                            <input name="numero_serie_teclado" text="text" class="form-control" placeholder="TECLADO" value="<?php
                            if (isset($_SESSION['dados']['numero_serie_teclado'])) {
                                echo $_SESSION['dados']['numero_serie_teclado'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <span tabindex="0" data-toggle="tooltip" title="Coloque o número de série da cpu, que geralmente se encontra na frente do equipamento etiqueta adicionada pela equipe de T.I ." data-placement="top">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </span>
                            <label><span class="text-danger">*</span> Número de etiqueda T.I (Cpu)</label>
                            <input name="numero_ti_cpu" type="text" class="form-control" placeholder="CPU | T.I" value="<?php
                            if (isset($_SESSION['dados']['numero_ti_cpu'])) {
                                echo $_SESSION['dados']['numero_ti_cpu'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <span tabindex="0" data-toggle="tooltip" title="Coloque o número de série do monitor, que geralmente se encontra na frente do equipamento etiqueta adicionada pela equipe de T.I." data-placement="top">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </span>
                            <label><span class="text-danger">*</span> T.I Monitor</label>
                            <input name="numero_ti_monitor" type="text" class="form-control" placeholder="MONITOR | T.I" value="<?php
                            if (isset($_SESSION['dados']['numero_ti_monitor'])) {
                                echo $_SESSION['dados']['numero_ti_monitor'];
                            }
                            ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <?php
                            $result_setores = "SELECT id, localizacao FROM adms_setor ORDER BY localizacao ASC";
                            $resultado_setores = mysqli_query($conn, $result_setores);
                            ?>
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Selecione o setor onde esta o equipamento registrado." data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span> Setor
                            </label>
                            <select name="adms_setores_id" id="adms_setores_id" class="form-control">
                                <option selected disabled>SELECIONAR</option>
                                <?php
                                while ($row_setores = mysqli_fetch_assoc($resultado_setores)) {
                                    if (isset($_SESSION['dados']['adms_setores_id']) AND ( $_SESSION['dados']['adms_setores_id'] == $row_setores['id'])) {
                                        echo "<option value='" . $row_setores['id'] . "' selected >" . $row_setores['localizacao'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row_setores['id'] . "'>" . $row_setores['localizacao'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <?php
                            $result_fabricantes = "SELECT id, marca FROM adms_fabricante ORDER BY marca ASC";
                            $resultado_fabricantes = mysqli_query($conn, $result_fabricantes);
                            ?>
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Selecionar a fabricante/marca do equipamento." data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span> Fabricantes
                            </label>
                            <select name="adms_fabricantes_id" id="adms_fabricantes_id" class="form-control">
                                <option selected disabled>SELECIONAR</option>
                                <?php
                                while ($row_fabricantes = mysqli_fetch_assoc($resultado_fabricantes)) {
                                    if (isset($_SESSION['dados']['adms_fabricantes_id']) AND ( $_SESSION['dados']['adms_fabricantes_id'] == $row_fabricantes['id'])) {
                                        echo "<option value='" . $row_fabricantes['id'] . "' selected >" . $row_fabricantes['marca'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row_fabricantes['id'] . "'>" . $row_fabricantes['marca'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <?php
                            $result_contrato = "SELECT id, descricao FROM adms_contrato ORDER BY id";
                            $resultado_contrato = mysqli_query($conn, $result_contrato);
                            ?>
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Selecionar o tipo do contrato se é alugado ou patrimônio, ou qualquer coisa do tipo." data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span> Contratos
                            </label>
                            <select name="adms_contratos_id" id="adms_contratos_id" class="form-control">
                                <option selected disabled>SELECIONAR</option>
                                <?php
                                while ($row_contrato = mysqli_fetch_assoc($resultado_contrato)) {
                                    if (isset($_SESSION['dados']['adms_contratos_id']) AND ( $_SESSION['dados']['adms_contratos_id'] == $row_contrato['id'])) {
                                        echo "<option value='" . $row_contrato['id'] . "' selected >" . $row_contrato['descricao'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row_contrato['id'] . "'>" . $row_contrato['descricao'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <?php
                            $result_ama = "SELECT id, nome_da_unidade FROM adms_unidades ORDER BY nome_da_unidade ASC";
                            $resultado_ama = mysqli_query($conn, $result_ama);
                            ?>
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Selecionar o tipo do contrato se é alugo ou patrimônio, ou qualquer coisa do tipo." data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span> Unidades
                            </label>
                            <select name="adms_unidade_id" id="adms_contratos_id" class="form-control">
                                <option selected disabled>SELECIONAR</option>
                                <?php
                                while ($row_ama = mysqli_fetch_assoc($resultado_ama)) {
                                    if (isset($_SESSION['dados']['adms_unidade_id']) AND ( $_SESSION['dados']['adms_unidade_id'] == $row_ama['id'])) {
                                        echo "<option value='" . $row_ama['id'] . "' selected >" . $row_ama['nome_da_unidade'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row_ama['id'] . "'>" . $row_ama['nome_da_unidade'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <div class="form-group col-md-12">
                            <label>
                                Informações e observações pertinentes ao equipamento
                            </label>
                            <textarea name="inform_computer" text="text-area" class="form-control" placeholder="Informações e observações pertinentes ao equipamento" style="height:100%" value="<?php
                            if (isset($_SESSION['dados']['inform_computer'])) {
                                echo $_SESSION['dados']['inform_computer'];
                            }
                            ?>"></textarea>
                        </div>
                    </div>
                    <p>
                        <span class="text-danger">* </span>Campo Obrigatório
                    </p>
                    <input name="SendCadPc" type="submit" class="btn btn-success" value="Cadastrar">
                </form>
            </div>
        </div>
        <?php
        unset($_SESSION['dados']);
        include_once 'app/adms/include/rodape_lib.php';
        ?>

    </div>
</body>