<?php
  include_once ('../../dao/conexion.php');

  session_start();

  if (isset($_SESSION['idtbl_user'])) {
    $sql_buscar_us = "SELECT * FROM tbl_user WHERE idtbl_user=:id";
    $consulta_buscar_us = $pdo->prepare($sql_buscar_us);
    $consulta_buscar_us->bindparam(':id',$_SESSION['idtbl_user']);
    $consulta_buscar_us->execute();
    $resultado_buscar_us=$consulta_buscar_us->fetch(PDO::FETCH_ASSOC);
    $user=$resultado_buscar_us;

    $sql_buscar = "SELECT * FROM tbl_clientes WHERE tbl_user_idtbl_user=:id";
    $consulta_buscar = $pdo->prepare($sql_buscar);
    $consulta_buscar->bindparam(':id',$_SESSION['idtbl_user']);
    $consulta_buscar->execute();
    $resultado_buscar=$consulta_buscar->fetch(PDO::FETCH_ASSOC);
    $cliente=$resultado_buscar;
  }else{
    header('location: ../../login/login.php');
  }
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/logo/domperfav.png" />
    <link href="profile.css" rel="stylesheet">
</head>
<body>
  <!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../../index.html#page-top">Domper</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#about">Sobre Nosotros</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#services">Servicios</a></li>
                <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portafolio</a></li> -->
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#contact">Contáctanos</a></li>
                <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../login/login.php">Iniciar Sesion</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../register/signup.php">Registrarse</a></li> -->
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../login/logout.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br><br>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../../index.html">Inicio</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
            /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $user['nameuser'];?></h4>
                      <a href="../login/logout.php"><button class="btn btn-outline-primary">Cerrar Sesion</button></a>
                      <a href="editar/editar_cliente.php"><button class="btn btn-outline-primary">Editar</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $cliente['nombre']." ".$cliente['apellido'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Teléfono</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $cliente['telefono'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $cliente['correo'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Sexo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $cliente['sexo'];?>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
</body>
</html>