<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tipo Peso</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EditaPesoModal<?php echo $fila['id_tipo_peso']; ?>" tabindex="-1" aria-labelledby="EditaPesoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditaPesoModalLabel">Editar Destino  <?php echo $fila['nombre_tipo_peso']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="../controlador/getPeso.php" method="POST" enctype="multipart/form-data">
              
                <div class="mb-3">
                    <label for="nombre" class="form-label">Tipo Peso</label>
                    <input type="text" name="nombre_tipo_peso" id="nombre_tipo_peso" class="form-control" value="<?php echo $fila['nombre_tipo_peso']; ?>" required>
                </div>
                <input type="hidden" id="accion" name="accion" value="EditaPesoModal">  
                <input type="hidden" id="id_tipo_peso" name="id_tipo_peso" value="<?php echo $fila['id_tipo_peso']; ?>">  
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
