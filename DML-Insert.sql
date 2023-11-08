SELECT DATE_FORMAT(NOW(), '%H:%i:%s');
Si la zona horaria de la BD no es la de nuestra region habra que cambiarla
O quitamos las horas que haya de diferencia
NOW() - INTERVAL 6 HOUR

$horaActual = date('H'); // Obtiene la hora
$minutosActuales = date('i'); // Obtiene los minutos

$fechaHoy = date('d-m'); // Formato DD-MM
SELECT Direccion.Latitud,Direccion.Longitud, Direccion.Referencia FROM Direccion 
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
);


SELECT Id_Pedido,Id_Usuario,Id_Direccion FROM PEDIDO 
WHERE MONTH(FechaP) = MONTH(NOW()) AND DAY(FechaP) = DAY(NOW());



SELECT Direccion.Latitud, Direccion.Longitud FROM Direccion INNER JOIN Usuario_Direccion 

SELECT
    d.Id_Direccion,
    d.Nombre AS Nombre_Direccion,
    d.Calle,
    CONCAT(c.Nombre, ' ', cp.Codigo, ' ', m.Nombre) AS Colonia_CodigoPost_Municipio,
    d.Referencia,
    d.Latitud,
    d.Longitud
FROM Direccion d
INNER JOIN Colonia c ON d.Colonia = c.Id_Colonia
INNER JOIN CodigoPost cp ON c.ID_Codigo = cp.Id_Codigo
INNER JOIN Municipio m ON cp.Id_Municipio = m.Id_Municipio;