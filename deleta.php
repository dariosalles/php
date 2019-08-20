<?php
require("conexao.php");

echo $_GET['id'];

//seleciona dos dados pelo id
$querybd = "DELETE from tb_login where id_login = " .$_GET['id'] ."";
mysqli_query($link,$querybd);

header("Location: index.php?alert=Excluido com sucesso");

?>