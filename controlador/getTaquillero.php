<?php
  
  // Check if the form is submitted and has an action
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
      case 'EditaTaquilleroModal':
        EditaTaquilleroModal();
        break;
      default:
        // Handle other possible actions (optional)
    }
  }
  
  function EditaTaquilleroModal() {
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
    $id_taquillero = $_POST['id_taquillero'];
    $nombre_taq = $_POST['nombre_taq'];
    $apellido_taq = $_POST['apellido_taq'];
    $correo_electronico_taq = $_POST['correo_electronico_taq'];
    $telefono_ta = $_POST['telefono_ta'];
    $usuario_taq = $_POST['usuario_taq'];
    $contrasena_taq = $_POST['contrasena_taq'];
    $estado_taquillero = $_POST['estado_taquillero'];
    $nombre_usuario = $_POST['nombre_usuario'];


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
          $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
                $consulta = "UPDATE taquillero_geren SET nombre_taq='$nombre_taq', apellido_taq='$apellido_taq', correo_electronico_taq='$correo_electronico_taq', 
                telefono_ta='$telefono_ta',
                usuario_taq='$usuario_taq', contrasena_taq='$contrasena_taq', id_estado_taquillero='$estado_taquillero',  us_tipo='$nombre_usuario' WHERE id_taquillero = '$id_taquillero'";
               $resultado = mysqli_query($conexion, $consulta);
    
        if ($resultado) {
            // Mostrar mensaje de éxito
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
                        window.location.assign('../visual/Taquillero.php');
                    });
                });
            </script>";
          } else {
            echo "Error al insertar el destinatario: " . $conexion->error;
            exit();
          }
         }
           }
         }}
           
 }
?>
