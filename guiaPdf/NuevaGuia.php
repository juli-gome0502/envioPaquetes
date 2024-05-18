<?php
$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
  }
$sqlGuia= "SELECT e.id_envio, e.id_usuario, e.id_destinatario, e.id_vehiculo, e.id_taquillero,
       e.id_destino, e.fecha_envio, e.fecha_estimada, e.direccion, e.id_tipo_paquete,
       e.id_tipo_peso, e.peso, e.dimensiones, e.volumen, u.nombre_us, u.apellido_us,
       d.nombre_destinatario AS nombre_destinatario, d.apellido_destinatario, d.telefono_des, v.placas, v.n__bus, t.nombre_taq, t.apellido_taq,
       p.nombbre_tipo_peso, c.bombre_tipo_paquete, b.nombre_destino
FROM envio AS e
INNER JOIN id_usuario AS u ON e.ID_USUARIO = u.ID_USUARIO
INNER JOIN id_destinatario AS d ON e.ID_DESTINATARIO = d.ID_DESTINATARIO
INNER JOIN id_vehiculo AS v ON e.ID_VEHICULO = v.ID_VEHICULO
INNER JOIN id_taquillero AS t ON e.ID_TAQUILLERO = e.ID_TAQUILLERO
INNER JOIN id_tipo_peso AS p ON e.ID_TIPO_PESO = e.ID_TIPO_PESO
INNER JOIN id_tipo_paquete AS c ON e.ID_TIPO_PAQUETE = e.ID_TIPO_PAQUETE
INNER JOIN id_destino AS b ON e.ID_DESTINO = e.ID_DESTINO";

$resultado = $conexion->query($sqlGuia);

if (!$resultado) {
  echo "Error: " . $conexion->error;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Guia de ENVIO</title>
    <link rel="stylesheet" href="../css/envios.css">
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
    <style>
        input[type="text"],
        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 60%;
            padding: 8px;
            border: 1px solid skyblue;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }
        body{
            background-color:#F2F2F2;
            padding-left:90px;
        }
        .envios{
            width: 1000px;
        }
        #id_destino, #id_tipo_peso, #id_tipo_paquete, #id_vehiculo{
           width: 59%;
        }
        .des{
            margin-left:-110px;
        }
        .con2{
            margin-left:-256px;
        }
        .con3{
            margin-left:157px ;
            margin-top:-415px;
        }
    </style>
</header>
<body>
    <center>
    <center><h1>CREAR GUÍA DE ENVIO</h1></center>
        <div class="envios">
        <form action="" method="POST">
            
            <div class="row">
                <div class="col-sm-6">
                    <label for="" class="form-label">Remitente</label>
                    <select class="form-control" required name="id_usuario" id="">
                
                    </select>

                    <br>
                    <div class="form-group" id="select2lista">

                    </div>
                    <br>
                    <input type="text" placeholder="Apellido" class="form-control">
                    <br>
                    <input type="text" placeholder="Documento" class="form-control">
                    <br>
                    <input type="text" placeholder="Tipo_documento" class="form-control">

                </div>
                <div class="col-sm-6 des">
                    <label for="" class="form-label">Destinatario</label>
                    <input type="text" placeholder="Buscar por N° Teléfono" class="form-control">
                    <br>
                    <input type="text" placeholder="Nombre" class="form-control">
                    <br>
                    <input type="text" placeholder="Apellido" class="form-control">
                    <br>
                    <input type="text" placeholder="Teléfono" class="form-control">

                </div>
            </div>
            
            <div class="row">
                <div class="con2">
                    <div class="col-sm-6">
                    <br>
                    <select class="form-select"  name="" id="id_destino">
                        <option value="">---Destino---</option>
                    
                    </select>
                    </div>
                    <br>
                    <div class="col-sm-6">
                    <input type="text" placeholder="Direccion" class="form-control">
                    </div>
                    
                    <div class="col-sm-6">
                    <br>
                    <select class="form-select"   name="" id="id_tipo_paquete">
                        <option value="">---Tipo id_tipo_paquete---</option>
                    </select>
                    </div>
                    <div class="col-sm-6">
                    <br>
                    <select class="form-select"  name="" id="id_tipo_peso">
                        <option value="">----Tipo Peso</option>
                    </select>
                    </div><br>
                    <div class="col-sm-6">
                    <input type="text" placeholder="Ingrese Peso" class="form-control">
                    </div>
                    <br>
            
                </div>
            <div class="row">
            <div class="con3">
                <div class="col-sm-6">
                <input type="text" placeholder="Dimensiones" class="form-control">
                </div>
                <br>
                <div class="col-sm-6">
                <input type="text" placeholder="ingrese" class="form-control">
                </div><br>
                <div class="col-sm-6">
                <select class="form-select"  name="" id="id_vehiculo">
                    <option value="">---Selecione placa del Vehiculo---</option>
                </select>
                </div><br>
                <div class="col-sm-6">
                <input type="date" placeholder="Fecha Ingreso" class="form-control">
                </div><br>
                <div class="col-sm-6">
                <input type="date" placeholder="fecha estimanda" class="form-control">
                </div><br>
                <div class="col-sm-6">
                <input type="text" placeholder="Pago" class="form-control">
                </div>
            </div>

            </div>
            
            
        </form>
        </div>
    
    </center>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/4aZT6UO2/O+0495CT4tG9kXH7Zk//mkkn/1M0" crossorigin="anonymous"></script>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    
</body>
</html>

<script>
    $(document).ready(function() {
        $('#id_usuario').val(0);
        recargarLista();

        $('#id_usuario').change(function() {
            recargarLista();
        });
    })
</script>
<script>
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "obtener.php",
            data: "nombre_us=" + $('#id_usuario').val(),
            success: function(r) {
                $('#select2lista').html(r);
            }
        });
    }
</script>