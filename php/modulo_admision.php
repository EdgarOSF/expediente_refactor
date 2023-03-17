<?php 
ini_set('display_errors', 0);
session_start();
include_once 'conexion.php';
class modulo_estatus
{  
	public $nombre,$publicado,$sexo,$fk_servicio_ingresa,$estado_paciente,$fk_unidad_ingreso,$cama,$observaciones,$ubicacion,$no_expediente,$fecha_ingreso,$fecha_egreso,$fecha_captura,$fk_estado,$fk_municipio,$domicilio,$nivel_socioeconomico,$derechohabiente,$diagnostico_medico,$caso_medico_legal,$esc,$cml,$acta_nacimiento,$copia_sp,$pase,$edad;
    public function modulo_estatus()
   {   
   	$this->con = new conexion();
   }
   public function getDatos(){ 
 
    extract($_REQUEST);
     date_default_timezone_set('America/Mexico_City');
      if(isset($id))$this->id=$id;
   

      if(empty($cama)) $this->cama='NULL';
      else  $this->cama=$cama; 
      if(isset($estado_paciente))$this->estado_paciente=$estado_paciente; 
      if(isset($observaciones))$this->observaciones=$observaciones; 
   

      
       $this->ubicacion=$ubicacion; 
       
       if(isset($fecha_ingreso))
      {
        if(empty($fecha_ingreso)) $this->fecha_ingreso="NULL";
        else  $this->fecha_ingreso= "'".date('Y-d-m H:i:s', strtotime($fecha_ingreso))."'"; 

      //  $this->fecha_egreso=$fecha_egreso; 
      } 
      if(isset($fecha_egreso))
      {
        if(empty($fecha_egreso)) $this->fecha_egreso="NULL";
        else  $this->fecha_egreso=  "'".date('Y-d-m H:i:s', strtotime($fecha_egreso))."'"; 
      //  $this->fecha_egreso=$fecha_egreso; 
      } 


      $this->diagnostico_medico=$diagnostico_medico;
   
  
      if(isset($acta_nacimiento))
      {
        if($acta_nacimiento=="on") $this->acta_nacimiento=1;
        else $this->acta_nacimiento=0;
      }
      else
      {
         $this->acta_nacimiento=0;
      }
      if(isset($copia_sp))
      { if($copia_sp=="on") $this->copia_sp=1;
        else $this->copia_sp=0;
      }
      else
      {
         $this->copia_sp=0;
      }
      if(isset($pase))
      {
         if($pase=="on") $this->pase=1;
         else $this->pase=0;
      }
      else
      {
          $this->pase=0;
      }

          if(isset($publicado))
      {
         if($publicado=="on") $this->publicado=1;
         else $this->publicado=0;
      }
      else
      {
          $this->publicado=0;
      }
    
    
   }
 
