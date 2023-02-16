<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'feedback2';

$conexion = mysqli_connect($host, $user, $pass, $db)
            or die("No se puedo realizar la conexión!");
echo "Conexión realizada con éxito!";
echo "<br>";

$consulta = "SELECT * FROM usuarios";
$datos = mysqli_query($conexion, $consulta);


echo '<table border="1">';

    /*
    while($reg = mysqli_fetch_row($datos)) {
        echo '<tr>';
        echo '<td>',$reg[0],'</td>';
        echo '<td>',$reg[1],'</td>';
        echo '<td>',$reg[2],'</td>';
        echo '<td>',$reg[3],'</td>';
        echo '</tr>';
    }
    */

    while($reg = mysqli_fetch_row($datos)) {
        echo '<tr>';
        foreach($reg as $usuario){
            echo '<td>',$usuario,'</td>';
        }
        echo '</tr>';
    }

echo '</table>';


mysqli_close($conexion);
?>