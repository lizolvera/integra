<?php
include_once 'Modelo/clsconexion.php';

class clsReportes extends clsconexion {

    public function obtenerNumerodeCuenta($idCliente) {
        $result = $this->conectar->query("SELECT vchnum_cuenta FROM tblcuenta WHERE idcliente = '$idCliente'");
        $cuenta = $result->fetch_assoc();
        return $cuenta['vchnum_cuenta'];
    } 
   

    public function ConsultaCuenta($cuenta) {
        $sql = "CALL spReportes('$cuenta');";
        $resultado = $this->conectar->query($sql);
        return $resultado;
    }
}
?>
