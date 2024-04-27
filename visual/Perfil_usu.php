<?php
  session_start();

  if (!isset($_SESSION['usuario'])) {
      // User is not logged in, redirect to login page
      header("Location: ..visual/bienvenido.php"); 
      exit;
      
  }
  $id = $_SESSION['id_usuario']; // Corregido el nombre de la variable de sesión

  $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
  if ($conexion->connect_error) {
      die("Error de conexión: " . $conexion->connect_error);
  }

  $sql = "SELECT * FROM usuario WHERE id_usuario = $id"; // Consulta corregida
  $resultado = $conexion->query($sql);

  // Comprobar si se encontraron resultados
  if ($resultado->num_rows > 0) {
      while ($user_data = $resultado->fetch_assoc()) {
          // Aquí se muestra el formulario con los datos del usuario
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">+
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/perfil_usuario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
</head>
<body class="body">
  <ul class="menu">
          <li class="navli">
            <a class="nava" href="../visual/bienvenido.php">Inicio</a>
          </li>
          <li class="navli">
            <a  class="nava" href="../visual/envios.php">Envios Realizados</a>
          </li>
          <li class="navli">
            <a class="nava"  href="../visual/notoficacion.php">Notificaciones </a>
          </li>
          <li class="navli">
            <a class="nava"  href="../visual/Perfil_usu.php">Perfil </a>
          </li>


  </ul>
  <img src="../img/safe-delivery.png" alt="">
  
  <div class="container-">
    <form action="" method="POST">
      
        <div>
          <label for="">Nombre Completo</label>
          <input disabled type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value="<?= $user_data['nombre_us'] ?>" >
        </div>
        <br>
        <div>
          <label for="">Apellido Completo</label>
          <input disabled type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value="<?= $user_data['apellido_us'] ?>" >
        </div>
        <br>
        <div>
          <label for="">Documento</label>
          <input disabled type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value="<?= $user_data['n_documento_us'] ?>" >
        </div>
        <br>
        <div>
          <label for="">Tipo Documento</label>
          <input disabled type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value="<?= $user_data['tipo_documento'] ?>" >
        </div>
        <br>
        <div>
          <label for="">Teléfono</label>
          <input disabled type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value="<?= $user_data['telefono'] ?>">
        </div>
        <br>
        <div>
          <label for="">Correo Electronico</label>
          <input disabled type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="<?= $user_data['correo_electronico_us'] ?>">

        </div>
        <br>
        <div>
          <label for="">Usuario</label>
          <input disabled type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value="<?= $user_data['usuario']?>" >
        </div>
        <br>
        <div>
          <label for="">Contraseña</label>
          <input disabled type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" value="<?= $user_data['contrasena'] ?>" >
        </div>
        <br>
      
    
  
    </form>
  </div>
  <div class="perfico"><img src="../img/user-solid.png" alt=""></div>
  <div class="icouser"><img src="../img/usuario.png" alt=""></div>
  <a class="btn btn-primary" id="cerrar" href="../controlador/cerrar_sesion.php" role="button">Cerrar sesion</a>

  <button type="button" id="editarbtn" class="btn btn-info">Editar</button>
</body>
</html>
<?php
    }
  } else {
      echo "No se encontraron datos del usuario";
  }
  $conexion->close();
?>