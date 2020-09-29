<?php

//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    //Apagar a página
    $result_pc_del = "DELETE FROM adms_equipamentos WHERE id='$id'";
    mysqli_query($conn, $result_pc_del);
    if (mysqli_affected_rows($conn)) {
        //Apagar permissoes de acesso da página na tabela adms_nivacs_pgs

        $result_nivacs_pcs_del = "DELETE FROM adms_nivacs_pgs WHERE adms_pagina_id='$id'";
        mysqli_query($conn, $result_nivacs_pcs_del);

        $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Equipamento apagada com sucesso!</div>";
        $url_destino = pg . '/listar/list_computer';
        header("Location: $url_destino");
    } else {
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>ERRO equipamento não foi apagada!</div>";
        $url_destino = pg . '/listar/list_computer';
        header("Location: $url_destino");
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}