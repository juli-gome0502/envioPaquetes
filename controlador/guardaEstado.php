<?php
// Check if the form is submitted and has an action
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
      case 'NuevoEstadoModal':
        NuevoEstadoModal();
        break;
      default:
        // Handle other possible actions (optional)
    }
  }

  function NuevoEstadoModal() {
    // Get the submitted data
    $nombre_estado = $_POST['nombre_estado'];

    // Function to validate for only characters (including spaces)
    function validateName($nombre_estado) {
      return preg_match('/^[A-Za-z\s]+$/', $nombre_estado);
    }

    // Validate the name
    if (!validateName($nombre_estado)) {
      // Avoid exiting here to allow displaying success message
      echo "
          <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: 'Error: Estado debe contener solo letras y espacios.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                window.location.href = '../visual/EstadoPaquete.php';
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
  $nombre_estado = $conexion->real_escape_string($nombre_estado);

  // Check if the destination name already exists
  $consulta = "SELECT nombre_estado FROM estado WHERE nombre_estado = '$nombre_estado'";
  $resultado = $conexion->query($consulta);

  if ($resultado->num_rows > 0) {
    // Destination name already exists
    echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            icon: 'error',
            title: 'Error: Estado ya existe en la base de datos.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            window.location.href = '../visual/EstadoPaquete.php';
          });
        });
      </script>";
  } else {
    // Insert the destination name
    $sql = "INSERT INTO estado (nombre_estado) VALUES ('$nombre_estado')";
    if ($conexion->query($sql)) {
      $id_estado = $conexion->insert_id; // Assuming this is how you get the last inserted ID
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            icon: 'success',
            title: ' Estado agregado exitosamente!.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            window.location.href = '../visual/EstadoPaquete.php';
          });
        });
      </script>";
    
    } else {
      echo "Error al insertar el Estado: " . $conexion->error;
    }
  }

  // Close the connection (optional, consider using mysqli_close() at script termination)
  $conexion->close();

}
}
  
  
?>
