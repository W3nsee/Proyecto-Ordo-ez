<?php
session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del alumno

require_once("contacto.php");

$obj = new contacto();
$resultado = $obj->consultaralumnomatriculadoconidalumno($id);

// verificar si el alumno está matriculado a alguna asignatura
if($resultado->num_rows > 0) {
    if(isset($_POST["mostrar"])){
        echo "<h1>Horario</h1>";

        $obj2 = new contacto();
        $resultado = $obj2->consultarhorario($_POST["idmostrar"]);
        if($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Día</th>";
            echo "<th>Hora de Inicio</th>";
            echo "<th>Hora de Término</th>";

            while ($registro = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$registro["dia"]."</td>";
                echo "<td>".$registro["hora_inicio"]."</td>";
                echo "<td>".$registro["hora_final"]."</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
        else{
            echo "No hay un horario para mostrar.";
        }
 
    } else {
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
    }
} else {
    echo "<p>No está matriculado a ninguna asignatura.</p>";
}
?>
