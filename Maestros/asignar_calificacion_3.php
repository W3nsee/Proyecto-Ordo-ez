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
            $id_asignatura = $_COOKIE['id_asignatura'] ?? null;
            $id_alumno = $_COOKIE['id_alumno'] ?? null;

            if ($id_alumno) {
                $obj3 = new contacto();
              
                $resultado = $obj3->alumnovista($id_alumno);
            
                while ($registro = $resultado->fetch_assoc()) {
                    echo "<div class='alumno'>" . $registro['nombre'] . " " . $registro['apellido_paterno'] . " " . $registro['apellido_materno'] . "</div>";
                    
                    
                }
              

            }
        ?>

        <form action="" method="post" id="calificacion">
            
          <div class="boton">
             <input type="submit" name="guardar" value="Guardar" onclick="toggleSelectedInput()"> 
          </div>

            <div class="textbox">
                <label>Parcial 1</label>
                <input type="number" name="parcial_1" id="parcial_1" placeholder="10" minlenght="1" maxlenght="2">
                
                <label>Parcial 2</label>
                <input type="number" name="parcial_2" id="parcial_2" placeholder="10" minlenght="1" maxlenght="2">
                
                <label>Parcial 3</label>
                <input type="number" name="parcial_3" id="parcial_3" placeholder="10" minlenght="1" maxlenght="2">
            </div>

            <?php
               if (isset($_POST['guardar'])) {
                $obj4 = new contacto();
                if (!empty($_POST['parcial_1'])) {
                    $parcial_1 = $_POST['parcial_1'];
                    $resultado = $obj4->asignar_parcial_1($parcial_1,$id_alumno,$id_asignatura);
                    echo "Guardado";
                }
            
                if (!empty($_POST['parcial_2'])) {
                    $parcial_2 = $_POST['parcial_2'];
                    $resultado = $obj4->asignar_parcial_2($parcial_2,$id_alumno,$id_asignatura);
                    echo "Guardado";
                }
            
                if (!empty($_POST['parcial_3'])) {
                    $parcial_3 = $_POST['parcial_3'];
                    $resultado = $obj4->asignar_parcial_3($parcial_3,$id_alumno,$id_asignatura);
                    echo "Guardado";
                }
            }
                
                ?>
                 
                  
                

            

           
        
    <style>
        .alumno{
            width: 35%;
            height: 400px;
            background-color: red;
            border-radius: 21px;
            margin: 1%;
            float: inline-start;

        }

        #calificacion{
            float: inline-start;
        }
    </style>

    </body>
</html>