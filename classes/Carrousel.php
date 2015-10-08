<?php

require 'Abrenet.php';

class Carrousel
{
	private $cx;
	
	public function Carrousel()
	{
		$this->cx = new Abrenet();
	}
	
	public function getCarrousel(){
		$sql = "SELECT *
		FROM
			cp_carrousel
		ORDER BY cr_id ASC
		;";
		

		$this->query = '';
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