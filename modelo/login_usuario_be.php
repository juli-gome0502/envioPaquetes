<?php
// original

$db = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

// Comprobar la conexión
if ($db->connect_error) {
    die('Error de conexión: ' . $db->connect_error);
}

// Recibir datos del formulario y evitar inyección SQL
$usuario = $db->real_escape_string($_POST['usuario']);
$contrasena = $db->real_escape_string($_POST['contrasena']);

// Consulta para verificar el usuario y la contraseña de manera segura utilizando consultas preparadas
$sql = "SELECT id_usuario, usuario, contrasena FROM usuario WHERE usuario = ? AND contrasena = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Iniciar sesión y redirigir al usuario
    session_start();
    $row = $resultado->fetch_assoc();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['id_usuario'] = $row['id_usuario'];
    $GLOBALS['id_usuario_global'] = $row['id_usuario'];
    // Otros campos pueden ser almacenados en la sesión si es necesario
    header('Location: ../visual/bienvenido.php');
    exit();
} else {
    // Mostrar mensaje de error de manera segura
    echo '<script>alert("Usuario o Contraseña incorrectos"); window.location = "../visual/registro.php";</script>';
    exit();
}

// Cerrar la conexión a la base de datos
$stmt->close();
$db->close();
?>