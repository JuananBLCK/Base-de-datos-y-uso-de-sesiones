<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
</head>
<body>
    
<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'feedback2';

$conexion = mysqli_connect($host, $user, $pass, $db)
            or die("No se puedo realizar la conexión!");
echo "Conexión realizada con éxito!";
echo "<br>";

$usuario = 'Pedrito';
$newUsuario = 'Pedro';

$consulta = "UPDATE usuarios SET usuario = '$newUsuario' WHERE usuario= '$usuario'";

if(mysqli_query($conexion, $consulta)) {
    echo "Usuario modificado de forma satisfactoria!";
    echo "Se ha modificado el nombre: '$usuario', por el nombre: '$newUsuario'";
}else {
    echo "No se pudo modificar el usuario.";
}

mysqli_close($conexion);
?>
</body>
</html>
