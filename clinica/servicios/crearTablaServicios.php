<?php 

include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

$consulta = "CREATE TABLE IF NOT EXISTS SERVICIOS (ID_SERVICIO INT PRIMARY KEY AUTO_INCREMENT , servicio VARCHAR(40))";

$resultado = $bd->query($consulta);
$bd->close();

?>