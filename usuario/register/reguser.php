<?php
    //Incluir la conexion a la base de datos
    //include_once ('../../dao/conexion.php');
    //Capturar las variables del formulario HTML
    if ($_POST) {
        $name = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['user_name'];
        $contrasena = $_POST['contrasena'];
        $correo = $_POST['correo'];


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
        else {
            $sexo = "No binario";
        }

        $telcelular = $_POST['telefono_celular'];
        $telfijo = $_POST['telefono_fijo'];
        $user_type = "Usuario";
        
        /* //Crear consulta SQL para enviar el tipo de usuario a la tabla tbl_user_type
        $sql_ins_usertype = "INSERT INTO tbl_user_type (tipo,tbl_user_idtbl_user)
            values (?,?)";
        $consulta_sql_ins_usertype = $pdo->prepare($sql_ins_usertype);
        $consulta_sql_ins_usertype -> execute(array($user_type,$id_user));
            echo"<script>alert('CALIDOSO papá');</script>";
        */




        // Consulta para insertar los datos.
            








        
        /* // Validación para que exista un UNICO usuario
            $sql_val_user = "SELECT * FROM tbl_user WHERE nameuser = ? ";
            $consulta_sql_val_user = $pdo->prepare($sql_val_user);
            $consulta_sql_val_user -> execute(array($usuario));
            $resultado_consul_val = $consulta_sql_val_user->fetchAll(PDO:: FETCH_ASSOC);
           var_dump($resultado_consul_val);
           $cantidad_usuarios = count($resultado_consul_val);
        if ($resultado_consul_val == 0) {
            echo"<script>alert('Tamos melos');</script>";
        }
        else {
            echo"<script>alert('Oppps...error en el Servidor');</script>";
        }
        */
        try {
            $connection_bd = new PDO('mysql:host=localhost; dbname=db_domper_jk', 'root', '');
            $connection_bd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection_bd -> exec('SET CHARACTER SET utf8');
      
            $sql_users = "SELECT * FROM tbl_user WHERE nameuser=?";
            $result_query = $connection_bd->prepare($sql_users);
      
            $result_query -> execute(array($usuario));
      
            $result_query = $result_query->fetchAll(PDO:: FETCH_ASSOC);
      
            $cantidad_usuarios = count($result_query);
      
            if ($cantidad_usuarios == 0) {

                $sql_ins_usuar = "INSERT INTO tbl_user (nameuser,contrasena,telefono_fijo,telefono_celular,nombre,apellido,correo,sexo)
            values (?,?,?,?,?,?,?,?)";
            $consulta_sql_ins_usuar = $connection_bd->prepare($sql_ins_usuar);
            $consulta_sql_ins_usuar -> execute(array($usuario,$contrasena,$telfijo,$telcelular,$name,$apellido,$correo,$sexo));


              echo "Usuario registrado correctamente! <br>";
            
            } else {
              echo "El email ya se encuentra registrado! <br>";
            }
        }
            catch (Exception $e) {
            die('Error: '.$e->GetMessage());
            }
        
    }
        
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=evice-width, initial-sacle=1.0">
    <link rel="icon" type="image/png" href="../../img/logo/s.png" />
    <script src="../../js/fonts/fonts.js" crossorigin="anonymous"></script>
    <link href="../../css/fonts/fonts.css" rel="stylesheet" />
    <link href="../../css/fonts/fonts1.css" rel="stylesheet" type="text/css" />
    <link href="../../css/popup.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
    <link href="../../css/stylesrob.css" rel="stylesheet" />
    <link href="../../css/regist.css" rel="stylesheet" />
    <title>Registro de Usuarios</title>
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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="registrarse.php">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
<form method="POST" action="" name="signin-form">
<label id="insesionlab">Inicio sesión</label><br><br>
    <div class="form-element">
        <label>Nombres</label>
        <input type="text" name="nombre" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Apellidos</label>
        <input type="text" name="apellido" required />
    </div>
    <div class="form-element">
        <label>Nombre de Usuario</label>
        <input type="text" name="user_name" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="contrasena" required />
    </div>
    <div class="form-element">
        <label>Correo</label>
        <input type="e-mail" name="correo" required />
    </div>
    <div class="form-element">
        <label>Sexo</label>
            <select name="sexo">
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">No binario</option>
            </select>
    </div>
    <div class="form-element">
        <label>Telefono Celular</label>
        <input type="number" name="telefono_celular" required />
    </div>
    <div class="form-element">
        <label>Telefono Fijo</label>
        <input type="number" name="telefono_fijo"/>
    </div>
    <div class="form-element">
    <label>Tipo de Usuario</label>
        <select name="usertype">
            <option value="1">Trabajador</option>
            <option value="2">Usuario</option>
        </select>
    </div>
    <button type="submit" name="register" value="register">Registrarse</button><br><br>
</form>
</body>
</html>