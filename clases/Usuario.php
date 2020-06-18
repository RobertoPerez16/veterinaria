<?php

Class Usuario{

    private $con;
  
    function __construct($con){
        $this->con = $con;    
    }

    public function AñadirUsuario($nom,$ced,$mail,$direccion,$tel){
        
        $sql= "INSERT INTO usuarios (nombre_com, cedula, mail, direccion, telefono)"
        ."VALUES ('$nom','$ced','$mail','$direccion','$tel')";
        $result = $this->con->query($sql);
        if(!$result==true){
            echo 'Error: '.$this->con->error;
        }
    }

    public function ListarUsuario(){
        $sql= "SELECT * FROM usuarios";
        $result = $this->con->query($sql);
        $listaUsu = array();
        while($filas = $result->fetch_assoc()){
            $listaUsu[] = $filas;
        }
        return $listaUsu;
    }

    public function BuscarUsuario($ced){
        $sql = "SELECT * FROM usuarios WHERE cedula='$ced'";
        $result = $this->con->query($sql);
        $busqueda = array();
        while($filas = $result->fetch_assoc()){
            $busqueda[] = $filas;
        }
        return $busqueda;
    }

    public function ModificarUsuario($nombre, $ced, $email,$direccion, $tel){
        $sql="UPDATE usuarios SET nombre_com='$nombre', cedula='$ced', mail='$email',"
                . "direccion='$direccion', telefono='$tel' WHERE cedula='$ced'";
        $result = $this->con->query($sql);
        if($result==false){
            echo 'error: '.$this->con->error;
        }
    }

    public function EliminarUsuario($ced){
        $sql="DELETE FROM usuarios WHERE cedula='$ced'";
        $result= $this->con->query($sql);
        if($result==false){
            echo 'error: '.$this->con->error;
        }
    }
    

}















?>