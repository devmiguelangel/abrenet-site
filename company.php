<?php
include_once('header.php');

if($lang == 'en'){
	$lbl_name = 'Name';
	$lbl_email = 'E-mail';
	$lbl_city = 'City';
	$lbl_message = 'Message';
}elseif($lang == 'es'){
	$lbl_name = 'Nombre';
	$lbl_email = 'E-mail';
	$lbl_city = 'Ciudad';
	$lbl_message = 'Mensaje';
}

?>

<div id="content-main">
Company	
</div>

<?php
include_once('footer.php');
?>