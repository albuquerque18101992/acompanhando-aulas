<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}

$SendCadComputer = filter_input(INPUT_POST, 'SendCadComputer', FILTER_SANITIZE_STRING);
if ($SendCadComputer) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Retirar a necessidade de ser preenchido campo de validação.
    $dados_obs = $dados['numero_serie_cpu'];
    $dados_icone = $dados['numero_serie_monitor'];
    unset($dados['numero_serie_cpu'], $dados['numero_serie_monitor']);

    //Não deixar salvar, estando vazio.
    $erro = false;
    include_once 'lib\lib_vazio.php';
    $dados_validos = vazio($dados);
    if (!$dados_validos) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Necessário preencher todos os campos para cadastrar a unidade!</div>";
    } else {
        //Proibir cadastro de equipamento duplicado
        $result_unidades = "SELECT id FROM adms_equipamentos WHERE numero_ti_cpu='" . $dados_validos['numero_ti_cpu'] . "'";
        $resultado_unidades = mysqli_query($conn, $result_unidades);
        if (($resultado_unidades)AND ( $resultado_unidades->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Este número T.I, Computadores ou o Monitores já esta cadastrado!</div>";
        }
    }

    //Houve erro em algum campo será redirecionado para o login, não há erro no formulário tenta cadastrar no banco.
    if ($erro) {
        $dados['numero_serie_cpu'] = trim($dados_obs);
        $dados['numero_serie_monitor'] = $dados_icone;
        $_SESSION['dados'] = $dados;
        $url_destino = pg . '/cadastrar/cad_computer';
        header("Location: $url_destino");
    } else {

        $result_cad_pc = "INSERT INTO adms_equipamentos (numero_serie_cpu, numero_serie_monitor, numero_serie_mouse, numero_serie_teclado, numero_ti_cpu, numero_ti_monitor, adms_setores_id, adms_fabricantes_id, adms_contratos_id, adms_unidade_id, adms_unidade_id, inform_computer, created) VALUES (
                '" . $dados_validos['numero_serie_cpu'] . "',
                '" . $dados_validos['numero_serie_monitor'] . "',
                '" . $dados_validos['numero_serie_mouse'] . "',
                '" . $dados_validos['numero_serie_teclado'] . "',
                '" . $dados_validos['numero_ti_cpu'] . "',
                '" . $dados_validos['numero_ti_monitor'] . "',
                '" . $dados_validos['adms_setores_id'] . "',
                '" . $dados_validos['adms_fabricantes_id'] . "',
                '" . $dados_validos['adms_contratos_id'] . "',
                '" . $dados_validos['adms_unidade_id'] . "',
                '" . $dados_validos['inform_computer'] . "',
                NOW())";

        mysqli_query($conn, $result_cad_pc);


        if (mysqli_insert_id($conn)) {
            unset($_SESSION['dados']);
            //Inicio inserir na tabela adms_nivacs_pgs
            $pagina_id = mysqli_insert_id($conn);

            //Pesquisar os niveis de acesso
            $result_niv_acesso = "SELECT id, nome FROM adms_niveis_acessos";
            $resultado_niv_acesso = mysqli_query($conn, $result_niv_acesso);
            while ($row_niv_acesso = mysqli_fetch_assoc($resultado_niv_acesso)) {
                //Determinar 1 na permissão da tabela adms_nivacs_pgs caso seja superadministrador e para outros niveis permissão 2
                //1 = Liberado
                //2 = Bloquedo
                if ($row_niv_acesso['id'] == 1) {
                    $permissao = 1;
                } else {
                    $permissao = 2;
                }
                //Pesquisar o maior número da ordem na tabela adms_nivacs_pgs para o nével em execução
                $result_maior_ordem = "SELECT ordem FROM adms_nivacs_pgs WHERE adms_niveis_acesso_id='" . $row_niv_acesso['id'] . "' ORDER BY ordem DESC LIMIT 1";
                $resultado_maior_ordem = mysqli_query($conn, $result_maior_ordem);
                $row_maior_ordem = mysqli_fetch_assoc($resultado_maior_ordem);
                $ordem = $row_maior_ordem ['ordem'] + 1;

                //Cadastrar no banco de dados a permissão de acessar a página na tabela adms_nivacs_pgs.
                $result_cad_pagina = "INSERT INTO adms_nivacs_pgs (permissao, ordem, dropdown, lib_menu, adms_menu_id, adms_niveis_acesso_id, adms_pagina_id, created) VALUES (
                        '$permissao',
                        '$ordem',
                        '1',
                        '2',
                        '3',
                        '" . $row_niv_acesso ['id'] . "',
                        '$pagina_id',
                        NOW())";

                mysqli_query($conn, $result_cad_pagina);
            }

            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Equipamento cadastrado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/listar/list_computer';
            header("Location: $url_destino");
        } else {
            $dados['obs'] = trim($dados_obs);
            $dados['icone'] = $dados_icone;
            $_SESSION['dados'] = $dados;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Equipamento não cadastrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/cadastrar/cad_computer';
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}
?>