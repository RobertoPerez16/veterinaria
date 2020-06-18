<?php

   
    
    if(isset($_SESSION['reg'])){
        if($_SESSION['reg']== "ok"){ 


?>



<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand"> <img src="imagenes/iconoveterinaria.svg" width="32px;" height="32px;"> Veterinaria PETSIGN</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#primeranav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="primeranav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="paneladmin.php" style="color: white;">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a href="" class="btn btn-danger nav-link dropdown-toggle" style="color: white;" data-toggle="dropdown">Administradores</a>
                        <div class="dropdown-menu">
                            <a href="registroadmin.php" class="dropdown-item">Crear Administradores</a>
                            <a href="listaradmin.php"   class="dropdown-item">Listar Administradores</a>                            
                        </div>
                    </li> 

                    <li class="nav-item dropdown">
                        <a href="" class="btn btn-success nav-link dropdown-toggle" style="margin-left: 7px; color: white;" data-toggle="dropdown">Usuarios</a>
                        <div class="dropdown-menu">
                            <a href="crearusu.php" class="dropdown-item">Crear Usuario</a>
                            <a href="listarusu.php" class="dropdown-item">Listar Usuarios</a>
                            <a href="modificarusu.php" class="dropdown-item">Modificar Usuarios</a>
                            <a href="eliminarusu.php" class="dropdown-item">Eliminar Usuarios</a>  
                        </div>
                    </li>  

                    <li class="nav-item dropdown">
                        <a href="" class="btn btn-warning nav-link dropdown-toggle" style="margin-left:7px; color: black;" data-toggle="dropdown">Mascotas</a>
                        <div class="dropdown-menu">
                            <a href="crearmascota.php" class="dropdown-item">Asignar Mascotas</a>
                            <a href="listarporced.php" class="dropdown-item">Listar Mascotas por dueño</a>
                            <a href="listarmascota.php" class="dropdown-item">Listar Mascotas</a>                               
                        </div>
                    </li>                     
                </ul>                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="cerrarsesion.php" style="color: black;" id="boton">Cerrar Sesión<a></li>
                </ul>
            </div>
            <div>
    </nav>


<?php

}else{
	header("Location:login.php");
    }

}else{
	header("Location: login.php");
}	
?>
