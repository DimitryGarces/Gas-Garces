<?php
// Cierra la sesión
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-S">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Iniciar Sesión</title>
    <link rel="icon" type="imagen/png" href="assets/icon.png" />
    <link rel="stylesheet" href="css/stylesheet.css">
    <style>
        body {
            background-image: url('media/Tank.jpeg');
            background-size: auto;
            /* Ajusta la imagen al tamaño del cuerpo */
            background-repeat: repeat;
            /* Evita la repetición de la imagen */
        }
    </style>
    <div class="logo">
        <h2>Gas-Garcés</h2>
    </div>
</head>

<body>
    <div class="formulario">
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
        if (isset($_SESSION['success_message'])) {
            echo "<script>
            setTimeout(function(){
                alert('" . htmlspecialchars($_SESSION['success_message']) . "');
            }, 500);
          </script>";
            unset($_SESSION['success_message']); // Limpia la variable de sesión después de mostrarla
        }
        ?>

    </div>
    <div class="about-us">
        <h2>Acerca de Nosotros</h2>
        <p>Somos una empresa líder en la distribución de gas LP en el Estado de México. Nuestra misión es proporcionar un servicio confiable y seguro a nuestros clientes. Contamos con años de experiencia en la industria y un equipo de profesionales comprometidos con la seguridad y la satisfacción del cliente.</p>
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
<footer>
    <div class="footer-content">
        <p>¿Tienes alguna sugerencia?</p>
        <p>Envíenos un correo a: <a href="mailto:gasgarces@gmail.com">gasgarces@gmail.com</a></p>
    </div>
</footer>

</html>