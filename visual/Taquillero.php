<?php
session_start();
if($_SESSION['us_tipo']==1){

?>
<?php


$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

if ($conexion->connect_error) {
  die("Connection failed: " . $conexion->connect_error);
}

$sqltaquillero = "SELECT id_taquillero, nombre_taq, apellido_taq, correo_electronico_taq, telefono_ta, usuario_taq, contrasena_taq, tu.nombre_usuario, et.estado_taquillero
FROM taquillero_geren tg
INNER JOIN tipo_usuario tu ON tg.us_tipo = tu.id_tipo_usuario
INNER JOIN estado_taquillero et ON tg.id_estado_taquillero = et.id_estado_taquillero";

$taquillero = $conexion->query($sqltaquillero);

if (!$taquillero) {
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
            
        </style>  
        <center><h2 class="text-center"><b>INFORMACIÓN TAQUILLERO</b></h2></center>
        <div class="form-group mr-3">
            <br><br>
            <center>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input class="buscar"type="text" id="nombre_taq" name="nombre_taq" placeholder="Buscar por nombre" required>
                    <button class="btnBuscar" type="submit"><b>Buscar</b></button>
                </form>
            </center>
      </div>
    
      
        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#NuevoTaquilleroModal"><i class="fa-solid fa-circle-plus"></i> <b>Nuevo Taquillero</b></a>
            </div>
        </div>
        <br>
        <table id="mitabla" class="table text-center table-sm mx-auto  table-hover mt-4">
            <thead class="">
                <tr>
                    <th >#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo Electronico</th>
                    <th>Teléfono</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Tipo Usuario</th>
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

                 // Search by nombre_taq if it's set in POST data
                 if (isset($_POST['nombre_taq']) && !empty($_POST['nombre_taq'])) {
                    $sqlTaquillero = "SELECT id_taquillero, nombre_taq, apellido_taq, correo_electronico_taq, telefono_ta, usuario_taq, contrasena_taq, tu.nombre_usuario, et.estado_taquillero
                                        FROM taquillero_geren tg
                                        INNER JOIN tipo_usuario tu ON tg.us_tipo = tu.id_tipo_usuario
                                        INNER JOIN estado_taquillero et ON tg.id_estado_taquillero = et.id_estado_taquillero
                                        WHERE nombre_taq LIKE '%" . $_POST['nombre_taq'] . "%'";
                } else {
                    $sqlTaquillero = "SELECT id_taquillero, nombre_taq, apellido_taq, correo_electronico_taq, telefono_ta, usuario_taq, contrasena_taq, tu.nombre_usuario, et.estado_taquillero
                                        FROM taquillero_geren tg
                                        INNER JOIN tipo_usuario tu ON tg.us_tipo = tu.id_tipo_usuario
                                        INNER JOIN estado_taquillero et ON tg.id_estado_taquillero = et.id_estado_taquillero";
                }

                        // Pagination variables (adjust as needed)
                    $records_per_page = 8; // Number of records per page
                    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get current page from URL or set to 1

                    $stmt = $conexion->prepare($sqlTaquillero);
                    $stmt->execute();
                    $total_records = $stmt->rowCount(); // Get total number of records

                    $total_pages = ceil($total_records / $records_per_page); // Calculate total pages

                    // Limit query based on current page
                    $offset = ($current_page - 1) * $records_per_page;
                    $sqlTaquillero .= " LIMIT $offset, $records_per_page";
                    $taquilleroResult = $conexion->query($sqlTaquillero);

                // Check if there are any results
                if ($taquilleroResult->rowCount() > 0) {
                    while ($fila = $taquilleroResult->fetch(PDO::FETCH_ASSOC)) :
                ?>
                <tr>
                    <td><?php echo $fila['id_taquillero']; ?></td>
                    <td><?php echo $fila['nombre_taq']; ?></td>
                    <td><?php echo $fila['apellido_taq']; ?></td>
                    <td><?php echo $fila['correo_electronico_taq']; ?></td>
                    <td><?php echo $fila['telefono_ta']; ?></td>
                    <td><?php echo $fila['usuario_taq']; ?></td>
                    <td><?php echo $fila['contrasena_taq']; ?></td>
                    <td><?php echo $fila['nombre_usuario']; ?></td>
                    <td><?php echo $fila['estado_taquillero']; ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#EditaTaquilleroModal<?php echo $fila['id_taquillero'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                     
                    <?php include "../modelo/EditarTaquillero.php"; ?>
                </tr>
                <?php
                    // End of the while loop
                    endwhile;
                    } else {
                        echo '<div class="container mt-5">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">¡Taquillero no encontrado!</h4>
                            <p>No se encontraron taquilleros con el nombre buscado.</p>
                            <hr>
                            <p class="mb-0">Por favor, intente con otro nombre o verifique la información ingresada.</p>
                        </div>
                    </div>';
                    }
                ?>
                

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
        
        <?php include "../modelo/NuevoTaquillero.php"; ?>
      
      


    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   
</body>
</html>
<?php
}
else{
    header('Location: ../visual/login.php');
}
?>