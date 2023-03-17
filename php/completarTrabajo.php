<?php 
include 'conexion.php';
$nombre = $_GET['term'];
$conexion= new conexion();
$datos=$conexion->getDatos("SELECT TrabajoSocial FROM trabajosocial where TrabajoSocial LIKE ('%".$nombre."%')");
  foreach ($datos as $key) 
      {
     $_array[]= utf8_encode($key["TrabajoSocial"]);
      
      }
   echo  json_encode($_array);



?>
