<!-- Modal -->
<div class="modal fade" id="NuevoPesoModal" tabindex="-1" aria-labelledby="NuevoPesoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="NuevoPesoModalLabel">Agregar   Peso</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="../controlador/guardaPeso.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Tipo Peso</label>
                    <input type="text" name="nombre_tipo_peso" id="nombre_tipo_peso" class="form-control" required>
                </div>
                <input type="hidden" id="accion" name="accion" value="NuevoPesoModal">

                <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>
            </form>
      </div>
      
    </div>
  </div>
</div>
