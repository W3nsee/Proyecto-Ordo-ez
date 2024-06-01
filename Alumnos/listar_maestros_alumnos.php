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
    <?php
    session_start();
    require_once("../ArchivosDriversControles/contacto.php");

// Verifica si la sesión está iniciada y si el ID del usuario está disponible

   
    $id = $_SESSION['id'];

    $obj = new contacto();
    $resultado = $obj->listar_maestros_alumnos($id);

    while ($registro = $resultado->fetch_assoc()) {
        $maestro = $registro['nombre_maestro']. " " .$registro['apellido_paterno']. " " .$registro['apellido_materno'];
        echo "<div class='maestro'><div class='texto_asignatura'>" . $registro['nombre_asignatura'] . "</div> <div class='nombre_maestro'>" . $maestro . "</div></div>";
    }


?>

    <!-- ------------------------------------- STYLES ---------------------------------------------- -->
    <style>
    .maestro{
        width: 25%;
        height: 300px;
        background-color: red;
        border-radius: 21px;
        cursor: pointer;
        float: inline-start;
        margin: 3%

    }
    
    
    </style>

    <!--
	
public function listar_maestros_alumnos($id){
	$this->sentencia = "SELECT impartir.nombre_asignatura, impartir.nombre_maestro, impartir.apellido_paterno, impartir.apellido_materno from impartir inner JOIN matricula on impartir.id_asignatura = matricula.id_asignatura where matricula.id_alumno = '$id'";
	$bandera = $this->ejecutar_sentencia();
	return $bandera;
}
-->

    </body>
</html>