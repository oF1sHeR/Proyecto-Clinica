<?php 

include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");


    //Creamos la tabla animales.

    //Atributos de los animales.
    //Nombre->
    //Tipo->Perro,gato
    //Sexo->
    //Edad->
    //Raza->
    //Descripción
    //Imagen->
    //Ubicación->
    //Telefono Contacto

    $consulta = "CREATE TABLE IF NOT EXISTS animales (ID_Animal INT PRIMARY KEY AUTO_INCREMENT,Nombre VARCHAR(30),Tipo VARCHAR(20),Sexo VARCHAR(6),Edad INT(3),raza VARCHAR(40),DESCRIPCION VARCHAR(2000),Imagen VARCHAR(100),Ubicacion VARCHAR(30),telefono VARCHAR(15))";
    $resultado = $bd->query($consulta);
    if($bd->errno!=0)
            echo $bd->errno . " -- " . $bd->error . "<br>";
    $bd->close();
   
?>

