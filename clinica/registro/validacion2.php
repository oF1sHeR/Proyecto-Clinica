
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación Cuenta</title>

    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>@import "/clinica/css/cabecera.css";</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "validacion2.css";</style>
    
    <style>@import "/clinica/pie/piePagina.css";</style>
    <script src="validacion2.js"></script>
</head>
<body>
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>
<?php 


if(isset($_GET['email'])&& isset($_GET['codigo'])){

    $email = $_GET['email'];
    $cdv = $_GET['codigo'];


    //Incluimos la base de datos.

    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
    //$resultado = $bd->query("SELECT nombreUsuario FROM USUARIOS WHERE email ='$email' AND cdv='$cdv'");
    $resultado = $bd->query("UPDATE usuarios SET Activado='1' WHERE email='$email' AND cdv='$cdv'");

    if($bd->errno!=0){
        ?>
            <div id="mensajeInformativo">
                
                    <h1><?php echo "Se ha producido un error";?></span>
                
            </div>
        <?php
    }else{
        ?>
            <div id="mensajeInformativo">
            
                    <h1><?php echo "Cuenta verificada con éxito, gracias por confiar en nosotros.";?></span>
                    
                
            </div>
        <?php
    }

$bd->close();
}

else{
    ?>
            <div id="mensajeInformativo">
                
                    <h1><?php echo "Se ha producido un error";?></span>
                
            </div>
        <?php
}
?>
<?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
?>
</body>
</html>
