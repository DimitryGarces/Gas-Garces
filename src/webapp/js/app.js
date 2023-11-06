$(document).ready(function () {
    function obtenerNuevosRegistros() {
        $.ajax({
            url: '/consultas.php', // Reemplaza con la ruta correcta en tu servidor
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                const nuevosRegistros = data.nuevosRegistros;
                $('#nuevosRegistros').text(`Se encontraron ${nuevosRegistros} nuevos registros.`);
            },
            error: function (error) {
                console.error('Error al obtener nuevos registros:', error);
            }
        });
    }

    setInterval(obtenerNuevosRegistros, 15000); // Realizar solicitudes cada 15 segundos
});
