<?php

class conexion{
    public $con;
    
    function conectar() {
        $this->con = new mysqli('localhost','programador','12345678','veterinaria');
        if($this->con->connect_errno){
            echo "Falló la conexión a MySQL: (" . $this->link->connect_errno . ") ";
        }
        return $this->con;
    }
    
    function desconectar(){
        mysqli_close($this->con);
    }
    
}







?>
