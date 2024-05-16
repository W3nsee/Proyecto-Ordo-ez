<?php
// Incluye el archivo que contiene la configuración de la conexión a la base de datos
include("conexion.php");
// Incluye el archivo que contiene las funciones para interactuar con la base de datos
include("contacto.php");

// Clase Contacto que contiene las funciones de la base de datos
$contacto = new Contacto();

// Si se ha enviado el formulario para agregar falta de asistencia
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["confirmar_alumno"])) {
        // Obtiene el ID del alumno seleccionado del formulario
        $alumno_id = $_POST["alumno_id"];

        // Obtiene la fecha de la falta de asistencia seleccionada del formulario
        $fecha_falta = $_POST["fecha_falta"];

        // Inserta la falta de asistencia en la base de datos
        $contacto->registrarFaltaAsistencia($alumno_id, $fecha_falta);

        // Muestra un mensaje de confirmación
        echo "Falta de asistencia registrada para el alumno con ID: $alumno_id en la fecha: $fecha_falta";
    }
}

// Obtiene la lista de todos los alumnos
$alumnos = $contacto->consultaralumno();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Falta de Asistencia</title>
</head>
<body>
    <h1>Registrar Falta de Asistencia</h1>
    
    <!-- Formulario para seleccionar un alumno y la fecha de la falta de asistencia -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="alumno">Seleccionar Alumno:</label>
        <select name="alumno_id" id="alumno">
            <?php foreach ($alumnos as $alumno) { ?>
                <option value="<?php echo $alumno['id']; ?>"><?php echo $alumno['nombre']; ?></option>
            <?php } ?>
        </select>
        
        <!-- Input de tipo Date para seleccionar la fecha de la falta de asistencia -->
        <label for="fecha_falta">Fecha de Falta:</label>
        <input type="date" name="fecha_falta" id="fecha_falta" required>
        
        <button type="submit" name="confirmar_alumno">Confirmar Selección</button>
    </form>
</body>
</html>
