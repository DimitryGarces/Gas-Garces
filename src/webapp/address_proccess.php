<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Incluye la conexión a la base de datos desde db.php
include('db.php');

// Inicia la sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "entre";
    // Obtén los valores del formulario
    $use_add_address = $_POST['use_add_address'];
    $use_add_street = $_POST['use_add_street'];
    $use_add_id_col = $_POST['use_add_id_col'];
    $use_add_ref = $_POST['use_add_ref'];
    $use_add_lat = $_POST['use_add_lat'];
    $use_add_lon = $_POST['use_add_lon'];

    try {
        // Consulta SQL para insertar datos en la tabla DatosPersonales
        $sql_insertar_datos = "INSERT INTO Direccion (Nombre, Calle, Colonia, Referencia, Latitud, Longitud) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepara la consulta para la inserción
        $stmt_insertar_datos = mysqli_prepare($con, $sql_insertar_datos);

        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt_insertar_datos, "ssisss", $use_add_address, $use_add_street, $use_add_id_col, $use_add_ref, $use_add_lat, $use_add_lon);

        // Ejecuta la consulta de inserción
        mysqli_stmt_execute($stmt_insertar_datos);

        // Obtiene el ID generado para la dirección
        $direccion_id = mysqli_insert_id($con);

        // Establece la variable de sesión con el mensaje de éxito
        $_SESSION['success_message'] = "Registro exitoso";

        // Ahora puedes usar $direccion_id para insertar en la tabla Usuario_Direccion

        if (isset($direccion_id) && isset($_SESSION['id_usuario'])) {
            $usuario_id = $_SESSION['id_usuario'];

            // Consulta SQL para insertar datos en la tabla Usuario_Direccion
            $sql_insertar_usuario_direccion = "INSERT INTO Usuario_Direccion (Id_Usuario, Id_Direccion) VALUES (?, ?)";

            // Prepara la consulta para la inserción
            $stmt_insertar_usuario_direccion = mysqli_prepare($con, $sql_insertar_usuario_direccion);

            // Vincula los parámetros
            mysqli_stmt_bind_param($stmt_insertar_usuario_direccion, "ii", $usuario_id, $direccion_id);

            // Ejecuta la consulta de inserción
            mysqli_stmt_execute($stmt_insertar_usuario_direccion);

            // Cierra las consultas preparadas
            mysqli_stmt_close($stmt_insertar_datos);
            // Cierra la consulta preparada
            mysqli_stmt_close($stmt_insertar_usuario_direccion);
        }
        // Redirige a la ventana de registro
        header("Location: validate_cre_use.php");
        exit();
    } catch (Exception $e) {
        // Manejar la excepción de la base de datos, por ejemplo, registrándola o mostrándola
        die($e->getMessage());
    }

    // Cierra la conexión a la base de datos
    mysqli_close($con);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Matrices para almacenar los datos de las tablas
    $municipios = array();
    $codigosPostales = array();
    $colonias = array();

    try {
        // Obtener datos de la tabla Municipio
        $sql_municipio = "SELECT * FROM Municipio";
        $result_municipio = mysqli_query($con, $sql_municipio);
        while ($row = mysqli_fetch_assoc($result_municipio)) {
            $municipios[] = $row;
        }

        // Obtener datos de la tabla CodigoPost
        $sql_codigoPost = "SELECT * FROM CodigoPost";
        $result_codigoPost = mysqli_query($con, $sql_codigoPost);
        while ($row = mysqli_fetch_assoc($result_codigoPost)) {
            $codigosPostales[] = $row;
        }

        // Obtener datos de la tabla Colonia
        $sql_colonia = "SELECT * FROM Colonia";
        $result_colonia = mysqli_query($con, $sql_colonia);
        while ($row = mysqli_fetch_assoc($result_colonia)) {
            $colonias[] = $row;
        }

    } catch (Exception $e) {
        // Manejar la excepción de la base de datos, por ejemplo, registrándola o mostrándola
        die($e->getMessage());
    }
    // Cierra la conexión a la base de datos
    mysqli_close($con);

    // Convertir las matrices PHP en formato JSON
    $data = [
        'municipios' => $municipios,
        'codigosPostales' => $codigosPostales,
        'colonias' => $colonias
    ];

    // Configurar las cabeceras HTTP para indicar que se está enviando JSON
    header('Content-Type: application/json');

    // Enviar el JSON como respuesta al cliente web
    echo json_encode($data);
}


?>