<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <div>
      <label for="">Nombre Completo</label>
      <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>
    <br>
    <div>
      <label for="">Apellido Completo</label>
      <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>
    <br>
    <div>
      <label for="">Documento</label>
      <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>
    <br>
    <div>
      <label for="">Tipo Documento</label>
      <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>
    <br>
    <div>
      <label for="">Teléfono</label>
      <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>
    <br>
    <div>
      <label for="">Correo Electronico</label>
      <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>
    <br>
    <div>
      <label for="">Usuario</label>
      <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>
    <br>
    <div>
      <label for="">Contraseña</label>
      <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" disabled>
    </div>
    <br>
  </div>
  <div class="perfico"><img src="../img/user-solid.png" alt=""></div>
  <div class="icouser"><img src="../img/usuario.png" alt=""></div>
  <button type="button" id="cerrar" class="btn btn-outline-info" href="../visual/cerrar_sesion.php" role="button">Cerrar sesion</button>
  <button type="button" id="editarbtn" class="btn btn-info">Editar</button>
</body>
</html>