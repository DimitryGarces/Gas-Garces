document.addEventListener("DOMContentLoaded", function () {
  var obtenerConexionButton = document.getElementById("web-socket");
  obtenerConexionButton.addEventListener("click", function () {
    window.alert("Se esta ejecutando el WebSocket");
    const ws = new WebSocket("ws://74.235.198.69:8080"); // Conecta al servidor WebSocket seguro

    ws.onopen = () => {
      window.alert("Conexión establecida con el servidor WebSocket.");
    };

    ws.onmessage = (event) => {
      const data = JSON.parse(event.data);

      if (data.nuevosRegistros) {
        window.alert(
          `Se encontraron ${data.nuevosRegistros} nuevos registros.`
        );
        // Aquí puedes realizar acciones en respuesta a la notificación de nuevos registros

        // Obtén la referencia al elemento que deseas modificar
        const mapContainer = document.getElementById("map-container");

        if (mapContainer) {
          // Cambia el valor de la propiedad CSS 'width'
          mapContainer.style.width = "50%";
        }
      }
    };

    ws.onclose = (event) => {
      if (event.wasClean) {
        console.log("Conexión cerrada de manera limpia.");
      } else {
        console.error(`Conexión cerrada con código: ${event.code}`);
      }
    };

    ws.onerror = (error) => {
      window.alert("Error de conexión:", error);
    };
  }); // Agrega un paréntesis de cierre aquí
});
