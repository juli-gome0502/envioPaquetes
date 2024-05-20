<?php
$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$id_envio = $_POST['id_envio'];
$nombre_estado = isset($_POST['nombre_estado']) ? $_POST['nombre_estado'] : "";

// Corrige la columna en la cláusula WHERE (debes usar la columna correcta para id_envio)
$sql = "UPDATE envio SET id_estado = '$nombre_estado' WHERE id_envio = '$id_envio'";

$resultado = mysqli_query($conexion, $sql);
if ($resultado) {
    $mensaje = "REGISTRO MODIFICADO";
    header("Location: ./GuiadeEnvio.php");
} else {
    $mensaje = "ERROR AL MODIFICAR";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Modificación</title>
    <!-- Agrega enlaces CSS o scripts adicionales si es necesario -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="row" style="text-align:center">
                <h3><?php echo $mensaje; ?></h3>
                <a href="GuiadeEnvio.php" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>
</body>
</html>

