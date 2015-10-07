<?php
require_once('db_abrenet.class.php');

class Contenido_cp{
	var $idSlider;
	var $imgSlider;
	var $descSlider;
	var $userSlider;
	
	var $cx;
	var $query;
	var $rs;
	var $dt;
	
	function Contenido_cp(){
		$this->cx = new Abrenet();
	}
	
	function getFancybox(){
?>
<script type="text/javascript" charset="UTF-8">
$(document).ready(function() {
	$(".update-slider").fancybox({
		'overlayColor'		: '#000',
		'overlayOpacity'	: 0.9
	});
	
	$(".link-new-slider").fancybox({
		'overlayColor'		: '#000',
		'overlayOpacity'	: 0.9
	});
});
</script>

<?php
		
	}
	
	// Listar Categoria Slider - Carrousel - Texto
	function getCategory($cg){
		if($cg == 1){			//SLider
			$this->query = 'SELECT * FROM cp_slider ORDER BY sl_orden ASC ;';
			$this->rs = mysql_query($this->query,$this->cx->connectDB());
		
			if(mysql_num_rows($this->rs) > 0){
				$this->getFancybox();
				
				$imprime = '<section id="list-category">
				<p class="link-new-order" align="center">
					<a href="slider.php?cg=1&action=1" class="link-new-slider">Nuevo Banner</a>
					<a href="#" class="link-order-slider" rel="">Modificar Orden</a>
				</p>';
				
				while($this->dt = mysql_fetch_array($this->rs)){
					$imprime .= '<div class="list-slider-content">
						<span class="orden-slider">'.$this->dt['sl_orden'].'</span>
						<img src="../'.$this->dt['sl_img'].'" class="img-slider" />
						<div class="desc-slider">
							<p align="center">'.$this->dt['sl_descripcion'].'</p>
							<p class="link-update" align="center">
								<a class="update-slider" href="slider.php?cg=1&action=2&b80bb7740288fda1f201890375a60c8f='.$this->dt['sl_id'].'" >Modificar</a>
							</p>
						</div>
					</div>';
				}
				$imprime .= '</section>';
				sleep(1);
				echo $imprime;
				//echo md5('carrousel');
			}else{
				echo 'No existen registros';
			}
		}elseif($cg == 2){			//Carrousel
			$this->query = 'SELECT * FROM cp_carrousel ORDER BY cr_id ASC ;';
			$this->rs = mysql_query($this->query,$this->cx->connectDB());
		
			if(mysql_num_rows($this->rs) > 0){
				$this->getFancybox();
				
				$imprime = '<section id="list-category">
				<p class="link-new-order" align="center">
					<a href="slider.php?cg=2&action=1" class="link-new-slider">Nuevo Carrousel</a>
					<a href="#" class="link-order-slider" rel="">Modificar Orden</a>
				</p>';
				
				while($this->dt = mysql_fetch_array($this->rs)){
					$imprime .= '<div class="list-slider-content">
						<span class="orden-slider">'.$this->dt['cr_id'].'</span>
						<img src="../'.$this->dt['cr_img'].'" class="img-carr" />
						<div class="desc-slider">
							<p align="center">'.$this->dt['cr_url'].'</p>
							<p class="link-update" align="center">
								<a class="update-slider" href="slider.php?cg=2&action=2&b80bb7740288fda1f201890375a60c8f='.$this->dt['cr_id'].'" >Modificar</a>
							</p>
						</div>
					</div>';
				}
				$imprime .= '</section>';
				sleep(1);
				echo $imprime;
			}else{
				echo 'No existen registros';
			}
		}elseif($cg == 3){			//Texto
			$this->query = 'SELECT * FROM cp_textbanner ORDER BY tx_idioma ASC, tx_id ASC ;';
			$this->rs = mysql_query($this->query,$this->cx->connectDB());
		
			if(mysql_num_rows($this->rs) > 0){
				$this->getFancybox();
				
				$imprime = '<section id="list-category">
				<p class="link-new-order" align="center">
					<a href="slider.php?cg=3&action=1" class="link-new-slider">Nuevo Texto</a>
					<a href="#" class="link-order-slider" rel="">Modificar Orden</a>
				</p>';
				
				while($this->dt = mysql_fetch_array($this->rs)){
					$imprime .= '<div class="list-slider-content">
						<span class="orden-slider">'.$this->dt['tx_id'].'</span>
						<div class="texto-cg">'.$this->dt['tx_texto'].'</div>
						<div class="desc-slider">
							<p align="center">'.$this->dt['tx_idioma'].'</p>
							<p class="link-update" align="center">
								<a class="update-slider" href="slider.php?cg=3&action=2&b80bb7740288fda1f201890375a60c8f='.$this->dt['tx_id'].'" >Modificar</a>
							</p>
						</div>
					</div>';
				}
				$imprime .= '</section>';
				sleep(1);
				echo $imprime;
			}else{
				echo 'No existen registros';
			}
		}
	
	}
	
