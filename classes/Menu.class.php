<?php
class Menu{
	var $lang;
	var $menuEs;
	var $menuEn;
	var $url;
	
	function Menu(){
		$this->menuEn = array(1=>'Home', 2=>'Resellers', 3=>'Company', 4=>'Contact Us');
		$this->menuEs = array(1=>'Inicio', 2=>'Resellers', 3=>'Empresa', 4=>'Contáctenos');
		$this->url = array(1=>'index.php', 2=>'reseller.php', 3=>'company.php', 4=>'contact.php');
	}
	
	function menuMainMenu($lang,$page){
		if($lang == 'en'){
?>
<ul class="menu">
<?php
			$i = 1;
			$numItems = 4;
			while($i <= $numItems){
				if($page == $i){
					if($i != 1){
						echo '<li><a classes="active" id="item-'.$i.'" href="'.$this->url[$i].'?lang=en&71860c77c6745379b0d44304d66b6a13='.$i.'">'.$this->menuEn[$i].'</a></li>';
					}else{
						echo '<li><a classes="active" id="item-'.$i.'" href="'.$this->url[$i].'?lang=en&71860c77c6745379b0d44304d66b6a13='.$i.'">'.$this->menuEn[$i].'</a></li>';
					}
				}else{
					if($i == $numItems){
						echo '<li><a classes="last-item" id="item-'.$i.'" href="'.$this->url[$i].'?lang=en&71860c77c6745379b0d44304d66b6a13='.$i.'">'.$this->menuEn[$i].'</a></li>';
					}else{
						echo '<li><a id="item-'.$i.'" href="'.$this->url[$i].'?lang=en&71860c77c6745379b0d44304d66b6a13='.$i.'">'.$this->menuEn[$i].'</a></li>';
					}
				}
				$i++;
			}
?>
</ul>
<?php	
		}elseif($lang == 'es'){
?>
<ul class="menu">
<?php
			$i = 1;
			$numItems = 4;
			while($i <= $numItems){
				if($page == $i){
					echo '<li><a classes="active" id="item-'.$i.'" href="'.$this->url[$i].'?lang=es&71860c77c6745379b0d44304d66b6a13='.$i.'">'.$this->menuEs[$i].'</a></li>';
				}else{
					if($i == $numItems){
						echo '<li><a classes="last-item" id="item-'.$i.'" href="'.$this->url[$i].'?lang=es&71860c77c6745379b0d44304d66b6a13='.$i.'">'.$this->menuEs[$i].'</a></li>';
					}else{
						echo '<li><a id="item-'.$i.'" href="'.$this->url[$i].'?lang=es&71860c77c6745379b0d44304d66b6a13='.$i.'">'.$this->menuEs[$i].'</a></li>';
					}
				}
				$i++;
			}
?>
</ul>
<?php
		}
	}
	
	function getMenuFooter($lang){
		if($lang == 'en'){
?>
<a href="index.php?lang=en&71860c77c6745379b0d44304d66b6a13=1">Home</a> <span class="div-link">|</span>  
<a href="reseller.php?lang=en&71860c77c6745379b0d44304d66b6a13=2">Resellers</a> <span class="div-link">|</span> 
<a href="company.php?lang=en&71860c77c6745379b0d44304d66b6a13=3">Company</a> <span class="div-link">|</span> 
<a href="contact.php?lang=en&71860c77c6745379b0d44304d66b6a13=4">Contact Us</a>
<?php
		}elseif($lang == 'es'){
?>
<a href="index.php?lang=es&71860c77c6745379b0d44304d66b6a13=1">Inicio</a> <span class="div-link">|</span>  
<a href="reseller.php?lang=es&71860c77c6745379b0d44304d66b6a13=2">Resellers</a> <span class="div-link">|</span> 
<a href="company.php?lang=es&71860c77c6745379b0d44304d66b6a13=3">Empresa</a> <span class="div-link">|</span> 
<a href="contact.php?lang=es&71860c77c6745379b0d44304d66b6a13=4">Contáctenos</a>
<?php
		}
	}
}

?>