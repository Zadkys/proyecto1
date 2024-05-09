<?php
// Incluye el archivo de conexión a la base de datos
include "conexionUser.php";

    // Obtiene los datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $specs = $_POST['specs'];
    $link = $_POST['link'];


    $sql = mysqli_query($con, "INSERT INTO product VALUES (0, '$nombre', '$precio', '$specs','$link')");

    if ($sql) {
        // Registro exitoso, redirige al usuario a la página principal
        header('Location: ./newproduct.html');
        exit();
    } else {
        // Si ocurre un error durante el registro, muestra un mensaje de error
        die( "Error al agregar: ".mysqli_connect_error());
    }