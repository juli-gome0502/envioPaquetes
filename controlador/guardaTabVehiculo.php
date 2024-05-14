
<?php

// Check if the form is submitted and has an action
if (isset($_POST['accion'])) {
  switch ($_POST['accion']) {
    case 'NuevoTabVehiculoModal':
      NuevoTabVehiculoModal();
      break;
    default:
      // Handle other possible actions (optional)
  }
}

function NuevoTabVehiculoModal() {
  function validateBus($n_bus) {
    // Adjust the pattern to match your specific bus number format requirements
    $pattern = '/^\d{10}$/'; // Example: 10-digit bus number
    return preg_match($pattern, $n_bus);
  }
  

  $placas = $_POST['placas']; // Assuming placas comes from a form
  $n__bus = $_POST['n__bus'];

  // Call the validation function and store the result
  $isBusValid = validateBus($n__bus);

  // Validate the bus number
  if (!$isBusValid) {
    // Avoid exiting here to allow displaying success message
    echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script>
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
    if ($conexion->connect_error) {
      die("Error de conexión: " . $conexion->connect_error);
    }
    $placas = $conexion->real_escape_string($placas);

    // Check if the license plate already exists
    $consulta = "SELECT placas FROM vehiculo WHERE placas = '$placas'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
      // License plate already exists
      echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
              icon: 'error',
              title: 'Error: Vehículo ya existe en la base de datos.',
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
      // Insert the destination name
      $sql = "INSERT INTO vehiculo (placas, n__bus) VALUES ('$placas', '$n__bus')";
      if ($conexion->query($sql)){
    $id_vehiculo = $conexion->insert_id; // Assuming this is how you get the last inserted ID
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          icon: 'success',
          title: '  Vehículo agregado exitosamente!.',
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
    echo "Error al insertar el Vehiculo: " . $conexion->error;
  }
}

// Close the connection (optional, consider using mysqli_close() at script termination)
$conexion->close();

}
}
?>
