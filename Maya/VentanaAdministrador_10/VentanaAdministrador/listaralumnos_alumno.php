<?php
session_start();
$alumno = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro

require_once("contacto.php");
$obj = new contacto();
$resultado = $obj->consultaralumnoconid($alumno);
while ($registro = $resultado->fetch_assoc()) {
    $idsalon = $registro["id_salon"];
}

$obj2 = new contacto();
$resultado = $obj2->consultaralumnomismaclase($idsalon,$alumno);
// Verificar si hay alumnos matriculados para mostrar
    if($resultado->num_rows > 0) {
        
       echo "<h1>Listar Alumnos</h1>";
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
            echo "<td>".$registro["nombre"]." "."</td>";
            echo "<td>".$registro["apellido_paterno"]." "."</td>";
            echo "<td>".$registro["apellido_materno"]." "."</td>";
            echo "<td>".$registro["telefono"]." "."</td>";
            echo "<td>".$registro["correo"]." "."</td>";
            echo "</tr>";
        }

        echo "</table>";
        
    } else {
        echo "No compartes clase con ningún alumno por el momento.";
    }

?>
