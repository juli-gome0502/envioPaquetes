<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tipo Usuario</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EditausuarioModal<?php echo $fila['id_tipo_usuario']; ?>" tabindex="-1" aria-labelledby="EditausuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditausuarioModalLabel">Editar Usuario<?php echo $fila['nombre_usuario']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="../controlador/getUsuario.php" method="POST" enctype="multipart/form-data">
              
                <div class="mb-3">
                    <label for="nombre" class="form-label">Tipo Usuario</label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" value="<?php echo $fila['nombre_usuario']; ?>" required>
                </div>
                <input type="hidden" id="accion" name="accion" value="EditausuarioModal">  
                <input type="hidden" id="id_tipo_usuario" name="id_tipo_usuario" value="<?php echo $fila['id_tipo_usuario']; ?>">  
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
