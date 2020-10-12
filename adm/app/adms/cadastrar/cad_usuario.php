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
                        <h2 class ="display-4 titulo"> Cadastrar usuário </h2>
                    </div>
                    <div class="p-2">
                        <?php
                        $btn_list = carregar_btn('listar/list_usuario', $conn);
                        if ($btn_list) {
                            echo "<a href='" . pg . "/listar/list_usuario' class='btn btn-outline-info btn-sm'>Listar usuários</a> ";
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

                <form method="POST" action="<?php echo pg; ?>/processa/proc_cad_usuario">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>
                                <span class="text-danger">*</span>
                                Nome
                            </label>
                            <input name="nome" text="text" class="form-control" id="nome" placeholder="Nome do usuário" value="<?php
                            if (isset($_SESSION['dados']['nome'])) {
                                echo $_SESSION['dados']['nome'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>
                                <span class="text-danger">*</span>
                                Email
                            </label>
                            <input name="email" type="text" class="form-control" id="email" placeholder="Email do usuário" value="<?php
                            if (isset($_SESSION['dados']['email'])) {
                                echo $_SESSION['dados']['email'];
                            }
                            ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>
                                <span class="text-danger">*</span>
                                User
                            </label>
                            <input name="usuario" text="text" class="form-control" id="nome" placeholder="User para logar" value="<?php
                            if (isset($_SESSION['dados']['usuario'])) {
                                echo $_SESSION['dados']['usuario'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>
                                <span class="text-danger">*</span>
                                Senha
                            </label>
                            <input name="senha" type="password" class="form-control" id="email" placeholder="Senha precisa ser de minímo 6 caracteres" value="<?php
                            if (isset($_SESSION['dados']['senha'])) {
                                echo $_SESSION['dados']['senha'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label><span class="text-danger">*</span> Apelido</label>
                            <input name="endereco" type="text" class="form-control" id="email" placeholder="Apelido para melhor identificar" value="<?php
                            if (isset($_SESSION['dados']['apelido'])) {
                                echo $_SESSION['dados']['apelido'];
                            }
                            ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <?php
                            $result_niv_ac = "SELECT id, nome FROM adms_niveis_acessos ORDER BY nome ASC";
                            $resultado_niv_ac = mysqli_query($conn, $result_niv_ac);
                            ?>
                            <label>
                                <span class="text-danger">*</span> Nível de acesso
                            </label>
                            <select name="adms_niveis_acesso_id" id="depend_pg" class="form-control">
                                <option value="" selected disabled>Selecione</option>
                                <?php
                                while ($row_niv_ac = mysqli_fetch_assoc($resultado_niv_ac)) {
                                    if (isset($_SESSION['dados']['adms_niveis_acesso_id']) AND ( $_SESSION['dados']['adms_niveis_acesso_id'] == $row_niv_ac['id'])) {
                                        echo "<option value='" . $row_niv_ac['id'] . "' selected >" . $row_niv_ac['nome'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row_niv_ac['id'] . "'>" . $row_niv_ac['nome'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <?php
                            $result_unidade = "SELECT id, nome_da_unidade FROM adms_unidades ORDER BY nome_da_unidade ASC";
                            $resultado_unidade = mysqli_query($conn, $result_unidade);
                            ?>
                            <label>
                                <span class="text-danger">*</span> Unidade do usuário
                            </label>
                            <select name="adms_unidade_id" id="adms_unidade_id" class="form-control">
                                <option value="" selected disabled>Selecione</option>
                                <?php
                                while ($row_unidade = mysqli_fetch_assoc($resultado_unidade)) {
                                    if (isset($_SESSION['dados']['adms_unidade_id']) AND ( $_SESSION['dados']['adms_unidade_id'] == $row_unidade['id'])) {
                                        echo "<option value='" . $row_unidade['id'] . "' selected >" . $row_unidade['nome_da_unidade'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row_unidade['id'] . "'>" . $row_unidade['nome_da_unidade'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <?php
                            $result_sit_user = "SELECT id, nome FROM adms_sits_usuarios ORDER BY nome ASC";
                            $resultado_sit_user = mysqli_query($conn, $result_sit_user);
                            ?>
                            <label>
                                <span class="text-danger">*</span> Situação do usuário
                            </label>
                            <select name="adms_sits_usuario_id" id="adms_sits_usuario_id" class="form-control">
                                <option value="" selected disabled>Selecione</option>
                                <?php
                                while ($row_sit_user = mysqli_fetch_assoc($resultado_sit_user)) {
                                    if (isset($_SESSION['dados']['adms_sits_usuario_id']) AND ( $_SESSION['dados']['adms_sits_usuario_id'] == $row_sit_user['id'])) {
                                        echo "<option value='" . $row_sit_user['id'] . "' selected >" . $row_sit_user['nome'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row_sit_user['id'] . "'>" . $row_sit_user['nome'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <p>
                        <span class="text-danger">* </span>Campo Obrigatório
                    </p>
                    <input name="SendCadUser" type="submit" class="btn btn-success" value="Cadastrar">
                </form>
            </div>
        </div>
        <?php
        unset($_SESSION['dados']);
        include_once 'app/adms/include/rodape_lib.php';
        ?>

    </div>
</body>






<div class="form-group col-md-4">
    <label><span class="text-danger">*</span> Apelido</label>
    <input name="endereco" type="text" class="form-control" id="email" placeholder="Apelido para melhor identificar" value="<?php
           if (isset($_SESSION['dados']['apelido'])) {
               echo $_SESSION['dados']['apelido'];
           }
           ?>">
</div>