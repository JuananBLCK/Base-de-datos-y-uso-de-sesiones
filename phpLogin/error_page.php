<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<!-- Cambiamos la cabecera general por un texto que haga comprender al usuario que algo ha ido mal -->

    <header>
    <a href="index.php">¡Vaya!, al parecer...</a>
    </header>

    <?php

//Captamos el error enviado mediante la URL con el método GET y mediante la ayuda de un switch mostraremos el error recibido

    if($_GET['error']){

        switch ($_GET['error']) {
            case 'error1':
                echo '<p>El usuario ya existe!</p>';
                echo '<p><a href="signup.php">Volver</a></p>';
                break;
            
            case 'error2':
                echo '<p>Las contraseñas no coinciden!</p>';
                echo '<p><a href="signup.php">Volver</a></p>';
                break;

            case 'error3':
                echo '<p>Disculpa, ha ocurrido un error al crear la contraseña.</p>';
                echo '<p><a href="signup.php">Volver</a></p>';
                break;

            case 'error4':
                echo '<p>Disculpa, las credenciales son incorrectas.</p>';  // La contraseña es incorrecta.
                echo '<p><a href="login.php">Volver</a></p>';
                break;
            
            case 'error5':
                echo '<p>Disculpa, las credenciales son incorrectas.</p>';  // El usuario no existe.
                echo '<p><a href="login.php">Volver</a></p>';
                break;
            
            default:
                echo '<p>Error no determinado.</p>';
                break;
        }

//En caso de que se quiera visitar la página de error sin que éste exista, la página arrojaría un error
// indicándonos que el array donde deben estar definidos los errores está vacío. En ese caso mostraremos los siguientes mensajes

    }else {
        echo '<p>No existe ningún error.</p>';
        echo '<p>La línea superior indica que el "array" donde deberían definirse los errores está vacío.</p>';
        echo '<p>El único error es que hallas indicado en la URL visitar está página de error.</p>';
        echo '<p><a href="index.php">Volver</a></p>';
    }

    ?>
    
</body>
</html>