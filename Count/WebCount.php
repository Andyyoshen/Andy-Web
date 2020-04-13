<?php
//@session_start();

$file = fopen("p5.txt","r");
$num  = fgets($file);
//if(isset($_SESSION['come'])!="v")
///{
    $num++;
    $file = fopen("p5.txt","w");
    fwrite($file,$num);
    fclose($file);
   // $_SESSION['come']="v";
//}

?>
<html>
    <body>
        <?php
        echo"$num";
        ?>
    </body>
</html>