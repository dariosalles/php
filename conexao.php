<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=iso-8859-1');

$usuario = "root";
$senha = "";
$bd = "crud";

//parametros mysqli
$servidor2 = "localhost";
$link = mysqli_connect($servidor2,$usuario,$senha,$bd);


//parametros de configuração de acesso ao servidor Mysql
$servidor = "mysql:host=localhost;dbname=crud";
$usuario = "root";
$senha = "";


try {
	$conectar = new PDO($servidor, $usuario, $senha);
	if(!$conectar){
		echo "Não foi possivel conectar com Banco de Dados!";
	}

  } catch (Exception $e) {
    echo "Erro: ". $e->getMessage();
  };

  ?>