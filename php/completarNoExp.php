
<?php 
include 'conexion.php';
$nombre = $_GET['term'];
$conexion= new conexion();
$datos=$conexion->getDatos("SELECT NoExp FROM expedientes where NoExp LIKE ('%".$nombre."%') ORDER BY(NoExp) ASC");
  foreach ($datos as $key) 
      {
     $_array[]= utf8_encode($key["NoExp"]);
      
      }
   echo  json_encode($_array);



?>


