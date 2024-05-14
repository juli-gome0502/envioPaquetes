<?php
$conexion = new mysqli('localhost', 'root', '', 'bd_safe_delivery2');

$email =$_POST['email'];
$token = random_bytes(5);

include "./mail_reset.php";
if($enviado){
    $conexion->query("insert into paswword(email, token, codigo)
values('$email','$token','$codigo')") or die($conexion->error);
echo '<p>Verificar tu email para restablecer tu cuenta>/p>';
}


?>