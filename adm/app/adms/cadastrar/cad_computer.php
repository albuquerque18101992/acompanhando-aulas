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
                        <h2 class="display-4 titulo"> Cadastrar Equipamentos </h2>
                    </div>
                    <div class="p-2">
                        <?php
                        $btn_list = carregar_btn('listar/list_computer', $conn);
                        if ($btn_list) {
                            echo "<a href='" . pg . "/listar/list_computer' class='btn btn-outline-info btn-sm'>Listar equipamentos</a>";
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

                <form method="POST" action="<?php echo pg; ?>/processa/proc_cad_computer" autocomplete="off">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Número de identificação do computador, geralmente atrás do equipamento." data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                Computadores
                            </label>
                            <input type="text" name="numero_serie_cpu" class="form-control" id="exampleInputEmail1" maxlength="19" placeholder="Número de Série" value="<?php
                            if (isset($_SESSION['dados']['numero_serie_cpu'])) {
                                echo $_SESSION['dados']['numero_serie_cpu'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label> 
                                <span tabindex="0" data-toggle="tooltip" title="Número de identificação do computador, geralmente atrás do equipamento." data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                Monitores
                            </label>
                            <input type="text" name="numero_serie_monitor" class="form-control" id="exampleInputEmail1" maxlength="19" placeholder="Número de Série">
                        </div>
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Número de identificação do computador, geralmente atrás do equipamento." data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                N/S Mouse
                            </label>
                            <input type="text" name="numero_serie_mouse" class="form-control" id="exampleInputEmail1" maxlength="6" placeholder="Número de Série">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Número de identificação do computador, geralmente atrás do equipamento." data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                N/S Teclado
                            </label>
                            <input type="text" name="numero_serie_teclado" class="form-control" id="exampleInputEmail1" maxlength="6" placeholder="Número de Série">
                        </div>
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Número de identificação do computador, geralmente atrás do equipamento." data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                Computadores
                            </label>
                            <input type="text" name="numero_ti_cpu" class="form-control" id="exampleInputEmail1" maxlength="6" placeholder="Número T.I">
                        </div>
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Número de identificação do computador, geralmente atrás do equipamento." data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                Monitores
                            </label>
                            <input type="text" name="numero_ti_monitor" class="form-control" id="exampleInputEmail1" maxlength="6" placeholder="Número T.I">
                        </div>
                    </div>
                    <br>
                    <div class="select-caixas">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <?php
                                $result_setor = "SELECT id, localizacao FROM adms_setor";
                                $resultado_setor = mysqli_query($conn, $result_setor);
                                ?>
                                <label>
                                    <span tabindex="0" data-toggle="tooltip" title="" data-placement="top">
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                    </span>
                                    <span class="text-danger">*</span> Localização
                                </label>
                                <select name="localizacao" id="localizacao" class="form-control">
                                    <option value="" selected disabled>Selecione</option>
                                    <?php
                                    while ($row_setor = mysqli_fetch_assoc($resultado_setor)) {
                                        if (isset($_SESSION['dados']['adms_setores_id']) AND ( $_SESSION['dados']['adms_setores_id'] == $row_setor['id'])) {
                                            echo "<option value='" . $row_setor['id'] . "' selected>" . $row_setor['localizacao'] . "</option>";
                                        } else {
                                            echo "<option value='" . $row_setor['id'] . "'>" . $row_setor['localizacao'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <?php
                                $result_fabricante = "SELECT id, marca FROM adms_fabricante";
                                $resultado_fabricante = mysqli_query($conn, $result_fabricante);
                                ?>
                                <label>
                                    <span tabindex="0" data-toggle="tooltip" title="" data-placement="top">
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                    </span>
                                    <span class="text-danger">*</span> Fabricante
                                </label>
                                <select name="marca" id="marca" class="form-control">
                                    <option value="" selected disabled>Selecione</option>
                                    <?php
                                    while ($row_fabricante = mysqli_fetch_assoc($resultado_fabricante)) {
                                        if (isset($_SESSION['dados']['adms_fabricantes_id']) AND ( $_SESSION['dados']['adms_fabricantes_id'] == $row_fabricante['id'])) {
                                            echo "<option value='" . $row_fabricante['id'] . "' selected>" . $row_fabricante['marca'] . "</option>";
                                        } else {
                                            echo "<option value='" . $row_fabricante['id'] . "'>" . $row_fabricante['marca'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <?php
                                $result_contrato = "SELECT id, descricao FROM adms_contrato";
                                $resultado_contrato = mysqli_query($conn, $result_contrato);
                                ?>
                                <label>
                                    <span tabindex="0" data-toggle="tooltip" title="" data-placement="top">
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                    </span>
                                    <span class="text-danger">*</span> Tipo
                                </label>
                                <select name="marca" id="marca" class="form-control">
                                    <option value="" selected disabled>Selecione</option>
                                    <?php
                                    while ($row_contrato = mysqli_fetch_assoc($resultado_contrato)) {
                                        if (isset($_SESSION['dados']['adms_contratos_id']) AND ( $_SESSION['dados']['adms_contratos_id'] == $row_contrato['id'])) {
                                            echo "<option value='" . $row_contrato['id'] . "' selected>" . $row_contrato['descricao'] . "</option>";
                                        } else {
                                            echo "<option value='" . $row_contrato['id'] . "'>" . $row_contrato['descricao'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label><i class="fas fa-university"></i> Unidade</label require>
                                <select type="text" name="adms_unidade_id" class="form-control" id="unidade" onclick="formatar()">
                                    <option selected disabled>Escolha Unidade</option required>
                                    <?php
                                    $consult = "SELECT * FROM adms_unidades ORDER BY nome_da_unidade";
                                    $consulta = mysqli_query($conn, $consult);
                                    while ($row_cat_post = mysqli_fetch_assoc($consulta)) {
                                        echo '<option value="' . $row_cat_post['nome_da_unidade'] . '"> ' . $row_cat_post['nome_da_unidade'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Informações Pertinentes ao Equipamento</label>
                            <textarea type="text-area" name="inform_computer" maxlength="280" placeholder="Observções sobre o equipamento ." style="width:100%;height:100px; border-radius:5px"></textarea>
                        </div>
                    </div>
                    <input name="SendCadComputer" type="submit" class="btn btn-success" value="Cadastrar">
                </form>
            </div>
        </div>
        <?php
        include_once 'app/adms/include/rodape_lib.php';
        ?>
    </div>
</body>