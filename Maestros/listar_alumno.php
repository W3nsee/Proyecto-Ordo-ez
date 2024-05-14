<?php
//Esta Incompleto
     require_once("../contacto.php");
     $obj = new Contacto();
     $resultado = $obj->listarmaestro();

     while($registro = $resultado->fetch_assoc()){
         if(isset($registro["nombre"])) {
             $nombre = $registro["nombre"];
             //Campo oculto en onclick
             echo "<div class='img_caja' onclick=\"actualizarMaestro('$nombre')\";' id='resultado'> <img class='foto' src='https://png.pngtree.com/thumb_back/fw800/background/20240104/pngtree-captivating-oceanic-majesty-reflecting-the-texture-of-light-blue-sea-water-image_13698724.png' alt='Image'>
                 <div class='texto'>".$nombre."</div></div>";
         }
     }

?>