<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Tipo Paquete</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EditaPaqueteModal<?php echo $fila['id_tipo_paquete']; ?>" tabindex="-1" aria-labelledby="EditaPaqueteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditaPaqueteModalLabel">Editar Tipo Paquete<?php echo $fila['nombre_tipo_paquete']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="../controlador/getPaquete.php" method="POST" enctype="multipart/form-data">
              
                <div class="mb-3">
                    <label for="nombre" class="form-label">Tipo Paquete</label>
                    <input type="text" name="nombre_tipo_paquete" id="nombre_tipo_paquete" class="form-control"  value="<?php echo $fila['nombre_tipo_paquete']; ?>" required>
                </div>
                <input type="hidden" id="accion" name="accion" value="EditaPaqueteModal">  
                <input type="hidden" id="id_tipo_paquete" name="id_tipo_paquete" value="<?php echo $fila['id_tipo_paquete']; ?>">  
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
