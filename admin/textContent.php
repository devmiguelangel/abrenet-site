<?php
require_once('class/Contenido.class.php');

if($_POST){
	if(isset($_POST['cg']) && isset($_POST['text-content']) && isset($_POST['id'])){
		$cont = new Contenido_cp();
		
		$cg = $_POST['cg'];
		$txt = $_POST['text-content'];
		$id = $_POST['id'];
		
		if($cg < 3){		//Slider
			$cont->updateText($cg,$id,$txt,0);			
		}elseif($cg == 3){
			$action = $_POST['action'];
			$lang = $_POST['lang-group'];
			
			if($action == 1){		// Nuevo
				$cont->addText($id,$txt,$lang,1);
			}elseif($action == 2){
				//echo $id.'<br>'.$txt.'<br>'.$lang;
				$cont->updateText($cg,$id,$txt,$lang);
			}
			
		}
	}
	
}
?>