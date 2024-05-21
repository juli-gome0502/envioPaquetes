<?php
$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Validación de campos (puedes agregar más validaciones según tus requerimientos)
$id_usuario = validateText($_POST['id_usuario']);
$id_destinatario = validateText($_POST['id_destinatario']);
$direccion = validateText($_POST['direccion']);
$id_destino = validateSelect($_POST['id_destino'] ?? ''); // Use the null coalescing operator to handle undefined array key
$id_tipo_paquete = validateSelect($_POST['id_tipo_paquete']);
$id_tipo_peso = validateSelect($_POST['id_tipo_peso']);
$peso = validateNumeric($_POST['peso']);
$dimensiones = validateText($_POST['dimensiones']);
$volumen = validateNumeric($_POST['volumen']);
$pago = validateNumeric($_POST['pago']);
$fecha_ingreso = validateText($_POST['fecha_ingreso']);
$fecha_estimada = validateText($_POST['fecha_estimada']);
$id_vehiculo = validateSelect($_POST['id_vehiculo']);

// Resto del código para insertar en la base de datos
$sql = "INSERT INTO envio (
    id_envio, 
    id_usuario, 
    id_destinatario, 
    id_destino, 
    direccion, 
    id_tipo_paquete, 
    id_tipo_peso, 
    peso, 
    dimensiones, 
    volumen, 
    pago, 
    fecha_envio, 
    fecha_estimada, 
    id_vehiculo,
    id_estado
)
VALUES (
    NULL,
    '$id_usuario',
    '$id_destinatario',
    '$id_destino',
    '$direccion',
    '$id_tipo_paquete',
    '$id_tipo_peso',
    '$peso',
    '$dimensiones',
    '$volumen',
    '$pago',
    '$fecha_ingreso',
    '$fecha_estimada',
    '$id_vehiculo',
    '2'
)";

if ($conexion->query($sql)) {
    $id_envio = $conexion->insert_id;
    echo '<script>';
    echo "alert('La información se ha guardado correctamente. El ID de envío es: $id_envio');";
    echo 'window.location = "http://localhost/envioPaquetes/tutorial2/GuiadeEnvio.php";'; // Change the URL to your desired localhost page
    echo '</script>';
} else {
    echo '<script>';
    echo "alert('Error al guardar la información: " . $conexion->error . "');";
    echo 'window.location = "http://http://localhost/envioPaquetes/tutorial2/index.php";'; // Change the URL to your desired localhost page
    echo '</script>';
    exit;
}

$conexion->close();

// Función para validar campos de texto
function validateText($input) {
    // Elimina espacios en blanco al inicio y al final
    $input = trim($input);
    // Escapa caracteres especiales para evitar inyecciones SQL
    global $conexion;
    return $conexion->real_escape_string($input);
}

// Función para validar campos numéricos
function validateNumeric($input) {
    // Verifica si es un número válido
    if (!is_numeric($input)) {
        echo   '<script>alert("El campo debe ser numerico"); window.location = "./GuiadeEnvio.php";</script>';
        exit;
    }
    return $input;
}

// Función para validar campos select
function validateSelect($input) {
    // Verifica si se seleccionó una opción válida
    if (empty($input)) {
        echo   '<script>alert("Por favor, todos los Select deben esta llenos"); window.location = "./GuiadeEnvio.php";</script>';
        exit;
    }
    return $input;
}
?>
