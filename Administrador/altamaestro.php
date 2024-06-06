<?php
if(isset($_POST['insertar'])){
    $nombre = $_POST['nombre'];
    $apellidopaterno = $_POST['apellidopaterno'];
    $apellidomaterno = $_POST['apellidomaterno'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $sexo = $_POST['sexo'];
    $contrasena = $_POST['contrasena'];

    // Verificar si la contraseña está presente y no está vacía
    if(empty($contrasena)) {
        echo "<p>Por favor, genera la contraseña antes de guardar los datos.<p>";
    } else {
        require_once("contacto.php");
        $obj = new contacto();
        $obj->altamaestro($contrasena,$nombre,$apellidopaterno,$apellidomaterno,$fechanacimiento,$telefono,$correo,$sexo);
        echo "Maestro Guardado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta Alumnos</title>
    <link rel="stylesheet" href="Administrador/CSS/alta_maestro.css">

</head>
<body>

<h1 class="titulo">Dar de Alta un Maestro</h1>

<form action="" method="post">

    <div class="cont_form">

    <div class="cont_nombres">

    <h2 class="label_nombres">Nombres</h2>
    <input class="input_nombres" type="text" name="nombre" placeholder="Ejem. José María" required> <br/><br/>

    </div>

    <div class="cont_apellido_paterno">

    <h2 class="label_apellido_paterno">Apellido paterno</h2>
    <input class="input_apellido_paterno" type="text" name="apellidopaterno" placeholder="Ejem. Pérez" required><br/><br/>

    </div>

    <div class="cont_apellido_materno">

    <h2 class="label_apellido_materno">Apellido materno</h2>
    <input class="input_apellido_materno" type="text" name="apellidomaterno" placeholder="Ejem. Gómez" required><br/><br/>

    </div>

    <div class="cont_fecha_nacimiento">

    <h2 class="label_fecha_nacimiento">Fecha de nacimiento</h2>

    <input class="input_fecha_nacimiento" type="date" name="fechanacimiento" max="<?php echo date('Y-m-d'); ?>" required><br/><br/><!-- Añadir el atributo max -->

    </div>

    <div class="cont_telefono">

    <h2 class="label_telefono">Telefono</h2>
    <input class="input_telefono" type="text" name="telefono" placeholder="Ejem. 312 666 6666" required><br/><br/>

    </div>

    <div class="cont_correo">

    <h2 class="label_correo">Correo</h2>
    <input class="input_correo" type="email" name="correo" placeholder="Ejem. nombre6@gmail.com" required><br/><br/>

    </div>

    <div class="cont_sexo">

    <h2 class="label_sexo">Sexo</h2>
        
    <div class="border_sexo">

        <input class="input_sexo_femenino" type="radio" name="sexo" value="F" checked>
        <input class="input_sexo_masculino" type="radio" name="sexo" value="M"> <br/><br/>

    </div>

    </div>

    <div class="cont_password">

    <h2 class="label_password">Contraseña</h2>
    <input class="input_password" type="password" id="contrasena" name="contrasena" readonly><br/><br/>
    <input class="boton_generar" type="button" value="Generar Contraseña" onclick="generarContrasena()">

    </div>

    <div class="button_guardar">

    <input class="boton_guardar" type="submit" name="insertar" value="Guardar">

    </div>

    </div>
    
</form>

<script>
    function generarContrasena() {
        // Obtener los datos necesarios para generar la contraseña
        var nombre = document.getElementsByName("nombre")[0].value;
        var apellidopaterno = document.getElementsByName("apellidopaterno")[0].value;
        var fechanacimiento = document.getElementsByName("fechanacimiento")[0].value;

        // toma parte del nombre, apellido y fecha de nacimiento
        var parte_nombre = nombre.substring(0, 3); // Tomar los primeros 3 caracteres del nombre
        var parte_apellido = apellidopaterno.substring(0, 2); // Tomar los primeros 2 caracteres del apellido paterno
        var parte_fecha = fechanacimiento.split("-").join("").substring(2, 8); // Tomar el año, mes y día de la fecha de nacimiento

        // Combinar las partes para formar la contraseña
        var contrasena = parte_nombre + parte_apellido + parte_fecha;

        // Actualizar el valor de la caja de texto
        document.getElementById("contrasena").value = contrasena;
    }
</script>

</body>
</html>

