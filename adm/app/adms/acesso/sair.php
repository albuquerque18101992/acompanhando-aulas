<?php

//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['adms_niveis_acesso_id'], $_SESSION['ordem']);

$_SESSION['msg_de_erro'] = "<div class='alert alert-success'>Deslocado com sucesso!</div>";
$url_destino = pg . '/acesso/login';
header("Location: $url_destino");

