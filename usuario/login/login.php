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
    $sql_users = "SELECT * FROM tbl_user WHERE nameuser =:nameuser AND contrasena =:contrasena";
    $resultado_query = $pdo->prepare($sql_users);
        
        $resultado_query->bindparam(':nameuser', $username);
        $resultado_query->bindparam(':contrasena', $password);

        $resultado_query -> execute();

        $resultado_query = $resultado_query->fetchAll(PDO:: FETCH_ASSOC);

        $cantidad_usuarios = count($resultado_query);

        if ($cantidad_usuarios == 1) {
          $id_user = $resultado_query[0]['idtbl_user'];
          $_SESSION['autorizado']=true;
          $_SESSION['idtbl_user']= $id_user;

          $sql_buscar_tra = "SELECT * FROM tbl_trabajador WHERE tbl_user_idtbl_user='$id_user'";
          $consulta_buscar_tra = $pdo->prepare($sql_buscar_tra);
          $consulta_buscar_tra->execute(array($id_user));
          $resultado_buscar_tra=$consulta_buscar_tra->fetch(PDO::FETCH_ASSOC);
          
          //count para validar
          $cantidad_trabajadores = count($resultado_buscar_tra);
          $sql_buscar = "SELECT * FROM tbl_clientes WHERE tbl_user_idtbl_user='$id_user'";
          $consulta_buscar = $pdo->prepare($sql_buscar);
          $consulta_buscar->execute(array($id_user));
          $resultado_buscar=$consulta_buscar->fetch(PDO::FETCH_ASSOC);
          //count para validar
          $cantidad_clientes = count($resultado_buscar);
          $sql_buscar_emp = "SELECT * FROM tbl_empresa WHERE tbl_user_idtbl_user='$id_user'";
          $consulta_buscar_emp = $pdo->prepare($sql_buscar_emp);
          $consulta_buscar_emp->execute(array($id_user));
          $resultado_buscar_emp=$consulta_buscar_emp->fetch(PDO::FETCH_ASSOC);
          //count para validar
          $cantidad_empresas = count($resultado_buscar_emp);
          if ($cantidad_clientes == 7) {
            echo "<script>alert('Logeado Correctamente cliente');</script>";
            header("Location: ../perfil/perfil_cliente.php");
            exit;
          } 
          elseif ($cantidad_empresas == 10){
            if ($resultado_buscar_emp['validacion'] == 1){
              echo "<script>alert('Logeado Correctamente empresa')</script>";
              header("Location: ../perfil/perfil_empresa.php");
              exit;
            }else{
              echo "<script>alert('No puedes ingresar, espera la validación de tu usuario')</script>";
              header("location: login.php");
            }
          } elseif ($cantidad_trabajadores == 11){
            if ($resultado_buscar_tra['validacion'] == 1){
              echo "<script>alert('Logeado Correctamente worker');</script>";
              header("Location: ../perfil/perfil_trabajador.php");
              exit;
            }else{
              echo "<script>alert('No puedes ingresar, espera la validación de tu usuario')</script>";
              header("location: login.php");
            }
          }
        }
        else {
          echo "<script>alert('Informacion Incorrecta');</script>";
          header("location: login.php");
        }
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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Login Domper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../img/logo/domperfav.png" />
    <link href="loginform.css" rel="stylesheet">
    <link href="logincss.css" rel="stylesheet">
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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../register/signup.php">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br><br><br>
           
<form method="post" action="login.php" name="signin-form">
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group mb-0">
          <div class="card p-4">
            <div class="card-body">
              <h1>Iniciar Sesion</h1>
              <p class="text-muted">Inicia Sesion con tu cuenta</p>
              <div class="input-group mb-3">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Nombre De Usuario">
              </div>
              <div class="input-group mb-4">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Contraseña">
              </div>
              <div class="row">
                <div class="col-6">
                  <button type="submit" name="login" value="login" class="btn btn-primary px-4">Enviar</button>
                </div>
                <div class="col-6 text-right">
                  <button type="button" class="btn btn-link px-0"><a href="">¿Olvidaste tu contraseña?</a></button>
                </div>
              </div>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <h2>Registrate</h2>
                <p>Registrate para poder iniciar sesion y disfrutar de Domper</p>
                <button type="button" class="btn btn-primary active mt-3"><a href="../register/signup.php">Registrarse ahora</a></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</body>
</html>