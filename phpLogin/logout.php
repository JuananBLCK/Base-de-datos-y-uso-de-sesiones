<?php
//Requerimos el archivo con la clase Sesion y creamos la sesión
require("clase_sesion.php");
$sesion = new Sesion();

//Obtenemos el valor de las variables $_SESSION['nombre'] y $_SESSION['mail']

$sesion->get("nombre");
$sesion->get("mail");

//Borramos las variables mediante la función borrar_variable()

$sesion->borrar_variable("nombre");
$sesion->borrar_variable("mail");

//Borramos la sesion mediante la función borrar_sesion()

$sesion->borrar_sesion();

//Redireccionamos a la página de login

header('Location: login.php');

?>