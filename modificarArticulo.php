<?php 
include "./conexionUser.php";
session_start();

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$specs = $_POST['specs'];
$link = $_POST['link'];
$id = $_POST['id'];

?> 
/
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Producto - Ykdaz Clothes Store</title>
  <link rel="stylesheet" href="newproduct.css">
</head>
<body>
  <div class="container">
    <a href="catalogue_admin.php"><===</a>
    <h2>Modificar: <?php echo $nombre ?></h2>
    <form action="modificarArt.php" method="POST"><br>

      <div class="form-group">
        <h2>Modificar: <?php echo $nombre ?></h2>
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" name="newNombre" required value="<?php echo $nombre ?>">
        <input type="hidden" name="nombre"  value="<?php echo $nombre ?>">
      </div>

      <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" min="0" step="0.01" required value="<?php echo $precio ?>">
      </div>

      <div class="form-group">
        <label for="especificaciones">Especificaciones:</label>
        <input type="text" name="specs" rows="4" required value="<?php echo $specs ?>"></input>
      </div>

      <div class="form-group">
        <label for="imagen">URL de la Imagen:</label>
        <input type="url" name="link" required value="<?php echo $link ?>">
      </div>

      <button type="submit">Guardar</button>
    </form>
  </div>
</body>
</html>
