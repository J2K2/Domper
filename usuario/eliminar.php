<?php
include_once "conexion.php";
//captura de id
$id=$_GET["id"];
//consulta para eliminar
$sql_eliminar="DELETE FROM tbl_user WHERE idtbl_user=?";
//preparando consulta
$consulta_eliminar=$pdo->prepare($sql_eliminar);
//ejecutar consulta
$consulta_eliminar->execute(array($id));
//redireccion
header("location:index.php");
?>