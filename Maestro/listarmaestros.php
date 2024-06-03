<?php
session_start();
$maestro = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro

require_once("contacto.php");
$obj = new contacto();
$resultado = $obj->consultarmaestrodiferente($maestro);

echo "<h1>Listar Profesores</h1>";

if ($resultado->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Nombres</th>";
    echo "<th>Apellido Paterno</th>";
    echo "<th>Apellido Materno</th>";
    echo "</tr>";

    while ($registro = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$registro["nombre"]."</td>";
        echo "<td>".$registro["apellido_paterno"]."</td>";
        echo "<td>".$registro["apellido_materno"]."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No se encontraron otros profesores.</p>";
}
?>
