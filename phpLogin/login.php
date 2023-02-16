<?php

//Requerimos el archivo: database.php para generar la conexión

require_once 'database.php';

//Requerimos el archivo donde se encuentra definida nuestra clase Sesion

require("clase_sesion.php");
$sesion = new Sesion();

//Si existe usuario en la sesión, redireccionamos a index.php

if(isset($_SESSION['nombre'])) {
    header('Location: index.php');
}else {

//Declaramos la variable $message, vacía, para más tarde utilizarla como mensaje de error

    $message = '';

//Si no existe sesión, generamos la consulta y obtenemos el resultado.

//Con el uso de "prepared statements" estamos protegiendo al sistema ante inyección SQL, haciéndole comprender,
//qué valores serán asignados y cuál es la consulta a preparar; También optimizamos el tiempo de proceso cuando se quiere repetir la misma consulta.

    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $consulta = $conexion->prepare('SELECT usuario, mail, contraseña FROM usuarios WHERE mail=:email');
        $consulta->bindParam(':email', $_POST['email']);
        $consulta->execute();
        $resultados = $consulta->fetch(PDO::FETCH_ASSOC);

//comprobamos si hay resultados y además si alguno coincide con el mail ingresado

        if($resultados && $consulta && $_POST['email'] == $resultados['mail']){

//Si existen resultados y la verificación de la contraseña es correcta, asignamos a la variable: $_SESSION['nombre'], 
//el valor del nombre de usuario: $resultados['usuario']. Tras asignarle valor a: $_SESSION['nombre'], redireccionamos de nuevo a index.php

            if(count($resultados) > 0 && password_verify($_POST['password'], $resultados['contraseña'])) {
                $sesion->set("nombre", $resultados['usuario']);
                $sesion->set("mail", $resultados['mail']);
                header('Location: index.php');

//Si las credenciales no coinciden lanzamos el mensaje de error, referente a la contraseña
            }else {
                header('Location: error_page.php?error=error4');
            }

//Si no hay resultados, siginifica que el usuario no existe, mostramos el mensaje de error

        }else {
            if(!$resultados){
                header('Location: error_page.php?error=error5');
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <?php require_once 'partials/header.php';?>

    <h1>Iniciar Sesión</h1>
    <p>o <a href="signup.php">Regístrate!</a></p>
    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Escribe tu email" required>
        <input type="password" name="password" placeholder="Escribe tu contraseña" required>
        <input type="submit" name="send" value="Enviar">
    </form>
</body>
</html>