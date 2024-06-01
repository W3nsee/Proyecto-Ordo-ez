<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="crear_asignatura.css">
    <style>
        /* Sirve para cambiar el color de los placecholder */
        ::-webkit-input-placeholder {
            color: #cdcdcd;
        }
    </style>
</head>
<body>
    <h1>Dar de Alta una Asignatura</h1> 
    <!-- Formulario -->
    <form action="" method="post">
        Nombre de la Asignatura: <input type="text" name="nombre" placeholder="Ejem. Español"><br/><br/>

        Grado al que se impartirá:
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
        <input type="submit" name="insert" value="Guardar" class="boton">
    </form>

    <!-- Div que muestra los maestros -->
    <div class="slider">
        <?php
        require_once("contacto.php");
        $obj = new Contacto();
        $resultado = $obj->consultarmaestro();
       
        while($registro = $resultado->fetch_assoc()){
            if(isset($registro["nombre"])) {
                $idmaestro = $registro['id']; // Obtener el ID del maestro
                echo "<div class='img_caja' onclick=\"actualizarMaestro('$idmaestro')\" id='resultado'> <img class='foto' src='https://images.unsplash.com/photo-1553356084-58ef4a67b2a7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjR8fGFic3RyYWN0fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60' alt='Image'>
                <div class='texto'>".$registro["nombre"]." ".$registro["apellido_paterno"]." ".$registro["apellido_materno"]."</div></div>";
            }
        }
        ?>
    </div>

    <script>
    function actualizarMaestro(idmaestro) {
        document.getElementById('maestroInput').value = idmaestro;
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
// Incluir el archivo PHP que contiene la clase Contacto
require_once("contacto.php");

// Si se ha enviado el formulario
if(isset($_POST['insert'])){
    // Recuperar los valores del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $grado = isset($_POST['grado']) ? $_POST['grado'] : '';
    $maestro = isset($_POST['maestro']) ? $_POST['maestro'] : '';

    $obj = new Contacto(); 
    $obj->altaasignatura($nombre, $grado);

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
}
?>
