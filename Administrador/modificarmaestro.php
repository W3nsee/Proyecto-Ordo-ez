<h1>Modificar Datos de un Maestro</h1> 

<?php
require_once("contacto.php");
$obj = new contacto();
$resultado = $obj->consultarmaestro();

// verificar si hay maestros disponibles
if($resultado->num_rows > 0) {
    ?>
    <form action="" method="post">
        <select name="idmodificar">
            <?php
            while ($registro = $resultado->fetch_assoc()) {
                echo "<option value=".$registro["id"].">".$registro["nombre"]." ".$registro["apellido_paterno"]. " " .$registro["apellido_materno"]."</option>";
            }
            ?>
        </select>
        <input type="submit" name="cargar" value="Cargar Datos">
    </form>
    <?php
} else {
    // Mostrar un mensaje indicando que no hay maestros disponibles
    echo "<p>No hay maestros disponibles.</p>";
}
?>


<?php
if(isset($_POST["cargar"])){
    require_once("contacto.php");
    $obj = new contacto();
    $resultado = $obj->cargarmaestro($_POST['idmodificar']);
     while ($registro = $resultado->fetch_assoc()){
    ?>
    <form action="" method="post">
         <br/><br/> 
            Nombre: <input type="text" name="nombre" value="<?php echo $registro["nombre"];?>" required><br/><br/> 
            Apellido Paterno: <input type="text" name="apellidopaterno" value="<?php echo $registro["apellido_paterno"];?>" required><br/><br/> 
            Apellido Materno: <input type="text" name="apellidomaterno" value="<?php echo $registro["apellido_materno"];?>"required><br/><br/> 
            Fecha de Nacimiento: <input type="date" name="fechanacimiento" value="<?php echo $registro["fecha_nacimiento"];?>"required><br/><br/> 
            Telefono: <input type="text" name="telefono" value="<?php echo $registro["telefono"];?>"required><br/><br/> 
            Correo: <input type="text" name="correo" value="<?php echo $registro["correo"];?>"required><br/><br/>
            Sexo:
             <label>
                <input type="radio" name="sexo" value="F" <?php echo ($registro["sexo"] == 'F') ? 'checked' : ''; ?>>Femenino
             </label>
             <label>
                <input type="radio" name="sexo" value="M" <?php echo ($registro["sexo"] == 'M') ? 'checked' : ''; ?>>Masculino
             </label><br/><br/>
             
             Contraseña: <input type="text" name="contrasena" value="<?php echo $registro["contrasena"];?>"><br/><br/>
            <input type="hidden" name="id" value="<?php echo $_POST["idmodificar"];?>">
            <input type="submit" name="modificar" value="Modificar">
     <?php
     }
}
if(isset($_POST["modificar"])){
     $nombre = $_POST['nombre'];
     $contrasena = $_POST['contrasena'];
     $apellidopaterno= $_POST['apellidopaterno'];
     $apellidomaterno= $_POST['apellidomaterno'];
     $fechanacimiento= $_POST['fechanacimiento'];
     $telefono= $_POST['telefono'];
     $correo= $_POST['correo'];
     $sexo= $_POST['sexo'];
     $id = $_POST['id'];
     require_once("contacto.php");
     $obj = new contacto();
     $obj->modificarmaestro($contrasena,$nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo,$id);
     echo "Registro Modificado";
  }
?>
