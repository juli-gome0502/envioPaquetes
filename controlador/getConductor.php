<?php
$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$id_conductor = $_POST['id_conductor'];
$nombre_con = $_POST['nombre_con'];
$apellido_conduc = $_POST['apellido_conduc'];
$n_documento_con = $_POST['n_documento_con'];
$nombre_tipo_vehiculo = isset($_POST['nombre_tipo_vehiculo']) ? $_POST['nombre_tipo_vehiculo'] : "";
$placas = isset($_POST['placas']) ? $_POST['placas'] : "";

$sql = "UPDATE conductor SET nombre_con='$nombre_con', apellido_conduc='$apellido_conduc',
n_documento_con='$n_documento_con', id_tipo_vehiculo='$nombre_tipo_vehiculo', 
id_vehiculo='$placas' WHERE id_conductor = '$id_conductor'";

$resultado = mysqli_query($conexion, $sql);
if ($resultado) {
    $mensaje = "REGISTRO MODIFICADO";
    header("Location: ../visual/Conductor.php");
} else {
    $mensaje = "ERROR AL MODIFICAR";
}
?>

<html lang="es">
    <body>
        <div class="container">
            <div class="row">
                <div class="row" style="text-align:center">
                    <h3><?php echo $mensaje; ?></h3>
                    <a href="estudiantes.php" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
    </body>
</html>


