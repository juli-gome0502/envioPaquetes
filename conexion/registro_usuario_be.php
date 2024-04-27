<?php
    include 'conexion_be.php';

    $nombre_us =$_POST['nombre_us'];
    $apellido_us = $_POST['apellido_us'];
    $n_Documento_us = $_POST['n_Documento_us'];
    $nombre_tipo_documento = $_POST['nombre_tipo_documento'];
    $Direccion = $_POST['Direccion'];
    $telefono_us = $_POST['telefono'];
    $correo_electronico_us = $_POST['correo_electronico_us'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    /* encriptamiento contraseña  */
/*     $contrasena = hash('sha512', $contrasena); */

    $query = "INSERT INTO usuario(nombre_us,apellido_us, n_Documento_us,nombre_tipo_documento,telefono, Direccion, correo_electronico_us,usuario,contrasena)
    VALUES('$nombre_us', '$apellido_us', '$n_Documento_us',  '$nombre_tipo_documento','$telefono_us','$Direccion','$correo_electronico_us','$usuario','$contrasena')";

    $conexion = mysqli_connect("localhost", "root", "", "bd_safe_delivery2");
    /* verificar que el correo no se repita */

    $verificar_dni = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo_electronico_us='$correo_electronico_us' ");
    if(mysqli_num_rows($verificar_dni) > 0){
        echo '
        <script>
        alert("Este correo ya está registrado, intenta con otro diferente");
        window.location = "../visual/registro.php";
        </script>
        ';

        exit(); /* imprime un mensaje y termina el script */
    } 
    $verificar_contrasena = mysqli_query($conexion, "SELECT* FROM usuario WHERE contrasena='$contrasena'");
    if(mysqli_num_rows($verificar_contrasena) > 0){
        echo '
        <script>
        alert("Está contraseña ya existe, intenta con otra diferente");
        window.location = "../visual/registro.php";
        </script>
        ';

        exit();
    } 
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
        <script>
            alert("Usuario almacenado exitosamente");
            window.location = "../visual/registro.php";
        </script)
        
        ';
    }else {
        echo '
        <script>
            alter("Intentalo de nuevo, usuario no almacenado)
            window.location = "../visual/registro.php";
            </script>
        ';
    }

    mysqli_close($conexion); 

  

?>