<?php
$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$id_usuario = $_POST['id_usuario'];
$id_destinatario = $_POST['id_destinatario'];
$direccion = $_POST['direccion'];
$id_destino = $_POST['id_destino'];
$id_tipo_paquete = $_POST['id_tipo_paquete'];
$id_tipo_peso = $_POST['id_tipo_peso'];
$peso = $_POST['peso'];
$dimensiones = $_POST['dimensiones'];
$volumen = $_POST['volumen'];
$pago = $_POST['pago'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$fecha_estimada = $_POST['fecha_estimada'];
$id_vehiculo = $_POST['id_vehiculo'];

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
    id_vehiculo
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
    '$id_vehiculo'
)";

if ($conexion->query($sql)) {
    $id_envio = $conexion->insert_id;
    echo "La información se ha guardado correctamente. El ID de envío es: $id_envio";
} else {
    echo "Error al guardar la información: " . $conexion->error;
}

$conexion->close();
?>


