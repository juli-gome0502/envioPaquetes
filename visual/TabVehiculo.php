<?php
include '../conexion/conexion.php';

try {
  $sqltabVehiculo = " SELECT id_vehiculo, placas, n__bus FROM vehiculo ";
  $tabvehiculo = $conexion->query($sqltabVehiculo);
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
    <br><br>
    <div class="conrainer col-10 mx-auto py-3">
        <br>
        
        <h2 class="text-center"><b>INFORMACIÓN VEHÍCULO</b></h2>
        <div class="form-group mr-3">
            <br><br>
            <center>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input class="buscar"type="text" id="placas" name="placas" placeholder="Buscar por Placas" required>
                    <button class="btnBuscar" type="submit">Buscar</button>
                </form>
            </center>
      </div>
    
      
        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#NuevoTabVehiculoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo Vehículo</a>
            </div>
        </div>
        
        <table id="mitabla" class="table  text-center mt-4">
            <thead class="">
                <tr>
                    <th >#</th>
                    <th>Placas</th>
                    <th>N° Bus</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            <?php
               $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
               $tabVehiculoResult =mysqli_query($conexion, " SELECT id_vehiculo, placas, n__bus FROM vehiculo ");
               
                while ($fila = mysqli_fetch_assoc($tabVehiculoResult)) :
                ?>
                <tr>
                    <td><?php
                    if (isset($fila['id_vehiculo'])) {
                        echo $fila['id_vehiculo'];
                    } else {
                        echo "N/A";
                    }
                    ?>
                    </td>
                    <td><?php echo $fila['placas']; ?></td>
                    <td><?php echo $fila['n__bus']; ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#EditaTabVehiculoModal<?php echo $fila['id_vehiculo'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                     
                    <?php include "../modelo/EditarTabVehiculo.php"; ?>
                </tr>
                <?php
                    // End of the while loop
                    endwhile;
                    
                ?>
                

            </tbody>
        </table>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        
        <?php include "../modelo/NuevoTabVehiculo.php"; ?>
      
      


    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   
</body>
</html>