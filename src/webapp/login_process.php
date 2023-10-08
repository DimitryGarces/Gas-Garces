<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Incluye la conexión a la base de datos desde db.php
include('db.php');

// Verifica si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = $_POST['contraseña'];

    try {
        // Consulta SQL para verificar las credenciales de un usuario normal con sentencia preparada
        $sql_usuario = "SELECT Usuario.Id_Usuario
        FROM Usuario
        INNER JOIN DatosPersonales ON Usuario.Id_Datos = DatosPersonales.Id_Datos
        WHERE DatosPersonales.Usuario = ? 
        AND DatosPersonales.Contrasenia = ?";

        // Prepara la consulta para el usuario normal
        $stmt_usuario = mysqli_prepare($con, $sql_usuario);

        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt_usuario, "ss", $nombre_usuario, $contraseña);

        // Ejecuta la consulta para el usuario normal
        mysqli_stmt_execute($stmt_usuario);

        // Almacena el resultado
        mysqli_stmt_store_result($stmt_usuario);

        // Verifica si se encontró un usuario normal con las credenciales proporcionadas
        if (mysqli_stmt_num_rows($stmt_usuario) == 1) {
            // Credenciales válidas para usuario normal, redirecciona a la página de inicio de usuario normal
            header("Location: usuario.html");
            exit();
        }

        // Consulta SQL para verificar las credenciales de un empleado con sentencia preparada
        $sql_empleado = "SELECT Empleado.Id_Empleado
        FROM Empleado
        INNER JOIN DatosPersonales ON Empleado.Id_Datos = DatosPersonales.Id_Datos
        WHERE DatosPersonales.Usuario = ? 
        AND DatosPersonales.Contrasenia = ?";

        // Prepara la consulta para el empleado
        $stmt_empleado = mysqli_prepare($con, $sql_empleado);

        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt_empleado, "ss", $nombre_usuario, $contraseña);

        // Ejecuta la consulta para el empleado
        mysqli_stmt_execute($stmt_empleado);

        // Almacena el resultado
        mysqli_stmt_store_result($stmt_empleado);

        // Verifica si se encontró un empleado con las credenciales proporcionadas
        if (mysqli_stmt_num_rows($stmt_empleado) == 1) {
            // Credenciales válidas para empleado, redirecciona a la página de inicio de empleado
            header("Location: mapa.html");
            exit();
        }

        // Credenciales incorrectas, redirige con un mensaje de error
        $mensaje_error = "Credenciales incorrectas. Intente nuevamente.";
        header("Location: InicioSesion.php?error=" . urlencode($mensaje_error));
        exit();

        // Cierra las consultas preparadas
        mysqli_stmt_close($stmt_usuario);
        mysqli_stmt_close($stmt_empleado);
    } catch (Exception $e) {
        // Manejar la excepción de la base de datos, por ejemplo, registrándola o mostrándola
        die($e->getMessage());
    }

    // Cierra la conexión a la base de datos
    mysqli_close($con);
}
?>
