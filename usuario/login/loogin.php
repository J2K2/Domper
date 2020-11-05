<?php
include_once ('../../dao/conexion.php');
session_start();
if (isset($_POST['login'])) { // Esto es para que el condicional SOLO se active a la hora de darle "submit" a un formularioç
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$query = $pdo->prepare("SELECT * FROM tbl_user WHERE nameuser = $username");
    //$query->bindParam("nameuser", $username, PDO::PARAM_STR);
    //$query->execute();
    //$result = $query->fetch(PDO::FETCH_ASSOC);
    $sql_users = "SELECT * FROM tbl_user WHERE nameuser = ? AND contrasena = ?";
    $resultado_query = $pdo->prepare($sql_users);

        $resultado_query -> execute(array($username, $password));

        $resultado_query = $resultado_query->fetchAll(PDO:: FETCH_ASSOC);

        $cantidad_usuarios = count($resultado_query);

        if ($cantidad_usuarios == 1) {
            echo "<script>alert('Logeado Correctamente');</script>";

            header("Status: 301 Moved Permanently");
            header("Location: ../perfil/perfil.php");
            exit;

            $id_user = $resultado_query[0]['idtbl_user'];
            $_SESSION['autorizado']=true;
            $_SESSION['idtbl_user']= $id_user;
            //echo $id_user;

        // echo '<meta http-equiv="refresh" content="1,starter.php">';
        }
        else {
            echo "<script>alert('Informacion Incorrecta');</script>";
        }
    /* if (!$result) {
        echo '<p class="error">Su contraseña o usuario es incorrecto</p>';
    } else {
        if (password_verify($password, $result['PASSWORD'])) {
            $_SESSION['user_id'] = $result['ID'];
            echo '<p class="success">Muchas gracias, ya accederá</p>';
        } else {
            echo '<p class="error">Su contraseña o usuario es incorrecto</p>';
        }
    }
    */
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs4 beta login - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="loginform.css" rel="stylesheet">
    <script src="../../js/fonts/fonts.js" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/jquery-3.5.1.js"></script>
    <script type="text/javascript"></script>
</head>
<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../../index.html">Domper</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#about">Sobre Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#services">Servicios</a></li>
                        <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.html#portfolio">Portafolio</a></li>-->   
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#contact">Contáctanos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Iniciar Sesion</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../register/reguser.php">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group mb-0">
          <div class="card p-4">
            <div class="card-body">
              <h1>Login</h1>
              <p class="text-muted">Sign In to your account</p>
              <div class="input-group mb-3">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Username">
              </div>
              <div class="input-group mb-4">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password">
              </div>
              <div class="row">
                <div class="col-6">
                  <button type="button" class="btn btn-primary px-4">Login</button>
                </div>
                <div class="col-6 text-right">
                  <button type="button" class="btn btn-link px-0">Forgot password?</button>
                </div>
              </div>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <h2>Sign up</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <button type="button" class="btn btn-primary active mt-3">Register Now!</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>