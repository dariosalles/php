<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=iso-8859-1');

$usuario = "root";
$senha = "";
$bd = "crud";

//parametros mysqli
$servidor = "localhost";
$link = mysqli_connect($servidor,$usuario,$senha,$bd);

?>