<?php
// Archivo de conexión a la base de datos (cambia las credenciales según tu entorno)
$config = array(
  'db' => array(
  'host' => 'localhost', // Database host (usually 'localhost')
  'name' => 'bd_safe_delivery2', // Your database name
  'user' => 'root', // Your database username
  'pass' => '', // Your database password
  'options' => array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Set error handling mode
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Default fetch mode
  )
  )
);

try {
$dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
$conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

} catch(PDOException $error) {
$error = $error->getMessage();
}

?>