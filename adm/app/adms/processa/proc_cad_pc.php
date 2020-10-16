<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}

$SendCadPc = filter_input(INPUT_POST, 'SendCadPc', FILTER_SANITIZE_STRING);
if (!empty($SendCadPc)) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Retirar campo da validação vazio
    $dados_numero_serie_mouse = $dados['numero_serie_mouse'];
    $dados_numero_serie_teclado = $dados['numero_serie_teclado'];
    $dados_inform_computer = $dados['inform_computer'];
    unset($dados['numero_serie_mouse'], $dados['numero_serie_teclado'], $dados['inform_computer']);

    //Validar nenhum campo vazio.
    $erro = false;
    include_once 'lib\lib_vazio.php';
    $dados_validos = vazio($dados);
    if (!$dados_validos) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Necessário preencher todos os campos para cadastrar o computador!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    } else {
        //Proibir cadastra duplicado via numero_ti_cpu
        $result_pc = "SELECT id FROM adms_equipamentos WHERE numero_ti_cpu='" . $dados_validos['numero_ti_cpu'] . "'";
        $resultado_pc = mysqli_query($conn, $result_pc);
        if (($resultado_pc)AND ( $resultado_pc->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>CPU: Este número de etiqueta da T.I já estão cadastrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
        }

        //Proibir cadastra duplicado via numero_ti_monitor
        $result_pc2 = "SELECT id FROM adms_equipamentos WHERE numero_ti_monitor='" . $dados_validos['numero_ti_monitor'] . "'";
        $resultado_pc2 = mysqli_query($conn, $result_pc2);
        if (($resultado_pc2)AND ( $resultado_pc2->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>MONITOR: Este número de etiqueta da T.I já estão cadastrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
        }
    }

    //Houve erro em algum campo será redirecionado para o login, não há erro no formulário tenta cadastrar no banco.
    if ($erro) {
        $dados['numero_serie_mouse'] = $dados_numero_serie_mouse;
        $dados['numero_serie_teclado'] = $dados_numero_serie_teclado;
        $dados['inform_computer'] = $dados_inform_computer;
        $_SESSION['dados'] = $dados;
        $url_destino = pg . '/cadastrar/cad_pc';
        header("Location: $url_destino");
    } else {
        $result_cad_pc = "INSERT INTO adms_equipamentos (numero_serie_cpu, numero_serie_monitor, numero_serie_mouse, numero_serie_teclado, numero_ti_cpu, numero_ti_monitor, adms_setores_id, adms_fabricantes_id, adms_contratos_id, adms_unidade_id, inform_computer, created) VALUES (
                '" . $dados_validos['numero_serie_cpu'] . "',
                '" . $dados_validos['numero_serie_monitor'] . "',
                '$dados_numero_serie_mouse',
                '$dados_numero_serie_teclado',
                '" . $dados_validos['numero_ti_cpu'] . "',
                '" . $dados_validos['numero_ti_monitor'] . "',
                '" . $dados_validos['adms_setores_id'] . "',
                '" . $dados_validos['adms_fabricantes_id'] . "',
                '" . $dados_validos['adms_contratos_id'] . "',
                '" . $dados_validos['adms_unidade_id'] . "',
                '$dados_inform_computer',
                NOW())";

        mysqli_query($conn, $result_cad_pc);
        if (mysqli_insert_id($conn)) {
            unset($_SESSION['dados']);


            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Equipamento cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/listar/list_computer';
            header("Location: $url_destino");
        } else {
            $dados['obs'] = trim($dados_obs);
            $dados['icone'] = $dados_icone;
            $_SESSION['dados'] = $dados;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Equipamento não cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/cadastrar/cad_pc';
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}
?>
 