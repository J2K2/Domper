<?php
  include_once ('../../dao/conexion.php');

  session_start();

  if (isset($_SESSION['idtbl_user'])) {
    $sql_buscar = "SELECT * FROM tbl_user WHERE idtbl_user=:id";
    $consulta_buscar = $pdo->prepare($sql_buscar);
    $consulta_buscar->bindparam(':id',$_SESSION['idtbl_user']);
    $consulta_buscar->execute();
    $resultado_buscar=$consulta_buscar->fetch(PDO::FETCH_ASSOC);
    $user=$resultado_buscar;
    $id_user = $user['idtbl_user'];
  }
  else {
    header('location: ../../login/login.php');
  }
  
  
    if ($_POST) {
      // Capturando variables
      /*
    $skill1 = $_POST['newskill1'];
    $skill2 = $_POST['newskill2'];
    $skill3 = $_POST['newskill3'];
    $skill4 = $_POST['newskill4'];
    $skill5 = $_POST['newskill5'];

    $skill_desc1 = $_POST['new_skill_desc1'];
    $skill_desc2 = $_POST['new_skill_desc2'];
    $skill_desc3 = $_POST['new_skill_desc3'];
    $skill_desc4 = $_POST['new_skill_desc4'];
    $skill_desc5 = $_POST['new_skill_desc5'];

        

      // Llenando habilidades
    $sql_ins_skills = "INSERT INTO tbl_habilidad (nombre,descripcion,tbl_user_idtbl_user)
        values (?,?,?)";
        $con_sql_ins_skills = $pdo->prepare($sql_ins_skills);
        $con_sql_ins_skills -> execute(array($skill,$skill_desc,$id_user));
    
    */






    // INFO BASIC
    $nameuser = $user['nameuser'];
    $newpassword = $_POST['newpassword'];
    $newfijo = $_POST['newfijo'];
    $newcelular = $_POST['newcelular'];
    $newnombres = $_POST['newnombres'];
    $newapellidos = $_POST['newapellidos'];
    $newcorreo = $_POST['newcorreo'];
    $newsexo = $_POST['newsexo'];

    $sql_up_info = "UPDATE tbl_user SET 
    nameuser='$nameuser', 
    contrasena='$newpassword', 
    telefono_fijo='$newfijo', 
    telefono_celular='$newcelular', 
    nombre='$newnombres', 
    apellido='$newapellidos', 
    correo='$newcorreo', 
    sexo='$newsexo' 
    WHERE idtbl_user='$id_user';";


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
           <!-- /Breadcrumb -->
    
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
                            <div class="row">
                            <div class="edit">
                            <h6>Cargo</h6>
                            </div>
                                <div class="col-sm-8 text-secondary">
                                    <input class="form-control" type="text" name="newcargo" placeholder="<?php echo $user['nombre'];?>">
                                 </div>
                            </div>
                                <hr>

                            <div class="row">
                            <div class="edit">
                            <h6>Ubicacion</h6>
                            </div>
                                <div class="col-sm-8 text-secondary">
                                    <input class="form-control" type="text" name="newubi" placeholder="<?php echo $user['nombre'];?>">
                                 </div>
                            </div>
                                <hr>
                      <button class="btn btn-outline-primary">Enviar</button>
                      <a href="perfil.php"><button class="btn btn-outline-primary">Volver</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Sitio Web</h6>
                    <span class="text-secondary"><input class="form-control" type="text" name="newpaginaweb" placeholder="<?php echo $user['nombre'];?>"></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>GitHub</h6>
                    <span class="text-secondary"><input class="form-control" type="text" name="newgithub" placeholder="<?php echo $user['nombre'];?>"></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary"><input class="form-control" type="text" name="newtwitter" placeholder="<?php echo $user['nombre'];?>"></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary"><input class="form-control" type="text" name="newinstagram" placeholder="<?php echo $user['nombre'];?>"></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary"><input class="form-control" type="text" name="newfacebook" placeholder="<?php echo $user['nombre'];?>"></span>
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
                    <input class="form-control" type="text" name="newnombres" placeholder="<?php echo $user['nombre'];?>">
                    
                    </div>
                  </div>
                  <hr>


                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Apellidos</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="text" name="newapellidos" placeholder="<?php echo $user['apellido'];?>">
                    
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contraseña</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="text" name="newapellidos" placeholder="<?php echo $user['apellido'];?>">
                    
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
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="text" name="newcorreo" placeholder="<?php echo $user['correo'];?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Teléfono</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="number" name="newfijo" placeholder="<?php echo $user['telefono_fijo'];?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Celular</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input class="form-control" type="number" name="newcelular" placeholder="<?php echo $user['telefono_celular'];?>">
                    </div>
                  </div>
                  <hr>






                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Cerrar sesión</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <a href="../login/logout.php"><button class="btn btn-outline-primary">Salir</button></a>
                    </div>
                  </div>
                </div>
              </div>
              </form>
              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Biografia</i>Informacion General</h6>
                      <p>


                        Hola wenas
                    
                    
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Habilidades</i>En porcentajes</h6>
                      
                      
                    

                    
                    <input class="form-control" type="text" name="newskill1" placeholder="<?php echo $user['nombre'];?>">
                      <div class="progress mb-3" style="height: 5px">
                        <?php 
                        echo "<div class='progress-bar bg-primary' role='progressbar' style='width: 30%' aria-valuenow='80' aria-valuemin='0' aria-valuemax='100'></div>"
                        ?>
                      </div>

                      <input class="form-control" type="text" name="newskill2" placeholder="<?php echo $user['nombre'];?>">
                      <div class="progress mb-3" style="height: 5px">
                        <?php 
                            echo "<div class='progress-bar bg-primary' role='progressbar' style='width: 30%' aria-valuenow='80' aria-valuemin='0' aria-valuemax='100'></div>"
                        ?>
                      </div>



                      <input class="form-control" type="text" name="newskill3" placeholder="<?php echo $user['nombre'];?>">
                      <div class="progress mb-3" style="height: 5px">
                        <?php 
                            echo "<div class='progress-bar bg-primary' role='progressbar' style='width: 30%' aria-valuenow='80' aria-valuemin='0' aria-valuemax='100'></div>"
                        ?>
                      </div>



                      <input class="form-control" type="text" name="newskill4" placeholder="<?php echo $user['nombre'];?>">
                      <div class="progress mb-3" style="height: 5px">
                        <?php 
                            echo "<div class='progress-bar bg-primary' role='progressbar' style='width: 30%' aria-valuenow='80' aria-valuemin='0' aria-valuemax='100'></div>"
                        ?>
                        </div>


                    <input class="form-control" type="text" name="newskill5" placeholder="<?php echo $user['nombre'];?>">
                      <div class="progress mb-3" style="height: 5px">
                        <?php 
                            echo "<div class='progress-bar bg-primary' role='progressbar' style='width: "."30%"."' aria-valuenow='"."80'"." aria-valuemin='0' aria-valuemax='100'></div>"
                        ?>
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
<script type="text/javascript">
	
</script>
</body>
</html>