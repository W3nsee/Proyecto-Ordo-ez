<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<h1>Dar de Alta un Maestro</h1>

   <form action="" method="post">
   Nombres: <input type="text" name="nombre" placeholder="Ejem. José María"><br/><br/>
   Apellido paterno: <input type="text" name="apellidopaterno" placeholder="Ejem. Pérez"><br/><br/>
   Apellido materno: <input type="text" name="apellidomaterno" placeholder="Ejem. Gómez"><br/><br/>
   Fecha de nacimiento: <input type="date" name="fechanacimiento"><br/><br/>
   Telefono: <input type="text" name="telefono" placeholder="Ejem. 312 666 6666"><br/><br/>
   Correo: <input type="text" name="correo" placeholder="Ejem. nombre6@gmail.com"><br/><br/>
   Sexo:
      <label>
         <input type="radio" name="sexo" value="F">Femenino
      </label>
      <label>
         <input type="radio" name="sexo" value="M">Masculino
      </label><br/><br/>
   Contraseña: <input type="text" name="contrasena"><br/><br/>		
   <input type="submit" name="insertar" value="Guardar">
	</form>

</body>
</html>

<?php
   if(isset($_POST['insertar'])){
   	$nombre = $_POST['nombre'];
   	$apellidopaterno = $_POST['apellidopaterno'];
      $apellidomaterno = $_POST['apellidomaterno'];
      $fechanacimiento = $_POST['fechanacimiento'];
      $telefono = $_POST['telefono'];
   	$correo = $_POST['correo'];
      $sexo = $_POST['sexo'];
   	require_once("contacto.php");
   	$obj = new contacto();
   	$obj->altamaestro($nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo);
   	echo "Maestro Guardado";
   }
?>
