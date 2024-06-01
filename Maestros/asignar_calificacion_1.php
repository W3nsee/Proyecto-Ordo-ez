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

// Verifica si la sesión está iniciada y si el ID del usuario está disponible
if (isset($_SESSION['id'])) {
   
    $id = $_SESSION['id'];

    $obj = new contacto();
    $resultado = $obj->listarasignatura($id);

    while ($registro = $resultado->fetch_assoc()) {
        $id_asignatura = $registro['id_asignatura'];
        echo "<div class='asignatura' style=\"display: block;\" onclick=\"guardarasignatura('$id_asignatura')\">" . $registro['nombre_asignatura'] . "</div>";
    }
}

?>

<form action="" method="post" id="asignaturaForm">
    <input type="hidden" id="inputasignatura" name="inputasignatura">
 <!--   <input type="submit" name="insert" value="Siguiente"> -->
</form>

<script>

function guardarasignatura(id_asignatura) {
    document.getElementById('inputasignatura').value = id_asignatura;
    document.cookie = "id_asignatura=" + id_asignatura;
    document.getElementById('asignaturaForm').submit();
    window.location.href = "asignar_calificacion_2.php?id_asignatura=" + id_asignatura;
}

    

/*
   if(document.getElementsByClassName('asignaturas').style.display = 'none'){
            document.getElementsByClassName('alumnos').style.display = 'block';
    }
    else if(document.getElementsByClassName('alumnos').style.display = 'none'){
        document.getElementsByClassName('asignaturas').style.display = 'block'
    }
}
 */
    var items = document.querySelectorAll('.asignatura');
    var selectorItems = 0;

    items.forEach(function(item) {
        item.addEventListener('click', function() {
            if (this.classList.contains('selected')) {
                this.classList.remove('selected');
                selectorItems--;
            } else if (selectorItems < 1) {
                this.classList.add('selected');
                selectorItems++;
            }
        });
    });

    </script>






    <!-- ------------------------------------- STYLES ---------------------------------------------- -->
    <style>



    @keyframes CambioColor {
        0% {box-shadow: 0 0 0 3px red; }
        25% {box-shadow: 0 0 0 3px orange; }
        50% {box-shadow: 0 0 0 3px green; }
        75% {box-shadow: 0 0 0 3px blue; }
        100% {box-shadow: 0 0 0 3px red; }
    }
    .selected {
        animation: CambioColor 2s infinite;
    }
    
    .asignatura{
        width: 25%;
        height: 300px;
        background-color: red;
        border-radius: 21px;
        cursor: pointer;
        float: inline-start;
        margin: 3%
      

    }
    
    
    </style>

        <!--
            create table calificacion(
                parcial_1 numeric (2),
                parcial_2 numeric (2),
                parcial_3 numeric (2)
                id_alumno int (11),
                id_asignatura int (24)
            );


        -->
        <script src="" async defer></script>
    </body>
</html>