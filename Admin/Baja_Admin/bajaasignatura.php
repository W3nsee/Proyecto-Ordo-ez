<h1>Dar de baja una Asignatura</h1> 

<form action="" method="post">
   <select name=ideliminar>
      <?php
       require_once("contacto.php");
       $obj = new contacto();
       if (isset($_POST["eliminar"])){
         $obj->bajaasignatura($_POST["ideliminar"]);
       }
       $resultado = $obj->consultarasignatura();
       while($registro = $resultado->fetch_assoc()){
         echo "<option value=".$registro["id"].">".$registro["nombre"]."</option>";
       }

      ?>
   </select>
   <input type="submit" name="eliminar" value="Eliminar Asignatura">
</form>

<?php
   if(isset($_POST["eliminar"])){
      echo "Asignatura Eliminada";
   }
?>