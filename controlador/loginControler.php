<?php

// Conexión a la base de datos (reemplace con sus credenciales)
$db = new mysqli("localhost", "root", "", "bd_safe_delivery2");

// Comprobar la conexión
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

// Recibir datos del formulario de inicio de sesión
$usuario_taq = $_POST["user"];
$contrasena_taq = $_POST["pass"];

// Consulta SQL para verificar el usuario y la contraseña
$sql = "SELECT id_taquillero, us_tipo FROM taquillero_geren WHERE usuario_taq = '$usuario_taq' AND contrasena_taq = '$contrasena_taq'";
$resultado = $db->query($sql);

// Validar si la consulta tiene resultados
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    // Almacenar el ID y tipo de usuario en la sesión
    session_start();
    $_SESSION["id_taquillero"] = $fila["id_taquillero"];
    $_SESSION["us_tipo"] = $fila["us_tipo"];

    // Redirigir al usuario correspondiente
    switch ($fila["us_tipo"]) {
        case 1:
            header("Location: ../visual/taquillero.php");
            break;
        case 2:
            header("Location: ../tutorial2/GuiadeEnvio.php");
            break;
        default:
            echo "Tipo de usuario no válido";
    }
} else {
    echo '<script>alert("Usuario o Contraseña incorrectos"); window.location = "../visual/login.php";</script>';
    exit();
}

// Cerrar la conexión a la base de datos
$db->close();

?>
