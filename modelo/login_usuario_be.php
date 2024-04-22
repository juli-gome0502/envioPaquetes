<?php

// Conexión a la base de datos
$db = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

// Comprobar la conexión
if ($db->connect_error) {
    die('Error de conexión: ' . $db->connect_error);
}

// Recibir datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta para verificar el usuario y la contraseña
$sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = $db->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Iniciar sesión y redirigir al usuario
    session_start();
    $_SESSION['usuario'] = $usuario;
    header('Location: ../visual/bienvenido.php');
} else {
    // Mostrar mensaje de error
    echo '
    <script>
    alert("Usuario o Contraseña incorrectos");
    window.location = "../visual/registro.php";
    </script>
    ';

    exit();
}

// Cerrar la conexión a la base de datos
$db->close();

?>


