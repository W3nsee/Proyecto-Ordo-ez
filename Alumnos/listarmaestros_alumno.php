<?php
session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro

require_once("../ArchivosDriversControles/contacto.php");
$obj = new contacto();
$resultado = $obj->consultaralumnomatriculadoconidalumno($id);
while ($registro = $resultado->fetch_assoc()) {
    $idasignatura = $registro["id_asignatura"];
}

$obj2 = new contacto();
$resultado = $obj2->consultarmaestroconidasignatura($idasignatura);
// Verificar si hay alumnos matriculados para mostrar
    if($resultado->num_rows > 0) {
        
       echo "<h1>Listar Maestros</h1>";
       echo "<table>";
       echo "<tr>";
       echo "<th>Nombres</th>";
       echo "<th>Apellido Paterno</th>";
       echo "<th>Apellido Materno</th>";
       echo "<th>Teléfono</th>";
       echo "<th>Correo</th>";
       echo "</tr>";

        while ($registro = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$registro["nombre_maestro"]." "."</td>";
            echo "<td>".$registro["apellido_paterno"]." "."</td>";
            echo "<td>".$registro["apellido_materno"]." "."</td>";
            echo "</tr>";
        }

        echo "</table>";
        
    } else {
        echo "No compartes clase con ningún alumno por el momento.";
    }

?>
