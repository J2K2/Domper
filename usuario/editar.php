<?php 
    include_once "conexion.php";
    //captura de id
    $id_editar=$_GET["id"];
    $nombre=$_GET["nombre"];
	$apellido=$_GET["apellido"];
	$user_name=$_GET["user_name"];
	$contrasena=$_GET["contrasena"];
    $correo=$_GET["correo"];
	$sexo=$_GET["sexo"];
	$telefono_celular=$_GET["telefono_celular"];
	$telefono_fijo=$_GET["telefono_fijo"];
    $cod_user=$_GET["cod_user"];
    //sentencia editar
    $sql_editar="UPDATE tbl_user
    SET nombre=?,apellido=?,user_name=?,contrasena=?,correo=?,sexo=?,telefono_celular=?,telefono_fijo=?,cod_user=?
    WHERE idtbl_user=?";
    //preparacion
    $consulta_editar=$pdo->prepare($sql_editar);
    //ejecucion
    $consulta_editar->execute(array($nombre,$apellido,$user_name,$contrasena,$correo,$sexo,$telefono_celular,$telefono_fijo,$cod_user,$id_editar));
    //redireccion
    header('location:index.php');
?>