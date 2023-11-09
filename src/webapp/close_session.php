<?php
session_start();
// Cierra la sesión desasociando sus variables
unset($_SESSION['nombre_usuario']);
unset($_SESSION['id_usuario']);
$active_user = false;
// Desactiva la generación de advertencias y errores
error_reporting(0);
// Cierra la sesión
session_destroy();
// Habilita la generación de todas las advertencias y errores
error_reporting(E_ALL);
header("Location: Principal.html");

exit();
?>