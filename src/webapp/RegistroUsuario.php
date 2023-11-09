<?php
session_start();
// Cierra la sesión desasociando sus variables
unset($_SESSION['nombre_usuario']);
unset($_SESSION['id_usuario']);
$active_user = false;
// Desactiva la generación de advertencias y errores
error_reporting(0);
// Cierra la sesión
session_destroy();
// Habilita la generación de todas las advertencias y errores
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Registro</title>
  <link rel="stylesheet" href="css/stylesheet.css" />
</head>

<body>
  <div class="sing-up_form">
    <h1>Registro</h1>
    <!-- Muestra el mensaje de error si existe -->
    <?php
    if (isset($_GET['error'])) {
      echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
    }
    ?>
    <form action="sign_up_proccess.php" method="post">
      <div class="registration_data">
        <input type="text" name="name" id="name"
          oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase();" required />
        <label for="name">Nombre</label>
      </div>




      <div class="registration_data">
        <input type="text" name="last_name" id="last_name"
          oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase();" required />
        <label for="last_name">Apellido paterno</label>
      </div>

      <div class="registration_data">
        <input type="text" name="p_number" id="p_number" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
          pattern="[0-9]{10}" maxlength="10" oninvalid="this.setCustomValidity('Ejemplo teléfono: 7291234567')"
          required />
        <label for="p_number">Número de teléfono</label>
      </div>


      <div class="registration_data">
        <input type="number" name="age" id="age" min="18" max="120"
          oninvalid="this.setCustomValidity('La edad debe estar entre 18 y 120 años')" required />
        <label for="age">Edad</label>
      </div>

      <!--
        Regex:
        ^[A-Z]{4}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM][A-Z]{5}(?:[A-Z0-9]{1}[0-9]{1}|[0-9]{2})$
        
        Desglose de la regex:
        - ^[A-Z]{4}: Cuatro letras mayúsculas al inicio.
        - \d{2}: Dos dígitos para el año.
        - (?:0[1-9]|1[0-2]): Mes, que puede ser 01-09 o 10-12.
        - (?:0[1-9]|[12]\d|3[01]): Día, que puede ser 01-09, 10-29, o 30-31.
        - [HM]: Letra H o M para indicar el sexo.
        - [A-Z]{5}: Cinco letras mayúsculas.
        - (?:[A-Z0-9]{1}[0-9]{1}|[0-9]{2}): Puede ser 1 letra Y 1 dígito o 2.
      -->
      <div class="registration_data">
        <input type="text" name="curp" id="curp"
          pattern="^[A-Z]{4}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM][A-Z]{5}(?:[A-Z0-9]{1}[0-9]{1}|[0-9]{2})$"
          maxlength="18" oninput="this.value = this.value.toUpperCase().substring(0, 18);"
          oninvalid="this.setCustomValidity('La CURP debe seguir el formato: ABCD011231HXXXYZ01 o ABCD990101MXXXXYZ1')"
          required />
        <label for="curp">CURP</label>
      </div>




      <div class="registration_data">
        <input type="text" name="username" id="username" required />
        <label for="username">Nombre de usuario</label>
      </div>

      <div class="registration_data">
        <input type="password" name="pass" id="pass" required />
        <label for="pass">Contraseña</label>
      </div>

      <div class="registration_data">
        <input type="password" name="conf_pass" id="conf_pass" required />
        <label for="conf_pass">Confirmar contraseña</label>
      </div>

      <button type="submit" id="registroButton" onclick="return validarRegistro()">
        Registrarse
      </button>
      <script>
        function validarRegistro() {

          var pass = document.getElementById("pass").value;
          var confPass = document.getElementById("conf_pass").value;
          var telefonoInput = document.getElementById("p_number");
          var edadInput = document.getElementById("age");
          var curpInput = document.getElementById("curp");

          // Validar que las contraseñas coincidan
          if (pass !== confPass) {
            alert("Las contraseñas no coinciden.");
            return false;
          }

          // Restablecer el estado de validación del campo
          telefonoInput.setCustomValidity('');
          edadInput.setCustomValidity('');
          curpInput.setCustomValidity('');

          //Si llegamos aquí el formulario es valido
          return true;
        }
      </script>
    </form>
  </div>
</body>

</html>