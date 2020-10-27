<?php
    include_once ('../dao/conexion.php');
    $busqueda= $_POST['buscar'];
    //sentencia sql
    $sql_buscar="SELECT * FROM tbl_user WHERE nombre=?";
    $consulta_buscar=$pdo->prepare($sql_buscar);
    $consulta_buscar->execute(array($busqueda));
    $resultado_buscar=$consulta_buscar->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resultado de busqueda</title>
</head>
<body>	
<table style="border: 1px solid black">
		<thead style="border: 1px solid black">
			<tr style="border: 1px solid black">
				<th style="border: 1px solid black">Nombre</th>
				<th style="border: 1px solid black">Apellido</th>
				<th style="border: 1px solid black">Nombre de usuario</th>
				<th style="border: 1px solid black">Contraseña</th>
				<th style="border: 1px solid black">Correo</th>
				<th style="border: 1px solid black">Sexo</th>
				<th style="border: 1px solid black">Telefono celular</th>
				<th style="border: 1px solid black">Telefono fijo</th>
				<th style="border: 1px solid black">Codigo de  usuario</th>
				<th style="border: 1px solid black">Acciones</th>
				<th style="border: 1px solid black">
					<button type="submit" name="buscar" value="buscar	">Registrarse</button>
				</th>
			</tr>
		</thead>
		<!--bucle de llenado-->
		<?php foreach ($resultado_buscar as $busqueda):?>
		<tbody style="border: 1px solid black">
			<tr style="border: 1px solid black">
				<td style="border: 1px solid black"><?php echo $busqueda["nombre"];?></td>
				<td style="border: 1px solid black"><?php echo $busqueda["apellido"];?></td>
				<td style="border: 1px solid black"><?php echo $busqueda["user_name"];?></td>
				<td style="border: 1px solid black"><?php echo $busqueda["contrasena"];?></td>
				<td style="border: 1px solid black"><?php echo $busqueda["correo"];?></td>
				<td style="border: 1px solid black"><?php echo $busqueda["sexo"];?></td>
				<td style="border: 1px solid black"><?php echo $busqueda["telefono_celular"];?></td>
				<td style="border: 1px solid black"><?php echo $busqueda["telefono_fijo"];?></td>
				<td style="border: 1px solid black"><?php echo $busqueda["cod_user"];?></td>
				<td style="border: 1px solid black"><a href="eliminar.php?id=<?php echo $busqueda["idtbl_user"];?>"><button>Eliminar</button></a>
				<a href="index.php?id=<?php echo $busqueda["idtbl_user"];?>"><button>Editar</button></a></td>
			</tr>
		</tbody>
	<?php endforeach ?>
	</table>
</body>
</html>