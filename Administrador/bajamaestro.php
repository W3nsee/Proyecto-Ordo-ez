<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dar de Baja un Maestro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function confirmarEliminar() {
            return confirm("¿Estás seguro de que deseas eliminar este maestro?");
        }
        function validarFormulario() {
            var seleccion = document.getElementById("ideliminar").value;
            if (seleccion === "") {
                alert("Por favor, selecciona un maestro antes de continuar.");
                return false; // Evita que el formulario se envíe si no se ha seleccionado un alumno
            }
            return confirmarEliminar(); // Envía el formulario solo si se confirma la eliminación
        }

    </script>
</head>
<body>
    <h1>Dar de Baja un Maestro</h1> 

    <?php
    require_once("contacto.php");
    $obj = new contacto();
    $resultado = $obj->consultarmaestro();

    if ($resultado->num_rows === 0) {
        echo "<p>No hay maestros disponibles.</p>";
    } else {
        ?>

        <form action="" method="post" onsubmit="return validarFormulario();">
            <select name="ideliminar" id="ideliminar">
                <option value="" disabled selected hidden>Selecciona un maestro</option>
                <?php
                $obj2 = new contacto();
                $obj3 = new contacto();

                if (isset($_POST["eliminar"])){
                    $obj2->bajamaestro($_POST["ideliminar"]);
                    $obj3->eliminarmaestroimpartir($_POST["ideliminar"]);
                }

                while($registro = $resultado->fetch_assoc()){
                    echo "<option value=".$registro["id"].">".$registro["nombre"]." ".$registro["apellido_paterno"]." ".$registro["apellido_materno"]."</option>";
                }
                ?>
            </select>
            <input type="submit" name="eliminar" value="Eliminar Maestro">
        </form>

        <?php
        if(isset($_POST["eliminar"]) && !empty($_POST["ideliminar"])){
            echo "Maestro Eliminado";
        }
    }
    ?>
</body>
</html>
