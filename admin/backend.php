<?php
session_start();

if(isset($_SESSION['id-user-cp']) && isset($_SESSION['user-cp'])){
	$user = $_SESSION['user-cp'];
	$index = 2;		//backend
}else{
	$_SESSION['failure'] = 1;
	header("Location: index.php");
}

include_once('header.php');

?>

<div id="main-cp">
	<br /><br /><br /><br /><br /><br /><br /><br /><br />Contenido
</div>

<?php
include_once('footer.php');
?>