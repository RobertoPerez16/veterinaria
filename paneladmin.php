<?php 

require_once 'clases/administrador.php';
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
    </style>
</head>
<body style="background: #4C8BEC;">

    <?php include("menu.php"); ?>

    <h1 style=" margin-top: 30px; text-align: center; font-size: 30px; font-weight:700; color: white;">
    ¡BIENVENIDO AL PANEL DE ADMINISTRADORES!
    </h1><br>
    <?php 
       
       $link = new conexion();  
       $usuAdmin = new Administrador($link->conectar());
       $admin= $usuAdmin->ListarAdministrador($link->conectar());
       for($i=0;$i<count($admin);$i++){   
            if(isset($_SESSION['admin'])){ 
                if($_SESSION['admin'] == $admin[$i]['mail']){    
                    echo "<h1 style='margin-top: 30px; text-align: center; font-size: 30px; font-weight:700; color: white';>
                    Administrador Conectado: ".$admin[$i]['primer_nombre']."</h3>";
                }
            }
        }
     ?>
    </h3>
    <center><img src="imagenes/administrador.png"></center>
     
    



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
	header("Location:login.php");
}		
?>

<?php $link->desconectar(); ?>