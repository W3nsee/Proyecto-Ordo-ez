<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar datos de asignatura</title>
    <link rel="stylesheet" href="../Style/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>                    <!-- Tipografía -->
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">


</head>
<body class="body">

    <nav>

        <div class="Menu">

            <div class="btn-desplegar">

                <img class="img-menu" src="../img/menu.png" width="50px" height="50px">

            </div>

            <a href="../Alta_Admin/Alta_Usuario.php">

                <div class="opccionesMenu">

                    <li class="text-opcciones">Alta de usuario</li>

                </div>

            </a>

            <a href="../Alta_Admin/Alta_Asignatura.php">

                <div class="opccionesMenu">

                    <li class="text-opcciones">Alta de asignatura</li>

                </div>

            </a>

            <a href="../Matricular_Admin/Matricular_Alumno.php">

                <div class="opccionesMenu">

                    <li class="text-opcciones">Matricular alumno en asignatura</li>

                </div>

            </a>

            <a href="../Baja_Admin/Baja_Usuario.php">

                <div class="opccionesMenu">

                    <li class="text-opcciones">Baja de usuario</li>

                </div>

            </a>

            <a href="../Baja_Admin/Baja_Asignatura.php">

                <div class="opccionesMenu">

                    <li class="text-opcciones">Baja de asignatura</li>

                </div>

            </a>

            <a href="Modificar_Usuario.php">

                <div class="opccionesMenu">

                    <li class="text-opcciones">Modificar datos de usuario</li>

                </div>

            </a>

            <a href="Modificar_Asignatura.php">

                <div class="opccionesMenu">

                    <li class="text-opcciones">Modificar datos de asignatura</li>

                </div>

            </a>

            <a class="btn-regresar" href="../index.php">

                <div >

                    <li class="text-regresar">Regresar</li>

                </div>

            </a>

        </div>

    </nav>

    <section>

        <div class="titulo">

            <h1 class="text-titulo">MODIFICAR DATOS DE ASIGNATURA</h1>

        </div>
        
        <div class="subtitulo_alta_asignatura">

            <h1 class="text_subtitulo_alta_asignatura">Dar de alta una asignatura</h1>

        </div>

        <div class="form_nombre_asignatura">

            <h2 class="text_form_nombre_asignatura">Nombre de la asignatura</h2>

            <input type="text" name="nombre_asignatura" placeholder="Escriba el nombre de la asignatura" size="30">

        </div>

        <div class="form_grado">

            <h2 class="text_form_grado">Grado al que se impartirá</h2>

            <input type="text" name="grado" placeholder="Escriba el grado" size="30">

        </div>

        <div class="subtitulo_profesor">

            <h1 class="text_subtitulo_profesor">Profesor que impartirá la asignatura</h1>

        </div>

    </section>

    <footer>

        <div class="footer">

            <h3 class="text-footer">Todos los derechos reservados &copy;</h3>

        </div>

    </footer>
    
</body>
</html>