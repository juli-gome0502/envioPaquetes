<?php
include "db.php";
$nombre_ = $_POST['nombre_us'];

$sql = "SELECT id_usuario, nombre_us, apellido_us, tipo_documento  FROM usuario WHERE id_usuario='$nombre_'";

$result = mysqli_query($conexion, $sql);

$cadena = "";

$ver = mysqli_fetch_assoc($result);
    if (!is_null($ver)){

    $cadena = "<label>REMITENTE</label> 
			<input class='form-control' required id='nombre_' name='nombre_us' value='". $ver['nombre_us']."'>";
     $cadena = $cadena . " 
			    <input class='form-control' required id='nombre_' name='apellido_us' value='". $ver['apellido_us']."'>";
   
    /* SELECT TIPO */
   /* $sqlPaquete = "SELECT id_tipo_paquete, nombre_tipo_paquete FROM tipo_paquete";
    $resultPaquete = mysqli_query($conexion, $sqlPaquete);
    $lista = "<label>Codigo de Barra</label> 
        <select class='form-control' required id='nombre_' name='id_tipo_paquete'>";

    while ($verPaquete = mysqli_fetch_assoc($resultPaquete)){
        $lista = $lista . "<option value='". $verPaquete['id_tipo_paquete']."'>". $verPaquete['nombre_tipo_paquete']."</option>";
    } 
    $lista = $lista . "</select>";
    $cadena = $cadena . $lista;
    }  */
    }

echo  $cadena;

?>
