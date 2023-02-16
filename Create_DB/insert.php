<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'feedback2';

$conexion = mysqli_connect($host, $user, $pass, $db)
            or die("No se puedo realizar la conexión!");
echo "Conexión realizada con éxito!";
echo "<br>";

$juanan = password_hash('juanan', PASSWORD_BCRYPT);
$sara = password_hash('sara', PASSWORD_BCRYPT);
$pedrito = password_hash('pedrito', PASSWORD_BCRYPT);

$consulta = "INSERT INTO usuarios (usuario, contraseña, mail) VALUES ('Juanan', '$juanan', 'juanan@mail.com'),
                                                                    ('Sarah', '$sara', 'sarah@mail.com'), 
                                                                    ('Pedrito', '$pedrito', 'pedrito@mail.com')";


if(mysqli_query($conexion, $consulta)) {
    echo "Datos insertados de forma satisfactoria!";
}else {
    echo "No se pudieron introducir los datos.";
}

mysqli_close($conexion);
?>