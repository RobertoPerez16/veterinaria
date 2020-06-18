<?php

    require_once 'clases/administrador.php';
    require_once 'clases/conexión.php';
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

    <?php include("menu.php") ?>
   
    <h1 class="titulo">Modificar Administradores</h1>
    <?php
      
      $con = new conexion();
      $admin = new Administrador($con->conectar());
      $ced = $_GET['ced'];
      $datos = $admin->BuscarAdministradores($ced);
      for($i=0;$i<count($datos); $i++):
    ?>
    <center>
    <form action="" method="POST">
        <div class="container"><br>                        
            <div class="row">
                <div class="col">
                    <input type="text" value="<?=$datos[$i]['primer_nombre']?>" class="form-control" placeholder="Primer nombre" name="nombre1">
                </div>
                <div class="col">
                    <input type="text" value="<?=$datos[$i]['seg_nombre']?>" class="form-control" placeholder="Segundo nombre" name="nombre2">
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <input type="text" value="<?=$datos[$i]['primer_ape']?>" class="form-control" placeholder="Primer apellido" name="ape1">
                </div>
                <div class="col">
                    <input type="text" value="<?=$datos[$i]['segundo_ape']?>" class="form-control" placeholder="Segundo apellido" name="ape2">
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <input type="email" value="<?=$datos[$i]['mail']?>" class="form-control" placeholder="E-mail" name="mail">
                </div>
                <div class="col">
                    <input type="text" value="<?=$datos[$i]['password']?>" class="form-control" placeholder="Contraseña" name="contraseña">
                </div>
            </div><br>

            <center><input type="submit" class="btn btn-dark btn-lg btn-block" value="Modificar" name="modificar"></center><br>
            <a class="btn btn-warning btn-lg btn-block" href="listaradmin.php">Regresar al listado<a>
        </div>
    </form></center><br>
    <?php
    endfor;
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

if(isset($_POST['modificar'])){
    if(isset($_GET['ced'])){
        $nom1 = $_POST['nombre1'];       
        $nom2 = $_POST['nombre2'];
        $apellido1 = $_POST['ape1'];
        $apellido2 = $_POST['ape2'];
        $email = $_POST['mail'];
        $password = $_POST['contraseña'];
        $datos = $admin->ModificarAdministrador($ced,$nom1,$nom2,$apellido1,$apellido2,$email,$password);
        echo "<center><div class='alert alert-success' style='text-align: center; width:600px; height:55px;' role='alert'>
                                        ¡Administrador Modificado!
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
            </div></center>";
    }else{
        echo 'no existe';
    }
}

$con->desconectar();

?>