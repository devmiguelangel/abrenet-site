<?php

class Abrenet extends MySQLi
{
    private $host;
    private $user;
    private $password;
    private $db;
    
    public function __construct()
    {
        $this->host     = "localhost";
        $this->user     = "homestead";
        $this->password = "secret";
        $this->db       = "abrenet";

        @parent::__construct($this->host, $this->user, $this->password, $this->db);

        if(mysqli_connect_error()){
            die('Error de Conexion (' . mysqli_connect_errno() . ' ) ' . mysqli_connect_error());
        }
    }
}