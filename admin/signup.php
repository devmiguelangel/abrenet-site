<?php
session_start();

require_once ('class/db_abrenet.class.php');

if(isset($_POST['user-name']) && isset($_POST['user-pass'])){
	$cx = new Abrenet();
	
	$user = $_POST['user-name'];
	$pass = md5($_POST['user-pass']);
	
	$query = 'SELECT * FROM cp_usuario WHERE us_user = "'.$user.'" AND us_pass = "'.$pass.'" ;';
	$rs = mysql_query($query,$cx->connectDB()) or die ('Error de proceso');
	
	if(mysql_num_rows($rs) == 1){
		$dt = mysql_fetch_array($rs);
		$_SESSION['id-user-cp'] = $dt['us_id'];
		$_SESSION['user-cp'] = $dt['us_user'];
		header("Location: backend.php");
		//echo '1';
	}else{
		$_SESSION['failure'] = 1;
		header("Location: index.php");
	}
}


?>