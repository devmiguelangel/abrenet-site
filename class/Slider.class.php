<?php
require_once('db_abrenet.class.php');

class Slider{
	var $cx;
	var $query;
	var $sql;
	var $rs;
	var $rs2;
	var $rows;
	
	function Slider(){
		$this->cx = new Abrenet();
	}
	
	function getSlider($lang){
		$lang = strtoupper($lang);
		
		$this->query = 'SELECT * FROM cp_slider ORDER BY sl_orden ASC ; ';
		$this->sql = 'SELECT * FROM cp_textbanner WHERE tx_idioma = "'.$lang.'" ORDER BY tx_id ASC ;';
		
		$this->rs = mysql_query($this->query,$this->cx->connectDB());
		$this->rs2 = mysql_query($this->sql,$this->cx->connectDB());
		
		$num = 0;
		
		if(mysql_num_rows($this->rs2) > 0){
			$num = mysql_num_rows($this->rs2) - 1;
		}
		
		if(mysql_num_rows($this->rs) > 0){
			$i = 0;
			$text = '';
			
			while($this->rows = mysql_fetch_array($this->rs)){
				if(mysql_data_seek($this->rs2,$i)){
					$datos = mysql_fetch_array($this->rs2);
					$text = $datos['tx_texto'];
					$i++;
				}else{
					$text = '';
				}
				echo '<div class="peKb_active" data-delay="5" data-thumb="img/thumbs/kb_01.jpg">
				   		<img src="'.$this->rows['sl_img'].'" alt="Banner Image 2" />
				   		<h1>'.$text.'</h1>
				   	</div>';
			}			
		}
	}
}


?>