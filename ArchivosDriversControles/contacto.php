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


	 public function guardar_asignatura($nombre, $horas, $maestro,$grado) {
        $this->sentencia = "INSERT INTO asignatura VALUES ('', '$nombre', '$horas', '$maestro', '$grado')";
        $bandera = $this->ejecutar_sentencia();
        return $bandera;
    }

	
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


	public function consultaralumno(){
		$this->sentencia = "SELECT * FROM alumno";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarmaestro(){
		$this->sentencia = "SELECT * FROM maestro";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarasignatura(){
		$this->sentencia = "SELECT * FROM asignatura";
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

	Public function listarmaestro(){
		//$nombre, $grado, $maestro, $id
		$this->sentencia = "SELECT p.nombre AS nombre , a.nombre AS asignatura FROM profesor p INNER JOIN asignatura a ON p.id = a.id";
		$bandera = $this->ejecutar_sentencia();
	}

	public function listarmaestros_maestros(){
		$this->sentencia = "SELECT nombre, apellido_paterno, apellido_materno FROM profesor";
		$bandera = $this->ejecutar_sentencia();
		return $bandera;
	}

	Public function listaralumno($id){
		$this->sentencia = "SELECT m.nombre_alumno, m.apellido_paterno, m.apellido_materno FROM matricula m INNER JOIN impartir i on m.id_asignatura = i.id_asignatura where i.id_maestro = '$id'";
		$bandera = $this->ejecutar_sentencia();
	}

	public function login_alumno($usuario_id, $contraseña){
		$this->sentencia = "SELECT id FROM usuarios WHERE id = '$usuario_id' AND contraseña = '$contraseña'";
		$bandera = $this->ejecutar_sentencia();
		return $bandera;
	}

	public function login_profesor($usuario_id, $contraseña){
		$this->sentencia = "SELECT id FROM profesor WHERE id = '$usuario_id' AND contraseña = '$contraseña'";
		$bandera = $this->ejecutar_sentencia();
		return $bandera;
	}

	public function verificaridadmin($id){
		$this->sentencia = "SELECT * FROM administrador;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function verificaridmaestro($id){
		$this->sentencia = "SELECT * FROM maestro;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function verificaridalumno($id){
		$this->sentencia = "SELECT * FROM alumno;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}


	public function registrarFaltaAsistencia($alumno_id, $fecha_falta) {
	
		// Query para insertar la falta de asistencia en la base de datos
		$this->sentencia = "INSERT INTO faltas_asistencia (alumno_id, fecha_falta) VALUES ('$alumno_id', '$fecha_falta')";
	
		// Ejecuta la consulta
		$bandera = $this->ejecutar_sentencia();
	
		// Retorna la bandera para indicar si la inserción fue exitosa o no
		return $bandera;
	}
	
	public function modificarFaltaAsistencia($falta_id, $alumno_id, $nueva_fecha_falta) {
	
		// Query para actualizar la fecha de la falta de asistencia en la base de datos
		$this->sentencia = "UPDATE faltas_asistencia SET fecha_falta = '$nueva_fecha_falta' WHERE id = '$falta_id' AND alumno_id = '$alumno_id'";
	
		// Ejecuta la consulta
		$bandera = $this->ejecutar_sentencia();
	
		// Retorna la bandera para indicar si la actualización fue exitosa o no
		return $bandera;
	}

	public function listarasignaturas($id){
		$this->sentencia = "SELECT nombre_asignatura FROM impartir WHERE id='$id'";
		$bandera = $this->ejecutar_sentencia();
		return $bandera;
	}
	public function consultarhorario($id){
		$this->sentencia ="SELECT horas,lunes,martes,miercoles,jueves,viernes FROM Horario Where id='$id'";
		$bandera = $this->ejecutar_sentencia();
		return $bsndera;
	}
	
}
?>