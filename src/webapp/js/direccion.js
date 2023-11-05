// Código para mostrar rutas en el mapa
document.addEventListener("DOMContentLoaded", function () {
  var southWest = L.latLng(19.145, -99.85); // Esquina suroeste de la zona
  var northEast = L.latLng(19.4, -99.38); // Esquina noreste de la zona

  var bounds = L.latLngBounds(southWest, northEast);
  // Crea un mapa centrado en Toluca de Lerdo, México
  var mymap = L.map("map-container-d").setView([19.2921, -99.6532], 10);

  //Validar que sea seleccionada una dirección

  var latitude = -1000;
  var longitude = -1000;

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
    var latlng = e.latlng;
    // Obtiene las coordenadas (latitud y longitud) del clic
    latitude = latlng.lat;
    longitude = latlng.lng;
    L.popup().setLatLng(latlng).setContent("Mi dirección").openOn(mymap);
    $.ajax({
      type: "POST",
      url: "map_address.php",
      data: { latitude: latitude.toFixed(6), longitude: longitude.toFixed(6) },
      success: function (response) {
        console.log("Recibí dirección"); // Esto mostrará solo las coordenadas en la consola
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  });
});
