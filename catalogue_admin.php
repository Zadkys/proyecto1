<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YCS - ADMIN Catalogue</title>
  <link rel="stylesheet" href="catalogue_admin.css">
</head>

<body>
  <div class="container">
    <!-- Barra de navegación -->
    <header class="navbar">
      <div class="brand">Ykdaz Clothes Store</div>
      <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="catalogue.php">Catálogo</a></li>
          <li><a href="contact.php">Contacto</a></li>
          <li>
            <?php if (!isset($_SESSION['correo'])) { ?>
              <a class="login-register" href="logreg.php">Iniciar sesión / Registrarse</a>
            <?php } else { ?>
              <a class="login-register" href="cerrar.php">Cerrar Sesión</a>
              <?php if ($_SESSION['Admin']) { ?>
                <a class="selec" href="catalogue_admin.php">[Catalogo Admin]</a>
              <?php } ?>
            <?php } ?>
          </li>
        </ul>
      </nav>
    </header>

    <!-- Productos -->
    <section class="featured-categories">
      <h2>Catálogo:</h2>
      <div class="category-grid">
        <?php
        include "conexionUser.php"; // Incluye el archivo de conexión

        // Consulta SQL para obtener todos los productos
        $sql = mysqli_query($con, "SELECT * FROM product");

        // Verifica si se encontraron productos
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_array($sql)) {
        ?>
          <div class="category">
            <form action="modificarArticulo.php" method="POST">
              <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
              <input type="hidden" name="link" value="<?php echo $row['link']; ?>">
              <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
              <input type="hidden" name="specs" value="<?php echo $row['specs']; ?>">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit"  class="edit-button"><img src="https://amagerroentgen.dk/wp-content/uploads/2021/03/pencil.png" alt="Editar"></button>
            </form>
            <img src="<?php echo $row['link']; ?>" alt="<?php echo $row['nombre']; ?>">
            <h3><?php echo $row['nombre']; ?></h3>
            <h4>$<?php echo $row['precio']; ?></h4>
            <h5><?php echo $row['specs']; ?></h5>
            <form action="eliminarArticulo.php" method="POST">
              <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
              <button type="submit"><img src="https://cdn.pixabay.com/photo/2013/07/12/12/40/abort-146096_960_720.png" alt="Eliminar"></button>
            </form>
          </div>
        <?php
            }
        } else {
            echo "<p>No se encontraron productos.</p>";
        }

        // Cerrar la conexión
        mysqli_close($con);
        ?>

        <!-- Agregar nuevo producto -->
        <div class="category">
          <a href="./newproduct.html">
            <img src="https://static.vecteezy.com/ti/gratis-vektor/p3/377812-plus-symbol-kostenlos-vektor.jpg" alt="Agregar Producto">
            <h3>Agregar producto</h3>
          </a>
        </div>
      </div>
    </section>

    <!-- Pie de página -->
    <footer class="footer">
      <div class="footer-content">
        <div class="contact-info">
          <h3>Contáctanos</h3>
          <p>Teléfono: 33 2514 6368</p>
          <p>Correo electrónico: zadkysan@gmail.com</p>
        </div>
        <div class="social-media">
          <h3>Síguenos</h3>
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
          </ul>
        </div>
      </div>
      <div class="copyright">
        &copy; 2024 Ykdaz Clothes Store. Todos los derechos reservados.
      </div>
    </footer>
  </div>



</body>
</html>
