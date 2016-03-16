<?php
        //print_r($_GET);
        $codigo=$_GET["c"];
        $puerta=$_GET["d"];
        //echo " codigo ".$codigo;
        echo "<br>";
        echo " puerta ".$puerta;
        echo "<br>";

        echo '<html>
       <head>
       <title>Formulario</title>
       <meta charset="utf-8">
       </head>
       <body>
           <form name="formulario" method="post" action="v2.php">
           Introduce tu Nick: <input type="text" name="nick" value="">
           <input type="hidden" name="codigo" value="'.$codigo.'">
           <input type="hidden" name="puerta" value="'.$puerta.'"><br>
           Introduce tu password: <input type="password" name="password" value=""><br>
           <input type="submit" />
           </form>
       </body>
       </html>'

?>

 
   
