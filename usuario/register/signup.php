<?php
    //Incluir la conexion a la base de datos
    include_once ('../../dao/conexion.php');
    //Capturar las variables del formulario HTML
    if ($_POST) {
        $name = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['user_name'];
        $contrasena = $_POST['contrasena'];
        $correo = $_POST['correo'];
        $telcelular = $_POST['telefono_celular'];
        $telfijo = $_POST['telefono_fijo'];
        // Para las opciones con <option> se usa el $_Request al capturar la variable.
        $sexo = $_REQUEST['sexo'];
        $user_type = $_REQUEST['usertype'];
        // Condicional para cambiar el valor numerico a valor de texto de la variable usertype
        if ($user_type == 1) {
            $user_type = "Trabajador";
        } 
        else {
            $user_type = "Usuario";
        }
        // Condicional para cambiar el valor numerico a valor de texto de la variable sexo
        if ($sexo == 1) {
            $sexo = "Masculino";
        } 
        elseif ($sexo == 2) {
            $sexo = "Femenino";
        }
            $sql_users = "SELECT * FROM tbl_user WHERE nameuser=?";
            $result_query = $pdo->prepare($sql_users);
      
            $result_query -> execute(array($usuario));
      
            $result_query = $result_query->fetchAll(PDO:: FETCH_ASSOC);
            
            $cantidad_usuarios = count($result_query);
      
            if ($cantidad_usuarios == 0) {
                $sql_ins_usuar = "INSERT INTO tbl_user (nameuser,contrasena,telefono_fijo,telefono_celular,nombre,apellido,correo,sexo)
            values (?,?,?,?,?,?,?,?)";
                $consulta_sql_ins_usuar = $pdo->prepare($sql_ins_usuar);
                $consulta_sql_ins_usuar -> execute(array($usuario,$contrasena,$telfijo,$telcelular,$name,$apellido,$correo,$sexo));
				echo "<script>alert('Usuario Registrado Correctamente');</script>";

				
				$sql_typeid = "SELECT idtbl_user FROM tbl_user WHERE nameuser = '$usuario' ";
            
            $resultado_query_typeid = $pdo->prepare($sql_typeid);
        
            $resultado_query_typeid -> execute(array($usuario));
        
            $resultado_query_typeid = $resultado_query_typeid->fetchAll(PDO:: FETCH_ASSOC);
            //var_dump(resultado_query_typeid);
            $cantidad_usuarios = count($resultado_query_typeid);
                if ($cantidad_usuarios == 1) {
                    $id_user = $resultado_query_typeid[0]['idtbl_user'];
                }  
        //Crear consulta SQL para enviar el tipo de usuario a la tabla tbl_user_type
           		$sql_ins_usertype = "INSERT INTO tbl_user_type (tipo,tbl_user_idtbl_user)
                values (?,?)";
        		$consulta_sql_ins_usertype = $pdo->prepare($sql_ins_usertype);
        		$consulta_sql_ins_usertype -> execute(array($user_type,$id_user));
				//echo"<script>alert('CALIDOSO papá');</script>";
				
				header("Status: 301 Moved Permanently");
                header("Location: ../login/login.php");
				exit;

            } else {
                echo "<script>alert('Error, Usuario ya registrado!');</script>";
            }
            
            
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Registrarse Domper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"> -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="signup.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/logo/domperfav.png" />
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
					<!--<li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.html#portfolio">Portafolio</a></li>-->
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#contact">Contáctanos</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="../login/login.php">Iniciar Sesion</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="signup.php">Registrarse</a></li>
				</ul>
			</div>
		</div>
	</nav><br>
<form method="POST" action="signup.php" name="signin-form">
<div class="container h-100">
    		<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<h1 class="h2">Registrate</h1>
							<p class="lead">
								Empieza a usar Domper como un crack.
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form>
										<div class="form-group">
											<label>Nombres</label>
											<input class="form-control form-control-lg" type="text" name="nombre" placeholder="Pon Tu Nombre">
										</div>
										<div class="form-group">
											<label>Apellidos</label>
											<input class="form-control form-control-lg" type="text" name="apellido" placeholder="Pon tus Apellidos">
										</div>
										<div class="form-group">
											<label>Nombre de Usuario (No uses caracteres especiales)</label>
											<input class="form-control form-control-lg" pattern="[a-zA-Z0-9]+" type="text" name="user_name" placeholder="Crea un Nombre de Usuario">
										</div>
										<div class="form-group">
											<label>Email</label>
											<input class="form-control form-control-lg" type="email" name="correo" placeholder="Escribe tu e-mail">
										</div>
										<div class="form-group">
											<label>Contraseña</label>
											<input class="form-control form-control-lg" type="password" name="contrasena" placeholder="Crea una contraseña">
										</div>
										<div class="form-group">
											<label>Sexo</label>
											<div class="text-center mt-4">
												<select name="sexo">
													<option value="1">Masculino</option>
													<option value="2">Femenino</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label>Telefono Celular</label>
											<input class="form-control form-control-lg" type="text" name="telefono_celular" placeholder="Digita tu numero de celular">
										</div>
										<div class="form-group">
											<label>Telefono Fijo</label>
											<input class="form-control form-control-lg" type="text" name="telefono_fijo" placeholder="Digita tu numero de telefono">
										</div>
										<div class="form-group">
										<label>Tipo de Usuario</label>
											<div class="text-center mt-4">
												<select name="usertype">	
													<option value="2">Usuario</option>
													<option value="1">Trabajador</option>
												</select>
											</div>
										</div>
										<div class="text-center mt-3">
											<button type="submit" name="register" value="register" class="btn btn-success">Registrarse</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
</form>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
</body>
</html>