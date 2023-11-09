<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Incluye la conexión a la base de datos desde db.php
include('db.php');
session_start();
// Verifica si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = $_POST['contraseña'];
    $id_usuario = 0;
    $id_empleado = 0;

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
            // Obtiene el Id_Usuario
            mysqli_stmt_bind_result($stmt_usuario, $id_usuario);
            mysqli_stmt_fetch($stmt_usuario);

            // Almacena las iniciales en la variable de sesión
            $_SESSION['id_usuario'] = $id_usuario;

            // Si encontró un usuario normal, realiza la consulta para obtener las iniciales
            $iniciales = "";

            // Prepara la consulta para obtener las iniciales
            $sql_iniciales = "SELECT CONCAT(LEFT(DP.Nombre, 1), LEFT(DP.ApellidoP, 1)) AS Iniciales
            FROM DatosPersonales DP
            JOIN Usuario U ON DP.Id_Datos = U.Id_Datos
            WHERE U.Id_Usuario = ?";

            // Prepara la consulta
            $stmt_iniciales = mysqli_prepare($con, $sql_iniciales);

            // Vincula el parámetro (ID de usuario) a la consulta
            mysqli_stmt_bind_param($stmt_iniciales, "i", $id_usuario);

            // Ejecuta la consulta para obtener las iniciales
            mysqli_stmt_execute($stmt_iniciales);

            // Almacena el resultado
            mysqli_stmt_store_result($stmt_iniciales);

            // Asigna el resultado a la variable $iniciales
            mysqli_stmt_bind_result($stmt_iniciales, $iniciales);
            mysqli_stmt_fetch($stmt_iniciales);

            // Almacena las iniciales en la variable de sesión
            $_SESSION['nombre_usuario'] = $iniciales;

            // Cierra las consultas preparadas
            mysqli_stmt_close($stmt_usuario);
            mysqli_stmt_close($stmt_iniciales);

            // Credenciales válidas para usuario normal, redirecciona a la página de inicio de usuario normal
            header("Location: Principal.html");
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

            // Obtiene el Id_Empleado
            mysqli_stmt_bind_result($stmt_empleado, $id_empleado);
            mysqli_stmt_fetch($stmt_empleado);

            // Si encontró un empleado, realiza la consulta para obtener las iniciales
            $iniciales = "";

            // Prepara la consulta para obtener las iniciales
            $sql_iniciales = "SELECT CONCAT(LEFT(DP.Nombre, 1), LEFT(DP.ApellidoP, 1)) AS Iniciales
            FROM DatosPersonales DP
            JOIN Empleado E ON DP.Id_Datos = E.Id_Datos
            WHERE E.Id_Empleado = ?";

            // Prepara la consulta
            $stmt_iniciales = mysqli_prepare($con, $sql_iniciales);

            // Vincula el parámetro (ID de empleado) a la consulta
            mysqli_stmt_bind_param($stmt_iniciales, "i", $id_empleado);

            // Ejecuta la consulta para obtener las iniciales
            mysqli_stmt_execute($stmt_iniciales);

            // Almacena el resultado
            mysqli_stmt_store_result($stmt_iniciales);

            // Asigna el resultado a la variable $iniciales
            mysqli_stmt_bind_result($stmt_iniciales, $iniciales);
            mysqli_stmt_fetch($stmt_iniciales);

            // Almacena las iniciales en la variable de sesión
            $_SESSION['nombre_usuario'] = $iniciales;


            mysqli_stmt_close($stmt_iniciales);
            mysqli_stmt_close($stmt_usuario);
            mysqli_stmt_close($stmt_empleado);
            // Credenciales válidas para empleado, redirecciona a la página de inicio de empleado
            header("Location: mapa.php");
            exit();
        }

        // Credenciales incorrectas, redirige con un mensaje de error
        $mensaje_error = "Credenciales incorrectas. Intente nuevamente.";
        header("Location: InicioSesion.php?error=" . urlencode($mensaje_error));
        exit();

        // Cierra las consultas preparadas
        mysqli_stmt_close($stmt_usuario);
        mysqli_stmt_close($stmt_iniciales);
        mysqli_stmt_close($stmt_empleado);
    } catch (Exception $e) {
        // Manejar la excepción de la base de datos, por ejemplo, registrándola o mostrándola
        die($e->getMessage());
    }

    // Cierra la conexión a la base de datos
    mysqli_close($con);
}
?>