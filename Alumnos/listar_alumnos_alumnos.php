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
    
    //session_start();
    require_once("../ArchivosDriversControles/contacto.php");

   
   $id = $_SESSION['id'];
  //  echo $id;

   

    $obj = new contacto();
    $resultado = $obj->listar_alumnos_alumnos($id);

    while ($registro = $resultado->fetch_assoc()) {
        $alumno = $registro['nombre']. " " .$registro['apellido_paterno']. " " .$registro['apellido_materno'];
        echo "<div class='alumno' >" . $alumno . "</div>";
    }


?>

<!--
public function listar_alumnos_alumnos($id){
		$this->sentencia = 	"SELECT a.nombre, a.apellido_paterno, a.apellido_materno FROM alumno a WHERE a.id_salon = (SELECT id_salon FROM alumno WHERE id = '$id')";
		$bandera = $this->ejecutar_sentencia();
		return $bandera;
	}

-->



    <!-- ------------------------------------- STYLES ---------------------------------------------- -->
    <style>


    .alumno{
        width: 25%;
        height: 300px;
        background-color: red;
        border-radius: 21px;
        cursor: pointer;
        float: inline-start;
        margin: 3%;
    }
    
    
    </style>
    </body>
</html>