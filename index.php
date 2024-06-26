<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Y C S - home</title>
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <!-- Barra de navegación -->
    <header class="navbar">
      <div class="brand">Ykdaz Clothes Store</div>
      <nav>
        <ul>
          <li><a class="selec" href="index.php">Inicio</a></li>
          <li><a href="catalogue.php">Cátalogo</a></li>
          <li><a href="contact.php">Contacto</a></li>
          <li>
          <?php
            if (!isset($_SESSION['correo'])) {
                    ?> <a class="login-register" href="logreg.php"
              >Iniciar sesión / Registrarse</a
            >
            <?php }else{ ?>
              <a class="login-register" href="cerrar.php" >Cerrar Sesion</a>
              <?php 
              if($_SESSION['Admin']){
                ?>
              <a class="login-register" href="catalogue_admin.php" >[Catalogo Admin]</a>

          <?php }} ?>
          </li>
        </ul>
      </nav>
      <!-- CARRITO -->
      <div
        class="containerIcon"
        onclick="window.location.href = 'carrito.php';"
        style="cursor: pointer"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="icon-cart"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
          />
        </svg>

        <div class="count-producs">
          <span id="contador-productos">0</span>
        </div>

        <div class="container-cart-products hidden-cart">
          <div class="cart-product">
            <div class="info-cart-product">
              <span id="cantidad-producto-carrito">1</span>
              <p class="titulo-producto-carrito">zapatos</p>
            </div>
            <span class="precio-producto-carrito">$80</span>

            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="icon-close"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18 18 6M6 6l12 12"
              />
            </svg>
          </div>
        </div>

        <div class="cart-total"></div>
        <h3>Total:</h3>
        <span id="total-pagar">$0</span>
      </div>
    </header>

    <!-- Carrusel de imágenes -->
    <section class="featured-products">
      <div class="slider-container">
        <h2 class="slider-title">¡Bienvenido!</h2>
        <div class="slider">
          <ul>
            <li>
              <img
                src="https://images.elle.com.br/2023/08/acubi-fashion-620x827.jpeg"
                alt=""
              />
            </li>
            <li>
              <img
                src="https://www.crapsforyou.com/wp-content/uploads/2020/12/fb4a3dc9b228cda64c37d0350cb0b42b.jpg"
                alt=""
              />
            </li>
            <li>
              <img
                src="https://www.crapsforyou.com/wp-content/uploads/2020/12/b8bef4d441034c6a2d7bf070434a7482.jpg"
                alt=""
              />
            </li>
            <li>
              <img
                src="https://i.pinimg.com/originals/35/59/1d/35591d90aedc80bf9242e4c8b89dd8f5.jpg"
                alt=""
              />
            </li>
            <!-- Agrega más imágenes aquí -->
          </ul>
        </div>
      </div>
    </section>

    <!-- Contenido principal -->
    <main class="container">
      <!-- Misión y Visión -->
      <section class="mission-vision">
        <div class="mission">
          <h2>Misión</h2>
          <p>
            Nos comprometemos a ofrecer una amplia gama de prendas de vestir de
            alta calidad y estilo, diseñadas específicamente para satisfacer las
            necesidades y preferencias de nuestro público joven. Buscamos
            superar las expectativas de nuestros clientes al proporcionar
            experiencias de compra excepcionales y un servicio personalizado que
            refleje nuestra pasión por la moda y el compromiso con la excelencia
            en cada detalle.
          </p>
        </div>
        <div class="vision">
          <h2>Visión</h2>
          <p>
            Nos esforzamos por convertirnos en la marca de ropa más reconocida y
            respetada en el mercado, estableciendo un estándar de excelencia en
            moda juvenil. Nuestra visión es crear un mundo donde la moda no solo
            sea una expresión de estilo personal, sino también una herramienta
            para empoderar a nuestros clientes, inspirándolos a expresar su
            individualidad y confianza a través de la ropa que usan. Buscamos
            ser un símbolo de calidad, creatividad y autenticidad en la
            industria de la moda, destacando por nuestra innovación, integridad
            y compromiso con la satisfacción del cliente.
          </p>
        </div>
      </section>

      <!-- Categorías Destacadas -->
      <section class="featured-categories">
        <h2>Categorías Destacadas</h2>
        <div class="category-grid">
          <div class="category">
            <img src="https://via.placeholder.com/200" alt="catalogue.php" />
            <h3>Hombres</h3>
          </div>
          <div class="category">
            <img src="https://via.placeholder.com/200" alt="" />
            <h3>Mujeres</h3>
          </div>
          <div class="category">
            <img src="https://via.placeholder.com/200" alt="" />
            <h3>Accesorios</h3>
          </div>
          <div class="category">
            <img src="https://via.placeholder.com/200" alt="" />
            <h3>Calzado</h3>
          </div>
          <!-- Agrega más categorías aquí -->
        </div>
      </section>

      <!-- Últimas Noticias -->
      <section class="latest-news">
        <h2>Últimas Noticias</h2>
        <div class="news-grid">
          <div class="news">
            <img src="https://via.placeholder.com/300x200" alt="" />
            <h3>Título de la Noticia</h3>
            <p>
              Descripción breve de la noticia. Lorem ipsum dolor sit amet,
              consectetur adipiscing elit.
            </p>
          </div>
          <div class="news">
            <img src="https://via.placeholder.com/300x200" alt="" />
            <h3>Otra Noticia</h3>
            <p>
              Descripción breve de la noticia. Lorem ipsum dolor sit amet,
              consectetur adipiscing elit.
            </p>
          </div>
          <div class="news">
            <img src="https://via.placeholder.com/300x200" alt="" />
            <h3>Noticia Importante</h3>
            <p>
              Descripción breve de la noticia. Lorem ipsum dolor sit amet,
              consectetur adipiscing elit.
            </p>
          </div>
          <!-- Agrega más noticias aquí -->
        </div>
      </section>

      <!-- Promociones Especiales -->
      <section class="special-promotions">
        <h2>Promociones Especiales</h2>
        <div class="promotions-grid">
          <div class="promotion">
            <img src="https://via.placeholder.com/300x200" alt="" />
            <h3>¡Descuento del 20% en Ropa para Mujeres!</h3>
            <p>
              ¡Aprovecha esta oferta especial por tiempo limitado! Solo por hoy
              obtén un 20% de descuento en toda nuestra colección de ropa para
              mujeres.
            </p>
            <a href="#" class="btn">Ver Oferta</a>
          </div>
          <div class="promotion">
            <img src="https://via.placeholder.com/300x200" alt="" />
            <h3>Zapatos de Diseñador a Mitad de Precio</h3>
            <p>
              ¡No te pierdas esta oportunidad única! Todos nuestros zapatos de
              diseñador ahora tienen un 50% de descuento. ¡Corre antes de que se
              agoten!
            </p>
            <a href="#" class="btn">Ver Oferta</a>
          </div>
          <!-- Agrega más promociones aquí -->
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
