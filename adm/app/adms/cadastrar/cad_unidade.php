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
                        <h2 class ="display-4 titulo"> Cadastrar unidade </h2>
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

                <form method="POST" action="<?php echo pg; ?>/processa/proc_cad_unidade">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Nome da página que vai ser apresentado no menu ou no listar página" data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span>
                                Nome da Unidade
                            </label>
                            <input name="nome_da_unidade" text="text" class="form-control" id="nome" placeholder="Nome da página" value="<?php
                            if (isset($_SESSION['dados']['nome_da_unidade'])) {
                                echo $_SESSION['dados']['nome_da_unidade'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Nome da página que vai ser apresentado no menu ou no listar página" data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span>
                                Nome do gerente da Unidade
                            </label>
                            <input name="nome_gerente" type="text" class="form-control" id="email" placeholder="Endereço da página, ex: listar/list_pagina" value="<?php
                            if (isset($_SESSION['dados']['nome_gerente'])) {
                                echo $_SESSION['dados']['nome_gerente'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" data-placement="top" data-html="true" title="Página de icone: <a href='https://fontawesome.com/icons?d=gallery' target='_blank'>fontawesome</a>. Somente inserir o nome, Ex: fas fa-volume-up">
                                    <i class="fas fa-question-circle"></i>
                                </span>
                                CNES da unidade
                            </label>
                            <input name="cnes" type="text" class="form-control" id="email" placeholder="Ícone da página" value="<?php
                            if (isset($_SESSION['dados']['cnes'])) {
                                echo $_SESSION['dados']['cnes'];
                            }
                            ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Nome da página que vai ser apresentado no menu ou no listar página" data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span> Endereço da Unidade
                            </label>
                            <input name="endereco" text="text" class="form-control" id="nome" placeholder="Endereço completo AQUI" value="<?php
                            if (isset($_SESSION['dados']['endereco'])) {
                                echo $_SESSION['dados']['endereco'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Nome da página que vai ser apresentado no menu ou no listar página" data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span> Telefones da Unidade
                            </label>
                            <input name="telefone" type="text" class="form-control" id="email" placeholder="Os numeros da unidade" value="<?php
                            if (isset($_SESSION['dados']['telefone'])) {
                                echo $_SESSION['dados']['telefone'];
                            }
                            ?>">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Nome da página que vai ser apresentado no menu ou no listar página" data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span> CNPJ
                            </label>
                            <input name="cnpj" type="text" class="form-control" id="email" placeholder="Desenvolvedor" value="<?php
                            if (isset($_SESSION['dados']['cnpj'])) {
                                echo $_SESSION['dados']['cnpj'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Nome da página que vai ser apresentado no menu ou no listar página" data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span> Razão Social
                            </label>
                            <input name="razao_social" type="text" class="form-control" id="email" placeholder="Desenvolvedor" value="<?php
                            if (isset($_SESSION['dados']['razao_social'])) {
                                echo $_SESSION['dados']['razao_social'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>
                                <span tabindex="0" data-toggle="tooltip" title="Nome da página que vai ser apresentado no menu ou no listar página" data-placement="top">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span class="text-danger">*</span> email
                            </label>
                            <input name="email" type="text" class="form-control" id="email" placeholder="Desenvolvedor" value="<?php
                            if (isset($_SESSION['dados']['email'])) {
                                echo $_SESSION['dados']['email'];
                            }
                            ?>">
                        </div>
                    </div>

                    <p>
                        <span class="text-danger">* </span>Campos Obrigatório
                    </p>
                    <input name="SendCadUnidade" type="submit" class="btn btn-success" value="Cadastrar">
                </form>
            </div>
        </div>
        <?php
        unset($_SESSION['dados']);
        include_once 'app/adms/include/rodape_lib.php';
        ?>

    </div>
</body>