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
                        <h2 class="display-4 titulo"> Editar Equipamentos </h2>
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
                    <br>
                    <div class="formulario">
                        <div class="row">
                            <div class="col-md-4">
                                <label for=""><i class="fas fa-laptop-medical"></i> Computadores</label>
                                <input type="text" name="numero_serie_cpu" class="form-control" id="exampleInputEmail1" maxlength="19" placeholder="Número de Série">
                            </div>
                            <div class="col-md-4">
                                <label for=""><i class="fas fa-tv"></i> Monitores</label>
                                <input type="text" name="numero_serie_monitor" class="form-control" id="exampleInputEmail1" maxlength="19" placeholder="Número de Série">
                            </div>
                            <div class="col-md-4">
                                <label for=""><i class="fas fa-mouse"></i> N/S Mouse</label>
                                <input type="text" name="numero_serie_mouse" class="form-control" id="exampleInputEmail1" maxlength="6" placeholder="Número de Série">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for=""><i class="fas fa-keyboard"></i> N/S Teclado</label>
                                <input type="text" name="numero_serie_teclado" class="form-control" id="exampleInputEmail1" maxlength="6" placeholder="Número de Série">
                            </div>
                            <div class="col-md-4">
                                <label for=""><i class="fas fa-laptop-medical"></i> Computadores</label>
                                <input type="text" name="numero_ti_cpu" class="form-control" id="exampleInputEmail1" maxlength="6" placeholder="Número T.I">
                            </div>
                            <div class="col-md-4">
                                <label for=""><i class="fas fa-tv"></i> Monitores</label>
                                <input type="text" name="numero_ti_monitor" class="form-control" id="exampleInputEmail1" maxlength="6" placeholder="Número T.I">
                            </div>
                        </div>
                        <br>
                        <div class="select-caixas">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="exampleFormControlSelect1"><i class="fas fa-map-marker-alt"></i> Localização</label>
                                    <select type="text" name="localizacao" class="form-control" id="formatar">
                                        <option selected disabled>SELECIONAR</option>
                                        <?php
                                        $consult_local = "SELECT * FROM adms_setor ORDER BY localizacao";
                                        $consulta_local = mysqli_query($conn, $consult_local);
                                        while ($row_local = mysqli_fetch_assoc($consulta_local)) {
                                            echo '<option value"' . $row_local['localizacao'] . '">' . $row_local['localizacao'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleFormControlSelect1"><i class="fas fa-award"></i> Fabricante</label>
                                    <select type="text" name="" class="form-control" name="fabricante" id="formatar">
                                        <option selected disabled>SELECIONAR</option>
                                        <?php
                                        $consult_fabricante = "SELECT * FROM adms_fabricante ORDER BY marca";
                                        $consulta_fabricante = mysqli_query($conn, $consult_fabricante);
                                        while ($row_fabricante = mysqli_fetch_assoc($consulta_fabricante)) {
                                            echo '<option value="' . $row_fabricante['marca'] . '">' . $row_fabricante['marca'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleFormControlSelect1"><i class="far fa-folder-open"></i> Tipo</label>
                                    <select type="text" name="contrato" class="form-control" name="tipo" id="formatar">
                                        <option selected disabled>SELECIONAR</option>
                                        <?php
                                        $consult_tipo = "SELECT * FROM adms_contrato ORDER BY descricao";
                                        $consulta_tipo = mysqli_query($conn, $consult_tipo);
                                        while ($row_tipo_contrato = mysqli_fetch_assoc($consulta_tipo)) {
                                            echo '<option value="' . $row_tipo_contrato['descricao'] . '">' . $row_tipo_contrato['descricao'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><i class="fas fa-university"></i> Unidade</label require>
                                    <select type="text" name="unidade" class="form-control" id="unidade" onclick="formatar()">
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
                                <textarea type="text-area" name="descricoes" maxlength="280" placeholder="Observções sobre o equipamento ." style="width:100%;height:100px; border-radius:5px"></textarea>
                            </div>
                        </div>
                        <br>
                    </div>
                    <input name="SendCadComputer" type="submit" class="btn btn-warning" value="Salvar Edição">
                </form>
            </div>
        </div>
        <?php
        include_once 'app/adms/include/rodape_lib.php';
        ?>



    </div>
</body>