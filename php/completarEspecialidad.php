<?php 
include 'conexion.php';
$nombre = $_GET['term'];
$conexion= new conexion();
$datos=$conexion->getDatos("SELECT Especialidad FROM especialidad where Especialidad LIKE ('%".$nombre."%')");
  foreach ($datos as $key) 
      {
     $_array[]= utf8_encode($key["Especialidad"]);
      
      }
   echo  json_encode($_array);



?>
