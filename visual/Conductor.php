<?php
$error = false;
$config = include '../conexion/config.php';

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

} catch(PDOException $error) {
  $error = $error->getMessage();
}

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Get the current page from URL or set to 1
$per_page = 5; // Number of records per page

// Calculate record offset based on current page
$offset = ($page - 1) * $per_page;

if (isset($_POST['nombre_con']) && !empty($_POST['nombre_con'])) {
  $consultaSQL = "SELECT COUNT(*) as total_records  -- Count total records for pagination
                  FROM conductor c
                  INNER JOIN vehiculo v ON c.id_vehiculo = v.id_vehiculo
                  INNER JOIN tipo_vehiculo tv ON c.id_tipo_vehiculo = tv.id_tipo_vehiculo
                  
                  WHERE c.nombre_con LIKE '%" . $_POST['nombre_con'] . "%'";
  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();
  $total_records = $sentencia->fetchColumn(); // Get total number of records

  $consultaSQL = "SELECT c.id_conductor,
                  c.nombre_con,
                  c.apellido_conduc,
                  c.n_documento_con,
                  v.placas,
                  tv.nombre_tipo_vehiculo
                  FROM conductor c
                  INNER JOIN vehiculo v ON c.id_vehiculo = v.id_vehiculo
                  INNER JOIN tipo_vehiculo tv ON c.id_tipo_vehiculo = tv.id_tipo_vehiculo
                  
                  WHERE c.nombre_con LIKE '%" . $_POST['nombre_con'] . "%'
                  LIMIT $per_page OFFSET $offset"; // Limit results and apply offset

} else {
  $consultaSQL = "SELECT COUNT(*) as total_records  -- Count total records for pagination
                  FROM conductor c
                  INNER JOIN vehiculo v ON c.id_vehiculo = v.id_vehiculo
                  INNER JOIN tipo_vehiculo tv ON c.id_tipo_vehiculo = tv.id_tipo_vehiculo";
  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();
  $total_records = $sentencia->fetchColumn(); // Get total number of records

  $consultaSQL = "SELECT c.id_conductor,
                  c.nombre_con,
                  c.apellido_conduc,
                  c.n_documento_con,
                  v.placas,
                  tv.nombre_tipo_vehiculo
                  FROM conductor c
                  INNER JOIN vehiculo v ON c.id_vehiculo = v.id_vehiculo
                  INNER JOIN tipo_vehiculo tv ON c.id_tipo_vehiculo = tv.id_tipo_vehiculo
                  LIMIT $per_page OFFSET $offset"; // Limit results and apply offset
}

$sentencia = $conexion->prepare($consultaSQL);
$sentencia->execute();
$Conductor = $sentencia->fetchAll();

// Calculate total number of pages
$total_pages = ceil($total_records / $per_page);

// Resto del código para mostrar los resultados en la tabla HTML...


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CRUD CONDUCTOR</title>
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
    <?php include '../menu/menu.php'; ?>
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
        border-color: #0000FF;
        }
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
        
    </style>
    <div class="conrainer col-10 mx-auto py-3">
        <br><br><br>
        <h2 class="text-center"><b>INFORMACIÓN CONDUCTOR</b></h2>
         
        <div class="form-group mr-3">
            <br>
            <center>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input class="buscar"type="text" id="nombre_con" name="nombre_con" placeholder="Buscar por nombre" required>
                    <button class="btnBuscar" type="submit">Buscar</button>
                </form>
                
                
            </center>
            <style>
                .regresar{
                    
                    color:black;
                }
            </style>
           <center>
           <a href="../visual/Conductor.php" class="regresar">Regresar</a>
           </center>
      </div>
    
      
        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#NuevoConductorModal"><i class="fa-solid fa-circle-plus"></i> Nuevo Conductor</a>
            </div>
        </div>
        <br>
        <table id="mitabla" class="table   text-center table-sm mx-auto  table-hover mt-4">
            <thead class="">
                <tr>
                    <th >#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>N° Documento</th>
                    <th>Tipo Vehiculo</th>
                    <th>Placas</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            <?php
        foreach ($Conductor as $fila) {
          // Verificar si la clave existe en el array antes de acceder a ella
          $nombre_tipo_vehiculo = isset($fila["nombre_tipo_vehiculo"]) ? $fila["nombre_tipo_vehiculo"] : "";
          $placas = isset($fila["placas"]) ? $fila["placas"] : "";
          
      
          // Ahora puedes imprimir estos valores en las celdas correspondientes de la tabla
          ?>
          <tr>
              <td><?php echo ($fila["id_conductor"]); ?></td>
              <td><?php echo ($fila["nombre_con"]); ?></td>
              <td><?php echo ($fila["apellido_conduc"]); ?></td>
              <td><?php echo ($fila["n_documento_con"]); ?></td>
              <td><?php echo ($nombre_tipo_vehiculo); ?></td> <!-- Utiliza la variable $grado aquí -->
              <td><?php echo ($placas); ?></td> <!-- Utiliza la variable $barrio aquí -->
              <td>
                  <a class="btn btn-sm btn-warning" href="<?= '../menu/EditarConductores.php?id_conductor=' . ($fila["id_conductor"]) ?>"><i class="fa-solid fa-pen-to-square"></i></a>
              </td>
          </tr>
          <?php
      }?>
            </tbody>
        </table>
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
    
        <?php include "../modelo/NuevoConductor.php"; ?>
        
                    
                


    </div>
   



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   
</body>
</html>