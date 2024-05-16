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
                    <input type="text" placeholder="Buscar Remitente por Documento" class="form-control">
                    <br>
                    <input type="text" placeholder="Nombre"class="form-control">
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