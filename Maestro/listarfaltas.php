<?php
session_start();
$maestro = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro

if(isset($_POST["mostrar"])){

    require_once("contacto.php");

    // Obtener el id de la asignatura seleccionada
    $idasignatura = $_POST["idmostrar"];

    // Consultar los alumnos matriculados en la asignatura seleccionada junto con sus faltas de asistencia
    $obj3 = new contacto();
    $resultado = $obj3->consultaralumnomatriculado($idasignatura);

    // Verifica si hay alumnos 
    if($resultado->num_rows > 0) {
        echo "<h2>Faltas de asistencia:</h2>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Alumno</th>";
        echo "<th>Faltas de Asistencia</th>";
        echo "</tr>";

        while ($registro = $resultado->fetch_assoc()) {
            // Obtener el conteo de faltas de asistencia del alumno
            $obj2 = new contacto();
            $faltas = $obj2->contarfaltas($registro['id_alumno'], $idasignatura);

            echo "<tr>";
            echo "<td>" . $registro["nombre_alumno"] . " " . $registro["apellido_paterno"] . " " . $registro["apellido_materno"] . "</td>";
            echo "<td>" . $faltas . "</td>";
            echo "</tr>";
        }

        echo "</table>";

    } else {
        echo "<p>No hay alumnos matriculados en esta asignatura.</p>";
    }

} else {
    require_once("contacto.php");
    $obj = new contacto();
    $resultado = $obj->consultarasignaturaimpartida($maestro);

    // Verifica si hay asignaturas disponibles
    if($resultado->num_rows > 0) {
?>
<h1>Selecciona una asignatura: </h1>
<form action="" method="post">
    <select name="idmostrar">
        <?php
            while ($registro = $resultado->fetch_assoc()) {
                echo "<option value='" . $registro["id_asignatura"] . "'>" . $registro["nombre_asignatura"] . "</option>";
            }
        ?>
    </select>
    <input type="submit" name="mostrar" value="Seleccionar Asignatura">
</form>
<?php
    } else {
        echo "<p>No se encontraron asignaturas impartidas.</p>";
    }
}
?>
