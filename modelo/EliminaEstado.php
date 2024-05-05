<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar Estado</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EliminaEstadoModal<?php echo $fila['id_estado']; ?>" tabindex="-1" aria-labelledby="EliminaEstadoModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-white text-black">
        <h1 class="modal-title fs-5" id="EliminaEstadoModal">Confirmar Eliminación</h1>
        <button type="button" class="btn-close btn-black" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="alert alert-danger">
                <p>¿Desea eliminar el registro de <b><?php echo $fila['nombre_estado']; ?></b></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <form action="../controlador/eliminarEstado.php" method="POST">
                
                <input type="hidden" id="accion" name="accion" value="EliminaEstadoModal">  
                <input type="hidden" id="id_estado" name="id_estado" value="<?php echo $fila['id_estado']; ?>">  
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
