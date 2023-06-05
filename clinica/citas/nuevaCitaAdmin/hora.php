<?php

    $fecha = $_POST['fecha'];
    $servicio = $_POST['servicio'];
    if($fecha != "" && $servicio!= ""){

    
        include ($_SERVER['DOCUMENT_ROOT']. "/includes/entrarEnBD.php");
        //include ("../../../includes/entrarEnBD.php");

        
        
        $horasOcupadas = array();

        $consulta = "SELECT hora FROM citas WHERE servicio = '$servicio' AND fecha='$fecha'";
        $resultado = $bd->query($consulta);
        

        $i = 0;
        while($fila = $resultado->fetch_row()){
            $horasOcupadas[$i] = $fila[0];
            $i++;
        }

        
        $bd->close();
            
            switch($servicio){
                case "Revisión":
                    $resultado = '{ "horas":["8:30","9:30","10:30","11:30","12:30","13:30","14:30","16:30","17:30","18:30","19:30"]}';
                    break;
                case "Cirugía":
                    $resultado = '{ "horas":["9:30","11:30","13:30","16:30","18:30"]}';
                    break;
                case "Laboratorio":
                    $resultado = '{ "horas":["8:30","9:30","11:30","12:30","13:30","14:30","16:30","18:30","19:30"]}';
                    break;
                case "Dermatología":
                    $resultado = '{ "horas":["8:30","9:30","10:30","11:30","12:30","13:30","14:30","16:30","17:30","18:30","19:30"]}';
                    break;
                case "Gastroentorología":
                    $resultado = '{ "horas":["8:30","9:30","10:30","11:30","12:30","13:30","14:30","16:30","17:30","18:30","19:30"]}';
                    break;
                case "Oftalmología":
                    $resultado = '{ "horas":["8:30","9:30","10:30","11:30","12:30","13:30","14:30","16:30","17:30","18:30","19:30"]}';
                    break;
                case "Oncología":
                    $resultado = '{ "horas":["8:30","9:30","10:30","11:30","12:30","13:30","14:30","16:30","17:30","18:30","19:30"]}';
                    break;
                case "Cardiología":
                    $resultado = '{ "horas":["8:30","9:30","10:30","11:30","12:30","13:30","14:30","16:30","17:30","18:30","19:30"]}';
                    break;
                case "Neurología":
                    $resultado = '{ "horas":["8:30","9:30","10:30","11:30","12:30","13:30","14:30","16:30","17:30","18:30","19:30"]}';
                    break;
                case "0":
                    $resultado = '{"horas":[]}';
                    break;
            }

            //Decodficamos el objeto json para eliminar los elementos que ya haya en la base de datos.
            
            
        $resultadoArray = json_decode($resultado,true);
        //Nos crea un array multidimensional.
            
            
        //Eliminamos las horas que ya estén ocupadas del array para mostrarlo ahora.

        $resultadoArray['horas'] = array_diff($resultadoArray['horas'],$horasOcupadas);
        $resultadoArray['horas'] = array_values($resultadoArray['horas']);

        
        $resultadoArray= json_encode($resultadoArray);
        echo $resultadoArray;
            
    }
    

    
?>