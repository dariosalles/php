<?php
require("conexao.php");

echo $_GET['id'];

//deleta o registro pelo id da pessoa
$querybd = "DELETE from tb_login where id_login = " .$_GET['id'] ."";
mysqli_query($link,$querybd);

//deleta os arquivos da galeria pelo id da pessoa
$querybd_arq = "DELETE from tb_arquivos where id_login = " .$_GET['id'] ."";
mysqli_query($link,$querybd_arq);

// redireciona para o sucess
header("Location: index.php?alert=Excluido com sucesso");

?>