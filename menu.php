
<nav class="nav-bar">
    <div class="nav-container"> 
        <a id="nav-menu" class="nav-menu">Menu</a>
        <ul class="nav-list " id="nav">
            <li> <a href="index.php" id="tile1"><i class="icon ion-ios7-home-outline"></i>Cadastro</a></li>
            <li> <a href="galeria.php?id=1" id="tile2"><i class="icon ion-ios7-person-outline"></i> Galeria</a></li>
        </ul>
    </div>
</nav>

<script language="text/javascript">
$(document).ready(function(){
    $('#nav-menu').click(function(){

			if( ( $('ul.nav-list').hasClass('open') ) ) {

				$('ul.nav-list').removeClass('open');

			}else{

				$('ul.nav-list').addClass('open');

			}

    });
});
</script>