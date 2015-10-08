
<style type="text/css">
#content{
	width: 350px;
	margin: 5px auto;
	height: 450px;
	border: 6px solid #F3F3F3;
	padding-top: 5px;
	overflow-y: auto;
	text-align: center;
	font: 900 90% "Century Gothic", Arial, sans-serif;
	color: #0072BC;
}

#upload{
	padding: 12px;
    text-align: center;
    background: #f2f2f2;
    font: 900 90% Helvetica; 
    color: #005B88;  
    border: 1px solid #ccc;  
    width: 150px;
	display: block;  
    -moz-border-radius: 5px;
	-webkit-border-radius: 5px; 
	margin: 0 auto; 
	text-decoration: none;
}
    
#gallery{
	list-style: none;
	margin: 20px 0 0 0;
	padding: 0
}
#gallery li{
	display: block;
	float: left;
	width: 300px;
	height: auto;
	background: #CCCCCC;
	border: 1px solid #093;
	text-align: center;
	padding: 6px 0;
	margin: 5px 0 5px 14px;
	position: relative
}
#gallery li img{
	max-width: 300px;
	/*width: 100%;*/
	height: auto;
}
#gallery li a{
	position: absolute;
	right: 10px;
	top: 10px
}
#gallery li a img{
	width:auto; height:auto
}

#form-text{
	display: block;
}

#form-text #text-content{
	width: 300px;
	height: 60px;
	margin: 10px 0 0 5px;
	padding: 10px 10px;
	border: 1px solid #CCCCCC;
	box-shadow: 2px 2px 5px rgba(0,0,0,0.5);
	
	font: normal 110% "Century Gothic", Arial, sans-serif;
}

#form-text #send-desc{
	margin: 5px 20px 0 0;
	padding: 10px 10px;
	background: #e73535;
	border: 0 none;
	cursor: pointer;
	
	text-decoration: none;
	font: normal 90% Helvetica;
	color: #FFF;
	float: right;
}

#form-text #send-desc:hover{
	background: #129166;
}

#form-text input['radio']{
	color: #005B88;
}

#loader_gif{
	background: #FFFFFF url(img/loader-02.gif) no-repeat center;
	width: auto;
	height: 31px;
	display: none;
}

</style>

<!--<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>-->
<script type="text/javascript" src="subir_imagenes_ajax/ajaxupload.js"></script>


<?php
require_once('class/Content.php');
$cont = new Contenido_cp();

if(isset($_GET['cg']) && isset($_GET['action'])){		//Slider
	$cg = $_GET['cg'];
	$action = $_GET['action'];
	
	if($cg < 3){				//Slider - Carrousel
		if($action == 1){					//Nuevo
			$id = $cont->getId($cg);
			scriptAjaxUpload($cg, $action, 0);
			getFormUpload($cg,$action,$id);
		}elseif($action == 2){				//Actualizar
			if(isset($_GET['b80bb7740288fda1f201890375a60c8f'])){
				$id = $_GET['b80bb7740288fda1f201890375a60c8f'];
				scriptAjaxUpload($cg,$action,$id);
				getFormUpload($cg,$action,$id);
			}else{
				echo 'b80bb7740288fda1f201890375a60c8f no recibido';
			}
		}
	}elseif($cg == 3){
		if($action == 1){			//nuevo
			$id = $cont->getId($cg);
			getFormText($cg,$action,$id);
		}elseif($action == 2){		//actualizar
			if(isset($_GET['b80bb7740288fda1f201890375a60c8f'])){
			$id = $_GET['b80bb7740288fda1f201890375a60c8f'];
			getFormText($cg,$action,$id);
			}else{
				echo 'b80bb7740288fda1f201890375a60c8f no recibido';
			}
		}
	}
}


function getFormUpload($cg,$action,$id){
?>

<div id="content">
    <a href="javascript:;" id="upload">Subir Foto</a>
    <ul id="gallery">
        <!-- Cargar Fotos -->
    </ul>
    <form id="form-text">
    	<textarea id="text-content" name="text-content" placeholder="Introdusca aquí la descripcion de la imagen"></textarea>
    	<br />
    	<input type="submit" id="send-desc" name="send-desc" value="Cambiar descripción" /><br />
    	<input type="hidden" id="cg" name="cg" value="<?php echo $cg ?>" />
    	<input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
    </form>
</div>
<div id="loader_gif"></div>

<?php
}

