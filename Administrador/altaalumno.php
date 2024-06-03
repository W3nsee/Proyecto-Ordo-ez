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
   Nombres: <input type="text" name="nombre" placeholder="Ejem. José María" required><br/><br/>
   Apellido paterno: <input type="text" name="apellidopaterno" placeholder="Ejem. Pérez" required><br/><br/>
   Apellido materno: <input type="text" name="apellidomaterno" placeholder="Ejem. Gómez" required><br/><br/>
   Fecha de nacimiento: <input type="date" name="fechanacimiento" max="<?php echo date('Y-m-d'); ?>" required><br/><br/> <!-- Añadir el atributo max -->
   Telefono: <input type="text" name="telefono" placeholder="Ejem. 312 666 6666" required><br/><br/>
   Correo: <input type="email" name="correo" placeholder="Ejem. nombre6@gmail.com" required><br/><br/>
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

      Contraseña: <input type="text" id="contrasena" name="contrasena" readonly><br/><br/>   
      <input type="button" value="Generar Contraseña" onclick="generarContrasena()">
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

         // Verificar si la contraseña está presente y no está vacía
         if(empty($contrasena)) {
            // Mostrar el mensaje de error si la contraseña no se ha generado
            echo '<p>Por favor, genera la contraseña antes de guardar los datos.</p>';
         } else {
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
   }
?>

<script>
   //generar una contraseña de manera aleatoria, utiliza javascript avisoo
   function generarContrasena() {
      var nombre = document.getElementsByName("nombre")[0].value;
      var apellidopaterno = document.getElementsByName("apellidopaterno")[0].value;
      var fechanacimiento = document.getElementsByName("fechanacimiento")[0].value;

      // toma parte del nombre, apellido y fecha de nacimiento
      var parte_nombre = nombre.substring(0, 3); // Tomar los primeros 3 caracteres del nombre
      var parte_apellido = apellidopaterno.substring(0, 2); // Tomar los primeros 2 caracteres del apellido paterno
      var parte_fecha = fechanacimiento.split("-").join("").substring(2, 8); // Tomar el año, mes y día de la fecha de nacimiento

      // Combinar las partes para formar la contraseña
      var contrasena = parte_nombre + parte_apellido + parte_fecha;

      // Actualizar el valor de la caja de texto
      document.getElementById("contrasena").value = contrasena;
   }
</script>

</body>
</html>
