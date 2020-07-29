<?php

//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$url_host = filter_input(INPUT_SERVER, 'HTTP_HOST'); //Sempre pegando nosso dominio, que no caso pe localhost.
define('pg', "http://$url_host/system/adm");
//OU define('pg', "http://menu_dominio.com.br/system/adm");