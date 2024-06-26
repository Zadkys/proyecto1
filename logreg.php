<?php
session_start();
 ?>

<!DOCTYPE html>

<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YCS - Inicia sesion o registrate</title>
    <link rel="stylesheet" href="logreg.css" />
  </head>

  <header>
    <img src="./YCS.png" alt="YCS" />
    <p>Ykdaz Clothes Store</p>
  </header>

  <body>
    <div class="container">
      <!-- Formulario de inicio de sesión -->
      <div class="form-section inSesion">
        <h2>Iniciar Sesión</h2>
        <form name="proyecto1" id="login-form" action="login.php" method="post">
          <input
            type="correo"
            name="correo"
            placeholder="Correo electrónico"
            required
          /><br />
          <input
            type="contra"
            name="contra"
            placeholder="Contraseña"
            required
          /><br />

          <input type="submit" name="logiando" value="Iniciar Sesión" />
        </form>
      </div>

      <!-- Formulario de registro -->
      <div class="form-section registrarse">
        <h2>Registrate</h2>

        <form id="register-form" action="registroUser.php" method="post">
          <input
            type="text"
            name="fullname"
            placeholder="Nombre completo"
            required
          /><br />
          <input
            type="correo"
            name="correo"
            placeholder="Correo electrónico"
            required
          /><br />
          <input
            type="contra"
            name="contra"
            placeholder="Contraseña"
            required
          /><br />

          <input type="submit" name="registroUser" value="Registrarse" />
        </form>
      </div>
      <!-- Botón para alternar entre los formularios -->
      <button class="boton_giro" onclick="giro()">¿No tienes cuenta?</button>
    </div>

    <script>
      function giro() {
        // Selecciona los formularios
        var loginForm = document.querySelector(".inSesion");
        var registerForm = document.querySelector(".registrarse");

        // Alterna las clases para voltear los formularios
        loginForm.classList.toggle("inSesion");
        loginForm.classList.toggle("registrarse");

        registerForm.classList.toggle("inSesion");
        registerForm.classList.toggle("registrarse");

        // tambaleo del botón "¿no tienes cuenta?"
        var toggleButton = document.querySelector(".boton_giro");
        toggleButton.style.transform = "rotate(90deg)";

        // Restablece después de 1 segundo
        setTimeout(function () {
          toggleButton.style.transform = "";
        }, 100);
      }
    </script>
  </body>
</html>
