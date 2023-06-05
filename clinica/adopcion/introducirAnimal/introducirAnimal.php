<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/sesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir animal</title>
    <style>@import "introducirAnimal.css";</style>
   
    <script src="/includes/efectos/jquery-3.6.0.min.js"></script>
    <style>@import "/clinica/css/cabecera.css";</style>
    <link rel="stylesheet" href="/clinica/css/fontawesome/all.min.css">
    <style>@import "/clinica/pie/piePagina.css";</style>
    <script src="introducirAnimal.js"></script>     
</head>
<body>
    <?php 
        include ($_SERVER['DOCUMENT_ROOT']. "/clinica/cabecera.php");
        if(isset($_SESSION['username']) && $_SESSION['username']='administrador'){
    ?>
    <div>
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validaciones()" id="formulario" name="formulario">
            <h1>Introducir animal</h1>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            
            <div>
                <label for="tipo">Tipo:</label> 
                <input type="text" name="tipo" id="tipo">
            </div>
            
            <div>
                <label for="sexo">Sexo:</label> 
                <select name="sexo" id="sexo">
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                </select>
            </div>
            <div>
                <label for="edad">Edad:</label> 
                <input type="text" name="edad" id="edad">
            </div>
            <div>
                <label for="raza">Raza: </label> 
                <input type="text" name="raza" id="raza">
            </div>
            <div class="capaTextarea">
                <label for="descripcion">Descripción: </label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
            </div>
                
            <div>
                <label for="telefono">Telefono: </label> 
                <input type="text" name="telefono" id="telefono">
            </div>
        
            <div>
                <label for="ubicacion">Ubicación: </label> 
                <input type="text" name="ubicacion" id="ubicacion">
            </div>
                
            <div>
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen">
            </div>
            
            <div>
                <input type="submit" id="insertar" name="insertar" value="Insertar animal">
            </div>
    
        </form>

    <div id="cuadro"></div>

    </div>
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
        include($_SERVER['DOCUMENT_ROOT']. "/clinica/pie/piePagina.php");
    ?>
</body>
</html>

<?php

//Primero, comprobamos 


if(isset($_POST['insertar'])){
    $ultimoId = obtenerUltimoId() + 1;
    

    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $sexo = $_POST['sexo'];
    $edad = $_POST['edad'];
    $raza = $_POST['raza'];
    $descripcion = $_POST['descripcion'];
    $telefono = $_POST['telefono'];
    $ubicacion = $_POST['ubicacion'];

    
    $ficheroSubido = $_FILES['imagen']['name'];

    if(isset($ficheroSubido) && $ficheroSubido !=""){
        $type = $_FILES['imagen']['type'];
        if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")))) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
            - Se permiten archivos .gif, .jpg, .png. </b></div>';
         
        }else{
            //Leemos el directorio 

            $directorio = scandir("./imagenes");
            //Creamos un hash que sera el nombre de la imagen
            foreach($directorio as $valor){
                if(is_file("./" . $valor) && $valor == $ultimoId){
                    unlink("./" .$valor);
                }
            }

            if(move_uploaded_file($_FILES['imagen']['tmp_name'],"./imagenes/" . $ultimoId . ".jpg")){
                //echo "Fichero subido" . "<br>";
            }else{
                //echo "No se ha subido" . "<br>";
            }

            
                $imagen = imagecreatefromjpeg("./imagenes/" . $ultimoId . ".jpg");
                imagejpeg($imagen,"./imagenes/" . $ultimoId . ".jpg");
                imagedestroy($imagen);


            insertarAnimal($nombre,$tipo,$sexo,$edad,$raza,$descripcion,"/clinica/adopcion/introducirAnimal/imagenes/".$ultimoId.".jpg",$telefono,$ubicacion);
        }
    }
    
}




function obtenerUltimoId(){
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

    $consulta = "SELECT ID_Animal FROM animales order BY ID_Animal DESC LIMIT 1";
    $resultado = $bd->query($consulta);
    $fila = $resultado->fetch_row();
    $ultimoId = $fila[0];
    $bd->close();
    return $ultimoId;
    
}

function insertarAnimal($nombre,$tipo,$sexo,$edad,$raza,$imagen,$descripcion,$telefono,$ubicacion){
    include ($_SERVER['DOCUMENT_ROOT'] . "/includes/entrarEnBD.php");

    $consulta = "INSERT INTO animales values(DEFAULT,'$nombre','$tipo','$sexo','$edad','$raza','$imagen','$descripcion','$ubicacion','$telefono')";
    //$consulta = "TRUNCATE table animales";
    $resultado = $bd->query($consulta);
    if($bd->errno!=0)
            echo $bd->errno . " -- " . $bd->error . "<br>";
    $bd->close();

    /* Recuerda introducir los datos correctamente*/
}




//insertarAnimal("Rex2","perro","hembra","3","PastorAleman","Perro adiestrado para la caza","imagen","Madrid","123456789",);

?> 