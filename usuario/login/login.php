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
            echo "Logeado";

            $id_user = $resultado_query[0]['idtbl_user'];
            $_SESSION['autorizado']=true;
            $_SESSION['idtbl_user']= $id_user;

        // echo '<meta http-equiv="refresh" content="1,starter.php">';
        }
        else {
            echo "Error";
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
    <title>Iniciar sesión</title>
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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="iniciarsesion.php">Iniciar Sesion</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="res.php">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
<form method="post" action="login.php" name="signin-form">
<label id="insesionlab">Inicio sesión</label><br><br>
    <div class="form-element">
        <label>Usuario</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Acceder</button><br><br>
    <div class="opcioncontra"><a href="">¿Olvidaste tu contraseña?</a></div>
</form>
</body>
</html>