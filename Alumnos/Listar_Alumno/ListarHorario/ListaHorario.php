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

            <a href="../Matricular_Admin/Matricualar_Alumno.php">

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

            <h1 class="text-titulo">LISTAR HORARIO</h1>

        </div>
        
        <div class="">

            <h1 class="">HORARIO</h1>

        </div>
'
        <div>
            <?php 
                require_once("contacto.php");
                $obj = new Contacto(); 
                $resultado = $obj->consultarhorario();
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Horas</th>";
                echo "<th>Lunes</th>";
                echo "<th>Martes</th>";
                echo "<th>Miercoles</th>";
                echo "<th>Jueves</th>";
                echo "<th>Viernes</th>";

                echo "</tr>";

                while($registro = $resultado->fetch_assoc()){// FETCH_ASSOC SACA LA INFORMACIÓN POR SEPARADO 
                    echo "<tr>";
                    echo "<td>" . $registro["horas"] . "</td>";
                    echo "<td>" . $registro["lunes"] . "</td>";
                    echo "<td>" . $registro["martes"] . "</td>";
                    echo "<td>" . $registro["miercoles"] . "</td>";
                    echo "<td>" . $registro["jueves"] . "</td>";
                    echo "<td>" . $registro["viernes"] . "</td>";

                    echo "</tr>";
                }
                   
            ?>
        </div>

    </section>

    <footer>

        <div class="footer">

            <h3 class="text-footer">Todos los derechos reservados &copy;</h3>

        </div>

    </footer>'
    
</body>
</html>