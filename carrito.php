<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="carrito.css" />
  </head>
  <body>
    <!-- Barra de navegación -->
    <header class="navbar">
      <div class="brand">Ykdaz Clothes Store</div>
      <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="catalogue.php">Catálogo</a></li>
          <li><a href="#">Ofertas</a></li>
          <li><a href="contact.html">Contacto</a></li>
          <li>
            <a href="logreg.php" class="login-register"
              >Iniciar sesión / Registrarse</a
            >
          </li>
          <li><a href="#" class="cart-icon">Carrito</a></li>
        </ul>
      </nav>
    </header>

    <!-- Contenido principal -->
    <main class="container">
      <!-- Carrito de Compras -->
      <section class="shopping-cart">
        <h2>Carrito de Compras</h2>
        <div class="cart-items">
          
        <img src="<?php echo $_SESSION['link']; ?>">
        <h2><?php echo $_SESSION['nombre']; ?></h2>

        <h3><?php echo $_SESSION['precio']; ?></h3>

        <p><?php echo $_SESSION['specs']; ?></p>



        </div>
        <div class="cart-summary">
          <h3>Resumen del Carrito</h3>
          <div class="summary-details">
            <p>Total de Artículos: <span id="total-items">0</span></p>
            <p>Total a Pagar: <span id="total-price">$0.00</span></p>
          </div>
          <button class="checkout-btn">Ir a Pagar</button>
        </div>
      </section>
    </main>

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