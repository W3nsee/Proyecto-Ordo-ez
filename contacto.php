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

	 public function altaasignatura($nombre) {
        $this->sentencia = "INSERT INTO asignatura VALUES ('','$nombre')";
        $bandera = $this->ejecutar_sentencia();
        return $bandera;
    }

    public function pasaridasignatura($id, $nombre, $maestro, $nombremaestro, $apellidopaterno, $apellidomaterno) {
       $this->sentencia = "INSERT INTO impartir VALUES ('$id','$nombre','$maestro','$nombremaestro','$apellidopaterno','$apellidomaterno')";
       $bandera = $this->ejecutar_sentencia(); 
    }

    public function altahorario($id,$dia,$horainicio,$horafinal){
		$this->sentencia = "INSERT INTO horario VALUES('$id','$dia','$horainicio','$horafinal')";
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

	public function consultarmaestrodiferente($maestro){
		$this->sentencia = "SELECT * FROM maestro WHERE id != '$maestro';";
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

	public function consultarcalificaciones($idalumno, $idasignatura){
		$this->sentencia = "SELECT * FROM calificacion WHERE id_alumno = '$idalumno' AND id_asignatura = '$idasignatura';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarcalificacionparcial($idalumno, $idasignatura, $parcial, $calificacion_existente){
		$this->sentencia = "SELECT * FROM calificacion WHERE id_alumno = '$idalumno' AND id_asignatura = '$idasignatura' AND $parcial = '$calificacion_existente';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function consultarasignaturaimpartida($maestro){
		$this->sentencia = "SELECT * FROM impartir WHERE id_maestro = '$maestro';";
		$resultado = $this->obtener_sentencia();
		return $resultado;
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

	public function consultarhorario($idasignatura){
		$this->sentencia = "SELECT * FROM horario WHERE id_asignatura = $idasignatura;";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	public function contarfaltas($idalumno, $idasignatura) {
    $this->sentencia = "SELECT COUNT(*) AS fecha_falta FROM faltas_asistencia WHERE alumno_id = '$idalumno' AND id_asignatura = '$idasignatura'";
    $resultado = $this->obtener_sentencia();

    // Verificar si se obtuvo un resultado
    if ($resultado->num_rows > 0) {
        // Obtener la fila de resultado
        $fila = $resultado->fetch_assoc();
        // Obtener el conteo de faltas de asistencia
        $conteo_faltas = $fila["fecha_falta"];
        // Liberar el resultado
        $resultado->free();
        // Retornar el conteo de faltas
        return $conteo_faltas;
    } else {
        // Si no se encontraron faltas, retornar cero
        return 0;
    }
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

	Public function cargargradogrupo($idsalon){
		$this->sentencia = "SELECT * FROM salon WHERE id='$idsalon'";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

	Public function cargarhorario($idasignatura){
		$this->sentencia = "SELECT * FROM horario WHERE id_asignatura='$idasignatura'";
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

	Public function modificarasignatura($nombre,$id){
		$this->sentencia = "UPDATE asignatura SET nombre='$nombre' WHERE id = '$id'";
		$bandera = $this->ejecutar_sentencia();
	}

	Public function modificarimpartir($id,$nombre,$maestro,$nombremaestro,$apellidopaterno,$apellidomaterno){
		$this->sentencia = "UPDATE impartir SET id_maestro='$maestro', nombre_asignatura = '$nombre', nombre_maestro='$nombremaestro', apellido_paterno='$apellidopaterno' WHERE id_asignatura = '$id'";
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
	   $bandera = $this->obtener_sentencia();
	   return $bandera;
   }

   public function poner_calificacion($idalumno, $idasignatura, $calificacion, $parcial) {
    // Verificar si ya existe un registro para el alumno y la asignatura en la tabla de calificaciones
    $existe_registro = $this->verificar_registro_calificacion($idalumno, $idasignatura);

    if ($existe_registro) {
        // Si existe un registro, se actualiza la calificación correspondiente al parcial seleccionado
        $this->sentencia = "UPDATE calificacion SET $parcial = '$calificacion' WHERE id_alumno = '$idalumno' AND id_asignatura = '$idasignatura'";
    } else {
        // Si no existe un registro, se inserta uno nuevo con todas las calificaciones en blanco excepto la del parcial seleccionado
        $this->sentencia = "INSERT INTO calificacion(id_alumno, id_asignatura, $parcial) VALUES('$idalumno', '$idasignatura', '$calificacion')";
    }
    $bandera = $this->ejecutar_sentencia(); 
   }

   public function consultarcalificacionconparcial($idasignatura, $idalumno, $parcial_seleccionado){
     $this->sentencia = "SELECT $parcial_seleccionado FROM calificacion WHERE id_asignatura='$idasignatura' AND id_alumno='$idalumno'";
     $resultado = $this->obtener_sentencia(); // Se asigna el resultado a la variable $resultado
     return $resultado;
   }


   // Función para verificar si ya existe un registro para el alumno y la asignatura en la tabla de calificaciones
   private function verificar_registro_calificacion($idalumno, $idasignatura) {
      $this->sentencia = "SELECT * FROM calificacion WHERE id_alumno = '$idalumno' AND id_asignatura = '$idasignatura'";
      $resultado = $this->ejecutar_sentencia();

      return $resultado->num_rows > 0; // Devuelve true si existe al menos un registro, false si no existe ninguno
   }

   Public function modificarcalificacion($idalumno, $idasignatura, $nueva_calificacion, $parcial_seleccionado){
		$this->sentencia = "UPDATE calificacion SET $parcial_seleccionado='$nueva_calificacion' WHERE id_alumno = '$idalumno' AND id_asignatura= '$idasignatura'";
		$bandera = $this->ejecutar_sentencia();
	}

	public function existeFalta($idalumno, $idasignatura, $fecha){
		$this->sentencia = "SELECT * FROM faltas_asistencia WHERE alumno_id = '$idalumno' AND id_asignatura = '$idasignatura' AND fecha_falta = '$fecha'";
		$resultado = $this->obtener_sentencia();
		return $resultado;
	}

}
?>