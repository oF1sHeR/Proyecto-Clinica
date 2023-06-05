<?php 
    if(isset($_GET['email'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Contraseña</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <script src="nuevoPass.js"></script>
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "nuevaPass.css";</style>
    
</head>
<body>

    <?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>
    <div id="capaGeneral">
        <form action="" method="POST" id="formulario" name="formulario" onsubmit="return validar();">
            <h1>Formulario para nueva contraseña</h1>
            <div>
                <label for="pass">Nueva contraseña</label>
                <input type="password" name="pass" id="pass">
            </div>
            <div>
                <label for="pass2">Confirmar nueva contraseña</label>
                <input type="password" name="pass2" id="pass2">
            </div>
            <div>
                <input type="submit" value="Cambiar contraseña" id="cambiar" name="cambiar">
            </div>

            <div id="cuadro">
            <?php
    
                if(isset($_POST['cambiar'])){

                    $pass = $_POST['pass'];
                    //Hasheamos la contraseña.
                    $passHasheada = hash_pass($pass);

                    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

                    $correo = $_GET['email'];
                    $codigo = $_GET['codigo'];

                    $consulta = "UPDATE usuarios SET pass='$passHasheada' WHERE email='$correo' AND cdv='$codigo'";
                    //$consulta = "SELECT pass FROM usuarios where email='$correo' AND cdv='$codigo'";
                    
                    $resultado = $bd->query($consulta);
                    $bd->close();

                    ?>
                        <span>Contraseña cambiada con éxito. Serás redirigido al inicio de sesión</span>
                        <meta http-equiv="refresh" content="5; url=/clinica/login/login.php">
                    <?php
                }

                
    
            ?>
            </div>
        </form>
    </div>
    <?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>

<?php 

function hash_pass($contra){
    $hasheada = password_hash($contra,PASSWORD_DEFAULT);
    return $hasheada;
}
}
?>