<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de maestro</title>
    <link rel="stylesheet" href="../Style/style_alta_usuario_maestro.css">
    <link rel="stylesheet" href="../Style/Estructura.css">
    <link rel="stylesheet" href="../Style/inputs.css">

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

            <h1 class="text-titulo">ALTA DE MAESTRO</h1>

        </div>

        <form action="" method="post">

            <div class="form_nombres_maestros">

                <h2 class="text_form">Nombres</h2>
                <input type="text" name="nombres" placeholder=" Ejem. Jorge Arath">

            </div>

            <div class="form_apellido_p_maestros">

                <h2 class="text_form">Apellido paterno</h2>
                <input type="text" name="apellidop" placeholder=" Ejem. Guzmán">

            </div>


            <div class="form_apellido_m_maestros">

                <h2 class="text_form">Apellido materno</h2>
                <input type="text" name="apellidom" placeholder=" Ejem. Sandoval">

            </div>

            <div class="form_fecha_nacimiento_maestros">

                <h2 class="text_form">Fecha de nacimiento</h2>
                <input type="date" name="fechanac" value="2006-01-12"> 

            </div>

            <div class="form_sexo_maestros">

                <h2 class="text_form">Sexo</h2>
                <input class="opc_femenino" type="radio" name="sexo" value="F" checked>
                <input class="opc_masculino" type="radio" name="sexo" value="M">

            </div>

            <div class="form_telefono_maestros">

                <h2 class="text_form">Teléfono (Casa o Celular)</h2>
                <input type="text" name="telefono" placeholder=" Ejem. 312 154 3659">

            </div>

            <div class="form_correo_maestros">

                <h2 class="text_form">Correo</h2>
                <input type="text" name="correo" placeholder=" Ejem. jorge@ex.com">

            </div>

            <div class="form_password_maestros">

                <h2 class="text_form">Contraseña</h2>
                <input type="text" name="contrasena" placeholder=" Ejem. 12345">

            </div>

            <div class="guardar_maestros">

                <input class="btn_guardar" type="submit" name="insertar" value="Guardar">

            </div>

        </form>

    </section>

    <footer>

        <div class="footer">

            <h3 class="text-footer">Todos los derechos reservados &copy;</h3>

        </div>

    </footer>

    <?php
    
    if(isset($_POST['insertar']))
    {

        $nombres = $_POST['nombres'];
        $apellidop = $_POST['apellidop'];
        $apellidom = $_POST['apellidom'];
        $fechanac = $_POST['fechanac'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        require_once("../../ArchivosDriversControles/contacto.php");
        $obj = new contacto();
        $obj-> altamaestro($nombres,$apellidop, $apellidom, $fechanac, $telefono, $correo, $sexo, $contrasena);

        echo "<script>alert('Se guardaron los datos')</script>";

    }
    else
    {

        echo "<script>alert('No se guardaron los datos')</script>";

    }

    ?>
    
</body>
</html>