<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperacion contraseña</title>

    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <style>@import "recuperacion.css";</style>
    <script src="recuperacion.js"></script>
</head>
    <?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>
<body>
    <div id="capaGeneral">
        <form action="" method="post" id="formulario" name="formulario">
            <h1>Formulario para recuperación</h1>
            <p>Para recuperar la contraseña, deberás introducir el email de tu cuenta. Se te enviará un email que contendrá un enlace para que cambies tu contraseña.</p>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
            <div>
                <input type="submit" value="Enviar email" name="enviar" id="enviar">
            </div>
            <div id="cuadro">
                <?php 
    
                    if(isset($_POST['enviar'])){
                        
                        

                        //Características del email.

                        $from = "raresvsabau@gmail.com";
                        $destinatario = $_POST['email'];
                        $asunto = "Recuperación de contraseña.";
                        $mensaje ="Hola. Gracias por estar solicitar nuestro servicio de recuperación.";

                        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
                        

                        $consulta = "SELECT cdv from usuarios where email='$destinatario'";
                        $resultado = $bd->query($consulta);
                        $elemento = $resultado->fetch_row();
                        
                        //Variable que contendrá el enlace de la página.
                        $url = 'http://'. $_SERVER["SERVER_NAME"].'/clinica/nuevaPass/nuevaPass.php?email=' . $destinatario . "&codigo=" .$elemento[0];
                        $mensaje .="<br>";
                        $mensaje .= "Aquí te adjuntamos un enlace para que puedas cambiar tu contraseña." . "<br>";
                        $mensaje .= "<a href=" . $url . ">Recupera tu contraseña.</a>";
                        
                        
                        //Insertamos la clase php mailer;

                        require ($_SERVER['DOCUMENT_ROOT'] . "/includes/class.phpmailer.php");

                        $mail = new phpmailer();
                        $mail->CharSet = 'UTF-8';

                        //Indicamos donde está el plugin.

                        $mail->PluginDir = "../../includes/";

                        //Escogemos de donde enviamos el correo.

                        $mail->host = "localhost";
                        $mail->isHTML(true);
                        //Añadimos el destinatario
                        $mail->From = "raresvsabau@gmail.com";
                        $mail->FromName = "Rares Vasile";

                        $mail->Subject = $asunto;
                        $mail->Body = $mensaje; 
                        $mail->AddAddress($destinatario);

                        if($mail->Send()){
                           
                            ?>
                                <span><?php echo "Mensaje enviado."; ?></span>
                            <?php
                        }else{
                            ?>
                                <span><?php echo "No se ha enviado el correo" . $mail->ErrorInfo();?></span>
                            <?php
                        }

                        $bd->close();
                    };

?>
            </div>
        </form>
    </div>
    <?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>

