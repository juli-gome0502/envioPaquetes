<?php
class Conexion {
  private $servidor = "localhost";
  private $db = "bd_safe_delivery2";
  private $puerto = 3306;
  private $charset = "utf8";
  private $usuario = "root";
  private $contrasena = ""; // Replace with a secure way to store password
  public $pdo = null;

  function __construct() {
    try {
      $this->pdo = new PDO("mysql:dbname={$this->db};host={$this->servidor};port={$this->puerto};charset={$this->charset}", $this->usuario, $this->contrasena);
    } catch (PDOException $e) {
      // Handle connection errors here
      echo "Error de conexión: " . $e->getMessage();
      exit; // Terminate script on connection error
    }
  }
  public function query($sql) {
    try {
      return $this->pdo->query($sql);
    } catch (PDOException $e) {
      // Handle errors here
      echo "Error executing query: " . $e->getMessage();
      exit;
    }
  }
}



// Create a global instance of the Conexion class
$conexion = new Conexion();

?>