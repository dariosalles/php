<?php
// conexao
require('conexao.php');

if(isset($_FILES['fileUpload']))
{
   require 'wideimage/WideImage.php'; //Inclui classe WideImage à página

   date_default_timezone_set("Brazil/East");

   $name     = $_FILES['fileUpload']['name']; //Atribui uma array com os nomes dos arquivos à variável
   $tmp_name = $_FILES['fileUpload']['tmp_name']; //Atribui uma array com os nomes temporários dos arquivos à variável

   $allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".bmp"); //Extensões permitidas

   $dir = 'arquivos/';

   for($i = 0; $i < count($tmp_name); $i++) //passa por todos os arquivos
   {
      $ext = strtolower(substr($name[$i],-4));

      if(in_array($ext, $allowedExts)) //Pergunta se a extensão do arquivo, está presente no array das extensões permitidas
      {
         $new_name = date("Y-m-d-H-i-s") ."-". $i . $ext;

         $image = WideImage::load($tmp_name[$i]); //Carrega a imagem utilizando a WideImage

         // use essas duas linhas para redimensionar/cortar a imagem
         //$image = $image->resize(170, 180, 'outside'); //Redimensiona a imagem para 170 de largura e 180 de altura, mantendo sua proporção no máximo possível
         //$image = $image->crop('center', 'center', 170, 180); //Corta a imagem do centro, forçando sua altura e largura

         $image->saveToFile($dir.$new_name); //Salva a imagem

         // salva a imagem no bd
         $querybd = "INSERT into tb_arquivos(id_login,arquivo,data_cadastro) VALUES (" .$_GET['id']. ",'" .$new_name ."','" .date("Y-m-d") ."')";
         //echo $querybd;
         //exit();
         mysqli_query($link,$querybd);
         header("Location: galeria.php?id=" .$_GET['id'] ."&nome=" .$_GET['nome'] ."&alert=Arquivo enviado com sucesso");
      }
   }
}
?>

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
<!-- INICIO MENU RESPONSIVO -->
<?php require('menu.html')?>
<!-- FIM MENU RESPONSIVO -->

<!-- INICIO CONTENT === -->
<section id="home">

<!-- INICIO ALERT === -->
<?php require('alert.php')?>
<!-- FIM ALERT === -->

<div class="galeria_usuario">Galeria - <?php echo $_GET['nome']?></div>


   <!-- INICIO - FORM - ENVIAR ARQUIVO  === 
   <form class="md-form" action="#" method="POST" enctype="multipart/form-data">
      <input type="file" name="fileUpload[]" multiple>
      <input type="submit" value="Enviar" class="">
   </form>-->
<div class="galeria_form_upload">
   <form action="#" method="POST" enctype="multipart/form-data">
   <div class="file-field">
      <div class="btn btn-primary btn-sm float-left">
         <span>Procurar Arquivo(s)</span>
         <input type="file" name="fileUpload[]" multiple>
         <input type="submit" value="Enviar">
      </div>
   </div>
   </form>
</div>
<!-- FIM - FORM - ENVIAR ARQUIVO === -->

<!-- INICIO - BOTAO VOLTAR === -->
<?php require('voltar.html'); ?>
<!-- FIM - BOTAO VOLTAR === -->

   
<!-- INICIO - JS MENU RESPONSIVO -->
<script src="js/fastclick.js"></script>
<script src="js/scroll.js"></script>
<script src="js/fixed-responsive-nav.js"></script>
<!-- FIM - JS MENU RESPONSIVO -->

</section>
<!-- FIM CONTENT === -->
 
</body>

</html>