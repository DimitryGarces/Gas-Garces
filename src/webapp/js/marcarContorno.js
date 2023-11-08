/* Código para mostrar rutas en el mapa
document.addEventListener("DOMContentLoaded", function () {
    // Define las URL de los archivos GeoJSON para los municipios
    var tolucaURL = "json/toluca.geoJson";
    var zinacantepecURL = "json/zinacantepec.geoJson";
    var metepecURL = "json/metepec.geoJson";
  
    // Carga los datos GeoJSON y agrégales a las capas
    var tolucaLayer, zinacantepecLayer, metepecLayer;
  
    var southWest = L.latLng(19.145, -99.85); // Esquina suroeste de la zona
    var northEast = L.latLng(19.4, -99.38); // Esquina noreste de la zona
    
    var bounds = L.latLngBounds(southWest, northEast);
    // Crea un mapa centrado en Toluca de Lerdo, México
    var mymap = L.map("map-container").setView([19.2921, -99.6532], 10);
  
    // Carga un mapa base de OpenStreetMap
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      minZoom: 12,
    }).addTo(mymap);
  
  // Agrega un evento al mapa para ajustar la vista si se exceden los límites
  mymap.on("moveend", function () {
    if (!bounds.contains(mymap.getBounds())) {
     mymap.setView([19.2921, -99.6532], 12);
    }
  });
  
    // Agrega un evento de clic al mapa
    mymap.on("click", function (e) {
      // Obtiene las coordenadas (latitud y longitud) del clic
      var latlng = e.latlng;
      var latitude = latlng.lat;
      var longitude = latlng.lng;
  
      // Crea una ventana emergente con las coordenadas
      L.popup()
        .setLatLng(latlng)
        .setContent(
          "<br>Longitud: " +
            longitude.toFixed(6) +
            "Latitud: " +
            latitude.toFixed(6)
        )
        .openOn(mymap);
    });
  
    // Carga Toluca
    fetch(tolucaURL)
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        tolucaLayer = L.geoJson(data, {
          style: { fillColor: "blue", fillOpacity: 0.5 },
        }).addTo(mymap);
        tolucaLayer.bindPopup("Toluca");
      });
  
    // Carga Zinacantepec
    fetch(zinacantepecURL)
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        zinacantepecLayer = L.geoJson(data, {
          style: { fillColor: "green", fillOpacity: 0.5 },
        }).addTo(mymap);
        zinacantepecLayer.bindPopup("Zinacantepec");
      });
  
    // Carga Metepec
    fetch(metepecURL)
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        metepecLayer = L.geoJson(data, {
          style: { fillColor: "red", fillOpacity: 0.5 },
        }).addTo(mymap);
        metepecLayer.bindPopup("Metepec");
      });
  
    // Agrupa todas las capas en una capa de control
    var overlayMaps = {
      Toluca: tolucaLayer,
      Zinacantepec: zinacantepecLayer,
      Metepec: metepecLayer,
    };
    L.control.layers(null, overlayMaps).addTo(mymap);
  
    // Ajusta el mapa para que enfoque todos los municipios
    mymap.fitBounds(
      tolucaLayer
        .getBounds()
        .extend(zinacantepecLayer.getBounds())
        .extend(metepecLayer.getBounds())
    );
  
    // Accede al contenedor donde mostrarás las rutas
    var rutaContainer = document.getElementById("map-container");
  
    // Recorre los datos y crea marcadores en el mapa
    for (var i = 0; i < rutas.length; i++) {
      var latitud = rutas[i].Latitud;
      var longitud = rutas[i].Longitud;
  
      // Crea un marcador en el mapa
      var marker = L.marker([latitud, longitud]).addTo(mymap);
  
      // Opcional: Si quieres agregar información adicional al marcador, puedes hacerlo aquí
      marker.bindPopup("Referencia: " + rutas[i].Referencia);
    }
  });
  */