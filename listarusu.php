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
    </style>
</head>
<body style="background: rgba(122, 47, 90, 0.8);">
    <?php include("menu.php"); ?>
    
    <h1 style="color: white; font-size: 30px; text-align: center; margin-top: 20px; margin-bottom: 20px;">Listado de Usuarios</h1>

    <center>
        <div class="container">
            <table border="1" class="table table-bordered table-condensed table-light table-hover">
                <thead class="thead thead-light">
                        <tr>
                            <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Cédula</th>
                            <th style="text-align: center;">E-mail</th>
                            <th style="text-align: center;">Dirección</th>
                            <th style="text-align: center;">Teléfono</th>
                            
                        </tr>
                </thead>
                <?php 
                $con = new conexion();
                $usu = new Usuario($con->conectar());
                $lista = $usu->ListarUsuario();
                   for($i=0;$i<count($lista); $i++):
                ?>
                <tbody>
                            <tr>
                                <td style="text-align: center;"><?=$lista[$i]['nombre_com']?></td>
                                <td style="text-align: center;"><?=$lista[$i]['cedula']?></td>
                                <td style="text-align: center;"><?=$lista[$i]['mail']?></td>
                                <td style="text-align: center;"><?=$lista[$i]['direccion']?></td>
                                <td style="text-align: center;"><?=$lista[$i]['telefono']?></td>                      
                                
                            </tr>
                            
                <?php endfor; ?>
                </tbody>
            </table>
        </div>
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

$con->desconectar();
?>