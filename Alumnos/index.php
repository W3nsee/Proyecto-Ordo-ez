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
            <i id="bx-bx-grid-alt" class="nombre"></i>
        </li>
        <hr>
        <h1 class="titulo-menu">Menu</h1>
        <li>
            <a href="?opc=consultarhorario">
                <img src="resources/horario.png"></img>
                <i id="bx-bx-grid-alt">Horario</i>
            </a>
        </li>
        <li>
            <a href="?opc=listaralumnos_alumno">
                <img src="resources/compañeros.png"></img>
                <i id="bx-bx-grid-alt">Compañeros</i>
            </a>
        </li>
        <li>
            <a href="?opc=listarmaestros_alumno">
                <img src="resources/club.png"></img>
                <i id="bx-bx-grid-alt">Maestros</i>
            </a>
        </li>
        <li>
            <a href="?opc=listarcalificaciones">
                <img src="resources/dashboard.png"></img>
                <i id="bx-bx-grid-alt">Calificaciones</i>
            </a>
        </li>
        <li>
            <a href="?opc=listarfaltas_alumno">
                <img src="resources/justificante.png"></img>
                <i id="bx-bx-grid-alt">Asistencias</i>
            </a>
        </li>
        <li>
            <a href="?opc=verificarjustificante">
                <img src="resources/justificante.png"></img>
                <i id="bx-bx-grid-alt">Verificar Justificante</i>
            </a>
        </li>
    </ul>
</div>

<div id="contenido">
    <?php
    if(isset($_REQUEST["opc"])){
        switch ($_REQUEST["opc"]) {
            case 'consultarhorario':
                include("listahorario.php");
                break;
            case 'listaralumnos_alumno':
                include("listar_alumnos_alumnos.php");
                break;
            case 'listarmaestros_alumno':
                include("listar_maestros_alumnos.php");
                break;
            case 'listarcalificaciones':
                include("listarcalificaciones.php");
                break;
            case 'listarfaltas_alumno':
                include("listarfaltas_alumno.php");
                break;
            case 'verificarjustificante':
                include("verificarjustificante.php");
                break;
        }
    }
    ?>
</div>



</body>
</html>
