<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if ($id) {
    if ($_SESSION['adms_niveis_acesso_id'] == 1) {
        //Se for super administrador pesquisar os dados da tablea adms_nivacs_pgs
        $result_niv_ac_pg = "SELECT nivacpg.lib_menu, nivacpg.adms_niveis_acesso_id
            FROM adms_nivacs_pgs nivacpg
            WHERE nivacpg.id='$id' LIMIT 1";
    } else {
        //Pesquisar os dados da tabela adms_nivacs_pgs
        $result_niv_ac_pg = "SELECT nivacpg.lib_menu, nivacpg.adms_niveis_acesso_id
            FROM adms_nivacs_pgs nivacpg
            INNER JOIN adms_niveis_acessos nivac ON nivac.id=nivacpg.adms_niveis_acesso_id
            WHERE nivacpg.id='$id' AND nivac.ordem > '" . $_SESSION['ordem'] . "' LIMIT 1";
    }
    $resultado_niv_ac_pg = mysqli_query($conn, $result_niv_ac_pg);

    //caso retornou algum valor do banco de dados acessa o IF senão acessa o ELSE.
    if (($resultado_niv_ac_pg)AND ( $resultado_niv_ac_pg->num_rows != 0)) {
        $row_niv_ac_pg = mysqli_fetch_assoc($resultado_niv_ac_pg);
        //Verificar o status da página e atribuir o inverso na variavel status
        if ($row_niv_ac_pg['lib_menu'] == 1) {
            $status = 2;
        } else {
            $status = 1;
        }

        $result_niv_pg_up = "UPDATE adms_nivacs_pgs SET
            lib_menu='$status',
            modified=NOW()
            WHERE id='$id'";
        mysqli_query($conn, $result_niv_pg_up);
        if (mysqli_affected_rows($conn)) {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Situação do menu editada com sucesso!</div>";
            $url_destino = pg . '/listar/list_permissao?id=' . $row_niv_ac_pg['adms_niveis_acesso_id'];
            header("Location: $url_destino");
        } else {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Erro Situação do menu não foi alterada!</div>";
            $url_destino = pg . '/listar/list_permissao?id=' . $row_niv_ac_pg['adms_niveis_acesso_id'];
            header("Location: $url_destino");
        }
    } else {
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
        $url_destino = pg . '/listar/list_niv_aces';
        header("Location: $url_destino");
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/listar/list_niv_aces';
    header("Location: $url_destino");
}