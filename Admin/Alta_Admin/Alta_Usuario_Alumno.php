<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de alumno</title>
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

                <h1 class="text-titulo">ALTA DE ALUMNO</h1>

            </div>

            <div class="form_nombres">

                <h2 class="text_form">Nombres</h2>

                <input type="text" name="nombres" placeholder=" Ejem. Jorge Arath">

            </div>

            <div class="form_apellido_p">

                <h2 class="text_form">Apellido Paterno</h2>

                <input type="text" name="apellidop" placeholder=" Ejem. Guzmán">

            </div>


            <div class="form_apellido_m">

                <h2 class="text_form">Apellido Materno</h2>

                <input type="text" name="apellidom" placeholder=" Ejem. Sandoval">

            </div>

            <div class="form_fecha_nacimiento">

                <h2 class="text_form">Fecha de Nacimiento</h2>

                <input type="date" name="fechanac" value="2006-01-12"> 

            </div>

            <div class="form_sexo">
                <h2 class="text_form">Sexo</h2>
                <div class="opc_femenino">
                    <h3 class="text_sexo">F</h3>
                </div>

                <div class="opc_masculino">
                    <h3 class="text_sexo">M</h3>
                </div>
            </div>

            <div class="form_telefono">

                <h2 class="text_form">Teléfono</h2>

                <input type="text" name="telefono" placeholder=" Ejem. 312 154 3659">

            </div>

            <div class="form_grados">

                <h2 class="text_form">Grados</h2>

                <div class="opc_grado_1">

                    <h3 class="text_grado">1°</h3>

                </div>

                <div class="opc_grado_2">

                    <h3 class="text_grado">2°</h3>

                </div>

                <div class="opc_grado_3">

                    <h3 class="text_grado">3°</h3>

                </div>

            </div>

            <div class="form_correo">

                <h2 class="text_form">Correo</h2>

                <input type="text" name="correo" placeholder=" Ejem. jorge@ex.com">

            </div>

            <div class="form_grupos">

                <h2 class="text_form">Grupos</h2>

                <div class="opc_grupo_a">

                    <h3 class="text_grupo">A</h3>

                </div>

                <div class="opc_grupo_b">

                    <h3 class="text_grupo">B</h3>

                </div>

                <div class="opc_grupo_c">

                    <h3 class="text_grupo">C</h3>

                </div>

            </div>

            <div class="form_password">

                <h2 class="text_form">Contraseña</h2>

                <input type="text" name="contrasena" placeholder=" Ejem. 12345">

            </div>

            <div class="guardar">

                <input class="btn_guardar" type="submit" name="guardar" value="Guardar">

            </div>
</section>

    <footer>

        <div class="footer">

            <h3 class="text-footer">Todos los derechos reservados &copy;</h3>

        </div>

    </footer>
    
</body>
</html>