<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Registro Dirección</title>
  <link rel="stylesheet" href="css/stylesheet.css" />
  <!-- Incluye la biblioteca LeafletJS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8""></script>
  </head>

  <body>
    <div class=" use_add_form">
      <h1>Registro Dirección</h1>
      <form action="algo.php" method="post">
        <div class="user_data">
          <input type="text" name="use_add_address" required />
          <label for="use_add_address">Dirección</label>
        </div>

        <div class="user_data">
          <input type="text" name="use_add_street" required />
          <label for="use_add_street">Calle</label>
        </div>

        <div class="user_data">
          <input type="text" name="use_add_zip_code" required />
          <label for="use_add_zip_code">Código Postal</label>
        </div>

        <div class="user_data">
          <input type="text" name="use_add_ref" required />
          <label for="use_add_ref">Referencias</label>
        </div>

        <button type="submit">Añadir dirección</button>
      </form>
    </div>
    <!-- Script para mostrar las rutas -->
    <script src="js/direccion.js"></script>
  <!-- Contenedor para el mapa -->
  <div id="map-container"></div>
  </body>

</html>