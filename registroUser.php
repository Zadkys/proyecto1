<?php
// Incluye el archivo de conexión a la base de datos
include "conexionUser.php";

    // Obtiene los datos del formulario
    $nombre = $_POST['fullname'];
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];
    $Admin = false;

    // Consulta para insertar un nuevo usuario en la base de datos
    $sql = mysqli_query($con, "INSERT INTO user VALUES(0,'$nombre','$correo','$contra','$Admin')");

    if ($sql) {
        // Registro exitoso, redirige al usuario a la página principal
        header( 'Location: ./logreg.php');
        exit();
    } else {
        // Si ocurre un error durante el registro, muestra un mensaje de error
        die( "Error al registrar: ".mysqli_connect_error());
    }
?>
