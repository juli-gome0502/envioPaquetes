<!-- Modal -->
<div class="modal fade" id="NuevoConductorModal" tabindex="-1" aria-labelledby="NuevoConductorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="NuevoConductorModalLabel">Agregar Conductor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../controlador/guardaConductor.php" method="post" enctype="multipart/form-data">
         
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre_con" id="nombre_con" class="form-control" required>
          </div>
      
          <div class="mb-3">
            <label for="nombre" class="form-label">Apellido</label>
            <input type="text" name="apellido_conduc" id="apellido_conduc" class="form-control" required>       
          </div>
        
          <div class="mb-3">
            <label for="nombre" class="form-label">N° Documento</label>
            <input type="text" name="n_documento_con" id="n_documento_con" class="form-control" required>       
          </div>
            
          
          <div class="mb-3">
            <label for="nombre" class="form-label">Tipo Vehiculo</label>
            <select class="form-select mb-3" name="id_tipo_vehiculo">
              <option selected disabled>---Seleccionar Tipo Vehiculo---</option>
              <?php
               
                $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
                if ($conexion->connect_error) {
                  die("Connection failed: " . $conexion->connect_error);
                }
                $sql = $conexion->query("SELECT id_tipo_vehiculo,nombre_tipo_vehiculo FROM tipo_vehiculo");
                while ($resultado = $sql->fetch_assoc()) {
                  echo "<option value='".$resultado['id_tipo_vehiculo']."'>".$resultado
                  ['nombre_tipo_vehiculo']."</option>";
                }
              ?>
            </select>
          </div>
           
          <div class="mb-3">
            <label for="nombre" class="form-label">Placas</label>
            <select class="form-select mb-3" name="id_vehiculo">
              <option selected disabled>---Seleccionar Placas---</option>
              <?php
               
                $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
                if ($conexion->connect_error) {
                  die("Connection failed: " . $conexion->connect_error);
                }
                $sql = $conexion->query("SELECT id_vehiculo,placas FROM vehiculo");
                while ($resultado = $sql->fetch_assoc()) {
                  echo "<option value='".$resultado['id_vehiculo']."'>".$resultado
                  ['placas']."</option>";
                }
              ?>
            </select>
          </div>
          <input type="hidden" id="accion" name="accion" value="NuevoConductorModal">
          <div class="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
