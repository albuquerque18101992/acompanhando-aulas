<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}

$SendEditMen = filter_input(INPUT_POST, 'SendEditMen', FILTER_SANITIZE_STRING);
if ($SendEditMen) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Validar nenhum campo vazio.
    $erro = false;
    include_once 'lib\lib_vazio.php';
    $dados_validos = vazio($dados);
    if (!$dados_validos) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Necessário preencher todos os campos para editar o menu!</div>";
    } 

    //Houve erro em algum campo será redirecionado para o login, não há erro no formulário tenta cadastrar no banco.
    if ($erro) {
        $_SESSION['dados'] = $dados;
        $url_destino = pg . '/editar/edit_menu?id=' . $dados['id'];
        header("Location: $url_destino");
    } else {
        $result_pg_up = "UPDATE adms_menus SET
            nome = '" . $dados_validos['nome'] . "',
            icone = '" . $dados_validos['icone'] . "',
            adms_sit_id = '" . $dados_validos['adms_sit_id'] . "',
            modified=NOW()
            WHERE id='" . $dados_validos['id'] . "'";
        mysqli_query($conn, $result_pg_up);

        if (mysqli_affected_rows($conn)) {
            unset($_SESSION['dados']);

            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Menu editado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/listar/list_menu';
            header("Location: $url_destino");
        } else {
            $_SESSION['dados'] = $dados;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Menu não editado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/editar/edit_menu?id=' . $dados['id'];
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}