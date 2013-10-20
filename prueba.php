<?php

include_once('conexion.php');
$queEmp = "SELECT * FROM cliente";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

if ($totEmp> 0) {
   while ($rowEmp = mysql_fetch_array($resEmp)) {
      echo "<strong>".$rowEmp[0]."</strong><br>";
      echo "Direccion: ".$rowEmp[1]."<br>";
      echo "Telefono: ".$rowEmp[2]."<br>";
      echo "Edad: ".$rowEmp[3]."<br>";
      echo "Efectivo: ".$rowEmp[4]."<br>";
      
   }
}
 

?>