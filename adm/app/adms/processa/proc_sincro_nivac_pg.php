<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}

//Pesquisar os níveis de acesso.
$result_niv_aceeso = "SELECT id, nome FROM adms_niveis_acessos";
$resultado_niv_acesso = mysqli_query($conn, $result_niv_aceeso);

while ($row_niv_acesso = mysqli_fetch_array($resultado_niv_acesso)) {
    //Pesquisar as páginas.
    $result_paginas = "SELECT id, lib_pub FROM adms_paginas";
    $resultado_paginas = mysqli_query($conn, $result_paginas);

    while ($row_paginas = mysqli_fetch_array($resultado_paginas)) {
        //Pesquisar se o nível de acesso possuí a inscrição da página na tabela adms_nivacs_pgs no casso "adms_pagina_id"
        $result_niv_ac_pg = "SELECT id FROM amds_nivacs_pgs
            WHERE adms_niveis_acesso_id = '" . $row_niv_acesso['id'] . "' AND adms_pagina_id = '" . $row_paginas ['id'] . "' ORDER BY id ACS LIMIT 1";
        $resultado_niv_ac_pg = mysqli_query($conn, $result_niv_ac_pg);

        //Verificar se não encontrou a página cadastrada para o nível de acesso em questão.
        if ($resultado_niv_ac_pg->num_rows == 0) {
            //Determinar 1 na permissao, caso seja Super Administrador e para outros níveis 2:
            //1 = Liberado
            //2 = Bloqueado
            if ($row_niv_acesso['id'] == 1) {
                $permissao = 1;
            } else {
                if ($row_paginas ['lib_pub'] == 1) {
                    $permissao = 1;
                } else {
                    $permissao = 2;
                }
            }
            //Pesquisar o maior número da ordem na tabela adms_nivacs_pgs para o nível em execução.
            $result_maior_ordem = "SELECT ordem FROM adms_nivacs_pgs
                WHERE adms_niveis_acesso_id='" . $row_niv_acesso['id'] . "'ORDER BY DESC LIMIT 1";
            $resultado_maior_ordem = mysqli_query($conn, $result_maior_ordem);
            $row_maior_ordem = mysqli_fetch_assoc($resultado_maior_ordem);
            $ordem = $row_maior_ordem['ordem'] + 1;

            //Pesquisar se a página está cadastrada para outro nível e para qual item de menu pertence.
            $result_item_men = "SELECT adms_menu_id FROM adms_nivacs_pgs
                    WHERE adms_pagina_id '" . $row_paginas['id'] . "' ORDER BY id DESC LIMIT 1";
            $resultado_item_men = mysqli_query($conn, $result_item_men);
            if (($resultado_item_men)AND ( $resultado_item_men->num_rows != 0 )) {
                $row_item_men = mysqli_fetch_assoc($resultado_item_men);
                $item_men = $row_item_men['adms_menu_id'];
            } else {
                $item_men = 3;
            }
            //Cadastrar no banco de dados a permissão de acessar a página na tabela adms_nivacs_pgs.
            $result_cad_pagina = "INSERT INTO adms_nivacs_pgs (permissao, ordem, dropdown, lib_menu, adms_menu_id, adms_niveis_acesso_id, adms_pagina_id, created)VALUES(
                    '$permissao',
                    '$ordem',
                    '1',
                    '2',
                    '$item_men',
                    '" . $row_niv_acesso['id'] . "',
                    '" . $row_paginas['id'] . "',
                    NOW())";
            $resultado_cad_pagina = mysqli_query($conn, $result_cad_pagina);
        }
    }
}

$_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Páginas sincronizadas com sucesso!</div>";
$url_destino = pg . '/listar/list_niv_aces';
header("Location: $url_destino");
