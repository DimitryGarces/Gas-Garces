<?php
session_start();

// Manejar la solicitud POST para actualizar las coordenadas en la sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
        $_SESSION['latitude'] = $_POST['latitude'];
        $_SESSION['longitude'] = $_POST['longitude'];
        // Limpiar las variables POST
        unset($_POST['latitude']);
        unset($_POST['longitude']);
        // Puedes responder con un mensaje JSON si lo deseas
        echo json_encode(array('message' => 'Coordenadas actualizadas'));
        exit;
    }
}

// Si la solicitud no es POST, entonces es una solicitud GET para obtener las coordenadas
if (isset($_SESSION['latitude']) && isset($_SESSION['longitude'])) {
    $latitude = $_SESSION['latitude'];
    $longitude = $_SESSION['longitude'];
    unset($_SESSION['latitude']);
    unset($_SESSION['longitude']);
    $response = array('latitude' => $latitude, 'longitude' => $longitude);
    echo json_encode($response);
    exit;
}

// Si no hay datos disponibles, puedes responder con un mensaje JSON
echo json_encode(array('message' => 'No hay coordenadas disponibles'));
?>