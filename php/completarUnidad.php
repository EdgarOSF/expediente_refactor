<?php 
include 'conexion.php';
$nombre = $_GET['term'];
$conexion= new conexion();
$datos=$conexion->getDatos("SELECT HospitalaqueseEnvia FROM hospitalalqueseenvia where HospitalaqueseEnvia LIKE ('%".$nombre."%')");
  foreach ($datos as $key) 
      {
     $_array[]= utf8_encode($key["HospitalaqueseEnvia"]);
      
      }
   echo  json_encode($_array);



?>
