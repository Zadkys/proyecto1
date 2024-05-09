<?php 
include "./conexionUser.php";
session_start();
$newNombre = $_POST['newNombre'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$specs = $_POST['specs'];
$link = $_POST['link'];


$sql = mysqli_query($con, "UPDATE product set nombre = '$newNombre',precio = '$precio',specs = '$specs',link = '$link'  where nombre = '$nombre';");

    if ($sql) {
        // Registro exitoso, redirige al usuario a la página principal
        echo "Actualizacion Exitosa";
        header("location: ./catalogue_admin.php");
    } else {
        // Si ocurre un error durante el registro, muestra un mensaje de error
        die( "Error al actualizar: ".mysqli_connect_error());
    }


?>