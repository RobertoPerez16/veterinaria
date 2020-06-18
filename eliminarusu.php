<?php
require_once 'clases/Usuario.php';
require_once 'clases/conexión.php';
require_once 'clases/Mascota.php';

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
        
        .form{
            width: 450px;
            height: 100px;
            background: rgba(0,0,0,0.40);
            border-radius: 10px;
        }
        
        .modi{
            margin-top: 10px;
            width: 400px;
            height: 360px;
            background-color: rgba(0,0,0,0.40);
            border-radius: 17px;
        }
    </style>
</head>
<body style="background: rgba(122, 47, 90, 0.8);">

    <?php include("menu.php"); ?>
    <h1 style="color: white; font-size: 30px; text-align: center; margin-top: 20px; margin-bottom: 30px;">Modificar Usuario</h1>
   
<center>
    <form class="form-inline form" method="POST">
        
        <h4 style="color: white; margin-left: 30px; margin-right: 12px;">Cédula:</h4><input name="ced" class="form-control mr-sm-2" type="search" aria-label="Search" autofocus="autofocus">
        <input class="btn btn-warning btn-lg" type="submit" value="Buscar" name="buscar">
        
    </form>
</center>

<?php
  $con = new conexion();
  $usu = new Usuario($con->conectar());
  $mascota = new Mascota($con->conectar());
  
    if(isset($_POST['buscar'])){
        $cedula = $_POST['ced'];                
        $array = $mascota->ListarMascotasPorDueño($cedula);
        if($array!=null){
            echo "<br><center><div class='alert alert-danger' style='text-align: center; width:600px; height:55px;' role='alert'>
                ¡No puede eliminar, este usuario tiene mascota asignada!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div></center>";
        }else{
            $cedula = $_POST['ced'];
            $lista = $usu->BuscarUsuario($cedula);
            echo "<br><center><div class='alert alert-success' style='text-align: center; width:600px; height:55px;' role='alert'>
                ¡Puede eliminar este usuario, no tiene mascota asignada!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div></center>";
            for($i=0; $i<count($lista); $i++){  
       
?>
    <center>    
        <form class="modi" action="" method="POST"><br>
            <div class="container">
                <div class="form-group">
                    <input type="text" value="<?=$lista[$i]['nombre_com']?>" class="form-control" placeholder="Nombre Completo" name="nombre" autofocus="autofocus">
                </div>
                <div class="form-group">
                    <input type="text" value="<?=$lista[$i]['cedula']?>" class="form-control" placeholder="cedula" name="c" readonly="readonly">
                </div>                
                <div class="form-group">
                    <input type="email" value="<?=$lista[$i]['mail']?>" class="form-control" placeholder="E-mail" name="email">
                </div>
                <div class="form-group">
                    <input type="text" value="<?=$lista[$i]['direccion']?>" class="form-control" placeholder="Dirección" name="direccion">
                </div>
                <div class="form-group">
                    <input type="text" value="<?=$lista[$i]['telefono']?>" class="form-control" placeholder="Télefono" name="telefono" pattern="[0-9]+">
                </div>
                
                <input type="submit" class="btn btn-danger btn-lg btn-block" value="Eliminar" name="eliminar">
            </div>
        </form><br>
    
    </center>

    <?php
            }           
            
        }   
    
    }

    ?>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

<?php

}else{
	header("Location:login.php");
    }

}else{
	header("Location: login.php");
}	
?>  

<?php

if(isset($_POST['eliminar'])){
    $ced = $_POST['c'];
    $usu->EliminarUsuario($ced);
    echo "<br><center><div class='alert alert-success' style='text-align: center; width:600px; height:55px;' role='alert'>
    ¡Usuario Eliminado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
    </div></center>";
    echo "<center><a href='listarusu.php' class='btn btn-primary'>Regresar al listado</a></center>";
}


$con->desconectar();





?>





