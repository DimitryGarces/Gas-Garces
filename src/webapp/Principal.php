<?php
session_start(); // Asegúrate de haber iniciado la sesión

if (isset($_SESSION['nombre_usuario'])) {
  $nombre_usuario = $_SESSION['nombre_usuario'];
  echo "<script>
            setTimeout(function(){
                alert('" . htmlspecialchars($nombre_usuario) . "');
            }, 500);
          </script>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Inicio</title>
  <link rel="stylesheet" href="css/stylesheet.css" />
</head>

<body>
  <header class="hea_inicio">
    <nav class="navbar_inicio">
      <img src="assets/logoP.png" alt="Logo de la empresa" class="ima_bar" />
      <a href="#">INICIO</a>
      <a href="#">NOSOTROS</a>
      <a href="#" id="openModal">HACER PEDIDO</a>
      <a href="InicioSesion.php">INICIAR SESIÓN</a>
    </nav>
  </header>
  <main>
    <div class="orden_principal">
      <img src="assets/LogoP.png" alt="imagen de la empresa" class="ima_emp" />
      <h1>Gas-Garces</h1>
      <p class="principal_parr_1">
        Gas-Garces es una plataforma en línea dedicada a la facilitación de
        venta, renta y compra de propiedades inmobiliarias.
      </p>
      <h2>Misión</h2>
      <p class="principal_parr_2">
        Nuestra misión es conectar a compradores y vendedores de manera
        eficiente y segura, ofreciendo una amplia gama de inmuebles en
        diferentes ubicaciones y precios.
      </p>
      <h3>Visión</h3>
      <p class="principal_parr_3">
        Nuestra visión es ser la plataforma digital líder en el mercado
        inmobiliario, conectando de manera eficiente a compradores, vendedores
        y arrendadores. Nos esforzamos por ofrecer una experiencia sencilla,
        segura y confiable, donde los usuarios puedan encontrar y realizar
        transacciones de venta, renta y compra de propiedades inmobiliarias de
        manera rápida y efectiva.
      </p>
      <h4>Objetivo</h4>
      <p class="principal_parr_4">
        Facilitar y agilizar el proceso de búsqueda, selección y transacción
        de propiedades inmobiliarias para compradores, vendedores y
        arrendadores, ofreciendo una plataforma confiable, intuitiva y segura.
      </p>
    </div>
    <!-- Modal para mostrar la dirección y realizar un pedido -->
    <div id="myModal" class="modal" style="display: none;">
      <h2>Dirección</h2>
      <div id="direccionInfo"></div>
      <label for="cantidad">Cantidad</label>
      <input type="text" id="cantidad" />
      <button id="confirmarPedido">Hacer Pedido</button>
    </div>
  </main>
  <footer>
    <!-- Aquí puedes agregar el contenido del pie de página, como enlaces a redes sociales y contacto. -->
  </footer>

  <!-- Agrega jQuery y el código JavaScript para realizar el pedido -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      var direccion = [];

      // Agrega un manejador de eventos al enlace "PEDIDO"
      $("#openModal").click(function () {
        // Realiza la llamada AJAX para obtener la dirección
        $.ajax({
          url: "pedido.php",
          type: "GET",
          dataType: "json",
          success: function (data) {
            direccion = data; // Selecciona el primer elemento del array
            console.log(direccion);
            // Abre el modal cuando se obtienen los datos
            var direccionCompleta = `Nombre: ${direccion.direccion[0].Nombre}<br>Calle: ${direccion.direccion[0].Calle}<br>Colonia: ${direccion.direccion[0].Colonia}<br>Referencia: ${direccion.direccion[0].Referencia}`;
            $("#direccionInfo").html(direccionCompleta);

            $("#myModal").show();
          },
          error: function (xhr, status, error) {
            console.log("Error al cargar los datos: " + error);
          },
        });
      });

      // Confirmar el pedido
      $("#confirmarPedido").click(function () {
        var cantidad = $("#cantidad").val();
        if (cantidad !== "") {
          // Realizar el pedido aquí (puedes enviar la cantidad al servidor si es necesario)
          alert("Pedido realizado");
          // Cerrar el modal
          $("#myModal").hide();
        } else {
          alert("Por favor, ingresa la cantidad.");
        }
      });
    });
  </script>
</body>

</html>