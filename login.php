<?php

include 'conexionUser.php';

session_start();

$correo = $_POST["correo"];
$contra = $_POST["contra"];

$consulta = mysqli_query($con, "SELECT * from user where correo = '$correo' && contra = '$contra'");

$row = mysqli_fetch_array($consulta);

$_SESSION['id'] = $row['id'];
$_SESSION['nombre'] = $row['nombre'];
$_SESSION['correo'] = $row['correo'];
$_SESSION['contra'] = $row['contra'];
$_SESSION['Admin'] = $row['Admin'];

if(!isset($_SESSION['id'])){
    header ('location: index.html');
}else{
    header ('location: index.php');
}
?>