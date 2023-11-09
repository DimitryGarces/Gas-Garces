<?php
session_start(); // Asegúrate de haber iniciado la sesión
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_SESSION['nombre_usuario'])) {
        $active_user = true;
    } else {
        $active_user = false;
    }

    // Configura las cabeceras HTTP para indicar una respuesta JSON
    header('Content-Type: application/json');

    // Devuelve el valor de $active_user en formato JSON
    echo json_encode($active_user);
}
?>