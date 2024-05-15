<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
$nombre_taq = $_POST['nombre_taq']; // Assuming nombre comes from a form
$apellido_taq = $_POST['apellido_taq'];
$correo_electronico_taq = $_POST['correo_electronico_taq'];
$telefono_ta = $_POST['telefono_ta'];
$usuario_taq = $_POST['usuario_taq'];
$contrasena_taq = $_POST['contrasena_taq'];
$us_tipo = $_POST['us_tipo'];

function validarNombre($nombre_taq) {
    $patron = "/^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+$/"; // Regular expression for names
    return preg_match($patron, $nombre_taq);
  }
  
  function validarApellido($apellido_taq) {
    $patron = "/^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+$/"; // Regular expression for names (can be reused)
    return preg_match($patron, $apellido_taq);
  }
  
  function validarTelefono($telefono_ta) {
    $patron = "/^\d{7,15}$/"; // Regular expression for phone numbers
    return preg_match($patron, $telefono_ta);
  }
  
  function validarCorreoCompleto($correo_electronico_taq) {
    // Regular expression for basic email structure (improved for RFC compliance)
    $emailPattern = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
  
    // Validate basic structure first
    if (!preg_match($emailPattern, $correo_electronico_taq)) {
      return false;  // Not a valid email structure
    }
  
    // Extract domain name for further validation
    $domain = strtolower(substr(strstr($correo_electronico_taq, '@'), 1));  // Extract domain after "@"
  
    // Array of allowed domain providers (case-insensitive)
    $allowedDomains = array('gmail.com', 'hotmail.com', 'outlook.com');
  
    // Check if domain is among allowed providers
    return in_array($domain, $allowedDomains, true);
  }
  
  
  function validarUsuario($usuario_taq) {
    $patron = "/^[a-zA-Z0-9_]+$/"; // Regular expression for usernames
    return preg_match($patron, $usuario_taq);
  }
  
  function validarContrasena($contrasena_taq) {
    // La contraseña debe tener al menos 8 caracteres
    return strlen($contrasena_taq) >= 8;
}


// Validaciones
$errores = [];

if (!validarNombre($nombre_taq)) {
    $errores[] = "El nombre no es válido. Debe contener solo letras y espacios.";
}

if (!validarApellido($apellido_taq)) {
    $errores[] = "El apellido no es válido. Debe contener solo letras y espacios.";
}

if (!validarTelefono($telefono_ta)) {
    $errores[] = "El número de teléfono no es válido. Debe contener entre 7 y 15 dígitos.";
}

if (!validarCorreoCompleto($correo_electronico_taq)) {
    $errores[] = "El correo electrónico no es válido.";
}

if (!validarUsuario($usuario_taq)) {
    $errores[] = "El nombre de usuario no es válido. Debe contener solo letras, números y guiones bajos.";
}

if (!validarContrasena($contrasena_taq)) {
    $errores[] = "La contraseña no es válida. Debe tener al menos 8 caracteres, incluir una letra minúscula, una letra mayúscula, un número y un símbolo especial.";
}

// Verifica si hay errores
if (count($errores) > 0) {
    // Muestra los errores al usuario
    echo '<script>';
    foreach ($errores as $error) {
        echo "alert('$error');";
    }
    echo 'window.location = "../visual/login.php";</script>';
    exit();
}else{
    $sql = "INSERT INTO taquillero_geren(nombre_taq, apellido_taq, correo_electronico_taq, telefono_ta, usuario_taq, contrasena_taq, us_tipo)
    VALUES ('$nombre_taq', '$apellido_taq', '$correo_electronico_taq', '$telefono_ta', '$usuario_taq' , '$contrasena_taq' , '$us_tipo')";
  
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('ssssiis', $nombre_taq, $apellido_taq, $correo_electronico_taq, $telefono_ta, $usuario_taq, $contrasena_taq, $us_tipo);

  $ejecutar = $stmt->execute();
  // Ejecuta la consulta de inserción

if ($ejecutar) {
    echo '<script>alert("Administrador almacenado exitosamente"); window.location = "../visual/login.php";</script>';
} else {
    echo '<script>alert("Inténtalo de nuevo, Administrador no almacenado"); window.location = "../visual/login.php";</script>';
}

// Verifica que el correo no se repita
$sql_correo = "SELECT * FROM taquillero_geren WHERE correo_electronico_taq = :correo_electronico_taq";
$stmt_correo = $mysqli->prepare($sql_correo);
$stmt_correo->bind_param('s', $correo_electronico_taq);
$stmt_correo->execute();

if ($stmt_correo->rowCount() > 0) {
    echo '<script>alert("Este correo ya está registrado, intenta con otro diferente"); window.location = "../visual/login.php";</script>';
    exit();
}

// Cierra la conexión a la base de datos
$mysqli->close();
}


?>

