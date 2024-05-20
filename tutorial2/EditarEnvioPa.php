<html>
<link rel="stylesheet" href="css/facturaM.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="shortcut icon" href="img/logo ggm.png" type="image/x-icon">
<style>
/* Estilos para el formulario */
body {
    font-family: Arial, sans-serif;
    padding-top: 50px;
    padding-left: 550px;
    
}


h2 {
    text-align: center;
    margin-left:-50px;
}

form {
    margin-top: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
select,
textarea {
    width: 57%; /* Ancho del 100% para que ocupen todo el contenedor */
    padding: 8px;
    border: 1px solid skyblue;
    border-radius: 5px;
    box-sizing: border-box;
    margin-top: 5px;
    
}
#nombre_tipo_vehiculo{
    width: 390px;
}
#placas{
    width: 390px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

input[type="text"]:focus,
input[type="date"]:focus,
select:focus {
    outline: none;
    border-color: blue;
}

input[type="file"] {
    margin-top: 5px;
}

.row {

    width: 500px;
    margin: 0 auto; /* Centra el div .row horizontalmente */
}



.btns{
    color: white;
    margin-left:-170px;
}
</style>
  
</html>

<?php

$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

$ID = $_GET['id_envio'];

$sqldocumento = "SELECT
e.id_envio,
e.id_usuario,
u.nombre_us,
u.apellido_us,
u.n_documento_us,
e.id_destinatario,
d.nombre_destinatario,
d.apellido_destinatario,
d.telefono_des,
e.direccion,
e.id_destino,
ds.nombre_destino,
e.fecha_envio,
e.fecha_estimada,
tp.id_tipo_paquete,
ps.id_tipo_peso,
v.id_vehiculo,
e.peso,
e.dimensiones,
e.volumen,
e.pago,
e.id_estado,
est.nombre_estado
FROM envio e
JOIN usuario u ON e.id_usuario = u.id_usuario
JOIN destinatario d ON e.id_destinatario = d.id_destinatario
INNER JOIN destino ds ON e.id_destino = ds.id_destino
INNER JOIN tipo_paquete tp ON e.id_tipo_paquete = tp.id_tipo_paquete
INNER JOIN tipo_peso ps ON e.id_tipo_peso = ps.id_tipo_peso
INNER JOIN vehiculo v ON e.id_vehiculo = v.id_vehiculo
INNER JOIN estado est ON e.id_estado = est.id_estado 
WHERE e.id_envio = '$ID'";


$EnvioResult=mysqli_query($conexion, $sqldocumento);

foreach ($EnvioResult as $fila) {

    ?>
<tr>
        <td><?php $fila['id_envio']; ?></td>
        <td><?php  $fila['nombre_us']; ?></td>
        <td><?php  $fila['apellido_us']; ?></td>
        <td><?php  $fila['n_documento_us']; ?></td>
        <td><?php  $fila['nombre_destinatario']; ?></td>
        <td><?php  $fila['apellido_destinatario']; ?></td>
        <td><?php $fila['telefono_des']; ?></td>
        <td><?php  $fila['nombre_destino']; ?></td>
        <td><?php  $fila['fecha_envio']; ?></td>
        <td><?php $fila['fecha_estimada']; ?></td>
        <td><?php $fila['pago']; ?></td>

<?php

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Otros enlaces CSS aquí -->

    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <h2 style="text-align:center">Modificar estado</h2>
    </div>

    <form class="form-horizontal" method="POST" action="./getUserDetails.php" autocomplete="off">
      <input type="hidden" name="id_envio" value="<?php echo $fila['id_envio']; ?>">
      <label for="">N° Guia de envío</label>
      <input type="text" class="form-control n1" disabled value="<?php echo $fila['id_envio']; ?>">
      <br>
      <label for="">Fecha Creada</label>
      <input type="text" class="form-control n2" disabled value="<?php echo $fila['fecha_envio']; ?>">
      <br>
      <label for="">Fecha Estimada</label>
      <input type="text" class="form-control n3" disabled value="<?php echo $fila['fecha_estimada']; ?>"><br>
      <label for="">Nombre</label>
      <input type="text" class="form-control in1" disabled value="<?php echo $fila['nombre_us']; ?>">

      <div class="form-group">
        <label for="apellido_us" class="col-sm-2 control-label">Apellido</label>
        <input type="text" name="apellido_us" id="apellido_us" class="form-control" value="<?php echo $fila['apellido_us'];?>" required>
      </div>
      <div class="form-group">
        <label for="n_documento_us" class="col-sm-2 control-label">Número de Documento</label>
        <input type="text" name="n_documento_us" id="n_documento_us" class="form-control" value="<?php echo $fila['n_documento_us']; ?>" required>
      </div>
      

      <div class="form-group">
        <label for="nombre_estado" class="col-sm-2 control-label">Estado</label>
        <select name="nombre_estado" id="nombre_estado" class="form-control">
          <option value="0">>-------Seleecione el estado--------<</option>
            <?php
            $sql = $conexion->query("SELECT id_estado, nombre_estado FROM estado");
            while ($resultado = $sql->fetch_assoc()) {
                echo "<option value='" . $resultado['id_estado'] . "'>" . $resultado['nombre_estado'] . "</option>";
            }
            ?>
        </select>
        </div>
            
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <center>
                    <a href="./GuiadeEnvio.php" class="btn btn-info">Regresar</a>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </center>
            </div>
        </div>
    </form>
          
</div>
<?php
}
?>
</body>
</html>
              