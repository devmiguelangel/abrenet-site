<?php

//$cn = mysql_connect("localhost","usuario","password");
//mysql_select_db("basededatos", $cn);


if(!isset($_GET['action'])){
	$destino = "photos/";
	$filetype =  $_FILES['image']['type'];
	$type = substr($filetype, (strpos($filetype,"/"))+1);
	$types=array("jpeg","gif","png");
	
	if(in_array($type, $types)){
		
		if(isset($_FILES['image'])){
			
			$nombre = $_FILES['image']['name'];
			$temp   = $_FILES['image']['tmp_name'];
			
			// subir imagen al servidor
			if(move_uploaded_file($temp, $destino.$nombre))
			{
				
				//$query = mysql_query("INSERT INTO fotos VALUES('','".$nombre."')" ,$cn);	
				//$ID = mysql_insert_id();
			}
						
			echo  '<li>
					<a href="javascript:;"><img src="delete.png" /></a>
					<img src="photos/'.$nombre.'" />
					<span>'.$nombre.'</span>
				</li>';
		}
	}else{
		echo "Solo imagenes jpg,png,gif";
	}
}
?>