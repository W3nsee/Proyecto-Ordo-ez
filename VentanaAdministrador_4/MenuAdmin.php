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
	       <h1>Adm</h1>
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
	  </ul>
	</div>

	<section>
		<?php
		    if (isset($_GET["opc"]))
		    {
		    	switch($_GET["opc"])
		    	{
		    		case 'altaalumno':
		    		    include("altaalumno.php");
		    		    break;
		    		case 'altamaestro':
		    		    include("altamaestro.php");
		    		    break;
		    		case 'altaasignatura':
		    		    include("altaasignatura.php");
		    		    break;
		    		case 'bajaalumno':
		    		    include ("bajaalumno.php");
		    		    break;
		    		case 'bajamaestro':
		    		    include ("bajamaestro.php");
		    		    break;
		    		case 'bajaasignatura':
		    		    include ("bajaasignatura.php");
		    		    break;
		    		case 'modificaralumno':
		    		    include ("modificaralumno.php");
		    		    break;
		    		case 'modificarmaestro':
		    		    include ("modificarmaestro.php");
		    		    break;
		    		case 'modificarasignatura':
		    		    include ("modificarasignatura.php");
		    		    break;
		    	}
		    }
		?>
	</section>
</body>
</html>