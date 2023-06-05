<?php 

    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php";

    $consulta = "CREATE TABLE IF NOT EXISTS medicos(dni VARCHAR(13) PRIMARY KEY, nombre VARCHAR(30), apellidos VARCHAR(30), servicio VARCHAR(40), estudios VARCHAR(40), imagen VARCHAR(100), descripcion VARCHAR(1000))";

    $resultado = $bd->query($consulta);
    
    if($bd->errno!=0)
            echo $bd->errno . " -- " . $bd->error . "<br>";
    $bd->close();
?>