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
    <center><h1 style="margin-top: 30px; font-size: 30px; font-weight: 700; color: white;">Listado de Administradores: </h1><br>    
    <?php
        if(isset($_SESSION['admin'])){    
            $conexion = new conexion();
            $admin = new Administrador($conexion->conectar());
            if(isset($_SESSION['admin']))
            $arr = $admin->ListarAdministrador();
        }
    ?>
    <div class="container">
        
        <table border="1" class="table table-bordered table-condensed table-hover">
        
                    <thead class="thead thead-dark">
                        <tr>
                            <th style="text-align: center;">Cédula</th>
                            <th style="text-align: center;">Nombres</th>
                            <th style="text-align: center;">Apellidos</th>                            
                            <th style="text-align: center;">E-MAIL</th>
                            <th style="text-align: center;">Contraseña</th>
                            <th style="text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <?php for($i=0;$i<count($arr);$i++):
                        if($_SESSION['admin'] == $arr[$i]['agregado_por']):    
            
                    ?>
                    <tbody class="bg-light">
                        <tr>
                            <td style="text-align: center;"><?=$arr[$i]['cedula']?></td>
                            <td style="text-align: center;"><?=$arr[$i]['primer_nombre'].' '.$arr[$i]['seg_nombre']?></td>
                            <td style="text-align: center;"><?=$arr[$i]['primer_ape'].' '.$arr[$i]['segundo_ape']?></td>
                            <td style="text-align: center;"><?=$arr[$i]['mail']?></td>
                            <td style="text-align: center;"><?=$arr[$i]['password']?></td>
                            <td style="text-align: center"><a href="modificaradmin.php?ced=<?=$arr[$i]['cedula']?>" class="btn btn-warning">
                                Modificar
                            </a>                                                  
                            </td>
                            
                        </tr>
                        <?php
                        endif; 
                        endfor; 
                        ?>                        
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
?>

<?php   $conexion->desconectar();  ?>





