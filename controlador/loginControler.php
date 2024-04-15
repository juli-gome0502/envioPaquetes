<?php
include_once '../modelo/usuario.php';
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$usuario = new usuario();

if(!empty($_SESSION['us_tipo'])){
    
    switch ($_SESSION['us_tipo']) {
        case 1:
            header('Location: ../visual/adm_catalogo.php');
            break;
        case 2:
            header('Location: ../visual/cli_catalogo.php');
            break;
    }
}
else{
    $usuario ->Loguearse($user,$pass);
    if(!empty($usuario->objetos)){
        foreach($usuario->objetos as $objeto) {
           $_SESSION['usuario']=$objeto->id_taquillero;
           $_SESSION['us_tipo']=$objeto->us_tipo;
           $_SESSION['nombre_taq']=$objeto->nombre_taq;
        }
        switch ($_SESSION['us_tipo']) {
            case 1:
                header('Location: ../visual/adm_catalogo.php');
                break;
            case 2:
                header('Location: ../visual/cli_catalogo.php');
                break;
        }
    }
    else{
        header('Location: ../visual/login.php');
    }
}

?>