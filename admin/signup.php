<?php
session_start();

require __DIR__ . '/../classes/Abrenet.php';

if(isset($_POST['user-name']) && isset($_POST['user-pass'])){
	$cx = new Abrenet();
	
	$user = $_POST['user-name'];
	$pass = md5($_POST['user-pass']);
	
	$query = 'SELECT *
	FROM
		cp_usuario
	WHERE
		us_user = "' . $user . '"
			AND us_pass = "' . $pass . '"
	;';

	if (($rs = $cx->query($query, MYSQLI_STORE_RESULT)) !== false) {
		if ($rs->num_rows === 1) {
			$data = $rs->fetch_array(MYSQLI_ASSOC);

			$_SESSION['id-user-cp'] = $data['us_id'];
			$_SESSION['user-cp'] 	= $data['us_user'];
			header("Location: backend.php");
		} else {
			$_SESSION['failure'] = 1;
			header("Location: index.php");
		}
	} else {
		die('Error de proceso');
	}
}

?>