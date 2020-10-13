<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}

$SendCadComputer = filter_input(INPUT_POST, 'SendCadComputer', FILTER_SANITIZE_STRING);
if ($SendCadComputer) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Reetirar a obrigatoriedade de preencher campo.
    $dados_cpu = $dados['numero_ti_cpu'];
    $dados_monitor = $dados['numero_ti_monitor'];
    $dados_obs = $dados['inform_computer'];
    unset($dados['numero_ti_cpu'], $dados['numero_ti_monitor'], $dados['inform_computer']);

    //Verificar se existe algum campo dora os três acima, vazio.
    $erro = false;
    include_once 'lib/lib_vazio.php';
    $dados_validos = vazio($dados);
    if (!$dados_validos) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Necessário preencher todos os campos para cadastrar o equipamento!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    }
    //Houve erro em algum campo será redirecionado para o login, não existe erro tenta o cadastro no banco de dados.
    if ($erro) {
        $url_destino = pg . '/cadastrar/cad_computer';
        header("Location: $url_destino");
    } else {
        $result_cad_computer = "INSERT INTO adms_equipamentos (numero_serie_cpu, numero_serie_monitor, numero_serie_mouse, numero_serie_teclado, numero_ti_cpu, numero_ti_monitor, adms_setores_id, adms_fabricantes_id, adms_contratos_id, adms_unidade_id, inform_computer, created) VALUES (
                        '" . $dados_validos['numero_serie_cpu'] . "',
                        '" . $dados_validos['numero_serie_monitor'] . "',
                        '" . $dados_validos['numero_serie_mouse'] . "',
                        '" . $dados_validos['numero_serie_teclado'] . "',
                        '$dados_cpu',
                        '$dados_monitor',
                        '" . $dados_validos['adms_setores_id'] . "',
                        '" . $dados_validos['adms_fabricantes_id'] . "',
                        '" . $dados_validos['adms_contratos_id'] . "',
                        '" . $dados_validos['adms_unidade_id'] . "',
                        '$dados_obs',
                        NOW())";

        mysqli_query($conn, $result_cad_computer);
        if (mysqli_insert_id($conn)) {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Equipamento cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/listar/list_computer';
            header("Location: $url_destino");
        } else {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Equipamento não cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/cadastrar/cad_computer';
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    $url_destino = pg . '/cadastrar/cad_computer';
    header("Location: $url_destino");
}
?>