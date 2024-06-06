<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Matricular un alumno</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <h1>Matricular un alumno</h1> 
    <!-- Formulario -->
    <form action="" method="post">
        <h2>Alumnos:</h2>
        <select name="alumno" id="alumnoSelect">
            <p>Selecciona un alumno: <p>
            <?php
            require_once("contacto.php");
            $obj = new Contacto();
            $resultado = $obj->consultaralumno();
            while($registro = $resultado->fetch_assoc()){
                echo "<option value=".$registro["id"].">".$registro["nombre"]." ".$registro["apellido_paterno"]." ".$registro["apellido_materno"]."</option>";
            }
            ?>
        </select>

        <h2>Asignatura:</h2>
        <select name="asignatura" id="asignaturaSelect">
            <?php
            $resultado = $obj->consultarasignatura();
            while($registro = $resultado->fetch_assoc()){
                echo "<option value=".$registro["id"].">".$registro["nombre"]."</option>";
            }
            ?>
        </select>

        <input type="submit" name="insert" value="Guardar" class="boton">
    </form>
</body>
</html>


<?php
// Incluir el archivo PHP que contiene la clase Contacto
require_once("contacto.php");

// Si se ha enviado el formulario
if(isset($_POST['insert'])){
    // Recuperar los valores del formulario
    $idalumno = isset($_POST['alumno']) ? $_POST['alumno'] : '';
    $idasignatura = isset($_POST['asignatura']) ? $_POST['asignatura'] : '';
    
    $obj = new contacto();
        $resultado = $obj->cargaralumno($idalumno);
        while ($registro = $resultado->fetch_assoc()) {
        $nombrealumno = $registro["nombre"];
        $apellidopaterno = $registro["apellido_paterno"];
        $apellidomaterno = $registro["apellido_materno"];
    }

    $obj2 = new contacto();
        $resultado = $obj2->cargarasignatura($idasignatura);
        while ($registro = $resultado->fetch_assoc()) {
        $nombreasignatura = $registro["nombre"];
    }

    $obj3 = new contacto();
    $obj3->matricularalumno($idasignatura,$nombreasignatura,$idalumno,$nombrealumno,$apellidopaterno,$apellidomaterno);

    echo "Alumno Matriculado";
}
?>