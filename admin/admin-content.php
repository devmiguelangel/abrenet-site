<?php
session_start();

require_once('class/Contenido.class.php');

if(isset($_SESSION['id-user-cp']) && isset($_SESSION['user-cp'])){
	if(isset($_POST['acontent'])){
		$ct = new Contenido_cp();
		
		$user = $_SESSION['user-cp'];
		$cg = $_POST['cg'];		//content
		$ct->getCategory($cg);
		//echo $category;
	}
}else{
	$_SESSION['failure'] = 1;
	header("Location: index.php");
}

?>