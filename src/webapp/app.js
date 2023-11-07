$(document).ready(function () {
    var pedidos;
    var registroActual = 0; // Inicializamos el registro en 0

    function obtenerNuevosRegistros() {
        $.ajax({
            url: 'consultas.php?registro=' + registroActual, // Envía el parámetro 'registro'
            method: 'GET',
            dataType: 'text',
            success: function (data) {
                var startIndex = data.indexOf('{');
                if (startIndex !== -1) {
                    var jsonText = data.substr(startIndex);
                    var jsonData = JSON.parse(jsonText);

                    pedidos = jsonData.bool;
                    const nuevosRegistros = jsonData.registro;

                    if (pedidos) {
                        alert('¡Hay un nuevo pedido!');
                        const mapContainer = document.getElementById("map-container");
                        if (mapContainer) {
                            mapContainer.style.width = "50%";
                        }
                        // Supongamos que tienes información correspondiente a cada campo
                        var nombreCliente = "Diego";
                        var referencia = "San Buena";
                        var colonia = "San Buena";
                        var cantidadGas = "100";
                        var dinero = "100";

                        // Actualiza los elementos en el contenedor
                        document.getElementById("nombre-cliente").textContent = nombreCliente;
                        document.getElementById("referencia").textContent = referencia;
                        document.getElementById("colonia").textContent = colonia;
                        document.getElementById("cantidad-gas").textContent = cantidadGas;
                        document.getElementById("dinero").textContent = dinero;

                        // Muestra el contenedor
                        var contenedorInfo = document.getElementById("contenedor-info");
                        contenedorInfo.style.display = "block";

                    }

                    // Actualizamos el registroActual con el nuevo valor
                    registroActual = nuevosRegistros;
                }
            },
            error: function (error) {
                console.error('Error al obtener nuevos registros:', error);
            }
        });
    }

    setInterval(obtenerNuevosRegistros, 15000);
});
