<h1>Listar Faltas de Asistencia</h1>

<?php
session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del alumno

if(isset($_POST["mostrar"])){

    $idasignatura = $_POST["idmostrar"];
    $idalumno = $id;

    require_once("contacto.php");
    $obj3 = new contacto();
    $resultado = $obj3->consultarfaltas($idalumno,$idasignatura);

    // Verifica si hay faltas de asistencia para la asignatura seleccionada
    if($resultado->num_rows > 0) {
        echo "<h2>Faltas de Asistencia:</h2>";
        echo "<ul>";
        while ($registro = $resultado->fetch_assoc()) {
            echo "<li>" . $registro["fecha_falta"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay faltas de asistencia asociadas a esta asignatura.";
    }

} else  {

?>
<h1>Selecciona una asignatura: </h1>
<form action="" method="post">
    <select name="idmostrar">
        <?php
        require_once("contacto.php");
        $obj = new contacto();
        $resultado = $obj->consultaralumnomatriculadoconidalumno($id);

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
