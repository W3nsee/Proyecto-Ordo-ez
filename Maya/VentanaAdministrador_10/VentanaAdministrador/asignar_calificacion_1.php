<?php
session_start();
$maestro = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro
$parcial_seleccionado = ''; // Variable para almacenar el parcial seleccionado

if(isset($_POST["mostrar"])){

    require_once("contacto.php");

    // Mostrar opciones de parciales
    echo "<h2>Selecciona el parcial:</h2>";
    echo "<form action='' method='post'>";
    echo "<input type='hidden' name='idmostrar' value='" . $_POST["idmostrar"] . "'>";
    echo "<select name='parcial'>";
    echo "<option value='Parcial 1'>Parcial 1</option>";
    echo "<option value='Parcial 2'>Parcial 2</option>";
    echo "<option value='Parcial 3'>Parcial 3</option>";
    echo "</select>";
    echo "<br><br>";

    echo "<input type='submit' name='seleccionar_parcial' value='Seleccionar Parcial'>";
    echo "</form>";

} elseif(isset($_POST["seleccionar_parcial"])) {
    require_once("contacto.php");

    $obj2 = new contacto();
    $resultado = $obj2->consultaralumnomatriculado($_POST["idmostrar"]);

    // Guardar el valor del parcial seleccionado en la variable
    $parcial_seleccionado = $_POST['parcial'];

    // Verifica si hay alumnos 
    if($resultado->num_rows > 0) {

        echo "<h2>Selecciona un alumno:</h2>";
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='idmostrar' value='" . $_POST["idmostrar"] . "'>";
        echo "Alumno: ";
        echo "<select name='idalumno'>";
        while ($registro = $resultado->fetch_assoc()) {
            echo "<option value='" . $registro["id_alumno"] . "'>" . $registro["nombre_alumno"] . " " . $registro["apellido_paterno"] . " " . $registro["apellido_materno"] . "</option>";
        }
        echo "</select>";
        echo "<input type='hidden' name='parcial' value='" . $parcial_seleccionado . "'>"; // Pasar el parcial seleccionado como un campo oculto
        echo "<br><br>";

        echo "<input type='submit' name='seleccionar_alumno' value='Aceptar'>";
        echo "</form>";

    } else {
        echo "No hay alumnos matriculados en esta asignatura.";
    }

} elseif (isset($_POST["seleccionar_alumno"])) {

    // Mostrar el formulario para ingresar la calificación
    
    echo "<form action='' method='post'>";
    echo "<input type='hidden' name='idmostrar' value='" . $_POST["idmostrar"] . "'>";
    echo "<input type='hidden' name='idalumno' value='" . $_POST["idalumno"] . "'>";
    echo "<input type='hidden' name='parcial' value='" . $_POST["parcial"] . "'>"; // Pasar el parcial seleccionado
    echo "<label for='calificacion'>Calificación: </label>";
    echo "<input type='text' id='calificacion' name='calificacion'>";
    echo "<br><br>";
    echo "<input type='submit' name='ingresar_calificacion' value='Ingresar Calificación'>";
    echo "</form>";

} elseif (isset($_POST["ingresar_calificacion"])) {

    $idasignatura = $_POST["idmostrar"];
    $idalumno = $_POST["idalumno"];
    $calificacion = $_POST["calificacion"];
    $parcial = $_POST["parcial"]; // Obtener el parcial seleccionado

    // Llamar a la función correspondiente según el parcial seleccionado
    if ($parcial == "Parcial 1") {
        // Función para poner calificación del primer parcial
        poner_calificacion_parcial_1($idasignatura, $idalumno, $calificacion);
    } elseif ($parcial == "Parcial 2") {
        // Función para poner calificación del segundo parcial
        poner_calificacion_parcial_2($idasignatura, $idalumno, $calificacion);
    } elseif ($parcial == "Parcial 3") {
        // Función para poner calificación del tercer parcial
        poner_calificacion_parcial_3($idasignatura, $idalumno, $calificacion);
    } else {
        echo "Error: Parcial no válido";
    }

} else {

?>
<h1>Selecciona una asignatura: </h1>
<form action="" method="post">
    <select name="idmostrar">
        <?php
        require_once("contacto.php");
        $obj = new contacto();
        $resultado = $obj->consultarasignaturaimpartida($maestro);

        while ($registro = $resultado->fetch_assoc()) {
            echo "<option value='" . $registro["id_asignatura"] . "'>" . $registro["nombre_asignatura"] . "</option>";
        }

        ?>
    </select>
    <input type="submit" name="mostrar" value="Seleccionar Asignatura">
</form>
<?php
}


function poner_calificacion_parcial_1($idasignatura, $idalumno, $calificacion) {
    
    require_once("contacto.php");
    $obj3 = new contacto();
    $resultado = $obj3->ponerfalta($idasignatura, $idalumno, $calificacion);

   
}

function poner_calificacion_parcial_2($idasignatura, $idalumno, $calificacion) {
    
    require_once("contacto.php");
    // Código para poner la calificación del segundo parcial
}

function poner_calificacion_parcial_3($idasignatura, $idalumno, $calificacion) {
    
    require_once("contacto.php");
    // Código para poner la calificación del tercer parcial
}
?>
