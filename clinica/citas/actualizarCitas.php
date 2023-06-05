<?php
    include ($_SERVER['DOCUMENT_ROOT'] ."/includes/entrarEnBD.php");


    $diaActual = Date("Y-m-d");


    $consulta = "UPDATE citas SET estado='Cumplida' WHERE fecha < '$diaActual' AND estado='confirmada'";
    $resultado = $bd->query($consulta);
    $bd->close();
?>