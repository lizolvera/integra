<?php
include_once 'Modelo/clsconexion.php';

class clsCliente extends clsconexion{

	public function insertarTareas($titulo, $descripcion, $id) {
		$fecha = date('Y-m-d');
		$query = "CALL spRegistrarTareas('$titulo', '$descripcion', '$fecha', '$id');";
		
		// Ejecutar la consulta y verificar errores
		if ($this->conectar->query($query) === TRUE) {
			return true;
		} else {
			// Mostrar el error de la consulta
			echo "Error: " . $this->conectar->error;
			return false;
		}
	}
	

    public function insertarEquipos($nombre,$descripcion,$id) {
        $fecha = date('Y-m-d');
		$result = $this->conectar->query("CALL spRegistrarTareas('$nombre',$descripcion,'$fecha','$id');");
		return $result;   
	}

}
?>