   public function isExiste()
   {
     $datos=$this->con->getDatos("SELECT * FROM  pacientes WHERE no_expediente=".$this->no_expediente." AND fecha_egreso IS NULL");
  
     $fila=count($datos);
     if($fila>=1) return false;
     else return true;
   }
   public function guardar_paciente(){
  
	  $this->getDatos();
    echo "UPDATE pacientes SET publicado=".$this->publicado.",fecha_ingreso=".$this->fecha_ingreso.",estado_paciente='".$this->estado_paciente."',fk_cama=".$this->cama.",observaciones='".$this->observaciones."',fecha_egreso=".$this->fecha_egreso.",fk_ubicacion='".$this->ubicacion."',diagnostico_medico='".$this->diagnostico_medico."',act_nacimiento=".$this->acta_nacimiento.",copia_sp=".$this->copia_sp.",pase=".$this->pase."  WHERE id=".$this->id;
echo ($this->con->setDatos("UPDATE pacientes SET publicado=".$this->publicado.",fecha_ingreso=".$this->fecha_ingreso.",estado_paciente='".$this->estado_paciente."',fk_cama=".$this->cama.",observaciones='".$this->observaciones."',fecha_egreso=".$this->fecha_egreso.",fk_ubicacion='".$this->ubicacion."',diagnostico_medico='".$this->diagnostico_medico."',act_nacimiento=".$this->acta_nacimiento.",copia_sp=".$this->copia_sp.",pase=".$this->pase."  WHERE id=".$this->id) ? "GUARDAR" : "ERROR");
 $this->con->setDatos("insert into bitacora_update (fk_usuario_update,fecha) values(".$_SESSION["idUsuario"].",GETDATE())");

 }

public function consultar_paciente_ts($id)
{  $array=$this->con->getDatos("SELECT p.id,p.fecha_ingreso,p.fecha_captura,p.nombre,p.edad,p.sexo,ua.nombre AS nombre_unidad,ca.id as id_cama,ca.nomenclatura,p.estado_paciente,p.fecha_egreso,p.observaciones,s.id as id_servicio,s.servicio as servicio,p.estatus,p.observaciones,ub.id as id_ubicacion,p.no_expediente,p.fk_estado,p.fk_municipio,p.domicilio,p.nivel_socioeconomico,p.derechohabiente,p.diagnostico_medico,p.caso_medico_legal,p.esc,p.cml,p.acta_nacimiento,p.copia_sp,p.pase FROM pacientes AS p LEFT JOIN unidades_adm AS ua ON ua.id=fk_unidad_ingreso  LEFT JOIN servicios as s on s.id=p.fk_servicio_ingresa LEFT JOIN Camas as ca ON ca.id=p.fk_cama LEFT JOIN ubicaciones as ub ON ub.id=p.fk_ubicacion WHERE p.id=".$id);

  foreach ($array as $key) {
    $fecha_egreso="";
    $fecha_ingreso="";
      if(isset($key["fecha_egreso"]))
          $fecha_egreso=date_format($key["fecha_egreso"], 'Y-m-d H:i:s');
        if(isset($key["fecha_ingreso"]))
         $fecha_ingreso= date_format($key["fecha_ingreso"], 'Y-m-d H:i:s');

         $_array=array("id"=>$key['id'],"fecha_ingreso"=>$fecha_ingreso,"nombre"=>utf8_encode($key['nombre']),"edad"=>$key['edad'],"sexo"=>$key['sexo'],"nombre_unidad"=>utf8_encode($key['nombre_unidad']),"estado_paciente"=>$key['estado_paciente'],"fecha_egreso"=>$fecha_egreso,"observaciones"=>$key['observaciones'],"servicio"=>utf8_encode($key['servicio']),"estatus"=>$key['estatus'],"id_servicio"=>$key['id_servicio'],"id_cama"=>$key['id_cama'],"nomenclatura"=>$key['nomenclatura'],"observaciones"=>$key['observaciones'],"id_ubicacion"=>$key['id_ubicacion'],"no_expediente"=>$key['no_expediente'],"fecha_captura"=>$key['fecha_captura'],"fk_estado"=>$key['fk_estado'],"fk_municipio"=>$key['fk_municipio'],"domicilio"=>$key['domicilio'],"nivel_socioeconomico"=>$key['nivel_socioeconomico'],"derechohabiente"=>$key['derechohabiente'],"diagnostico_medico"=>$key['diagnostico_medico'],"caso_medico_legal"=>$key['caso_medico_legal'],"esc"=>$key['esc'],"cml"=>$key['cml'],"acta_nacimiento"=>$key['acta_nacimiento'],"copia_sp"=>$key['copia_sp'],"pase"=>$key['pase']);     
     
   }

   echo  json_encode($_array);
}


public function eliminar_paciente($id){
    $array=$this->con->getDatos("SELECT * FROM pacientes WHERE id=".$id);
    $conexion2=  new conexion();
    $conexion2->setDatos("UPDATE camas SET disponible=1  WHERE id=".$array[0]['fk_cama']);
    $conexion2->setDatos("DELETE  FROM pacientes WHERE id=".$id);

}


    public function consultar_grafica_escala_calificacion()
    {
      
  extract($_REQUEST);    
      // $array=$this->con->getDatos("SELECT * FROM vw_total_grafica_I");
       $array=$this->con->getDatos("EXECUTE  pr_colsulta_grafica '".$fk."'");
     $labeles=array("Excento","Nivel 1","Nivel 2","Nivel 3","Nivel 4","Nivel 5","Nivel 6");
     $colores=array("#f56954","#00a65a","#f39c12","#00c0ef","#3c8dbc","#B0DE09","#04D215","#0D8ECF","#0D52D1","#2A0CD0","#8A0CCF","#CD0D74","#006400","#228B22","#B2D6DC","#754DEB","#0D8ECF");
     $i=0;

        $_array[]=array("value"=>$array[0]['EXCENTO'],"label"=>$labeles[0],"color"=>$colores[0]);
        $_array[]=array("value"=>$array[0]['UNO'],"label"=>$labeles[1],"color"=>$colores[1]);
        $_array[]=array("value"=>$array[0]['DOS'],"label"=>$labeles[2],"color"=>$colores[2]);
        $_array[]=array("value"=>$array[0]['TRES'],"label"=>$labeles[3],"color"=>$colores[3]);
        $_array[]=array("value"=>$array[0]['CUATRO'],"label"=>$labeles[4],"color"=>$colores[4]);
        $_array[]=array("value"=>$array[0]['CINCO'],"label"=>$labeles[5],"color"=>$colores[5]);
        $_array[]=array("value"=>$array[0]['SEIS'],"label"=>$labeles[6],"color"=>$colores[6]);
    echo json_encode($_array); 

   // echo "EXECUTE  pr_colsulta_grafica '".$fk."'";
   
  }


