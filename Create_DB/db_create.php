<?php
/*
$host = 'localhost';
$user = 'root';
$pass = '';
$db = '';

$conexion = mysqli_connect($host, $user, $pass, $db)
            or die("No se puedo realizar la conexión!");
echo "Conexión realizada con éxito!";
echo "<br>";
*/

include 'conexion.php';

$consulta = "CREATE DATABASE feedback2";

if(mysqli_query($conexion, $consulta)) {
    echo "Base de datos 'feedback2' creada de forma satisfactoria!";
}else {
    echo "No pudo crearse la base de datos.";
}

mysqli_close($conexion);

?>