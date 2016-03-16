<?php
        //Incluimos la libreria para formar un código QR
        include('phpqrcode/qrlib.php'); 
        
        //Sacamos de la cabecera http el id_puetas que necesitamos
        $headers = apache_request_headers();
        $puerta="1";
        foreach ($headers as $header => $value) 
        {
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

        // Realizamos una consulta MySQL
        $query = 'SELECT clave FROM puertas WHERE id_puertas = '.$puerta. ';';
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
        
        // Imprimir los resultados en HTML
        while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
           // echo "\t<tr>\n";
            foreach ($line as $col_value) 
            {
              //  echo "\t\t<td>$col_value</td>\n";
            }
            //echo "\t</tr>\n";
        }
        
        // Liberamos los resultados
        mysqli_free_result($result);

        // Cerramos la conexión
        mysqli_close($link);
 
        //En esta variable tendremos el id_puerta, un hash del código que irá cambiando cada minuto y la clave.
        $codeContents = "http:/192.168.173.1/qr/v.php?d=".$puerta."&c=".hash_hmac("md5", date("H:i"), $col_value); 
        echo ($codeContents);
        echo"<br>";
        //Generamos el código QR
        $text = QRcode::text($codeContents); 
     
        // Mostrar el contenido de la variable text por pantalla
       /* echo '<qr>'; 
        echo join("\n", $text); 
        echo '</qr>'; */
?>
   
