<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alta Asignatura</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Administrador/CSS/crear_asignatura.css">
    <style>
        /* Sirve para cambiar el color de los placecholder */
        ::-webkit-input-placeholder {
            color: #cdcdcd;
        }
    </style>

        <!--Fuentes de google-->

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">


</head>
<body>

    <h1 class="titulo">Dar de Alta una Asignatura</h1> 
    <!-- Formulario -->
    <form id="altaForm" action="" method="post" onsubmit="return validarFormulario()">

        <div class="cont_form">

            <div class="cont_nombre_asignatura">

                <h2 class="label_asignatura">Nombre Asignatura</h2>
                <input class="input_asignatura" type="text" name="nombre" placeholder="Ejem. Español" required><br/><br/>

            </div>

            <!-- Agregar campos de horario -->

            <h2 class="label_horario">Crear Horario</h2>

            <div class="cont_horarios">

                <div class="cont_lunes">

                    <h2 class="label_lunes">Lunes</h2>

                    <input class="check_lunes" type="checkbox" name="lunes" id="lunes_check" onclick="toggleHora('lunes')"> 
                    <input class="inicio_lunes" type="time" name="lunes_inicio" id="lunes_inicio" disabled> -
                    <input class="fin_lunes" type="time" name="lunes_fin" id="lunes_fin" disabled><br/><br/>

                </div>

                <div class="cont_martes">

                    <h2 class="label_martes">Martes</h2>

                    <input class="check_martes" type="checkbox" name="martes" id="martes_check" onclick="toggleHora('martes')"> 
                    <input class="inicio_martes" type="time" name="martes_inicio" id="martes_inicio" disabled> -
                    <input class="fin_martes" type="time" name="martes_fin" id="martes_fin" disabled><br/><br/>

                </div>

                <div class="cont_miercoles">

                    <h2 class="label_miercoles">Miércoles</h2>

                    <input class="check_miercoles" type="checkbox" name="miercoles" id="miercoles_check" onclick="toggleHora('miercoles')">
                    <input class="inicio_miercoles" type="time" name="miercoles_inicio" id="miercoles_inicio" disabled> -
                    <input class="fin_miercoles" type="time" name="miercoles_fin" id="miercoles_fin" disabled><br/><br/>

                </div>

                <div class="cont_jueves">

                    <h2 class="label_jueves">Jueves</h2>

                    <input class="check_jueves" type="checkbox" name="jueves" id="jueves_check" onclick="toggleHora('jueves')"> 
                    <input class="inicio_jueves" type="time" name="jueves_inicio" id="jueves_inicio" disabled> -
                    <input class="fin_jueves" type="time" name="jueves_fin" id="jueves_fin" disabled><br/><br/>

                </div>

                <div class="cont_viernes">

                    <h2 class="label_viernes">Viernes</h2>

                    <input class="check_viernes" type="checkbox" name="viernes" id="viernes_check" onclick="toggleHora('viernes')">
                    <input class="inicio_viernes" type="time" name="viernes_inicio" id="viernes_inicio" disabled> -
                    <input class="fin_viernes" type="time" name="viernes_fin" id="viernes_fin" disabled><br/><br/>

                </div>

            </div>

            <!-- Agregar campos de horario -->

            <h2>Profesor que impartirá la asignatura:</h2>

            <div class="cont_maestros">

                <div class="slider">
                    <?php
                        require_once("contacto.php");
                        $obj = new Contacto();
                        $resultado = $obj->consultarmaestro();
                
                        // Verificar si hay maestros disponibles antes de mostrarlos
                        if($resultado->num_rows == 0) 
                        {

                            echo "<p>No hay maestros disponibles.</p>";

                        } 
                        else 
                        {
                            while($registro = $resultado->fetch_assoc())
                            {
                                if(isset($registro["nombre"])) 
                                {
                                    $idmaestro = $registro['id']; // Obtener el ID del maestro
                                    echo "<div class='img_caja' onclick=\"actualizarMaestro('$idmaestro')\" id='resultado'> <img class='foto' src='https://images.unsplash.com/photo-1553356084-58ef4a67b2a7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjR8fGFic3RyYWN0fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60' alt='Image'>
                                    <div class='texto'>".$registro["nombre"]." ".$registro["apellido_paterno"]." ".$registro["apellido_materno"]."</div></div>";

                                }
                            }
                        }
                    ?>
                </div>

            </div>

            <input type="hidden" name="maestro" id="maestroInput" class="boton">
            <input class="boton_guardar" type="submit" name="insert" value="Guardar">

        </div>
        
    </form>

    <!-- Div que muestra los maestros -->

    <script>
    function actualizarMaestro(idmaestro) {
        document.getElementById('maestroInput').value = idmaestro;
    }

    function toggleHora(dia) {
        var check = document.getElementById(dia + '_check');
        var inicio = document.getElementById(dia + '_inicio');
        var fin = document.getElementById(dia + '_fin');

        if (check.checked) {
            inicio.disabled = false;
            fin.disabled = false;
        } else {
            inicio.disabled = true;
            fin.disabled = true;
        }
    }

    function validarFormulario() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var horasInicio = document.querySelectorAll('input[type="time"]:enabled');

        var alMenosUnCheckboxSeleccionado = false;
        var todasLasHorasEstablecidas = true;

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                alMenosUnCheckboxSeleccionado = true;
            }
        });

        horasInicio.forEach(function(hora) {
            if (hora.value === "") {
                todasLasHorasEstablecidas = false;
            }
        });

        if (!alMenosUnCheckboxSeleccionado) {
            // Muestra un aviso en una ventanita en la parte superior
            alert("Debe seleccionar al menos un día de horario.");
            return false;
        }

        if (!todasLasHorasEstablecidas) {
            alert("Debe establecer una hora de inicio y fin para cada día seleccionado.");
            return false;
        }

        return true;
    }
    </script>

    <script>
    var items = document.querySelectorAll('.img_caja');
    var selectorItems = 0;

    items.forEach(function(item) {
        item.addEventListener('click', function() {
            if (this.classList.contains('selected')) {
                this.classList.remove('selected');
                selectorItems--;
            } else if (selectorItems < 1) {
                this.classList.add('selected');
                selectorItems++;
            }
        });
    });
    </script>

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
</body>
</html>

