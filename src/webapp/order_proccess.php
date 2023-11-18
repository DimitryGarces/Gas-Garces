<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Incluye la conexión a la base de datos desde db.php
include('db.php');

// Inicia la sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // ID de usuario almacenado en la sesión
    $id_usuario_dir = $_SESSION['id_usuario'];
    $direccion = array();

    try {
        // Consulta SQL parametrizada
        $sql_dir_use = "SELECT
        d.Nombre,
        d.Calle,
        CONCAT(c.Nombre, ' ', cp.Codigo, ' ', m.Nombre) AS Colonia,
        d.Referencia
        FROM Direccion d
        INNER JOIN Usuario_Direccion ud ON ud.Id_Direccion  = d.Id_Direccion
        INNER JOIN Colonia c ON d.Colonia = c.Id_Colonia
        INNER JOIN CodigoPost cp ON c.ID_Codigo = cp.Id_Codigo
        INNER JOIN Municipio m ON cp.Id_Municipio = m.Id_Municipio
        WHERE ud.Id_Usuario = $id_usuario_dir";


        $result = mysqli_query($con, $sql_dir_use);
        while ($row = mysqli_fetch_assoc($result)) {
            $direccion[] = $row;
        }
    } catch (Exception $e) {
        // Manejar la excepción de la base de datos, por ejemplo, registrándola o mostrándola
        die($e->getMessage());
    }
    // Cierra la conexión a la base de datos
    mysqli_close($con);

    // Convertir las matrices PHP en formato JSON
    $data = [
        'direccion' => $direccion
    ];

    // Configurar las cabeceras HTTP para indicar que se está enviando JSON
    header('Content-Type: application/json');

    // Enviar el JSON como respuesta al cliente web
    echo json_encode($data);
}

?>