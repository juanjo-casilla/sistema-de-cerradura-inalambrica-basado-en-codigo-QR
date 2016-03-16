<?php
        //Guarda los valores que nos mandan desde v.php en las variables
        $codigo=$_POST["codigo"];
        $puerta=$_POST["puerta"];
        $nick = $_POST["nick"];
        $password= $_POST["password"];
        
        //Se muestra por pantalla el contenido de las variables
        //echo " codigo ".$codigo;
        echo "<br>";
        echo " Puerta Nº: ".$puerta;
        echo "<br>";

        //Conexión a la base de datos
        $link = mysqli_connect('localhost', 'puertas', 'puertas') or die('No se pudo conectar: ' . mysqli_error());
        echo 'Conexión satisfactoria a la base de datos. <br>';
        
        // Seleccionamos la base de datos a la que queremos conectarnos
        mysqli_select_db($link,'puertas') or die('No se pudo seleccionar la base de datos');

        // Realizar una consulta MySQL
        $query = 'SELECT clave FROM puertas WHERE id_puertas = '.$puerta. ';';
        $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));


        // Imprimir los resultados en HTML
        // echo "<table>\n";
        while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) 
        {
                  // echo "\t<tr>\n";
            foreach ($line as $col_value)
            {
                     //  echo "\t\t<td>$col_value</td>\n";
            }
                   //echo "\t</tr>\n";
        }
              // echo "</table>\n";


        // Liberar resultados
        mysqli_free_result($result);
        
        //Comprobamos que el código que nos han mandado es igual al que tenemos
        if($codigo==hash_hmac("md5", date("H:i"), $col_value))
        {
            echo "<br>Código correcto.<br>";
            $query = 'SELECT nick, password FROM usuarios WHERE nick = "'.$nick. '";';
            $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

                if(mysqli_num_rows($result)!=0)
                {
                    $row = mysqli_fetch_array($result, MYSQL_ASSOC);
                    //verificamos que la password que tenemos en la base de datos es la misma que nos han mandado
                    if (password_verify($password, $row['password'])) 
                    {
                       //$query = 'SELECT id_puertas FROM regla WHERE id_puertas = "'.$puerta. '";';
                       $query = 'SELECT * FROM regla JOIN usuarios ON regla.id_usuarios=usuarios.id_usuarios WHERE id_puertas='.$puerta.' and nick="'.$nick.'" and Now() <= fecha_y_hora_salida and Now() >= fecha_y_hora_entrada;';
                       $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
                       if(mysqli_num_rows($result)!=0)
                       {
                           $query = 'INSERT INTO puertas_pendientes VALUES ('.$puerta. ');';
                           $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));
                           echo '¡La puerta debe abrirse en breve.!<br>';
                       }else
                       {
                           echo "No hay ninguna regla para este usuario activa.";
                       }
                   } else 
                    {
                       echo 'Usuario o password incorrecto.<br>';
                    }

                }else
                {
                    echo 'Usuario o password incorrecto.<br>';
                }
                echo "<br>";
        }else
        {
            echo "<br>Código incorrecto.<br>";
        }
               
        // Cerrar la conexión
        mysqli_close($link);

 
?>