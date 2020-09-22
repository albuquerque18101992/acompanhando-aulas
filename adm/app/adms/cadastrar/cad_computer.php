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
                            echo "<a href='" . pg . "/listar/list_computer' class='btn btn-outline-info btn-sm'>Listar</a>";
                        }
                        ?>

                    </div>
                </div>
                <div class="alert alert-success" role="alert">
                    Máquina cadastrada com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="" autocomplete="off">
                    <div class="select-caixas">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="exampleFormControlSelect1"><i class="fas fa-map-marker-alt"></i> Localização</label>
                                <select type="text" name="localizacao" class="form-control" id="formatar">
                                    <option selected disabled>SELECIONAR</option>
                                    <option value="adm">Administração</option>
                                    <option value="call center">Call Center</option>
                                    <option value="consultorio medico">Consultório Médico</option>
                                    <option value="odontologia">Consultório Odontologico</option>
                                    <option value="data center">Data Center</option>
                                    <option value="farmacia">Farmácia</option>
                                    <option value="recepcao">Recepção</option>
                                    <option value="acolhimento">Sala de Acolhimento</option>
                                    <option value="almoxarifado">Sala de Almoxarifado</option>
                                    <option value="coleta">Sala de Coleta</option>
                                    <option value="curativo">Sala de Curativo</option>
                                    <option value="demanda">Sala de Demanda</option>
                                    <option value="enfermagem">Sala de Enfermagem</option>
                                    <option value="Sala estudos">Sala de Estudos</option>
                                    <option value="farmacia satelite">Sala de Farmácia Satélite</option>
                                    <option value="faturamento">Sala de Faturamento</option>
                                    <option value="gerencia">Sala de Gerência</option>
                                    <option value="intalacao">Sala de Instalação</option>
                                    <option value="medicacao">Sala de Medicação</option>
                                    <option value="obs adulto">Sala de Observação Adulto</option>
                                    <option value="obs infantil">Sala de Observação Infantil</option>
                                    <option value="ortopedia">Sala de Ortopedia</option>
                                    <option value="papanicolau">Sala de Papanicolau</option>
                                    <option value="siquiatria">Sala de Psiquiatria</option>
                                    <option value="raio X">Sala de Raio X</option>
                                    <option value="regulacao">Sala de Regulação</option>
                                    <option value="saude da mulher">Sala Saúde da Mulher</option>
                                    <option value="triagem">Sala de Triagem</option>
                                    <option value="vacina">Sala de Vacina</option>
                                    <option value="vigilancia">Sala de Vigilância</option>
                                    <option value="acs">Sala dos ACS's</option>
                                    <option value="multi uso">Sala Multi Uso</option>
                                    <option value="same">SAME</option>
                                    <option value="serviço social">Serviço Social</option>
                                    <option value="sinais vitais">Sinais Vitais</option>
                                    <option value="suvis">SUVIS</option>
                                    <option value="outros">Outros</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlSelect1"><i class="fas fa-award"></i> Fabricante</label>
                                <select type="text" name="fabricante" class="form-control" name="fabricante" id="formatar">
                                    <option selected disabled>SELECIONAR</option>
                                    <option value="dell">Dell</option>
                                    <option value="positivo">Positivo</option>
                                    <option value="outros">Outros</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlSelect1"><i class="far fa-folder-open"></i> Tipo</label>
                                <select type="text" name="contrato" class="form-control" name="tipo" id="formatar">
                                    <option selected disabled id="selecionar_option">SELECIONAR</option>
                                    <option value="alugada">Alugada</option>
                                    <option value="patrimonio">Patrimônio</option>
                                    <option value="serviços epecificos">Serviços específicos</option>
                                    <option value="outros">Outros</option>
                                </select>
                            </div>
                        </div>
                    </div>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><i class="fas fa-university"></i> Unidade</label require>
                                    <select type="text" name="unidade" class="form-control" id="unidade" onclick="formatar()">
                                        <option selected disabled>Escolha Unidade</option required>
                                        <?php
                                        include_once("conexao.php");
                                        $consult = "SELECT * FROM adms_unidades WHERE cnes ORDER BY nome_da_unidade";
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
                    <input name="SendCadComputer" type="submit" class="btn btn-success" value="Cadastrar">
                </form>
            </div>
        </div>
        <?php
        include_once 'app/adms/include/rodape_lib.php';
        ?>



    </div>
</body>