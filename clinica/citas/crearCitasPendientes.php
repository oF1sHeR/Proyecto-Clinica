<?php 

include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

$consulta = "CREATE TABLE IF NOT EXISTS citas_pendientes (email_cliente VARCHAR(50)  PRIMARY KEY, asunto VARCHAR(30), descripcion VARCHAR(1000), observaciones VARCHAR(1000),fecha DATE);";
$resultado = $bd->query($consulta);
if($bd->errno!=0){
    echo $bd->errno . " -- " . $bd->error . "<br>";
}else{
    echo "Se ha creado correctamente";
}
$bd->close();

?>