<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'feedback2';

$conexion = mysqli_connect($host, $user, $pass, $db)
            or die("No se puedo realizar la conexión!");
echo "Conexión realizada con éxito!";
echo "<br>";

$nombre = "Juanan";
$nombre1 = "Sarah";
$nombre2 = "Pedrito";

$consulta = "DELETE FROM usuarios WHERE usuario='$nombre'";

if(mysqli_query($conexion, $consulta)) {
    echo "Usuario eliminado de forma satisfactoria!";
}else {
    echo "No se pudo eliminar el usuario.";
}

mysqli_close($conexion);

?>