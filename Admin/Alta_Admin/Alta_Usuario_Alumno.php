<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de alumno</title>
    <link rel="stylesheet" href="../Style/Estructura.css">
    <link rel="stylesheet" href="../Style/style_alta_usuario_alumno.css">
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
                    
                    <input class="text_sexo" type="radio" name="sexo" value="F">

                </div>

                <div class="opc_masculino">

                    <input class="text_sexo" type="radio" name="sexo" value="M">

                </div>

            </div>

            <div class="form_telefono">

                <h2 class="text_form">Teléfono</h2>

                <input type="text" name="telefono" placeholder=" Ejem. 312 154 3659">

            </div>

            <div class="form_grados">

                <h2 class="text_form">Grados</h2>

                <div class="opc_grado_1">

                    <input class="text_grado" type="radio" name="grado" value="1°">

                </div>

                <div class="opc_grado_2">

                    <input class="text_grado" type="radio" name="grado" value="2°">

                </div>

                <div class="opc_grado_3">

                    <input class="text_grado" type="radio" name="grado" value="3°">

                </div>

            </div>

            <div class="form_correo">

                <h2 class="text_form">Correo</h2>

                <input type="text" name="correo" placeholder=" Ejem. jorge@ex.com">

            </div>

            <div class="form_grupos">

                <h2 class="text_form">Grupos</h2>

                <div class="opc_grupo_a">

                    <input class="text_grupo" type="radio" name="grupo" value="A">

                </div>

                <div class="opc_grupo_b">

                    <input class="text_grupo" type="radio" name="grupo" value="B">

                </div>

                <div class="opc_grupo_c">

                    <input class="text_grupo" type="radio" name="grupo" value="C">

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


<!-- <?php


    if(isset($_POST['guardar']))
    {

        if(empty($_POST['nombres']) || empty($_POST['apellidop']) || empty($_POST['apellidom']) || empty($_POST['fechanac']) || empty($_POST['sexo']) || empty($_POST['telefono']) || empty($_POST['grado']) || empty($_POST['correo']) || empty($_POST['grupo']) || empty($_POST['contrasena'])){
            
            echo "<script>alert('Debes llenar todos los campos');</script>";
            
        }else{
            $nombres = $_POST['nombres'];
            $apellidop = $_POST['apellidop'];
            $apellidom = $_POST['apellidom'];
            $fechanac = $_POST['fechanac'];
            $sexo = $_POST['sexo'];
            $telefono = $_POST['telefono'];
            $grado = $_POST['grado'];
            $correo = $_POST['correo'];
            $grupo = $_POST['grupo'];
            $contrasena = $_POST['contrasena'];
        }
    }

    require_once("../../ArchivosDriversControles/contacto.php");
    $obj = new contacto();
    $resultado = $obj->altaalumno($nombres, $apellidop, $apellidom, $fechanac, $telefono, $correo, $sexo);

    if($resultado){
        echo "<script>alert('Alta exitosa');</script>";
    }else{
        echo "<script>alert('Alta fallida');</script>";
    }

?> -->
