<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Estado</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EditaEstadoModal<?php echo $fila['id_estado']; ?>" tabindex="-1" aria-labelledby="EditaEstadoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditaEstadoModalLabel">Editar Estado<?php echo $fila['nombre_estado']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="../controlador/getEstado.php" method="POST" enctype="multipart/form-data">
              
                <div class="mb-3">
                    <label for="nombre" class="form-label">Estado</label>
                    <input type="text" name="nombre_estado" id="nombre_estado" class="form-control"  value="<?php echo $fila['nombre_estado']; ?>" required>
                </div>
                <input type="hidden" id="accion" name="accion" value="EditaEstadoModal">  
                <input type="hidden" id="id_estado" name="id_estado" value="<?php echo $fila['id_estado']; ?>">  
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
