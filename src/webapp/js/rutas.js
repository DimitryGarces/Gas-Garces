// Código para mostrar rutas en el mapa
document.addEventListener("DOMContentLoaded", function() {
    // Crea un mapa centrado en Toluca de Lerdo, México
    var mymap = L.map("map-container").setView([19.2921, -99.6532], 13);
  
    // Carga un mapa base de OpenStreetMap
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
    }).addTo(mymap);


    // Accede al contenedor donde mostrarás las rutas
    var rutaContainer = document.getElementById("ruta-container");
  
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
  