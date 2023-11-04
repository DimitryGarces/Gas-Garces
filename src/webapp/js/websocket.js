// Cliente WebSocket en JavaScript (por ejemplo, en una página web)

const ws = new WebSocket('wss://74.235.198.69:8443'); // Conecta al servidor WebSocket seguro

ws.onopen = () => {
    console.log('Conexión establecida con el servidor WebSocket.');
};

ws.onmessage = (event) => {
    const data = JSON.parse(event.data);

    if (data.nuevosRegistros) {
        console.log(`Se encontraron ${data.nuevosRegistros} nuevos registros.`);
        // Aquí puedes realizar acciones en respuesta a la notificación de nuevos registros

        // Obtén la referencia al elemento que deseas modificar
        const mapContainer = document.getElementById('map-container');

        if (mapContainer) {
            // Cambia el valor de la propiedad CSS 'width'
            mapContainer.style.width = '50%';
        }
    };

    ws.onclose = (event) => {
        if (event.wasClean) {
            console.log('Conexión cerrada de manera limpia.');
        } else {
            console.error(`Conexión cerrada con código: ${event.code}`);
        }
    };

    ws.onerror = (error) => {
        console.error('Error de conexión:', error);
    };
}