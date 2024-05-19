<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guia</title>
    <link rel="stylesheet" href="./css/guia.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<style>
        input[type="text"] {
            color: black; /* Cambia el color del texto a blanco */
            background-color: white;
            border:none; /* Cambia el color de fondo del input */
            /* Añade un poco de espacio alrededor del texto */
        }
    </style>
<?php

$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

$ID = $_GET['idCat'];
echo $ID;
$sqldocumento = "SELECT
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
tp.nombre_tipo_paquete,
ps.id_tipo_peso,
v.id_vehiculo,
ps.nombre_tipo_peso,
e.peso,
e.dimensiones,
e.volumen,
v.placas,
e.pago
FROM envio e
JOIN usuario u ON e.id_usuario = u.id_usuario
JOIN destinatario d ON e.id_destinatario = d.id_destinatario
INNER JOIN destino ds ON e.id_destino = ds.id_destino
INNER JOIN tipo_paquete tp ON e.id_tipo_paquete = tp.id_tipo_paquete
INNER JOIN tipo_peso ps ON e.id_tipo_peso = ps.id_tipo_peso
INNER JOIN vehiculo v ON e.id_vehiculo = v.id_vehiculo
WHERE e.id_envio = $ID"; 
//echo $sql;

$EnvioResult=mysqli_query($conexion, $sqldocumento);

foreach ($EnvioResult as $fila) {

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


<?php
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
  }
  
  
    // Output the PDF document
  
  ?>
   <div class="ppp">
   <div class="container">
        <div class="logo">
            <img src="./img/safe-delivery.png" alt="" whidth="200px"  height="207px">
        </div>
        <div class="fechas">
            <br>
            <label for="" class="slogan"><p><b>Envía hoy, Recibe mañana, protegemos <br> tus envíos  como si fueran nuestros</b></p></label>
            <input type="text" class="form-control n1" disabled value="<?php echo $fila['id_envio']; ?>">
            <br>
            <input type="text" class="form-control n2" disabled value="<?php echo $fila['fecha_envio']; ?>">
            <br>
            <input type="text" class="form-control n3" disabled value="<?php echo $fila['fecha_estimada']; ?>">

        </div>
        <div class="remitente"><b>Remitente</b></div>
        <div class="form-inline infoRem" >
            <input type="text" class="form-control in1" disabled value="<?php echo $fila['nombre_us']; ?>">
            <input type="text" class="form-control in2" disabled value="<?php echo $fila['apellido_us']; ?>">
            <input type="text" class="form-control in3" disabled value="<?php echo $fila['n_documento_us']; ?>">

        </div>
        <div class="enviodat"><b>Datos Envio</b>
        </div>
        <div class="datopaq">
            <label for=""><b>Paquete</b></label>
            <input type="text" class="form-control" disabled value="<?php echo $fila['nombre_tipo_paquete']; ?>">

            <label for=""> <b>Tipo Peso</b></label>
            <br><input type="text" class="form-control" disabled value="<?php echo $fila['nombre_tipo_peso']; ?>" >

            <label for=""> <b>Peso</b></label>
            <br><input type="text" class="form-control" disabled value="<?php echo $fila['peso']; ?>" >
            <label for=""><b>Volumen</b></label>
           <br> <input type="text" class="form-control" disabled value="<?php echo $fila['volumen']; ?>" >
           <label for=""><b>Dimensiones</b></label>
           <br> <input type="text" class="form-control" disabled value="<?php echo $fila['dimensiones']; ?>" >

        </div>
        <div class="pago">
            <label for=""><b>VALOR A COBRAR AL DESTINATARIO</b></label>
            <br> <input type="text" class="form-control" disabled value="<?php echo $fila['pago']; ?>" >

        </div>
        <div class="cont"><b>Contrato</b></div>
        <div class="contrato">
            <p><b>El objeto del presente contrato será la prestación del servicio de Mensajería Expresa, que consiste en el desarrollo de las actividades de recepción, clasificación, transporte y entrega de objetos postales cuyo peso sea inferior al señalado por las normas postales. Esto se realizará a través de redes postales, dentro del país o para envío hacia otros países o recepción desde el exterior, relacionados con un envío debidamente identificado.</b></p>
        </div>
        <div class="destino"><b>Destino</b></div>
        <div class="dest">
        <br> <input type="text" class="form-control" disabled value="<?php echo $fila['nombre_destino']; ?>" >

        </div>
        <div class="firma"><b>Firma: _______________________________</b></div>
        <div class="placas"><b>Placas</b>

        </div>
        <div class="plac">
        <br> <input type="text" class="form-control" disabled value="<?php echo $fila['placas']; ?>" >

        </div>
   </div> 
   </div>
   <?php } 
        ?>
</body>
</html>