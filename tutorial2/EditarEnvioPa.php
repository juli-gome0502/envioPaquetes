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

if (isset($_GET['id_envio'])) {
    $id_envio = $_GET['id_envio'];

    $row = get_data($conexion, "SELECT id_envio, id_estado FROM envio WHERE id_envio = ?", 'i', $id_envio);
    $nombre_estado = get_data($conexion, "SELECT nombre_estado FROM estado WHERE id_estado = ?", 'i', $row['id_estado']);
} else {
    echo "ID de envío no válido";
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
    <!-- Otros enlaces CSS aquí -->

    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <h2 style="text-align:center">Modificar estado</h2>
    </div>

    <form class="form-horizontal" method="POST" action="./getUserDetails.php" autocomplete="off">
        <input type="hidden" name="id_envio" value="<?php echo $row['id_envio']; ?>">

        <div class="form-group">
            <label for="nombre_estado" class="col-sm-2 control-label">Estado</label>
            <select name="nombre_estado" id="nombre_estado" class="form-control">
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
</body>
</html>
