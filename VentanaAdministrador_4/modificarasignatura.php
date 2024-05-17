<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="crear_asignatura.css">
</head>

<h1>Modificar Datos de una Asignatura</h1> 
<form action="" method="post">
	<select name="idmodificar">
		<?php
		   require_once("contacto.php");
		   $obj = new contacto();
		   $resultado = $obj->consultarasignatura();
		   while ($registro = $resultado->fetch_assoc()) {
		   	echo "<option value=".$registro["id"].">".$registro["nombre"]."</option>";
		   }
		?>
	</select>
	<input type="submit" name="cargar" value="Cargar Datos">
</form>

<?php
   if(isset($_POST["cargar"])){
   	require_once("contacto.php");
   	$obj = new contacto();
   	$resultado = $obj->cargarasignatura($_POST['idmodificar']);
   	 while ($registro = $resultado->fetch_assoc()){
   	 	?>
   	 	<form action="" method="post">
   	 		 <br/><br/> 
   	 	    Nombre: <input type="text" name="nombre" value="<?php echo $registro["nombre"];?>"><br/><br/> 
   	 	    Grado:
            <label>
               <input type="radio" name="grado" value="1">1
            </label>
            <label>
               <input type="radio" name="grado" value="2">2
            </label>
            <label>
               <input type="radio" name="grado" value="3">3
            </label><br/><br/>

             <h1>Profesor que impartirá la asignatura:<h1>
             <input type="hidden" name="maestro" id="maestroInput" class="boton">
             
   	 	    <input type="hidden" name="id" value="<?php echo $_POST["idmodificar"];?>">
   	 	    <input type="submit" name="modificar" value="Modificar">

             <style>
             /* Sirve para cambiar el color de los placecholder */

            ::-webkit-input-placeholder {
            color: #cdcdcd;
            }
           </style>
        </form>

          <div class="slider">
        <?php

            require_once("contacto.php");
            $obj = new Contacto();
            $resultado = $obj->consultarmaestro();

            while($registro = $resultado->fetch_assoc()){
                if(isset($registro["nombre"])) {
                    $nombre = $registro["nombre"];
                    //Campo oculto en onclick
                    echo "<div class='img_caja' onclick=\"actualizarMaestro('$nombre')\";' id='resultado'> <img class='foto' src='https://images.unsplash.com/photo-1553356084-58ef4a67b2a7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjR8fGFic3RyYWN0fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60' alt='Image'>
                        <div class='texto'>".$nombre."</div></div>";



                }
            }

            ?>
  <script>
// Función para actualizar el valor de maestro en el campo oculto
function actualizarMaestro(nombre) {
    document.getElementById('maestroInput').value = nombre;
}
</script>



        <!-- Seleccion al maestro -->
        <script>
    var items = document.querySelectorAll('.img_caja');
    var selectorItems = 0;

    items.forEach(function(item) {
        item.addEventListener('click', function() {
            if (this.classList.contains('selected')) {
                this.classList.remove('selected');
                selectorItems--;
                <?php 
                    $nombre = "";
                ?>
            } else if (selectorItems < 1) {
                this.classList.add('selected');
                selectorItems++;

                var resultadoDiv = document.getElementById('resultado');
                resultadoDiv.innerHTML = maestro; 

            }
        });
    });
</script>

<!-- Cambiar el color de los bordes -->
<style>
    @keyframes CambioColor {
        0% {box-shadow: 0 0 0 3px red; }
        25% {box-shadow: 0 0 0 3px orange; }
        50% {box-shadow: 0 0 0 3px green; }
        75% {box-shadow: 0 0 0 3px blue; }
        100% {box-shadow: 0 0 0 3px red; }
    
    }
    .selected {
        animation: CambioColor 2s infinite;
      
    }
</style>

</div>

   	 <?php
   	 }
   }
    if(isset($_POST["modificar"])){
         $nombre = $_POST['nombre'];
         $grado= $_POST['grado'];
         $maestro= $_POST['maestro'];
         $id = $_POST['id'];
         require_once("contacto.php");
         $obj = new contacto();
         $obj->modificarasignatura($nombre,$grado,$maestro,$id);
         echo "Registro Modificado";
      }
?>