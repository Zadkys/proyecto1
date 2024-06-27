<?php 
include "./conexionUser.php";
session_start();
$nombre = $_POST['nombre'];

$consulta = "DELETE FROM product WHERE nombre='$nombre' ";
$result = mysqli_query($con, $consulta);

header("Location: ./catalogue_admin.php");

?>