<?php
// Check if the form is submitted and has an action
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
      case 'NuevoEstataqModal':
        NuevoEstataqModal();
        break;
      default:
        // Handle other possible actions (optional)
    }
  }

  function NuevoEstataqModal() {
    // Get the submitted data
    $estado_taquillero = $_POST['estado_taquillero'];

    // Function to validate for only characters (including spaces)
    function validateName($estado_taquillero) {
      return preg_match('/^[A-Za-z\s]+$/', $estado_taquillero);
    }

    // Validate the name
    if (!validateName($estado_taquillero)) {
      // Avoid exiting here to allow displaying success message
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
                window.location.href = '../visual/EstadoTaq.php';
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
  $estado_taquillero = $conexion->real_escape_string($estado_taquillero);

  // Check if the destination name already exists
  $consulta = "SELECT estado_taquillero FROM estado_taquillero WHERE estado_taquillero = '$estado_taquillero'";
  $resultado = $conexion->query($consulta);

  if ($resultado->num_rows > 0) {
    // Destination name already exists
    echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            icon: 'error',
            title: 'Error: Estado Taquillero ya existe en la base de datos.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            window.location.href = '../visual/EstadoTaq.php';
          });
        });
      </script>";
  } else {
    // Insert the destination name
    $sql = "INSERT INTO estado_taquillero (estado_taquillero) VALUES ('$estado_taquillero')";
    if ($conexion->query($sql)) {
      $id_estado_taquillero = $conexion->insert_id; // Assuming this is how you get the last inserted ID
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            icon: 'success',
            title: ' Estado Taquillero agregado exitosamente!.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            window.location.href = '../visual/EstadoTaq.php';
          });
        });
      </script>";
    
    } else {
      echo "Error al insertar el Estado Taquillero: " . $conexion->error;
    }
  }
  // Close the connection (optional, consider using mysqli_close() at script termination)
  $conexion->close();
}
}  
?>

