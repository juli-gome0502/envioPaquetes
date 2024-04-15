<?php
include_once '../conexion/conexion_be.php';
class usuario{
    var $objetos;
    public function __construct(){
        $db = new conexion();
        $this->acceso = $db->pdo;
    }
    function Loguearse($dni,$pass){
        $sql="SELECT * FROM taquillero_geren inner join tipo_usuario on us_tipo=id_tipo_usuario where usuario_taq=:dni and  contrasena_taq=:pass";  
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni, ':pass'=>$pass));
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
}
?>