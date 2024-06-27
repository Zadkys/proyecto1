<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $specs = $_POST['specs'];
    $link = $_POST['link'];

    $producto = [
        'nombre' => $nombre,
        'precio' => $precio,
        'specs' => $specs,
        'link' => $link,
        'contador' => 1 // Inicialmente agregamos un producto
    ];

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    $found = false;
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['nombre'] == $producto['nombre']) {
            $item['contador'] += 1;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['carrito'][] = $producto;
    }

    header('Location: catalogue.php');
}
?>
