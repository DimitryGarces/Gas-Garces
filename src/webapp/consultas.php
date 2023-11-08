<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Incluye la conexión a la base de datos desde db.php
include('db.php');

// Inicia la sesión
session_start();

$registrosAnteriores = isset($_GET['registro']) ? (int)$_GET['registro'] : 0; // Obtenemos el valor de 'registro' o establecemos 0 por defecto
$bool = false;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Matrices para almacenar los datos de las tablas
    $nuevosRegistros = 0;

    try {
        // Obtener datos de la tabla Pedido
        $sql_pedido = "SELECT COUNT(*) AS count FROM Pedido";
        $result_pedido = mysqli_query($con, $sql_pedido);
        
        if ($result_pedido) {
            $row = mysqli_fetch_assoc($result_pedido);
            $nuevosRegistros = $row['count'];
            if ($registrosAnteriores < $nuevosRegistros) {
                $bool = true;
                $registrosAnteriores = $nuevosRegistros;
            }
        } else {
            // Maneja el caso en que la consulta falla
            echo "Error en la consulta SQL: " . mysqli_error($con);
        }
    } catch (Exception $e) {
        // Manejar la excepción de la base de datos, por ejemplo, registrándola o mostrándola
        die($e->getMessage());
    }

    // Cierra la conexión a la base de datos
    mysqli_close($con);

    // Configurar las cabeceras HTTP para indicar que se está enviando JSON
    header('Content-Type: application/json');

    // Convertir las matrices PHP en formato JSON
    $data = [
        'registro' => $registrosAnteriores,
        'bool' => $bool
    ];

    // Enviar el JSON como respuesta al cliente web
    echo json_encode($data);
}
?>
