<?php

$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
session_start();
 if ($_SESSION["id_usuario"]==""){
    echo '<meta http-equiv="refresh" content="0,url=pp.php">';
 }

 $sqlUso = "SELECT id_usuario FROM usuario WHERE id_usuario = {$_SESSION["id_usuario"]}";
 $query = mysqli_query($conexion, $sqlUso);

 $fetch = mysqli_fetch_assoc($query);
 $id_usuario = $fetch['id_usuario'];



$sql = "SELECT
e.id_envio,
e.id_usuario,
u.nombre_us,
u.apellido_us,
u.n_documento_us,
e.id_destinatario,
d.nombre_destinatario,
d.apellido_destinatario,
d.telefono_des,
e.direccion,
e.id_destino,
ds.nombre_destino,
e.fecha_envio,
e.fecha_estimada,
tp.id_tipo_paquete,
ps.id_tipo_peso,
v.id_vehiculo,
e.peso,
e.dimensiones,
e.volumen,
e.pago,
e.id_estado,
est.nombre_estado
FROM envio e
JOIN usuario u ON e.id_usuario = u.id_usuario
JOIN destinatario d ON e.id_destinatario = d.id_destinatario
INNER JOIN destino ds ON e.id_destino = ds.id_destino
INNER JOIN tipo_paquete tp ON e.id_tipo_paquete = tp.id_tipo_paquete
INNER JOIN tipo_peso ps ON e.id_tipo_peso = ps.id_tipo_peso
INNER JOIN vehiculo v ON e.id_vehiculo = v.id_vehiculo
INNER JOIN estado est ON e.id_estado = est.id_estado
WHERE u.id_usuario = $id_usuario ";

$EnvioResult = mysqli_query($conexion, $sql);

if ($conexion->connect_error) {
  die("Connection failed: " . $conexion->connect_error);
}


$sqlEnvio = "SELECT
e.id_envio,
e.id_usuario,
u.nombre_us,
u.apellido_us,
u.n_documento_us,
e.id_destinatario,
d.nombre_destinatario,
d.apellido_destinatario,
d.telefono_des,
e.direccion,
e.id_destino,
ds.nombre_destino,
e.fecha_envio,
e.fecha_estimada,
tp.id_tipo_paquete,
ps.id_tipo_peso,
v.id_vehiculo,
e.peso,
e.dimensiones,
e.volumen,
e.pago,
e.id_estado,
est.nombre_estado
FROM envio e
JOIN usuario u ON e.id_usuario = u.id_usuario
JOIN destinatario d ON e.id_destinatario = d.id_destinatario
INNER JOIN destino ds ON e.id_destino = ds.id_destino
INNER JOIN tipo_paquete tp ON e.id_tipo_paquete = tp.id_tipo_paquete
INNER JOIN tipo_peso ps ON e.id_tipo_peso = ps.id_tipo_peso
INNER JOIN vehiculo v ON e.id_vehiculo = v.id_vehiculo
INNER JOIN estado est ON e.id_estado = est.id_estado";



$envio = $conexion->query($sqlEnvio);

