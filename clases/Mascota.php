<?php

Class Mascota{
    
    private $con;
    
    function __construct($con) {
        $this->con = $con;
    }
    
    public function AñadirMascota($cedueño, $nombre, $raza){
        $sql="INSERT INTO mascotas(cedula_usu, nombre, raza) "
                . "VALUES ('$cedueño','$nombre', '$raza')";
        $result = $this->con->query($sql);
        if($result==false){
            echo 'error: '.$this->con->error;
        }
    }
    
    public function ListarMascotasPorDueño($cedueño){
        $sql="SELECT * FROM mascotas WHERE cedula_usu='$cedueño'";
        $result = $this->con->query($sql);
        $listaM = array();
        while($filas = $result->fetch_assoc()){
            $listaM[] = $filas;
        }
        return $listaM;
    }

    public function ListarMascotas(){
        $sql="SELECT * FROM mascotas";
        $result = $this->con->query($sql);
        $listaM = array();
        while($filas = $result->fetch_assoc()){
            $listaM[] = $filas;
        }
        return $listaM;
    }
    
    
    
    
    
    
}







?>

