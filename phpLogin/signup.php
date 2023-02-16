
<?php 

//Requerimos el archivo: database.php para generar la conexión

require_once 'database.php';

//Requerimos el archivo donde se encuentra definida nuestra clase Sesion

require("clase_sesion.php");
$sesion = new Sesion();

//Si existe usuario en la sesión, redireccionamos a index.php

if(isset($_SESSION['nombre'])) {
    header('Location: index.php');
}

//Declaramos la variable $message, vacía, para más tarde utilizarla como mensaje de error

$message = '';

//Si existe algún valor en los campos: email, password y confirm_password, y además coinciden los campos: password y confirm_password,
//comprobamos primero si el usuario existe, si es así, mostramos el mensaje de que el usuario ya existe, si no existe, 
//creamos el usuario generando la consulta SQL, guardando la contraseña de forma encriptada


//Con el uso de "prepared statements" estamos protegiendo al sistema ante inyección SQL, haciéndole comprender,
//qué valores serán asignados y cuál es la consulta a preparar; También optimizamos el tiempo de proceso cuando se quiere repetir la misma consulta.

if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['email']) ) {

    $consulta = $conexion->prepare('SELECT usuario, mail, contraseña FROM usuarios WHERE mail=:email');
    $consulta->bindParam(':email', $_POST['email']);
    $consulta->execute();
    $resultados = $consulta->fetch(PDO::FETCH_ASSOC);

    if($resultados) {
        header('Location: error_page.php?error=error1');
    }else {
        $pass = $_POST['password'];
        $confirm_pass = $_POST['confirm_password'];

//Comprobamos que ambas contraseñas coincidan

        if($pass != $confirm_pass) {
        header('Location: error_page.php?error=error2');
        }else{
            $usuario = $_POST['name'];
            $email = $_POST['email'];

//Encriptado realizado
            $passCrypt = password_hash($_POST['password'], PASSWORD_BCRYPT);
//Para encriptar mediante MD5 descomentar la línea inferior y comentar la superior
//            $passCrypt = md5($_POST['password']);

//Siempre que debamos generar una consulta es conveniente utilizar sentencias preparadas, como en las consultas anteriores, protegemos al sistema de injecciones SQL

            $consulta = $conexion->prepare('INSERT INTO usuarios (usuario, mail, contraseña) VALUES (:usuario, :mail, :passCrypt)');
            $consulta->bindParam(':usuario', $_POST['name']);
            $consulta->bindParam(':mail', $_POST['email']);
            $consulta->bindParam(':passCrypt', $passCrypt);
            $resultados = $consulta->fetch(PDO::FETCH_ASSOC);

            if($consulta->execute()) {
                $message = '<p>¡Enhorabuena!, nuevo usuario registrado correctamente.</p>
                            <p>Ahora puedes <a href="login.php">iniciar sesión</a>.</p>';
                require 'mail.php';
                $message2 = '<p>Si prefieres puedes seguir registrando usuarios:</p>';
            }else {
                header('Location: error_page.php?error=error3');
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
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <?php require_once 'partials/header.php';?>

    <h1>Regístrate!</h1>
    <p>o <a href="login.php">Inicia Sesión</a></p>

<!-- Mostramos los mensajes de usuario creado satisfactoriamente -->

    <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>
    <?php if(!empty($message1)): ?>
    <p><?= $message1 ?></p>
    <?php endif; ?>
    <?php if(!empty($message2)): ?>
    <p><?= $message2 ?></p>
    <?php endif; ?>

    <form action="signup.php" method="POST">
    
        <input type="text" name="name" placeholder="Escribe tu nombre" required>
        <input type="email" name="email" placeholder="Escribe tu email" required>
        <input type="password" name="password" placeholder="Escribe tu contraseña" required>
        <input type="password" name="confirm_password" placeholder="Confirma tu contraseña" required>
        
        <input type="submit" name="send" value="Enviar">
    </form>
</body>
</html>