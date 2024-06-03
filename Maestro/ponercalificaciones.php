<?php
session_start();
$maestro = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro
$parcial_seleccionado = ''; // variable para almacenar el parcial seleccionado

require_once("contacto.php");

// verificar si el maestro imparte alguna asignatura
$obj = new contacto();
$resultado_asignaturas = $obj->consultarasignaturaimpartida($maestro);

if ($resultado_asignaturas->num_rows > 0) {
    if (isset($_POST["mostrar"])) {

        echo "<h2>Selecciona el parcial:</h2>";
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='idmostrar' value='" . $_POST["idmostrar"] . "'>";
        echo "<select name='parcial'>";
        echo "<option value='parcial_1'>Parcial 1</option>";
        echo "<option value='parcial_2'>Parcial 2</option>";
        echo "<option value='parcial_3'>Parcial 3</option>";
        echo "</select>";
        echo "<br><br>";

        echo "<input type='submit' name='seleccionar_parcial' value='Seleccionar Parcial'>";
        echo "</form>";

    } elseif (isset($_POST["seleccionar_parcial"])) {

        $obj2 = new contacto();
        $resultado = $obj2->consultaralumnomatriculado($_POST["idmostrar"]);

        $parcial_seleccionado = $_POST['parcial'];

        // verificar si hay alumnos
        if ($resultado->num_rows > 0) {

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

        //formulario para ingresar la calificación

        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='idmostrar' value='" . $_POST["idmostrar"] . "'>";
        echo "<input type='hidden' name='idalumno' value='" . $_POST["idalumno"] . "'>";
        echo "<input type='hidden' name='parcial' value='" . $_POST["parcial"] . "'>"; // Pasar el parcial seleccionado
        echo "<label for='calificacion'>Calificación: </label>";
        echo "<input type='text' id='calificacion' name='calificacion' placeholder='Ejemplo: 8.5' required>";
        echo "<br><br>";
        echo "<input type='submit' name='ingresar_calificacion' value='Ingresar Calificación'>";
        echo "</form>";

    } elseif (isset($_POST["ingresar_calificacion"])) {

        $idasignatura = $_POST["idmostrar"];
        $idalumno = $_POST["idalumno"];
        $calificacion = $_POST["calificacion"];
        $parcial = $_POST["parcial"];

        // Validar que la calificación no esté vacía
        if (!empty($calificacion)) {
            $obj3 = new contacto();
            $obj3->poner_calificacion($idalumno, $idasignatura, $calificacion, $parcial);
            echo "Calificación Colocada";
        } else {
            echo "No puede dejar el campo vacío. Por favor ingrese una calificación.";
        }

    } else {

?>
        <h1>Selecciona una asignatura: </h1>
        <form action="" method="post">
            <select name="idmostrar">
                <?php

                while ($registro = $resultado_asignaturas->fetch_assoc()) {
                    echo "<option value='" . $registro["id_asignatura"] . "'>" . $registro["nombre_asignatura"] . "</option>";
                }

                ?>
            </select>
            <input type="submit" name="mostrar" value="Seleccionar Asignatura">
        </form>
<?php
    }
} else {
    echo "<p>No se encontraron asignaturas impartidas.</p>";
}
?>
