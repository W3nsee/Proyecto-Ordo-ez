
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos de un Alumno</title>
    <link rel="stylesheet" href="Administrador/CSS/modificar_alumno.css">

    <!--Fuentes de google-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">
</head>
<body>

    <?php
        // Verificar si se ha seleccionado un grado y grupo
        if(!isset($_POST["seleccionar"]) && !isset($_POST["cargar"]) && !isset($_POST["modificar"])) {
    ?>
        <h1 class="titulo">Modificar Datos de un Alumno</h1> 

        <h2 class="label_seleccionar">Selecciona el grado y grupo del alumno: </h2>

<form action="" method="post">

    <div class="cont_form">

        <div class="cont_grado">

            <h2 class="label_grado">Grado</h2>

            <div class="border_grado">

                <input class="input_grado_1" type="radio" name="grado" value="1" checked> 
                <input class="input_grado_2" type="radio" name="grado" value="2"> 
                <input class="input_grado_3" type="radio" name="grado" value="3"> <br/><br/>

            </div>

        </div>

        <div class="cont_grupo">

            <h2 class="label_grupo">Grupo</h2>

            <div class="border_grupo">

                <input class="input_grupo_a" type="radio" name="grupo" value="A" checked> 
                <input class="input_grupo_b" type="radio" name="grupo" value="B">
                <input class="input_grupo_c" type="radio" name="grupo" value="C"><br/><br/>

            </div>

        </div>

        <input class="boton_seleccionar" type="submit" name="seleccionar" value="Seleccionar">

    </div>

</form>

    <?php
        }

        if(isset($_POST["seleccionar"])){
            
            $grado = $_POST['grado'];
            $grupo = $_POST['grupo'];

            require_once("contacto.php");
            $obj4 = new contacto();
            $resultado = $obj4->consultarsalon($grado,$grupo);
            while ($registro = $resultado->fetch_assoc()){
                $idsalon = $registro['id'];
            }

            $obj5 = new contacto();
            $resultado = $obj5->consultaralumnosalon($idsalon);
            if($resultado->num_rows == 0) {
                echo "<h2>No hay alumnos disponibles para este grupo.</h2>";
            } else {

                echo "<h1 class='titulo'>Modificar Datos de un Alumno</h1>";
                echo "<h1>Seleccionar Alumno</h1>"; 
                echo "<form action='' method='post'>";
                echo "<select name='idmodificar'>";
                while ($registro = $resultado->fetch_assoc()){
                    echo "<option value=".$registro["id"].">".$registro["nombre"]." ".$registro["apellido_paterno"]." ".$registro["apellido_materno"]."</option>";
                }
                echo "</select>";
                echo "<input type='submit' name='cargar' value='Cargar Datos'>";
                echo "</form>";
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

</body>
</html>


