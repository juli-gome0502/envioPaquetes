<?php
// Check if the form is submitted and has an action
if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'EditaTabVehiculoModal':
            EditaTabVehiculoModal();
            break;
        default:
            // Handle other possible actions (optional)
    }
}

function EditaTabVehiculoModal() {
    function validateBus($n_bus) {
        // Adjust the pattern to match your specific bus number format requirements
        $pattern = '/^\d{10}$/'; // Example: 10-digit bus number
        return preg_match($pattern, $n_bus);
    }

    $placas = $_POST['placas']; // Assuming placas comes from a form
    $n__bus = $_POST['n__bus'];
    

    $id_vehiculo = $_POST['id_vehiculo']; // Add this line to get id_vehiculo

    // Call the validation function and store the result
    $isBusValid = validateBus($n__bus);

    // Validate the bus number
    if (!$isBusValid) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error: N° Bus Solo debe tener Numeros.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 1500
                }).then(() => {
                    window.location.href = '../visual/TabVehiculo.php';
                });
            });
        </script>";
    } else {
        $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
        $consulta = "UPDATE vehiculo SET placas='$placas', n__bus='$n__bus' WHERE id_vehiculo = '$id_vehiculo'";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
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
                        window.location.assign('../visual/TabVehiculo.php');
                    });
                });
            </script>";
        } else {
            echo "Error al insertar el Vehiculo: " . $conexion->error;
        }
    }

}
?>
