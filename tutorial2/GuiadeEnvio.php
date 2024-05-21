<?php
$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

$sql = "SELECT
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
INNER JOIN estado est ON e.id_estado = est.id_estado ";

$EnvioResult = mysqli_query($conexion, $sql);

if ($conexion->connect_error) {
  die("Connection failed: " . $conexion->connect_error);
}


$sqlEnvio = "SELECT
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
INNER JOIN estado est ON e.id_estado = est.id_estado ";



$envio = $conexion->query($sqlEnvio);

if (!$envio) {
  echo "Error: " . $conexion->error;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CRUD DESTINATARIO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="../css/datatables.min.css">
  <script> src="../js/datatables.min.js"</script>
  <script src="../js/jquery-3.7.1.min.js"></script>

</head>
<header>
    <?php include "../menu/menuTaq.php"; ?>

</header>
<body class="body1">
    <style>
        .buscar {
        width: 500px;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 12px;
        box-sizing: border-box;
        font-size: 1em;
        margin-top: -40px;
        }
        .buscar::placeholder {
        color: #aaa;
        }
        .buscar:focus {
        outline: none;
        border-color: skyblue;
        }
        
    </style>
    <div class="conrainer col-10 mx-auto py-3">
        <br><br><br>  
        <style>
            .btnBuscar{
                background-color: skyblue; 
                border-radius: 20px;
                color:white;
                border: none;
                width: 100px;
                height: 50px;
            }
            .btn-info{
                color: white;
            }
            .mostrar{
                background-color: skyblue; 
                border-radius: 20px;
                color:white;
                border: none;
                width: 100px;
                height: 50px;
            }
            #selc {
            width: 500px;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 12px;
            box-sizing: border-box;
            font-size: 1em;
            margin-top: -40px;
            }
            #selc::placeholder {
            color: #aaa;
            }
            #selc:focus {
            outline: none;
            border-color: skyblue;
        }
        .btncrear{
            background-color: skyblue; 
            border-radius: 20px;
            color:white;
            border: none;
            width: 100px;
            height: 50px;
            
        }
        
        </style>  
        <center><h2 class="text-center"><b>INFORMACIÓN GUÍA ENVIO</b></h2></center>
        <br>
<center>
<form method="post">
    <label for="cat">N° Documento</label>
    <select id="selc" name="cat" class="custom-select my-1 mr-sm-2" required>
        <option value="">Seleccionar</option>
        <?php foreach ($envio as $n_documeto_us): ?>
            <option value="<?php echo $n_documeto_us['id_usuario']; ?>"><?php echo $n_documeto_us['n_documento_us']; ?></option>
        <?php endforeach ?>
    </select>
    <button type="submit" name="mostrar" class="btn mostrar"><b>Mostrar</b></button>
</form>

</center>
<?php

if (isset($_POST['mostrar'])) {
    $documentoseleccionada = $_POST["cat"];

    // Consulta SQL modificada para filtrar por el número de documento seleccionado

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

    WHERE u.id_usuario = $documentoseleccionada";

    $EnvioResult = mysqli_query($conexion, $sqldocumento);

    if (!$EnvioResult){
        echo "error al ejecuta:   " . mysqli_error($conexion);
        exit(); 
    }

    // Resto de tu código aquí...
}
?>
<style>
     .btncrear a{
            margin-top:-150px;
            margin-bottom:-150px;
            text-decoration: none;
            text-decoration-line: none;
            color:white;

        
        }
        .table{
            margin-top:-100px;
        }
         
</style>

        <div class="row justify-content-end">
            <div class="col-auto">
                <button type="button" class="btncrear"><a href="./index.php"><b>Crear</b></a></button>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-12">
            <br>
            <table id="mitabla" class="table text-center table-sm mx-auto table-hover mt-4">
                 <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>destino</th>
                        <th>fecha inicio</th>
                        <th>fecha fin</th>
                        <th>pago</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $error = false;
                                    // Replace with your actual database configuration details
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

                        // Pagination variables (ajústalas según sea necesario)
                        $records_per_page = 8; // Número de registros por página
                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Obtener la página actual desde la URL o establecerla en 1

                        $stmt = $conexion->prepare($sqlEnvio);
                        $stmt->execute();
                        $total_records = $stmt->rowCount(); // Obtener el número total de registros

                        $total_pages = ceil($total_records / $records_per_page); // Calcular el total de páginas

                        // Limitar la consulta según la página actual
                        $offset = ($current_page - 1) * $records_per_page;
                        $sqlEnvio .= " LIMIT $offset, $records_per_page";
                        $envio = $conexion->query($sqlEnvio);
                        $id_envio_array = array();

                    // Check if there are any results   
                        foreach ($EnvioResult as $fila){
                            $id_envio_array[] = $fila['id_envio'];
                    ?>
                    <tr>
                        <td><?php echo $fila['id_envio']; ?></td>
                        <td><?php echo $fila['nombre_us']; ?></td>
                        <td><?php echo $fila['apellido_us']; ?></td>
                        <td><?php echo $fila['n_documento_us']; ?></td>
                        <td><?php echo $fila['nombre_destinatario']; ?></td>
                        <td><?php echo $fila['apellido_destinatario']; ?></td>
                        <td><?php echo $fila['telefono_des']; ?></td>
                        <td><?php echo $fila['nombre_destino']; ?></td>
                        <td><?php echo $fila['fecha_envio']; ?></td>
                        <td><?php echo $fila['fecha_estimada']; ?></td>
                        
                        <td><?php echo $fila['pago']; ?></td>
                        <td><?php echo $fila['nombre_estado']; ?></td>
                        <td>
                        <button type="button" class="btn btn-primary"><a class="link" href="../diseño/guiaPdf.php?idCat=<?php echo $fila['id_envio'];?>" target="_blank" onclick="printDocument(event, this.href);"><i class="fa-solid fa-print" style="color: #ffffff;"></i></i></a><br />
                        </button>               
                        <a  class="btn btn-sm btn-warning" href="./EditarEnvioPa.php?id_envio=<?php echo $fila['id_envio'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
    
                        </td>
                        

                    </tr>

                    <?php
                }
                    ?>
                    

                </tbody>
                
            </table>
        
        </div>
    </div>

<script>
function printDocument(event, url) {
    event.preventDefault();
    var printWindow = window.open(url, '_blank');
    printWindow.onload = function() {
        printWindow.print();
    };

}


</script>
      
        <style>
            .navPag{
                display: flex;
                justify-content: center;
            }
        </style>
         <div class="navPag">
            <!-- Paginación de Bootstrap -->
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm">
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                    ?>
                </ul>
            </nav>
         </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
       
      
      
    </div>

  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   
</body>
</html>
