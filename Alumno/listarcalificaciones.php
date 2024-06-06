<?php
session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del alumno

require_once("contacto.php");

$obj = new contacto();
$resultado = $obj->consultaralumnomatriculadoconidalumno($id);

// verificar si el alumno está matriculado a alguna asignatura
if($resultado->num_rows > 0) {
    if(isset($_POST["mostrar"])){
        echo "<h1>Calificaciones: </h1>";

        $obj2 = new contacto();
        $resultado = $obj2->consultarcalificaciones($id,$_POST["idmostrar"]);
        if($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Primer Parcial</th>";
            echo "<th>Segundo Parcial</th>";
            echo "<th>Tercer Parcial</th>";

            while ($registro = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$registro["parcial_1"]."</td>";
                echo "<td>".$registro["parcial_2"]."</td>";
                echo "<td>".$registro["parcial_3"]."</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
        else{
            echo "No hay calificaciones para mostrar.";
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
