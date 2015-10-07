<?php
session_start();

/*
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
 * */

if(isset($_SESSION['id-user-cp']) && isset($_SESSION['user-cp'])){
	$user = $_SESSION['user-cp'];
	$index = 2;		//content
}else{
	$_SESSION['failure'] = 1;
	header("Location: index.php");
}

include_once('header.php');

?>

<script type="text/javascript">
$(document).ready(function(e){
	getCategory();
})
</script>

<?php
if(isset($_GET['cg'])){
	$cg = $_GET['cg'];
	getResultCg($cg);
}
?>
<!--[if lte IE 8]>
	<style type="text/css">
		.text-article{
			background: #000000;
			filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#4cffffff', endColorstr='#4cffffff'); /* IE */
			
			/* works for IE 5+. */
		    filter:alpha(opacity=30); 
		    
		    /* works for IE 8. */
		    -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
		}
		.text-article:hover{
			filter:alpha(opacity=90);
			-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=90)";
		}
	</style>
	
	<script type="text/javascript">
		$(document).ready(function(){
			placeholderInput();
		});
	</script>
<![endif]-->
<div id="main-cp">
	<section id="content-main">
		<div class="contents">
			<div id="c-slider">
				<h3>Slider</h3>
				<article id="go-slider">
					<img src="img/slide-01.jpg" />
				</article>
				<p align="center"><a href="#" class="admin-content" rel="1">Administrar</a></p>
			</div>
		</div>
		<div class="contents">
			<div id="c-carrousel">
				<h3>Carrousel</h3>
				<article id="go-carrousel">
					<img src="img/carrousel-01.jpg" />
				</article>
				<p align="center"><a href="#" class="admin-content" rel="2">Administrar</a></p>
				
			</div>
			<div id="c-text">
				<h3>Texto</h3>
				<article id="go-text">
					<p class="text-article">
						Bancassurance has never been easier<br />
						Insurance for everyone everywhere<br />
						Generate isurance policies on the fly<br />
						Easily interaction between insurance companies, retailers and brokers<br />
						Our Web Services experts will shortly integrate your banking core with our tool
					</p>
				</article>
				<p align="center"><a href="#" class="admin-content" rel="3">Administrar</a></p>
			</div>
		</div>
	</section>	
</div>

<?php
include_once('footer.php');

function getResultCg($cg){
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#content-main').fadeTo('slow', 0, function() {
		$("#main-cp").css({ 'background': '#FFFFFF url(img/loader-01.gif) no-repeat center' });
	});
	
	$.post('admin-content.php', {acontent: 1, cg: <?php echo $cg ?> }, function(data){
		$("#main-cp").css({ 'background': '#FFF'});
		$("#main-cp").html(data);
	});
});
</script>
<?php
	
}
?>

