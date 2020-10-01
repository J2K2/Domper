<?php
    //insert into en php
	//validacion
	if ($_POST) {
		//captura de variables
		$nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];
		$user_name=$_POST["user_name"];
		$contrasena=$_POST["contrasena"];
		$correo=$_POST["correo"];
		$sexo=$_POST["sexo"];
		$telefono_celular=$_POST["telefono_celular"];
        $telefono_fijo=$_POST["telefono_fijo"];
        $user_type=$_REQUEST["tipo"];
		$cod_user=$_POST["cod_user"];
		//registrar
		$sql_insertar="INSERT INTO tbl_user(user_name,contrasena,telefono_fijo,telefono_celular,nombre,apellido,correo,cod_user,sexo) 
		VALUES(?,?,?,?,?,?,?,?,?)";
		//preparacion
		$consulta_insertar = $pdo->prepare($sql_insertar);
		//ejecucion
		$consulta_insertar->execute(array($user_name,$contrasena,$telefono_fijo,$telefono_celular,$nombre,$apellido,$correo,$cod_user,$sexo));
		//refrescar
		header("location:index.php");
	}
	//rellenar campos con el editar
	if ($_GET) {
		$id=$_GET['id'];
		$sql_id_editar="SELECT * FROM tbl_user WHERE idtbl_user=?";
		//preparacion
		$consulta_id_editar=$pdo->prepare($sql_id_editar);
		//ejecucion
		$consulta_id_editar->execute(array($id));
		//resultados
		$resultado_id_editar=$consulta_id_editar->fetch();
		//mostrar datos
		//var_dump($resultado_id_editar);
	}
?>






if ($consulta_sql_val_user -> rowCount>(0) ) {
            echo "Este usuario YA EXISTE";
        }
        else {
            $sql_ins_usuar = "INSERT INTO tbl_user (nameuser,contrasena,telefono_fijo,telefono_celular,nombre,apellido,correo,sexo)
            values (?,?,?,?,?,?,?,?)";
            $consulta_sql_ins_usuar->prepare($sql_ins_usuar);
            $consulta_sql_ins_usuar -> execute(array($usuario,$contrasena,$telfijo,$telcelular,$name,$apellido,$correo,$sexo));
            echo "<script>Alert('Datos Correctamente almacenados')</script>";
        }