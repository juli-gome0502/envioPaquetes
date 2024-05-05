<?php
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros
        case 'EditaDestiModal':
          EditaDestiModal();
            break;
    }
  }
  function EditaDestiModal()
  {
      $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    $id_destinatario = $_POST['id_destinatario']; // Asigna el valor recibido desde el formulario

    $nombre_destinatario = $conexion->real_escape_string($_POST['nombre_destinatario']);
    $apellido_destinatario = $conexion->real_escape_string($_POST['apellido_destinatario']);
    $telefono_des = $conexion->real_escape_string($_POST['telefono_des']);
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
            $consulta = "UPDATE destinatario SET nombre_destinatario = '$nombre_destinatario', apellido_destinatario = '$apellido_destinatario', telefono_des = '$telefono_des' WHERE id_destinatario = '$id_destinatario'";

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
                        location.assign('../visual/destinatario.php');
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
