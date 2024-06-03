<?php
session_start();
$maestro = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro

require_once("contacto.php");


$obj = new contacto();
$resultado_asignaturas = $obj->consultarasignaturaimpartida($maestro);

// verificar si el maestro imparte alguna asignatura
if($resultado_asignaturas->num_rows > 0) {
    if(isset($_POST["mostrar"])){
        echo "<h1>Listado de Alumnos</h1>";

        $obj2 = new contacto();
        $resultado_alumnos = $obj2->consultaralumnomatriculado($_POST["idmostrar"]);

        // verificar si hay alumnos matriculados para mostrar
        if($resultado_alumnos->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Nombres</th>";
            echo "<th>Apellido Paterno</th>";
            echo "<th>Apellido Materno</th>";

            while ($registro = $resultado_alumnos->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$registro["nombre_alumno"]."</td>";
                echo "<td>".$registro["apellido_paterno"]."</td>";
                echo "<td>".$registro["apellido_materno"]."</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No hay alumnos matriculados en esta asignatura.";
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
