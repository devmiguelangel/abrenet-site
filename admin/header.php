<!DOCTYPE HTML>
<html>
<head>
<title>Administrator</title>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<link type="text/css" href="css/style-cpanel.css" rel="stylesheet" />
<link type="text/css" href="fancybox/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" media="screen" />

<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
<!--[if IE]>
	<script type="text/javascript" src="js/modernizr.custom.40244.js"></script>
	<script type="text/javascript" src="js/script-cpanel-ie.js"></script>
<![endif]-->
<script type="text/javascript" src="js/script-cpanel.js"></script>
<script type="text/javascript" src="fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	

<?php
if($index == 1){
?>
<style type="text/css">
#main-cp{
	background: none;
}	
</style>

<script type="text/javascript">
	$(document).ready(function(){ signUp(); });
</script>
<?php
}
?>

<script type="text/javascript">
$(document).ready(function(){
	
});	
</script>

</head>
<!--[if lte IE 8]>
	<style type="text/css">
		#f-signup #user-name, #f-signup #user-pass{
			border: 1px solid #CCCCCC;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			placeholderInput();
		});
	</script>
<![endif]-->

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]--> 
<body>

<header>
	<img src="../img/abrenet-logo2.png" width="350px" height="91px" />
<?php
if($index == 2){
	echo '<div id="welcome-user">Bienvenido: <span classes="name-user" >'.$user.' </span></br>
			<a href="includes/logout.php" id="logoff" >Cerrar Sesión</a>
		</div>';
}
?>
</header>

<?php
	if($index == 2){
?>
<nav id="backend-menu">
	<ul id="main-menu">
		<li><a href="index.php">Inicio</a></li>
		<li><a href="http://www.abrenet.com/" target="_blank">Sitio</a></li>
		<li><a href="user.php">Usuarios</a></li>
		<li><a href="menu.php">Menús</a></li>
		<li><a href="content.php">Contenido</a></li>
		<li><a href="component.php">Componentes</a></li>
	</ul>
</nav>
<?php
	}
?>


<?php
if($index == 1){
	if(isset($_SESSION['failure'])){
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#failure-signup").show();
	$("#failure-signup").html("El nombre de Usuario o Contraseña son invalidos");
});	
</script>
<?php
	}
}
?>