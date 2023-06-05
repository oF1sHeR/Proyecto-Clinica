<?php 
    include ($_SERVER['DOCUMENT_ROOT']. "/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta médico</title>
    <style>@import "insertarMedicos.css";</style>
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <script src="validacionesMedicos.js"></script>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/css/cabecera.css";</style>
    <style>@import "/clinica/pie/piePagina.css";</style>
    <script src="insertarMedicos.js"></script>
    <style></style>
</head>
<body>
    
    <?php
        include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/cabecera.php");
        if(isset($_SESSION['username']) && $_SESSION['username']='administrador'){
    ?>
    <form action="" method="POST" name="formulario" id="formulario" enctype="multipart/form-data" onsubmit ="return validaciones()">
        <div id="titulo">
            <h1>Alta médico</h1>
        </div>
        
        <div>
            <label for="dni">DNI empleado:</label>
            <input type="text" name="dni" id="dni">
        </div>
        
        <div>
            <label for="nombre">Nombre empleado:</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        
        <div>
            <label for="apellidos">Apellidos empleado:</label>
            <input type="text" name="apellidos" id="apellidos">
        </div>
        
        <div>
            <label for="servicio">Servicios del empleado:</label>
            <select name="servicio" id="servicio">
                <?php
                    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");
                    $consulta = "SELECT servicio FROM servicios";
                    $resultado = $bd->query($consulta);
                    $contador = 0;
                    while($fila = $resultado->fetch_assoc()){
                        $servicio = $fila['servicio'];
                        ?>
                
                <option value="<?php echo $servicio;?>"><?php echo $servicio;?></option>       
                        <?php
                        $contador++;
                    }
                    $bd->close();
                ?>
            </select>
        </div>
        
        <div>
            <label for="estudios">Estudios empleado:</label>
            <input type="text" name="estudios" id="estudios">
        </div>
        
        <div>
            <label for="imagen">Imagen empleado:</label>
            <input type="file" name="imagen" id="imagen">
        </div>

        <div class="capaTextArea">
            <label for="descripcion">Descripción del médico:</label>
            <textarea name="descripcion" id="descripcion" cols="50" rows="15"></textarea>
        </div>
        
        <div>
            <input type="submit" value="Insertar medico" id="insertar" name="insertar">
        </div>

        <div id="cuadro">
        <?php


            function insertarMedico($dni,$nombre,$apellidos,$servicio,$estudios,$imagen,$descripcion){
                include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

                $consulta = "INSERT INTO medicos values('$dni','$nombre','$apellidos','$servicio','$estudios','$imagen','$descripcion')";
                $resultado = $bd->query($consulta);
                if($bd->errno!=0)
                        echo $bd->errno . " -- " . $bd->error . "<br>";
                $bd->close();
                echo "Médico insertado";
                /* Recuerda introducir los datos correctamente*/
            }


            if(isset($_POST['insertar'])){
                $dni = $_POST['dni'];
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $servicio = $_POST['servicio'];
                $estudios = $_POST['estudios'];
                $descripcion = $_POST['descripcion'];


                //Comprobamos el formato del archivo subido

                $ficheroSubido = $_FILES['imagen']['name'];

                if(isset($ficheroSubido) && $ficheroSubido !=""){
                    $tipo = $_FILES['imagen']['type'];
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                        - Se permiten archivos .gif, .jpg, .png. </b></div>';
                    
                    }else{
                        
                        $posicion = strpos($tipo,"/");
                        $tipo = substr($tipo,$posicion+1);
                        

                        //Leemos el directorio
                        $directorio = scandir("./imagenes");

                        foreach($directorio as $valor){
                            if(is_file("./" . $valor) && $valor == $dni){
                                unlink("./" .$valor);
                            }
                        }

                        if(move_uploaded_file($_FILES['imagen']['tmp_name'],"./imagenes/" . $dni . "." . $tipo)){
                            echo "Fichero subido" . "<br>";
                        }else{
                            echo "No se ha subido" . "<br>";
                        }

                        //Redimensionamos la imagen

                            switch($tipo){
                                case "gif":
                                    $imagen = imagecreatefromgif("./imagenes/" . $dni . ".gif");
                                    $nuevaImagen = imagescale($imagen,200,300);
                                    imagegif($nuevaImagen,"./imagenes/" . $dni . ".gif");
                                    imagedestroy($nuevaImagen);
                                    break;
                                case "png":
                                    $imagen = imagecreatefrompng("./imagenes/" . $dni . ".png");
                                    $nuevaImagen = imagescale($imagen,200,300);
                                    imagepng($nuevaImagen,"./imagenes/" . $dni . ".png");
                                    imagedestroy($nuevaImagen);
                                    break;
                                case "jpg":
                                    $imagen = imagecreatefromjpeg("./imagenes/" . $dni . ".jpg");
                                    $nuevaImagen = imagescale($imagen,200,300);
                                    imagejpeg($nuevaImagen,"./imagenes/" . $dni . ".jpg");
                                    imagedestroy($nuevaImagen);
                                    break;
                            }

                        if($dni != "" && $nombre != "" && $apellidos != "" && $servicio != "" && $estudios != "" && $descripcion != ""){
                            insertarMedico($dni,$nombre,$apellidos,$servicio,$estudios,"clinica/medicos/imagenes/".$dni.".".$tipo,$descripcion);
                        }
                    }
                }
            }
            ?>
                    </div>
                </form>
                <?php
                    }else{
                ?>
                    <div class="mensaje">
                        <div>
                            <h1><?php echo " Debes iniciar sesión como administrador."; ?></h1>
                            <a href="/clinica/login/login.php">Aquí podrás iniciar sesión</a>
                        </div>
                    </div>
                <?php
                    }
                ?>

                <?php
                    include ($_SERVER['DOCUMENT_ROOT'] . "/clinica/pie/piePagina.php");
                ?>
</body>
</html>



