<?php
    $server = "localhost"; // Servidor de la base de datos
    $database = "proyecto1"; // Nombre de la base de datos
    $username = "root"; // Nombre de usuario de MySQL
    $contraword = ""; 

    // Conexión a la base de datos MySQL
    $con = mysqli_connect($server, $username, $contraword, $database);

    // Verificar la conexión
    if(!$con) {
        die("Falla en la conexión: " . mysqli_connect_error());
    }
?>
