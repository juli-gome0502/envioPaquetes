<?php

?>
<!-- session_start();
 include '../conexion/conexion_be.php';

    if (!empty($_POST["entrar"])){
        if (!empty($_POST["usuario"]) and !empty($_POST["contrasena"])){
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            $contrasena = hash('sha512', $contrasena);
            $sql=$conexion->query("SELECT * FROM usuario WHERE usuario='$usuario' and contrasena='$contrasena'");
            if ($sql->fetch_object()) {
                header("location:../visual/bienvenido.php");
            } else {
                echo'
                    <script>
                    alert("Los campos estan vacios);
                    window.location = "../visual/registro.php";
                    </script>
                    ';
                    exit;
            }
        } else {
            echo'
            <script>
            alert("Los campos estan vacios);
            window.location = "../visual/registro.php";
            </script>
                ';
            exit;
        }
    }  -->

/* session_start();

include '../conexion/conexion_be.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);

// Comprobar si el usuario existe
$validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario' and contrasena='$contrasena'");

if(mysqli_num_rows($validar_login)> 0){
    $_SESSION['usuario'] = $usuario;
    header("location: ../visual/bienvenido.php");
    exit;
}else{
    echo'
        <script>
        alert("Usuario no existe, Por favor verifique los datos introducidos);
        window.location = "../visual/registro.php";
        </script>
    ';
    exit;

}   */

    
?>
