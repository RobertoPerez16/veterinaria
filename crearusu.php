<?php 

require_once 'clases/Usuario.php';
require_once 'clases/conexión.php';


session_start();
if(isset($_SESSION['reg'])){
	if($_SESSION['reg']=='ok'){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <style>
        #boton{
            background-color: white;            
            border-radius: 10px;
            width: 130px;
            height: 42px;
            text-align: center;
            transition: all 0.5s ease;
        }

        #boton:hover {
            background: gray;
            color: white;
        }

        form{
            background: rgba(0,0,0,0.50);
            width: 450px;
            height: 370px;
            border-radius: 10px;
        }
    </style>
</head>
<body style="background: rgba(122, 47, 90, 0.8);">
 
    <?php include("menu.php") ?>  
    <h1 style="color: white; font-size: 30px; text-align: center; margin-top: 20px; margin-bottom: 20px;">Añadir Usuarios</h1>
    
    <center>    
        <form action="" method="POST"><br>
            <div class="container">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre Completo" name="nombre" autofocus="autofocus">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Cédula" name="cedula">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="E-mail" name="email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Dirección" name="direccion">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Télefono" name="telefono" pattern="[0-9]+">
                </div>
                
                <input type="submit" class="btn btn-danger btn-lg btn-block" value="Añadir" name="añadir">
            </div>
        </form><br>
    
    </center>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




</body>
</html>

<?php
	}else{
		header("Location: login.php");
	}

}else{
	header("Location: login.php");
}		
?>


<?php

   $con = new conexion();
   $usu = new Usuario($con->conectar());

    if(isset($_POST['añadir'])){
       $nombre = $_POST['nombre'];
       $cedula = $_POST['cedula'];
       $email = $_POST['email'];
       $dir = $_POST['direccion'];
       $tel = $_POST['telefono'];
       
       if(!empty($nombre) && !empty($cedula) && !empty($email) && !empty($dir) && !empty($tel)){
        $usu->AñadirUsuario($nombre,$cedula, $email, $dir, $tel);        
        echo "<center><div class='alert alert-success' style='text-align: center; width:600px; height:55px;' role='alert'>
                                    ¡Usuario Creado!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                    </div></center>";

       }else{
        echo "<center><div class='alert alert-danger' style='text-align: center; width:600px; height:55px;' role='alert'>
                ¡Por favor llene todos los campos!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div></center>";

       }
   
    }
    $con->desconectar();

?>