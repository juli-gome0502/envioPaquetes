<?php

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros
        case 'EditaEstadoTaqModal':
            EditaEstadoTaqModal();
            break;
    }
}
function EditaEstadoTaqModal()
{
    extract($_POST);
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "bd_safe_delivery2";
    $conexion = mysqli_connect($host, $user, $password, $database);
    if(!$conexion){
    echo "No se realizo la conexion a la basa de datos, el error fue:".
    mysqli_connect_error() ;

    }
    $estado_taquillero = mysqli_real_escape_string($conexion, $_POST['estado_taquillero']);
    $id_estado_taquillero = mysqli_real_escape_string($conexion, $_POST['id_estado_taquillero']);
    
    // Comprobar si el valor actualizado contiene solo caracteres y espacios
    if (preg_match('/^[A-Za-z\s]+$/', $estado_taquillero)) {
        // Actualiza el nombre del destino como antes
        $consulta = "UPDATE estado_taquillero SET estado_taquillero = '$estado_taquillero' WHERE id_estado_taquillero = '$id_estado_taquillero' ";
        $resultado = mysqli_query($conexion, $consulta);
    
        if ($resultado) {
            // Mostrar mensaje de éxito
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'El registro fue actualizado correctamente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 1500
                    }).then(() => {
                        window.location.assign('../visual/EstadoTaq.php');
                    });
                });
            </script>";
        } else {
            // Mostrar mensaje de error
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error: Estado Taquillero debe contener solo letras y espacios.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 1500
                    }).then(() => {
                        window.location.assign('../visual/EstadoTaq.php');
                    });
                });
            </script>";
        }
    } else {
        // Mostrar mensaje de error
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error: El nombre del Estado Taquillero debe contener solo letras y espacios.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 1500
                }).then(() => {
                    window.location.assign('../visual/EstadoTaq.php');
                });
            });
        </script>";
    }
}
?>

