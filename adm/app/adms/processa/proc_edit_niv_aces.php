<?php

//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$SendEditNivAc = filter_input(INPUT_POST, 'SendEditNivAc', FILTER_SANITIZE_STRING);
if ($SendEditNivAc) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //Validar caso deixe campo vazio.
    $erro = false;
    include_once 'lib/lib_vazio.php';
    $dados_validos = vazio($dados);
    if (!$dados_validos) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Necessário preencher todos os campos para editar nível de acesso!</div>";
    }

    //Se ocorrer erro em algum campo, será redirecionado para o login, não há erro no formulário tenta cadastrar no banco.
    if ($erro) {
        $url_destino = pg . '/editar/edit_niv_aces?id=' . $dados['id'];
        header("Location: $url_destino");
    } else {

        $result_niv_ac = "UPDATE adms_niveis_acessos SET nome='" . $dados_validos['nome'] . "', obs_niv='" . $dados_validos['obs_niv'] . "', modified=NOW() WHERE id='" . $dados_validos['id'] . "'";
        mysqli_query($conn, $result_niv_ac);
        if (mysqli_affected_rows($conn)) {

            $_SESSION['msg_de_erro'] = "<div class = 'alert alert-success'>Nível de acesso editado com sucesso!<button type = 'button' class = 'close' data-dismiss = 'alert' aria-label = 'Close'><span aria-hidden = 'true'>&times;
                </span></button></div>";
            $url_destino = pg . '/listar/list_niv_aces';
            header("Location: $url_destino");
        } else {
            $_SESSION['msg_de_erro'] = "<div class = 'alert alert-danger'>Erro ao editar nível de acesso!<button type = 'button' class = 'close' data-dismiss = 'alert' aria-label = 'Close'><span aria-hidden = 'true'>&times;
                </span></button></div>";
            $url_destino = pg . '/acesso/login';
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class = 'alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}
?>
 