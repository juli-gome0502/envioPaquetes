<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de pAquetes</title>
    <link rel="stylesheet" href="../css/envios.css">
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
        
        
    </ul>
    <div class="safe-delivery"><img src="../img/safe-delivery.png" alt=""> </div>
    <div class="container-">
    
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Código</th>
                <th>Nombre Destinatario</th>
                <th>Apellido Destinatario</th>
                <th>Destino</th>
                <th>Guía PDF</th>
                           
                           
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Jorge</td>
                <td>Vargas</td>
                <td>Duitama</td>
                <td><i class="fa-solid fa-file-pdf" style="color: #FF0000;"></i></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Andrey</td>
                <td>Alvarez</td>
                <td>Sogamoso</td>
                <td><i class="fa-solid fa-file-pdf" style="color: #FF0000;"></i></td>
                  
              </tr>
              <tr>
                <td>3</td>
                <td>Susana</td>
                <td>Garcia</td>
                <td>Bogotá</td>
                <td><i class="fa-solid fa-file-pdf" style="color: #FF0000;"></i></td>
                 
              </tr>
              <tr>
                <td>4</td>
                <td>Helen</td>
                <td>Vergara</td>
                <td>Moniquira</td>
                <td><i class="fa-solid fa-file-pdf" style="color: #FF0000;"></i></td>
                 
              </tr>
              <tr>
                <td>5</td>
                <td>Sandra</td>
                <td>Rodriguez</td>
                <td>Paipa</td>
                <td><i class="fa-solid fa-file-pdf" style="color: #FF0000;"></i></td>
                  
              </tr>
            </tbody>
          </table>
        </div>
      </div>
        <nav class="paginacion" aria-label="...">
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
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
    <img class="usuaico" src="../img/usuario.png" alt="">
    <button type="button" id="cerrar" class="btn btn-outline-info" href="../visual/cerrar_sesion.php" role="button">Cerrar sesion</button>
    
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>