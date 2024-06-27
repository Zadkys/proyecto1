<?php
session_start();

include "conexionUser.php"; // Incluye el archivo de conexión

// Verificar si se ha enviado un término de búsqueda
$key = isset($_POST["key"]) ? $_POST["key"] : '';

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YCS - Búsqueda</title>
  <link rel="stylesheet" href="catalogue.css">
</head>
<body>

<!-- Barra de navegación -->
<header class="navbar">
  <div class="brand">Ykdaz Clothes Store</div>
  <nav>
    <ul>
      <li><a href="index.php">Inicio</a></li>
      <li><a class="selec" href="catalogue.php">Catálogo</a></li>
      <li><a href="contact.php">Contacto</a></li>
      <li>
        <?php if (!isset($_SESSION['correo'])): ?>
          <a class="login-register" href="logreg.php">Iniciar sesión / Registrarse</a>
        <?php else: ?>
          <a class="login-register" href="cerrar.php">Cerrar Sesión</a>
          <?php if ($_SESSION['Admin']): ?>
            <a class="login-register" href="catalogue_admin.php">[Catálogo Admin]</a>
          <?php endif; ?>
        <?php endif; ?>
      </li>
    </ul>
  </nav>

  <!-- CARRITO -->
  <div class="container-icon" onclick="window.location.href = 'carrito.php';" style="cursor:pointer;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-cart">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
    </svg>

    <div class="count-products">
      <span id="contador-productos">0</span>
    </div>

    <div class="container-cart-products hidden-cart">
      <div class="cart-product">
        <div class="info-cart-product">
          <span id="cantidad-producto-carrito">1</span>
          <p class="titulo-producto-carrito">zapatos</p>
        </div>
        <span class="precio-producto-carrito">$80</span>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-close">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
        </svg>
      </div>
    </div>

    <div class="cart-total">
      <h3>Total:</h3>
      <span id="total-pagar">$0</span>
    </div>
  </div>
</header>

<!-- productos: -->
<section class="featured-categories">
  <h2>Catálogo:</h2><br>
  
  <div style="display: flex; margin-bottom: 100px;">
    <form action="catalogueSearch.php" method="POST">
      <input type="text" name="key">
      <input type="submit" value="Buscar">
    </form>
  </div>

  <div class="category-grid">
    <?php
    if ($key) {
        // Preparar y ejecutar la consulta segura
        $stmt = $con->prepare("SELECT * FROM product WHERE nombre LIKE ?");
        $key_param = '%' . $key . '%';
        $stmt->bind_param("s", $key_param);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica si se encontraron productos
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="category">
                  <img src="<?php echo $row['link'] ?>" alt="<?php echo $row['nombre'] ?>">
                  <h3><?php echo $row['nombre'] ?></h3>
                  <h4>$ <?php echo $row['precio'] ?></h4>
                  <h5><?php echo $row['specs'] ?></h5>

                  <form action="agregarCarrito.php" method="POST">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre'] ?>">
                    <input type="hidden" name="precio" value="<?php echo $row['precio'] ?>">
                    <input type="hidden" name="specs" value="<?php echo $row['specs'] ?>">
                    <input type="hidden" name="link" value="<?php echo $row['link'] ?>">
                    <input type="submit" value="Agregar al carrito">
                  </form>
                </div>
                <?php
            }
        } else {
            echo "No se encontraron productos.";
        }

        // Cerrar la declaración y la conexión
        $stmt->close();
        $con->close();
    } else {
        echo "Por favor, ingrese un término de búsqueda.";
    }
    ?>
  </div>
</section>

<!-- Promociones Especiales -->
<section class="special-promotions">
  <h2>Promociones Especiales</h2>
  <div class="promotions-grid">
    <div class="promotion">
      <img src="https://via.placeholder.com/300x200" alt="">
      <h3>¡Descuento del 20% en Ropa para Mujeres!</h3>
      <p>¡Aprovecha esta oferta especial por tiempo limitado! Solo por hoy obtén un 20% de descuento en toda nuestra colección de ropa para mujeres.</p>
      <a href="#" class="btn">Ver Oferta</a>
    </div>
    <div class="promotion">
      <img src="https://via.placeholder.com/300x200" alt="">
      <h3>Zapatos de Diseñador a Mitad de Precio</h3>
      <p>¡No te pierdas esta oportunidad única! Todos nuestros zapatos de diseñador ahora tienen un 50% de descuento. ¡Corre antes de que se agoten!</p>
      <a href="#" class="btn">Ver Oferta</a>
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

</body>
</html>
