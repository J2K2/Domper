<?php
    //Incluir la conexion a la base de datos
    include_once ('../../dao/conexion.php');
    //Capturar las variables del formulario HTML
    if ($_POST) {
        //datos de usuario
        $usuario = $_POST['user_name'];
        $contrasena = $_POST['contrasena'];
        $confirmar = $_POST['contrasena2'];
        //datos del cliente
        $name = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        // Para las opciones con <option> se usa el $_Request al capturar la variable.
        $sexo = $_REQUEST['sexo'];
        // Condicional para cambiar el valor numerico a valor de texto de la variable sexo
        if ($sexo == 1) {
            $sexo = "Masculino";
        } 
        elseif ($sexo == 2) {
            $sexo = "Femenino";
        }
        if ($contrasena==$confirmar) {
            $sql_users = "SELECT * FROM tbl_user WHERE nameuser=?";
            $result_query = $pdo->prepare($sql_users);
            $result_query -> execute(array($usuario));
            $result_query = $result_query->fetchAll(PDO:: FETCH_ASSOC);
            $cantidad_usuarios = count($result_query);
            if ($cantidad_usuarios == 0) {
                //registro de usuario
                $sql_ins_us = "INSERT INTO tbl_user (nameuser,contrasena)
                values (?,?)";
                $consulta_sql_ins_us = $pdo->prepare($sql_ins_us);
                $consulta_sql_ins_us -> execute(array($usuario,$contrasena));
                echo "<script>alert('Usuario Registrado');</script>";

                $sql_foranea = "SELECT idtbl_user FROM tbl_user WHERE nameuser = '$usuario' ";
                $resultado_query_foranea = $pdo->prepare($sql_foranea);
                $resultado_query_foranea -> execute(array($usuario));
                $resultado_query_foranea = $resultado_query_foranea->fetchAll(PDO:: FETCH_ASSOC);
                $cantidad_usuarios = count($resultado_query_foranea);
                    if ($cantidad_usuarios == 1) {
                        $id_user = $resultado_query_foranea[0]['idtbl_user'];
                    }  
                //registro al cliente
                $sql_ins_cli = "INSERT INTO tbl_clientes (nombre,apellido,telefono,correo,sexo,tbl_user_idtbl_user)
                values (?,?,?,?,?,?)";
                $consulta_sql_ins_cli = $pdo->prepare($sql_ins_cli);
                $consulta_sql_ins_cli -> execute(array($name,$apellido,$telefono,$correo,$sexo,$id_user));
                
                header("Status: 301 Moved Permanently");
                header("Location: ../login/login.php");
                exit;

            } else {
                echo "El usuario ya se encuentra registrado! <br>";
            }
        } else {
            echo "Las contraseñas no coinciden! <br>";
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
    <link href="../../css/regisandlog2.css" rel="stylesheet" />
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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="reg_cliente.php">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
<form method="POST" action="" name="signin-form">
<label id="insesionlab">Registrarse</label><br><br>
    <div class="form-element">
        <label>Nombres</label>
        <input type="text" name="nombre" required />
    </div>
    <div class="form-element">
        <label>Apellidos</label>
        <input type="text" name="apellido" required />
    </div>
    <div class="form-element">
        <label>Nombre de Usuario (No uses caracteres especiales)</label>
        <input type="text" name="user_name" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="contrasena" required />
    </div>
    <div class="form-element">
        <label>Confirmar contraseña</label>
        <input type="password" name="contrasena2" required />
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
            </select>
    </div>
    <div class="form-element">
        <label>Telefono</label>
        <input type="number" name="telefono" required />
    </div>
    <div class="form-element">
    <button type="submit" name="register" value="register">Registrarse</button><br><br>
</form>
</body>
</html>