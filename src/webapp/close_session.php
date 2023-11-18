<?php
session_start();

// Desactiva la generación de advertencias y errores
error_reporting(0);

// Desvincular todas las variables de sesión
session_unset();

// Cierra la sesión
session_destroy();

// Habilita la generación de todas las advertencias y errores
error_reporting(E_ALL);
header("Location: Principal.html");

exit();
?>