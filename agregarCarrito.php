<?php
session_start();

$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['precio'] = $_POST['precio'];
$_SESSION['specs'] = $_POST['specs'];
$_SESSION['link'] = $_POST['link'];


header("Location: ./catalogue.php")


?>
