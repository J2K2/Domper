<?php
include_once "(../../dao/conexion.php)";
//captura de id
$id=$_GET["id"];
//consulta para eliminar
$sql_eliminar="DELETE FROM tbl_service WHERE idtbl_service=?";
//preparando consulta
$consulta_eliminar=$pdo->prepare($sql_eliminar);
//ejecutar consulta
$consulta_eliminar->execute(array($id));
//redireccion
header("location: ../cat_service.php");
?>