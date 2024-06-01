<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="diseno.css"/>
	<title>Principal Alumno</title>
</head>

<body>
	<div class="nav">
		<div class="logo">
	    </div>
	  <ul>
		<a href="?opc=consultarhorario"><li>Consultar Horario</li></a>
        <a href="?opc=listaralumnos_alumno"><li>Listar Alumnos</li></a>
        <a href="?opc=listarmaestros_alumno"><li>Listar Maestros</li></a>
        <a href="?opc=listarcalificaciones"><li>Listar Calificaciones</li></a>
		<a href="?opc=listarfaltas_alumno"><li>Listar Faltas</li></a>
		<a href="?opc=verificarjustificante"><li>Verificar Justificante</li></a>
	  </ul>
	</div>

	<section>
		<?php
		    if (isset($_GET["opc"]))
		    {
		    	switch($_GET["opc"])
		    	{
		    		case 'consultarhorario':
		    		    include("listahorario.php");
		    		    break;
		    		case 'listaralumnos_alumno':
		    		    include("listaralumnos_alumno.php");
		    		    break;
		    		case 'listarmaestros_alumno':
		    		    include("listarmaestros_alumno.php");
		    		    break;
		    		case 'listarcalificaciones':
		    		    include ("listarcalificaciones.php");
		    		    break;
		    		case 'listarfaltas_alumno':
		    		    include ("listarfaltas_alumno.php");
		    		    break;
		    		case 'verificarjustificante':
		    		    include ("verificarjustificante.php");
		    		    break;
		    	}
		    }
		?>
	</section>
</body>
</html>