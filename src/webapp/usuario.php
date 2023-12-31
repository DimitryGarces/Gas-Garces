<?php
session_start(); // Asegúrate de haber iniciado la sesión

// Verifica si el nombre de usuario está almacenado en la sesión
if (isset($_SESSION['nombre_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
    // Ahora puedes mostrar el nombre de usuario en tu página
    echo "Bienvenido, $nombre_usuario!";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mi Cuenta</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Enlace al archivo CSS externo -->
</head>

<body>
    <!-- Menú desplegable -->
    <div id="menu">
        <h2>Mi Cuenta</h2>
        <select id="opciones">
            <option value="perfil">Perfil</option>
            <option value="direcciones">Direcciones</option>
            <option value="pedidos">Pedidos Realizados</option>
        </select>
    </div>

    <!-- Contenido principal -->
    <div id="contenido">
        <h2>Bienvenido</h2>
        <button id="realizar-pedido-btn" onclick="realizarPedido()">Realizar Pedido</button>
    </div>

    <script>
        // Función para redirigir según la opción seleccionada en el menú
        document.getElementById("opciones").addEventListener("change", function () {
            var opcionSeleccionada = this.value;
            if (opcionSeleccionada === "perfil") {
                window.location.href = "perfil.php"; // Reemplaza "perfil.php" por la URL de tu página de perfil
            } else if (opcionSeleccionada === "direcciones") {
                window.location.href = "direcciones.php"; // Reemplaza "direcciones.php" por la URL de tu página de direcciones
            } else if (opcionSeleccionada === "pedidos") {
                window.location.href = "pedidos.php"; // Reemplaza "pedidos.php" por la URL de tu página de pedidos realizados
            }
        });

        // Función para realizar un pedido
        function realizarPedido() {
            window.location.href = "realizar_pedido.php"; // Reemplaza "realizar_pedido.php" por la URL de tu página de pedido
        }
    </script>
    <div include-html="partes/footer.html"></div>
</body>

</html>