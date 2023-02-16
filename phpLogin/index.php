<?php

//Requerimos el archivo: database.php para generar la conexión

require_once 'database.php';

//Requerimos el archivo donde se encuentra definida nuestra clase Sesion

require("clase_sesion.php");
$sesion = new Sesion();

//Si existe usuario en la sesión

if(isset($_SESSION['nombre'])) {
    $records = $conexion->prepare('SELECT usuario, mail, contraseña FROM usuarios WHERE usuario=:usuario');
    $records->bindParam(':usuario', $_SESSION['nombre']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;

    if(count($results) > 0) {
        $user = $results;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP y MySQL</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<!-- Requerimos el archivo donde tenemos definido el header -->

<?php require_once 'partials/header.php';?>

<!-- Si la variable $user tiene valor significa que hay resultados de usuario, por lo tanto mostramos el contenido -->
<!-- la sentencia <?= "contenido" ?> es equivalente a la sentencia <?php echo "contenido" ?> -->

<?php if(!empty($user)): ?>
    <p>Bienvenid@, <strong><em><?= $user['usuario']; ?></em></strong>!</p>
    <p>Email: <strong><em><?= $user['mail']; ?></em></strong>.</p>
    <p>Inicio de sesión correcto.</p>
    <a href="logout.php">Cerrar Sesión</a>

<!-- En caso de que la variable $user no tenga valor, significa que no hay resultados de usuario, por lo tanto mostramos la página principal -->

<?php else: ?>

    <h1>Por favor, inicia sesión o regístrate!</h1>

    <p>
        <a href="login.php">Iniciar Sesión</a> o
        <a href="signup.php">Registrarse</a>
    </p>

<!-- Debemos cerrar la sentencia If{}else{} mediante endif -->

<?php endif; ?>
</body>
</html>