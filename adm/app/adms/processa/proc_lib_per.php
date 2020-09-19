<?php

//Segurança para não consiguir acessa páginas indo direto na URL.
if (!isset($seguranca)) {
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
if (!empty($id)) {
    
} else {
    $_SESSION['msg_de_erro'] = "<div class='alert alert-danger'>Página não encontrada!</div>";
    $url_destino = pg . '/acesso/login';
    header("Location: $url_destino");
}