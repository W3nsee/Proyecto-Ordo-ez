<?php
include ("conexion.php");
/**
 * 
 */
class Contacto extends Conexion
{
	
	public function alta($nombre,$apellidos,$edad,$correo,$telefono)
	{
		$this->sentencia = "INSERT INTO contacto VALUES ('','$nombre','$apellidos','$edad','$correo','$telefono')";
		$bandera = $this->ejecutar_sentencia();
	}

	public function consultar(){
		$this->sentencia = "SELECT * FROM maestro;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function baja($id){
		$this->sentencia = "DELETE FROM maestro WHERE id='$id'";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function cargar(){
		$this->sentencia = "SELECT * From maestro";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function modificar($nombre,$apellidos,$edad,$correo,$telefono){
		$this->sentencia = "UPDATE contacto Set nombre='$nombre',apellidos='$apellidos',edad='$edad',correo='$correo',telefono='$telefono'";
		$bandera = $this->ejecutar_sentencia();
	}


	 public function guardar_asignatura($nombre, $horas, $maestro) {
        $this->sentencia = "INSERT INTO asignatura VALUES ('', '$nombre', '$horas', '$maestro')";
        $bandera = $this->ejecutar_sentencia();
        return $bandera;
    }
}
?>