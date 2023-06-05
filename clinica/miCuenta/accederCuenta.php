<?php

    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/sesion.php");
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

    $usuario = $_SESSION['username'];
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceder Cuenta</title>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>@import "accederCuenta.css";</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">    
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <script src="/clinica/miCuenta/accederCuenta.js"></script>
    
    
</head>
<body>

    <?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
    ?>
    <div id="capaGeneral">
        <div id="titulo">
            <h1>Información de Cuenta</h1>
        </div>
        <div id="capaTabla">
            <table>
                <caption>Tus datos</caption>
            
            <?php 

                //Creamos un array con los elementos de la base de datos. Lo creamos a mano ya que luego para imprimir esos datos, hay que modificar el string para añadirle acentos y espacios.
                $array = array("Usuario","E-mail","Nombre","Apellidos","Contraseña","DNI/NIE","Teléfono");
                //Realizamos la consulta

                $consulta = "SELECT * FROM usuarios WHERE nombreUsuario = '$usuario'";

                $resultado = $bd->query($consulta);

                $campos = $resultado->fetch_fields();
                $contador = 0;
                $fila = $resultado->fetch_row();

                foreach($campos as $valor){
                    if($contador !=7 && $contador !=8){
                    ?>
                <tr>
                        <td>
                    <?php
                    // Si la celda no es "Activado" y el codigo de verificacion.
                    
                        //echo strtoupper($valor->name ."<br>");
                        echo $array[$contador];
                    ?>
                        </td>
                        <td>
                        <?php
                        
                            if($contador!=4 ){
                                echo $fila[$contador];
                            }else{
                                echo "********";
                            }
                            $contador++;
                                
                        
                        ?>
                        </td>
                </tr>
                    <?php
                    }   
                }
                $bd->close();
                ?>
            </table>
        </div>
    </div>        
    <?php 
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
    ?>
</body>
</html>