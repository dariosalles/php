<?php
// include conexao
include "conexao.php";

if (isset($_POST["submit"])) {

        $nome = $_POST['nome'];    
        $acao = $_POST['acao'];
        
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        
            
        if (!isset($acao)) {
            // se acao já foi iniciado pelo POST então ignora o GET
            $acao = $_GET['acao'];
        }

        if (!isset($_GET['id'])) {
            // se o id foi iniciado pelo GET então ignora o POST
            $acao = $_PÓST['id'];
        }


        $_SESSION['campo_nome'] = $nome;
        $_SESSION['campo_id'] = $id;


        if ($nome == "" and $acao == "") {
            echo "Erro";
        }


        // CREATE
        if ($acao == "cadastrar") {
            
            $querybd = "INSERT into tb_login(nome) VALUES ('" .$_SESSION['campo_nome']. "')";
            mysqli_query($link,$querybd);
            header("Location: index.php?alert=Cadastrado com sucesso");
        }


        // READ
        else if ($acao == 'ler') {
            //$querybd = "SELECT * from crud";
            mysqli_query($servidor,"SELECT * from tb_login");
        }


        // UPDATE

        else if ($acao == 'atualizar') {
            
            $querybd = "UPDATE tb_login set nome = '" .$_SESSION['campo_nome'] ."' where id_login = " .$_SESSION['campo_id']. "";
            //echo $querybd;
            //exit();
            mysqli_query($link,$querybd);
            header("Location: index.php?alert=Atualizado com sucesso");
        }

        // DELETE
        else if ($acao == 'excluir') {

            $querybd = "DELETE from tb_login where id_login = " .$_SESSION['campo_id'];
            mysqli_query($link,$querybd);
            header("Location: index.php?alert=Excluido com sucesso");
        }

   

}


?>