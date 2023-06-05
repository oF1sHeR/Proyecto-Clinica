<?php 

    //Entramos en la base de datos

    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

    //Creamos la tabla de citas si no existe
    $consulta = "CREATE TABLE IF NOT EXISTS citas (idCita INT PRIMARY KEY AUTO_INCREMENT,correoCliente VARCHAR(50),servicio VARCHAR(40),medico VARCHAR(60),fecha DATE,hora VARCHAR(10),estado VARCHAR(20))";
    $bd->query($consulta);
    if($bd->errno!=0){
        echo $bd->errno . " -- " . $bd->error . "<br>";
    }
    $bd->close();

?>