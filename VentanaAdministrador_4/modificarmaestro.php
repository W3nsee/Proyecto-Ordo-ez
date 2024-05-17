 <h1>Modificar Datos de un Maestro</h1> 
<form action="" method="post">
	<select name="idmodificar">
		<?php
		   require_once("contacto.php");
		   $obj = new contacto();
		   $resultado = $obj->consultarmaestro();
		   while ($registro = $resultado->fetch_assoc()) {
		   	echo "<option value=".$registro["id"].">".$registro["nombre"]." ".$registro["grado"]."</option>";
		   }
		?>
	</select>
	<input type="submit" name="cargar" value="Cargar Datos">
</form>

<?php
   if(isset($_POST["cargar"])){
   	require_once("contacto.php");
   	$obj = new contacto();
   	$resultado = $obj->cargarmaestro($_POST['idmodificar']);
   	 while ($registro = $resultado->fetch_assoc()){
   	 	?>
   	 	<form action="" method="post">
   	 		 <br/><br/> 
   	 	    Nombre: <input type="text" name="nombre" value="<?php echo $registro["nombre"];?>"><br/><br/> 
   	 	    Apellido Paterno: <input type="text" name="apellidopaterno" value="<?php echo $registro["apellido_paterno"];?>"><br/><br/> 
   	 	    Apellido Materno: <input type="text" name="apellidomaterno" value="<?php echo $registro["apellido_materno"];?>"><br/><br/> 
   	 	    Fecha de Nacimiento: <input type="date" name="fechanacimiento" value="<?php echo $registro["fecha_nacimiento"];?>"><br/><br/> 
   	 	    Telefono: <input type="text" name="telefono" value="<?php echo $registro["telefono"];?>"><br/><br/> 
   	 	    Correo: <input type="text" name="correo" value="<?php echo $registro["correo"];?>"><br/><br/>
   	 	    Sexo:
             <label>
                <input type="radio" name="sexo" value="F">Femenino
             </label>
                <label>
             <input type="radio" name="sexo" value="M">Masculino
      </label><br/><br/>
   	 	    <input type="hidden" name="id" value="<?php echo $_POST["idmodificar"];?>">
   	 	    <input type="submit" name="modificar" value="Modificar">
   	 <?php
   	 }
   }
    if(isset($_POST["modificar"])){
         $nombre = $_POST['nombre'];
         $apellidopaterno= $_POST['apellidopaterno'];
         $apellidomaterno= $_POST['apellidomaterno'];
         $fechanacimiento= $_POST['fechanacimiento'];
         $telefono= $_POST['telefono'];
         $correo= $_POST['correo'];
         $sexo= $_POST['sexo'];
         $id = $_POST['id'];
         require_once("contacto.php");
         $obj = new contacto();
         $obj->modificarmaestro($nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo,$id);
         echo "Registro Modificado";
      }
?>