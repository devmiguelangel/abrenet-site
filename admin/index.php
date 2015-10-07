<?php
session_start();

if(isset($_SESSION['id-user-cp']) && isset($_SESSION['user-cp'])){
	header("Location: backend.php");
}

$index = 1;
include_once('header.php');
?>


<div id="main-cp">
	<section id="main-container">
		<h1>cPanel</h1>
		<form id="f-signup" method="post" action="">
			<div id="failure-signup"></div>
			<label>Nombre de Usuario</label><br />
			<input type="text" size="50" id="user-name" name="user-name" placeholder="Usuario" autocomplete="off" /><br />
			<div class="error-user"></div>
			<label>Contraseña</label><br />
			<input type="password" size="50" id="user-pass" name="user-pass" placeholder="Contraseña" autocomplete="off" />
			<div class="error-pass"></div>
			<div id="submit-button">
				<input type="submit" id="send-login" value="Acceder" />
			</div>
		</form>
	</section>
</div>

<?php
include_once('footer.php');
?>