
<?php
  
  // Check if the form is submitted and has an action
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
      case 'NuevoTaquilleroModal':
        NuevoTaquilleroModal();
        break;
      default:
        // Handle other possible actions (optional)
    }
  }
  
  function NuevoTaquilleroModal() {
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
      function validarCorreoCompleto($correo_electronico_us) {
        // Regular expression for basic email structure (improved for RFC compliance)
        $emailPattern = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
      
        // Validate basic structure first
        if (!preg_match($emailPattern, $correo_electronico_us)) {
          return false;  // Not a valid email structure
        }
      
        // Extract domain name for further validation
        $domain = strtolower(substr(strstr($correo_electronico_us, '@'), 1));  // Extract domain after "@"
      
        // Array of allowed domain providers (case-insensitive)
        $allowedDomains = array('gmail.com', 'hotmail.com', 'outlook.com');
      
        // Check if domain is among allowed providers
        return in_array($domain, $allowedDomains, true);
      }
      function validarUsuario($usuario) {
        $patron = "/^[a-zA-Z0-9_]+$/"; // Regular expression for usernames
        return preg_match($patron, $usuario);
      }
    
      
      
    // Get nombre and apellido values (replace with your actual retrieval method)
    $nombre_taq = $_POST['nombre_taq']; // Assuming nombre comes from a form
    $apellido_taq = $_POST['apellido_taq'];
    $correo_electronico_taq = $_POST['correo_electronico_taq'];
    $telefono_ta = $_POST['telefono_ta'];
    $usuario_taq = $_POST['usuario_taq'];
    $contrasena_taq = $_POST['contrasena_taq'];
    $us_tipo = $_POST['us_tipo'];
    $id_estado_taquillero = $_POST['id_estado_taquillero'];


    $nombreValid = validateName($nombre_taq);
    $apellidoValid = validateName($apellido_taq);
    $telefonoValid = validatePhone($telefono_ta);
    $correoValid = validarCorreoCompleto($correo_electronico_taq);
    $usuarioValid = validarUsuario($usuario_taq);
  

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
            window.location.href = '../visual/Taquillero.php';
          });
        });
      </script>";
  }else { 

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
            window.location.href = '../visual/Taquillero.php';
          });
        });
      </script>";
    }else {
      // Validate email (separate error message)
      if (!$correoValid) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
          document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
              icon: 'error',
              title: 'Error: El correo electrónico ingresado es inválido.',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonButtonText: 'OK',
              timer: 1500
            }).then(() => {
              window.location.href = '../visual/Taquillero.php';
            });
          });
        </script>";
      }else {
        // Validate username (separate error message)
        if (!$usuarioValid) {
          echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: 'Error: El nombre de usuario ingresado es inválido. (Caracteres alfanuméricos y guiones bajos)',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonButtonText: 'OK',
                timer: 1500
              }).then(() => {
                window.location.href = '../visual/Taquillero.php';
              });
            });
          </script>";
        }else {
        
            // Execute only if phone number is also valid
            // Check if record already exists
            $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
            if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
            }
            $nombre_taq_escaped = htmlspecialchars($nombre_taq);
            $apellido_taq_escaped = htmlspecialchars($apellido_taq);
            $correo_electronico_taq_escaped = htmlspecialchars($correo_electronico_taq);
            $telefono_ta_escaped = htmlspecialchars($telefono_ta);
            $usuario_taq_escaped = htmlspecialchars($usuario_taq);
            $contrasena_taq_escaped = htmlspecialchars($contrasena_taq);
            if ($nombreValid && $apellidoValid && $telefonoValid && $correoValid && $usuarioValid) {
              $consulta = "SELECT * FROM taquillero_geren WHERE nombre_taq = '$nombre_taq_escaped' AND apellido_taq = '$apellido_taq_escaped' AND correo_electronico_taq = '$correo_electronico_taq_escaped' 
              AND telefono_ta = '$telefono_ta_escaped'AND usuario_taq = '$usuario_taq_escaped'AND contrasena_taq = '$contrasena_taq_escaped'";
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
                        window.location.href = '../visual/Taquillero.php'; 
                      });
                    });
                  </script>";
              }      else {
                $sql = "INSERT INTO taquillero_geren(nombre_taq, apellido_taq, correo_electronico_taq, telefono_ta, usuario_taq, contrasena_taq, us_tipo, id_estado_taquillero)
                 VALUES ('$nombre_taq', '$apellido_taq', '$correo_electronico_taq', '$telefono_ta', '$usuario_taq' , '$contrasena_taq' , '$us_tipo', '$id_estado_taquillero')";
               if ($conexion->query($sql)) {
               $id_taquillero = $conexion->insert_id; // Assuming this is how you get the last inserted ID
               echo "
               <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
               <script language='JavaScript'>
                   document.addEventListener('DOMContentLoaded', function() {
                   Swal.fire({
                       icon: 'success',
                       title: ' Taquillero agregado exitosamente!.',
                       showCancelButton: false,
                       confirmButtonColor: '#3085d6',
                       confirmButtonText: 'OK',
                       timer: 1500
                   }).then(() => {
                       window.location.href = '../visual/Taquillero.php';
                   });
                   });
               </script>";
               
           } else {
             echo "Error al insertar el destinatario: " . $conexion->error;
             $conexion->close();
           }
          }
            }
          }}
            
  }
}
} 
    




  // Close the connection (optional, consider using mysqli_close() at script termination)
  



    
?>
