<?php

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros
        case 'EditausuarioModal':
            EditausuarioModal();
            break;
    }
}

function EditausuarioModal()
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

    $nombre_usuario = mysqli_real_escape_string($conexion, $_POST['nombre_usuario']);
    $id_tipo_usuario = mysqli_real_escape_string($conexion, $_POST['id_tipo_usuario']);
    
    // Comprobar si el valor actualizado contiene solo caracteres y espacios
    if (preg_match('/^[A-Za-z\s]+$/', $nombre_usuario)) {
        // Actualiza el nombre del destino como antes
        $consulta = "UPDATE Tipo_Usuario SET nombre_usuario = '$nombre_usuario' WHERE id_tipo_usuario = '$id_tipo_usuario' ";
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
                        window.location.assign('../visual/TipoUsuario.php');
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
                        title: 'Error: Tipo Usuario debe contener solo letras y espacios.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 1500
                    }).then(() => {
                        window.location.assign('../visual/TipoUsuario.php');
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
                    title: 'Error: El nombre del Tipo Usuario debe contener solo letras y espacios.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 1500
                }).then(() => {
                    window.location.assign('../visual/TipoUsuario.php');
                });
            });
        </script>";
    }
}
?>

