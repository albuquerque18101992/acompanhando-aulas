<?php
//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    $result_edit_unidade = "SELECT * FROM adms_unidades WHERE id='$id' LIMIT 1";
    $resultado_edit_unidade = mysqli_query($conn, $result_edit_unidade);
    if (($resultado_edit_unidade)AND ( $resultado_edit_unidade->num_rows != 0)) {
        $row_edit_unidade = mysqli_fetch_assoc($resultado_edit_unidade);
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
                                <h2 class ="display-4 titulo"> Editar Unidade </h2>
                            </div>
                            <div class="p-2">
                                <?php
                                $btn_list = carregar_btn('listar/list_unidades', $conn);
                                if ($btn_list) {
                                    echo "<a href='" . pg . "/listar/list_unidades' class='btn btn-outline-info btn-sm'>Listar Unidades</a> ";
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

                        <form id="add-unidade" method="POST" action="<?php echo pg; ?>/processa/proc_edit_unidade" autocomplete="off">
                            <input type="hidden" name="id" value="<?php
                            if (isset($row_edit_unidade['id'])) {
                                echo $row_edit_unidade['id'];
                            }
                            ?>">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>
                                        <span tabindex="0" data-toggle="tooltip" title="Informe o nome da Unidade, Exemplo: UBS Santo Amaro, AMA, JD Alfredo, Etc..." data-placement="top">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="text-danger">*</span>
                                        Nome da Unidade
                                    </label>
                                    <input name="nome_da_unidade" text="text" class="form-control" id="nome" placeholder="Nome da unidade" value="<?php
                                    if (isset($_SESSION['dados']['nome_da_unidade'])) {
                                        echo $_SESSION['dados']['nome_da_unidade'];
                                    } elseif (isset($row_edit_unidade['nome_da_unidade'])) {
                                        echo $row_edit_unidade['nome_da_unidade'];
                                    }
                                    ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>
                                        <span tabindex="0" data-toggle="tooltip" title="Informe o nome do responsável ou gerente da unidade" data-placement="top">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="text-danger">*</span>
                                        Nome do gerente da Unidade
                                    </label>
                                    <input name="nome_gerente" type="text" class="form-control" id="gerente_da_unidade" placeholder="Nome do responsável da unidade" value="<?php
                                    if (isset($_SESSION['dados']['nome_gerente'])) {
                                        echo $_SESSION['dados']['nome_gerente'];
                                    } elseif (isset($row_edit_unidade['nome_gerente'])) {
                                        echo $row_edit_unidade['nome_gerente'];
                                    }
                                    ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>
                                        <span tabindex="0" data-toggle="tooltip" data-placement="top" data-html="true" title="Informe aqui o O Cadastro Nacional de Estabelecimentos de Saúde, também conhecido como CNES da unidade">
                                            <i class="fas fa-question-circle"></i>
                                        </span>
                                        CNES da unidade
                                    </label>
                                    <input name="cnes" type="text" class="form-control" id="cnes" placeholder="CNES" value="<?php
                                    if (isset($_SESSION['dados']['cnes'])) {
                                        echo $_SESSION['dados']['cnes'];
                                    } elseif (isset($row_edit_unidade['cnes'])) {
                                        echo $row_edit_unidade['cnes'];
                                    }
                                    ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>
                                        <span tabindex="0" data-toggle="tooltip" title="Informe Rua/Avenida, Numero, bairro e CEP, neste mesmo campo" data-placement="top">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="text-danger">*</span> Endereço da Unidade
                                    </label>
                                    <input name="endereco" text="text" class="form-control" id="nome" placeholder="EXEMPLO: AV:UM, N°:DOIS, BAIRRO:TRÊS CEP:00000-000" value="<?php
                                    if (isset($_SESSION['dados']['endereco'])) {
                                        echo $_SESSION['dados']['endereco'];
                                    } elseif (isset($row_edit_unidade['endereco'])) {
                                        echo $row_edit_unidade['endereco'];
                                    }
                                    ?>">
                                </div>


                                <div class="form-group col-md-4">
                                    <label>
                                        <span tabindex="0" data-toggle="tooltip" title="..." data-placement="top">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="text-danger">*</span> CNPJ
                                    </label>
                                    <input name="cnpj" type="text" class="form-control" id="cnpj" placeholder="CNPJ" value="<?php
                                    if (isset($_SESSION['dados']['cnpj'])) {
                                        echo $_SESSION['dados']['cnpj'];
                                    } elseif (isset($row_edit_unidade['cnpj'])) {
                                        echo $row_edit_unidade['cnpj'];
                                    }
                                    ?>"> 
                                </div>                        
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>
                                        <span tabindex="0" data-toggle="tooltip" title="..." data-placement="top">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="text-danger">*</span> Razão Social
                                    </label>
                                    <input name="razao_social" type="text" class="form-control" id="razao_social" placeholder="Razão Social" value="<?php
                                    if (isset($_SESSION['dados']['razao_social'])) {
                                        echo $_SESSION['dados']['razao_social'];
                                    } elseif (isset($row_edit_unidade['razao_social'])) {
                                        echo $row_edit_unidade['razao_social'];
                                    }
                                    ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>
                                        <span tabindex="0" data-toggle="tooltip" title="Numero do Ramal do telefone VOIP da unidade" data-placement="top">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="text-danger">*</span> Ramal VOIP
                                    </label>
                                    <input name="ramal_voip" type="text" class="form-control" id="razao_social" placeholder="Ramal da unidade" value="<?php
                                    if (isset($_SESSION['dados']['ramal_voip'])) {
                                        echo $_SESSION['dados']['ramal_voip'];
                                    } elseif (isset($row_edit_unidade['ramal_voip'])) {
                                        echo $row_edit_unidade['ramal_voip'];
                                    }
                                    ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>
                                        <span tabindex="0" data-toggle="tooltip" title="Informe aqui horário de funcionamento da unidade" data-placement="top">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="text-danger">*</span> Horário de funcionamento
                                    </label>
                                    <input name="funcionamento" type="text" class="form-control" id="razao_social" placeholder="Exemplo: 8:00 ás 17:00" value="<?php
                                    if (isset($_SESSION['dados']['funcionamento'])) {
                                        echo $_SESSION['dados']['funcionamento'];
                                    } elseif (isset($row_edit_unidade['funcionamento'])) {
                                        echo $row_edit_unidade['funcionamento'];
                                    }
                                    ?>">
                                </div>


                            </div>

                            <div class="row">
                                <div class="form-group col-md-6" id="telefone">
                                    <label>
                                        <span tabindex="0" data-toggle="tooltip" title="Se tiver mais de um telefone da unidade,clique no botão de mais assim podera adicionar mais telefones" data-placement="top">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="text-danger">*</span> Telefones da Unidade
                                    </label>
                                    <div class="input-group mb-6">
                                        <input name="telefone[]" type="text" class="form-control" placeholder="Telefones da unidade" 
                                               <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="addTelefone">+</button>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" id="email">
                                        <label>
                                            <span tabindex="0" data-toggle="tooltip" title="Se tiver mais de um email da unidade,clique no botão de mais assim podera adicionar mais emails" data-placement="top">
                                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            </span>
                                            <span class="text-danger">*</span> Email
                                        </label>
                                        <div class="input-group mb-6">
                                            <input name="email[]" type="text" class="form-control" placeholder="Email"
                                                   <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="addEmail">+</button>
                                            </div>
                                        </div>

                                    </div>
                                    <p>
                                        <span class="text-danger">* </span>Campos Obrigatório
                                    </p>

                                    <input name="SendEditUnidade" id="SendCadUnidade" type="submit" class="btn btn-warning" value="Salvar Edição">
                                </div>
                        </form>
                    </div>
                </div>

                <?php
                include_once 'app/adms/include/rodape_lib.php';
                ?>
            </div>
        </body>
        <?php
        unset($_SESSION['dados']);
    } else {
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
        $url_destino = pg . '/listar/list_unidades';
        header("Location: $url_destino");
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . ' / acesso / login';
    header("Location: $url_destino");
}

