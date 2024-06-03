<?php
session_start();
$maestro = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro

require_once("contacto.php");
$obj = new contacto();
$resultado_asignaturas = $obj->consultarasignaturaimpartida($maestro);

if ($resultado_asignaturas->num_rows > 0) {
    if(isset($_POST["mostrar"])){

        $obj2 = new contacto();
        $resultado = $obj2->consultaralumnomatriculado($_POST["idmostrar"]);

        // Verifica si hay alumnos 
        if($resultado->num_rows > 0) {

            echo "<h2>Selecciona un alumno: </h2>";
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='idmostrar' value='" . $_POST["idmostrar"] . "'>";
            echo "Alumno: ";
            echo "<select name='idalumno'>";
            while ($registro = $resultado->fetch_assoc()) {
                echo "<option value='" . $registro["id_alumno"] . "'>" . $registro["nombre_alumno"] . " " . $registro["apellido_paterno"] . " " . $registro["apellido_materno"] . "</option>";
            }
            echo "</select>";
            echo "<br><br>";

            echo "<input type='submit' name='seleccionar' value='Seleccionar Alumno'>";
            echo "</form>";

        } else {
            echo "No hay alumnos matriculados en esta asignatura.";
        }

    } elseif (isset($_POST["seleccionar"])) {

        $idasignatura = $_POST["idmostrar"];
        $idalumno = $_POST["idalumno"];

        $obj3 = new contacto();
        $resultado = $obj3->consultarfaltas($idalumno, $idasignatura);

        // Verificar si hay faltas de asistencia
        if($resultado->num_rows > 0) {
            echo "<h2>Selecciona la falta a modificar: </h2>";
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='idmostrar' value='" . $_POST["idmostrar"] . "'>";
            echo "<input type='hidden' name='idalumno' value='" . $_POST["idalumno"] . "'>";
            echo "Faltas: ";
            echo "<select name='idfalta'>";

            while ($registro = $resultado->fetch_assoc()) {
                echo "<option value='" . $registro["id"] . "'>" . $registro["fecha_falta"] . "</option>";
            }

            echo "</select>";
            echo "<br><br>";

            echo "<label for='fecha'>Nueva Fecha de la falta: </label>";
            echo "<input type='date' id='fecha' name='fecha' required>"; // Agregamos 'required' para hacer obligatorio el campo

            // Validar fecha para que no sea futura
            echo "<script>";
            echo "document.getElementById('fecha').setAttribute('max', new Date().toISOString().split('T')[0]);";
            echo "</script>";

            echo "<br><br>";

            echo "<input type='submit' name='modificarfalta' value='Modificar'>";
            echo "</form>";
        } else {
            echo "El alumno no tiene ninguna falta de asistencia.";
        }

    } elseif (isset($_POST["modificarfalta"])) {

        $idalumno = $_POST["idalumno"];
        $idfalta = $_POST["idfalta"]; // ID de la falta de asistencia a modificar
        $fecha = $_POST["fecha"]; // Nueva fecha de la falta de asistencia

        // Validar que la fecha no esté vacía
        if (!empty($fecha)) {
            $fecha_actual = date("Y-m-d");
            // Validar que la fecha no sea futura
            if ($fecha <= $fecha_actual) {
                $obj3 = new contacto();
                $obj3->modificarfalta($idfalta, $fecha);
                echo "Falta de Asistencia Modificada";
            } else {
                echo "La fecha seleccionada es futura. Por favor, seleccione una fecha válida.";
            }
        } else {
            echo "Por favor, seleccione una fecha.";
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
