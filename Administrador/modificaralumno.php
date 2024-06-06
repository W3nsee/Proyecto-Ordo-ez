<?php
    // Verificar si se ha seleccionado un grado y grupo
    if(!isset($_POST["seleccionar"]) && !isset($_POST["cargar"]) && !isset($_POST["modificar"])) {
?>
    <h1>Modificar Datos de un Alumno</h1> 
    <form action="" method="post">
        <select name="idsalon">
            <?php
               require_once("contacto.php");
               $obj = new contacto();
               $resultado_grupos = $obj->consultarsalon();

               while ($registro = $resultado_grupos->fetch_assoc()) {
                   echo 'Selecciona un grado y grupo: ';
                   echo "<option value=".$registro["id"].">".$registro["grado"].".- ".$registro["grupo"]."</option>";
               }
            ?>
        </select>
        <input type="submit" name="seleccionar" value="Seleccionar">
    </form>
<?php
    }

    if(isset($_POST["seleccionar"])){
        $idsalon = $_POST['idsalon'];

        require_once("contacto.php");
        $obj2 = new contacto();
        $resultado_alumnos = $obj2->consultaralumnosalon($idsalon);

        if($resultado_alumnos->num_rows == 0) {
            echo "<h2>No hay alumnos disponibles para este grupo.</h2>";
        } else {
?>
            <h1>Seleccionar Alumno</h1> 
            <form action="" method="post">
                <select name="idmodificar">
                    <?php
                       while ($registro = $resultado_alumnos->fetch_assoc()) {
                           echo "<option value=".$registro["id"].">".$registro["nombre"]." ".$registro["apellido_paterno"]." ".$registro["apellido_materno"]."</option>";
                       }
                    ?>
                </select>
                <input type="submit" name="cargar" value="Cargar Datos">
            </form>
<?php
        }
    }

    if(isset($_POST["cargar"])){
        require_once("contacto.php");
        $obj = new contacto();
        $resultado = $obj->cargaralumno($_POST['idmodificar']);
         while ($registro = $resultado->fetch_assoc()){
            $idsalon = $registro["id_salon"];
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

            <?php

            $obj = new contacto();
            $resultado_grado_grupo = $obj->cargargradogrupo($idsalon);
            while ($registro_grado_grupo = $resultado_grado_grupo->fetch_assoc()){
              
            ?>

            Grado:
            <label>
                <input type="radio" name="grado" value="1" <?php echo ($registro_grado_grupo["grado"] == '1') ? 'checked' : ''; ?>>1
            </label>
            <label>
                <input type="radio" name="grado" value="2" <?php echo ($registro_grado_grupo["grado"] == '2') ? 'checked' : ''; ?>>2
            </label>
            <label>
                <input type="radio" name="grado" value="3" <?php echo ($registro_grado_grupo["grado"] == '3') ? 'checked' : ''; ?>>3
            </label><br/><br/>
            Grupo:
            <label>
                <input type="radio" name="grupo" value="A" <?php echo ($registro_grado_grupo["grupo"] == 'A') ? 'checked' : ''; ?>>A
            </label>
            <label>
                <input type="radio" name="grupo" value="B" <?php echo ($registro_grado_grupo["grupo"] == 'B') ? 'checked' : ''; ?>>B
            </label>
            <label>
                <input type="radio" name="grupo" value="C" <?php echo ($registro_grado_grupo["grupo"] == 'C') ? 'checked' : ''; ?>>C
            </label><br/><br/>

            <?php
            }
            ?>

            Contraseña: <input type="text" name="contrasena" value="<?php echo $registro["contrasena"];?>"><br/><br/>
            <input type="hidden" name="id" value="<?php echo $_POST["idmodificar"];?>">
            <input type="submit" name="modificar" value="Modificar">
        </form>

<?php
        }
    }


    if(isset($_POST["modificar"])){
        $nombre = $_POST['nombre'];
        $apellidopaterno= $_POST['apellidopaterno'];
        $apellidomaterno= $_POST['apellidomaterno'];
        $fechanacimiento= $_POST['fechanacimiento'];
        $telefono= $_POST['telefono'];
        $correo= $_POST['correo'];
        $sexo= $_POST['sexo'];
        $grado = $_POST['grado'];
        $grupo = $_POST['grupo'];
        $contrasena = $_POST['contrasena'];
        $id = $_POST['id'];
        require_once("contacto.php");
        $obj = new contacto();
        $obj->modificaralumno($contrasena,$nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo,$id);

        $obj4 = new contacto();
        $resultado = $obj4->consultaridsalon($grado,$grupo);
        while ($registro = $resultado->fetch_assoc()) {
            $idsalon = $registro["id"];
        }

        $obj2 = new contacto();
        $obj2->gradogrupo($id,$grado,$grupo,$idsalon);
        echo "Registro Modificado";
    }
?>
