<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Y Contact S</title>
  <link rel="stylesheet" href="contact.css">
</head>
<body>

  <!-- Barra de navegación -->
  <header class="navbar">
    <div class="brand">Ykdaz Clothes Store</div>
    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="catalogue.php">Catálogo</a></li>
        <li><a class="selec" href="contact.php">Contacto</a></li>
        <li>
          <?php if (!isset($_SESSION['correo'])) { ?>
            <a class="login-register" href="logreg.php">Iniciar sesión / Registrarse</a>
          <?php } else { ?>
            <a class="login-register" href="cerrar.php">Cerrar Sesión</a>
            <?php if ($_SESSION['Admin']) { ?>
              <a class="login-register" href="catalogue_admin.php">Catálogo Admin</a>
            <?php } ?>
          <?php } ?>
        </li>
      </ul>
    </nav>
  </header>

  <!-- Contenido principal -->
  <main class="container">
    <!-- Sección de Contacto -->
    <section class="special-promotions">
      <h2 class="title">Contacto:</h2>
      <h3>Teléfono: 33 2514 6368</h3>
      <h3>Correo electrónico: zadkysan@gmail.com</h3>
    </section>

    <!-- Sección de Redes Sociales -->
    <section class="special-promotions">
      <h2 class="title">Redes Sociales:</h2>
      <h3><a class="social-button" href="#">Facebook</a></h3>
      <h3><a class="social-button" href="#">Instagram</a></h3>
    </section>

    <!-- Línea decorativa -->
    <section class="line"></section>

    <!-- Sección de Misión y Visión -->
    <section class="mission-vision">
      <div class="mission">
        <h1>Acerca de:</h1>
        <h2>Misión</h2>
        <p>Nos comprometemos a ofrecer una amplia gama de prendas de vestir de alta calidad y estilo, diseñadas específicamente para satisfacer las necesidades y preferencias de nuestro público joven. Buscamos superar las expectativas de nuestros clientes al proporcionar experiencias de compra excepcionales y un servicio personalizado que refleje nuestra pasión por la moda y el compromiso con la excelencia en cada detalle.</p>
      </div>
      <div class="vision">
        <h2>Visión</h2>
        <p>Nos esforzamos por convertirnos en la marca de ropa más reconocida y respetada en el mercado, estableciendo un estándar de excelencia en moda juvenil. Nuestra visión es crear un mundo donde la moda no solo sea una expresión de estilo personal, sino también una herramienta para empoderar a nuestros clientes, inspirándolos a expresar su individualidad y confianza a través de la ropa que usan. Buscamos ser un símbolo de calidad, creatividad y autenticidad en la industria de la moda, destacando por nuestra innovación, integridad y compromiso con la satisfacción del cliente.</p>
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
