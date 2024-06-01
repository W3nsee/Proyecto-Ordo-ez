<!DOCTYPE html>
<html>
   <head>
       <title>Alta Alumnos</title>
       <meta charset="utf-8">
       <meta name="description" content="Dar de alta un alumno"/>
   </head>

   <body>
      <h1>Dar de Alta un Alumno</h1> 

   <form action="" method="post">
   Nombres: <input type="text" name="nombre" placeholder="Ejem. José María"><br/><br/>
   Apellido paterno: <input type="text" name="apellidopaterno" placeholder="Ejem. Pérez"><br/><br/>
   Apellido materno: <input type="text" name="apellidomaterno" placeholder="Ejem. Gómez"><br/><br/>
   Fecha de nacimiento: <input type="date" name="fechanacimiento"><br/><br/>
   Telefono: <input type="text" name="telefono" placeholder="Ejem. 312 666 6666"><br/><br/>
   Correo: <input type="text" name="correo" placeholder="Ejem. nombre6@gmail.com"><br/><br/>
   Sexo:
      <label>
         <input type="radio" name="sexo" value="F" checked>Femenino
      </label>
      <label>
         <input type="radio" name="sexo" value="M">Masculino
      </label><br/><br/>
   Grado:
      <label>
         <input type="radio" name="grado" value="1" checked>1
      </label>
      <label>
         <input type="radio" name="grado" value="2">2
      </label>
      <label>
         <input type="radio" name="grado" value="3">3
      </label><br/><br/>
   Grupo:
      <label>
         <input type="radio" name="grupo" value="A" checked>A
      </label>
      <label>
         <input type="radio" name="grupo" value="B">B
      </label>
      <label>
         <input type="radio" name="grupo" value="C">C
      </label><br/><br/>

      Contraseña: <input type="text" name="contrasena"><br/><br/>   
   <input type="submit" name="insertar" value="Guardar">
</form>

<?php
   if(isset($_POST['insertar'])){
   	  $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
   	  $apellidopaterno = $_POST['apellidopaterno'];
        $apellidomaterno = $_POST['apellidomaterno'];
        $fechanacimiento = $_POST['fechanacimiento'];
        $telefono = $_POST['telefono'];
   	  $correo = $_POST['correo'];
        $sexo = $_POST['sexo'];
        $grado = $_POST['grado'];
        $grupo = $_POST['grupo'];
   	  require_once("contacto.php");
   	  $obj = new contacto();
   	  $obj->altaalumno($contrasena,$nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo);

         $obj3 = new contacto();
         $resultado = $obj3->consultarsolounalumno($correo);
         while ($registro = $resultado->fetch_assoc()) {
            $id = $registro["id"];
         }

         $obj4 = new contacto();
         $resultado = $obj4->consultaridsalon($grado,$grupo);
         while ($registro = $resultado->fetch_assoc()) {
            $idsalon = $registro["id"];
         }

        $obj2 = new contacto();
        $obj2->gradogrupo($id,$grado,$grupo,$idsalon);
   	  echo "Alumno Guardado";
   }
?>