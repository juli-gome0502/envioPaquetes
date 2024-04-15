<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guia de Envio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="..//css/guiaenvio.css">
</head>
<body class="body">
    <ul class="menu">
        <li class="navli">
          <a class="nava" href="../visual/bienvenido.php">Envios Realizados</a>
        </li>
        <li class="navli">
          <a  class="nava" href="../visual/envios.php">Notificaciones</a>
        </li>
        
        
        
    </ul>
    <h1 align="center" class="ha1">Guia de Envio</h1>
    <img src="../img/safe-delivery.png" class="safe-delivery" alt="">
    <div class="guia_envio">
        
        <div class="buscar_doc">
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group mb-3">
                    <label for="n_documento" id="n_documento">N° Documento:</label>
                    <input type="text" class="form-control" id="n_documento" name="n_documento" required>
                </div>
                <input type="submit" class="btn btn-primary" id="btn_buscar" value="Buscar">
            </form>
        </div>

        <?php

            // Database connection parameters
            $servidor = "localhost";
            $db = "bd_safe_delivery2";
            $usuario = "root";
            $contrasena = "";

            // Create connection
            $conexion = new mysqli($servidor, $usuario, $contrasena, $db);

            // Check connection
            if ($conexion->connect_error) {
                die("Connection failed: " . $conexion->connect_error);
            }

            // Handle form submission
            if (isset($_POST['n_documento'])) {
                $n_documento = $_POST['n_documento'];

                // Prepare and execute query to fetch data
                $sql = "SELECT nombre_us, apellido_us,n_documento_us, telefono FROM usuario WHERE n_documento_us = ?";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("s", $n_documento);
                $stmt->execute();
                $result = $stmt->get_result();


                // Check if N_documento exists
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    // Extract data from the fetched row
                    $nombre = $row['nombre_us'];
                    $apellido = $row['apellido_us'];
                    $documento = $row['n_documento_us'];
                    $telefono = $row['telefono'];

                    // Create responsive table with Bootstrap classes
                    echo '<table class="table table-hover" id="tab_docu">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Nombre</th>';
                    echo '<th scope="col">Apellido</th>';
                    echo '<th scope="col">Teléfono</th>';
                    echo '<th scope="col">Documento</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    // Display retrieved data in a table row
                    echo '<tr>';
                    echo '<td>' . $nombre . '</td>';
                    echo '<td>' . $apellido . '</td>';
                    echo '<td>' . $telefono . '</td>';
                    echo '<td>' . $documento . '</td>';
                    echo '</tr>';

                    echo '</tbody>';
                    echo '</table>'; // Close table
                } else {
                     // Display "No Datos" message using Bootstrap alert class
                        echo '<div class="alert alert-danger" role="alert">';
                        echo '<strong>No hay Datos</strong>';
                        echo '</div>';

                
                }
            }

            // Close database connection
            $conexion->close();

        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group mb-3">
                <label for="nombre_destinatario" id="nombre_destinatario">Nombre Destinatario:</label>
                <input type="text" class="form-control" id="nombre_destinatario" name="nombre_destinatario" required>
            </div>
                <input type="submit" class="btn btn-primary" id="btn_buscar" value="Buscar">
        </form>

        <?php

            // Database connection parameters
            $servidor = "localhost";
            $db = "bd_safe_delivery2";
            $usuario = "root";
            $contrasena = "";

            // Create connection
            $conexion = new mysqli($servidor, $usuario, $contrasena, $db);

            // Check connection
            if ($conexion->connect_error) {
                die("Connection failed: " . $conexion->connect_error);
            }

            // Handle form submission
            if (isset($_POST['nombre_destinatario'])) {
                $nombre_destinatario = $_POST['nombre_destinatario'];

                // Prepare and execute query to fetch data
                $sql = "SELECT nombre_destinatario, apellido_destinatario, telefono_des FROM destinatario WHERE nombre_destinatario LIKE ?";
                $stmt = $conexion->prepare($sql);
                $search_term = "%$nombre_destinatario%";
                $stmt->bind_param("s", $search_term);
                $stmt->execute();
                $result = $stmt->get_result();


                // Check if name exists
                if ($result->num_rows > 0) {
                    // Create responsive table with Bootstrap classes
                    echo '<table class="table table-hover" id="tab_dest">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Nombre</th>';
                    echo '<th scope="col">Apellido</th>';
                    echo '<th scope="col">Teléfono</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    // Display retrieved data in table rows
                    while ($row = $result->fetch_assoc()) {
                        $nombre = $row['nombre_destinatario'];
                        $apellido = $row['apellido_destinatario'];
                        $telefono = $row['telefono_des'];

                        echo '<tr>';
                        echo '<td>' . $nombre . '</td>';
                        echo '<td>' . $apellido . '</td>';
                        echo '<td>' . $telefono . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>'; // Close table
                } else {
                    // Display "No Datos" message using Bootstrap alert class
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '<strong>No se encontró ningún destinatario con ese nombre.</strong>';
                    echo '</div>';
                }
            }

            // Close database connection
            $conexion->close();

        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-kenU1KFdBIe4zVFQWjxHVCzUb6yLqmZT9TflXBjQl9zLLWxQfw86StStWWVBt4zY" crossorigin="anonymous"></script>
    </div>
 
    <div class="buscar_dest">

        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVFQWjxHVCzUb6yLqmZT9TflXBjQl9zLLWxQfw86StStWWVBt4zY" crossorigin="anonymous"></script>
    </div>
</body>
</html>