if (!$envio) {
  echo "Error: " . $conexion->error;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CRUD DESTINATARIO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="../css/datatables.min.css">
  <script> src="../js/datatables.min.js"</script>
  <script src="../js/jquery-3.7.1.min.js"></script>

</head>
<header>
<div class="conrainer col-10 mx-auto py-3">
         
         <ul class="menu">
         <li class="navli">
           <a class="nava" href="../bienvenido.php">Inicio</a>
         </li>
         <li class="navli">
           <a  class="nava" href="../reporteUsu/pdfUsuario.php">Envios Realizados</a>
         </li>
         
         
         
     </ul>
</header>
 <style>
    .menu {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    margin: 10px;
    padding:0;
  }
  
.body {
    font-family: sans-serif;
    background-color: #F2F2F2;
    
  }
  
.menu {
    position: absolute;
    top: 60px;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
}
  
.menu .navli{
    list-style: none;
}
.menu .navli .nava {
    position: relative;
    display: block;
    text-transform: uppercase;
    margin: 20px 0;
    padding: 10px 20px;
    color:rgb(0, 0, 0);
    font-family: sans-serif;
    font-size: 18px;
    font-weight: 600;
    transition: 0.5s;
    text-decoration: none;
    z-index: 1;
}

.menu .navli .nava:before {
    position: absolute;
    top: 0;
    left: 0px;
    width: 100%;
    height: 100%;
    border-top: 2px solid#52C5F2 ;
    border-bottom: 2px solid #52C5F2 ;
    transform: scaleY(2);
    opacity: 0;
    transition: 0.3s;
    content: "";
}
  
.menu .navli .nava:after {
    position: absolute;
    top: 2px;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #52C5F2 ;
    transform: scale(0);
    opacity: 0;
    transition: 0.3s;
    z-index: -1;
    content: "";
  }
  
  .menu .navli .nava:hover {
    color: white;
  }
  
  .menu .navli .nava:hover:before {
    transform: scaleY(1);
    opacity: 1;
  }
  
  .menu .navli .nava:hover:after {
    transform: scaleY(1);
    opacity: 1;
  }

.usuaico {
    height: 50px;
    width: 50px;
    margin-top: -1500px;
   margin-left: 1400px;
    
}
.btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  color: black;
  font-size: 16px;
  padding: 16px 30px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

.btn:hover {
  background-color: black;
  color: white;
}
/* .cerrar_usua {
width: 250px;
height: 180px;
margin-left: 1310px;
margin-top: -620px;
padding-left: 70px;
background-color: black;

} */
.safe-delivery img{
    width: 300px;
    height: 100px;
    margin-top: -550px;
    margin-left: 50px;
   
    
}
.infor_safe{
   width: 1200px;
   margin-left: 100px;
   height: 400px;
  margin-top: 30px;
   padding-bottom: -10px;
}
.infor_safe p{
    margin-left: 400px;
    text-align: center;
    margin-top: -80px;
    font-family: Arial, sans-serif;
    width: 700px;
}
.infor_safe label{
    font-weight: bold;
    font-size: 40px;
    color: #2638fe;
    margin-top: 100px;
    
    
}

.sl{
    margin-top: -1000px;
   padding-top: 100px;
    padding-left: 460px;
    width: 1030px;
    height: 340px;
    
}
#demo{
    margin-top: 15px;
    width: 650px;
    
}
#mitabla{
    margin-left:100px;
}
 </style>
