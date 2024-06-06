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
        echo "<h2>Selecciona una falta de asistencia:</h2>";
        echo "<form action='' method='post'>";
        echo "<select name='idfalta'>";
        while ($registro = $resultado->fetch_assoc()) {
            echo "<option value='" . $registro["id"] . "'>" . $registro["fecha_falta"] . "</option>";
        }
        echo "</select>";
        echo "<br><br>";
        echo "<label for='motivo'>Motivo:</label><br>";
        echo "<textarea id='motivo' name='motivo' rows='4' cols='50' required></textarea>"; 
        echo "<br><br>";
        echo "<input type='submit' name='enviar' value='Enviar Motivo'>";
        echo "</form>";
    } else {
        echo "No hay faltas de asistencia asociadas a esta asignatura.";
    }

} elseif (isset($_POST["enviar"])) {

    $idfalta = $_POST["idfalta"];
    $motivo = $_POST["motivo"];

    require_once("contacto.php");
    $obj4 = new contacto();
    $resultado = $obj4->consultarunafalta($idfalta);
    if ($registro = $resultado->fetch_assoc()) {
        $idasignatura = $registro['id_asignatura'];
        $nombreasignatura = $registro['nombre_asignatura'];
        $idalumno = $registro['alumno_id'];
        $nombrealumno = $registro['nombre_alumno'];
        $apellidopaterno = $registro['apellido_paterno'];
        $apellidomaterno = $registro['apellido_materno'];
        $fechafalta = $registro['fecha_falta'];
        $estado = "Pendiente";
    }

    $obj5 = new contacto();
    $resultado = $obj5->agregarajustificante($idasignatura,$nombreasignatura,$idalumno,$nombrealumno,$apellidopaterno,$apellidomaterno,$fechafalta,$motivo,$estado);
    echo "Justificante solicitado";

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
