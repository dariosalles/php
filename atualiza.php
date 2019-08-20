<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
<title>Crud Simples</title>
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

<!-- INICIO ALERT === -->
<?php require('alert.php') ?>
<!-- FIM ALERT === -->

<!-- INICIO CONTENT === -->
<section id="home">
   
 <!-- iNICIO - ATUALIZAR -->
<div class="busca">
  <?php require("conexao.php");

  //seleciona dos dados pelo id
  $querybd = "SELECT * from tb_login where id_login = " .$_GET['id'] ."";
  $sql = mysqli_query($link,$querybd);

  while($vetor = mysqli_fetch_array($sql)){

      $id = $vetor["id_login"];
      $nome = $vetor["nome"];
        
  }
  ?>

  <form method="POST" action="funcoes2.php">
    <div class="form-group mb-2">
    <label for="exampleFormControlInput3"> &nbsp;&nbsp;Nome:  &nbsp;&nbsp;</label>
      <input type="text" class="form-control" name="nome" id="exampleFormControlInput3" value="<?php echo $nome; ?>">
      <input type="hidden" name="acao" value="atualizar">
      <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
      <input type="hidden" name="submit">
      <button type="submit" class="btn btn-primary mb-2">Atualizar</button>
    </div>
  
  </form>

</div>
 <!-- FIM - ATUALIZAR -->
</section>
<!-- FIM CONTENT === -->

<!-- INICIO - JS MENU RESPONSIVO -->
<script src="js/fastclick.js"></script>
<script src="js/scroll.js"></script>
<script src="js/fixed-responsive-nav.js"></script>
<!-- FIM - JS MENU RESPONSIVO -->

</body>
</html>