<?php

//Segurança para não consiguir acessa páginas indo direto na URL .
if (!isset($seguranca)) {
    exit;
}

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "bd_system";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if (!$conn) {
    die("Falha de conexao:<br>" . mysqli_connect_error());
} /* else {
  echo "Conexão relizada com sucesso";
  } */
?>