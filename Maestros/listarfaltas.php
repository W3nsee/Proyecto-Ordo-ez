<h1>Listar Faltas de Asistencia</h1>

<?php
session_start();
$maestro = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro

if(isset($_POST["mostrar"])){

    require_once("contacto.php");

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

    require_once("contacto.php");
    $obj3 = new contacto();
    $resultado = $obj3->consultarfaltas($idalumno, $idasignatura);

    // Verifica si hay faltas de asistencia para el alumno seleccionado
    if($resultado->num_rows > 0) {
        echo "<h2>Faltas de Asistencia:</h2>";
        echo "<ul>";
        while ($registro = $resultado->fetch_assoc()) {
            echo "<li>" . $registro["fecha_falta"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay faltas de asistencia asociadas a este alumno.";
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

        // Verifica si hay asignaturas disponibles
        if($resultado->num_rows > 0) {
            while ($registro = $resultado->fetch_assoc()) {
                echo "<option value='" . $registro["id_asignatura"] . "'>" . $registro["nombre_asignatura"] . "</option>";
            }
        } else {
            echo "<option value=''>No hay asignaturas disponibles</option>";
        }

        ?>
    </select>
    <input type="submit" name="mostrar" value="Seleccionar Asignatura">
</form>
<?php
}
?>

