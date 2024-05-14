<html>
<link rel="stylesheet" href="css/facturaM.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="shortcut icon" href="img/logo ggm.png" type="image/x-icon">
<style>
/* Estilos para el formulario */
body {
    font-family: Arial, sans-serif;
    padding-top: 100px;
    padding-left: 550px;
    
}


h2 {
    text-align: center;
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
    width: 471px;
}
#placas{
    width: 471px;
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
    background-color: black;
    width: 500px;
    margin: 0 auto; /* Centra el div .row horizontalmente */
}



.btn-info{
    color: white;
}
</style>
  
</html>


<?php
 $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
 if ($conexion->connect_error) {
   die("Connection failed: " . $conexion->connect_error);
 }

function get_data($mysqli, $sql, $params, ...$values) {
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param($params, ...$values);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

if (isset($_GET['id_conductor'])) {
    $id_conductor = $_GET['id_conductor'];

    $row = get_data($conexion, "SELECT id_conductor, nombre_con, apellido_conduc, n_documento_con, id_tipo_vehiculo, id_vehiculo FROM conductor WHERE id_conductor =?", 'i', $id_conductor);
    $nombre_tipo_vehiculo = get_data($conexion, "SELECT nombre_tipo_vehiculo FROM tipo_vehiculo WHERE id_tipo_vehiculo =?", 'i', $row['id_tipo_vehiculo']);
    $placas = get_data($conexion, "SELECT placas FROM vehiculo WHERE id_vehiculo =?", 'i', $row['id_vehiculo']);
   
}  else {
    echo "ID de estudiante no válido";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <link href="css/bootstrap-theme.css" rel="stylesheet">
   
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="caja">
        <div class="row">
            <h2 style="text-align:center">Modificar Conductores</h2>
        </div>
        
        <form class="form-horizontal" method="POST" action="../controlador/getConductor.php" autocomplete="off">
            
        <input type="hidden" name="id_conductor"  value="<?php echo $row['id_conductor']; ?>">

            <div class="form-group">
                <label for="nombre_con" class="col-sm-2 control-label">Nombres</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre_con" name="nombre_con" placeholder="Nombres" value="<?php echo $row['nombre_con']; ?>" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="apellido_conduc" class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="apellido_conduc" name="apellido_conduc" placeholder="Apellidos" value="<?php echo $row['apellido_conduc']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="n_documento_con" class="col-sm-2 control-label">Documento</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="n_documento_con" name="n_documento_con" placeholder="n_documento_con" value="<?php echo $row['n_documento_con']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre_tipo_vehiculo" class="col-sm-2 control-label">Grado</label>
                <br>
                <select  name="nombre_tipo_vehiculo" id="nombre_tipo_vehiculo">
              <?php
               
                $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
                if ($conexion->connect_error) {
                  die("Connection failed: " . $conexion->connect_error);
                }
                $sql = $conexion->query("SELECT id_tipo_vehiculo,nombre_tipo_vehiculo FROM tipo_vehiculo");
                while ($resultado = $sql->fetch_assoc()) {
                  echo "<option value='".$resultado['id_tipo_vehiculo']."'>".$resultado
                  ['nombre_tipo_vehiculo']."</option>";
                }
              ?>
                </select>
            </div>
            
            
            <div class="form-group">
                <label for="placas" class="col-sm-2 control-label">Barrio</label>
                <br>
                <select  name="placas" id="placas">
              <?php
               
                $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
                if ($conexion->connect_error) {
                  die("Connection failed: " . $conexion->connect_error);
                }
                $sql = $conexion->query("SELECT id_vehiculo,placas FROM vehiculo");
                while ($resultado = $sql->fetch_assoc()) {
                  echo "<option value='".$resultado['id_vehiculo']."'>".$resultado
                  ['placas']."</option>";
                }
              ?>
                </select>
            </div>
            
            <br><br>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <center><a href="estudiantes.php" class="btn btn-info">Regresar</a>
                    <button type="submit" class="btn btn-info">Guardar</button></center>
                    
                </div>
            </div>
        </form>
    </div>
</body>
</html>
          