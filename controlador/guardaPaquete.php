<?php
// Check if the form is submitted and has an action
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
      case 'NuevoPaqueteModal':
        NuevoPaqueteModal();
        break;
      default:
        // Handle other possible actions (optional)
    }
  }

  function NuevoPaqueteModal() {
    // Get the submitted data
    $nombre_tipo_paquete = $_POST['nombre_tipo_paquete'];

    // Function to validate for only characters (including spaces)
    function validateName($nombre_tipo_paquete) {
      return preg_match('/^[A-Za-z\s]+$/', $nombre_tipo_paquete);
    }

    // Validate the name
    if (!validateName($nombre_tipo_paquete)) {
      // Avoid exiting here to allow displaying success message
      echo "
          <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: 'Error: Tipo Paquete debe contener solo letras y espacios.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                window.location.href = '../visual/TipoPaquete.php';
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
  $nombre_tipo_paquete = $conexion->real_escape_string($nombre_tipo_paquete);

  // Check if the destination name already exists
  $consulta = "SELECT nombre_tipo_paquete FROM tipo_paquete WHERE nombre_tipo_paquete = '$nombre_tipo_paquete'";
  $resultado = $conexion->query($consulta);

  if ($resultado->num_rows > 0) {
    // Destination name already exists
    echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            icon: 'error',
            title: 'Error: Tipo Paquete ya existe en la base de datos.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            window.location.href = '../visual/TipoPaquete.php';
          });
        });
      </script>";
  } else {
    // Insert the destination name
    $sql = "INSERT INTO tipo_paquete (nombre_tipo_paquete) VALUES ('$nombre_tipo_paquete')";
    if ($conexion->query($sql)) {
      $id_tipo_paquete = $conexion->insert_id; // Assuming this is how you get the last inserted ID
      echo "
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            icon: 'success',
            title: ' Tipo Paquete agregado exitosamente!.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 1500
          }).then(() => {
            window.location.href = '../visual/TipoPaquete.php';
          });
        });
      </script>";
    
    } else {
      echo "Error al insertar el Tipo Paquete: " . $conexion->error;
    }
  }

  // Close the connection (optional, consider using mysqli_close() at script termination)
  $conexion->close();

}
}
  
  
?>
