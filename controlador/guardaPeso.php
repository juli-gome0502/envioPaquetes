<?php
  
  // Check if the form is submitted and has an action
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
      case 'NuevoPesoModal':
        NuevoPesoModal();
        break;
      default:
        // Handle other possible actions (optional)
    }
  }
  
  function NuevoPesoModal() {
    // Get the submitted data
    $nombre_tipo_peso = $_POST['nombre_tipo_peso'];
  
    // Function to validate for only characters (including spaces)
    function validateName($nombre_tipo_peso) {
      return preg_match('/^[A-Za-z\s]+$/', $nombre_tipo_peso);
    }
  
    // Validate the name
    if (!validateName($nombre_tipo_peso)) {
      // Avoid exiting here to allow displaying success message
      echo "
          <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: 'Error: Tipo Peso debe contener solo letras y espacios.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                window.location.href = '../visual/TipoPeso.php';
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
      $nombre_tipo_peso = $conexion->real_escape_string($nombre_tipo_peso);
  
      // Check if the destination name already exists
      $consulta = "SELECT nombre_tipo_peso FROM tipo_peso WHERE nombre_tipo_peso = '$nombre_tipo_peso'";
      $resultado = $conexion->query($consulta);
  
      if ($resultado->num_rows > 0) {
        // Destination name already exists
        echo "
          <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: 'Error: Tipo Peso ya existe en la base de datos.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                window.location.href = '../visual/TipoPeso.php';
              });
            });
          </script>";
      } else {
        // Insert the destination name
        $sql = "INSERT INTO tipo_peso (nombre_tipo_peso) VALUES ('$nombre_tipo_peso')";
        if ($conexion->query($sql)) {
          $id_tipo_peso = $conexion->insert_id; // Assuming this is how you get the last inserted ID
          echo "
          <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'success',
                title: ' Tipo Peso agregado exitosamente!.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                window.location.href = '../visual/TipoPeso.php';
              });
            });
          </script>";
        
        } else {
          echo "Error al insertar el Tipo Peso: " . $conexion->error;
        }
      }
  
      // Close the connection (optional, consider using mysqli_close() at script termination)
      $conexion->close();
  
      // Redirect to destination page (optional, might be redundant with SweetAlert redirection)
      // header('Location: ../visual/destino.php');
    }
  }
?>
