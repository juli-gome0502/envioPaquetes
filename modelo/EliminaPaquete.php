<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar Tipo Paquete</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EliminaPaqueteModal<?php echo $fila['id_tipo_paquete']; ?>" tabindex="-1" aria-labelledby="EliminaPaqueteModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-white text-black">
        <h1 class="modal-title fs-5" id="EliminaPaqueteModal">Confirmar Eliminación</h1>
        <button type="button" class="btn-close btn-black" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="alert alert-danger">
                <p>¿Desea eliminar el registro de <b><?php echo $fila['nombre_tipo_paquete']; ?></b></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <form action="../controlador/eliminarPaquete.php" method="POST">
                
                <input type="hidden" id="accion" name="accion" value="EliminaPaqueteModal">  
                <input type="hidden" id="id_tipo_paquete" name="id_tipo_paquete" value="<?php echo $fila['id_tipo_paquete']; ?>">  
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
