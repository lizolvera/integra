<?php
include_once 'Modelo/clsconexion.php';

class clslogin extends clsconexion{

  public function ConsultaUsuario($NOM) {
      $result = $this->conectar->query("CALL spConsultaUsuario('$NOM')");
      $res = $result->fetch_assoc();
      return $res;
  }
  
  public function RegistraUsuario($NomEquipo, $vchNombre, $vchAp, $vchAm) {
      $fecha = date('Y-m-d');
      $result = $this->conectar->query("CALL spRegistraUsuario('$NomEquipo', '$vchNombre', '$vchAp', '$vchAm', '$fecha');");
      return $result;
  }
}

?>