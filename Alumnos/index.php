<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kuezis Rebirth</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
<?php
session_start();
require_once("../ArchivosDriversControles/contacto.php");
if (isset($_SESSION['id'])) {
   
    $id = $_SESSION['id'];


$obj = new contacto();
$resultado = $obj->nombre_alumno($id);

while ($registro = $resultado->fetch_assoc()) {
    $nombre = $registro['nombre'];
}
?>
<span class="cerrar-sesion">
    <img src="resources/Boton-Volver.png">
</span>

	<div class="menu" id="menu">
		
		
		<div class="boton-contenedor" id="boton"></div>

		<script src="script.js"></script>
	
	<ul class="nave-lista">
			<li>
				
				<span class="material-symbols-outlined">
				account_circle
				</span>
				<i id="bx-bx-grid-alt" class="nombre"><?php echo "$nombre"?></i>
			</li>
	
		<hr>
		<h1 class="titulo-menu">Menu</h1>

		<!--
			<li onclick="cargarContenido('asignatura.html'); return false;">
					<img src="resources/dashboard.png"></img>
					<i id="bx-bx-grid-alt">Asignatura</i>
			</li>
		-->
			<li>
                <a href="?opc=horario"></a>
					<img src="resources/horario.png"></img>
					<i id="bx-bx-grid-alt">Horario</i>
			</li>
			<!--
			<li onclick="cargarContenido('asignatura.html'); return false;">
					<img src="resources/club.png"></img>
					<i id="bx-bx-grid-alt">Clubes</i>
			</li>
		-->
            <li>
                    <a href="?opc=compañeros"></a>
					<img src="resources/compañeros.png"></img>
					<i id="bx-bx-grid-alt">Compañeros</i>
			</li>

			<li>
            <a href="?opc=maestros"></a>

					<img src="resources/club.png"></img>
					<i id="bx-bx-grid-alt">Maestros</i>
			</li>

			<li>
            <a href="?opc=calificacion"></a>

					<img src="resources/dashboard.png"></img>
					<i id="bx-bx-grid-alt">Calificaciones</i>
			</li>


			<li>
            <a href="?opc=asistencia"></a>

				<img src="resources/justificante.png"></img>
				<i id="bx-bx-grid-alt">Asistencias</i>
		</li>
		</ul>
	</div>


	<div id="contenido"> <!-- Aqui va el otro archivo --->
	<!--
	<script>
	    function cargarContenido(url) {
	        fetch(url)
	            .then(response => response.text())
	            .then(data => {
	                document.getElementById('contenido').innerHTML = data;
	            })
	            .catch(error => console.error('Hubo un problema', error));
	     }

		
		</script>
		-->

         <?php
            if(isset($_REQUEST["opc"])){
				switch ($_REQUEST["opc"]) {
					case 'horario':
						include("ListaHorario.php");
					break;

					case 'compañeros':
						include("listar_alumnos_alumnos.php");
					break;

					case 'maestros':
						include("listar_maestros_alumnos.php");
					break;

					case 'calificacion':
						include(".php");
					break;

                    case 'asistencia':
                        include("listarfaltas_alumno.php");
                    break;
				}
			}

        ?>
		
</div>

<?php
}
?>

</body>
</html>