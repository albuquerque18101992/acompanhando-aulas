<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}

$SendCadUser = filter_input(INPUT_POST, 'SendCadUser', FILTER_SANITIZE_STRING);
if (!empty($SendCadUser)) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Retirar campo da validação vazio
    $dados_apelido = $dados['apelido'];
    unset($dados['apelido']);
    //var_dump($dados);
    //validar nenhum campo vazio
    $erro = false;
    include_once 'lib/lib_vazio.php';
    include_once 'lib/lib_email.php';
    $dados_validos = vazio($dados);
    if (!$dados_validos) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Necessário preencher todos os campos para cadastrar o usuário!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    } elseif (!validarEmail($dados_validos['email'])) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>E-mail inválido!</div>";
    }
    //validar senha
    elseif ((strlen($dados_validos['senha'])) < 6) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>A senha deve ter no mínimo 6 caracteres!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    } elseif (stristr($dados_validos['senha'], "'")) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Caracter ( ' ) utilizado na senha inválido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    }//Validar usuário
    elseif (stristr($dados_validos['usuario'], "'")) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Caracter ( ' ) utilizado no usuário inválido!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    } elseif ((strlen($dados_validos['usuario'])) < 5) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>O usuário deve ter no mínimo 5 caracteres!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    } else {
        //Proibir cadastro de usuário duplicado validando pelo CPF.
        $result_user_cpf = "SELECT id FROM adms_usuarios WHERE cpf='" . $dados_validos['cpf'] . "'";
        $resultado_user_cpf = mysqli_query($conn, $result_user_cpf);
        if (($resultado_user_cpf)AND ( $resultado_user_cpf->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Este CPF já esta cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
        }

        //Proibir cadastro de USUÁRIO-USER duplicado.
        $result_user_duplicado = "SELECT id FROM adms_usuarios WHERE usuario='" . $dados_validos['usuario'] . "'";
        $resultado_user_duplicado = mysqli_query($conn, $result_user_duplicado);
        if (($resultado_user_duplicado)AND ( $resultado_user_duplicado->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Este nome de usuário já esta sendo usado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
        }
    }

    //Houve erro em algum campo será redirecionado para o login, não há erro no formulário tenta cadastrar no banco.
    if ($erro) {
        $dados['apelido'] = $dados_apelido;
        $_SESSION['dados'] = $dados;
        $url_destino = pg . '/cadastrar/cad_usuario';
        header("Location: $url_destino");
    } else {
        
        //Criptografando a senha do usuário.
        $dados_validos['senha'] = password_hash($dados_validos['senha'], PASSWORD_DEFAULT);
        //Criptografando a senha do usuário.^
        
        $result_cad_user = "INSERT INTO adms_usuarios (nome, email, usuario, senha, cpf, apelido, adms_niveis_acesso_id, adms_unidade_id, adms_sits_usuario_id, created) VALUES (
                '" . $dados_validos['nome'] . "',
                '" . $dados_validos['email'] . "',
                '" . $dados_validos['usuario'] . "',
                '" . $dados_validos['senha'] . "',
                '" . $dados_validos['cpf'] . "',
                '$dados_apelido',
                '" . $dados_validos['adms_niveis_acesso_id'] . "',
                '" . $dados_validos['adms_unidade_id'] . "',
                '" . $dados_validos['adms_sits_usuario_id'] . "',
                NOW())";

        mysqli_query($conn, $result_cad_user);
        if (mysqli_insert_id($conn)) {
            unset($_SESSION['dados']);


            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/listar/list_usuario';
            header("Location: $url_destino");
        } else {
            $dados['apelido'] = $dados_apelido;
            $_SESSION['dados'] = $dados;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>ERRO Usuário não foi cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/cadastrar/cad_usuario';
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
} 