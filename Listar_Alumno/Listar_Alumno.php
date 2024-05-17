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

            <h1 class="text-titulo">LISTAR ALUMNOS</h1>

        </div>
        
        <div class="">

            <h1 class="">Listado de Alumnos</h1>

        </div>
'
        <div>
            <?php 
                require_once("");//Agregar Conexion al documento con sentencias
                $obj = new /*Alumno*/(); //Falta agrega objeto de interconexion
                $resultado = $obj->consultar();
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido Paterno</th>";
                echo "<th>Apellido Materno</th>";
                echo "<th>Telefono</th>";
                echo "<th>Correo</th>";
                echo "<th>Sexo</th>";

                echo "</tr>";

                while($registro = $resultado->fetch_assoc()){// FETCH_ASSOC SACA LA INFORMACIÓN POR SEPARADO 
                    echo "<tr>";
                    echo "<td>" . $registro["id"] . "</td>";
                    echo "<td>" . $registro["nombre"] . "</td>";
                    echo "<td>" . $registro["apellido_paterno"] . "</td>";
                    echo "<td>" . $registro["apellido_materno"] . "</td>";
                    echo "<td>" . $registro["fecha_nacimiento"] . "</td>";
                    echo "<td>" . $registro["telefono"] . "</td>";
                    echo "<td>" . $registro["correo"] . "</td>";
                    echo "<td>" . $registro["sexo"] . "</td>";

                    echo "</tr>";
                }
                    /*    id int PRIMARY KEY Auto_increment,
    contrasena varchar(16) NOT NULL,
    nombre varchar(24) NOT NULL,
    apellido_paterno varchar(24) NOT NULL,
    apellido_materno varchar(24) NOT NULL,
    fecha_nacimiento date NOT NULL,
    telefono int(14) NOT NULL,
    correo varchar(40) NOT NULL,
    sexo varchar(1) NOT NULL */
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