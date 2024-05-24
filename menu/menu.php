<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../css/MenuStyle.css">
</head>
<body class="body1">
    <div id="sidemenu" class="menu-collapsed">
    <!-- HEADER -->
        <div id="header">
            <div id="title"><span><a href="../controlador/logout.php">Cerrar sesion</a></span> </div>
            <div id="menu-btn">
                <div class="btn-iconos"></div>
                <div class="btn-iconos"></div>
                <div class="btn-iconos"></div>
            </div>
        </div>
        <!-- PROFILE -->
        <div id="profile">
            <div id="photo"><img src="../img/usu.png" alt="" ></div>
            <div id="name"><span>Administrador</span></div>
        </div>
        <div id="menu-items">
            <div class="item">
                <a href="../visual/Taquillero.php">
                    <div class="icon"><img src="../img/usu.png" alt="" width="100px"></div>
                    <div class="title"><span>Taquillero</span></div>
                </a>
            </div>
            
            <div class="item">
                <a href="../visual/Conductor.php">
                    <div class="icon"><img src="../img/conduc.png" alt="" width="100px"></div>
                    <div class="title"><span>Conductor</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../visual/TabVehiculo.php">
                    <div class="icon"><img src="../img/camion.png" alt="" width="100px"></div>
                    <div class="title"><span>Vehículo</span></div>
                </a>
            </div>
            <div class="item-separator">

            </div>
            <div class="item">
                <a href="../visual/destino.php">
                    <div class="icon"><img src="../img/map.png" alt="" ></div>
                    <div class="title"><span>Destino</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../visual/EstadoTaq.php">
                    <div class="icon"><img src="../img/estado_taq.png" alt=""></div>
                    <div class="title"><span>Estado Taquillero</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../visual/TipoPaquete.php">
                    <div class="icon"><img src="../img/box.png" alt="" width="100px"></div>
                    <div class="title"><span>Tipo Paquete</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../visual/TipoPeso.php">
                    <div class="icon"><img src="../img/peso.png" alt="" width="100px"></div>
                    <div class="title"><span>Tipo Peso</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../visual/TipoUsuario.php">
                    <div class="icon"><img src="../img/comunidad.png" alt="" width="100px"></div>
                    <div class="title"><span>Tipo Usuario</span></div>
                </a>
            </div>
            <div class="item">
                <a href="../visual/Vehiculo.php">
                    <div class="icon"><img src="../img/bus-solid.png" alt="" width="100px"></div>
                    <div class="title"><span>Tipo Vehiculo</span></div>
                </a>
            </div>
        </div>
    </div>
    <!-- <div id="main-container">
        hola todos
    </div> -->
    <script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#sidemenu');
        btn.addEventListener('click', e =>{
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");
            document.querySelector('body').classList.toggle('body-expanded');
        });
    </script>
</html>