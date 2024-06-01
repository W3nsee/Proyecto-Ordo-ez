<?php
session_start();
$maestro = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro

require_once("contacto.php");
$obj = new contacto();
$resultado = $obj->consultarmaestro();

echo "<h1>Listar Profesores</h1>";
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
    echo "<td>".$registro["nombre"]."</td>";
    echo "<td>".$registro["apellido_paterno"]."</td>";
    echo "<td>".$registro["apellido_materno"]."</td>";
    echo "<td>".$registro["telefono"]."</td>";
    echo "<td>".$registro["correo"]."</td>";
    echo "</tr>";
}

echo "</table>";
?>
