<?php

try {
    $con = mysqli_init();
    mysqli_ssl_set($con, NULL, NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
    mysqli_real_connect($con, "gasgarces1.mysql.database.azure.com", "garces", "Bleach123", "gasgarces", 3306, MYSQLI_CLIENT_SSL);

    if ($con->connect_error) {
        throw new Exception("Error de conexión a la base de datos: " . $con->connect_error);
    }
} catch (Exception $e) {
    // Manejar la excepción, por ejemplo, registrándola o mostrándola
    die($e->getMessage());
}

?>