<!DOCTYPE html>
<html>
<head>
<title>Cadastro de Pessoas</title>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width,initial-scale=1">

<!-- BOOTSTRAP -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- CSS -->
<link rel="stylesheet" href="css/crud.css">

<!-- GOOGLE MATERIAL ICONS -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- MENU RESPONSIVO -->
<link rel="stylesheet" href="css/menu.css">
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/ie.css">
<![endif]-->
<script src="js/responsive-nav.js"></script>

<!-- FUNÇOES JAVASCRIPT -->
<script language="javascript">
    function pagina(p){

        if (p="cadastro"){
            window.location.href = "cadastro.php"; 
        }
    }

    function atualiza(id){

        window.location.href = "atualiza.php?id=" + id; 

    }

    function deleta(id){

        

        var resposta = confirm("Deseja remover essa pessoa e seus arquivo(s)?");
    
            if (resposta == true) {
                window.location.href = "deleta.php?id=" +id;
            }

        
    }
</script>

</head>
<body>

<!-- INICIO MENU RESPONSIVO -->
<?php require('menu.html')?>
<!-- FIM MENU RESPONSIVO -->

<!-- INICIO CONTENT === -->
<section id="home">

<!-- INICIO ALERT === -->
<?php require('alert.php')?>
<!-- FIM ALERT === -->

    <!-- iNICIO - BUSCA -->
    <div class="busca">
        <form method="POST" action="index.php">
        <div class="form-group mb-2">
        <label for="exampleFormControlInput1"> &nbsp;&nbsp;Busca &nbsp;&nbsp;</label>
            <input type="text" class="form-control" name="busca" id="exampleFormControlInput1" placeholder="Digite sua busca" required>
            <input type="hidden" name="acao" value="buscar">
            <input type="hidden" name="submit">
            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
        </div>
        <div></div>
        </form>
    </div>
    <!-- FIM - BUSCA -->

    <!-- INICIO - LISTAGEM PESSOAS === -->
    <table class="tabela">
        <tr>
            <th width="5%"><div class="tabela_titulo">Atualizar</div></th> 
            <th width="5%"><div class="tabela_titulo">Deletar</div></th> 
            <th width="30%"><div class="tabela_titulo">Id</div></th>   
            <th width="50%"><div class="tabela_titulo">Nome</div></th>
            <th width="50%"><div class="tabela_titulo">Galeria</div></th>      
        </tr>
        
        <!-- iNICIO - CONTEUDO DINÂMICO -->
        <?php
        require "conexao.php";

        // select inicial - todo conteúdo
        $select = "SELECT id_login, nome from tb_login";

        
        if (isset($_POST["submit"])) {

            if ($_POST['acao'] == "buscar") {
            
                $busca = $_POST['busca'];
                $select = "SELECT id_login,nome from tb_login where nome LIKE '%$busca%'";
                
                $erro = "Nenhum dado referente a busca";
            }      
            

        }   

        $sql = mysqli_query($link,$select);


        if ($sql=mysqli_query($link,$select)) {

            $contagem_linhas=mysqli_num_rows($sql);

            if ($contagem_linhas>0) {

                while($vetor = mysqli_fetch_array($sql)){

                    $id = $vetor["id_login"];
                    $nome = $vetor["nome"];

                    echo "<tr><td width='5%'><a onclick='atualiza(" .$id .")' href='#'><i class='material-icons'>create</i></a></td>";
                    echo "<td width='5%'><a onclick='deleta(" .$id .")' href='#'><i class='material-icons'>clear</i></a></td>";
                    echo "<td width='30%'>".$id ."</td>";
                    echo "<td width='50%'>".$nome ."</td>";
                    echo "<td width='50%'><a href='galeria.php?id=" .$id ."&nome=" .$nome ."'><i class='material-icons'>perm_media</i></a></td></tr>";
                }

            } else {

                if ($_POST['acao'] == "buscar") {

                    echo "<div class='titulo_preto'>" .$erro ."</div>"; 

                }else {
                    
                    echo "<div class='titulo_preto'>Nenhum cadastro foi adicionado ainda</div>";
                }
            }

        }
        ?>           
    </table>
    <!-- FIM - LISTAGEM PESSOAS === -->

    <!-- INICIO - BOTAO NOVO CADASTRO === -->
    &nbsp;&nbsp;<button type="submit" class="btn btn-primary mb-2" onclick="pagina('cadastro')">Cadastrar novo</button>
    <!-- FIM - BOTAO NOVO CADASTRO === -->
</section>
<!-- FIM CONTENT === -->

<!-- INICIO - JS MENU RESPONSIVO -->
<script src="js/fastclick.js"></script>
<script src="js/scroll.js"></script>
<script src="js/fixed-responsive-nav.js"></script>
<!-- FIM - JS MENU RESPONSIVO -->

</body>
</html> 