<?php

//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    //Verificar se há adms_nivacs_pgs usando o menu.
    $result_niv_ac_ver = "SELECT * FROM adms_nivacs_pgs WHERE adms_menu_id='$id' LIMIT 1";
    $resultado_niv_ac_ver = mysqli_query($conn, $result_niv_ac_ver);
    if (($resultado_niv_ac_ver) AND ( $resultado_niv_ac_ver->num_rows != 0)) {
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>O menu não pode ser apagado, há usuários cadastrados usando estas funções!</div>";
        $url_destino = pg . '/listar/list_menu';
        header("Location: $url_destino");
    } else {
        // Não há nenhum usuário usando este menu .
        //Pesquisar no bando de dados se há menu com ordem acima do qual será apagado.
        $result_men_ver = "SELECT id, ordem AS ordem_result FROM adms_menus WHERE ordem > (SELECT ordem FROM adms_menus WHERE id='$id' ORDER BY ordem ASC)";
        $resultado_men_ver = mysqli_query($conn, $result_men_ver);


        //Apagar nível menu.
        $result_men_del = "DELETE FROM adms_menus WHERE id='$id'";
        mysqli_query($conn, $result_men_del);
        if (mysqli_affected_rows($conn)) {

            //Alterar a sequência da ordem para não deixar nenhum número da ordem vazio.
            if (($resultado_men_ver) AND ( $resultado_men_ver->num_rows != 0)) {
                while ($row_men_ver = mysqli_fetch_assoc($resultado_men_ver)) {
                    $row_men_ver ['ordem_result'] = $row_men_ver ['ordem_result'] - 1;
                    $result_men_or = "UPDATE adms_menus SET ordem='" . $row_men_ver ['ordem_result'] . "', modified=NOW() WHERE id='" . $row_men_ver ['id'] . "' ";
                    mysqli_query($conn, $result_men_or);
                }
            }
            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Menu apagado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/listar/list_menu';
            header("Location: $url_destino");
        } else {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>ERRO o menu não foi apagado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/listar/list_menu';
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}
?>
 