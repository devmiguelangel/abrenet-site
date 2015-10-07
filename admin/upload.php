<?php

require_once('class/Contenido.class.php');
$cont = new Contenido_cp();

if(isset($_GET['cg']) && isset($_GET['action'])){
	$cg = $_GET['cg'];
	$action = $_GET['action'];
	
	//chmod("../img/", 0777);
		
	$destino = "img/";
	$filetype =  $_FILES['image']['type'];
	$type = substr($filetype, (strpos($filetype,"/"))+1);
	$types=array("jpeg","gif","png","x-png","pjpeg");
	
	if(in_array($type, $types)){
		if(isset($_FILES['image'])){
			$nombre = $_FILES['image']['name'];
			$temp   = $_FILES['image']['tmp_name'];
			$img = $destino.$nombre;
			
			// subir imagen al servidor
			if(move_uploaded_file($temp,'../'.$img)){
				switch($action){
					case 1:
						if(!isset($_GET['id'])){	//Nuevo
							$cont->addImg($cg,$img,1);
							//showIdTextArea();
						}
						break;
					case 2:
						if(isset($_GET['id'])){		//Actualizar
							$id = $_GET['id'];
							$cont->updateImg($cg,$id,$img);
							//echo '<br>'.$type;
							//showTextarea();
						}
						break;
				}
			}else{
				echo 'No se puede subir la imagen';
			}
		}
	}else{
		echo "Solo imagenes jpg,png,gif";
		//echo '<br>'.$type;
	}	
}

if(isset($_GET['list']) && isset($_GET['id']) && isset($_GET['cg'])){
	$id = $_GET['id'];
	$cg = $_GET['cg'];
	$cont->getImgUpdate($cg,$id);
}


function showIdTextArea(){
?>
<script type="text/javascript">
	alert ($("#form-text #id").attr("value"));
	//document.getElementById('text-slider').innerHTML = "Imagen actualizada";
</script>
<?php
	
}

?>