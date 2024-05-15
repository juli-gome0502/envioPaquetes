<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">

</head>
<body>
  <style>
    body{
      display: flex;
  justify-content: center; /* Center horizontally */
  align-items: center;
  height:700px;
    }
    .containerAdm{
      width: 1300px;
      background-color:#F2F2F2;
      border-radius:50px;
      padding-left:150px;
      height:600px;
      padding-top:60px;
      box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.5);
      
    }

    input[type="text"],
input[type="text"],
select,
textarea {
    width: 70%;
    padding: 8px;
    border: 1px solid skyblue;
    border-radius: 5px;
    box-sizing: border-box;
    margin-top: 5px;
}
#us_tipo, #id_estado_taquillero{
    width:395px;
    padding: 8px;
    border: 1px solid skyblue;
    border-radius: 5px;
    box-sizing: border-box;
    margin-top: 5px;
}
input[type="text"]:focus {
outline: none;
border-color: #45a049;
}
select:focus{
    outline: none;
border-color: #45a049; 
}
h1{
  text-align:center;
}
.btn-info{
  color:white;
}
  </style>
<div class="containerAdm">
  <h1>AGREGAR ADMINISTRADOR</h1>
    <form action="../RegistrarAdmin/guardarAdm.php" method="POST">
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
            <select class="form-select mb-3" id="us_tipo" name="us_tipo">
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
        
        
      </div>
                
          <input type="hidden" id="accion" name="accion" value="NuevoTaquilleroModal">
          <br>
          <div class="">
           <center>
              <button type="button" class="btn btn-secondary" href="../visual/login.php">Cerrar</button>
               <button type="submit" class="btn btn-info" href=""><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
           </center>
          </div>
    </form>
</div>
</body>
</html>