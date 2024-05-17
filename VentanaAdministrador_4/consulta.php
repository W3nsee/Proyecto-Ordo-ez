<?php

   require_once("contacto.php");
   $obj = new contacto();
   $resultado = $obj->consultar();
   echo "<table>";
   echo "<tr>";
   echo "<th>Nombres</th>";
   echo "<th>Apellido Paterno</th>";
   echo "<th>Apellido Materno</th>";
   echo "<th>Fecha de Nacimiento</th>";
   echo "<th>Teléfono</th>";
   echo "<th>Correo</th>";
   echo "<th>Sexo</th>";
   echo "</tr>";

   while($registro = $resultado->fetch_assoc()){
   	   echo "<tr>";
   	   echo "<td>".$registro["nombre"]."</td>";
   	   echo "<td>".$registro["apellido_paterno"]."</td>";
   	   echo "<td>".$registro["apellido_materno"]."</td>";
   	   echo "<td>".$registro["fecha_nacimiento"]."</td>";
   	   echo "<td>".$registro["telefono"]."</td>";
         echo "<td>".$registro["correo"]."</td>";
         echo "<td>".$registro["sexo"]."</td>";
   	   echo "</tr>";
   }
?>