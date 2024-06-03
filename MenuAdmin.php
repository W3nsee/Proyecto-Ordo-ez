<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="diseno.css"/>
	<title>Principal Administrador</title>
</head>

<body>
	<div class="nav">
		<div class="logo">
	    </div>
	  <ul>
		<a href="?opc=altaalumno"><li>Alta Alumno</li></a>
        <a href="?opc=altamaestro"><li>Alta Maestro</li></a>
        <a href="?opc=altaasignatura"><li>Alta Asignatura</li></a>
		<a href="?opc=bajaalumno"><li>Baja Alumno</li></a>
		<a href="?opc=bajamaestro"><li>Baja Maestro</li></a>
		<a href="?opc=bajaasignatura"><li>Baja Asignatura</li></a>
		<a href="?opc=modificaralumno"><li>Modificar Alumno</li></a>
		<a href="?opc=modificarmaestro"><li>Modificar Maestro</li></a>
		<a href="?opc=modificarasignatura"><li>Modificar Asignatura</li></a>
		<a href="?opc=matricularalumno"><li>Matricular Alumno</li></a>
	  </ul>
	</div>

	<section>
		<?php
		    if (isset($_GET["opc"]))
		    {
		    	switch($_GET["opc"])
		    	{
		    		case 'altaalumno':
		    		    include("Administrador/altaalumno.php");
		    		    break;
		    		case 'altamaestro':
		    		    include("Administrador/altamaestro.php");
		    		    break;
		    		case 'altaasignatura':
		    		    include("Administrador/altaasignatura.php");
		    		    break;
		    		case 'bajaalumno':
		    		    include ("Administrador/bajaalumno.php");
		    		    break;
		    		case 'bajamaestro':
		    		    include ("Administrador/bajamaestro.php");
		    		    break;
		    		case 'bajaasignatura':
		    		    include ("Administrador/bajaasignatura.php");
		    		    break;
		    		case 'modificaralumno':
		    		    include ("Administrador/modificaralumno.php");
		    		    break;
		    		case 'modificarmaestro':
		    		    include ("Administrador/modificarmaestro.php");
		    		    break;
		    		case 'modificarasignatura':
		    		    include ("Administrador/modificarasignatura.php");
		    		    break;
		    		case 'matricularalumno':
		    		    include ("Administrador/matricularalumno.php");
		    		    break;
		    	}
		    }
		?>
	</section>
</body>
</html>