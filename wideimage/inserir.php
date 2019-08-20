<?php
// include conexao
require("conexao.php")

// inserir dados

$nome = request[nome'];

mysqli_query($servidor,"insert into tb_login(nome) VALUES ($nome)");


?>