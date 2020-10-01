<?php
$host="mysql:host=localhost;dbname=db_domper_jk";
$user="root";
$contrasena="";
try {
    $pdo = new PDO($host,$user,$contrasena);
    echo "Conexion Exitosa Baby","<br>";
} catch (PDOException $e) {
    print "Error parce" .$e->getMessage()."<br/>";
    die();
}
?>