document.addEventListener("DOMContentLoaded", function () {
  var southWest = L.latLng(19.145, -99.85); // Esquina suroeste de la zona
  var northEast = L.latLng(19.4, -99.38); // Esquina noreste de la zona
  var puntoInicial;
  var bounds = L.latLngBounds(southWest, northEast);
  var vistaAjustada = false; // Variable para controlar si la vista ya ha sido ajustada

  // Crea un mapa centrado en Toluca de Lerdo, México
  var mymap = L.map("map-container").setView([19.2921, -99.6532], 10);

  // Carga un mapa base de OpenStreetMap
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    minZoom: 12,
  }).addTo(mymap);

  // Agrega un evento al mapa para ajustar la vista si se exceden los límites
  mymap.on("moveend", function () {
    if (!vistaAjustada && !bounds.contains(mymap.getBounds())) {
      mymap.setView([19.2921, -99.6532], 12);
      vistaAjustada = true; // Marcar que la vista ha sido ajustada
    }
  });

  var rutas; // Variable para almacenar los datos de rutas
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "obtenRutas.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // La solicitud se completó y se recibieron los datos
      rutas = JSON.parse(xhr.responseText);
      // Recorre los datos y crea marcadores en el mapa
      for (var i = 0; i < rutas.length; i++) {
        var latitud = rutas[i].Latitud;
        var longitud = rutas[i].Longitud;
        // Crea un marcador en el mapa
        var marker = L.marker([latitud, longitud]).addTo(mymap);
        // Opcional: Si quieres agregar información adicional al marcador, puedes hacerlo aquí
        marker.bindPopup("Referencia: " + rutas[i].Referencia);
      }
    }
  };
  xhr.send();

  // Agrega el control de geolocalización al mapa
  L.control.locate().addTo(mymap);

  // Obtén una referencia al botón por su ID
  var obtenerUbicacionButton = document.getElementById("obtener-ubicacion");
  var obtenerRutaButton = document.getElementById("ruta-ubicacion");
  var ubicacionEstablecida = false;

  // Agrega un evento clic al botón
  obtenerUbicacionButton.addEventListener("click", function () {
    if (ubicacionEstablecida) {
      return; // Evita que se establezca la ubicación nuevamente
    }
    ubicacionEstablecida = true;
    // Intenta obtener la ubicación del dispositivo
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        puntoInicial = L.latLng(lat, lng)
        window.alert("Altitud: " + lng + " Latitud: " + lat);

        // Crea un marcador en la ubicación actual
        var marker = L.marker([lat, lng]).addTo(mymap);

        // Opcional: Abre una ventana emergente con las coordenadas
        marker
          .bindPopup(
            "Ubicación actual:<br>Latitud: " +
            lat.toFixed(6) +
            "<br>Longitud: " +
            lng.toFixed(6)
          )
          .openPopup();
      });
    } else {
      window.alert(
        "Tu navegador no soporta la geolocalización, actualiza tu navegador."
      );
    }
  });
  // Agrega un evento clic al botón
  obtenerRutaButton.addEventListener("click", function () {
    // Define las coordenadas de los puntos inicial y final de la ruta

    var puntoFinal = L.latLng(19.2921, -99.6532);
    // Crea una capa de ruta
    const rutaControl = L.Routing.control({
      waypoints: [
        puntoInicial,
        puntoFinal
      ],
      routeWhileDragging: true
    }).addTo(mymap);


    // Escucha el evento 'routesfound' para acceder a la ruta trazada
    rutaControl.on('routesfound', function (e) {
      var ruta = e.routes[0]; // Obtiene la primera ruta encontrada
      rutaControl.setWaypoints(ruta.coordinates); // Muestra la ruta en el mapa
    });

    // Personaliza el ícono de los puntos de control en la capa de ruta
    rutaControl.getWaypoints().forEach(function (waypoint) {
      waypoint.setIcon(L.icon({
        iconUrl: 'punto.png', // Ruta al archivo de imagen del ícono
        iconSize: [25, 41], // Tamaño del ícono
        iconAnchor: [12, 41], // Punto de anclaje del ícono
        popupAnchor: [1, -34], // Punto de anclaje de la ventana emergente del ícono
      }));
    });
    window.alert('Espera mientras trazamos tu ruta!');
    const mapContainer = document.getElementById("map-container");
    if (mapContainer) {
      mapContainer.style.width = "100%";
    }
    document.getElementById("contenedor-info").style.display = "none";
  });
  // Agrega eventos a los botones Aceptar y Rechazar
  document.getElementById("btn-aceptar").addEventListener("click", function () {
    alert('Pedido Aceptado!'); // Ejemplo: Mostrar una alerta
    mymap.setView([19.2921, -99.6532], 12); // Restaurar la vista original
    const mapContainer = document.getElementById("map-container");
    if (mapContainer) {
      mapContainer.style.width = "100%";
    }
    document.getElementById("contenedor-info").style.display = "none";
  });

  document.getElementById("btn-rechazar").addEventListener("click", function () {
    alert('Pedido Rechazado'); // Ejemplo: Mostrar una alerta
    mymap.setView([19.2921, -99.6532], 12); // Restaurar la vista original
    const mapContainer = document.getElementById("map-container");
    if (mapContainer) {
      mapContainer.style.width = "100%";
    }
    document.getElementById("contenedor-info").style.display = "none";
  });
});
