<?php
include_once ("../../dao/conexion.php");
//captura de id
$id=$_GET["id"];
//consulta para eliminar
$sql_eliminar="DELETE FROM tbl_product WHERE idtbl_product=?";
//preparando consulta
$consulta_eliminar=$pdo->prepare($sql_eliminar);
//ejecutar consulta
$consulta_eliminar->execute(array($id));
//redireccion
header("location: ../cat_product.php");
?>