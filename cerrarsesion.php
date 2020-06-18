<?php
session_start();
if(isset($_SESSION['reg'])){
    if($_SESSION['reg']=='ok'){
        session_unset();
        session_destroy();
    }else{
        header("Location: login.php");                
    }
}else{
	header("Location: login.php");
}

echo "<h1>Cerrando su sesión, espere unos segundos</h1>";
header("Refresh: 2; url=login.php");

?>