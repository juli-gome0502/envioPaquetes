<<?php
require_once("./conexion_be.php");
$conexion = new Conexion();
$nombre_us = $_POST['nombre_us'];
$apellido_us = $_POST['apellido_us'];
$n_Documento_us = $_POST['n_Documento_us'];
$tipo_documento = $_POST['tipo_documento'];
$Direccion = $_POST['Direccion'];
$telefono_us = $_POST['telefono'];
$correo_electronico_us = $_POST['correo_electronico_us'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

function validarNombre($nombre_us) {
    $patron = "/^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+$/"; // Regular expression for names
    return preg_match($patron, $nombre_us);
  }
  
  function validarApellido($apellido_us) {
    $patron = "/^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+$/"; // Regular expression for names (can be reused)
    return preg_match($patron, $apellido_us);
  }
  
  function validarDocumento($n_Documento_us, $tipo_documento) {
    if ($tipo_documento == "CC") {
      $patron = "/^\d{7,10}$/"; // Regular expression for CC documents
    } else if ($tipo_documento == "CE") {
      $patron = "/^\d{10}$/"; // Regular expression for CE documents
    } else {
      return false;
    }
    return preg_match($patron, $n_Documento_us);
  }
  
  function validarDireccion($direccion) {
    $patron = "/^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ\s,\.\-]+$/"; // Regular expression for addresses
    return preg_match($patron, $direccion);
  }
  
  function validarTelefono($telefono) {
    $patron = "/^\d{7,15}$/"; // Regular expression for phone numbers
    return preg_match($patron, $telefono);
  }
  
  function validarCorreo($correo_electronico_us) {
    $patron = "/^[a-zA-Z0-9\._\-+\]+@[a-zA-Z0-9\-.]+\.[a-zA-Z0-9\-]+$/"; // Regular expression for emails
    return preg_match($patron, $correo_electronico_us);
  }
  
  function validarUsuario($usuario) {
    $patron = "/^[a-zA-Z0-9_]+$/"; // Regular expression for usernames
    return preg_match($patron, $usuario);
  }
  
  function validarContraseña($contrasena) {
    $patron = "/^(?=.*\.\*)(?=.*[A-Z])(?=.*\d)(?=.*[@#%\-_])\w{8,}$/"; // Regular expression for passwords
    return preg_match($patron, $contrasena);
  }
  

// Validaciones
$errores = [];

if (!validarNombre($nombre_us)) {
    $errores[] = "El nombre no es válido. Debe contener solo letras y espacios.";
}

if (!validarApellido($apellido_us)) {
    $errores[] = "El apellido no es válido. Debe contener solo letras y espacios.";
}

if (!validarDocumento($n_Documento_us, $tipo_documento)) {
    $errores[] = "El número de documento no es válido para el tipo de documento seleccionado.";
}

if (!validarDireccion($Direccion)) {
    $errores[] = "La dirección no es válida. Debe contener solo letras, números, espacios, comas, guiones y puntos.";
}

if (!validarTelefono($telefono_us)) {
    $errores[] = "El número de teléfono no es válido. Debe contener entre 7 y 15 dígitos.";
}

if (!validarCorreo($correo_electronico_us)) {
    $errores[] = "El correo electrónico no es válido.";
}

if (!validarUsuario($usuario)) {
    $errores[] = "El nombre de usuario no es válido. Debe contener solo letras, números y guiones bajos.";
}

if (!validarContraseña($contrasena)) {
    $errores[] = "La contraseña no es válida. Debe tener al menos 8 caracteres, incluir una letra minúscula, una letra mayúscula, un número y un símbolo especial.";
}

// Verifica si hay errores
if (count($errores) > 0) {
    // Muestra los errores al usuario
    echo '<script>';
    foreach ($errores as $error) {
        echo "alert('$error');";
    }
    echo 'window.location = "../index.php";</script>';
    exit();
}else{
    $sql = "INSERT INTO usuario (nombre_us, apellido_us, n_Documento_us, tipo_documento, telefono, Direccion, correo_electronico_us, usuario, contrasena)
        VALUES (:nombre_us, :apellido_us, :n_Documento_us, :tipo_documento, :telefono, :Direccion, :correo_electronico_us, :usuario, :contrasena)";
$stmt = $conexion->pdo->prepare($sql);
$stmt->bindParam(':nombre_us', $nombre_us);
$stmt->bindParam(':apellido_us', $apellido_us);
$stmt->bindParam(':n_Documento_us', $n_Documento_us);
$stmt->bindParam(':tipo_documento', $tipo_documento);
$stmt->bindParam(':telefono', $telefono_us);
$stmt->bindParam(':Direccion', $Direccion);
$stmt->bindParam(':correo_electronico_us', $correo_electronico_us);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':contrasena', $contrasena);

$ejecutar = $stmt->execute(); // Ejecuta la consulta de inserción

if ($ejecutar) {
    echo '<script>alert("Usuario almacenado exitosamente"); window.location = "../index.php";</script>';
} else {
    echo '<script>alert("Inténtalo de nuevo, usuario no almacenado"); window.location = "../index.php";</script>';
}

// Verifica que el correo no se repita
$sql_correo = "SELECT * FROM usuario WHERE correo_electronico_us = :correo_electronico_us";
$stmt_correo = $conexion->pdo->prepare($sql_correo);
$stmt_correo->bindParam(':correo_electronico_us', $correo_electronico_us);
$stmt_correo->execute();

if ($stmt_correo->rowCount() > 0) {
    echo '<script>alert("Este correo ya está registrado, intenta con otro diferente"); window.location = "../index.php";</script>';
    exit();
}

// Cierra la conexión a la base de datos
$conexion = null;
}


?>

   
  
