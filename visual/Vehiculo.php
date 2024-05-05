<?php
include '../conexion/conexion.php';

try {
  $sqlDestino = " SELECT id_tipo_vehiculo, nombre_tipo_vehiculo FROM tipo_vehiculo ";
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
    <title> CRUD VEHÍCULO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

</head>
<body>

    <div class="conrainer col-5 mx-auto py-3">
        <h2 class="text-center"><b>TIPO VEHÍCULO</b></h2>
        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#NuevoVehiculoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo Vehiculo</a>
            </div>
        </div>
        <table class="table table-sm mx-auto table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th >#</th>
                    <th>Nombre Vehículo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
                    $result =mysqli_query($conexion, "SELECT id_tipo_vehiculo, nombre_tipo_vehiculo FROM tipo_vehiculo");
                    while($fila = mysqli_fetch_assoc($result)) :
                        ?>
                        <tr>
                            <td><?php echo $fila['id_tipo_vehiculo']; ?></td>
                            <td>
                                <?php if (isset($fila['nombre_tipo_vehiculo'])) {
                                    echo $fila['nombre_tipo_vehiculo'];
                                } else {
                                    echo 'N/A'; // Or any default value you prefer
                                } ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#EditaVehiculoModal<?php echo $fila['id_tipo_vehiculo'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-sm btn-danger" 
                                data-bs-toggle="modal" data-bs-target="#EliminaVehiModal<?php echo $fila['id_tipo_vehiculo'];?>"><i class="fa-solid fa-trash"></i></a>
                                
                            </td>
                            
                          
                            <?php include "../modelo/EditarVehiculo.php"; ?>
                            <?php include "../modelo/EliminaVehiculo.php"; ?>
                           
                            
                        </tr>
                   <?php endwhile; ?>
            </tbody>
        </table>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        
        <?php include "../modelo/NuevoVehiculo.php"; ?>




    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   
</body>
</html>