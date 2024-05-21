<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT OPTION AUTOMATICO</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        .container{
            width: 800px;
            background-color: #F2F2F2;
            position: relative; /* Enable positioning for the container */
            margin: 0 auto; /* Center the container horizontally */
            padding: 20px; /* Add some padding for content */
            background-color: #fff; /* Set background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a box shadow */
            transition: box-shadow 0.3s ease-in-out; /* Add a smooth transition for the shadow */
            display: flex; /* Enable flexbox layout */
            flex-direction: column; /* Arrange items vertically */
            align-items: center; /* Center items horizontally */
            justify-content: center; 
            padding-left:50px;
            

        }
        .container input{
            width: 700px;
        }
        .container select{
            width: 700px;
        }
        .in{
            width: 500px;
        }
        #peso{
            margin-left:10px;
        }
        .btncrear{
            background-color: skyblue; 
            border-radius: 20px;
            color:white;
            border: none;
            width: 100px;
            height: 50px;
            margin-top:580px;
            margin-left:-250px;
        }
        .btnreg{
            background-color: skyblue; 
            border-radius: 20px;
            color:white;
            border: none;
            width: 100px;
            height: 50px;
            margin-top:580px;
            margin-left:-220px;
        }
        
    </style>
    <div class="container">
        <br>
        <br>
        <center>
            <h2><b>CREAR GUÍA DE ENVÍO</b></h2>
        </center>
        <br>
        <form  id="codeForm" method="POST" action="./guardaGuia.php">
       
            <div class="row">
                <div class="col-6">
                    <div class="col-lg-10 form-group">
                        <label class="form-label"><b>N° DOCUMENTO</b></label>
                        <select class="form-control" required id="id_usuario" name="id_usuario">
                            <option value="0">--Selecciona una opcion--</option>
                            <?php
                            include "db.php";

                            $sql = "SELECT id_usuario, nombre_us, apellido_us, n_documento_us   FROM usuario ";
                            $resultado = mysqli_query($conexion, $sql);
                            while ($consulta = mysqli_fetch_array($resultado)) {
                                echo '<option value="' . $consulta['id_usuario'] . '">' . $consulta['n_documento_us'] . '</option>';
                            }

                            ?>

                        </select>
                    </div>
                    <br>
                    
                    <div class="form-group" id="select2lista">

                    </div>
                
                    

                </div>
                
                    <br>
                    <div>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">
                    </div><br><br>
                    
                    <div class="in">
                        <select id="destino" class="form-select mb-3" name="id_destino">
                            <option selected disabled>---Seleccionar Destino---</option>
                            <?php
                            
                                $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
                                if ($conexion->connect_error) {
                                die("Connection failed: " . $conexion->connect_error);
                                }
                                $sql = $conexion->query("SELECT id_destino,nombre_destino FROM destino");
                                while ($resultado = $sql->fetch_assoc()) {
                                echo "<option value='".$resultado['id_destino']."'>".$resultado
                                ['nombre_destino']."</option>";

                                }

                            ?>
                            </select>
                            <select class=" form-select mb-3" name="id_tipo_paquete">
                                <option selected disabled>---Seleccionar paquete---</option>
                                    <?php
                                    
                                        $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
                                        if ($conexion->connect_error) {
                                        die("Connection failed: " . $conexion->connect_error);
                                        }
                                        $sql = $conexion->query("SELECT id_tipo_paquete,nombre_tipo_paquete FROM tipo_paquete");
                                        while ($resultado = $sql->fetch_assoc()) {
                                        echo "<option value='".$resultado['id_tipo_paquete']."'>".$resultado
                                        ['nombre_tipo_paquete']."</option>";

                                        }

                                    ?>
                            </select>
                            <select class=" form-select mb-3" name="id_tipo_peso">
                            <option selected disabled>---Seleccionar peso---</option>
                            <?php
                            
                                $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
                                if ($conexion->connect_error) {
                                die("Connection failed: " . $conexion->connect_error);
                                }
                                $sql = $conexion->query("SELECT id_tipo_peso,nombre_tipo_peso FROM tipo_peso");
                                while ($resultado = $sql->fetch_assoc()) {
                                echo "<option value='".$resultado['id_tipo_peso']."'>".$resultado
                                ['nombre_tipo_peso']."</option>";

                                }

                            ?>
                        </select>
                    </div>
                    <input type="number" id="peso" class="form-control" name="peso" placeholder="Peso" require>
                
                    
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="form-group"><br>
                            <label class="form-label"><b>Teléfono Destinatario</b></label>
                            <select class="form-control" required id="id_destinatario" name="id_destinatario">
                                <option value="0">--Selecciona una opcion--</option>
                                <?php
                                include "db.php";

                                $sql = "SELECT id_destinatario, nombre_destinatario, apellido_destinatario, telefono_des   FROM destinatario ";
                                $resultado = mysqli_query($conexion, $sql);
                                while ($consulta = mysqli_fetch_array($resultado)) {
                                    echo '<option value="' . $consulta['id_destinatario'] . '">' . $consulta['telefono_des'] . '</option>';
                                }

                                ?>

                            </select>
                    </div>
                   
                    <div class="form-group" id="select3lista">
                    
                </div>
                <div class="col-lg-10"><br>
                    <input type="numbre" class="form-control" name="dimensiones" placeholder="Dimensiones">
                </div><br>
                <div class="col-lg-10">
                    
                    <input type="number" class="form-control" name="volumen" id="volumen" placeholder="Volumen">
                </div><br>
                
                <div>
                    <select class=" form-select mb-3" name="id_vehiculo">
                        <option selected disabled>---Seleccionar peso---</option>
                        <?php
                        
                            $conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');   
                            if ($conexion->connect_error) {
                            die("Connection failed: " . $conexion->connect_error);
                            }
                            $sql = $conexion->query("SELECT id_vehiculo,placas FROM vehiculo");
                            while ($resultado = $sql->fetch_assoc()) {
                            echo "<option value='".$resultado['id_vehiculo']."'>".$resultado
                            ['placas']."</option>";

                            }

                        ?>
                     </select>
                </div>
                <div class="col-lg-10">
                <input type="date" placeholder="Fecha Ingreso" name="fecha_ingreso" class="form-control">
                </div><br>
                <div class="col-lg-10">
                <input type="date" placeholder="fecha estimanda" name="fecha_estimada" class="form-control">
                </div><br>
                <div class="col-lg-10">
                <input type="text" placeholder="Pago" name="pago" class="form-control">
                
                </div>
                <br>
            </div>
            
            <button class="btncrear">Crear</button>
            <button href="./GuiadeEnvio.php" class="btnreg">Regresar</button>
        </form>
    </div>
</body>

</html>


<script>
    $(document).ready(function() {
        $('#id_usuario').val(0);
        $('#id_destinatario').val(0);
        recargarLista();

        $('#id_usuario').change(function() {
            recargarLista();
        });

        $('#id_destinatario').change(function() {
            recargarLista();
        });
    });

    function recargarLista() {
        const id_use = $('#id_usuario').val();
        const id_dest = $('#id_destinatario').val();

        $.ajax({
            type: "POST",
            url: "obtener.php",
            data: "nombre_us=" + id_use,
            success: function(r) {
                $('#select2lista').html(r);
            }
        });

        $.ajax({
            type: "POST",
            url: "obtenerDestina.php",
            data: "nombre_destinatario=" + id_dest,
            success: function(r) {
                $('#select3lista').html(r);
            }
        });
      
    }
</script>

