<?php
   session_start();
    if(!isset($_SESSION['usuario'])){
        echo'
        <script>
        alert("Por favor debes iniciar sesion");
        window.location = "../index.php";
        </script>
        ';

        session_destroy();
        die();

    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="../css/usuario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body class="body">
    <ul class="menu">
        <li class="navli">
          <a class="nava" href="../visual/bienvenido.php">Inicio</a>
        </li>
        <li class="navli">
          <a  class="nava" href="../visual/reporteUsu/pdfUsuario.php">Envios Realizados</a>
        </li>
       
        
    </ul>
    <div class="row  sl">
      
        <div class="col-lg-6 slide">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../img/slider1.png" alt="Los Angeles" class="d-block w-100" height="300px">
                  </div>
                  <div class="carousel-item">
                    <img src="../img/slider2.png" alt="Chicago" class="d-block w-100" height="300px">
                  </div>
                  <div class="carousel-item">
                    <img src="../img/slider3.png" alt="New York" class="d-block w-100" height="300px">
                  </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="safe-delivery"><img src="../img/safe-delivery.png" alt=""> </div>
    <div class="infor_safe">
        <label name="vision_safe">VISION</Label>
        <p class="vision"> SAFE-DELIVERY, Ser la empresa líder en el envió de paquetos a nivel nacional o
            internacional, reconocida por.
            Nuestra eficacia y rapidez en la entrega do los paquotos. Nuestra seguridad y
            confiabilidad en el manejo de los envíos. Nuostra atención personalizada y excelente
            servicio al cliente. Nuestra constante innovación tecnológica para ofrecer soluciones
            logísticos integralos
        </p>
        <label name="mision" for="mision">MISION</label>
        <P class="mision">SAFE-DELIVERY.Ser la empresa de envíos de paquetes preferida por los clientes, gracias a: 
            Nuestra amplia red de cobertura que llega a todos los rincones del país. Nuestra competitividad en precios
            y tarifas. Nuestra responsabilidad social y ambiental. Nuestro compromiso con la satisfacción
            total de nuestros clientes.
        </P>
    </div>
    <style>
      #cerrar{
        margin-top: -280px;
        margin-left:650px;
        color:white;
        width: 100px;
        background-color: skyblue; 
        border-radius: 20px;
        color:white;
        border: none;
        width: 100px;
        height: 50px;
      }
     

    </style>
    <button type="button" id="cerrar" class="btn btn-info" onclick="window.location.href='../visual/cerrar_sesion.php'">Salir</button>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
    
    
    
   
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>