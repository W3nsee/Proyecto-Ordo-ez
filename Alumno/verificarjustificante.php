<?php
session_start();
$alumno = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro

require_once("contacto.php");
$obj = new contacto();
$resultado = $obj->consultarjustificantes($alumno);

if($resultado->num_rows > 0) {
        
    echo "<h1>Justificantes Solicitados: </h1>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Fecha de la falta</th>";
    echo "<th>Motivo</th>";
    echo "<th>Estado</th>";
    echo "</tr>";

     while ($registro = $resultado->fetch_assoc()) {
         echo "<tr>";
         echo "<td>".$registro["fecha_falta"]." "."</td>";
         echo "<td>".$registro["motivo"]." "."</td>";
         echo "<td>".$registro["estado"]." "."</td>";
         echo "</tr>";
     }

     echo "</table>";
     
 } else {
     echo "No has solicitado ningún justificante.";
 }


?>
