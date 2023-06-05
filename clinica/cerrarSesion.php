<?php 

//Script sencillo para cerrar sesion.
ini_set("session.use_only_cookies","0");
ini_set("session.use_cookies","1");
ini_set("session.use_trans_sid","0");
session_name("usuario");
session_start();

session_destroy();

header("location: index.php");

exit();

?>