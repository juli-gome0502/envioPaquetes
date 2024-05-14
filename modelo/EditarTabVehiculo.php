<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Vehiculo</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EditaTabVehiculoModal<?php echo $fila['id_vehiculo']; ?>" tabindex="-1" aria-labelledby="EditaTabVehiculoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditaTabVehiculoModalLabel">Editar <?php echo $fila['placas']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../controlador/getTabVehiculo.php" method="POST" enctype="multipart/form-data">
              
          <div class="mb-3">
            <label for="nombre" class="form-label">Placas</label>
            <input type="text" name="placas" id="placas" class="form-control" value="<?php echo $fila['placas']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">N° Bus</label>
            <input type="text" name="n__bus" id="n__bus" class="form-control" value="<?php echo $fila['n__bus']; ?>" required>       
          </div>
          
          <input type="hidden" id="accion" name="accion" value="EditaTabVehiculoModal">  
          <input type="hidden" id="id_vehiculo" name="id_vehiculo" value="<?php echo $fila['id_vehiculo']; ?>">  
          <div class="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
</body>
</html>
