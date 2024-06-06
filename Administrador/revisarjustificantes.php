<?php
session_start();
$alumno = isset($_SESSION['id']) ? $_SESSION['id'] : ''; // Obtener id del maestro

require_once("contacto.php");
$obj = new contacto();
$resultado = $obj->listarjustificantes();

if($resultado->num_rows > 0) {
        
    echo "<h1>Aprobar o Rechazar Justificante</h1>";
    echo "<form action='' method='post'>";
    echo "<select name='justificante'>";
    
    while ($registro = $resultado->fetch_assoc()) {
        echo "<option value='" . $registro["id_alumno"] . "'>" . $registro["fecha_falta"] . " - " . $registro["motivo"] . "</option>";
        $id_alumno = $registro["id_alumno"];

        
    }
    
    echo "</select>";
    echo "<br><br>";
    echo "<input type='submit' name='seleccionar' value='Seleccionar'>";
    echo "</form>";
    
} else {
    echo "No has solicitado ningún justificante.";
}

if(isset($_POST["seleccionar"])) {
    $idjustificante = $_POST["justificante"];
    echo "<h2>Selecciona una acción:</h2>";
    echo "<form action='' method='post'>";
    echo "<input type='radio' name='accion' value='aceptar'>Aceptar ";
    echo "<input type='radio' name='accion' value='rechazar'>Rechazar ";
    echo "<br><br>";
    echo "<input type='hidden' name='idjustificante' value='$idjustificante'>";
    echo "<input type='submit' name='enviar' value='Enviar'>";
    echo "</form>";

}

if(isset($_POST["enviar"])) 
    {
        $idjustificante = $_POST["idjustificante"];
        $accion = $_POST["accion"];

        if($accion == "aceptar") {
            
            $obj->aceptarjustificante($id_alumno);

        }
        else if ($accion == "rechazar") {
            $obj->rechazarjustificante($id_alumno);
        }
        
        
    }
?>
