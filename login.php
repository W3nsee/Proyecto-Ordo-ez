<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Style/login.css">
    </head>
    <body>

       <div class="login">
            <form action="" method="post">
                <div class="cerrar"></div>
                <label>Usuario</label>
                <input type="text" class="usuario" name="usuario_id" min="1" max="6" placeholder="20219082">
                <label>Contraseña</label>
                <input type="text" class="contraseña" name="contraseña" min="1" max="16" placeholder="Contraseña123">
                <input type="submit" name="login" value="Iniciar Sesion" id="boton">
                <div id="mensaje" style="display: none;">No se encontro un Usuario con esa Matricula o Contraseña</div>
            </form>
       </div>

       <style>
.cerrar {
  background-image: url("img/Boton-Volver.png");
}
</style>



    <?php
        if(isset($_POST['guardar'])){
            $usuario_id = $_POST['usuario_id'];
            $contraseña = $_POST['contraseña'];

            require_once("contacto.php");
            $obj = new Contacto();
            $obj->login_alumno($usuario_id,$contraseña);

            if($obj->num_rows > 0){
                //Cookie



                //rediriguir la pagina a la de alumno
                header("Location: Alumnos/index.php");
            }else{
                $obj->login_profesor($usuario_id,$contraseña);
                
                if($obj->num_rows > 0){
                    //Cookie


                    //rediriguir la pagina a la de alumno
                    header("Location: Maestros/index.php");
                }else{
                    $obj->login_profesor($usuario_id,$contraseña);
                
                    if($obj->num_rows > 0){
                        //Cookie




                        //rediriguir la pagina a la de alumno
                        header("Location: Admin/index.php");
                    }
                    else{
                        ?>

                        <!-- Mensaje de error que no se encontro el usuario -->
                        <script>
                            document.getElementById('boton').addEventListener('click', function() {
                            var mensajeDiv = document.getElementById('mensaje');
                            if (mensajeDiv.style.display === 'none') {
                                mensajeDiv.style.display = 'block';
                            } else {
                                mensajeDiv.style.display = 'none';
                            }
                            });
                        </script>

                        <?php

                    }
                }
            }
        }
       ?>

<!-- Las cookies estan para guardar informacion del id del usuario
para que de esa forma funcione como variable global y despues la pueda
utilizar para identificar que persona es, y poder mostrar informacion que le pertenece -->

    </body>
</html>