<?php
require_once("contacto.php");

if(isset($_POST['insert'])){

    // Recuperar los valores del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $maestro = isset($_POST['maestro']) ? $_POST['maestro'] : '';

    // Validar si se ha seleccionado al menos un maestro
    if(empty($maestro)) {
        echo "Por favor, seleccione un maestro para impartir la asignatura.";
        exit; // Detener la ejecución del script si no hay maestros seleccionados
    }

    $obj = new Contacto(); 
    $obj->altaasignatura($nombre);

    $obj3 = new contacto();
    $resultado = $obj3->consultarsolounaasignatura($nombre);
    while ($registro = $resultado->fetch_assoc()) {
        $id = $registro["id"];
    }

    $obj4 = new contacto();
    $resultado = $obj4->consultarsolounmaestro($maestro);
    while ($registro = $resultado->fetch_assoc()) {
        $nombremaestro = $registro["nombre"];
        $apellidopaterno = $registro["apellido_paterno"];
        $apellidomaterno = $registro["apellido_materno"];
    }

    $obj2 = new contacto();
    $obj2->pasaridasignatura($id,$nombre,$maestro,$nombremaestro,$apellidopaterno,$apellidomaterno);
    echo "Asignatura Guardada";

    if (isset($_POST['lunes']) && $_POST['lunes'] === 'on') {

        $dia = "Lunes";
        $horainicio = $_POST['lunes_inicio'];
        $horafinal = $_POST['lunes_fin'];

        $obj5 = new contacto();
        $obj5->altahorario($id,$dia,$horainicio,$horafinal);
    }

    if (isset($_POST['martes']) && $_POST['martes'] === 'on') {

        $dia = "Martes";
        $horainicio = $_POST['martes_inicio'];
        $horafinal = $_POST['martes_fin'];

        $obj6 = new contacto();
        $obj6->altahorario($id,$dia,$horainicio,$horafinal);
    }

    if (isset($_POST['miercoles']) && $_POST['miercoles'] === 'on') {

        $dia = "Miercoles";
        $horainicio = $_POST['miercoles_inicio'];
        $horafinal = $_POST['miercoles_fin'];

        $obj7 = new contacto();
        $obj7->altahorario($id,$dia,$horainicio,$horafinal);
    }

    if (isset($_POST['jueves']) && $_POST['jueves'] === 'on') {

        $dia = "Jueves";
        $horainicio = $_POST['jueves_inicio'];
        $horafinal = $_POST['jueves_fin'];

        $obj8 = new contacto();
        $obj8->altahorario($id,$dia,$horainicio,$horafinal);
    }

    if (isset($_POST['viernes']) && $_POST['viernes'] === 'on') {

        $dia = "Viernes";
        $horainicio = $_POST['viernes_inicio'];
        $horafinal = $_POST['viernes_fin'];

        $obj9 = new contacto();
        $obj9->altahorario($id,$dia,$horainicio,$horafinal);
    }
}
?>
