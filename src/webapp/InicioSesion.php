<?php
session_start();

// Desactiva la generación de advertencias y errores
error_reporting(0);

// Desvincular todas las variables de sesión
session_unset();

// Cierra la sesión
session_destroy();

// Habilita la generación de todas las advertencias y errores
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="wigth=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="icon" type="imagen/png" href="assets/icon.png" />
    <meta charset="UTF-S">
    <link rel="stylesheet" href="css/style_principal.css" />
    <link rel="stylesheet" href="css/stylesheet.css" />

    <div class="col-xs-12 col-s-12 col-m-12 col-l-12">
        <div include-html=" partes/InicioSesion_principal.html"></div>
    </div>
</head>

<body>
    <div class="col-s-8 col-m-8 formulario">
        <h1>Inicio de Sesión</h1>
        <!-- Muestra el mensaje de error si existe -->
        <?php
        if (isset($_GET['error'])) {
            echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
        }
        ?>
        <form action="login_process.php" method="post">
            <div class="username">
                <input type="text" name="nombre_usuario" required>
                <label for="nombre_usuario">Nombre de Usuario</label>
            </div>
            <div class="username">
                <input type="password" name="contraseña" required>
                <label for="contraseña">Contraseña</label>
            </div>
            <div class="recordar">¿Olvido su contraseña?</div>
            <input type="submit" value="Iniciar">
            <div class="registrarse">
                Quiero hacer el <a href="RegistroUsuario.php"> registro</a>
            </div>
        </form>
        <?php
        session_start();

        // Muestra el mensaje de éxito si existe de un registro previo
        if (isset($_SESSION['success_message_r'])) {
            echo "<script>
            setTimeout(function(){
                alert('" . htmlspecialchars($_SESSION['success_message_r']) . "');
            }, 500);
          </script>";
            unset($_SESSION['success_message_r']); // Limpia la variable de sesión después de mostrarla
        }
        ?>

    </div>
    <div class="about-us">
        <h2>Acerca de Nosotros</h2>
        <p>Somos una empresa líder en la distribución de gas LP en el Estado de México. Nuestra misión es proporcionar
            un servicio confiable y seguro a nuestros clientes. Contamos con años de experiencia en la industria y un
            equipo de profesionales comprometidos con la seguridad y la satisfacción del cliente.</p>
        <img src="media/element.jpg" alt="Nuestra empresa en acción">
    </div>
    <div class="zones">
        <h2>¿Qué localidades abarcamos?</h2>
        <p>Hasta el momento solo tenemos covertura en 3 municipios del Estado de Mexico.</p>
        <p>Zinacantepec</p>
        <p>Toluca</p>
        <p>Metepec</p>
        <img src="media/MapaZoom.png" alt="Nuestra empresa en acción">
    </div>
    <div class="services">
        <h2>Servicios para</h2>
        <p>Cilindros</p>
        <img src="media/cilindro2.jpeg" alt="Nuestra empresa en acción">
        <p>Estacionarios</p>
        <img src="media/cilindro2.jpeg" alt="Nuestra empresa en acción">
    </div>
</body>

</html>
<?php
// Cierra la sesión
session_destroy();
?>