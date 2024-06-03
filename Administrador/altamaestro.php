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
</head>
<body>

<h1>Dar de Alta un Maestro</h1>

<form action="" method="post">
    Nombres: <input type="text" name="nombre" placeholder="Ejem. José María" required><br/><br/>
    Apellido paterno: <input type="text" name="apellidopaterno" placeholder="Ejem. Pérez" required><br/><br/>
    Apellido materno: <input type="text" name="apellidomaterno" placeholder="Ejem. Gómez" required><br/><br/>
    Fecha de nacimiento: <input type="date" name="fechanacimiento" required><br/><br/>
    Telefono: <input type="text" name="telefono" placeholder="Ejem. 312 666 6666" required><br/><br/>
    Correo: <input type="email" name="correo" placeholder="Ejem. nombre6@gmail.com" required><br/><br/>
    Sexo:
    <label>
        <input type="radio" name="sexo" value="F" checked>Femenino
    </label>
    <label>
        <input type="radio" name="sexo" value="M">Masculino
    </label><br/><br/>
    Contraseña: <input type="text" name="contrasena" id="contrasena" readonly><br/><br/>
    <input type="button" value="Generar Contraseña" onclick="generarContrasena()">
    <input type="submit" name="insertar" value="Guardar">
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
