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
        // Para las opciones con <option> se usa el $_Request al capturar la variable.
        $sexo = $_REQUEST['sexo'];
        $telcelular = $_POST['telefono_celular'];
        $telfijo = $_POST['telefono_fijo'];
        $user_type = "Usuario";
        //$user_type = $_REQUEST['usertype'];
            $sql_ins_usuar = "INSERT INTO tbl_user (nameuser,contrasena,telefono_fijo,telefono_celular,nombre,apellido,correo,sexo)
            values (?,?,?,?,?,?,?,?)";
            $consulta_sql_ins_usuar = $pdo->prepare($sql_ins_usuar);
            $consulta_sql_ins_usuar -> execute(array($usuario,$contrasena,$telfijo,$telcelular,$name,$apellido,$correo,$sexo));
            echo"<script>alert('Datos Almacenados');</script>";
        // Consulta para insertar los datos.
        // Validación para que exista un UNICO usuario
            $sql_val_user = "SELECT * FROM tbl_user WHERE nameuser = '$usuario'";
            $consulta_sql_val_user = $pdo->prepare($sql_val_user);
            $consulta_sql_val_user -> execute();
            $resultado_consul_val = $consulta_sql_val_user->fetchAll();
           // var_dump($resultado_consul_val);
        if ($resultado_consul_val > 0) {
            echo"<script>alert('Oppps...error en el Servidor');</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=evice-width, initial-sacle=1.0">
    <link rel="icon" type="image/png" href="../img/logo/s.png" />
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
                        <!--<li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#portfolio">Portafolio</a></li>-->
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../index.html#contact">Contáctanos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../login/login.php">Iniciar Sesion</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="registrarse.php">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
<form method="POST" action="" name="signin-form">
<label id="insesionlab">Registrarse como trabajador</label><br><br>
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
    
    <!-- <label>Servicio</label>
        <select name="service">
            <option value="1">Electricista</option>
            <option value="2">Mecanico</option>
            <option value="3">Soldador</option>
        </select>
    </div>
    -->

    <button type="submit" name="register" value="register">Registrarse</button><br><br>
</form>
</body>
</html>