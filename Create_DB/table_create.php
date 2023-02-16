<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'feedback2';

$conexion = mysqli_connect($host, $user, $pass, $db)
            or die("No se puedo realizar la conexión!");
echo "Conexión realizada con éxito!";
echo "<br>";


$consulta = "CREATE TABLE usuarios(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(60) NOT NULL,
    contraseña VARCHAR(200) NOT NULL,
    mail VARCHAR(200) NOT NULL)";


if(mysqli_query($conexion, $consulta)) {
    echo "Tabla 'usuarios' creada de forma satisfactoria!";
}else {
    echo "No pudo crearse la tabla.";
}

mysqli_close($conexion);
?>