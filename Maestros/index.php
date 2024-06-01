<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="diseno.css"/>
	<title>Principal Maestro</title>
</head>

<body>
	<div class="nav">
		<div class="logo">
	    </div>
	  <ul>
		<a href="?opc=listaralumnos"><li>Listar Alumnos</li></a>
        <a href="?opc=listarmaestros"><li>Listar Maestros</li></a>
        <a href="?opc=ponercalificaciones"><li>Poner Calif</li></a>
        <a href="?opc=modificarcalificaciones"><li>Modificar Calif</li></a>
		<a href="?opc=ponerfaltas"><li>Poner faltas</li></a>
		<a href="?opc=modificarfaltas"><li>Modificar Faltas</li></a>
		<a href="?opc=listarfaltas"><li>Listar Faltas</li></a>
	  </ul>
	</div>

	<section>
		<?php
		    if (isset($_GET["opc"]))
		    {
		    	switch($_GET["opc"])
		    	{
		    		case 'listaralumnos':
		    		    include("listar_alumno.php");
		    		    break;
		    		case 'listarmaestros':
		    		    include("listar_maestros.php");
		    		    break;
		    		case 'ponercalificaciones':
		    		    include("asignar_calificacion_1.php");
		    		    break;
		    		case 'modificarcalificaciones':
		    		    include ("modificarcalificaciones.php");
		    		    break;
		    		case 'ponerfaltas':
		    		    include ("ponerfaltas.php");
		    		    break;
		    		case 'modificarfaltas':
		    		    include ("modificarfaltas.php");
		    		    break;
		    		case 'listarfaltas':
		    		    include ("listarfaltas.php");
		    		    break;
		    	}
		    }
		?>
	</section>
</body>
</html>