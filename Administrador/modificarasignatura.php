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
    $obj2 = new contacto();
    $resultado = $obj2->cargarasignatura($_POST['idmodificar']);
     while ($registro = $resultado->fetch_assoc()){
        ?>
        <form action="" method="post">
             <br/><br/> 
                Nombre: <input type="text" name="nombre" value="<?php echo $registro["nombre"];?>"><br/><br/> 

             <h1>Profesor que impartirá la asignatura:<h1>
             <input type="hidden" name="maestro" id="maestroInput" class="boton">
             
                <input type="hidden" name="id" value="<?php echo $_POST["idmodificar"];?>">
                <input type="submit" name="modificar" value="Modificar">
        </form>

        <div class="slider">
        <?php
            require_once("contacto.php");
            $obj3 = new Contacto();
            $resultado = $obj3->consultarmaestro();

            while($registro = $resultado->fetch_assoc()){
                if(isset($registro["nombre"])) {
                    $idmaestro = $registro["id"]; // Obtener el ID del maestro
                    //Campo oculto en onclick
                    echo "<div class='img_caja' onclick=\"actualizarMaestro('$idmaestro')\";' id='resultado'> <img class='foto' src='https://images.unsplash.com/photo-1553356084-58ef4a67b2a7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjR8fGFic3RyYWN0fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60' alt='Image'>
                        <div class='texto'>".$registro["nombre"]." ".$registro["apellido_paterno"]." ".$registro["apellido_materno"]."</div></div>";
                }
            }
        ?>
        <script>
        // Función para actualizar el valor de maestro en el campo oculto
        function actualizarMaestro(idmaestro) {
            document.getElementById('maestroInput').value = idmaestro;
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
         $maestro= $_POST['maestro'];
         $id = $_POST['id'];
         require_once("contacto.php");
         $obj = new contacto();
         $obj->modificarasignatura($nombre,$maestro,$id);
         echo "Registro Modificado";
      }
?>
</html>
