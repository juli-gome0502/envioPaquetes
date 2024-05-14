<!-- Modal -->
<div class="modal fade" id="NuevoTabVehiculoModal" tabindex="-1" aria-labelledby="NuevoTabVehiculoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="NuevoTabVehiculoModalLabel">Agregar Vehículo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../controlador/guardaTabVehiculo.php" method="post" enctype="multipart/form-data">
        
          <div class="mb-3">
            <label for="nombre" class="form-label">Placas</label>
            <input type="text" name="placas" id="placas" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">N° Bus</label>
            <input type="text" name="n__bus" id="n__bus" class="form-control" required>       
          </div>
          <input type="hidden" id="accion" name="accion" value="NuevoTabVehiculoModal">
          <div class="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
