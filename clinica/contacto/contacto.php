<?php

include ($_SERVER['DOCUMENT_ROOT'] . "/includes/sesion.php");
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>@import "/clinica/css/bootstrap-grid.css";</style>
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "contacto.css";</style>
    <link rel="stylesheet" href="../css/fontawesome/all.min.css">
    <script src="/clinica/contacto/contacto.js"></script>
   
    

</head>
<body>
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>
    <div id="capaForm" class="row">
        <form action="" method="POST" id="formulario" name="formulario" onsubmit="return validaciones();" class="col-6">
            <h1>Contacta con nosotros</h1>
            <div class="elemento">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
            </div>

            <div class="elemento">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email">
            </div>

            
            <div class="elemento">
                <label for="asunto">Asunto:</label>
                <input type="text" name="asunto" id="asunto">
            </div>

            
            <div class="elemento">
                <label for="mensaje">Mensaje: </label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
            </div>

            <div id="cuadro">
            <?php
    
        
                if(isset($_POST['enviar'])){
                    $nombre = $_POST['nombre'];
                    $asunto = $_POST['asunto'];
                    $mensaje = $_POST['mensaje'];
                    $email = $_POST['email'];
                    
                    

                    if($nombre != "" && $asunto !="" && $mensaje !=""){
                        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/class.phpmailer.php");
                        $destinatario = "xualosoy@gmail.com";
                        $from = $email;
                        enviarEmail($from,$nombre,$destinatario,$asunto,$mensaje);
                        
                        
                    }else{
                        ?>
                        <span><?php echo "Rellena los campos";?></span> 
                        <?php
                    }
                }



?>
            </div>
            <input type="submit" value="Enviar" id="enviar" name="enviar">
        </form>
        <div id="info" class="col-6">
            <h1>Información</h1>
            <p>Bienvenido al Contacto con Deja Huella! Para realizar cualquier duda/consulta, debes completar el formulario y te daremos una respuesta cuanto antes! Ten paciencia y evita mandar más de 1 mensaje. Gracias!</p>
            <p>Puedes enviar cualquier tipo de duda, tanto para obtener información sobre algun tema, o consultar las miles de dudas que te puedan surgir!</p>
        </div>
    </div>

    <div id="capaTextoMapa">
        <h1>¡Nos puedes encontrar aquí abajo!</h1>
    </div>
    <div id="capaMapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1817.0721427298788!2d-3.012958781241372!3d40.009812296275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDAwJzM2LjEiTiAzwrAwMCc0OS4yIlc!5e0!3m2!1ses!2ses!4v1622065295777!5m2!1ses!2ses" height="350" style="border:0;" allow="fullscreen"  id="mapa"></iframe>
    </div>
    <?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>



<?php
/* 
    function obtenerEmail($user){
        include "../../includes/entrarEnBD.php";

        $consulta = "SELECT email from usuarios where nombreUsuario='$user';";
        
        $resultado = $bd->query($consulta);
        
        $fila = $resultado->fetch_row();
        $email =  $fila[0]; // Email
        $bd->close();

        return $email;

    }
*/
    function enviarEmail($from,$fromNombre,$to,$asunto,$mensaje){
        $mail = new phpmailer();
        $mail->CharSet = 'UTF-8';

        //Indicamos donde está el plugin.

        $mail->PluginDir = "../../includes/";

        //Escogemos de donde enviamos el correo.

        $mail->host = "localhost";
        $mail->isHTML(true);
        //Añadimos el destinatario
        $mail->From = $from;
        $mail->FromName = $fromNombre;

        $mail->Subject = $asunto;
        //Modificamos el mensaje
        $mensaje = $from ."<br>". $mensaje;
        $mail->Body = $mensaje; 
        $mail->AddAddress($to);

        //Enviamos el mail
        if($mail->Send()){
            ?>
                <span><?php echo "Mensaje enviado.";?></span>
            <?php
            
        }else{
            ?>
                <span><?php echo "No se ha podido enviar el email.";?></span>
            <?php
        }
    }

    
?>