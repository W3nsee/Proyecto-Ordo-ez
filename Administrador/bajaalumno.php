<h1>Dar de Baja un Alumno</h1> 

<form action="" method="post">
	<select name=ideliminar>
		<?php
		 require_once("contacto.php");
		 $obj = new contacto();
		 $obj2 = new contacto();
		 if (isset($_POST["eliminar"])){
		 	$obj->bajaalumno($_POST["ideliminar"]);
		 	$obj2->eliminarmatriculaalumno($_POST["ideliminar"]);
		 }
		 $resultado = $obj->consultaralumno();
		 while($registro = $resultado->fetch_assoc()){
		 	echo "<option value=".$registro["id"].">".$registro["nombre"]." ".$registro["apellido_paterno"]." ".$registro["apellido_materno"]."</option>";
		 }

		?>
	</select>
	<input type="submit" name="eliminar" value="Eliminar Alumno">
</form>

<?php
   if(isset($_POST["eliminar"])){
   	echo "Alumno Eliminado";
   }
?>