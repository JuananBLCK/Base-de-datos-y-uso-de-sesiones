<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = '';
/*
if($conexion = mysqli_connect($host, $user, $pass, $db)) {
    echo "Conexión realizada con éxito!";
    echo "<br>";
}else {
    echo "No se pudo realizar la conexión!";
    echo "<br>";
}
*/

$conexion = mysqli_connect($host, $user, $pass, $db)
            or die("No se pudo realizar la conexión!");
echo "Conexión realizada con éxito!";
echo "<br>";

//Si descomentasemos la siguiente línea cerraríamos la conexión, por lo tanto, cualquier archivo que requiera de este mismo archivo, 
//no funcionaría debido a que la conexión la habríamos cerrado antes de la consulta que queramos realizar.

/*
mysqli_close($conexion);
*/
?>