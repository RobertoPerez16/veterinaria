<?php

class Administrador
{
    private $con;

    function __construct($con){
        $this->con = $con;
        
    }

    public function añadirAdministrador($ced, $nom1, $nom2, $ape1, $ape2, $email, $contra,$mail){
        $sql = "INSERT INTO administradores (cedula,primer_nombre,seg_nombre,primer_ape,segundo_ape,mail,password,agregado_por)"
            . "VALUES('$ced','$nom1','$nom2','$ape1','$ape2','$email','$contra','$mail')";
        $result = $this->con->query($sql);
    }

    public function ListarAdministrador(){
        $sql = "SELECT *FROM administradores";
        $result = $this->con->query($sql);
        $listaAdmin = array();
        while ($fila = $result->fetch_assoc()) {
            $listaAdmin[] = $fila;
        }
        return $listaAdmin;
    }

    public function RealizarLogin($email, $contraseña){
        if ($this->con->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $this->con->connect_errno . ") " . $this->con->connect_error;
        } else {
            $sql = "SELECT password FROM administradores WHERE mail='$email' and password='$contraseña'";
            $result = $this->con->query($sql);
            if ($result->fetch_assoc()) {     
                session_start();                   
                $_SESSION['reg'] ='ok';
                $_SESSION['admin'] = $email;                
                echo "<div class='d-flex justify-content-center'>
                        <div class='spinner-border text-light' role='status'>
                            <span class='sr-only'>Loading...</span>                            
                        </div>
                        <h3 style='text-align: center; color: white; margin-left: 10px; font-size: 35px'>
                        Iniciando sesión</h3>                        
                    </div>";
                
                header("Refresh: 3; url=paneladmin.php");
            } else {
                $_SESSION['Reg'] = 'fail';
                echo "<center><div class='alert alert-danger' style='text-align: center; width:350px; height:55px;' role='alert'>
                ¡Usuario o contraseña Incorrectos!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div></center>";
            }
        }
    }

    public function ModificarAdministrador($cedula, $nom1, $nom2, $ape1, $ape2, $mail, $password){
       $sql = "UPDATE administradores SET primer_nombre='$nom1', seg_nombre='$nom2', primer_ape='$ape1',
       segundo_ape='$ape2', mail='$mail', password='$password' WHERE cedula='$cedula'";
       $result = $this->con->query($sql);
    }

    public function EliminarAdministrador($ced){
        $sql = "DELETE FROM administradores WHERE cedula='$ced'";
        $result = $this->con->query($sql);
    }

    public function BuscarAdministradores($cedula){        
        $sql="SELECT *FROM administradores WHERE cedula='$cedula'";
        $result = $this->con->query($sql);
        $busqueda = array();
        while($fil = $result->fetch_assoc()){
            $busqueda[] = $fil; 
        }
        return $busqueda;
        
    }






}
