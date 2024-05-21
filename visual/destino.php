<?php
include '../conexion/conexion.php';

try {
  $sqlDestino = " SELECT id_destino, nombre_destino FROM destino ";
  $destino = $conexion->query($sqlDestino);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}


// Now you can process the results in $destino (assuming it's a PDOStatement object)
// ...
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CRUD DESTINO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

</head>
<style>
    .btn-info{
        color: white;
    }
</style>
<header>
    <?php include '../menu/menu.php'; ?>
</header>
<body>
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
    <div class="conrainer col-8 mx-auto py-3">
        <br><br>
        <h2 class="text-center"><b>DESTINO</b></h2>
        <div class="form-group mr-3">
            <br>
            <center>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input class="buscar"type="text" id="nombre_destino" name="nombre_destino" placeholder="Buscar por Placas" required>
                    <button class="btnBuscar" type="submit">Buscar</button>
                </form>
            </center>
            <style>
                .regresar{
                    
                    color:black;
                }
            </style>
           <center>
           <a href="../visual/Destino.php" class="regresar">Regresar</a>
           </center>
      </div>
        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#NuevoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo Destino</a>
            </div>
        </div>
        <table class="table  mt-4">
            <thead class="">
                <tr>
                    <th >#</th>
                    <th>Nombre Destino</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
             <?php
              
              $host = 'localhost';
              $username = 'root';
              $password = ''; // Replace with your actual database password
              $database = 'bd_safe_delivery2';

              try {
                  $conexion = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              } catch(PDOException $e) {
                  echo "Error: " . $e->getMessage();
                  exit;
              }  
              if (isset($_POST['nombre_destino']) && !empty($_POST['nombre_destino'])) {
                $sqlDestino = "SELECT id_destino, nombre_destino FROM destino WHERE nombre_destino LIKE '%" . $_POST['nombre_destino'] . "%'";
            } else {
                $sqlDestino = "SELECT id_destino, nombre_destino FROM destino";
            }

                      // Pagination variables (adjust as needed)
                  $records_per_page = 8; // Number of records per page
                  $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get current page from URL or set to 1

                  $stmt = $conexion->prepare($sqlDestino);
                  $stmt->execute();
                  $total_records = $stmt->rowCount(); // Get total number of records

                  $total_pages = ceil($total_records / $records_per_page); // Calculate total pages

                  // Limit query based on current page
                  $offset = ($current_page - 1) * $records_per_page;
                  $sqlDestino .= " LIMIT $offset, $records_per_page";
                  $destino = $conexion->query($sqlDestino);      
              if ($destino) {
               
                while ($fila = $destino->fetch(PDO::FETCH_ASSOC)) :
                    ?>
                        <tr>
                            <td><?php echo $fila['id_destino']; ?></td>
                            <td>
                                <?php if (isset($fila['nombre_destino'])) {
                                    echo $fila['nombre_destino'];
                                } else {
                                    echo 'N/A'; // Or any default value you prefer
                                } ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#EditaModal<?php echo $fila['id_destino'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-sm btn-danger" 
                                data-bs-toggle="modal" data-bs-target="#EliminaModal<?php echo $fila['id_destino'];?>"><i class="fa-solid fa-trash"></i></a>
                                
                            </td>
                           
                            <?php include "../modelo/EditarModalDest.php"; ?>
                            <?php include "../modelo/EliminaModalDest.php"; ?>
                           
                            
                        </tr>
                   <?php endwhile; 
                   } else {
                    echo '<div class="container mt-5">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">¡Taquillero no encontrado!</h4>
                        <p>No se encontraron taquilleros con el nombre buscado.</p>
                        <hr>
                        <p class="mb-0">Por favor, intente con otro nombre o verifique la información ingresada.</p>
                    </div>
                </div>';
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
        <?php include "../modelo/NuevoModalDest.php"; ?>

    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   
</body>
</html>