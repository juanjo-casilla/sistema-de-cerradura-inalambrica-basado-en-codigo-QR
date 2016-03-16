<?php
        //Sacamos de la cabecera http el id_puetas que necesitamos
        $headers = apache_request_headers();
        $puerta="1";
        foreach ($headers as $header => $value) {
            if($header=="Door")
            {
                $puerta=  $value;
            }
        }
        
        //Conexión a la base de datos
        $link = mysqli_connect('localhost', 'puertas', 'puertas') or die('No se pudo conectar: ' . mysqli_error());
        echo 'Conexión satisfactoria a la base de datos. <br>';
        
        // Seleccionamos la base de datos a la que queremos conectarnos
        mysqli_select_db($link,'puertas') or die('No se pudo seleccionar la base de datos.');

        // Realizar una consulta MySQL
        $query = 'SELECT id_puertas FROM puertas_pendientes WHERE id_puertas = '.$puerta. ';';
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
        
        if(mysqli_num_rows($result)!=0)
        {
            mysqli_query($link,"DELETE FROM puertas_pendientes WHERE id_puertas = ".$puerta. ";");
            echo "<estado>1</estado>";
            echo "<time>".date("s")."</time>";
        }else
        {
            echo "<estado>0</estado>";
            echo "<time>".date("s")."</time>";
        }

        // Liberar resultados
        mysqli_free_result($result);

        // Cerrar la conexión
        mysqli_close($link);
    
?>
