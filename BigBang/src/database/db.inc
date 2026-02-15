<?php
    $host = "localhost";
    $nombreBD = "bigbang";
    $usuario = "root";
    $password = ""; 

    $conn = new mysqli($host, $usuario, $password, $nombreBD);

    if ($conn->connect_error) 
    {
        die ("Conexión fallida - ERROR de conexión: " . $conn->
        connect_error);
    }
?>