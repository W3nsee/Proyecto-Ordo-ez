<?php
 
 class Conexion{
 	private $host = 'localhost';
 	private $usuario = 'root'; //usuario q está en mysql server
 	private $password = '';
 	private $base = 'Escuela';
 	public $sentencia; //realiza más adelante las sentencias en sql, es publica para qe sea visible para otras clases
 	private $rows = array(); 
 	private $conexion; //ayuda a traer un metodo a su clase coleccion

    //se crea el método, sólo se está abriendo aquí, no ejecutando
 	private function abrir_conexion(){
 		$this->conexion = new mysqli($this->host,$this->usuario,$this->password,$this->base);
 	}

 	private function cerrar_conexion(){
 		$this->conexion->close();
 	}

 	public function ejecutar_sentencia(){
 		$this->abrir_conexion();
 		$bandera = $this->conexion->query($this->sentencia); //query es un metodo para llamar o nose
 		$this->cerrar_conexion();
 		return $bandera;
 	}

 	public function obtener_sentencia(){
 		$this->abrir_conexion();
 		$result = $this->conexion->query($this->sentencia);
 		return $result;
 	}
 }

?>