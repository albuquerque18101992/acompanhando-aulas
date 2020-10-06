<?php

//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$SendCadNivAc = filter_input(INPUT_POST, 'SendCadNivAc', FILTER_SANITIZE_STRING);
if ($SendCadNivAc) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //Validar caso deixe campo vazio.
    $erro = false;
    include_once 'lib/lib_vazio.php';
    $dados_validos = vazio($dados);
    if (!$dados_validos) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Necessário preencher todos os campos para cadastrra nível de acesso!</div>";
    }

    //Se ocorrer erro em algum campo, será redirecionado para o login, não há erro no formulário tenta cadastrar no banco.
    if ($erro) {
        $url_destino = pg . '/cadastrar/cad_niv_aces';
        header("Location: $url_destino");
    } else {
        //Pesquisar a última ordem do nível de acesso
        $result_niv_ordem = "SELECT ordem FROM adms_niveis_acessos ORDER BY ordem DESC LIMIT 1";
        $resultado_niv_ordem = mysqli_query($conn, $result_niv_ordem);
        $row_niv_ordem = mysqli_fetch_assoc($resultado_niv_ordem);
        $row_niv_ordem ['ordem'] ++;

        $result_niv_ac = "INSERT INTO adms_niveis_acessos (nome, obs_niv, ordem, created) VALUE ('" . $dados_validos['nome'] . "','" . $dados_validos['obs_niv'] . "', '" . $row_niv_ordem ['ordem'] . "', NOW())";
        mysqli_query($conn, $result_niv_ac);
        if (mysqli_insert_id($conn)) {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Nível de acesso inserido com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $url_destino = pg . '/listar/list_niv_aces';
            header("Location: $url_destino");
        } else {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Erro ao inserir!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $url_destino = pg . '/acesso/login';
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/cadastrar/cad_niv_aces';
    header("Location: $url_destino");
}
?>
 