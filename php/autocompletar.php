<?php 
include 'conexion.php';
$nombre = $_GET['term'];
$conexion= new conexion();
$datos=$conexion->getDatos("SELECT distinct nombrePaciente from expedientes where nombrePaciente LIKE ('%".$nombre."%') ");
  foreach ($datos as $key) 
      {
     $_array[]= utf8_encode($key["nombrePaciente"]);
      
      }
   echo  json_encode($_array);



?>
