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
        d.Id_Direccion,
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del cuerpo de la solicitud POST
    $fechaFormateada = $_POST['fecha'];
    $horarioInicio = $_POST['horarioInicio'];
    $horarioFin = $_POST['horarioFin'];
    $cantidad = $_POST['cantidad'];
    $id_direccion = $_POST['id_direccion'];

    // Establecer la zona horaria a México
    date_default_timezone_set('America/Mexico_City');

    // Obtener la fecha actual, para saber si no asignar empleado, si el pedido no es hoy
    $compararFecha = date('y/m/d');

    // Hacer un echo de las variables recibidas
    /*echo "Fecha: " . $fechaFormateada . "\n";
    echo "Horario de Inicio: " . $horarioInicio . "\n";
    echo "Horario de Fin: " . $horarioFin . "\n";
    echo "Cantidad: " . $cantidad . "\n";
    echo "ID de Dirección: " . $id_direccion;*/

    try {
        //Volver a guardar el id del usuario
        $con_use_id = $_SESSION['id_usuario'];

        // Consulta SQL para obtener el primer empleado disponible
        $sql_id_emp_disp = "SELECT Id_Empleado
            FROM Empleado
            WHERE Id_Estatus = 1
            ORDER BY 1 ASC
            LIMIT 1";

        // Preparar la consulta para el empleado disponible
        $stmt_id_emp_disp = mysqli_prepare($con, $sql_id_emp_disp);

        // Ejecutar la consulta para el empleado disponible
        mysqli_stmt_execute($stmt_id_emp_disp);

        // Almacenar los resultados
        mysqli_stmt_store_result($stmt_id_emp_disp);

        // Verificar si hay algún empleado disponible
        // Si el pedido es dias depués no se asigna empleado
        if ((mysqli_stmt_num_rows($stmt_id_emp_disp) == 1) && ($compararFecha == $fechaFormateada)) {
            // Vincular el resultado
            mysqli_stmt_bind_result($stmt_id_emp_disp, $id_Empleado_Disp);

            // Obtener el primer resultado
            mysqli_stmt_fetch($stmt_id_emp_disp);

            // Liberar los resultados
            mysqli_stmt_free_result($stmt_id_emp_disp);

            // Actualizar el campo Id_Estatus de 1 a 2
            $sql_update_estatus = "UPDATE Empleado SET Id_Estatus = 2 WHERE Id_Empleado = ?";
            $stmt_update_estatus = mysqli_prepare($con, $sql_update_estatus);
            mysqli_stmt_bind_param($stmt_update_estatus, "i", $id_Empleado_Disp);
            mysqli_stmt_execute($stmt_update_estatus);

            // $id_Empleado_Dispa hora contiene el Id del primer empleado disponible
            //echo "Empleado Disponible: $id_Empleado_Disp";

            $sql_insertar_pedido = "INSERT INTO Pedido (Id_Usuario, Id_Direccion, Id_Empleado,
                Id_Estatus, HorarioInicio, HorarioFin, FechaP, CantidadL)
                VALUES (?, ?, ?, 3, ?, ?, ?, ?)";

            // Prepara la consulta para la inserción
            $stmt_insertar_pedido = mysqli_prepare($con, $sql_insertar_pedido);

            // Vincula los parámetros
            mysqli_stmt_bind_param(
                $stmt_insertar_pedido,
                "iiisssi",
                $con_use_id,
                $id_direccion,
                $id_Empleado_Disp,
                $horarioInicio,
                $horarioFin,
                $fechaFormateada,
                $cantidad
            );

            // Ejecuta la consulta de inserción
            mysqli_stmt_execute($stmt_insertar_pedido);

            // Cerrar las consultas preparadas
            mysqli_stmt_close($stmt_update_estatus);
            mysqli_stmt_close($stmt_id_emp_disp);
            mysqli_stmt_close($stmt_insertar_pedido);

            echo "Pedido realizado exitosamente";
        } else {
            // No hay empleados disponibles
            //echo "No hay empleados disponibles";

            $sql_insertar_pedido = "INSERT INTO Pedido (Id_Usuario, Id_Direccion, Id_Estatus,
                HorarioInicio, HorarioFin, FechaP, CantidadL)
                VALUES (?, ?, 3, ?, ?, ?, ?)";

            // Prepara la consulta para la inserción
            $stmt_insertar_pedido = mysqli_prepare($con, $sql_insertar_pedido);

            // Vincula los parámetros
            mysqli_stmt_bind_param(
                $stmt_insertar_pedido,
                "iisssi",
                $con_use_id,
                $id_direccion,
                $horarioInicio,
                $horarioFin,
                $fechaFormateada,
                $cantidad
            );

            // Ejecuta la consulta de inserción
            mysqli_stmt_execute($stmt_insertar_pedido);

            // Cerrar la consulta preparada
            mysqli_stmt_close($stmt_insertar_pedido);

            echo "Pedido realizado exitosamente";
        }

    } catch (Exception $e) {
        // Manejar la excepción de la base de datos, por ejemplo, registrándola o mostrándola
        die($e->getMessage());
    }
    // Cierra la conexión a la base de datos
    mysqli_close($con);
}

?>