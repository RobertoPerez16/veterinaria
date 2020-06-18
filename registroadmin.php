<?php

    require_once 'clases/conexión.php';
    require_once 'clases/administrador.php';
    session_start();
    if(isset($_SESSION['reg'])){
        if($_SESSION['reg']== "ok"){ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/registroadmin.css" type="text/css">
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
<body>

    <?php include("menu.php")?>


    <h1 class="titulo">Registro de Administradores</h1>
    <center>
    <form action="" method="POST">
        <div class="container"><br>           
            <input type="text" class="form-control" placeholder="Cédula" name="cedula" autofocus="autofocus"><br>            
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Primer nombre" name="nombre1">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Segundo nombre" name="nombre2">
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Primer apellido" name="ape1">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Segundo apellido" name="ape2">
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <input type="email" class="form-control" placeholder="E-mail" name="mail">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Contraseña" name="contraseña">
                </div>
            </div><br>

            <center><input type="submit" class="btn btn-dark btn-lg btn-block" value="Registrar" name="registrar"></center>
        </div>
    </form></center><br>

    

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

<?php

    $DB = new conexion();
    $admin = new Administrador($DB->conectar());
    
    if(isset($_POST['registrar'])){
        
        $ced = $_POST['cedula'];
        $nom1 = $_POST['nombre1'];       
        $nom2 = $_POST['nombre2'];
        $apellido1 = $_POST['ape1'];
        $apellido2 = $_POST['ape2'];
        $email = $_POST['mail'];
        $password = $_POST['contraseña'];
        if(isset($_SESSION['admin'])){            
            if(!empty($ced) && !empty($nom1) && !empty($nom2) && !empty($apellido1) && !empty($apellido2)
               && !empty($email) && !empty($password)){
                if(isset($_SESSION['admin'])){                   
                    $admin->añadirAdministrador($ced, $nom1, $nom2, $apellido1, $apellido2, $email, $password, $_SESSION['admin']);
                    echo "<center><div class='alert alert-success' style='text-align: center; width:600px; height:55px;' role='alert'>
                                    ¡Administrador Creado!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                    </div></center>";
                }               
               
            }else{
                echo "<center><div class='alert alert-danger' style='text-align: center; width:600px; height:55px;' role='alert'>
                                ¡Por favor llene todos los campos!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                        </div></center>";
            }
        }
        
    }

    $DB->desconectar();
?>