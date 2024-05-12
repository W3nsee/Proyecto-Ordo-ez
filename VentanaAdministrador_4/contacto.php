<?php 
include ("conexion.php");
Class Contacto extends Conexion{
	
	public function altaalumno($nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo){
		$this->sentencia = "INSERT INTO alumno VALUES('','','$nombre','$apellidopaterno','$apellidomaterno','$fechanacimiento',
			'$telefono','$correo','$sexo')";
		$bandera = $this->ejecutar_sentencia();
	}

	public function altamaestro($nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo){
		$this->sentencia = "INSERT INTO maestro VALUES('','','$nombre','$apellidopaterno','$apellidomaterno','$fechanacimiento',
			'$telefono','$correo','$sexo')";
		$bandera = $this->ejecutar_sentencia();
	}

	 public function altaasignatura($nombre, $grado, $maestro) {
        $this->sentencia = "INSERT INTO asignatura VALUES ('','$nombre', '$grado', '$maestro')";
        $bandera = $this->ejecutar_sentencia();
        return $bandera;
    }

	public function consultaralumno(){
		$this->sentencia = "SELECT * FROM alumno;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarmaestro(){
		$this->sentencia = "SELECT * FROM maestro;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarasignatura(){
		$this->sentencia = "SELECT * FROM asignatura;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function bajaalumno($id){
		$this->sentencia = "DELETE FROM alumno WHERE id = '$id'";
		$this->ejecutar_sentencia();
	}

	public function bajamaestro($id){
		$this->sentencia = "DELETE FROM maestro WHERE id = '$id'";
		$this->ejecutar_sentencia();
	}

	public function bajaasignatura($id){
		$this->sentencia = "DELETE FROM asignatura WHERE id = '$id'";
		$this->ejecutar_sentencia();
	}

	Public function cargaralumno($id){
		$this->sentencia = "SELECT * FROM alumno WHERE id='$id'";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	Public function cargarmaestro($id){
		$this->sentencia = "SELECT * FROM maestro WHERE id='$id'";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	Public function cargarasignatura($id){
		$this->sentencia = "SELECT * FROM asignatura WHERE id='$id'";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	Public function modificaralumno($nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo,$id){
		$this->sentencia = "UPDATE alumno SET nombre='$nombre', apellido_paterno='$apellidopaterno',apellido_materno='$apellidomaterno',fecha_nacimiento='$fechanacimiento',telefono='$telefono',correo='$correo',sexo='$sexo' WHERE id = '$id'";
		$bandera = $this->ejecutar_sentencia();
	}

	Public function modificarmaestro($nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo,$id){
		$this->sentencia = "UPDATE maestro SET nombre='$nombre', apellido_paterno='$apellidopaterno',apellido_materno='$apellidomaterno',fecha_nacimiento='$fechanacimiento',telefono='$telefono',correo='$correo',sexo='$sexo' WHERE id = '$id'";
		$bandera = $this->ejecutar_sentencia();
	}

	Public function modificarasignatura($nombre,$grado,$maestro,$id){
		$this->sentencia = "UPDATE asignatura SET nombre='$nombre', grado='$grado', id_maestro = '$maestro' WHERE id = '$id'";
		$bandera = $this->ejecutar_sentencia();
	}

	Public function listarmaestro($nombre, $grado, $maestro, $id){
		$this->sentencia = "SELECT p.nombre AS nombre_profesor, a.nombre AS asignatura
							FROM profesor p
							INNER JOIN asignatura a ON p.id = a.matricula_profesor;
		";
		$bandera = $this->ejecutar_sentencia();
	}
}
?>