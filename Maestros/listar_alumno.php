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
require_once("../ArchivosDriversControles/contacto.php");

     $obj = new contacto();
     $id = $_SESSION['id'];
     $resultado = $obj->listaralumnos($id);


     while($registro = $resultado->fetch_assoc()){
        if(isset($registro["nombre"])) {
            $nombre = $registro["nombre"];
            //Campo oculto en onclick
            echo "<div class='img_caja' onclick=\"actualizarMaestro('$nombre')\";' id='resultado'> <img class='foto' src='https://png.pngtree.com/thumb_back/fw800/background/20240104/pngtree-captivating-oceanic-majesty-reflecting-the-texture-of-light-blue-sea-water-image_13698724.png' alt='Image'>
                <div class='texto'>".$nombre."</div></div>";
        }
    }

?>


    <style>
  
  .contenedor{
    width: 98%;
    height: 100%;

}

.img_caja{
    width: 25%;
    height: 400px;
    border-radius: 21px;
    margin: 2%;
    background-color: rgb(189, 179, 198);    
    float: left;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); 
}

.foto{

    width: 80%;
    height: 200px;
    border-radius: 15%;
    margin: 2%;
    padding: 7%;
    float: center;

}

    </style>


<style>

          


.img_caja{
    width: 25%;
    height: 400px;
    border-radius: 21px;
    margin: 2%;
    background-color: rgb(189, 179, 198);    
    float: left;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); 
}

.foto{

    width: 80%;
    height: 200px;
    border-radius: 15%;
    margin: 2%;
    padding: 7%;
    float: center;

}
</style>
    </body>
</html>
