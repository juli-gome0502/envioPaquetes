<?php
include "db.php";

$nombre_destinatario = $_POST['nombre_destinatario'];

$sql = "SELECT id_destinatario, nombre_destinatario, apellido_destinatario FROM destinatario 
        WHERE id_destinatario = '$nombre_destinatario'";

$result = mysqli_query($conexion, $sql);

if ($result !== false) {
    $userData = mysqli_fetch_assoc($result);

    if ($userData) {
        $nombre_destinatario = utf8_encode($userData['nombre_destinatario']);
        $apellido_destinatario = utf8_encode($userData['apellido_destinatario']);

        echo "<label for='nombre_destinatario'>Nombre del Destinatario:</label>";
        echo "<input type='text' class='form-control' id='nombre_destinatario' name='nombre_destinatario' value='$nombre_destinatario' readonly>";

        echo "<label for='apellido_destinatario'>Apellido del Destinatario:</label>";
        echo "<input type='text' class='form-control' id='apellido_destinatario' name='apellido_destinatario' value='$apellido_destinatario' readonly>";

        // Agregar el campo oculto para el ID de destinatario
        echo "<input type='hidden' id='id_destinatario' name='id_destinatario' value='" . $userData['id_destinatario'] . "'>";
    } else {
        echo "";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>



