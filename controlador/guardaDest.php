<?php
  
  // Check if the form is submitted and has an action
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
      case 'NuevoModal':
        NuevoModal();
        break;
      default:
        // Handle other possible actions (optional)
    }
  }
  
  function NuevoModal() {
    // Get the submitted data
    $nombre_destino = $_POST['nombre_destino'];
  
    // Function to validate for only characters (including spaces)
    function validateName($nombre_destino) {
      return preg_match('/^[A-Za-z\s]+$/', $nombre_destino);
    }
  
    // Validate the name
    if (!validateName($nombre_destino)) {
      // Avoid exiting here to allow displaying success message
      echo "
          <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: 'Error: Nombre del destino debe contener solo letras y espacios.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                window.location.href = '../visual/Destino.php';
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
      $nombre_destino = $conexion->real_escape_string($nombre_destino);
  
      // Check if the destination name already exists
      $consulta = "SELECT nombre_destino FROM destino WHERE nombre_destino = '$nombre_destino'";
      $resultado = $conexion->query($consulta);
  
      if ($resultado->num_rows > 0) {
        // Destination name already exists
        echo "
          <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: 'Error: El nombre del destino ya existe en la base de datos.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                window.location.href = '../visual/Destino.php';
              });
            });
          </script>";
      } else {
        // Insert the destination name
        $sql = "INSERT INTO destino (nombre_destino) VALUES ('$nombre_destino')";
        if ($conexion->query($sql)) {
          $id_destino = $conexion->insert_id; // Assuming this is how you get the last inserted ID
          echo "
          <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'success',
                title: ' Destino agregado exitosamente!.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                window.location.href = '../visual/Destino.php';
              });
            });
          </script>";
        
        } else {
          echo "Error al insertar el destino: " . $conexion->error;
        }
      }
  
      // Close the connection (optional, consider using mysqli_close() at script termination)
      $conexion->close();
  
      // Redirect to destination page (optional, might be redundant with SweetAlert redirection)
      // header('Location: ../visual/destino.php');
    }
  }
?>
  



