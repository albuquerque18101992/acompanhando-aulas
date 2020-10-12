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
                        <h2 class ="display-4 titulo"> Cadastrar menu </h2>
                    </div>
                    <div class="p-2">
                        <?php
                        $btn_list = carregar_btn('listar/list_menu', $conn);
                        if ($btn_list) {
                            echo "<a href='" . pg . "/listar/list_menu' class='btn btn-outline-info btn-sm'>Listar menu</a> ";
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

                <form method="POST" action="<?php echo pg; ?>/processa/proc_cad_menu">
                    <div class="form-group">
                        <label>
                            <span tabindex="0" data-toggle="tooltip" title="Nome do item do menu que vai ser mostrado no menu lateral." data-placement="top" value="<?php
                            if (isset($_SESSION['dados']['nome'])) {
                                echo $_SESSION['dados']['nome'];
                            }
                            ?>">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </span>
                            <span class="text-danger">*</span> Nome
                        </label>
                        <input name="nome" type="text" class="form-control" placeholder="Nome do item do menu">
                    </div>


                    <div class="form-group">
                        <label>
                            <span tabindex="0" data-toggle="tooltip" data-html="true" title="Página de ícone: <a href='https://fontawesome.com/icons?d=gallery&m=free' target='_blank'>fontawesome</a>. Somente inserir o nome, Ex: fas fa-volume-up" data-placement="top" value="<?php
                            if (isset($_SESSION['dados']['icone'])) {
                                echo $_SESSION['dados']['icone'];
                            }
                            ?>">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </span>
                            <span class="text-danger">*</span> Ícone
                        </label>
                        <input name="icone" type="text" class="form-control" placeholder="Ícone do item de menu">
                    </div>

                    <div class="form-group">
                        <?php
                        $result_sits = "SELECT id, nome FROM adms_sits ORDER BY nome ASC";
                        $resultado_sits = mysqli_query($conn, $result_sits);
                        ?>
                        <label>
                            <span tabindex="0" data-toggle="tooltip" title="Selecionar a situação do menu." data-placement="top">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                            </span>
                            <span class="text-danger">*</span> Situação
                        </label>
                        <select name="adms_sit_id" id="depend_pg" class="form-control">
                            <option value="" selected disabled>Selecione</option>
                            <?php
                            while ($row_sits = mysqli_fetch_assoc($resultado_sits)) {
                                if (isset($_SESSION['dados']['adms_sit_id']) AND ( $_SESSION['dados']['adms_sit_id'] == $row_sits['id'])) {
                                    echo "<option value='" . $row_sits['id'] . "' selected >" . $row_sits['nome'] . "</option>";
                                } else {
                                    echo "<option value='" . $row_sits['id'] . "'>" . $row_sits['nome'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <p>
                        <span class="text-danger">* </span>Campo Obrigatório
                    </p>
                    <input name="SendCadMen" type="submit" class="btn btn-success" value="Cadastrar">
                </form>
            </div>
        </div>
        <?php
        unset($_SESSION['dados']);
        include_once 'app/adms/include/rodape_lib.php';
        ?>

    </div>
</body>