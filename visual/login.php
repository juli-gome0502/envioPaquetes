<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/css/all.min.css">
    
</head>
<?php

session_start();
if(!empty($_SESSION['us_tipo'])){
    header('Location:../controlador/loginControler.php');
}
else{
session_destroy();

?>
<body>
    <style>
        .btn-info{
            display: block;
            width: 200px;
            height: 50px;
            margin-left:-5px;
            padding-top:13px;
            border-radius: 25px;
            outline: none;
            border: none;
            background-image: linear-gradient(to right, #680197, #00ffbf,#c046f8);
            background-size: 200%;
            font-size: 1rem;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
        }
        .btn-info:hover{
            background-position: right;
        }
    </style>
    <div class="row justify-content-end">
        <div class="col-auto">
            <a href="../RegistrarAdmin/registrarAdm.php" class="btn btn-info" data-bs-toggle="modal"><i class="fa-solid fa-circle-plus"></i> <b>Nuevo Taquillero</b></a>
        </div>
    </div>
   <img class="wave" src="../img/wave.png" alt="">
    <div class="contenedor">
        <div class="img">
            <img src="../img/bg.png" alt="">
        </div>
        <div class="contenido-login">
            <form action="../controlador/loginControler.php" method="POST">
                <img src="../img/logo.png" alt="">
                <h2>SAFE-DELIVERY</h2>
                <div class="input-div dni">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input type="text" name="user" class="input" require>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" name="pass" class="input" require>
                    </div>
                </div>
               
                <input type="submit" class="btn" value="Inicias Sesion">
            </form>
            
        </div>
    </div>
    
    <script src="../js/login.js"></script>
    
</body>

</html>
<?php


}
?>
