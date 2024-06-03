<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar sesión</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Style/login.css">
</head>
<body>

<h1>Iniciar Sesión</h1>
<div class="login">
    <form action="" method="post">
        <div class="cerrar"></div>
        <label>Id del usuario: </label>
        <input type="text" class="usuario" name="idusuario" min="1" max="6" placeholder="20219082"><br></br>
        <label>Contraseña: </label>
        <input type="password" class="contrasena" name="contrasena" min="1" max="16" placeholder="Contraseña123"><br><br>
        <input type="submit" name="login" value="Iniciar Sesion" id="boton">
    </form>
</div>
</body>
</html>

<?php

if(isset($_POST['login'])){
      
   
     $id = $_POST['idusuario'];

    $contrasena = $_POST['contrasena'];

    require_once("ArchivosDriversControles/contacto.php");
    $obj = new contacto();
    $resultado = $obj->verificaridadmin($id);
    while ($registro = $resultado->fetch_assoc()) {
        if($id == $registro["id"] && $contrasena == $registro["contrasena"])
        {
            $_SESSION['id'] = $id; // Guardar el ID del usuario en la sesión
            setcookie("id_usuario", $_SESSION['id'], time() + 86400, "/");
            header("Location: Admin/index.php"); 
            exit;
        }
    }

    $obj2 = new contacto();
    $resultado = $obj2->verificaridmaestro($id);
    while ($registro = $resultado->fetch_assoc()) {
        if($id == $registro["id"] && $contrasena == $registro["contrasena"])
        {
            $_SESSION['id'] =  $id; // Guardar el ID del usuario en la sesión
            setcookie("id_usuario", $_SESSION['id'], time() + 86400, "/");
            header("Location: Maestros/index.php"); 
            exit;
        }
    }

    $obj3 = new contacto();
    $resultado = $obj3->verificaridalumno($id);
    while ($registro = $resultado->fetch_assoc()) {
        if($id == $registro["id"] && $contrasena == $registro["contrasena"])
        {
            $_SESSION['id'] = $id;
            setcookie("id_usuario", $_SESSION['id'], time() + 86400, "/");
            
             header("Location: Alumnos/index.php"); // Redirección
            exit; 
        }
    }

    echo "Inicio de sesión fallido";
}

?> 


