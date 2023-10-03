<?php
session_start();

// Conexión a la base de datos (reemplaza con tus propios datos)
$db_host = "localhost";
$db_user = "aunnoscrea";
$db_pass = "aunnoscrea";
$db_name = "gasgarces";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre_usuario = $_POST['nombre_usuario'];
$contraseña = $_POST['contraseña'];

// Consulta SQL para obtener la información del usuario
$sql = "SELECT id, nombre_usuario, contraseña FROM usuarios WHERE nombre_usuario = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nombre_usuario);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $nombre_usuario, $hashed_contraseña);
    $stmt->fetch();
    
    if (password_verify($contraseña, $hashed_contraseña)) {
        $_SESSION['id_usuario'] = $id;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $stmt->close();
        $conn->close();
        header("Location: inicio.php"); // Redirigir a la página de inicio
        exit();
    }
}

$stmt->close();
$conn->close();
header("Location: login.php?error=1"); // Redirigir con un mensaje de error
exit();
?>