 public function consultar_unidades_ingreso()
  { 
      extract($_REQUEST); 
    $_array=array();
    $array=$this->con->getDatos("EXECUTE pr_colsulta_grafica_P '".$fk."'");
     $colores=array("#f56954","#00a65a","#f39c12","#00c0ef","#3c8dbc","#B0DE09","#04D215","#0D8ECF","#0D52D1","#2A0CD0","#8A0CCF","#CD0D74","#006400","#228B22","#B2D6DC","#754DEB","#0D8ECF");
   
        $_array[]=array("data"=>$array[0]['URGENCIAS'],"label"=>"URGENCIAS","color"=>$colores[0]);
        $_array[]=array("data"=>$array[0]['CONSULTA_EXTERNA'],"label"=>"CONSULTA EXTERNA","color"=>$colores[1]);
      
    echo json_encode($_array);

  //  echo "EXECUTE pr_colsulta_grafica_P '".$fk."'";
  }




function consultar_pacientes($fk_unidad)
{   
     $array=$this->con->getDatos("SELECT p.id,p.observaciones,p.fecha_ingreso,p.estado_paciente,p.no_expediente,ub.descripcion as ubicacion,c.nomenclatura as cama,ser.servicio from pacientes AS p
LEFT JOIN ubicaciones AS ub ON ub.id=p.fk_ubicacion
LEFT JOIN camas AS c ON c.id=p.fk_cama
LEFT JOIN servicios AS ser ON ser.id=c.fk_servicio WHERE p.fk_unidad_ingreso='".$fk_unidad."' AND publicado=1 AND p.fecha_egreso IS NULL ORDER BY(servicio) ASC");

     $_array=array();
     $i=0;
      $fecha_ingreso="";
     foreach ($array as $key)
      {  $i++;   
        if($key["fecha_ingreso"]==null) $fecha_ingreso="";
        else $fecha_ingreso=date_format($key["fecha_ingreso"], 'd-m-Y');
        $_array[]=array("id"=>$key['id'],"no_expediente"=>$key['no_expediente'],"cama"=>$key['cama'],"fecha_ingreso"=>$fecha_ingreso,"fecha_captura"=>date_format($key["fecha_captura"], 'd-m-Y'),"nombre"=>utf8_encode($key['nombre']),"edad"=>$key['edad'],"sexo"=>utf8_encode($key['sexo']),"nombre_unidad"=>utf8_encode($key['nombre_unidad']),"estado_paciente"=>utf8_encode($key['estado_paciente']),"fecha_egreso"=>date_format($key["fecha_egreso"], 'd-m-Y'),"ubicacion"=>$key['ubicacion'],"observaciones"=>utf8_encode($key['observaciones']),"servicio"=>utf8_encode($key['servicio']),"estatus"=>$key['estatus'],"paginas"=> $i);

      }
   echo json_encode($_array);
    
  }
  function consultar_pacientes22($fk_unidad)
{   
     $array=$this->con->getDatos("SELECT p.id,p.fecha_ingreso,p.fecha_egreso,p.fecha_captura,p.nombre,p.edad,p.sexo,ua.nombre AS nombre_unidad,ca.nomenclatura as cama,p.estado_paciente,p.fecha_egreso,p.observaciones,s.id as id_servicio,s.servicio as servicio,p.estatus,p.observaciones,ub.descripcion as ubicacion,p.no_expediente,p.publicado FROM pacientes AS p LEFT JOIN unidades_adm AS ua ON ua.id=fk_unidad_ingreso  LEFT JOIN servicios as s on s.id=p.fk_servicio_ingresa LEFT JOIN Camas as ca ON ca.id=p.fk_cama LEFT JOIN ubicaciones as ub ON ub.id=p.fk_ubicacion WHERE p.fk_unidad_ingreso='".$fk_unidad."'  AND p.fecha_egreso IS NULL ORDER BY(servicio) ASC");

     $_array=array();
     $i=0;
      $fecha_egreso="";
      $fecha_ingreso="";
     foreach ($array as $key)
      {  $i++;   
       
        if($key["fecha_egreso"]==null) $fecha_egreso="";
        else $fecha_egreso=date_format($key["fecha_egreso"], 'd-m-Y H:i:s');
        if($key["fecha_ingreso"]==null) $fecha_ingreso="";
        else $fecha_ingreso=date_format($key["fecha_ingreso"], 'd-m-Y H:i:s');
       
        $_array[]=array("id"=>$key['id'],"no_expediente"=>$key['no_expediente'],"cama"=>$key['cama'],"fecha_ingreso"=>$fecha_ingreso,"fecha_captura"=>date_format($key["fecha_captura"], 'd-m-Y H:i:s'),"nombre"=>utf8_encode($key['nombre']),"edad"=>$key['edad'],"sexo"=>utf8_encode($key['sexo']),"nombre_unidad"=>utf8_encode($key['nombre_unidad']),"estado_paciente"=>utf8_encode($key['estado_paciente']),"fecha_egreso"=>$fecha_egreso,"ubicacion"=>$key['ubicacion'],"observaciones"=>utf8_encode($key['observaciones']),"servicio"=>utf8_encode($key['servicio']),"estatus"=>$key['estatus'],'publicado'=>$key['publicado'],"paginas"=> $i);

      }
   echo json_encode($_array);
    
  }
  function consultar_pacientes_egresos()
  {   extract($_REQUEST);
      $fechas="";

      if(empty($fecha_inicial) or empty($fecha_final)) $fechas="";
      else $fechas=" AND fecha_ingreso>='".date('Y-d-m', strtotime($fecha_inicial))."' AND fecha_ingreso<='".date('Y-d-m', strtotime($fecha_final))."'";

      $array=$this->con->getDatos("SELECT p.id,p.fecha_ingreso,p.fecha_egreso,p.fecha_captura,p.nombre,p.edad,p.sexo,ua.nombre AS nombre_unidad,ca.nomenclatura as cama,p.estado_paciente,p.fecha_egreso,p.observaciones,s.id as id_servicio,s.servicio as servicio,p.estatus,p.observaciones,ub.descripcion as ubicacion,p.no_expediente FROM pacientes AS p LEFT JOIN unidades_adm AS ua ON ua.id=fk_unidad_ingreso  LEFT JOIN servicios as s on s.id=p.fk_servicio_ingresa LEFT JOIN Camas as ca ON ca.id=p.fk_cama LEFT JOIN ubicaciones as ub ON ub.id=p.fk_ubicacion WHERE p.fk_unidad_ingreso=".$_SESSION['fk_unidad_adm'].$fechas."  AND  p.fecha_egreso IS NOT NULL ORDER BY(servicio) ASC");

     $_array=array();
     $i=0;
      $fecha_egreso="";
      $fecha_ingreso="";
     foreach ($array as $key)
      {  $i++;   
        if($key["fecha_egreso"]==null) $fecha_egreso="";
        else $fecha_egreso=date_format($key["fecha_egreso"], 'd-m-Y');
        if($key["fecha_ingreso"]==null) $fecha_ingreso="";
        else $fecha_ingreso=date_format($key["fecha_ingreso"], 'd-m-Y');
        $_array[]=array("id"=>$key['id'],"no_expediente"=>$key['no_expediente'],"cama"=>$key['cama'],"fecha_ingreso"=>$fecha_ingreso,"fecha_captura"=>date_format($key["fecha_captura"], 'd-m-Y'),"nombre"=>utf8_encode($key['nombre']),"edad"=>$key['edad'],"sexo"=>utf8_encode($key['sexo']),"nombre_unidad"=>utf8_encode($key['nombre_unidad']),"estado_paciente"=>utf8_encode($key['estado_paciente']),"fecha_egreso"=>$fecha_egreso,"ubicacion"=>$key['ubicacion'],"observaciones"=>utf8_encode($key['observaciones']),"servicio"=>utf8_encode($key['servicio']),"estatus"=>$key['estatus'],"paginas"=> $i);

      }
   echo json_encode($_array);
  }

  function consultar_hora($fk_unidad)
  { 
    $r = $this->con->getDatos("SELECT MAX(fecha) as fecha  FROM bitacora_update as b LEFT JOIN usuarios AS u ON u.id=b.fk_usuario_update WHERE u.fk_unidad_adm=".$fk_unidad);

    return date_format($r[0]['fecha'], 'd-m-Y H:i:s A');
  }
  function consultar_servicios($fk_unidad) //*****
  {
  $array=$this->con->getDatos("SELECT s.servicio as servicio FROM pacientes AS p LEFT JOIN unidades_adm AS ua ON ua.id=fk_unidad_ingreso  
                    LEFT JOIN servicios as s on s.id=p.fk_servicio_ingresa WHERE p.fk_unidad_ingreso='".$fk_unidad."' AND publicado=1 GROUP BY(servicio) ORDER BY(servicio) ASC");

     $_array=array();
     foreach ($array as $key)
      {  
        $_array[]=array("servicio"=>utf8_encode($key['servicio']));
          
      }
   echo json_encode($_array);
  }
  public function habilitar_P($id,$estatus)
   {  
       $ishabilitado=0;
      if($estatus=="true")$ishabilitado=1; 
      else $ishabilitado=0;
     echo "UPDATE pacientes SET publicado='".$ishabilitado."' WHERE id=".$id;
      $this->con->setDatos("UPDATE pacientes SET publicado='".$ishabilitado."' WHERE id=".$id);


   }

public function deshacer_egreso($id)
{
  $this->con->setDatos("UPDATE pacientes SET fecha_egreso=NULL WHERE id=".$id);
 
}
        
  function guardar_marque($id_unidad,$marquetex)
  {
   $this->con->setDatos("UPDATE marquee SET descripcion='".$marquetex."'  WHERE fk_unidad=".$id_unidad);
    $array=$this->con->getDatos("SELECT * FROM marquee WHERE fk_unidad=".$id_unidad);
    $_array=array();
    foreach ($array as $key)
      {  
        $_array[]=array("descripcion"=>utf8_encode($key['descripcion']));
          
      }
    echo json_encode($_array);

 }
  function guardar_servicio()//******
  { extract($_REQUEST);
   
   if($id_servicio==null)
    { 
      echo( $this->con->setDatos("INSERT INTO servicios (servicio,fk_unidad) VALUES('".$nombre."',".$_SESSION['fk_unidad_adm'].")") ?  "GUARDAR": "ERROR" );
    }
    else
    {
       echo ($this->con->setDatos("UPDATE servicios SET servicio='".$nombre."' WHERE  id=".$id_servicio)  ?  "GUARDAR": "ERROR");
    }
  
 }
  function guardar_cama() //*******
  { extract($_REQUEST);
   
   if($id_cama==null)
    { 
      echo( $this->con->setDatos("INSERT INTO camas (consecutivo,nomenclatura,fk_unidad_adm,disponible,censable,fk_servicio) VALUES(".$consecutivo.",'".$nomenclatura."',".$_SESSION['fk_unidad_adm'].",1,".$censable.",".$fk_servicio.")") ?  "GUARDAR": "ERROR" );
    }
    else
    {
       echo ($this->con->setDatos("UPDATE camas SET nomenclatura='".$nomenclatura."',fk_unidad_adm=".$_SESSION['fk_unidad_adm'].", censable=".$censable.",fk_servicio=".$fk_servicio." WHERE id=".$id_cama)  ?  "GUARDAR": "ERROR");
    }
  
 }
  function guardar_ubicacion()
  { extract($_REQUEST);
   
   if($id_servicio==null)
    { 
      echo( $this->con->setDatos("INSERT INTO ubicaciones (descripcion,fk_unidad_adm) VALUES('".$descripcion."',".$_SESSION['fk_unidad_adm'].")") ?  "GUARDAR": "ERROR" );


    }
    else
    {
       echo ($this->con->setDatos("UPDATE ubicaciones SET servicio='".$nombre."',fk_unidad_adm=".$_SESSION['fk_unidad_adm'])  ?  "GUARDAR": "ERROR");
    }
  
 }
 function consultar_marque($id_unidad)
 { $array=$this->con->getDatos("SELECT * FROM marquee WHERE fk_unidad=".$id_unidad);  
     return $array[0]['descripcion'];
          

 }
  function consultar_video($id_unidad)
 { $this->siguiente_video($id_unidad);
   $conexion5= new conexion();
    $array5=$conexion5->getDatos("SELECT * FROM videos WHERE fk_unidad=".$id_unidad." AND estatus=1");  
     return $array5[0]['nombre'];
     
 }
 function siguiente_video($id_unidad)
 {    
   $conexion1 = new conexion();
   $conexion2 = new conexion();
   $conexion3= new conexion();
     $array=$conexion1->getDatos("SELECT * FROM videos WHERE fk_unidad=".$id_unidad." AND estatus=1");  
       $id_video=$array[0]['id'];

         $array2=$conexion2->getDatos("SELECT MAX(id) as id FROM videos WHERE  fk_unidad=".$id_unidad);  
        $id_video_ultimo=$array2[0]['id'];

        $array3=$conexion3->getDatos("SELECT MIN(id) as id FROM videos WHERE  fk_unidad=".$id_unidad);  
        $id_video_primero=$array3[0]['id'];
  
     if(!empty($id_video))
      {  
      
       
       if ($id_video < $id_video_ultimo)
         {  $this->con->setDatos("UPDATE videos SET estatus=0 WHERE fk_unidad=".$id_unidad." AND id=".($id_video));
          
            $this->con->setDatos("UPDATE videos SET estatus=1 WHERE fk_unidad=".$id_unidad." AND id=".$this->getIdVideo($id_video+1,$id_unidad));
         }
  
      else
         {  $this->con->setDatos("UPDATE videos SET estatus=0 WHERE fk_unidad=".$id_unidad);
            $this->con->setDatos("UPDATE videos SET estatus=1 WHERE fk_unidad=".$id_unidad." AND id=".$id_video_primero);

         }

       }
       else
       {
           $this->con->setDatos("UPDATE videos SET estatus=0 WHERE fk_unidad=".$id_unidad);
           $this->con->setDatos("UPDATE videos SET estatus=1 WHERE fk_unidad=".$id_unidad." AND id=".$id_video_primero);
       }

 }
public function getIdVideo($id,$id_unidad)
{   $i=0;
    $id_vi=$id;
    $id_real=0;
    $conexion4=new conexion();
    $conexion7=new conexion();
    $array4=$conexion4->getDatos("SELECT * FROM videos WHERE  id=".$id_vi);  
    $unidad=$array4[0]['fk_unidad'];
    if($unidad==$id_unidad) return $array4[0]['id'];
    else 
      {  do{
             $array7=$conexion7->getDatos("SELECT * FROM videos WHERE  id=".($id_vi+$i));          
             $id_real=$array7[0]['id'];
             $i++;
         }
         while($array7[0]['fk_unidad']!=$id_unidad);
           

      }
      return  $id_real;
 
}
 public function eliminar_servicio($id){ //****
    $this->con->setDatos("DELETE  FROM servicios WHERE id=".$id);

}

 public function eliminar_cama($id){
    $this->con->setDatos("DELETE  FROM camas WHERE id=".$id); //****
}
 public function habilitar_cama($id){
    $this->con->setDatos("UPDATE camas SET disponible=1 WHERE id=".$id);
}
public function deshabilitar_cama($id){
    $this->con->setDatos("UPDATE camas SET disponible=0 WHERE id=".$id);
}
public function eliminar_ubicacion($id){
    $this->con->setDatos("DELETE  FROM ubicaciones WHERE id=".$id);
}
 function consultar_cama() //*******
  { extract($_REQUEST);
    $rs=$this->con->getDatos("SELECT * FROM camas WHERE fk_unidad_adm=".$_SESSION['fk_unidad_adm']." AND id=".$id);
     $_array=array("nomenclatura"=>utf8_encode($rs[0]['nomenclatura']),"censable"=>$rs[0]['censable'],"fk_servicio"=>$rs[0]['fk_servicio'],"consecutivo"=>$rs[0]['consecutivo']);
 
    echo json_encode($_array);
  }
 function consultar_camas_disponibles()
  { extract($_REQUEST);
    $variable=$this->con->getDatos("SELECT * FROM camas WHERE fk_unidad_adm=".$_SESSION['fk_unidad_adm']." AND fk_servicio=".$fk_servicio." AND disponible=1");
     foreach ($variable as $key) {
        $_array[]=array("id"=>$key['id'],"nomenclatura"=>utf8_encode($key['nomenclatura']));
     }
    
 
    echo json_encode($_array);

 }


}

?>