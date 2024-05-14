
<?php
  
  // Check if the form is submitted and has an action
  if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
      case 'NuevoConductorModal':
        NuevoConductorModal();
        break;
      default:
        // Handle other possible actions (optional)
    }
  }
  
  function NuevoConductorModal() {
    // Get the submitted data
    
  
    function validateName($name) {
        // Regular expression for valid characters: letters, spaces, and accents
        $pattern = '/^[A-Za-z\sáéíóúÁÉÍÓÚ]+$/';  // No need for the span tag
        return preg_match($pattern, $name);
      }
      
      function validateDocument($n_documento_con) {
        // Adjust the pattern to match your specific phone number format requirements
        $pattern = '/^\d{10}$/'; // Example: 10-digit phone number (No need for the span tag)
        return preg_match($pattern, $n_documento_con);
      }
     
      
      
    // Get nombre and apellido values (replace with your actual retrieval method)
    $nombre_con = $_POST['nombre_con']; // Assuming nombre comes from a form
    $apellido_conduc = $_POST['apellido_conduc'];
    $n_documento_con = $_POST['n_documento_con'];;
    $id_tipo_vehiculo = $_POST['id_tipo_vehiculo'];
    $id_vehiculo = $_POST['id_vehiculo'];


    $nombreValid = validateName($nombre_con);
    $apellidoValid = validateName($apellido_conduc);
    $documentoValid = validateDocument($n_documento_con);
  

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
            window.location.href = '../visual/Conductor.php';
          });
        });
      </script>";
  }else { 

    // Validate phone number (separate error message)
    if (!$documentoValid) {
      echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            icon: 'error',
            title: 'Error: El Documento ingresado debe tener 10 Digitos y ser solo números.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonButtonText: 'OK',
            timer: 1500
          }).then(() => {
            window.location.href = '../visual/Conductor.php';
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
            $nombre_con_escaped = htmlspecialchars($nombre_con);
            $apellido_conduc_escaped = htmlspecialchars($apellido_conduc);
            $n_documento_con_escaped = htmlspecialchars($n_documento_con);
            if ($nombreValid && $apellidoValid && $documentoValid) {
              $consulta = "SELECT * FROM conductor WHERE nombre_con = '$nombre_con_escaped' AND apellido_conduc = '$apellido_conduc_escaped' AND n_documento_con = '$n_documento_con_escaped' ";
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
                        window.location.href = '../visual/Conductor.php'; 
                      });
                    });
                  </script>";
              }      else {
                $sql = "INSERT INTO conductor(nombre_con, apellido_conduc, n_documento_con, id_tipo_vehiculo, id_vehiculo)
                 VALUES ('$nombre_con', '$apellido_conduc', '$n_documento_con', '$id_tipo_vehiculo', '$id_vehiculo')";
               if ($conexion->query($sql)) {
               $id_conductor   = $conexion->insert_id; // Assuming this is how you get the last inserted ID
               echo "
               <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
               <script language='JavaScript'>
                   document.addEventListener('DOMContentLoaded', function() {
                   Swal.fire({
                       icon: 'success',
                       title: ' Conductor agregado exitosamente!.',
                       showCancelButton: false,
                       confirmButtonColor: '#3085d6',
                       confirmButtonText: 'OK',
                       timer: 1500
                   }).then(() => {
                       window.location.href = '../visual/Conductor.php';
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
   
?>
