<!DOCTYPE html>
<html>

<head>
  <title>Mapa</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Incluye la biblioteca LeafletJS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="icon" type="imagen/png" href="assets/icon.png" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"
    charset="utf-8"></script>
  <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />

  <style>
    /* Estilo CSS para el botón */
    .ubicacion-button {
      position: absolute;
      /* Posición absoluta */
      top: 10px;
      /* Ajusta la posición desde la parte superior */
      right: 10px;
      /* Ajusta la posición desde la derecha */
      z-index: 1000;
      /* Capa z para estar encima del mapa */
    }

    /* Estilo CSS para el botón */
    .ruta-button {
      position: absolute;
      /* Posición absoluta */
      top: 50px;
      /* Ajusta la posición desde la parte superior */
      right: 10px;
      /* Ajusta la posición desde la derecha */
      z-index: 1000;
      /* Capa z para estar encima del mapa */
    }
  </style>

</head>

<body>
  
  <script src="js/rutas.js">
  </script>

  <script src="app.js">
  </script>

  <!-- Contenedor para el mapa -->
  <div id="map-container">

  </div>
  <div id="contenedor-info" style="display: none;">
    <p>Informacion del cliente:</p>
    <p>Nombre: <span id="nombre-cliente">...</span></p>
    <p>Referencia: <span id="referencia">...</span></p>
    <p>Colonia: <span id="colonia">...</span></p>
    <p>Cantidad de gas: <span id="cantidad-gas">...</span></p>
    <p>Dinero: <span id="dinero">...</span></p>
    <button id="btn-aceptar">Aceptar</button>
    <button id="btn-rechazar">Rechazar</button>
  </div>
  <button class="ubicacion-button" id="obtener-ubicacion">Obtener Ubicación</button>
  <button class="ruta-button" id="ruta-ubicacion">Obtener Ruta</button>
  <script src="js/include-html.js"></script>
</body>


</html>