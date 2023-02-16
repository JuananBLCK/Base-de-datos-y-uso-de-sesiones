<?php

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );


$nombre_origen = "Formulario PHP y MySQL"; //Nombre de remitente.
$email_origen = "no-reply@example.com"; //Email desde donde se envía el correo.
$email_copia = ""; //Direccion de copia del correo.
$email_ocultos = ""; //Direcciones para correo oculto.
$email_destino = ""; //Correo destino.
$nombre_destinatario = ""; //A quien va dirigido.
$asunto = "Correo de Bienvenida para: "; //Asunto del correo.
$mensaje = "Usuario registrado correctamente!"; //Cuerpo del correo, mensaje a transmitir.
$formato = "html"; //Opción para enviarlo como html. Si lo dejas vacío lo manda como texto plano.

//***********************//Cabeceras del correo//***********************************************//

$headers = "To: $nombre_destinatario <$email_destino> \r\n"; //Receptor o receptores del correo.
$headers .= "From: $nombre_origen <$email_origen> \r\n"; //Remitente.
$headers .= "Return-Path: <$email_origen> \r\n"; //Devuelve el mail indicado.
$headers .= "Reply-To: $email_origen \r\n"; //Opción de responder.
$headers .= "Cc: $email_copia \r\n"; //Permite enviar copias públicas del correo a los emails indicados.
$headers .= "Bcc: $email_ocultos \r\n"; //Permite enviar copias públicas del correo a los emails indicados.
$headers .= "MIME-Version: 1.0 \r\n";
//$headers .= "X-mailer: PHP/". phpversion();

//*********************************************************************************************//

//Si el formato no es html, entonces que lo envíe como texto plano.

if($formato == "html") {
    $headers .= "Content-Type: text/html; charset=iso-8859-1 \r\n";
}else {
    $headers .= "Content-Type: text/plain; charset=iso-8859-1 \r\n";
}

//Si todo está bien en el correo, se envía; por el contraio mostramos un mensaje de error.

if(@mail($email_destino, $asunto, $mensaje, $headers)) {
    $message1 = "MAIL: Su correo ha sido enviado correctamente.";
}else {
    $message1 = "MAIL: Error al enviar el correo.";
}

?>