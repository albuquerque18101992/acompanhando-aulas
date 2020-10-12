<?php

//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    //Verificar se há usuários cadastrados no nível de acesso.
    $result_user = "SELECT * FROM adms_usuarios WHERE adms_niveis_acesso_id='$id' LIMIT 1";
    $resultado_user = mysqli_query($conn, $result_user);
    if (($resultado_user) AND ( $resultado_user->num_rows != 0)) {
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>O item não pode ser apagado, há usuários cadastrados com este nível de acesso!</div>";
        $url_destino = pg . '/listar/list_niv_aces';
        header("Location: $url_destino");
    } else {
        // Não há nenhum usuário cadastrado nesse nível.
        //Pesquisar no bando de dados se há nível com ordem acima do qual será apagado.
        $result_niv_aces = "SELECT id, ordem AS ordem_result FROM adms_niveis_acessos WHERE ordem > (SELECT ordem FROM adms_niveis_acessos WHERE id='$id' ORDER BY ordem ASC)";
        $resultado_niv_aces = mysqli_query($conn, $result_niv_aces);


        //Apagar nível de acesso.
        $result_niv_aces_del = "DELETE FROM adms_niveis_acessos WHERE id='$id' AND ordem > '" . $_SESSION['ordem'] . "'";
        mysqli_query($conn, $result_niv_aces_del);
        if (mysqli_affected_rows($conn)) {

            //Alterar a sequência da ordem para não deixar nenhum número da ordem vazio.
            if (($resultado_niv_aces) AND ( $resultado_niv_aces->num_rows != 0)) {
                while ($row_niv_aces = mysqli_fetch_assoc($resultado_niv_aces)) {
                    $row_niv_aces ['ordem_result'] = $row_niv_aces ['ordem_result'] - 1;
                    $result_niv_or = "UPDATE adms_niveis_acessos SET ordem='" . $row_niv_aces ['ordem_result'] . "', modified=NOW() WHERE id='" . $row_niv_aces ['id'] . "' ";
                    mysqli_query($conn, $result_niv_or);
                }
            }
            $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Nível de acesso apagado com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/listar/list_niv_aces';
            header("Location: $url_destino");
        } else {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>ERRO nível de acesso não foi apagado!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
            $url_destino = pg . '/listar/list_niv_aces';
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='trues'>&times;</span></button></div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}
?>
 