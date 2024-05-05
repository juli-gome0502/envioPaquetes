<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estado Taquillero</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EditaEstadoTaqModal<?php echo $fila['id_estado_taquillero']; ?>" tabindex="-1" aria-labelledby="EditaEstadoTaqModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditaEstadoTaqModalLabel">Editar Estado Taquillero <?php echo $fila['estado_taquillero']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="../controlador/getEstadoTaq.php" method="POST" enctype="multipart/form-data">
              
                <div class="mb-3">
                    <label for="nombre" class="form-label">Estado Taquillero</label>
                    <input type="text" name="estado_taquillero" id="estado_taquillero" class="form-control" value="<?php echo $fila['estado_taquillero']; ?>" required>
                </div>
                <input type="hidden" id="accion" name="accion" value="EditaEstadoTaqModal">  
                <input type="hidden" id="id_estado_taquillero" name="id_estado_taquillero" value="<?php echo $fila['id_estado_taquillero']; ?>">  
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
