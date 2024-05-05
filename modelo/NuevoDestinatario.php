<!-- Modal -->
<div class="modal fade" id="NuevoDestiModal" tabindex="-1" aria-labelledby="NuevoDestiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="NuevoDestiModalLabel">Agregar Destinatario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="../controlador/guardaDestinatario.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre_destinatario" id="nombre_destinatario" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Apellido</label>
                    <input type="text" name="apellido_destinatario" id="apellido_destinatario" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Teléfono</label>
                    <input type="text" name="telefono_des" id="telefono_des" class="form-control" required>
                </div>
                <input type="hidden" id="accion" name="accion" value="NuevoDestiModal">
                <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>
            </form>
      </div>
      
    </div>
  </div>
</div>
