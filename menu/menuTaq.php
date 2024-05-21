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
            <div id="photo"><img src="../img/user-solid.png" alt="" ></div>
            <div id="name"><span>Taquillero</span></div>
        </div>
        <div id="menu-items">
            <div class="item">
                <a href="../visual/destinatario.php">
                    <div class="icon"><img src="../img/logo.png" alt="" width="100px"></div>
                    <div class="title"><span>Destinatario</span></div>
                </a>
            </div>
            
            <div class="item-separator">

            </div>
       
            
        
        </div>
        <div id="menu-items">
            <div class="item">
                <a href="../tutorial2/GuiadeEnvio.php">
                    <div class="icon"><img src="../img/envio.png" alt="" width="100px"></div>
                    <div class="title"><span>Guía de Envío</span></div>
                </a>
            </div>
            
            <div class="item-separator">

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