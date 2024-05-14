<?php
// Varios destinatarios
$para = $email. ','; // Puedes agregar más destinatarios separados por comas
// Configuración para Gmail
$smtp_server = 'smtp.gmail.com';
$smtp_port = 587; // O 465 si utilizas SSL
$smtp_username = 'juligom717@gmail.com';
$smtp_password = '';
// Título del correo
$título = 'Restablecer contraseña Safe Delivery';
$codigo = rand(1000, 9999); // Genera un código aleatorio para la recuperación de contraseña

// Mensaje HTML
$mensaje = '
<html>
<head>
  <title>Restablecer contraseña Safe Delivery</title>
</head>
<body>
  <h1>SAFE DELIVERY</h1>
  <p>Restablecer contraseña</p>
  <h3>' . $codigo . '</h3>
  <p><a href="https://localhost/envioPaquetes/contrasena/reset.php?email='.$email.'&token='.$token.'">Haz clic aquí para restablecer tu contraseña</a></p>


  <p><small>Si no solicitaste esto, ignora este correo.</small></p>
</body>
</html>
';

// Cabeceras del correo
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";/* 
$headers .= 'From: Safe Delivery <info@tudominio.com>' . "\r\n";  */// Cambia la dirección de correo y el nombre del remitente
$enviado=false;
// Envía el correo
if (mail($para, $título, $mensaje, $headers, "-f $smtp_username")) {
  $enviado = true;
}
?>
