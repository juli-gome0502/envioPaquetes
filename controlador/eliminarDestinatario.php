<?php
// Include the connection file
$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$id_destinatario = $conexion->real_escape_string($_POST['id_destinatario']);

$consulta = "DELETE FROM destinatario WHERE id_destinatario = '$id_destinatario'";

$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Registro Eliminado Exitosamente',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            location.assign('../visual/destinatario.php');
          });
    });
    </script>";
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Algo salio mal. Intenta de nuevo',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            location.assign('../visual/destinatario.php');
          });
    });
    </script>";
}
?>
