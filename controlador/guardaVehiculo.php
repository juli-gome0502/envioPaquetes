<?php
// Check if the form is submitted and has an action
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
      case 'NuevoVehiculoModal':
        NuevoVehiculoModal();
        break;
      default:
        // Handle other possible actions (optional)
    }
  }

  function NuevoVehiculoModal() {
    // Get the submitted data
    $nombre_tipo_vehiculo = $_POST['nombre_tipo_vehiculo'];

    // Function to validate for only characters (including spaces)
    function validateName($nombre_tipo_vehiculo) {
      return preg_match('/^[A-Za-z\s]+$/', $nombre_tipo_vehiculo);
    }

    // Validate the name
    if (!validateName($nombre_tipo_vehiculo)) {
      // Avoid exiting here to allow displaying success message
      echo "
          <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: 'Error: Vehículo debe contener solo letras y espacios.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                window.location.href = '../visual/Vehiculo.php';
              });
            });
          </script>";
    } else {

  // Connect to the database
  $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
  if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
  }

  // Escape the name to prevent SQL injection
  $nombre_tipo_vehiculo = $conexion->real_escape_string($nombre_tipo_vehiculo);

  // Check if the destination name already exists
  $consulta = "SELECT nombre_tipo_vehiculo FROM tipo_vehiculo WHERE nombre_tipo_vehiculo = '$nombre_tipo_vehiculo'";
  $resultado = $conexion->query($consulta);

  if ($resultado->num_rows > 0) {
    // Destination name already exists
    echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            icon: 'error',
            title: 'Error: Vehículo ya existe en la base de datos.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            window.location.href = '../visual/Vehiculo.php';
          });
        });
      </script>";
  } else {
    // Insert the destination name
    $sql = "INSERT INTO tipo_vehiculo (nombre_tipo_vehiculo) VALUES ('$nombre_tipo_vehiculo')";
    if ($conexion->query($sql)) {
      $id_tipo_vehiculo = $conexion->insert_id; // Assuming this is how you get the last inserted ID
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
            window.location.href = '../visual/Vehiculo.php';
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
