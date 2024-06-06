<!DOCTYPE html>
<html>
   <head>

       <title>Alta Alumnos</title>
       <meta charset="utf-8">
       <meta name="description" content="Dar de alta un alumno"/>
       <link rel="stylesheet" href="Administrador/CSS/alta_alumno.css">

       <!--Fuentes de google-->

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">

   </head>

   <body>

      <h1 class="titulo">Dar de Alta un Alumno</h1> 

<form action="" method="post">

   <div class="cont_form">

      <div class="cont_nombres">

         <h2 class="label_nombres">Nombres</h2>
         <input class="input_nombres" type="text" name="nombre" placeholder="Ejem. José María" required> <br/><br/>

      </div>
      
      <div class="cont_apellido_paterno">

         <h2 class="label_apellido_paterno">Apellido paterno</h2>
         <input class="input_apellido_paterno" type="text" name="apellidopaterno" placeholder="Ejem. Pérez" required><br/><br/>

      </div>

      <div class="cont_apellido_materno">

         <h2 class="label_apellido_materno">Apellido materno</h2>
         <input class="input_apellido_materno" type="text" name="apellidomaterno" placeholder="Ejem. Gómez" required><br/><br/>

      </div>

      <div class="cont_fecha_nacimiento">
      
         <h2 class="label_fecha_nacimiento">Fecha de nacimiento</h2>

         <input class="input_fecha_nacimiento" type="date" name="fechanacimiento" max="<?php echo date('Y-m-d'); ?>" required><br/><br/><!-- Añadir el atributo max -->

      </div>

      <div class="cont_telefono">

         <h2 class="label_telefono">Telefono</h2>
         <input class="input_telefono" type="text" name="telefono" placeholder="Ejem. 312 666 6666" required><br/><br/>

      </div>

      <div class="cont_correo">

         <h2 class="label_correo">Correo</h2>
         <input class="input_correo" type="email" name="correo" placeholder="Ejem. nombre6@gmail.com" required><br/><br/>

      </div>

      <div class="cont_sexo">

         <h2 class="label_sexo">Sexo</h2>
            
         <div class="border_sexo">

            <input class="input_sexo_femenino" type="radio" name="sexo" value="F" checked>
            <input class="input_sexo_masculino" type="radio" name="sexo" value="M"> <br/><br/>

         </div>

      </div>

      <div class="cont_grado">

         <h2 class="label_grado">Grado</h2>

         <div class="border_grado">

            <input class="input_grado_1" type="radio" name="grado" value="1" checked> 
            <input class="input_grado_2" type="radio" name="grado" value="2"> 
            <input class="input_grado_3" type="radio" name="grado" value="3"> <br/><br/>

         </div>
         
      </div>
      
      <div class="cont_grupo">

         <h2 class="label_grupo">Grupo</h2>

         <div class="border_grupo">

            <input class="input_grupo_a" type="radio" name="grupo" value="A" checked> 
            <input class="input_grupo_b" type="radio" name="grupo" value="B">
            <input class="input_grupo_c" type="radio" name="grupo" value="C"><br/><br/>

         </div>

      </div>

      <div class="cont_password">

         <h2 class="label_password">Contraseña</h2>
         <input class="input_password" type="password" id="contrasena" name="contrasena" readonly><br/><br/>
         <input class="boton_generar" type="button" value="Generar Contraseña" onclick="generarContrasena()">

      </div>

      <div class="button_guardar">

         <input class="boton_guardar" type="submit" name="insertar" value="Guardar">

      </div>

   </div>

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
