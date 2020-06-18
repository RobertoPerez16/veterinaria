<?php

require_once 'clases/Mascota.php';
require_once 'clases/conexión.php';
require_once 'clases/Usuario.php';

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
            width: 400px;
            height: 280px;
            border-radius: 7px;
        }
    </style>
</head>
<body style="background-color: rgba(255, 67, 75, 0.8);">
 
    <?php include("menu.php") ?>  
    <h1 style="color: white; font-size: 30px; text-align: center; margin-top: 20px; margin-bottom: 50px;">Añadir Mascotas</h1>
    <center>    
        <form action="" method="POST"><br>
            <div class="container">                
                <div class="form-group">
                    <h5 style="color: white">Cédula de Usuario:</h5>                    
                    <select class="form-control" name="ceduladueño">
                        <?php
                        $con = new conexion();
                        $usu = new Usuario($con->conectar());
                        $mascota = new Mascota($con->conectar());
                        $lista = $usu->ListarUsuario();
                        for($i=0; $i<count($lista); $i++):
                        ?>                        
                        <option><?=$lista[$i]['cedula']?></option>
                        <?php endfor;?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre de la mascota" name="nom">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Raza de la mascota" name="raza">
                </div>
                                
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Añadir" name="asignar">
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

if(isset($_POST['asignar'])){
    
    $ceduladueño = $_POST['ceduladueño'];    
    $nom = $_POST['nom'];   
    $raza = $_POST['raza'];
    
    if(!empty($nom) && !empty($raza)){
        $mascota->AñadirMascota($ceduladueño, $nom, $raza);
        echo "<center><div class='alert alert-success' style='text-align: center; width:600px; height:55px;' role='alert'>
                                    ¡Mascota Asignado!
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
