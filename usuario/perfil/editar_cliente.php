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
    $id_user=$user['idtbl_user'];
    $sql_buscar = "SELECT * FROM tbl_clientes WHERE tbl_user_idtbl_user=:id";
    $consulta_buscar = $pdo->prepare($sql_buscar);
    $consulta_buscar->bindparam(':id',$_SESSION['idtbl_user']);
    $consulta_buscar->execute();
    $resultado_buscar=$consulta_buscar->fetch(PDO::FETCH_ASSOC);
    $cliente=$resultado_buscar;

    if (isset($_POST['editar'])) {
      $newtel = $_POST['newtel'];
      $newnombres = $_POST['newnombres'];
      $newapellidos = $_POST['newapellidos'];
      $newcorreo = $_POST['newcorreo'];
      $newsexo = $_POST['newsexo'];
      if($newsexo == "1"){
        $newsexo = "Masculino";
      }else{
        $newsexo = "Femenino";
      }

      $sql_actualizar = "UPDATE tbl_clientes SET
      nombre=$newtel, 
      apellido=$newapellidos, 
      telefono=$newtel,
      correo=$newcorreo, 
      sexo=$newsexo,
      WHERE tbl_user_idtbl_user=:id";

      $consulta_actualizar = $pdo->prepare($sql_actualizar);
      $consulta_actualizar->bindparam(':id',$_SESSION['idtbl_user']);
      $consulta_actualizar->execute();
      $resultado=$consulta_actualizar->fetchAll(PDO::FETCH_ASSOC);
      var_dump($resultado);
      //header ("Location: perfil_cliente.php");
    }
  }
  else {
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
    <link href="editar/bootstrap.min.css" rel="stylesheet">
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
          <form method="POST" action="" name="editar">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $user['nameuser'];?></h4>
                      <h7>No puedes cambiarlo</h7><br><br>
                      <hr>
                      <a href="perfil_cliente.php"><button class="btn btn-outline-primary">Volver</button></a>
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
                    <input type="text" name="newnombres" value="<?php echo $cliente['nombre'];?>" required>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Apellidos</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="newapellidos" value="<?php echo $cliente['apellido'];?>" required>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Celular</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="number" name="newtel" value="<?php echo $cliente['telefono'];?>" required>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="newcorreo" value="<?php echo $cliente['correo'];?>" required>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Sexo</h6>
                    </div>    
                    <div class="col-sm-9 text-secondary">
                          <select name="newsexo">
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                          </select>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                     <button type="submit" name='editar' class="btn btn-outline-primary">Editar</button>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>