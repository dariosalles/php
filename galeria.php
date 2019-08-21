<!DOCTYPE html>
<html>
<head>
<title>Cadastro de Pessoas - Galeria de Imagens</title>
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


</head>

<body>

<!-- INICIO MENU RESPONSIVO -->
<?php require('menu.html')?>
<!-- FIM MENU RESPONSIVO -->

<!-- INICIO CONTENT === -->
<section id="home">

<!-- INICIO ALERT === -->
<?php require('alert.php') ?>
<!-- FIM ALERT === -->

    <div class="galeria_usuario">Galeria - <?php echo $_GET['nome']?></div>

    <!-- INICIO - FORM NOVO ARQUIVO  === -->
    <p><div class="galeria_botao_novo_arquivo"><a href="galeria_novo.php?id=<?php echo $_GET['id'] ?>&nome=<?php echo $_GET['nome'] ?>"><button type="submit" class="btn btn-primary mb-2">Enviar novo arquivo</button></a></div></p>
    <!-- FIM - FORM NOVO ARQUIVO === -->

    
        <?php
        require('conexao.php');

/* 
        $select_galeria = "SELECT * from tb_arquivos where id_login = " .$_GET['id'];

        if ($result=mysqli_query($link,$select_galeria))
        {
        // Return the number of rows in result set
        $rowcount=mysqli_num_rows($result);
        printf("Result set has %d rows.\n",$rowcount);
        // Free result set
        mysqli_free_result($result);
        }
 */

        $select_galeria = "SELECT * from tb_arquivos where id_login = " .$_GET['id'];
        $sql = mysqli_query($link,$select_galeria);

         

            if ($sql=mysqli_query($link,$select_galeria)) {

                $contagem_linhas=mysqli_num_rows($sql);

                if ($contagem_linhas>0) {

                    while($vetor = mysqli_fetch_array($sql)){

                        $id = $vetor["Id"];
                        $arquivo = $vetor["arquivo"];
                        $data_cadastro = $vetor['data_cadastro'];
        
                        echo "<div class='galeria_imagens'><img src=arquivos/" .$arquivo ."></div>";
                    } 

                } else {

                    echo "<div class='titulo_preto'>Nenhum arquivo foi adicionado a galeria ainda</div>";
                }
            }
            
           


        ?>

<!-- INICIO - BOTAO VOLTAR === -->
<?php require('voltar.html'); ?>
<!-- FIM - BOTAO VOLTAR === -->
    
</section>
<!-- FIM CONTENT === -->

<!-- INICIO - JS MENU RESPONSIVO -->
<script src="js/fastclick.js"></script>
<script src="js/scroll.js"></script>
<script src="js/fixed-responsive-nav.js"></script>
<!-- FIM - JS MENU RESPONSIVO -->

</body>
</html>