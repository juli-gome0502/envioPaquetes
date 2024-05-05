<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EliminaModal<?php echo $fila['id_destino']; ?>" tabindex="-1" aria-labelledby="EliminaModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-white text-black">
        <h1 class="modal-title fs-5" id="EliminaModal">Confirmar Eliminación</h1>
        <button type="button" class="btn-close btn-black" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="alert alert-danger">
                <p>¿Desea eliminar el registro de <b><?php echo $fila['nombre_destino']; ?></b></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <form action="../controlador/eliminarDest.php" method="POST">
                
                <input type="hidden" id="accion" name="accion" value="EliminaModal">  
                <input type="hidden" id="id_destino" name="id_destino" value="<?php echo $fila['id_destino']; ?>">  
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
