<?php
// include conexao
include "conexao.php";

if (isset($_POST["submit"])) {

        // qual é a ação?
        // cadastrar
        // atualizar
        // deletar
    
        $acao = $_POST['acao'];

        // cadastrar
        if($acao == 'cadastrar') {

            $querybd = "INSERT into tb_login(nome) VALUES ('" .$_POST['nome']. "')";
            mysqli_query($link,$querybd);
            header("Location: index.php?alert=Cadastrado com sucesso");

        }
        // atualizar
        if($acao == 'atualizar') {

            $querybd = "UPDATE tb_login set nome = '" .$_POST['nome'] ."' where id_login = " .$_POST['id']. "";
            mysqli_query($link,$querybd);
            header("Location: index.php?alert=Atualizado com sucesso");

        }

        // deletar
        if($acao == 'deletar') {

            $querybd = "DELETE from tb_login where id_login = " .$_GET['id'];
            mysqli_query($link,$querybd);
            header("Location: index.php?alert=Excluido com sucesso");

        }

   

}


?>