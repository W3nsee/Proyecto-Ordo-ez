<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/listar_maestros.css">
    </head>
    <body>
     
    <div class="contenedor">
        <?php
               require_once("../contacto.php");
               $obj = new Contacto();
               $resultado = $obj->listarmaestros_maestros();

               while($registro = $resultado->fetch_assoc()){
                $nombre = $registro['nombre'];
                $apellido_paterno = $registro['apellido_paterno'];
                $apellido_materno = $registro['apellido_materno']; 
                    echo "<div class='maestros' id='resultado'> <img class='foto' src='https://png.pngtree.com/thumb_back/fw800/background/20240104/pngtree-captivating-oceanic-majesty-reflecting-the-texture-of-light-blue-sea-water-image_13698724.png' alt='Image'>
                    <div class='informacion_maestros'>".$nombre." ".$apellido_paterno." ".$apellido_materno."</div></div>";
                }

        
        ?>
    </div>
        
    
    </body>
</html>