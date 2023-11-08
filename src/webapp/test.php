<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Test Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Test Page</h1>

    <!-- Script para obtener los datos desde address_process.php y guardarlos en matrices JavaScript -->
    <script>
        var municipios = [];
        var codigosPostales = [];
        var colonias = [];
        var data = {}; // Objeto para almacenar las matrices
        $(document).ready(function () {
            $.ajax({
                url: 'address_proccess.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    municipios = data.municipios;
                    codigosPostales = data.codigosPostales;
                    colonias = data.colonias;

                    // Hacer algo con los datos en JavaScript
                    console.log("Municipios:", municipios);
                    console.log("Códigos Postales:", codigosPostales);
                    console.log("Colonias:", colonias);
                },
                error: function (xhr, status, error) {
                    console.log('Error al cargar los datos: ' + error);
                }
            });
        });
    </script>

    <!-- Más contenido de la página -->

</body>

</html>