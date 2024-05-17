<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="crear_asignatura.css">
</head>
    <body>
        <!-- Formulario -->
        <form action="" method="post">
            <div class="caja" id="nombre_asig">
                <input type="text" name="nombre_asig" placeholder="Matemáticas">
                <label name="nombre">Nombre</label>
            </div>
            <div class="caja" id="horas_asig">
                <input type="number" name="horas_asig" placeholder="5">
                <label name="horas">Horas</label>
            </div>
            
            <label>Grados</label>
            <input type="radio" name="grado" value="1">1 
            <input type="radio" name="grado" value="2">2
            <input type="radio" name="grado" value="3">3
            <br>

             <input type="hidden" name="maestro" id="maestroInput" class="boton">
            <input type="submit" name="insert" value="Guardar" class="boton">
    <style>
        /* Sirve para cambiar el color de los placecholder */

        ::-webkit-input-placeholder {
            color: #cdcdcd;
        }
    </style>

        </form>
        
    

      <div class="slider">
        <?php

            require_once("../contacto.php");
            $obj = new Contacto();
            $resultado = $obj->consultar();

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
        animation: CambioColor 20s infinite;
      
    }
</style>

</div>
      
      <?php
      //Guardar Info
           if(isset($_REQUEST['insert'])){
                $nombre = isset($_REQUEST['nombre_asig']) ? $_REQUEST['nombre_asig'] : '';
                $horas = isset($_REQUEST['horas_asig']) ? $_REQUEST['horas_asig'] : '';
               $maestro = isset($_POST['maestro']) ? $_POST['maestro'] : '';
               $grado = isset($_REQUEST['grado']) ? $_REQUEST['grado'] : '';

                require_once("contacto.php");
                $obj = new Contacto(); 
                $obj->guardar_asignatura($nombre,$horas,$maestro,$grado);
                echo "Asignatura Guardada";
                
            }
            else{
                echo "Faltan algunos datos requeridos.";
                    
            }

        ?>
       
    </body>
</html>