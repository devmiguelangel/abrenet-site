<?php
require_once('db_abrenet.class.php');

class Carrousel{
	var $query;
	var $rs;
	var $rows;
	var $cx;
	
	function Carrousel(){
		$this->cx = new Abrenet();
	}
	
	function getCarrousel(){
		$this->query = 'SELECT * FROM cp_carrousel ORDER BY cr_id ASC ;';
		$this->rs = mysql_query($this->query,$this->cx->connectDB());
		
		if(mysql_num_rows($this->rs) > 0){
			while($this->rows = mysql_fetch_array($this->rs)){
				echo '<img src="'.$this->rows['cr_img'].'" title="'.$this->rows['cr_url'].'" onclick="openUrlBanner(this)" />';
			}
		}else{
			echo '';
		}
	}
}
?>