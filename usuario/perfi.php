<?php  
    include_once ('../dao/conexion.php');
    $busqueda=$_POST['buscar'];
    //sentencia sql
    $sql_traer="SELECT * FROM tbl_user WHERE idtbl_user=?";
    $consulta_buscar=$pdo->prepare($sql_traer);
    $consulta_buscar->execute(array($busqueda));
    $resultado_buscar=$consulta_buscar->fetchAll();
    
?>
<html>
<head><title>Ejemplo de tabla sencilla</title></head>
<body>

<h1>Listado de cursos</h1>

<table>
<tr>
  <td><strong>Curso</strong></td>
  <td><strong>Horas</strong></td>
  <td><strong>Horario</strong></td>
</tr>

<tr>
  <td>NOMBRE</td>
  <td>20</td>
  <td>16:00 - 20:00</td>
</tr>

<tr>
  <td>Apellido</td>
  <td>20</td>
  <td>16:00 - 20:00</td>
</tr>

<tr>
  <td>Usuario</td>
  <td><?php echo $resultado_buscar['nameuser']?></td>
  <td>x</td>
</tr>
</table>

</body>
</html>