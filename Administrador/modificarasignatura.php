<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="crear_asignatura.css">
</head>

<body>

<?php
require_once("contacto.php");
$obj = new contacto();
$resultado = $obj->consultarasignatura();

if($resultado->num_rows == 0) {
    echo "<h2>No hay ninguna asignatura disponible.</h2>";
} else {
?>

<h1>Modificar Datos de una Asignatura</h1> 
<form action="" method="post">
    <select name="idmodificar">
        <?php
           while ($registro = $resultado->fetch_assoc()) {
               echo "<option value=".$registro["id"].">".$registro["nombre"]."</option>";
           }
        ?>
    </select>
    <input type="submit" name="cargar" value="Cargar Datos">
</form>

<?php
   if(isset($_POST["cargar"])){
    $obj2 = new contacto();
    $resultado = $obj2->cargarasignatura($_POST['idmodificar']);
     while ($registro = $resultado->fetch_assoc()){
           $idasignatura = $registro['id'];
        ?>
        <form action="" method="post">
             <br/><br/> 
                Nombre: <input type="text" name="nombre" value="<?php echo $registro["nombre"];?>" required><br/><br/> 

                <?php 
$obj3 = new contacto();
$resultado_horario = $obj3->cargarhorario($idasignatura);
$horarios = array();
while ($registro_horario = $resultado_horario->fetch_assoc()) {

    //se crea un arreglo, inicio es la hora de inicio de la asignatura en el horario, igual con la hora final
    //el $horario toma como valor el registro que se encuentre dependiendo del dia
    $horarios[$registro_horario['dia']] = array(
        'inicio' => $registro_horario['hora_inicio'],
        'fin' => $registro_horario['hora_final']
    );
}

//VALIDACIÓN HORARIOS ME ROMPÍ EL COCO AYUDA DIOS
?>
<h2>Horario</h2>

<label for="lunes">Lunes</label>:
<input type="checkbox" name="lunes" id="lunes_check" onclick="toggleHora('lunes')" <?php if(isset($horarios['Lunes'])) echo 'checked'; ?>>
<input type="time" name="lunes_inicio" id="lunes_inicio" value="<?php if(isset($horarios['Lunes'])) echo $horarios['Lunes']['inicio']; ?>" <?php if(!isset($horarios['Lunes'])) echo 'disabled'; ?>> - 
<input type="time" name="lunes_final" id="lunes_final" value="<?php if(isset($horarios['Lunes'])) echo $horarios['Lunes']['fin']; ?>" <?php if(!isset($horarios['Lunes'])) echo 'disabled'; ?>><br/><br/>

<label for="martes">Martes</label>:
<input type="checkbox" name="martes" id="martes_check" onclick="toggleHora('martes')" <?php if(isset($horarios['Martes'])) echo 'checked'; ?>>
<input type="time" name="martes_inicio" id="martes_inicio" value="<?php if(isset($horarios['Martes'])) echo $horarios['Martes']['inicio']; ?>" <?php if(!isset($horarios['Martes'])) echo 'disabled'; ?>> -
<input type="time" name="martes_final" id="martes_final" value="<?php if(isset($horarios['Martes'])) echo $horarios['Martes']['fin']; ?>" <?php if(!isset($horarios['Martes'])) echo 'disabled'; ?>><br/><br/>

<label for="miercoles">Miércoles</label>:
<input type="checkbox" name="miercoles" id="miercoles_check" onclick="toggleHora('miercoles')" <?php if(isset($horarios['Miercoles'])) echo 'checked'; ?>>
<input type="time" name="miercoles_inicio" id="miercoles_inicio" value="<?php if(isset($horarios['Miercoles'])) echo $horarios['Miercoles']['inicio']; ?>" <?php if(!isset($horarios['Miercoles'])) echo 'disabled'; ?>> -
<input type="time" name="miercoles_final" id="miercoles_final" value="<?php if(isset($horarios['Miercoles'])) echo $horarios['Miercoles']['fin']; ?>" <?php if(!isset($horarios['Miercoles'])) echo 'disabled'; ?>><br/><br/>

<label for="jueves">Jueves</label>:
<input type="checkbox" name="jueves" id="jueves_check" onclick="toggleHora('jueves')" <?php if(isset($horarios['Jueves'])) echo 'checked'; ?>>
<input type="time" name="jueves_inicio" id="jueves_inicio" value="<?php if(isset($horarios['Jueves'])) echo $horarios['Jueves']['inicio']; ?>" <?php if(!isset($horarios['Jueves'])) echo 'disabled'; ?>> -
<input type="time" name="jueves_final" id="jueves_final" value="<?php if(isset($horarios['Jueves'])) echo $horarios['Jueves']['fin']; ?>" <?php if(!isset($horarios['Jueves'])) echo 'disabled'; ?>><br/><br/>

<label for="viernes">Viernes</label>:
<input type="checkbox" name="viernes" id="viernes_check" onclick="toggleHora('viernes')" <?php if(isset($horarios['Viernes'])) echo 'checked'; ?>>
<input type="time" name="viernes_inicio" id="viernes_inicio" value="<?php if(isset($horarios['Viernes'])) echo $horarios['Viernes']['inicio']; ?>" <?php if(!isset($horarios['Viernes'])) echo 'disabled'; ?>> -
<input type="time" name="viernes_final" id="viernes_final" value="<?php if(isset($horarios['Viernes'])) echo $horarios['Viernes']['fin']; ?>" <?php if(!isset($horarios['Viernes'])) echo 'disabled'; ?>><br/><br/>

<script>
    //se envia el dia seleccionado en el checkbox por ejmplo
    function toggleHora(dia) {
        var checkBox = document.getElementById(dia + "_check");
        var inicioInput = document.getElementById(dia + "_inicio");
        var finInput = document.getElementById(dia + "_final");

        //lo permite hacer editable o no
        if (checkBox.checked == true) {
            inicioInput.disabled = false;
            finInput.disabled = false;
        } else {
            inicioInput.disabled = true;
            finInput.disabled = true;
        }
    }
</script>


             <h1>Profesor que impartirá la asignatura:<h1>
             <input type="hidden" name="maestro" id="maestroInput" class="boton">
             
                <input type="hidden" name="id" value="<?php echo $_POST["idmodificar"];?>">
                <input type="submit" name="modificar" value="Modificar">
        </form>

        <div class="slider">
        <?php
            $obj3 = new Contacto();
            $resultado_maestro = $obj3->consultarmaestro();

            while($registro_maestro = $resultado_maestro->fetch_assoc()){
                if(isset($registro_maestro["nombre"])) {
                    $idmaestro = $registro_maestro["id"]; // Obtener el ID del maestro
                    //Campo oculto en onclick
                    echo "<div class='img_caja' onclick=\"actualizarMaestro('$idmaestro')\";' id='resultado'> <img class='foto' src='https://images.unsplash.com/photo-1553356084-58ef4a67b2a7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjR8fGFic3RyYWN0fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60' alt='Image'>
                        <div class='texto'>".$registro_maestro["nombre"]." ".$registro_maestro["apellido_paterno"]." ".$registro_maestro["apellido_materno"]."</div></div>";
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
</body>
</html>