<?php
require_once 'clases/conexión.php';
require_once 'clases/administrador.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" href="css/estiloslogin.css">
</head>

<body>

  

  <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="imagenes/administrador.png">
        </div>
        <div class="col-12 form-input">
          <form action="" method="POST">
            <div class="form-group">
              <input type="email" class="form-control" name="mail" placeholder="Ingrese su Email" autofocus="autofocus">
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Ingrese la contraseña">
            </div>
            <button class="btn btn-success" name="login">Ingresar</button>
          </form>
        </div>      

      </div>
    </div>
  </div>






  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

<?php
$con = new conexion();
$admin = new administrador($con->conectar());

if (isset($_POST['login'])) {

  $mail = $_POST['mail'];
  $password = $_POST['password'];
  $admin->RealizarLogin($mail, $password);
}

$con->desconectar();

?>