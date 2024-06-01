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
   // session_start();
   require_once("../contacto.php");

   $obj = new Contacto();
   $id = 2;
   
   $resultado = $obj->listaralumno($id);
   
   
       while ($registro = $resultado->fetch_assoc()) {
           $nombre = $registro['nombre_alumno'] . " " . $registro['apellido_paterno'] . " " . $registro['apellido_materno'];
           echo "<div class='alumno_caja' id='resultado'>
                   <img class='foto_alumno' src='https://png.pngtree.com/thumb_back/fw800/background/20240104/pngtree-captivating-oceanic-majesty-reflecting-the-texture-of-light-blue-sea-water-image_13698724.png' alt='Image'>
                   <div class='texto'>" . $nombre . "</div>
                 </div>";
       }
   
   

?>
  <style></style>      
       
    </body>
</html>

