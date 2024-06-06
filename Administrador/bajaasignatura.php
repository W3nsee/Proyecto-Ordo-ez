<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dar de Baja una Asignatura</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function confirmarEliminar() {
            return confirm("¿Estás seguro de que deseas eliminar esta asignatura?");
        }
        function validarFormulario() {
            var seleccion = document.getElementById("ideliminar").value;
            if (seleccion === "") {
                alert("Por favor, selecciona una asignatura antes de continuar.");
                return false; // Evita que el formulario se envíe si no se ha seleccionado un alumno
            }
            return confirmarEliminar(); // Envía el formulario solo si se confirma la eliminación
        }

    </script>
</head>
<body>
    <h1>Dar de Baja una Asignatura</h1> 

    <?php
    require_once("contacto.php");
    $obj = new contacto();
    $resultado = $obj->consultarasignatura();

    if ($resultado->num_rows === 0) {
        echo "<p>No hay asignaturas disponibles.</p>";
    } else {
        ?>

        <form action="" method="post" onsubmit="return validarFormulario();">
            <select name="ideliminar" id="ideliminar">
                <option value="" disabled selected hidden>Selecciona una asignatura</option>
                <?php
        $obj2 = new contacto();
        $obj3 = new contacto();
        $obj4 = new contacto();
        $obj5 = new contacto();
        $obj6 = new contacto();

        if (isset($_POST["eliminar"])){
            $obj->bajaasignatura($_POST["ideliminar"]);
            $obj2->eliminarmatriculaasignatura($_POST["ideliminar"]);
            $obj3->eliminaridasignatura($_POST["ideliminar"]);
            $obj4->eliminarhorario($_POST["ideliminar"]);
            $obj5->eliminartodocalificacion($_POST["ideliminar"]);
            $obj6->eliminartodofaltas($_POST["ideliminar"]);
        }
        
        while($registro = $resultado->fetch_assoc()){
            echo "<option value=".$registro["id"].">".$registro["nombre"]."</option>";
        }
        ?>
            </select>
            <input type="submit" name="eliminar" value="Eliminar Asignatura">
        </form>

        <?php
        if(isset($_POST["eliminar"]) && !empty($_POST["ideliminar"])){
            echo "Asignatura Eliminado";
        }
    }
    ?>
</body>
</html>
