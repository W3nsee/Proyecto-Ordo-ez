<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
      
        <?php
            session_start();
            require_once("Contactos.php");
            $obj = new contacto();
            $resultado = $obj->listarasignatura($id);
            while ($registros = $resultado->fetch_assoc()) {
                echo"<div class='asignatura' id= onclick=\"actualizarMaestro('$nombre')\";>".$registro['nombre_asignatura']."</div>";
            }
        ?>

        <form action="" method="post">
            <input type="hidden" id="inputasignatura">
            <input type="submit" name="insert" value="Siguiente">
        </form>

        <script>
            function guardarasignatura(nombre_asignatura) {
            document.getElementById('inputasignatura').value = nombre_asignatura;
            }
        </script>
    </body>
</html>