<body class="body1">
    <br><br><br><br>
    <style>
        .buscar {
        width: 500px;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 12px;
        box-sizing: border-box;
        font-size: 1em;
        margin-top: -40px;
        }
        .buscar::placeholder {
        color: #aaa;
        }
        .buscar:focus {
        outline: none;
        border-color: skyblue;
        }
        .btnBuscar{
            background-color: skyblue; 
            border-radius: 20px;
            color:white;
            border: none;
            width: 100px;
            height: 50px;
            }
            body {
    font-family: sans-serif;
    background-color: #F2F2F2;
    
  }
    </style>
    <center><h2 class="text-center"><b>INFORMACIÓN GUÍA ENVIO</b></h2></center><br>
    <center>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input class="buscar"type="text" id="id_destinatario" name="nombre_destinatario" placeholder="Buscar por nombre" required>
                    <button class="btnBuscar" type="submit"><b>Buscar</b></button>
                </form>
            </center>

        
        <?php

    if (isset($_POST['mostrar'])) {
        $detinoSeleccionado = $_POST["cat"];

        // Consulta SQL modificada para filtrar por el número de documento seleccionado

        $sqlDestino = "SELECT
            e.id_envio,
            e.id_usuario,
            u.nombre_us,
            u.apellido_us,
            u.n_documento_us,
            e.id_destinatario,
            d.nombre_destinatario,
            d.apellido_destinatario,
            d.telefono_des,
            e.direccion,
            e.id_destino,
            ds.nombre_destino,
            e.fecha_envio,
            e.fecha_estimada,
            tp.id_tipo_paquete,
            ps.id_tipo_peso,
            v.id_vehiculo,
            e.peso,
            e.dimensiones,
            e.volumen,
            e.pago,
            e.id_estado,
            est.nombre_estado
FROM envio e
JOIN usuario u ON e.id_usuario = u.id_usuario
JOIN destinatario d ON e.id_destinatario = d.id_destinatario
INNER JOIN destino ds ON e.id_destino = ds.id_destino
INNER JOIN tipo_paquete tp ON e.id_tipo_paquete = tp.id_tipo_paquete
INNER JOIN tipo_peso ps ON e.id_tipo_peso = ps.id_tipo_peso
INNER JOIN vehiculo v ON e.id_vehiculo = v.id_vehiculo
INNER JOIN estado est ON e.id_estado = est.id_estado 
        WHERE ds.id_destino = $detinoSeleccionado";

        $EnvioResult = mysqli_query($conexion, $sqlDestino);

        if (!$EnvioResult){
            echo "error al ejecuta:   " . mysqli_error($conexion);
            exit(); 
        }

        // Resto de tu código aquí...
    }
    ?>
    <br>
    <div class="row">
        <div class="col-lg-10">
            <table id="mitabla" class="table text-center table-sm table-condensed   table-hover mt-4">
                <thead class="">
                    <tr>
                        <th >#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>destino</th>
                        <th>fecha inicio</th>
                        <th>fecha fin</th>
                        <th>pago</th>
                        <th>estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $error = false;
                                    // Replace with your actual database configuration details
                    $config = array(
                        'db' => array(
                        'host' => 'localhost', // Database host (usually 'localhost')
                        'name' => 'bd_safe_delivery2', // Your database name
                        'user' => 'root', // Your database username
                        'pass' => '', // Your database password
                        'options' => array(
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Set error handling mode
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Default fetch mode
                        )
                        )
                    );

                    try {
                    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];


                    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
                    } catch(PDOException $error) {
                    $error = $error->getMessage();
                }
                        // Pagination variables (ajústalas según sea necesario)
                        $records_per_page = 8; // Número de registros por página
                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Obtener la página actual desde la URL o establecerla en 1
                        $stmt = $conexion->prepare($sqlEnvio);
                        $stmt->execute();
                        $total_records = $stmt->rowCount(); // Obtener el número total de registros
                        $total_pages = ceil($total_records / $records_per_page); // Calcular el total de páginas
                        // Limitar la consulta según la página actual
                        $offset = ($current_page - 1) * $records_per_page;
                        $sqlEnvio .= " LIMIT $offset, $records_per_page";
                        $envio = $conexion->query($sql);
                        $id_envio_array = array();
                    // Check if there are any results   
                        foreach ($EnvioResult as $fila){
                            $id_envio_array[] = $fila['id_envio'];
                    ?>
                    <tr>
                        <td><?php echo $fila['id_envio']; ?></td>
                        <td><?php echo $fila['nombre_us']; ?></td>
                        <td><?php echo $fila['apellido_us']; ?></td>
                        <td><?php echo $fila['n_documento_us']; ?></td>
                        <td><?php echo $fila['nombre_destinatario']; ?></td>
                        <td><?php echo $fila['apellido_destinatario']; ?></td>
                        <td><?php echo $fila['telefono_des']; ?></td>
                        <td><?php echo $fila['nombre_destino']; ?></td>
                        <td><?php echo $fila['fecha_envio']; ?></td>
                        <td><?php echo $fila['fecha_estimada']; ?></td>
                        <td><?php echo $fila['pago']; ?></td>
                        <td><?php echo $fila['nombre_estado']; ?></td>
                        <td>
                        
                            <a class="link" href="../diseño/guiaPdf.php?idCat=<?php echo $fila['id_envio'];?>" target="_blank" onclick="printDocument(event, this.href);"><i class="fa-solid fa-file-pdf" style="color: #cb2020;"></i></a><br />
                        </td>


                    </tr>

                    <?php
                    }
                    ?>
                        

                    </tbody>
             </table>
        </div>
    </div>
           


    <script>
    function printDocument(event, url) {
        event.preventDefault();
        var printWindow = window.open(url, '_blank');
        printWindow.onload = function() {
            printWindow.print();
        };
    }
    </script>
        
            <style>
                .navPag{
                    display: flex;
                    justify-content: center;
                }
            </style>
            <div class="navPag">
                <!-- Paginación de Bootstrap -->
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        
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
    <button type="button" id="cerrar" class="btn btn-info" onclick="window.location.href='../cerrar_sesion.php'">Salir</button>
        
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   
</body>
</html>
