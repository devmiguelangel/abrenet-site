<?php
require_once('class/class.phpmailer.php');

if(isset($_POST['send-mail'])){
	$name = $_POST['name-cf'];
	$email = $_POST['email-cf'];
	$city = $_POST['city-cf'];
	$message = $_POST['message-cf'];
	
	$mail = new PHPMailer();
	
	$mail->From = "www.abrenet.com";
	$mail->FromName = $name;
	$mail->Subject = $name.' - '.$city;
	$mail->AltBody = "Abrenet.com \n\n\n.";
	$mail->Body = $message;
	$mail->MsgHTML($message);
	//$mail->AddAttachment("files/files.zip");
	//$mail->AddAttachment("files/img03.jpg");
	//$mail->AddAddress("miguel018mg@gmail.com", "miguel-gmail");
	$mail->AddAddress("emontano@sudseguros.com", "emontano");
	//$mail->AddAddress("miguel018mg@outlook.com", "miguel-outlook");
	$mail->IsHTML(true);
	
	if(!$mail->Send()) {
	  echo "Error: " . $mail->ErrorInfo;
	} else {
	  echo "Mensaje enviado correctamente";
	}
	
	//echo $name.$email.$city.$message;
}


?>