<?php
require_once('../librerias/phpexcel/PHPExcel.php');
require_once('../librerias/phpexcel/PHPExcel/Reader/Excel2007.php');
require_once('conexion.php');
ini_set('memory_limit','256M');
ini_set('max_execution_time', 123456);
class importarExcelBD
{   private $archivo,$tipo,$destino,$conexion,$objReader, $objPHPExcel, $objFecha,$numFilas,$numColumnas;
    public function importarExcelBD()
    {
      $this->conexion=new conexion();
      $this->archivo = $_FILES['excel']['name'];
      $this->tipo = $_FILES['excel']['type'];
      $this->destino = $this->archivo;
      if (copy($_FILES['excel']['tmp_name'],$this->destino)) echo "Archivo Cargado Con Éxito";
      else echo "Error Al Cargar el Archivo";
      $this->leerArchivo();
    }
    public function leerArchivo()
    {    $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
         $cacheSettings = array( 'memoryCacheSize' => '256MB');
         PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
        
      if (file_exists ($this->archivo)){
          $this->objReader = new PHPExcel_Reader_Excel2007();
          $this->objPHPExcel = $this->objReader->load($this->archivo);
          $this->objFecha = new PHPExcel_Shared_Date();
          $this->objPHPExcel->setActiveSheetIndex(0);
          $this->numFilas=$this->objPHPExcel->getActiveSheet()->getHighestRow();   
        }
   }
    public function insertarHojaBD($id_movimiento,$partida)
    { 
      $variables=array("id","rfc","unidad_adscripcion","dependencia","nombre","expediente","determinacion","cargo_funcion","tp","nivel","clave_categoria","descripcion_categoria","proyecto","concepto","mes1","mes2","mes3","total_compensacion","porciento_pension","monto_pension","importe_total_pagar","sueldo_mensual","sueldo_compensacion","partida","fk_movimiento_hoja");
      $letras=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X");
         
            $a=2; 
           for($i=0; $i<($this->numFilas-2); $i++) 
           {
             foreach ($letras as $key) 
               {  
                     $_DATOS_EXCEL[$i][$key] = $this->objPHPExcel->getActiveSheet()->getCell($key.($a))->getCalculatedValue();
                   
               }
                   $a++;
           }
       foreach($_DATOS_EXCEL as $campo => $valor)
       {
       
       $sql = "INSERT INTO hoja_trabajo (";  
       foreach ($variables as $key) {
         ($key == "fk_movimiento_hoja") ? $sql.= $key.")" : $sql.=$key.",";
          
       }
        $sql.= " VALUES (NULL,";
       foreach ($valor as $campo2 => $valor2)
         {  
           if($campo2 == "W")  $sql.="'".$partida."',";
           else if ($campo2 == "X")  $sql.= "'".$id_movimiento."');";
           else  $sql.= "'".$valor2."',";
            
        }
        echo $sql;
          $this->conexion->setDatos($sql);
          
    }
    
    }
    public function insertarNominaEstatalBD()
    {  
          $variables=array("id","rfc","departamento","nombre","expediente","determinacion","tp","niv","categoria","descripcion","proyecto","pagar","gravable","percepcion","deduccion","liquido","liquido_mensual","curp","fecha_ingreso","id_trabajador","unidad");
          $letras=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T");
             
            $a=2; 
           for($i=0; $i<($this->numFilas-1); $i++) 
           {
             foreach ($letras as $key) 
               { if(($key."".($a))=="R".$a)
                  {   
                    $timestamp= PHPExcel_Shared_Date::ExcelToPHP($this->objPHPExcel->getActiveSheet()->getCell($key.($a))->getCalculatedValue());

                     $_DATOS_EXCEL[$i][$key]=date("Y-m-d",$timestamp);
  
                    }
                    else
                  { 
                     $_DATOS_EXCEL[$i][$key] = $this->objPHPExcel->getActiveSheet()->getCell($key.($a))->getCalculatedValue();
                   }
               }
                   $a++;
           }
       foreach($_DATOS_EXCEL as $campo => $valor)
       {
       
       $sql = "INSERT INTO nomina_estatal (";  
       foreach ($variables as $key) {
         ($key == "unidad") ? $sql.= $key.")" : $sql.=$key.",";
       }
        $sql.= " VALUES (NULL,";
       foreach ($valor as $campo2 => $valor2)
        {  ($campo2 == "T") ? $sql.= "'".$valor2."');" : $sql.= "'".$valor2."',";
            
        }
          $this->conexion->setDatos($sql);
          
    }
   }

    public function insertarNominaFederalBD()
    {  
          $variables=array("id","rfc","unidad_adscripcion","unidad_adscripcion_real","nombre","fecha_alta","fuente_financiamiento","nivel","t_plaza","categoria","descripcion","puesto","complem","isr_complem","importe_aut","mes1","mes2","total","porciento_pension","monto_pension","neto_pagar_compensacion","sueldo_mensual","sueldo_mas_compe","banco","no_cuenta");
          $letras=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X");

             $mes1=$this->objPHPExcel->getActiveSheet()->getCell("O1")->getCalculatedValue();
             $mes2=$this->objPHPExcel->getActiveSheet()->getCell("P1")->getCalculatedValue();
             $sentencia="UPDATE  meses_estatus_fed SET mes='".$mes1."' WHERE id=1" ;
             $this->conexion->setDatos($sentencia);
             $sentencia="UPDATE  meses_estatus_fed SET mes='".$mes2."' WHERE id=2" ;
             $this->conexion->setDatos($sentencia);
             $a=2; 
           for($i=0; $i<($this->numFilas-1); $i++) 
           {
             foreach ($letras as $key) 
               { 
                  $_DATOS_EXCEL[$i][$key] = $this->objPHPExcel->getActiveSheet()->getCell($key.($a))->getCalculatedValue();
               
               }
                   $a++;
           }

       foreach($_DATOS_EXCEL as $campo => $valor)
       {
       
       $sql = "INSERT INTO nomina_federal (";  
       foreach ($variables as $key) {
         ($key == "no_cuenta") ? $sql.= $key.")" : $sql.=$key.",";
       }
        $sql.= " VALUES (NULL,";
       foreach ($valor as $campo2 => $valor2)
        {   
            ($campo2 == "X") ? $sql.= "'".$valor2."');" : $sql.= "'".$valor2."',";
        }
         echo $sql;
          $this->conexion->setDatos($sql);
          
    }
   }
}

?>







   