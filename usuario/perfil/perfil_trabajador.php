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
    $sql_buscar = "SELECT * FROM tbl_trabajador WHERE tbl_user_idtbl_user=:id";
    $consulta_buscar = $pdo->prepare($sql_buscar);
    $consulta_buscar->bindparam(':id',$_SESSION['idtbl_user']);
    $consulta_buscar->execute();
    $resultado_buscar=$consulta_buscar->fetch(PDO::FETCH_ASSOC);
    $trabajador=$resultado_buscar;
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
                      <p class="text-secondary mb-1">Ciudades donde labora</p>
                      <p class="text-muted font-size-sm">*ciudades*</p>
                      <a href="../login/logout.php"><button class="btn btn-outline-primary">Cerrar Sesion</button></a>
                      <a href="editar/editar_trabajador.php"><button class="btn btn-outline-primary">Editar</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"></svg>*Facebook*</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                </ul>
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
                      <?php echo $trabajador['nombre']." ".$trabajador['apellido'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Documento de Identidad</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $trabajador['doc_iden'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Teléfono fijo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $trabajador['tel_fijo'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Teléfono celular</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $trabajador['tel_celular'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $trabajador['correo'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Sexo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $trabajador['sexo'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Hoja de vida</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $trabajador['lifepage'];?>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Reseñas</i></h6>
                      <small>Calificación general</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Servicios</i></h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <style>
                            /* Style The Dropdown Button */
                            .dropbtn {
                             /* background-color: #d4e0d4f5;*/
                              color: gray;
                             /* padding: 14px;
                              font-size: 14px;
                              border: none;
                              cursor: pointer;*/
                            }
                            
                            /* The container <div> - needed to position the dropdown content */
                            .dropdown {
                              position: relative;
                              display: inline-block;
                            }
                            
                            /* Dropdown Content (Hidden by Default) */
                            .dropdown-content {
                              display: none;
                              position: absolute;
                              background-color: #f9f9f9;
                              min-width: 160px;
                              box-shadow: 0px 8px 14px 0px rgba(0,0,0,0.2);
                              z-index: 1;
                            }
                            
                            /* Links inside the dropdown */
                            .dropdown-content a {
                              color: black;
                              padding: 8px 14px;
                              text-decoration: none;
                              display: block;
                            }
                            
                            /* Change color of dropdown links on hover */
                            .dropdown-content a:hover {background-color: #f1f1f1}
                            
                            /* Show the dropdown menu on hover */
                            .dropdown:hover .dropdown-content {
                              display: block;
                            }
                            
                            /* Change the background color of the dropdown button when the dropdown content is shown */
                            .dropdown:hover .dropbtn {
                              background-color: #c6cfdd;
                            }
                            </style>
                            
                        <div class="dropdown">
                            <button class="dropbtn">Edita tu catálogo</button>
                            <div class="dropdown-content">
                              <a href="usuario/register/reg_cliente.php">Como Cliente</a>
                              <a href="usuario/register/reg_trabajador.php">Como trabajador</a>
                              <a href="usuario/register/reg_empresa.php">Como empresa</a>
                            </div>
                          </div>
                    </div>
                  </div>
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