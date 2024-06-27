<?php
include "com.php";

$nombre = $_POST["nombre"];
$Apellidos = $_POST["Apellidos"];
$correo = $_POST["correo"];
$Contraseña = $_POST["Contraseña"];

$sql= mysqli_query ($com, 'INSERT INTO usuario(Nombre, Apellidos, correo, Constraseña) VALUES ($nombre, $correo, $Apellidos , $Contraseña)');

if($sql){
echo "usuario resgistrado";


}else{
    echo"Error al registrar";
}
?>