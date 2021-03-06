<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if ($id) {
    //Pesquisar os dados da tabela adms_nivacs_pgs
    $result_niv_ac_pg = "SELECT nivacpg.permissao, nivacpg.adms_niveis_acesso_id, nivacpg.adms_pagina_id
                         FROM adms_nivacs_pgs nivacpg
                         INNER JOIN adms_niveis_acessos nivac ON nivac.id=nivacpg.adms_niveis_acesso_id
                         WHERE nivacpg.id='$id' AND nivac.ordem > '" . $_SESSION['ordem'] . "' LIMIT 1";
    $resultado_niv_ac_pg = mysqli_query($conn, $result_niv_ac_pg);
    
    //Retornou algum valor do banco de dados acessa o if senão acessa o else.
    if (($resultado_niv_ac_pg) AND ( $resultado_niv_ac_pg->num_rows != 0)) {
        $row_niv_ac_pg = mysqli_fetch_assoc($resultado_niv_ac_pg);
        //Verificar o status da página e atribuir o inverso na variável status
        if ($row_niv_ac_pg['permissao'] == 1) {
            $status = 2;
            //de liberado para bloqueado
        } else {
            $status = 1;
            //de bloqeuado para liberado
        }
        
        //Liberar o acesso da página
        $result_niv_pg_up = "UPDATE adms_nivacs_pgs SET
                            permissao='$status',
                            modified=NOW()
                            WHERE id='$id'";
        $resultado_niv_pg_up = mysqli_query($conn, $result_niv_pg_up);
        if (mysqli_affected_rows($conn)) {
            $alteracao = true;
        } else {
            $alteracao = false;
        }

        //Pesquisar as páginas dependentes
        $result_pg_dep = "SELECT nivacpg.id
                          FROM adms_paginas pg          
                          LEFT JOIN adms_nivacs_pgs nivacpg ON nivacpg.adms_pagina_id=pg.id
                          WHERE pg.depend_pg= '" . $row_niv_ac_pg['adms_pagina_id'] . "'
                          AND nivacpg.adms_niveis_acesso_id = '" . $row_niv_ac_pg['adms_niveis_acesso_id'] . "'";
        $resultado_pg_dep = mysqli_query($conn, $result_pg_dep);
        if (($result_pg_dep) AND ( $result_pg_dep->num_rows != - 0 )) {
            while ($row_pg_dep = mysqli_fetch_assoc($resultado_pg_dep)) {
                //Liberar o aceeso a página d´pendente
                $result_niv_pg_up = "UPDATE adms_nivacs_pgs SET
                                     permissao = '$status',
                                     modified=NOW()
                                     WHERE id='" . $row_pg_dep['id'] . "'";
                $resultado_niv_pg_up = mysqli_query($conn, $result_niv_pg_up);
            }
            if (mysqli_affected_rows($conn)) {
                $alteracao = true;
            } else {
                $alteracao = false;
            }
        }


        //redirecionar o usuário
        if ($alteracao) {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Permissão editada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . "/listar/list_permissao?id=" . $row_niv_ac_pg['adms_niveis_acesso_id'];
            header("Location: $url_destino");
        } else {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Erro ao editar a permissão!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . "/listar/list_permissao?id=" . $row_niv_ac_pg['adms_niveis_acesso_id'];
            header("Location: $url_destino");
        }
    } else {
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Nível de acesso não encontrado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
        $url_destino = pg . '/listar/list_niv_aces';
        header("Location: $url_destino");
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}