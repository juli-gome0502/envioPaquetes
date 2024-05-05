<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EliminaVehiModal<?php echo $fila['id_tipo_vehiculo']; ?>" tabindex="-1" aria-labelledby="EliminaVehiModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-white text-black">
        <h1 class="modal-title fs-5" id="EliminaVehiModal">Confirmar Eliminación</h1>
        <button type="button" class="btn-close btn-black" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="alert alert-danger">
                <p>¿Desea eliminar el registro de <b><?php echo $fila['nombre_tipo_vehiculo']; ?></b></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <form action="../controlador/eliminarVehiculo.php" method="POST">
                
                <input type="hidden" id="accion" name="accion" value="EliminaVehiModal">  
                <input type="hidden" id="id_tipo_vehiculo" name="id_tipo_vehiculo" value="<?php echo $fila['id_tipo_vehiculo']; ?>">  
               <div class="modal-footer">
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                  
                </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
</body>
</html>
