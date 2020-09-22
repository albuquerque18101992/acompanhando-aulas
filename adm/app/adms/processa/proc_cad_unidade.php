<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}

$SendCadUnidade = filter_input(INPUT_POST, 'SendCadUnidade', FILTER_SANITIZE_STRING);
if ($SendCadUnidade) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Retirar a necessidade de ser preenchido campo de validação.
    $dados_obs = $dados['telefone'];
    $dados_icone = $dados['email'];
    unset($dados['telefone'], $dados['email']);

    //Não deixar salvar, estando vazio.
    $erro = false;
    include_once 'lib\lib_vazio.php';
    $dados_validos = vazio($dados);
    if (!$dados_validos) {
        $erro = true;
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Necessário preencher todos os campos para cadastrar a unidade!</div>";
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
        $dados['obs'] = trim($dados_obs);
        $dados['icone'] = $dados_icone;
        $_SESSION['dados'] = $dados;
        $url_destino = pg . '/cadastrar/cad_unidade';
        header("Location: $url_destino");
    } else {


        $result_cad_pg = "INSERT INTO adms_unidades (nome_da_unidade, nome_gerente, cnes, endereco, cnpj, razao_social, ramal_voip, funcionamento, telefone, email, created) VALUES (
                '" . $dados_validos['nome_da_unidade'] . "',
                '" . $dados_validos['nome_gerente'] . "',
                '" . $dados_validos['cnes'] . "',
                '" . $dados_validos['endereco'] . "',
                '" . $dados_validos['cnpj'] . "',
                '" . $dados_validos['razao_social'] . "',
                '" . $dados_validos['ramal_voip'] . "',
                '" . $dados_validos['funcionamento'] . "',
                '" . $dados_validos['telefone'] . "',
                '" . $dados_validos['email'] . "',
                NOW())";

        mysqli_query($conn, $result_cad_pg);
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

            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Unidade cadastrada com sucesso!</div>";
            $url_destino = pg . '/listar/list_unidades';
            header("Location: $url_destino");
        } else {
            $dados['obs'] = trim($dados_obs);
            $dados['icone'] = $dados_icone;
            $_SESSION['dados'] = $dados;
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Unidade não cadastrada!</div>";
            $url_destino = pg . '/cadastrar/unidade';
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}
?>
 