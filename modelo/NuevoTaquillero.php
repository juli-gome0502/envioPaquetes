<!-- Modal -->
<div class="modal fade" id="NuevoTaquilleroModal" tabindex="-1" aria-labelledby="NuevoTaquilleroModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="NuevoTaquilleroModalLabel">Agregar Taquillero</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../controlador/guardaTaquillero.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre_taq" id="nombre_taq" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Apellido</label>
                <input type="text" name="apellido_taq" id="apellido_taq" class="form-control" required>       
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Correo Electronico</label>
                <input type="text" name="correo_electronico_taq" id="correo_electronico_taq" class="form-control" required>       
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Teléfono</label>
                <input type="text" name="telefono_ta" id="telefono_ta" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Usuario</label>
                <input type="text" name="usuario_taq" id="usuario_taq" class="form-control" required>
              </div>
          
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Contraseña</label>
                <input type="text" name="contrasena_taq" id="contrasena_taq" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Tipo Usuario</label>
                <select class="form-select mb-3" name="us_tipo">
                  <option selected disabled>---Seleccionar Tipo Usuario---</option>
                  <?php
                   
                    $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
                    if ($conexion->connect_error) {
                      die("Connection failed: " . $conexion->connect_error);
                    }
                    $sql = $conexion->query("SELECT id_tipo_usuario,nombre_usuario FROM tipo_usuario");
                    while ($resultado = $sql->fetch_assoc()) {
                      echo "<option value='".$resultado['id_tipo_usuario']."'>".$resultado
                      ['nombre_usuario']."</option>";

                    }

                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Estado</label>
                <select class="form-select mb-3" name="id_estado_taquillero">
                  <option selected disabled>---Seleccionar Estado---</option>
                  <?php
                   
                    $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
                    if ($conexion->connect_error) {
                      die("Connection failed: " . $conexion->connect_error);
                    }
                    $sql = $conexion->query("SELECT id_estado_taquillero,estado_taquillero FROM estado_taquillero");
                    while ($resultado = $sql->fetch_assoc()) {
                      echo "<option value='".$resultado['id_estado_taquillero']."'>".$resultado
                      ['estado_taquillero']."</option>";

                    }

                  ?>
                </select>
              </div>
            </div>
          </div>
          
          <input type="hidden" id="accion" name="accion" value="NuevoTaquilleroModal">
          <div class="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
