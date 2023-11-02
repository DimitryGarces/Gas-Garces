<!DOCTYPE html>
<html>

<head>
  <title>Mapa</title>
  <!-- Incluye la biblioteca LeafletJS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8""></script>
  <style>
    /* Estilo CSS para el botón */
    .ubicacion-button {
      position: absolute; /* Posición absoluta */
      top: 10px; /* Ajusta la posición desde la parte superior */
      right: 10px; /* Ajusta la posición desde la derecha */
      z-index: 1000; /* Capa z para estar encima del mapa */
    }
  </style>
</head>

<body>
  <footer>
    <div class=" footer-content">
      <p>¿Tienes alguna sugerencia?</p>
      <p>Envíenos un correo a: <a href="mailto:gasgarces@gmail.com">gasgarces@gmail.com</a></p>
    </div>
  </footer>
  <!-- Script para mostrar las rutas -->
  <script src="js/rutas.js">

  </script>

  </script>
  <!-- Contenedor para el mapa -->
  <div id="map-container">

    </body>

</html>