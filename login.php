<?php
include "./conexionUser.php";
$correo = $_POST['correo'];
$contra = $_POST['contra'];
session_start();
$_SESSION['correo'] = ['correo'];

$consulta = "SELECT*FROM user WHERE correo='$correo' and contra='$contra'";
$result = mysqli_query($con, $consulta);



$filas = mysqli_fetch_array($result);
if ($filas["correo"]) {
    $_SESSION['id'] = $filas["id"];
    $_SESSION['nombre'] = $filas["nombre"];
    $_SESSION['contrasena'] = $filas["contrasena"];
    $_SESSION['correo'] = $filas["correo"];

    if ($filas["Admin"]) {
        $_SESSION['Admin'] = true;
        header("location: ./index.php");

    } else {
        $_SESSION['Admin'] = false;
        header("location: ./index.php");
    }

} else {
    header("Location: ./logreg.php");
}



exit;

?>