	//Obtener id Imagen - texto
	function getId($cg){		
		if($cg == 1){		//slider
			$sql = 'SELECT MAX(sl_id) FROM cp_slider ;';
		}elseif($cg == 2){		//carrousel
			$sql = 'SELECT MAX(cr_id) FROM cp_carrousel ;';
		}elseif($cg == 3){
			$sql = 'SELECT MAX(tx_id) FROM cp_textbanner ;';
		}
		
		$rs = mysql_query($sql,$this->cx->connectDB());
			
		if(mysql_num_rows($rs) > 0){
			$datos = mysql_fetch_array($rs);
			$id = $datos[0] + 1;
		}else{
			$id = 1;
		}
		return $id;
	}
	
	// Añadir slider - carrousel
	function addImg($cg,$img,$user){		
		$nid = $this->getId($cg);
		switch($cg){	
			case 1:			//slider
				$this->query = 'INSERT INTO cp_slider VALUES ("'.$nid.'", "'.$img.'", "Sin descripción", "'.$nid.'", "'.$user.'" );';
				break;
			case 2:			//carrousel
				$this->query = 'INSERT INTO cp_carrousel VALUES ("'.$nid.'", "'.$img.'", "Sin URL", "'.$user.'" );';
				break;
		}
		
		if(mysql_query($this->query,$this->cx->connectDB())){
			echo 'Imagen subida exitosamente';
			$this->getImgUpdate($cg,$nid);
		}else{
			echo 'No se pudo subir la imagen';
		}
	}
	
	// Actualizar texto
	function addText($id,$txt,$lang,$user){
		$this->query = 'INSERT INTO cp_textbanner VALUES("'.$id.'", "'.$txt.'", "'.$lang.'", "'.$user.'")';
		if(mysql_query($this->query,$this->cx->connectDB())){
			echo 'Texto añadido en el Banner';
		}else{
			echo 'No se pudo añadir el texto';
		}
	}
	
	// Actualizar texto
	function updateText($cg,$id,$txt,$lang){
		switch($cg){
			case 1:		//slider
				$this->query = 'UPDATE cp_slider SET sl_descripcion = "'.$txt.'" WHERE sl_id = "'.$id.'" ;';
				break;
			case 2:		//carrousel
				$this->query = 'UPDATE cp_carrousel SET cr_url = "'.$txt.'" WHERE cr_id = "'.$id.'" ;';
				break;
			case 3:		//Texto Banner
				$this->query = 'UPDATE cp_textbanner SET tx_texto = "'.$txt.'", tx_idioma = "'.$lang.'" WHERE tx_id = "'.$id.'" ;';
				break;
		}
		
		if(@mysql_query($this->query,$this->cx->connectDB())){
			switch($cg){
				case 1:
					echo 'Descripción actualizada correctamente';
					break;
				case 1:
					echo 'URL actualizada correctamente';
					break;
			}
			
		}else{
			echo 'La descripción no se pudo actualizar';
		}
	}
	
	// Actualizar Imagen
	function updateImg($cg,$id,$img){
		if($cg == 1){
			$this->query = 'UPDATE cp_slider SET sl_img = "'.$img.'" WHERE sl_id = "'.$id.'" ;';
		}elseif($cg == 2){
			$this->query = 'UPDATE cp_carrousel SET cr_img = "'.$img.'" WHERE cr_id = "'.$id.'" ;';
		}
		
		if(@mysql_query($this->query,$this->cx->connectDB())){
			echo 'Imagen actualizada correctamente';
			$this->getImgUpdate($cg,$id);
		}else{
			echo 'La imagen no se pudo actualizar';
		}
	}
	
	// Obtenr imagen actual
	function getImgUpdate($cg,$id){
		if($cg == 1){
			$this->query = 'SELECT * FROM cp_slider WHERE sl_id = "'.$id.'" ;';
			$this->rs = mysql_query($this->query,$this->cx->connectDB());
			
			if(mysql_num_rows($this->rs) == 1){
				$row = mysql_fetch_array($this->rs);
				echo '<li>
						<a href="javascript:;" id="'.$row['sl_id'].'"><img src="subir_imagenes_ajax/delete.png" /></a>
						<img src="../'.$row['sl_img'].'" />
						<span>'.$row['sl_descripcion'].'</span>
					</li>';
			}
		}elseif($cg == 2){
			$this->query = 'SELECT * FROM cp_carrousel WHERE cr_id = "'.$id.'" ;';
			$this->rs = mysql_query($this->query,$this->cx->connectDB());
			
			if(mysql_num_rows($this->rs) == 1){
				$row = mysql_fetch_array($this->rs);
				echo '<li>
						<a href="javascript:;" id="'.$row['cr_id'].'"><img src="subir_imagenes_ajax/delete.png" /></a>
						<img src="../'.$row['cr_img'].'" />
						<span>'.$row['cr_url'].'</span>
					</li>';
			}
		}
	}
}



?>