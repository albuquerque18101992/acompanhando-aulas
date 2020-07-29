<?php

//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}


//Função para limpar a URL nome da Função intuitiva
function limparUrl($conteudo) {
    $formato_a = '"!@#$%*()+{[}];:,\\\'<>°ºª';
    $formato_b = '__________________________';
    $conteudo_ct = strtr($conteudo, $formato_a, $formato_b);
    $conteudo_br = str_ireplace(" ", "", $conteudo_ct);
    $conteudo_st = strip_tags($conteudo_br);
    $conteudo_lp = trim($conteudo_st);

    return $conteudo_lp;
}
?>