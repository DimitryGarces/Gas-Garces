<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Incluye la conexión a la base de datos desde db.php
include('db.php');

try {
    $consulta = "SELECT Direccion.Latitud,Direccion.Longitud, Direccion.Referencia FROM Direccion 
    LEFT JOIN Usuario_Direccion ON Usuario_Direccion.Id_Direccion = Direccion.Id_Direccion 
    INNER JOIN PEDIDO ON Pedido.Id_Usuario = Usuario_Direccion.Id_Usuario
    WHERE MONTH(FechaP) = MONTH(NOW()) 
    AND DAY(FechaP) = DAY(NOW()) 
    AND Id_Estatus= 3 
    AND (
        (
            TIMEDIFF(Pedido.HorarioFin,  DATE_FORMAT(NOW() - INTERVAL 6 HOUR, '%H:%i:%s')) <= '05:00:00' -- HorarioFin máximo 4 horas después de la hora actual
            AND 
            TIMEDIFF(Pedido.HorarioInicio,  DATE_FORMAT(NOW() - INTERVAL 6 HOUR, '%H:%i:%s')) <= '04:00:00' -- HorarioInicio menor o igual a 1 hora después de la hora actual
        )
        OR
        (
            TIMEDIFF(Pedido.HorarioInicio,  DATE_FORMAT(NOW() - INTERVAL 6 HOUR, '%H:%i:%s')) <= '01:00:00' -- HorarioInicio menor que la hora actual
        )
    );";
    $resultado = $con->query($consulta);

    $datos = array();

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
    }
} catch (Exception $e) {
    // Manejar la excepción de la base de datos, por ejemplo, registrándola o mostrándola
    die($e->getMessage());
}
// Después de obtener tus datos de rutas en $datos
$rutas = json_encode($datos);


// Cierra la conexión a la base de datos
mysqli_close($con);
