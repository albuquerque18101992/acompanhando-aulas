<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}

$SendEditUnidade = filter_input(INPUT_POST, 'SendEditUnidade', FILTER_SANITIZE_STRING);
if ($SendEditUnidade) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Retirar campo da validação vazio
    $dados_obs = $dados['telefone'];
    $dados_icone = $dados['email'];
    unset($dados['telefone'], $dados['email']);

    //Validar nenhum campo vazio.
    $erro = false;
    include_once 'lib\lib_vazio.php';
    $dados_validos = vazio($dados);
    if (!$dados_validos) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Necessário preencher todos os campos para editar a unidade!</div>";
    } else {
        //Proibir cadastro de unidade duplicada
        $result_unidades = "SELECT id FROM adms_unidades WHERE cnes='" . $dados_validos['cnes'] . "'";
        $resultado_unidades = mysqli_query($conn, $result_unidades);
        if (($resultado_unidades)AND ( $resultado_unidades->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Este número de CNES já esta cadastrado, verifique as informações!</div>";
        }
    }

    //Houve erro em algum campo será redirecionado para o login, não há erro no formulário tenta cadastrar no banco.
    if ($erro) {
        $dados['telefone'] = trim($dados_obs);
        $dados['icone'] = $dados_icone;
        $_SESSION['dados'] = $dados;
        $url_destino = pg . '/editar/edit_unidade?id=' . $dados['id'];
        header("Location: $url_destino");
    } else {
        $result_unidade_up = "UPDATE adms_unidades SET
            nome_da_unidade = '" . $dados_validos['nome_da_unidade'] . "',
            nome_gerente = '" . $dados_validos['nome_gerente'] . "',
            cnes = '" . $dados_validos['cnes'] . "',
            endereco = '" . $dados_validos['endereco'] . "',
            cnpj = '" . $dados_validos['cnpj'] . "',
            razao_social = '" . $dados_validos['razao_social'] . "',
            ramal_voip = '" . $dados_validos['ramal_voip'] . "',
            funcionamento = '" . $dados_validos['funcionamento'] . "',
            telefone = '" . $dados_validos['telefone'] . "',
            email = '" . $dados_validos['email'] . "',
            modified=NOW()
            WHERE id='" . $dados_validos['id'] . "'";
        mysqli_query($conn, $result_unidade_up);

        if (mysqli_affected_rows($conn)) {
            unset($_SESSION['dados']);

            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Unidade editada com sucesso!</div>";
            $url_destino = pg . '/listar/list_unidades';
            header("Location: $url_destino");
        } else {
            $dados['telefone'] = trim($dados_obs);
            $dados['email'] = $dados_icone;
            $_SESSION['dados'] = $dados;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Unidade não editada!</div>";
            $url_destino = pg . '/editar/edit_unidade?id=' . $dados['id'];
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Unidade não encontrada!</div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}