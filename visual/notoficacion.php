<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificacion</title>
    <link rel="stylesheet" href="../css/notificacion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
          <a  class="nava" href="./reporteUsu/pdfUsuario.php">Envios Realizados</a>
        </li>
        <li class="navli">
          <a class="nava"  href="../visual/notoficacion.php">Notificaciones </a>
        </li> 
    </ul>
    <div class="safe-delivery"><img src="../img/safe-delivery.png" alt=""> </div>
    <div class="container-notif">
        <table class="table table-bordered table-striped">
            <thead >
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Notificación</th>
                  <th scope="col"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></th>
                </tr>
            </thead>
            <tbody class="table-group-divider" >
              <!-- Loop through your data and create a new row for each item -->
                <tr>
                  <th scope="row">1</th>
                  <td>Su paquete ha sido entregado...</td>
                    <td class="align-top">
                      <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <i class="fas fa-eye"></i>
                        </button>

                      <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      ...
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
              <!-- Repeat the <tr> block for each item in your data -->
                <tr>
                  <th scope="row">2</th>
                  <td>Su paquete ha sido entregado...</td>
                    <td>
                      <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <i class="fas fa-eye"></i>
                        </button>

                      <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      ...
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <nav id="pag_not" class="paginacion" aria-label="...">
        <ul class="pagination">
          <li class="page-item disabled">
            <span class="page-link">Anterior</span>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <span class="page-link">2</span>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Siguiente</a>
          </li>
        </ul>
    </nav>
    <img class="usuaico" src="../img/usuario.png" alt="">
    <button type="button" id="cerrar" class="btn btn-outline-info" href="../visual/cerrar_sesion.php" role="button">Cerrar sesion</button>
    

    
</body>
</html>