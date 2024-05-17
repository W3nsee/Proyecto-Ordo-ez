<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricular alumno en asignatura</title>
    <link rel="stylesheet" href="../Style/Estructura.css">
    <link rel="stylesheet" href="../Style/Matricular_Listar.css">

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

            <a href="../Modificacion_Admin/Modificar_Usuario.php">

                <div class="opccionesMenu">

                    <li class="text-opcciones">Modificar datos de usuario</li>

                </div>

            </a>

            <a href="../Modificacion_Admin/Modificar_Asignatura.php">

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

            <h1 class="text-titulo">MATRICULAR ALUMNO EN ASIGNATURA</h1>

        </div>

        <div class="seleccione">

            <h2 class="text_seleccione">Selecciona un alumno para matricular</h2>

        </div>


        <?php

            require_once("../contacto.php");
            require_once("../Matricular.php");
            $obj = new Contacto();
            $resultado = $obj->consultaralumno();

        ?>

        <div class="limit_alumno">

            <?php

                while($alumno = $resultado->fetch_assoc()){

                    echo "<div class='form_alumno'>";
                    echo "<h2 class='text_form_alumno'>". $alumno["Nombre"] ." ";
                    echo $alumno["Apellido_Paterno"];
                    echo " ";
                    echo $alumno["Apellido_Materno"];
                    echo "</h2>";
                    echo "<h2 class='text_form_alumno'>". $alumno["Matricula_Alumno"] ."</h2>";
                    echo "</div>";

                }   

            ?>

        </div>

    </section>

    <footer>

        <div class="footer">

            <h3 class="text-footer">Todos los derechos reservados &copy;</h3>

        </div>

    </footer>
    
</body>
</html>