<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auto-complete Data</title>
    <link rel="stylesheet" href="../css/guiaenvio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <ul class="menu">
        <li class="navli">
          <a class="nava" href="../visual/bienvenido.php">Envios Realizados</a>
        </li>
        <li class="navli">
          <a  class="nava" href="../visual/envios.php">Notificaciones</a>
        </li>
        
        
        
    </ul>
    <div class="guia_envio">
    <h1>Auto-complete Information</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="n_documento">N_documento:</label>
        <input type="text" id="n_documento" name="n_documento" required>
        <input type="submit" value="Buscar">
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
    if (isset($_POST['n_documento'])) {
        $n_documento = $_POST['n_documento'];

        // Prepare and execute query to fetch data
        $sql = "SELECT nombre_us, apellido_us, telefono, direccion FROM usuario WHERE n_documento_us = ?";
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
            $telefono = $row['telefono'];
            $direccion = $row['direccion'];

            // Fill input fields with retrieved data
            echo "<label id='nombre'>Nombre: $nombre</label>";
            echo "<p>Apellido: $apellido</p>";
            echo "<p>Teléfono: $telefono</p>";
            echo "<p>Dirección: $direccion</p>";
        } else {
            echo "<p>N_documento no encontrado en la base de datos.</p>";
        }
    }

    // Close database connection
    $conexion->close();

    ?>
    <style>
        <?php
            $color = "red";
        ?>
        #nombre {
            background-color: <?php echo $color; ?>;
        }
    </style>
    </div>

</body>
</html>


