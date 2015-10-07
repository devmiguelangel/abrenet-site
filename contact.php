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
<script type="text/javascript">
$(document).ready(function(e){
	sendFormContact();
	activeItemMenu(4);
});
</script>
	<section id="contact">
		<form id="form-contact" method="post">
			<label><span class="require-cf">*</span><?php echo $lbl_name; ?>: </label>
			<input type="text" id="name-cf" name="name-cf" value="" placeholder="<?php echo strtolower($lbl_name); ?>" autocomplete="off" /><br />
			<label><span class="require-cf">*</span><?php echo $lbl_email; ?>: </label>
			<input type="text" id="email-cf" name="email-cf" value="" placeholder="<?php echo strtolower($lbl_email); ?>" autocomplete="off" /><br />
			<label><span class="require-cf">*</span><?php echo $lbl_city; ?>: </label>
			<input type="text" id="city-cf" name="city-cf" value="" placeholder="<?php echo strtolower($lbl_city); ?>" autocomplete="off" /><br />
			<label><span class="require-cf">*</span><?php echo $lbl_message; ?>: </label><br />
			<textarea id="message-cf" name="message-cf" value="" placeholder="<?php echo strtolower($lbl_message); ?>" autocomplete="off" ></textarea><br />
			<input type="submit" id="send-mail" name="send-mail" value="Send" />
		</form>
		<div id="resp"></div>
	</section>
</div>

<?php
include_once('footer.php');
?>