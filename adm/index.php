<?php
session_start(); // Inicializando sessão.
ob_start(); // Linha para limpar buffer de saída.
$seguranca = true; //Segurança para não consiguir acessar páginas direto na URL .
include_once './config/config.php'; // Arquivo de endereço do servidos.
include_once './config/conexao.php'; // Incluindo código de conexão com p banco de dados.
include_once './lib/lib_valida.php'; // Função para limpar a URL de caracteres especiais.
include_once './lib/lib_permissao.php'; //incluir validação de permissão de aparecer btn.

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);
$url_limpa = limparUrl($url);

if (isset($_SESSION['adms_niveis_acesso_id'])) {
    $adms_niveis_acesso_id = $_SESSION['adms_niveis_acesso_id'];
} else {
    $adms_niveis_acesso_id = 0;
}

$result_pg = "SELECT pg.id id_pg, pg.tp_pagina, pg.endereco
               FROM adms_paginas pg 
               LEFT JOIN adms_nivacs_pgs nivpg ON nivpg.adms_pagina_id=pg.id 
               WHERE pg.endereco='" . $url_limpa . "'
               AND (pg.adms_sits_pg_id=1
               AND (nivpg.adms_niveis_acesso_id='" . $adms_niveis_acesso_id . "'
               AND nivpg.permissao=1) OR (pg.lib_pub=1))
               LIMIT 1";
$resultado_pg = mysqli_query($conn, $result_pg);
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <?php
    if (($resultado_pg) AND ( $resultado_pg->num_rows != 0)) {
        $row_pg = mysqli_fetch_assoc($resultado_pg);
        $file = "app/" . $row_pg['tp_pagina'] . "/" . $row_pg['endereco'] . ".php";
        if (file_exists($file)) {
            include $file;
        } else {
            include 'app/adms/visualizar/home.php';
        }
    } else {
        $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
        $url_destino = pg . '/acesso/login';
        header("Location: $url_destino");
    }
    ?>

</html>