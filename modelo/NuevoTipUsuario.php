<!-- Modal -->
<div class="modal fade" id="NuevoTipUsuModal" tabindex="-1" aria-labelledby="NuevoTipUsuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="NuevoTipUsuModalLabel">Agregar Tipo Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="../controlador/guardaUsuario.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Tipo Usuario</label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" required>
                </div>
                <input type="hidden" id="accion" name="accion" value="NuevoTipUsuModal">

                <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>
            </form>
      </div>
      
    </div>
  </div>
</div>
