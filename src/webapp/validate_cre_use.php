<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Incluye la conexión a la base de datos desde db.php
include('db.php');

// Inicia la sesión
session_start();

//Declarar variables para almacenar los id
$id_datos = 0;
$id_direccion = array();
$id_empleado = array();

try {

    // Consultas SQL para verificar las credenciales de un usuario normal
    $sql_id_datos = "SELECT Id_Datos
    FROM Usuario
    WHERE Id_Usuario = ?";

    // Preparar las consultas para el usuario normal
    $stmt_id_datos = mysqli_prepare($con, $sql_id_datos);

    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt_id_datos, "i", $_SESSION['id_usuario']);

    // Ejecuta las consultas para el usuario normal
    mysqli_stmt_execute($stmt_id_datos);

    // Almacena los resultados
    mysqli_stmt_store_result($stmt_id_datos);

    // Verifica si se encontró un usuario normal con las credenciales proporcionadas
    if (mysqli_stmt_num_rows($stmt_id_datos) == 1) {
        // Obtiene el Id_Datos y asigna el resultado a la variable $id_datos
        mysqli_stmt_bind_result($stmt_id_datos, $id_datos);
        mysqli_stmt_fetch($stmt_id_datos);

        // Almacena el id de los datos
        $_SESSION['id_datos'] = $id_datos;
    }

    // Consultas SQL para verificar las credenciales de un usuario normal
    $sql_id_direccion = "SELECT Id_Direccion
    FROM Usuario_Direccion
    WHERE Id_Usuario = ?";

    // Preparar las consultas para el usuario normal
    $stmt_id_direccion = mysqli_prepare($con, $sql_id_direccion);

    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt_id_direccion, "i", $_SESSION['id_usuario']);

    // Ejecuta las consultas para el usuario normal
    mysqli_stmt_execute($stmt_id_direccion);

    // Almacena los resultados
    mysqli_stmt_store_result($stmt_id_direccion);

    if (mysqli_stmt_num_rows($stmt_id_direccion) >= 1) {
        // Obtiene los Id_Direccion y asigna el resultados a la variable $id_direccion
        mysqli_stmt_bind_result($stmt_id_direccion, $id_direccion_result);

        // Itera sobre los resultados y almacena cada Id_Empleado en el array
        while (mysqli_stmt_fetch($stmt_id_direccion)) {
            $id_direccion[] = $id_direccion_result;
        }

        // Almacena el array de Id_Direccion en la sesión
        $_SESSION['id_direccion'] = $id_direccion;

    }

    // Consultas SQL para verificar las credenciales de un usuario normal
    $sql_id_empleado = "SELECT Id_Empleado
    FROM Empleado";

    // Preparar las consultas para el usuario normal
    $stmt_id_empleado = mysqli_prepare($con, $sql_id_empleado);

    // Ejecuta la consulta para el empleado
    mysqli_stmt_execute($stmt_id_empleado);

    // Almacena los resultados
    mysqli_stmt_store_result($stmt_id_empleado);

    if (mysqli_stmt_num_rows($stmt_id_empleado) >= 1) {
        // Obtiene los Id_Empleado y asigna los resultados a la variable $id_empleado
        mysqli_stmt_bind_result($stmt_id_empleado, $id_empleado_result);

        // Itera sobre los resultados y almacena cada Id_Empleado en el array
        while (mysqli_stmt_fetch($stmt_id_empleado)) {
            $id_empleado[] = $id_empleado_result;
        }

        // Almacena el array de Id_Empleado en la sesión
        $_SESSION['id_empleado'] = $id_empleado;
    }


    // Cierra las consultas preparadas
    mysqli_stmt_close($stmt_id_datos);
    mysqli_stmt_close($stmt_id_direccion);
    mysqli_stmt_close($stmt_id_empleado);

    //Almacenar en las variables
    if (isset($_SESSION['id_usuario'])) {
        $con_use_id = $_SESSION['id_usuario'];
    }

    if (isset($_SESSION['id_datos'])) {
        $con_use_id_datos = $_SESSION['id_datos'];
    }

    if (isset($_SESSION['id_direccion'])) {
        $con_use_id_direccion = $_SESSION['id_direccion'];
    }

    if (isset($_SESSION['id_empleado'])) {
        $emp = $_SESSION['id_empleado'];
    }

    //Credenciales válidas para usuario normal, redirecciona a la página de inicio de usuario normal
    header("Location: Principal.html");
    exit();
} catch (Exception $e) {
    // Manejar la excepción de la base de datos
} finally {
    // Cierra la conexión a la base de datos
    mysqli_close($con);
}
?>