function getFormText($cg,$action,$id){
?>
<script type="text/javascript">
function mostrarLoader(){
	$('#loader_gif').fadeIn("slow");
}

$(document).ready(function(e){
	$("#form-text").on("submit", function(e){
		e.preventDefault();
		var textC = $("#text-content").attr("value");
		
		if(textC == ''){
			alert('Introdusca la descripcion');
		}else{
			datos = $(this).serialize();
			$("#form-text").fadeOut('fast');
			$.ajax({
				async: true,
				cache: false,
		        type: "POST",
		        url: 'textContent.php',
		        data: datos,
		        beforeSend: mostrarLoader,
		        success: function(datos){
		        	//alert(datos);
		        	$('#loader_gif').fadeOut('slow',function(){
		        		location.href = 'content.php?cg=<?php echo $cg ?>';
		        	});
	            }
			});
			return false;
		}
	});
});
</script>
<form id="form-text">
	<textarea id="text-content" name="text-content" placeholder="Introdusca aquí el Texto del Banner"></textarea>
	<br />
	<input type="submit" id="send-desc" name="send-desc" value="Cambiar descripción" /><br />
	<input type="radio" name="lang-group" value="ES" checked="checked" />ES&nbsp;&nbsp;&nbsp;
	<input type="radio" name="lang-group" value="EN" />EN<br />
	<input type="hidden" id="cg" name="cg" value="<?php echo $cg ?>" />
	<input type="hidden" id="action" name="action" value="<?php echo $action ?>" />
	<input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
</form>
<div id="loader_gif"></div>
<?php
}

function scriptAjaxUpload($cg,$action,$id){
	if($action == 2){		//Actualizar
		$accion = 'upload.php?cg='.$cg.'&action='.$action.'.&id='.$id.'';
	}elseif($action == 1){	//Nuevo
		$accion = 'upload.php?cg='.$cg.'&action='.$action;
	}
?>
<script type="text/javascript">
$(document).ready(function(){
	var button = $('#upload'), interval;
	new AjaxUpload(button,{
		action: '<?php echo $accion; ?>',
		name: 'image',
		onSubmit : function(file, ext){
			// cambiar el texto del boton cuando se selecicione la imagen		
			button.text('Subiendo');
			// desabilitar el boton
			this.disable();
			
			interval = window.setInterval(function(){
				var text = button.text();
				if (text.length < 11){
					button.text(text + '.');					
				} else {
					button.text('Subiendo');				
				}
			}, 200);
		},
		onComplete: function(file, response){
			button.text('Subir Foto');
						
			window.clearInterval(interval);
						
			// Habilitar boton otra vez
			this.enable();
			
			// Añadiendo las imagenes a mi lista
			
			if($('#gallery li').length == 0){
				$('#gallery').html(response).fadeIn("fast");
				$('#gallery li').eq(0).hide().show("slow");
			}else{
				$('#gallery').html(response);
				$('#gallery li').eq(0).hide().show("slow");
			}
		}
	});
	
	// Listar Imagenes/*
	$("#gallery").load("upload.php?list=true&cg=<?php echo $cg ?>&id=<?php echo $id ?>");
	
	// Enviar Texto
	$("#form-text").on("submit", function(e){
		e.preventDefault();
		var textC = $("#text-content").attr("value");
		
		if(textC == ''){
			alert('Introdusca la descripcion');
		}else{
			datos = $(this).serialize();
			$("#form-text").fadeOut('fast');
			$.ajax({
				async: true,
				cache: false,
		        type: "POST",
		        url: 'textContent.php',
		        data: datos,
		        beforeSend: mostrarLoader,
		        success: function(datos){
		        	//alert(datos);
		        	$('#loader_gif').fadeOut('slow',function(){
		        		location.href = 'content.php?cg=<?php echo $cg ?>';
		        	});
	            }
			});
			return false;
		}
	});
	
	// Eliminar
	
	/*$("#gallery li a").live("click",function(){
		var a = $(this)
		$.get("subir_imagenes_ajax/upload.php?action=eliminar",{id:a.attr("id")},function(){
			a.parent().fadeOut("slow")
		})
	})*/
});

function mostrarLoader(){
	$('#loader_gif').fadeIn("slow");
}

</script>
<?php
}

?>


