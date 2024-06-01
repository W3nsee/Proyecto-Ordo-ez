<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <div class="regresar"></div>
        <?php
session_start();
require_once("../ArchivosDriversControles/contacto.php");

$id_asignatura = $_COOKIE['id_asignatura'] ?? null;

$obj2 = new contacto();
$resultado = $obj2->consultaralumnomatriculado($id_asignatura);

while ($registro = $resultado->fetch_assoc()) {
    $id_alumno = $registro['id_alumno'];
    echo "<div class='alumno_seleccion' onclick=\"seleccionalumno('$id_alumno')\">" . $registro['nombre_alumno'] ." ".$registro['apellido_paterno']. " " .$registro['apellido_materno']."</div>";
}
?>
<form action="" method="post" id="alumnoForm">
    <input type="hidden" id="inputalumno" name="inputalumno">
</form>

<script>
function seleccionalumno(id_alumno) {
    document.getElementById('inputalumno').value = id_alumno;
    document.cookie = "id_alumno=" + id_alumno;
    document.getElementById('alumnoForm').submit();
    window.location.href = "asignar_calificacion_3.php?id_alumno=" + id_alumno;
}
</script>



        <style>
            .alumno_seleccion{
                width: 25%;
                height: 300px;
                background-color: red;
                border-radius: 21px;
                cursor: pointer;
                float: inline-start;
                margin: 3%
            }
        </style>

    </body>
</html>