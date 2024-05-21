<?php
include '../conexion/conexion.php';


try {
    $sqlDestinatario = "SELECT id_destinatario, nombre_destinatario, apellido_destinatario, telefono_des FROM destinatario ";
    $result = $conexion->query($sqlDestinatario);
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
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

</head>
<header>
    <?php include '../menu/menuTaq.php'; ?>
</header>
<body>

    <div class="conrainer col-10 mx-auto py-3">

        
        <div class="conrainer col-10 mx-auto py-3">
        <br> 
        <center><h2 class="text-center"><b>INFORMACIÓN DESTINATARIO</b></h2></center>
         
       <style>
        .btnBuscar{
            background-color: skyblue; 
            border-radius: 20px;
            color:white;
            border: none;
            width: 100px;
            height: 50px;
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
        
       </style>
       <br>
        
        <center>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input class="buscar" type="text" id="telefono_des" name="telefono_des" placeholder="Buscar por teléfono" required>
        <button class="btnBuscar" type="submit"><b>Buscar</b></button>
         </form>
        </center>

            <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#NuevoDestiModal"><i class="fa-solid fa-circle-plus"></i> Nuevo Destinatario</a>
            </div>
        </div>
        
        <table class="table table-lg mx-auto  table-hover mt-4">
            <thead class="table">
                <tr>
                    <th >#</th>
                    <th>Nombre Destinatario</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
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
                if (isset($_POST['telefono_des']) && !empty($_POST['telefono_des'])) {
                    $sqlDestinatario = "SELECT id_destinatario, nombre_destinatario, apellido_destinatario, telefono_des FROM destinatario 
                                        WHERE telefono_des LIKE '%" . $_POST['telefono_des'] . "%'";
                } else {
                    $sqlDestinatario = "SELECT id_destinatario, nombre_destinatario, apellido_destinatario, telefono_des FROM destinatario ";
                }

                        // Pagination variables (adjust as needed)
                    $records_per_page = 8; // Number of records per page
                    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get current page from URL or set to 1

                    $stmt = $conexion->prepare($sqlDestinatario);
                    $stmt->execute();
                    $total_records = $stmt->rowCount(); // Get total number of records

                    $total_pages = ceil($total_records / $records_per_page); // Calculate total pages

                    // Limit query based on current page
                    $offset = ($current_page - 1) * $records_per_page;
                    $sqlDestinatario .= " LIMIT $offset, $records_per_page";
                    $result = $conexion->query($sqlDestinatario);      
                if ($result) {
                    while ($fila = $result->fetch(PDO::FETCH_ASSOC)) :
                      ?>
                      <tr>
                        <td><?php echo $fila['id_destinatario']; ?></td>
                        <td><?php echo $fila['nombre_destinatario'] ?? 'N/A'; ?></td>
                        <td><?php echo $fila['apellido_destinatario']; ?></td>
                        <td><?php echo $fila['telefono_des']; ?></td>
                    
                        <td>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#EditaDestiModal<?php echo $fila['id_destinatario'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="#" class="btn btn-sm btn-danger" 
                            data-bs-toggle="modal" data-bs-target="#EliminaDestinaModal<?php echo $fila['id_destinatario'];?>"><i class="fa-solid fa-trash"></i></a>
                            
                        </td>
    
                          
                            <?php include "../modelo/EditarDestinatario.php"; ?>
                            <?php include "../modelo/EliminaDestina.php"; ?>
                           
    
                        </tr>
                   <?php // End of the while loop
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
        
        <?php include "../modelo/NuevoDestinatario.php"; ?>




    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   
</body>
</html>