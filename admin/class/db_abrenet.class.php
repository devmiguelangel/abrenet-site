<?php
class Abrenet{
	var $host;
	var $user;
	var $passwd;
	var $dbase;
	var $con;
	
	function Abrenet(){
		$this->host = "localhost";
		$this->user = "root";
		$this->passwd = "";
		$this->dbase = "abrenet_db";
	}
	
	function connectDB(){
		if(!($this->con=@mysql_connect($this->host,$this->user,$this->passwd))){
			echo 'No se puede conectar al servidor';
			exit();
		}
		elseif(!@mysql_select_db($this->dbase,$this->con)){
			echo 'No se puede conectar a la base de datos';
			exit();
		}
		return $this->con;
	}
}
?>