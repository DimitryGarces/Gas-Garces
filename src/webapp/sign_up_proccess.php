<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Incluye la conexión a la base de datos desde db.php
include('db.php');

// Inicia la sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $p_number = $_POST['p_number'];
    $age = $_POST['age'];
    $curp = $_POST['curp'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    try {
        // Consulta SQL para verificar la existencia de un usuario
        $sql_busqueda_usuario = "SELECT Id_Datos
                FROM DatosPersonales
                WHERE Usuario = ?";
        // Prepara la consulta para el usuario
        $stmt_busqueda_usuario = mysqli_prepare($con, $sql_busqueda_usuario);

        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt_busqueda_usuario, "s", $username);

        // Ejecuta la consulta para la existencia de usuario
        mysqli_stmt_execute($stmt_busqueda_usuario);

        // Almacena el resultado
        mysqli_stmt_store_result($stmt_busqueda_usuario);

        // Verifica si se encontró un usuario normal con las credenciales proporcionadas
        if (mysqli_stmt_num_rows($stmt_busqueda_usuario) == 1) {
            // Credenciales válidas para usuario normal, pide que use otro usuario
            $mensaje_error = "Ya existe ese usuario, intente con otro.";
            header("Location: RegistroUsuario.php?error=" . urlencode($mensaje_error));
            exit();
        }

        // Consulta SQL para verificar la existencia de una curp registrada
        $sql_busqueda_curp = "SELECT Id_Datos
         FROM DatosPersonales
         WHERE Curp = ?";
        // Prepara la consulta para la busqueda de una curp
        $stmt_busqueda_curp = mysqli_prepare($con, $sql_busqueda_curp);

        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt_busqueda_curp, "s", $curp);

        // Ejecuta la consulta para la existencia de una curp
        mysqli_stmt_execute($stmt_busqueda_curp);

        // Almacena el resultado
        mysqli_stmt_store_result($stmt_busqueda_curp);

        // Verifica si se encontró una curp con las credenciales proporcionadas
        if (mysqli_stmt_num_rows($stmt_busqueda_curp) == 1) {
            // Credenciales válidas para la curp, menciona que ya existe un usuario con esa curp
            $mensaje_error = "La curp proporcionada \nse encuentra vinculada \na una cuenta existente.";
            header("Location: RegistroUsuario.php?error=" . urlencode($mensaje_error));
            exit();
        }

        // Ahora que hemos verificado que el usuario y la CURP no existen, procedemos con la inserción
        // Consulta SQL para insertar datos en la tabla DatosPersonales
        $sql_insertar_datos = "INSERT INTO DatosPersonales (Nombre, ApellidoP, Usuario, Contrasenia, Telefono, Edad, Curp) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepara la consulta para la inserción
        $stmt_insertar_datos = mysqli_prepare($con, $sql_insertar_datos);

        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt_insertar_datos, "sssssis", $name, $last_name, $username, $pass, $p_number, $age, $curp);

        // Ejecuta la consulta de inserción
        mysqli_stmt_execute($stmt_insertar_datos);

        // Obtiene el ID generado para el usuario
        $id_user = mysqli_insert_id($con);

        // Ahora puedes usar $usuario_id para insertar en la tabla Usuario
        if (isset($id_user)) {
            // Consulta SQL para insertar datos en la tabla Usuario
            $sql_insertar_usuario = "INSERT INTO Usuario (Id_Datos) VALUES (?)";

            // Prepara la consulta para la inserción
            $stmt_insertar_usuario = mysqli_prepare($con, $sql_insertar_usuario);

            // Vincula los parámetros
            mysqli_stmt_bind_param($stmt_insertar_usuario, "i", $id_user);

            // Ejecuta la consulta de inserción
            mysqli_stmt_execute($stmt_insertar_usuario);
        }

        // Cierra las consultas preparadas
        mysqli_stmt_close($stmt_busqueda_usuario);
        mysqli_stmt_close($stmt_busqueda_curp);
        mysqli_stmt_close($stmt_insertar_datos);
        mysqli_stmt_close($stmt_insertar_usuario);

        // Establece la variable de sesión con el mensaje de éxito
        $_SESSION['success_message_r'] = "Registro exitoso";

        // Redirige a la ventana de registro
        header("Location: InicioSesion.php");
        exit();
    } catch (Exception $e) {
        // Manejar la excepción de la base de datos, por ejemplo, registrándola o mostrándola
        die($e->getMessage());
    }

    // Cierra la conexión a la base de datos
    mysqli_close($con);
}
?>