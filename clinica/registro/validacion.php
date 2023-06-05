<?php 

    function validarCuenta($correo,$codigoValidacion){
        

        $from = "raresvsabau@gmail.com";
        $to = $correo;
        $asunto = "Validación cuenta";

        $url = 'http://'. $_SERVER["SERVER_NAME"].'/clinica/registro/validacion2.php?email=' . $correo . "&codigo=" . $codigoValidacion;


        $mensaje = "Este es el mensaje de validación. Pulsa en el enlace de abajo para activar tu cuenta.";
        $mensaje .= "<a href=". $url  . ">Pulse aquí para validar su cuenta</a>";

        include ($_SERVER['DOCUMENT_ROOT'] . "/includes/class.phpmailer.php");
        
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
        $mail->AddAddress($to);
        
        $mail->Send();
        if($mail->Send()){
            ?>
            <span style="visibility:visible"><?php echo "Mensaje enviado.Revisa tu correo para validar la cuenta";?></span>
        <?php
        }else{
            echo "No se ha enviado el correo" . $mail->ErrorInfo();
        }
    }


    

    

?>