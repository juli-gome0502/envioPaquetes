<!-- Modal -->
<div class="modal fade" id="NuevoVehiculoModal" tabindex="-1" aria-labelledby="NuevoVehiculoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="NuevoVehiculoModalLabel"><b>Agregar Vehículo</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="../controlador/guardaVehiculo.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Tipo Vehículo</label>
                    <input type="text" name="nombre_tipo_vehiculo" id="nombre_tipo_vehiculo" class="form-control" required>
                </div>
                <input type="hidden" id="accion" name="accion" value="NuevoVehiculoModal">

                <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>
            </form>
      </div>
      
    </div>
  </div>
</div>
