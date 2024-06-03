<?php
session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del alumno

require_once("contacto.php");
$obj = new contacto();
$resultado_asignatura = $obj->consultaralumnomatriculadoconidalumno($id);

// Verificar si hay asignaturas matriculadas para mostrar
if($resultado_asignatura->num_rows > 0) {
    echo "<h1>Listar Maestros</h1>";

    // para q no se repitan las columnas de nombre, apellidos, etc...
    $columnas_impresas = false;

    // ciclo d asignaturas
    while ($registro_asignatura = $resultado_asignatura->fetch_assoc()) {
        $idasignatura = $registro_asignatura["id_asignatura"];

        $obj2 = new contacto();
        $resultado_maestros = $obj2->consultarmaestroconidasignatura($idasignatura);

        // Verificar si hay maestros asociados a la asignatura del alumno
        if($resultado_maestros->num_rows > 0) {
            
            if (!$columnas_impresas) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Nombres</th>";
                echo "<th>Apellido Paterno</th>";
                echo "<th>Apellido Materno</th>";
                echo "<th>Materia</th>";
                echo "</tr>";
                $columnas_impresas = true; //ya se imprimieron las columnas
            }

            // Inicia el segundo bucle while para recorrer los maestros asociados a la asignatura
            while ($registro_maestro = $resultado_maestros->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$registro_maestro["nombre_maestro"]." "."</td>";
                echo "<td>".$registro_maestro["apellido_paterno"]." "."</td>";
                echo "<td>".$registro_maestro["apellido_materno"]." "."</td>";
                echo "<td>".$registro_maestro["nombre_asignatura"]." "."</td>";
                echo "</tr>";
            }
        } else {
            echo "No compartes clase con ningún maestro por el momento.";
        }
    }

    //se cierra la tabla después de haber impreso todos los registros
    if ($columnas_impresas) {
        echo "</table>";
    }
} else {
    echo "No tienes asignaturas matriculadas.";
}
?>
