<?php 
include ("conexion.php");
Class Contacto extends Conexion{

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
	
	public function altaalumno($contrasena,$nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo){
		$this->sentencia = "INSERT INTO alumno VALUES('','$contrasena','$nombre','$apellidopaterno','$apellidomaterno','$fechanacimiento',
			'$telefono','$correo','$sexo','')";
		$bandera = $this->ejecutar_sentencia();   
	}

	public function gradogrupo($id,$grado,$grupo,$idsalon){
	     $this->sentencia = "UPDATE alumno SET id_salon = '$idsalon' WHERE id = '$id';";
		  $bandera = $this->ejecutar_sentencia(); 
	}

	public function consultaridsalon($grado,$grupo){
		$this->sentencia = "SELECT * FROM salon WHERE grado = '$grado' AND grupo = '$grupo';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function altamaestro($contrasena,$nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo){
		$this->sentencia = "INSERT INTO maestro VALUES('','$contrasena','$nombre','$apellidopaterno','$apellidomaterno','$fechanacimiento',
			'$telefono','$correo','$sexo')";
		$bandera = $this->ejecutar_sentencia();   
	}

	 public function altaasignatura($nombre, $grado) {
        $this->sentencia = "INSERT INTO asignatura VALUES ('','$nombre', '$grado')";
        $bandera = $this->ejecutar_sentencia();
        return $bandera;
    }

    public function pasaridasignatura($id, $nombre, $maestro, $nombremaestro, $apellidopaterno, $apellidomaterno) {
    $this->sentencia = "INSERT INTO impartir VALUES ('$id','$nombre','$maestro','$nombremaestro','$apellidopaterno','$apellidomaterno')";
    $bandera = $this->ejecutar_sentencia(); 
}


	public function consultaralumno(){
		$this->sentencia = "SELECT * FROM alumno;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultaralumnoconid($alumno){
		$this->sentencia = "SELECT * FROM alumno WHERE id = '$alumno';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultaralumnomismaclase($idsalon,$alumno){
		$this->sentencia = "SELECT * FROM alumno WHERE id_salon = '$idsalon' AND id != '$alumno';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarsolounalumno($correo){
		$this->sentencia = "SELECT * FROM alumno WHERE correo = '$correo';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarmaestro(){
		$this->sentencia = "SELECT * FROM maestro;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarsolounmaestro($maestro){
		$this->sentencia = "SELECT * FROM maestro WHERE id = '$maestro';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarasignatura(){
		$this->sentencia = "SELECT * FROM asignatura;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarasignaturaimpartida($maestro){
		$this->sentencia = "SELECT * FROM impartir WHERE id_maestro = '$maestro';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}
	
	
	public function listar_maestros_alumnos($id){
		$this->sentencia = "SELECT impartir.nombre_asignatura, impartir.nombre_maestro, impartir.apellido_paterno, impartir.apellido_materno from impartir inner JOIN matricula on impartir.id_asignatura = matricula.id_asignatura where matricula.id_alumno = '$id'";
		$bandera = $this->ejecutar_sentencia();
		return $bandera;
	}

	public function consultarmaestroconidasignatura($idasignatura){
		$this->sentencia = "SELECT * FROM impartir WHERE id_asignatura = '$idasignatura';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultaralumnomatriculado($id){
		$this->sentencia = "SELECT * FROM matricula WHERE id_asignatura = '$id';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultaralumnomatriculadoconidalumno($id){
		$this->sentencia = "SELECT * FROM matricula WHERE id_alumno = '$id';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarsolounalumnomatriculado($idalumno,$idasignatura){
		$this->sentencia = "SELECT * FROM matricula WHERE id_alumno = '$idalumno' AND id_asignatura = '$idasignatura';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarsolounaasignatura($nombre){
		$this->sentencia = "SELECT * FROM asignatura WHERE nombre = '$nombre';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarfaltas($idalumno,$idasignatura){
		$this->sentencia = "SELECT * FROM faltas_asistencia WHERE id_asignatura = '$idasignatura' AND alumno_id = '$idalumno';";
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

	public function eliminarmatriculaalumno($id){
       $this->sentencia = "DELETE FROM matricula WHERE id_alumno = '$id'";
       $this->ejecutar_sentencia();
    }

    public function eliminarmatriculaasignatura($id){
       $this->sentencia = "DELETE FROM matricula WHERE id_asignatura = '$id'";
       $this->ejecutar_sentencia();
    }

    public function eliminaridmaestro($id){
       $this->sentencia = "DELETE FROM impartir WHERE id_maestro = '$id'";
       $this->ejecutar_sentencia();
    }

    public function eliminaridasignatura($id){
       $this->sentencia = "DELETE FROM impartir WHERE id_asignatura = '$id'";
       $this->ejecutar_sentencia();
    }

	Public function cargaralumno($idalumno){
		$this->sentencia = "SELECT * FROM alumno WHERE id='$idalumno'";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	Public function cargarmaestro($id){
		$this->sentencia = "SELECT * FROM maestro WHERE id='$id'";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	Public function cargarasignatura($idasignatura){
		$this->sentencia = "SELECT * FROM asignatura WHERE id='$idasignatura'";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	Public function modificaralumno($contrasena,$nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo,$id){
		$this->sentencia = "UPDATE alumno SET contrasena = '$contrasena', nombre='$nombre', apellido_paterno='$apellidopaterno',apellido_materno='$apellidomaterno',fecha_nacimiento='$fechanacimiento',telefono='$telefono',correo='$correo',sexo='$sexo' WHERE id = '$id'";
		$bandera = $this->ejecutar_sentencia();
	}

	Public function modificarmaestro($contrasena,$nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo,$id){
		$this->sentencia = "UPDATE maestro SET contrasena = '$contrasena', nombre='$nombre', apellido_paterno='$apellidopaterno',apellido_materno='$apellidomaterno',fecha_nacimiento='$fechanacimiento',telefono='$telefono',correo='$correo',sexo='$sexo' WHERE id = '$id'";
		$bandera = $this->ejecutar_sentencia();
	}

	Public function modificarasignatura($nombre,$grado,$maestro,$id){
		$this->sentencia = "UPDATE asignatura SET nombre='$nombre', grado='$grado' WHERE id = '$id'";
		$bandera = $this->ejecutar_sentencia();
	}

	public function matricularalumno($idasignatura,$nombreasignatura,$idalumno,$nombrealumno,$apellidopaterno,$apellidomaterno){
      $this->sentencia = "INSERT INTO matricula VALUES ('$idasignatura', '$nombreasignatura', '$idalumno', '$nombrealumno', '$apellidopaterno', '$apellidomaterno')";
      $bandera = $this->ejecutar_sentencia();
   }

   public function ponerfalta($idasignatura,$nombreasignatura,$idalumno,$nombrealumno,
   	$apellidopaterno,$apellidomaterno,$falta){
       $this->sentencia = "INSERT INTO faltas_asistencia VALUES ('','$idasignatura', '$nombreasignatura', '$idalumno', '$nombrealumno', '$apellidopaterno', '$apellidomaterno', '$falta')";
       $this->ejecutar_sentencia();
    }

    public function eliminarfalta($id){
		$this->sentencia = "DELETE FROM faltas_asistencia WHERE id = '$id'";
		$this->ejecutar_sentencia();
	}

	Public function modificarfalta($idfalta,$fecha){
		$this->sentencia = "UPDATE faltas_asistencia SET fecha_falta='$fecha' WHERE id = '$idfalta'";
		$bandera = $this->ejecutar_sentencia();
	}

	   public function listarasignatura($id){
	$this->sentencia = "SELECT * FROM impartir where id_maestro='$id'";
	$bandera = $this->ejecutar_sentencia();
	return $bandera;
   }


   public function asignar_parcial_1($parcial_1,$idalumno,$idasignatura){
	$this->sentencia = "INSERT INTO calificacion VALUES ('$parcial_1', '', '', '$idalumno', '$idasignatura')";
	$bandera = $this->ejecutar_sentencia();
	return $bandera;
   }
	
   public function asignar_parcial_2($parcial_2, $idalumno, $idasignatura){
    $this->sentencia = "UPDATE calificacion SET parcial_2 = '$parcial_2' WHERE id_alumno = '$idalumno' AND id_asignatura = '$idasignatura'";
    $bandera = $this->ejecutar_sentencia();
    return $bandera;
}

public function asignar_parcial_3($parcial_3, $idalumno, $idasignatura){
    $this->sentencia = "UPDATE calificacion SET parcial_3 = '$parcial_3' WHERE id_alumno = '$idalumno' AND id_asignatura = '$idasignatura'";
    $bandera = $this->ejecutar_sentencia();
    return $bandera;
}

   public function leer_cookie() {
    	$id_usuario_cookie = "id_usuario";
    	if (isset($_COOKIE[$id_usuario_cookie])) {
        	global $id_usuario;
        	$id_usuario = $_COOKIE[$id_usuario_cookie];
		}
	}

	public function leer_archivo(){
		fopen($archivo);
		while (!feof($archivo)) {
			$linea = fgets($archivo);
			$lineasalto = nl2br($linea);
		}
	fclose($archivo);
	return $linea;
	}

	public function alumnovista($id){
		$this->sentencia = "SELECT * FROM alumno WHERE id='$id'";
	$bandera = $this->ejecutar_sentencia();
	return $bandera;
	}
	public function listarmaestros_maestros(){
		$this->sentencia = "SELECT nombre, apellido_paterno, apellido_materno FROM maestro";
		$bandera = $this->ejecutar_sentencia();
		return $bandera;
	}

	
	public function listaralumnos($id){
		$this->sentencia = 	"SELECT m.nombre_alumno, m.apellido_paterno, m.apellido_materno FROM matricula m INNER JOIN impartir i on m.id_asignatura = i.id_asignatura where i.id_maestro = '$id'";
		$bandera = $this->ejecutar_sentencia();
		return $bandera;
	}

	
	public function listar_alumnos_alumnos($id){
		$this->sentencia = 	"SELECT a.nombre, a.apellido_paterno, a.apellido_materno FROM alumno a WHERE a.id_salon = (SELECT id_salon FROM alumno WHERE id = '$id')";
		$bandera = $this->ejecutar_sentencia();
		return $bandera;
	}
}
?>