<?php
session_start();
$maestro = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro
$parcial_seleccionado = ''; // Variable para almacenar el parcial seleccionado

require_once("contacto.php");

// Verificar si el maestro imparte alguna asignatura
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

        // Guardar el valor del parcial seleccionado en la variable
        $parcial_seleccionado = $_POST['parcial'];

        // Verifica si hay alumnos 
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

        $idalumno = $_POST["idalumno"];
        $idasignatura = $_POST["idmostrar"];
        $parcial_seleccionado = $_POST["parcial"]; // Agregar esta línea para actualizar $parcial_seleccionado

        require_once("contacto.php");
        $obj3 = new contacto();

        // Realizar una consulta personalizada para seleccionar solo el campo correspondiente al parcial seleccionado
        $resultado = $obj3->consultarcalificacionconparcial($idasignatura, $idalumno, $parcial_seleccionado);

        // Obtener el primer resultado de la consulta
        $registro = $resultado->fetch_assoc();

        // Verificar si el valor correspondiente al parcial seleccionado está vacío o no
        if (!empty($registro[$parcial_seleccionado])) {
            // Si el valor no está vacío, mostrar el formulario para ingresar la nueva calificación
            $calificacion_anterior = $registro[$parcial_seleccionado]; // Obtener la calificación anterior
            ?>
            <h1>Ingrese la nueva calificación</h1>
            <form action="" method="post">
                <input type="hidden" name="idmostrar" value="<?php echo $idasignatura; ?>">
                <input type="hidden" name="idalumno" value="<?php echo $idalumno; ?>">
                <input type="hidden" name="parcial" value="<?php echo $parcial_seleccionado; ?>">
                <label for="nueva_calificacion">Calificación: </label>
                <input type="text" id="nueva_calificacion" name="nueva_calificacion" placeholder="Ejemplo: 8.5" required> 
                <br><br>
                <input type="submit" name="actualizar_calificacion" value="Actualizar Calificación">
            </form>
            <?php
        } else {
            // Si el valor está vacío, mostrar mensaje de aviso
            echo "No hay registros de calificaciones para el parcial seleccionado.";
        }

    } elseif (isset($_POST["actualizar_calificacion"])) {

        $idalumno = $_POST["idalumno"];
        $idasignatura = $_POST["idmostrar"];
        $nueva_calificacion = $_POST["nueva_calificacion"]; // Obtener la nueva calificación ingresada por el usuario
        $parcial_seleccionado = $_POST["parcial"];

        // Validar que la caja de texto de la nueva calificación no esté vacía
        if (!empty($nueva_calificacion)) {
            require_once("contacto.php");
            $obj4 = new contacto();
            $obj4->modificarcalificacion($idalumno, $idasignatura, $nueva_calificacion, $parcial_seleccionado);
            echo "Calificación Modificada";
        } else {
            echo "Por favor ingrese una calificación.";
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
