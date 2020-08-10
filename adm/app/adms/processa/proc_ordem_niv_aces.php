<?php

//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    //Pesquisar a ordem do nível de acesso atual a ser movido para cima.
    $result_niv_atual = "SELECT id, ordem FROM adms_niveis_acessos WHERE id='$id' LIMIT 1";
    $resultado_niv_atual = mysqli_query($conn, $result_niv_atual);
    if (($resultado_niv_atual) AND ( $resultado_niv_atual->num_rows != 0)) {
        $row_niv_atual = mysqli_fetch_assoc($resultado_niv_atual);

        //Verificar se a ordem é maior em relação a ordem do usuário logado
        if ($row_niv_atual['ordem'] > $_SESSION['ordem'] + 1) {
            $ordem = $row_niv_atual['ordem'];

            //Pesquisar o ID do nível de acesso a ser movido para baixo
            $ordem_super = $ordem - 1;
            $result_niv_super = "SELECT id, ordem FROM adms_niveis_acessos  WHERE ordem='$ordem_super' LIMIT 1";
            $resultado_niv_super = mysqli_query($conn, $result_niv_super);
            $row_niv_super = mysqli_fetch_assoc($resultado_niv_super);

            //Alterar a ordem para o número ser menor.
            $result_niv_mv_baixo = "UPDATE adms_niveis_acessos SET ordem='$ordem', modified=NOW() WHERE id='" . $row_niv_super['id'] . "'";
            mysqli_query($conn, $result_niv_mv_baixo);

            //Alterar a ordem para o número ser maior.
            $result_niv_mv_super = "UPDATE adms_niveis_acessos SET ordem='$ordem_super', modified=NOW() WHERE id='" . $row_niv_atual['id'] . "'";
            mysqli_query($conn, $result_niv_mv_super);


            //Redirecionar conforme a situação do alterar : sucesso ou erro.
            if (mysqli_affected_rows($conn)) {
                $_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Ordem do nível de acesso editado com sucesso!</div>";
                $url_destino = pg . '/listar/list_niv_aces';
                header("Location: $url_destino");
            } else {
                $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Erro ao editar a ordem do nível de acesso!</div>";
                $url_destino = pg . '/listar/list_niv_aces';
                header("Location: $url_destino");
            }
        } else {
            $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Nível de acesso não pode ser alterado!</div>";
            $url_destino = pg . '/listar/list_niv_aces';
            header("Location: $url_destino");
        }
    } else {
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Nível de acesso não encontrado!</div>";
        $url_destino = pg . '/listar/list_niv_aces';
        header("Location: $url_destino");
    }
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}