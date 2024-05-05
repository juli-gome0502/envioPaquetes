
<?php
  
  // Check if the form is submitted and has an action
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
      case 'NuevoDestiModal':
        NuevoDestiModal();
        break;
      default:
        // Handle other possible actions (optional)
    }
  }
  
  function NuevoDestiModal() {
    // Get the submitted data
    
  
    function validateName($name) {
        // Regular expression for valid characters: letters, spaces, and accents
        $pattern = '/^[A-Za-z\sáéíóúÁÉÍÓÚ]+$/';  // No need for the span tag
        return preg_match($pattern, $name);
      }
      
      function validatePhone($telefono_des) {
        // Adjust the pattern to match your specific phone number format requirements
        $pattern = '/^\d{10}$/'; // Example: 10-digit phone number (No need for the span tag)
        return preg_match($pattern, $telefono_des);
      }
      
    // Get nombre and apellido values (replace with your actual retrieval method)
    $nombre_destinatario = $_POST['nombre_destinatario']; // Assuming nombre comes from a form
    $apellido_destinatario = $_POST['apellido_destinatario'];
    $telefono_des = $_POST['telefono_des'];
  
    $nombreValid = validateName($nombre_destinatario);
    $apellidoValid = validateName($apellido_destinatario);
    $telefonoValid = validatePhone($telefono_des);
  
    // Validate name and apellido (combined error message)
    if (!$nombreValid || !$apellidoValid) {
      echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
          document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
              icon: 'error',
              title: 'Error: Los campos Nombre y Apellido deben contener solo letras y espacios.',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonButtonText: 'OK',
              timer: 1500
            }).then(() => {
              window.location.href = '../visual/Destinatario.php';
            });
          });
        </script>";
    } else {  // Execute only if both nombre and apellido are valid
      // Validate phone number (separate error message)
      if (!$telefonoValid) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
          document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
              icon: 'error',
              title: 'Error: El teléfono ingresado debe tener 10 Digitos y ser solo números.',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonButtonText: 'OK',
              timer: 1500
            }).then(() => {
              window.location.href = '../visual/Destinatario.php';
            });
          });
        </script>";
      } else {  // Execute only if phone number is also valid
        // Check if record already exists
        $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
        if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
        }
        $nombre_destinatario_escaped = htmlspecialchars($nombre_destinatario);
        $apellido_destinatario_escaped = htmlspecialchars($apellido_destinatario);
        $telefono_des_escaped = htmlspecialchars($telefono_des);
        if ($nombreValid && $apellidoValid && $telefonoValid) {
          $consulta = "SELECT * FROM destinatario WHERE nombre_destinatario = '$nombre_destinatario_escaped' AND apellido_destinatario = '$apellido_destinatario_escaped' AND telefono_des = '$telefono_des_escaped'";
          $resultado = $conexion->query($consulta);
  
          if ($resultado->num_rows > 0) {
            // Record already exists
            echo "
              <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                  Swal.fire({
                    icon: 'error',
                    title: 'Error: El registro ya existe en la base de datos.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonButtonText: 'OK',
                    timer: 1500
                  }).then(() => {
                    window.location.href = '../visual/Destinatario.php'; 
                  });
                });
              </script>";
          } else {
         $sql = "INSERT INTO destinatario (nombre_destinatario, apellido_destinatario, telefono_des) VALUES ('$nombre_destinatario', '$apellido_destinatario', '$telefono_des')";
        if ($conexion->query($sql)) {
        $id_destinatario = $conexion->insert_id; // Assuming this is how you get the last inserted ID
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: ' Destinatario agregado exitosamente!.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
            }).then(() => {
                window.location.href = '../visual/Destinatario.php';
            });
            });
        </script>";
        
    } else {
      echo "Error al insertar el destinatario: " . $conexion->error;
      $conexion->close();
    }
}
  }
    }
  // Close the connection (optional, consider using mysqli_close() at script termination)
  
}}


    
?>
