<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Destinatario</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</head>
<body>
<div class="modal fade" id="EditaDestiModal<?php echo $fila['id_destinatario']; ?>" tabindex="-1" aria-labelledby="EditaDestiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditaDestiModalLabel">Editar Destinatario<?php echo $fila['nombre_destinatario']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="../controlador/getDestinatario.php" method="POST" enctype="multipart/form-data">
              
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre Destino</label>
                  <input type="text" name="nombre_destinatario" id="nombre_destinatario" class="form-control" value="<?php echo $fila['nombre_destinatario']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Apellido</label>
                    <input type="text" name="apellido_destinatario" id="apellido_destinatario" class="form-control" value="<?php echo $fila['apellido_destinatario']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Teléfono</label>
                    <input type="text" name="telefono_des" id="telefono_des" class="form-control" value="<?php echo $fila['telefono_des']; ?>" required>
                </div>
                <input type="hidden" id="accion" name="accion" value="EditaDestiModal">  
                <input type="hidden" id="id_destinatario" name="id_destinatario" value="<?php echo $fila['id_destinatario']; ?>">  
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
