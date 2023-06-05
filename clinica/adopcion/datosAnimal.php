<?php 
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

    $id = $_POST['animal'];

    $consulta = "SELECT * FROM animales WHERE ID_Animal='$id'";

    $resultado = $bd->query($consulta);

    $fila = $resultado->fetch_assoc();

    

  
    

    $bd->close();

    // Pasamos a json el array.
    
    $json_devuelto = json_encode($fila);

    echo $json_devuelto;

    
?>