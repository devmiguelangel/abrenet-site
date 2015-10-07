<?php
$aviso = "";
// check form  
if ($_POST) {
	// email de destino
	$email = "miguel018mg@gmail.com";
	
	// asunto del email
	$subject = "Contacto";
	
	// Cuerpo del mensaje
	$mensaje = "---------------------------------- \n";
	$mensaje.= "            Contacto               \n";
	$mensaje.= "---------------------------------- \n";
	$mensaje.= "NOMBRE:   ".$_POST['nombre']."\n";
	$mensaje.= "EMPRESA:  ".$_POST['empresa']."\n";
	$mensaje.= "EMAIL:    ".$_POST['email']."\n";
	$mensaje.= "TELEFONO: ".$_POST['telefono']."\n";
	$mensaje.= "FECHA:    ".date("d/m/Y")."\n";
	$mensaje.= "HORA:     ".date("h:i:s a")."\n";
	$mensaje.= "---------------------------------- \n\n";
	$mensaje.= $_POST['mensaje']."\n\n";
	$mensaje.= "---------------------------------- \n";
	
	// headers del email
	$headers = "From: ".$_POST['email']."\r\n";
	
	// Enviamos el mensaje
	if (mail($email, $subject, $mensaje, $headers)) {
		$aviso = "Su mensaje fue enviado correctamente";
	} else {
		$aviso = "Error de envío";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Enviar Email con PHP - unijimpe</title>
<style type="text/css">
body {
	margin: 16px;
	padding: 0;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333;	
}
input, textarea {
	float: left;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333;
	padding: 2px;
	width: 250px;
	margin-bottom: 4px;
}
label {
	float: left;
	width: 100px;
}
button {
	width: 80px;
	background: #333;
	color: #FFF;
	padding: 3px 8px;
}
form {
	border: solid 1px #CCC;
	background: #efefef;
	padding: 16px;
	width: 380px;
}
br { clear: both; }
em { color: red; }  
</style>
</head>
<body>
<h2>Enviar Email con PHP</h2>
<?php if ($aviso != "") { ?>
<p><em><?php echo $aviso; ?></em></p>
<?php } ?>
<form action="" method="post">
    <label for="nombres">Nombres</label> <input name="nombre" id="nombre" type="text" /><br />
    <label for="empresa">Empresa</label> <input name="empresa" id="empresa" type="text" /><br />
    <label for="email">Email</label> <input name="email" id="email" type="text" /><br />
    <label for="telefono">Telefono</label> <input name="telefono" id="telefono" type="text" /><br />
    <label for="mensaje">Mensaje</label> <textarea name="mensaje" cols="30" rows="6"></textarea><br />
    <label for="btsend">&nbsp;</label> <button name="btsend" id="btsend" type="submit">Enviar</button>
</form>
</body>
</html>