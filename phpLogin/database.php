<?php

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'feedback2';

/*
    $conexion = mysqli_connect($server, $username, $password, $database)
            or die("No se pudo realizar la conexión!");

    echo "Conexión realizada con éxito!";
    echo "<br>";
*/

//Generando una conexión mediante el objeto PDO protegemos ante inyección SQL de mejor forma que mediante la conexxión anterior por mysqli_connect()

    try {
        $conexion = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    }catch(PDOException $e) {
        die('Connexion failed: '.$e->getMessage());
    }

?>