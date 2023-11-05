<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Registro Dirección</title>
  <link rel="stylesheet" href="css/stylesheet.css" />
  <!-- Incluye la biblioteca LeafletJS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8""></script>
  <script src=" https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <div class=" use_add_form">
    <h1>Registro Dirección</h1>
    <form action="address_proccess.php" method="post">
      <div class="user_data">
        <input type="text" name="use_add_address" id="use_add_address" required />
        <label for="use_add_address">Nombre de la dirección</label>
      </div>

      <div class="user_data">
        <input type="text" name="use_add_street" id="use_add_street" required />
        <label for="use_add_street">Calle y número del domicilio</label>
      </div>



      <div class="user_data">
        <select name="use_add_municipio" id="use_add_municipio" required>
          <option value="">Selecciona un municipio</option>
        </select>
      </div>

      <div class="user_data">
        <select name="use_add_codigo" id="use_add_codigo" required>
          <option value="">Selecciona un código postal</option>
        </select>
      </div>

      <div class="user_data">
        <select name="use_add_colonia" id="use_add_colonia" required>
          <option value="">Selecciona una colonia</option>
        </select>
      </div>



      <div class="user_data">
        <input type="text" name="use_add_ref" id="use_add_ref" required />
        <label for="use_add_ref">Referencias</label>
      </div>

      <input type="hidden" name="use_add_lat" id="use_add_lat" value="" />
      <input type="hidden" name="use_add_lon" id="use_add_lon" value="" />
      <input type="hidden" name="use_add_id_col" id="use_add_id_col" value="" />


      <button type="button" onclick="validateAndSubmit()">Añadir dirección</button>
      <script>
        // Almacenar las direcciones de la bd
        var use_add_id_colonia = null;
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

              // Llena la lista de municipios
              var municipioSelect = document.getElementById("use_add_municipio");
              municipios.forEach(function (municipio) {
                var option = document.createElement("option");
                option.value = municipio.Id_Municipio;
                option.textContent = municipio.Nombre;
                municipioSelect.appendChild(option);
              });

              // Habilita el evento onchange para la lista de municipios
              municipioSelect.addEventListener("change", function () {
                var selectedMunicipioId = this.value;

                // Llena la lista de códigos postales según el municipio seleccionado
                var codigoSelect = document.getElementById("use_add_codigo");
                codigoSelect.innerHTML = "<option value=''>Selecciona un código postal</option>";
                var filteredCodigos = codigosPostales.filter(function (codigo) {
                  return codigo.Id_Municipio == selectedMunicipioId;
                });
                filteredCodigos.forEach(function (codigo) {
                  var option = document.createElement("option");
                  option.value = codigo.Id_Codigo;
                  option.textContent = codigo.Codigo;
                  codigoSelect.appendChild(option);
                });

                // Habilita el evento onchange para la lista de códigos postales
                codigoSelect.addEventListener("change", function () {
                  var selectedCodigoId = this.value;

                  // Llena la lista de colonias según el código postal seleccionado
                  var coloniaSelect = document.getElementById("use_add_colonia");
                  coloniaSelect.innerHTML = "<option value=''>Selecciona una colonia</option>";
                  var filteredColonias = colonias.filter(function (colonia) {
                    return colonia.ID_Codigo == selectedCodigoId;
                  });
                  filteredColonias.forEach(function (colonia) {
                    var option = document.createElement("option");
                    option.value = colonia.Id_Colonia;
                    option.textContent = colonia.Nombre;
                    coloniaSelect.appendChild(option);
                  });
                  // Habilita el evento onchange para la lista de colonias
                  coloniaSelect.addEventListener("change", function () {
                    use_add_id_colonia = this.value; // Guardar el ID de la colonia seleccionada
                    console.log(use_add_id_colonia)
                  });
                });
              });
            },
            error: function (xhr, status, error) {
              console.log('Error al cargar los datos: ' + error);
            }
          });
        });

        // Validar botones
        function validateAndSubmit() {
          // Validar los campos de entrada antes de enviar la solicitud
          var addressInput = document.getElementById("use_add_address");
          var streetInput = document.getElementById("use_add_street");
          var refInput = document.getElementById("use_add_ref");
          var municipioSelect = document.getElementById("use_add_municipio");
          var codigoSelect = document.getElementById("use_add_codigo");
          var coloniaSelect = document.getElementById("use_add_colonia");

          if (
            addressInput.checkValidity() &&
            streetInput.checkValidity() &&
            refInput.checkValidity() &&
            municipioSelect.value !== "" &&
            codigoSelect.value !== "" &&
            coloniaSelect.value !== ""
          ) {
            $.ajax({
              url: 'map_address.php',
              type: 'GET',
              dataType: 'json',
              success: function (data) {
                if (data.latitude && data.longitude) {
                  var latitude = data.latitude;
                  var longitude = data.longitude;
                  // Establecer los valores de los campos ocultos
                  document.getElementById("use_add_id_col").value = use_add_id_colonia;
                  document.getElementById("use_add_lat").value = latitude;
                  document.getElementById("use_add_lon").value = longitude;

                  // Ver las coordenadas
                  console.log(latitude + "l " + longitude);
                  //Si llegamos aquí el formulario es valido
                  // Enviar el formulario al servidor
                  document.querySelector("form").submit();
                } else {
                  alert("Por favor, seleccione una dirección en el mapa.");
                }
              },
              error: function (xhr, status, error) {
                console.error(error);
              },
            });
          } else {
            alert("Por favor, complete todos los campos");
          }
        }
      </script>
    </form>
  </div>
  <!-- Script para mostrar las rutas -->
  <script src="js/direccion.js"></script>
  <!-- Contenedor para el mapa -->
  <div id="map-container-d"></div>
</body>

</html>