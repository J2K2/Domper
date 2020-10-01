<?php 
    //Incluir la conexion a la base de datos
    include_once ('../dao/conexion.php');
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
        $user_type = $_REQUEST['usertype'];
        // Validación para que exista un UNICO usuario
        $sql_val_user = "SELECT * FROM tbl_user WHERE user_name = '$usuario'";
        $consulta_sql_val_user = $pdo->prepare($sql_val_user);
        $consulta_sql_val_user->execute(array($usuario));
        var_dump($consulta_sql_val_user);
        
        if ($usuario) {
            # code...
        }
    }
?>