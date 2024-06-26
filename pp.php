<?php
    
    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: ../visual/bienvenido.php");
    }
   /*  include '../conexion/conexion_be.php'; */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login y registro</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

</head>

<body>
    
    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>
            <style>
                .olveclav{
                    color: #00A2E8; /* Color similar al botón "Entrar" */
                    text-decoration: none;
                    float: right; /* Alineado a la derecha */
                    margin-right: 20px;
                     
                }
            </style>
            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="./modelo/login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Usuario" name="usuario" id="usuario" require>
                    <input type="password" placeholder="Contraseña" name="contrasena" id="contrasena" require>
                    <br><br>
                    
                    <button name="entrar">Entrar</button>
                    
                </form>

                <!--Register-->
                <form action="./conexion/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <input type="text" class="form-control"  placeholder="Nombre completo" name="nombre_us" required> 
                    <input type="text" class="form-control" placeholder="Apellido completo" name="apellido_us"  required>
                    <style>
                        #id_tipo_documento{
                            background-color: #cccccc;
                            margin-top:5px;
                        }
                    </style>
                    <input type="number" class="form-control" placeholder="Documento" name="n_Documento_us"  required><br>
                    <select class="form-control" name="tipo_documento" id="tipo_documento" placeholder="Tipo documento">
                        <option value="0"></option>
                        <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                        <option value="nit">NIT</option>
                    </select>

                   
                    <input type="number" class="form-control" placeholder="Teléfono" name="telefono"  required>
                    <input type="text" class="form-control" placeholder="Dirección" name="Direccion"  required>
                    <input type="text"class="form-control" action="" placeholder="Corre Electronico" name="correo_electronico_us"  required>
                    <input type="text" class="form-control" placeholder="Usuario" name="usuario"  required>
                    <input type="password"class="form-control" placeholder="Contraseña" name="contrasena"  required>
                    <button>Regístrarse</button>
                   
                </form>
            </div>
        </div>

    </main>

    <script  src="./js/script.js"></script>
    
</body>
</html>
