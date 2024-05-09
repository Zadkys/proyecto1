<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN Ykdaz Clothes Store</title>
  <link rel="stylesheet" href="catalogue_admin.css">
</head>

<body>

  <!-- Barra de navegación -->
  <header class="navbar">
    <div class="brand">Ykdaz Clothes Store</div>
    <nav>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Ofertas</a></li>
        <li><a href="#">Contacto</a></li>
        <li><a href="logreg.php" class="login-register">Iniciar sesión / Registrarse</a></li>
      </ul>
    </nav>
  </header>

    <!-- productos -->
    <section class="featured-categories">
      <h2>Catalogo:</h2>
      <div class="category-grid">


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
                            <input type="hidden" value="<?php echo $row['nombre']; ?>" name="nombre">                            
                            <input type="hidden" value="<?php echo $row['link']; ?>" name="link">
                            <input type="hidden" value="<?php echo $row['precio']; ?>" name="precio">
                            <input type="hidden" value="<?php echo $row['specs']; ?>" name="specs">
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                            <button type="submit"><img src="https://amagerroentgen.dk/wp-content/uploads/2021/03/pencil.png" alt="X"></button>
                        </form>
          
          <img src="<?php echo $row['link'] ?>" alt="<?php echo $row['nombre'] ?>">
          <h3>Nombre producto: <?php echo $row['nombre'] ?></h3>
          <h4>$<?php echo $row['precio'] ?></h4>
          <h5>Especificaciones:  <?php echo $row['specs'] ?></h5>
          <form action="eliminarArticulo.php" method="POST">
                            <input type="hidden" value="<?php echo $row['nombre']; ?>" name="nombre">                            
                            <button type="submit"><img src="https://cdn.pixabay.com/photo/2013/07/12/12/40/abort-146096_960_720.png" alt="X"></button>
                        </form>
                        
                </div>
                <?php
            }
        } else {
            echo "No se encontraron productos.";
        }

        // Cerrar la conexión
        mysqli_close($con);
        ?>

        <!-- Agrega más productos aquí con la misma sintaxis-->
        <a class="category" type="button"  href="./newproduct.html">
          <img src="https://static.vecteezy.com/ti/gratis-vektor/p3/377812-plus-symbol-kostenlos-vektor.jpg" alt="">
          <h3>Agregar producto</h3>
        </a>
      </div>
      
        <!-- Agrega más productos aquí con la misma sintaxis-->
      </div>
    </section>
    
    <!-- Promociones Especiales -->
    
  </main>
  
  <!-- Pie de página -->
  <footer class="footer" style=" margin-top: 100px;">
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