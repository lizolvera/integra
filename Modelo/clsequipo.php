<?php
include_once 'Modelo/clsconexion.php';

class clsequipo extends clsconexion{

	public function InsertarEquipos($NombreEquipo, $descripcion, $Fecha, $idUsuario) 
    {
		$Fecha = date('Y-m-d');
		$query = "CALL spRegistraEquipos('$NombreEquipo', '$descripcion', '$Fecha', '$idUsuario');";
		
		// Ejecutar la consulta y verificar errores
		if ($this->conectar->query($query) === TRUE) {
			return true;
		} else {
			// Mostrar el error de la consulta
			echo "Error: " . $this->conectar->error;
			return false;
		}
	}	
}
?>
