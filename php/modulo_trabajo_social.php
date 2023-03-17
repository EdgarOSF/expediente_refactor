<?php 
ini_set('display_errors', 0);
session_start();
include_once 'conexion.php';
class modulo_trabajo_social
{  
  public $con2,$con3,$con,$conplus;
	public $ap_p,$ap_m,$fk_unidad_ingreso,$fk_usuario,$id,$fecha_elaboracion,$folio_sp,$unidad_referencia,$nombre,$no_expediente,$servicio_ingreso,$diagnostico_egreso,$edad,$sexo,$estado_civil,$religion,$curp,$eaphic,$cual,$fecha_nacimiento,$lugar_nacimineto,$hali,$cual1,$escolaridad,$fk_ocupacion_p,$domicilio_actual,$referencia_domiciliaria,$telefono,$derecho_habiente,$fk_unidad_p,$nucleo_basico,$caso_medico_legal,$donacion_sangre,$folio,$fk_datos_informante,$fk_datos_responsable,$descripcion,$fk_especialidad;
  public $id_informante,$informante,$nombre_informante,$edad_informante,$parentesco,$sexo_informante,$ocupacion_informante,$telefono_informante,$iqgif;
  public $id_exportar_1,$id_responsable, $v_p,$v_m, $nombre_responsable,$edad_responsable,$parentesco_responsable,$escolaridad_responsable,$religion_responsable,$telefono_responsable,$fk_ocupacion,$lugar_trabajo,$direccion_responsable,$hali_responsable,$cual2,$nombre_padre_resp,$edad_padre,$religion_padre,$estado_civil_padre,$telefono_padre,$nombre_madre,$edad_madre,$religion_madre,$estado_civil_madre,$telefono_madre,$hali_madre,$cual3,$no_int_familia,$i_m_total; 
   public function modulo_trabajo_social()
   {   
   	$this->con = new conexion();
    $this->con2 = new conexion();
    $this->con3 = new conexion();
    $this->conplus = new conexion();
   }
   public function getDatos2(){ 
    extract($_REQUEST);

      if(isset($id))$this->id=$id; 
      $this->fk_usuario=$fk_usuario; 
      $this->fk_usuario=$fk_usuario; 
      $this->fk_unidad_ingreso=$fk_unidad_ingreso; 
      $this->fecha_elaboracion=date("Y-m-d H:i:s");

 if(empty($iqgif))
       $this->iqgif='NULL';
        else  $this->iqgif=$iqgif;
   
      if(empty($fk_especialidad))
        $this->fk_especialidad='NULL';
      else  $this->fk_especialidad=$fk_especialidad;
 
      if(isset($ap_p))$this->ap_p=$ap_p;
      if(isset($ap_m))$this->ap_m=$ap_m;   
   	  if(isset($folio_sp))$this->folio_sp=$folio_sp;
      
       if(empty($unidad_referencia))
       $this->unidad_referencia='NULL';
        else  $this->unidad_referencia=$unidad_referencia;
   


   	  if(isset($nombre))$this->nombre=$nombre;
   	  if(isset($no_expediente))$this->no_expediente=$no_expediente;
      if(isset($servicio_ingreso))$this->servicio_ingreso=$servicio_ingreso;
     
 
      if(isset($diagnostico_egreso))$this->diagnostico_egreso=$diagnostico_egreso;
      if(isset($edad))$this->edad=$edad;
      if(isset($sexo))$this->sexo=$sexo;
      if(isset($estado_civil))$this->estado_civil=$estado_civil;
      if(isset($religion))$this->religion=$religion;
      if(isset($curp))$this->curp=$curp;
      if(isset($eaphic))$this->eaphic=$eaphic;
      if(isset($cual))$this->cual=$cual;
      if(isset($fecha_nacimiento))$this->fecha_nacimiento=$fecha_nacimiento;
      if(isset($lugar_nacimineto))$this->lugar_nacimineto=$lugar_nacimineto;
      if(isset($hali))$this->hali=$hali;
      if(isset($cual1))$this->cual1=$cual1;
      

       if(empty($escolaridad))
       $this->escolaridad='NULL';
        else  $this->escolaridad=$escolaridad;
     
      if(empty($fk_ocupacion_p))
       $this->fk_ocupacion_p='NULL';
        else  $this->fk_ocupacion_p=$fk_ocupacion_p;

      if(isset($domicilio_actual))$this->domicilio_actual=$domicilio_actual;
      if(isset($referencia_domiciliaria))$this->referencia_domiciliaria=$referencia_domiciliaria;
      if(isset($telefono))$this->telefono=$telefono;
      if(isset($derecho_habiente))$this->derecho_habiente=$derecho_habiente;

      if(empty($fk_unidad_p))
        $this->fk_unidad_p='NULL';
      else  $this->fk_unidad_p=$fk_unidad_p;

      if(isset($nucleo_basico))$this->nucleo_basico=$nucleo_basico;
      if(isset($caso_medico_legal))$this->caso_medico_legal=$caso_medico_legal;
      if(isset($donacion_sangre))$this->donacion_sangre=$donacion_sangre;
      if(isset($folio))$this->folio=$folio;

      //datos del informante
      if(isset($id_informante))$this->id_informante=$id_informante;

      if(isset($nombre_informante))$this->nombre_informante=$nombre_informante;
      if(isset($edad_informante))$this->edad_informante=$edad_informante;
 
       if(isset($ocupacion_informante))$this->ocupacion_informante=$ocupacion_informante;
       if(isset($telefono_informante))$this->telefono_informante=$telefono_informante;
       if(isset($informante))$this->informante=$informante;
      if(isset($sexo_informante))$this->sexo_informante=$sexo_informante;
      if(isset($parentesco))$this->parentesco=$parentesco;
      

      
      //datos del responsable
      if(isset($id_responsable))$this->id_responsable=$id_responsable;
      if(isset($nombre_responsable))$this->nombre_responsable=$nombre_responsable; 
      if(isset($edad_responsable))$this->edad_responsable=$edad_responsable;   
      if(isset($parentesco_responsable))$this->parentesco_responsable=$parentesco_responsable;   
     

       if(empty($escolaridad_responsable))
       $this->escolaridad_responsable='NULL';
        else  $this->escolaridad_responsable=$escolaridad_responsable;
   
      if(isset($religion_responsable))$this->religion_responsable=$religion_responsable;   
      if(isset($telefono_responsable))$this->telefono_responsable=$telefono_responsable;   
      
    if(empty($fk_ocupacion))
       $this->fk_ocupacion='NULL';
        else  $this->fk_ocupacion=$fk_ocupacion;

      if(isset($lugar_trabajo))$this->lugar_trabajo=$lugar_trabajo;              
      if(isset($direccion_responsable))$this->direccion_responsable=$direccion_responsable;   
      if(isset($hali_responsable))$this->hali_responsable=$hali_responsable; 
      if(isset($cual2))$this->cual2=$cual2;   
      if(isset($nombre_padre_resp))$this->nombre_padre_resp=$nombre_padre_resp;   
      if(isset($edad_padre))$this->edad_padre=$edad_padre; 
      if(isset($religion_padre))$this->religion_padre=$religion_padre;  
      if(isset($estado_civil_padre))$this->estado_civil_padre=$estado_civil_padre;  
      if(isset($telefono_padre))$this->telefono_padre=$telefono_padre;      
      if(isset($nombre_madre))$this->nombre_madre=$nombre_madre;  
      if(isset($edad_madre))$this->edad_madre=$edad_madre; 
      if(isset($religion_madre))$this->religion_madre=$religion_madre; 
      if(isset($estado_civil_madre))$this->estado_civil_madre=$estado_civil_madre; 
      if(isset($telefono_madre))$this->telefono_madre=$telefono_madre; 
      if(isset($hali_madre))$this->hali_madre=$hali_madre; 
      if(isset($cual3)) $this->cual3=$cual3; 
      if(isset($no_int_familia))$this->no_int_familia=$no_int_familia; 
      if(isset($v_p))$this->v_p=$v_p; 
      if(isset($v_m))$this->v_m=$v_m; 
      if(isset($descripcion))$this->descripcion=$descripcion;
    
   }
 
   public function guardar_paciente2(){
	  $this->getDatos2();

    if($this->id==null)
    {   
       echo($this->conplus->setDatos("insert into pacientes (fecha_elaboracion,folio_sp,unidad_referencia,nombre,no_expediente,servicio_ingreso,diagnostico_egreso,edad,sexo,estado_civil,religion,curp,eaphic,cual,fecha_nacimiento,lugar_nacimineto,hali,cual1,escolaridad,fk_ocupacion_p,domicilio_actual,referencia_domiciliaria,telefono,derecho_habiente,fk_unidad_P,nucleo_basico,caso_medico_legal,donacion_sangre,folio,fk_usuario,fk_unidad_ingreso,ap_p,ap_m,descripcion,fk_especialidad,iqgif) values (GETDATE(),'".$this->folio_sp."','".$this->unidad_referencia."','".utf8_decode($this->nombre)."','".$this->no_expediente."','".utf8_decode($this->servicio_ingreso)."','".utf8_decode($this->diagnostico_egreso)."','".$this->edad."','".$this->sexo."','".utf8_decode($this->estado_civil)."','".utf8_decode($this->religion)."','".$this->curp."','".$this->eaphic."','".utf8_decode($this->cual)."','".$this->fecha_nacimiento."','".utf8_decode($this->lugar_nacimineto)."','".$this->hali."','".utf8_decode($this->cual1)."','".utf8_decode($this->escolaridad)."',".$this->fk_ocupacion_p.",'".utf8_decode($this->domicilio_actual)."','".utf8_decode($this->referencia_domiciliaria)."','".$this->telefono."','".$this->derecho_habiente."',".$this->fk_unidad_p.",'".utf8_decode($this->nucleo_basico)."','".$this->caso_medico_legal."','".$this->donacion_sangre."','".$this->folio."',".$this->fk_usuario.",".$this->fk_unidad_ingreso.",'".utf8_decode($this->ap_p)."','".utf8_decode($this->ap_m)."','".$this->descripcion."',".$this->fk_especialidad.",".$this->iqgif.")") ? "GUARDAR" : "ERROR");
              $valor2=$this->conplus->getDatos("SELECT @@IDENTITY AS id");
              $id_paciente1 = $valor2[0]['id'];

            $this->con->setDatos("insert into datos_responsable (nombre_responsable,edad_responsable,parentesco_responsable,escolaridad_responsable,religion_responsable,telefono_responsable,fk_ocupacion,lugar_trabajo,direccion_responsable,hali_responsable,cual2,nombre_padre_resp,edad_padre,religion_padre,estado_civil_padre,telefono_padre,nombre_madre,edad_madre,religion_madre,estado_civil_madre,telefono_madre,hali_madre,cual3,no_int_familia,status,v_p,v_m) values ('".$this->nombre_responsable."','".$this->edad_responsable."','".utf8_decode($this->parentesco_responsable)."','".utf8_decode($this->escolaridad_responsable)."','".utf8_decode($this->religion_responsable)."','".$this->telefono_responsable."',".$this->fk_ocupacion.",'".utf8_decode($this->lugar_trabajo)."','".utf8_decode($this->direccion_responsable)."','".$this->hali_responsable."','".utf8_decode($this->cual2)."','".utf8_decode($this->nombre_padre_resp)."','".$this->edad_padre."','".utf8_decode($this->religion_padre)."','".utf8_decode($this->estado_civil_padre)."','".utf8_decode($this->telefono_padre)."','".utf8_decode($this->nombre_madre)."','".$this->edad_madre."','".utf8_decode($this->religion_madre)."','".utf8_decode($this->estado_civil_madre)."','".$this->telefono_madre."','".utf8_decode($this->hali_madre)."','".$this->cual3."','".$this->no_int_familia."',0,'".$this->v_p."','".$this->v_m."')");
               $valor3=$this->con->getDatos("SELECT @@IDENTITY AS id");
              $fk_datos_responsable1 = $valor3[0]['id'];

            $this->con->setDatos("insert into datos_informante (nombre_informante,edad_informante,parentesco,sexo_informante,ocupacion_informante,telefono_informante) values ('".utf8_decode($this->nombre_informante)."','".$this->edad_informante."','".utf8_decode($this->parentesco)."','".$this->sexo_informante."','".utf8_decode($this->ocupacion_informante)."','".$this->telefono_informante."')"); 
              $valor=$this->con->getDatos("SELECT @@IDENTITY AS id");
              $fk_datos_informante1 = $valor[0]['id'];

              $this->con->setDatos("UPDATE pacientes SET fk_datos_responsable=".$fk_datos_responsable1." , fk_datos_informante=".$fk_datos_informante1." WHERE id=".$id_paciente1);  

     }
     else
    {

    echo($this->con->setDatos("UPDATE pacientes SET folio_sp='".$this->folio_sp."',unidad_referencia='".utf8_decode($this->unidad_referencia)."',nombre='".utf8_decode($this->nombre)."',no_expediente='".$this->no_expediente."',servicio_ingreso='".utf8_decode($this->servicio_ingreso)."',diagnostico_egreso='".utf8_decode($this->diagnostico_egreso)."',edad='".$this->edad."',sexo='".$this->sexo."',estado_civil='".utf8_decode($this->estado_civil)."',religion='".utf8_decode($this->religion)."',curp='".utf8_decode($this->curp)."',eaphic='".$this->eaphic."',cual='".utf8_decode($this->cual)."',fecha_nacimiento='".$this->fecha_nacimiento."',lugar_nacimineto='".utf8_decode($this->lugar_nacimineto)."',hali='".$this->hali."',cual1='".utf8_decode($this->cual1)."',escolaridad='".utf8_decode($this->escolaridad)."',fk_ocupacion_p=".$this->fk_ocupacion_p.",referencia_domiciliaria='".utf8_decode($this->referencia_domiciliaria)."',telefono='".$this->telefono."',derecho_habiente='".$this->derecho_habiente."',fk_unidad_p=".$this->fk_unidad_p.",nucleo_basico='".$this->nucleo_basico."',caso_medico_legal='".$this->caso_medico_legal."',donacion_sangre='".$this->donacion_sangre."',folio='".$this->folio."' ,fk_usuario=".$this->fk_usuario.",fk_unidad_ingreso=".$this->fk_unidad_ingreso.",ap_p='".utf8_decode($this->ap_p)."',ap_m='".utf8_decode($this->ap_m)."',domicilio_actual='".utf8_decode($this->domicilio_actual)."',fk_especialidad=".$this->fk_especialidad.",iqgif=".$this->iqgif." WHERE id=".$this->id)  ? "GUARDAR" : "ERROR");
    $this->con->setDatos("UPDATE datos_responsable SET nombre_responsable='".utf8_decode($this->nombre_responsable)."',edad_responsable='".$this->edad_responsable."',parentesco_responsable='".utf8_decode($this->parentesco_responsable)."',escolaridad_responsable='".utf8_decode($this->escolaridad_responsable)."',religion_responsable='".utf8_decode($this->religion_responsable)."',telefono_responsable='".$this->telefono_responsable."',fk_ocupacion=".$this->fk_ocupacion.",lugar_trabajo='".utf8_decode($this->lugar_trabajo)."',direccion_responsable='".utf8_decode($this->direccion_responsable)."',hali_responsable='".$this->hali_responsable."',cual2='".utf8_decode($this->cual2)."',nombre_padre_resp='".utf8_decode($this->nombre_padre_resp)."',edad_padre='".$this->edad_padre."',religion_padre='".utf8_decode($this->religion_padre)."',estado_civil_padre='".utf8_decode($this->estado_civil_padre)."',telefono_padre='".$this->telefono_madre."',nombre_madre='".utf8_decode($this->nombre_madre)."',edad_madre='".$this->edad_madre."',religion_madre='".utf8_decode($this->religion_madre)."',estado_civil_madre='".utf8_decode($this->estado_civil_madre)."',telefono_madre='".$this->telefono_madre."',hali_madre='".$this->hali_madre."',cual3='".utf8_decode($this->cual3)."',no_int_familia=".$this->no_int_familia.",v_p='".$this->v_p."',v_m='".$this->v_m."' WHERE id=".$this->id_responsable) ;
    $this->con->setDatos("UPDATE datos_informante SET nombre_informante='".utf8_decode($this->nombre_informante)."' , edad_informante='".$this->edad_informante."' , parentesco='".utf8_decode($this->parentesco)."', sexo_informante='".$this->sexo_informante."', ocupacion_informante='".utf8_decode($this->ocupacion_informante)."' , telefono_informante='".$this->telefono_informante."' WHERE id=".$this->id_informante);
     }
   
   }

public function consultar_paciente_ts($id)
{ 

 $array=$this->con->getDatos("SELECT p.id, p.fecha_elaboracion, p.folio_sp, p.unidad_referencia, p.nombre,p.ap_p,p.ap_m,p.no_expediente,p.servicio_ingreso,p.fk_especialidad, p.diagnostico_egreso, p.edad,p.sexo, p.estado_civil, p.religion, p.curp, p.eaphic,p.cual, p.fecha_nacimiento,p.lugar_nacimineto,p.hali,p.cual1,p.escolaridad,p.fk_ocupacion_p,o.ocupacion,p.domicilio_actual,p.referencia_domiciliaria,p.telefono,p.derecho_habiente,p.fk_unidad_p,ua.nombre AS nombre_unidad,p.nucleo_basico,p.caso_medico_legal,p.donacion_sangre,p.folio, di.id AS id_informante, di.nombre_informante, di.edad_informante, di.parentesco, di.sexo_informante, di.ocupacion_informante, di.telefono_informante, dr.id AS id_responsable,dr.nombre_responsable, dr.edad_responsable,dr.parentesco_responsable,dr.escolaridad_responsable,dr.religion_responsable,dr.telefono_responsable, ocu.id as ocupacion_responsable,t_oc.puntos,t_oc2.puntos as puntos_paciente, dr.lugar_trabajo,dr.direccion_responsable,dr.hali_responsable,dr.cual2,dr.nombre_padre_resp,dr.edad_padre,dr.religion_padre,dr.estado_civil_padre,dr.telefono_padre,dr.nombre_madre,dr.edad_madre,dr.religion_madre,dr.estado_civil_madre,dr.telefono_madre,dr.hali_madre,dr.cual3,dr.no_int_familia,dr.v_p,dr.v_m,dr.fk_salud_familiar,p.descripcion,p.iqgif FROM pacientes AS p LEFT JOIN  unidades_adm AS ua ON ua.id=fk_unidad_P LEFT JOIN ocupaciones as o ON o.id=fk_ocupacion_p  LEFT JOIN datos_informante AS di ON di.id=fk_datos_informante LEFT JOIN datos_responsable AS dr ON dr.id=fk_datos_responsable LEFT JOIN ocupaciones as ocu ON ocu.id=fk_ocupacion LEFT JOIN tipos_ocupaciones as t_oc ON t_oc.id=ocu.fk_tipos_ocupaciones   LEFT JOIN tipos_ocupaciones as t_oc2 ON t_oc2.id=o.fk_tipos_ocupaciones WHERE p.id=".$id);
  foreach ($array as $key) {
      $fecha_elaboracion="";
      if(isset($key["fecha_elaboracion"]))
          $fecha_elaboracion=date_format($key["fecha_elaboracion"], 'Y-m-d');
           $fecha_nacimiento="";
      if(isset($key["fecha_nacimiento"]))
          $fecha_nacimiento=date_format($key["fecha_nacimiento"], 'Y-m-d');
         $this->no_int_familia=$key['no_int_familia'];

         $_array=array("id"=>$key['id'],"fecha_elaboracion"=>$fecha_elaboracion,"folio_sp"=>$key['folio_sp'],"unidad_referencia"=>utf8_encode($key['unidad_referencia']),"nombre"=>utf8_encode($key['nombre']),"ap_p"=>utf8_encode($key['ap_p']),"ap_m"=>utf8_encode($key['ap_m']),"no_expediente"=>$key['no_expediente'],"servicio_ingreso"=>utf8_encode($key['servicio_ingreso']),"fk_especialidad"=>$key['fk_especialidad'],"diagnostico_egreso"=>utf8_encode($key['diagnostico_egreso']),"edad"=>$key['edad'],"sexo"=>$key['sexo'],"estado_civil"=>utf8_encode($key['estado_civil']),"religion"=>utf8_encode($key['religion']),"curp"=>$key['curp'],"eaphic"=>$key['eaphic'],"cual"=>utf8_encode($key['cual']),"fecha_nacimiento"=>$fecha_nacimiento,"lugar_nacimineto"=>utf8_encode($key['lugar_nacimineto']),"hali"=>$key['hali'],"cual1"=>utf8_encode($key['cual1']),"escolaridad"=>utf8_encode($key['escolaridad']),"domicilio_actual"=>utf8_encode($key['domicilio_actual']),"referencia_domiciliaria"=>utf8_encode($key['referencia_domiciliaria']),"telefono"=>$key['telefono'],"derecho_habiente"=>utf8_encode($key['derecho_habiente']),"nombre_unidad"=>utf8_decode($key['nombre_unidad']),"nucleo_basico"=>utf8_encode($key['nucleo_basico']),"caso_medico_legal"=>$key['caso_medico_legal'],"donacion_sangre"=>$key['donacion_sangre'],"folio"=>$key['folio'],"id_informante"=>$key['id_informante'],"nombre_informante"=>utf8_encode($key['nombre_informante']),"edad_informante"=>$key['edad_informante'],"parentesco"=>utf8_encode($key['parentesco']),"sexo_informante"=>$key['sexo_informante'],"ocupacion_informante"=>utf8_encode($key['ocupacion_informante']),"telefono_informante"=>$key['telefono_informante'],"id_responsable"=>$key['id_responsable'],"nombre_responsable"=>utf8_encode($key['nombre_responsable']),"edad_responsable"=>$key['edad_responsable'],"parentesco_responsable"=>utf8_encode($key['parentesco_responsable']),"escolaridad_responsable"=>utf8_encode($key['escolaridad_responsable']),"religion_responsable"=>utf8_encode($key['religion_responsable']),"telefono_responsable"=>$key['telefono_responsable'],"ocupacion_responsable"=>utf8_encode($key['ocupacion_responsable']),"lugar_trabajo"=>utf8_encode($key['lugar_trabajo']),"direccion_responsable"=>utf8_encode($key['direccion_responsable']),"hali_responsable"=>$key['hali_responsable'],"cual2"=>utf8_encode($key['cual2']),"nombre_padre_resp"=>utf8_encode($key['nombre_padre_resp']),"edad_padre"=>$key['edad_padre'],"religion_padre"=>utf8_encode($key['religion_padre']),"estado_civil_padre"=>utf8_encode($key['estado_civil_padre']),"telefono_padre"=>$key['telefono_padre'],"nombre_madre"=>utf8_encode($key['nombre_madre']),"edad_madre"=>$key['edad_madre'],"religion_madre"=>utf8_encode($key['religion_madre']),"estado_civil_madre"=>utf8_encode($key['estado_civil_madre']),"telefono_madre"=>$key['telefono_madre'],"hali_madre"=>$key['hali_madre'],"cual3"=>utf8_encode($key['cual3']),"no_int_familia"=>$key['no_int_familia'],"puntos"=>$key['puntos'],"fk_salud_familiar"=>$key['fk_salud_familiar'],"v_p"=>$key['v_p'],"v_m"=>$key['v_m'],"fk_unidad_p"=>$key['fk_unidad_p'],"fk_ocupacion_p"=>$key['fk_ocupacion_p'],"descripcion"=>utf8_encode($key['descripcion']),"puntos_paciente"=>$key['puntos_paciente'],"iqgif"=>$key['iqgif']); 
     
   }

   echo  json_encode($_array);
}

public function consultar_paciente_poderacion($id)
{
  $array=$this->con->getDatos("SELECT p.id,p.fk_ocupacion_p,o.ocupacion, dr.id AS id_responsable,dr.telefono_responsable, ocu.id as ocupacion_responsable,t_oc.puntos,t_oc2.puntos as puntos_paciente,dr.no_int_familia,dr.v_p,dr.v_m,dr.fk_salud_familiar,sf.esif,sf.esif_op_i,sf.esif_ttep,sf.esif_total,sf.id as id_sm,v.id as id_vivienda, v.cv_d_r_v,v.cv_tv,v.cv_sp,v.cv_si,v.cv_mc,v.cv_nd,v.cv_npd,v.cv_total,ef.id AS id_egreso,ef.i_m_j_f, ef.i_m_esposo,ef.i_m_hijo,ef.otros_apoyos,ef.i_m_otros,ef.i_alimentacion,ef.i_renta_predial,ef.i_agua,ef.i_luz,ef.i_combustible,ef.i_trasporte,ef.i_eduacion,ef.i_total,ef.total_regla,ef.i_m_total,ef.p_total_e,pg.id as id_pg ,pg.p_g_ig,pg.p_g_eg,pg.p_g_v,pg.p_g_s,pg.p_g_o,pg.p_g_total,pg.p_g_total,pg.nombre_ts,pg.cedula_ts,pg.diag_ts,pg.r_m_ts,p.descripcion,p.iqgif FROM pacientes AS p LEFT JOIN  unidades_adm AS ua ON ua.id=fk_unidad_P LEFT JOIN ocupaciones as o ON o.id=fk_ocupacion_p  LEFT JOIN datos_responsable AS dr ON dr.id=fk_datos_responsable LEFT JOIN ocupaciones as ocu ON ocu.id=fk_ocupacion LEFT JOIN tipos_ocupaciones as t_oc ON t_oc.id=ocu.fk_tipos_ocupaciones LEFT JOIN salud_familiar as sf on sf.id=dr.fk_salud_familiar LEFT JOIN vivienda as v ON v.id=dr.fk_vivienda LEFT JOIN egreso_familiar as ef on ef.id=dr.fk_ingreso_familiar LEFT JOIN puntos_generales as pg on pg.id=dr.fk_puntos_generales LEFT JOIN tipos_ocupaciones as t_oc2 ON t_oc2.id=o.fk_tipos_ocupaciones WHERE p.id=".$id);

  foreach ($array as $key) {
      $fecha_elaboracion="";
      if(isset($key["fecha_elaboracion"]))
          $fecha_elaboracion=date_format($key["fecha_elaboracion"], 'Y-m-d');
           $fecha_nacimiento="";
      if(isset($key["fecha_nacimiento"]))
          $fecha_nacimiento=date_format($key["fecha_nacimiento"], 'Y-m-d');
         $this->no_int_familia=$key['no_int_familia'];
         $this->i_m_total=$key['i_m_total'];
     if( $this->no_int_familia!=null && $this->i_m_total!=null)
       { 
         
 
 $_array=array("id_check"=>$this->puntos_ingresos(),"stat"=>true,"id"=>$key['id'],"id_responsable"=>$key['id_responsable'],"ocupacion_responsable"=>utf8_encode($ey['ocupacion_responsable']),"no_int_familia"=>$key['no_int_familia'],"puntos"=>$key['puntos'],"fk_salud_familiar"=>$key['fk_salud_familiar'],"esif"=>$key['esif'],"esif_op_i"=>$key['esif_op_i'],"esif_ttep"=>$key['esif_ttep'],"esif_total"=>$key['esif_total'],"id_vivienda"=>$key['id_vivienda'],"cv_d_r_v"=>$key['cv_d_r_v'],"cv_tv"=>$key['cv_tv'],"cv_sp"=>$key['cv_sp'],"cv_si"=>$key['cv_si'],"cv_mc"=>$key['cv_mc'],"cv_nd"=>$key['cv_nd'],"cv_npd"=>$key['cv_npd'],"cv_total"=>$key['cv_total'],"id_egreso"=>$key['id_egreso'],"i_m_j_f"=>$key['i_m_j_f'],"i_m_esposo"=>$key['i_m_esposo'],"i_m_hijo"=>$key['i_m_hijo'],"otros_apoyos"=>$key['otros_apoyos'],"i_m_otros"=>$key['i_m_otros'],"i_alimentacion"=>$key['i_alimentacion'],"i_renta_predial"=>$key['i_renta_predial'],"i_agua"=>$key['i_agua'],"i_luz"=>$key['i_luz'],"i_combustible"=>$key['i_combustible'],"i_trasporte"=>$key['i_trasporte'],"i_eduacion"=>$key['i_eduacion'],"i_total"=>$key['i_total'],"total_regla"=>$key['total_regla'],"i_m_total"=>$key['i_m_total'],"id_pg"=>$key['id_pg'],"p_g_ig"=>$key['p_g_ig'],"p_g_eg"=>$key['p_g_eg'],"p_g_v"=>$key['p_g_v'],"p_g_s"=>$key['p_g_s'],"p_g_o"=>$key['p_g_o'],"p_g_total"=>$key['p_g_total'],"nombre_ts"=>utf8_encode($key['nombre_ts']),"cedula_ts"=>utf8_encode($key['cedula_ts']),"diag_ts"=>utf8_encode($key['diag_ts']),"r_m_ts"=>utf8_encode($key['r_m_ts']),"p_total_e"=>$key['p_total_e'],"v_p"=>$key['v_p'],"v_m"=>$key['v_m'],"fk_ocupacion_p"=>$key['fk_ocupacion_p'],"descripcion"=>utf8_encode($key['descripcion']),"id_sm"=>$key['id_sm'],"puntos_paciente"=>$key['puntos_paciente'],"iqgif"=>$key['iqgif']); 
      
       }
       else {

$_array=array("id_check"=>"","stat"=>false,"id"=>$key['id'],"id_responsable"=>$key['id_responsable'],"ocupacion_responsable"=>utf8_encode($key['ocupacion_responsable']),"no_int_familia"=>$key['no_int_familia'],"puntos"=>$key['puntos'],"fk_salud_familiar"=>$key['fk_salud_familiar'],"esif"=>$key['esif'],"esif_op_i"=>$key['esif_op_i'],"esif_ttep"=>$key['esif_ttep'],"esif_total"=>$key['esif_total'],"id_vivienda"=>$key['id_vivienda'],"cv_d_r_v"=>$key['cv_d_r_v'],"cv_tv"=>$key['cv_tv'],"cv_sp"=>$key['cv_sp'],"cv_si"=>$key['cv_si'],"cv_mc"=>$key['cv_mc'],"cv_nd"=>$key['cv_nd'],"cv_npd"=>$key['cv_npd'],"cv_total"=>$key['cv_total'],"id_egreso"=>$key['id_egreso'],"i_m_j_f"=>$key['i_m_j_f'],"i_m_esposo"=>$key['i_m_esposo'],"i_m_hijo"=>$key['i_m_hijo'],"otros_apoyos"=>$key['otros_apoyos'],"i_m_otros"=>$key['i_m_otros'],"i_alimentacion"=>$key['i_alimentacion'],"i_renta_predial"=>$key['i_renta_predial'],"i_agua"=>$key['i_agua'],"i_luz"=>$key['i_luz'],"i_combustible"=>$key['i_combustible'],"i_trasporte"=>$key['i_trasporte'],"i_eduacion"=>$key['i_eduacion'],"i_total"=>$key['i_total'],"total_regla"=>$key['total_regla'],"i_m_total"=>$key['i_m_total'],"id_pg"=>$key['id_pg'],"p_g_ig"=>$key['p_g_ig'],"p_g_eg"=>$key['p_g_eg'],"p_g_v"=>$key['p_g_v'],"p_g_s"=>$key['p_g_s'],"p_g_o"=>$key['p_g_o'],"p_g_total"=>$key['p_g_total'],"nombre_ts"=>utf8_encode($key['nombre_ts']),"cedula_ts"=>utf8_encode($key['cedula_ts']),"diag_ts"=>utf8_encode($key['diag_ts']),"r_m_ts"=>utf8_encode($key['r_m_ts']),"p_total_e"=>$key['p_total_e'],"v_p"=>$key['v_p'],"v_m"=>$key['v_m'],"fk_ocupacion_p"=>$key['fk_ocupacion_p'],"descripcion"=>utf8_encode($key['descripcion']),"id_sm"=>$key['id_sm'],"puntos_paciente"=>$key['puntos_paciente'],"iqgif"=>$key['iqgif']); 
      
       }
     
   }

   echo  json_encode($_array);
}








public function no_pacientes_referidos()
{  $array=$this->con->getDatos("SELECT count(*) as cantidad FROM pacientes WHERE referido=1");
    return  $array[0]['cantidad'];
}

public function asistio($id,$activo)
   {   if($activo=="true") 
        $valor=1;
        else $valor=0;
    $this->con->getDatos("UPDATE citas SET asistio=".$valor." WHERE id=".$id);
  
   }
  
  


   public function guardar_vivienda(){
extract($_REQUEST);
       
  if(empty($cv_d_r_v))$cv_d_r_v=0;else $cv_d_r_v;
  if(empty($cv_tv))$cv_tv=0;else $cv_tv;
  if(empty($cv_sp))$cv_sp=0;else $cv_sp;
  if(empty($cv_si))$cv_si=0;else $cv_si;
  if(empty($cv_mc))$cv_mc=0;else $cv_mc;
  if(empty($cv_nd))$cv_nd=0;else $cv_nd;
  if(empty($cv_npd))$cv_npd=0;else $cv_npd;
  if(empty($cv_total))$cv_total=0;else $cv_total;
  if(empty($id_responsable))$id_responsable='NULL';else $id_responsable;
  if(empty($id_v))$id_v= null; else $id_v;

  
    if ($id_v==null) {
   $this->con->setDatos("insert into vivienda (cv_d_r_v,cv_tv,cv_sp,cv_si,cv_mc,cv_nd,cv_npd,cv_total) values (".$cv_d_r_v.",".$cv_tv.",".$cv_sp.",".$cv_si.",".$cv_mc.",".$cv_nd.",".$cv_npd.",".$cv_total.")");
  
   $cv=$this->con->getDatos("SELECT @@IDENTITY AS id");

   $fk_vivienda = $cv[0]['id'];
   $this->con->setDatos("UPDATE datos_responsable SET fk_vivienda=".$fk_vivienda." WHERE id=".$id_responsable);
   $_array = array('id_v' => $fk_vivienda  );
     echo json_encode($_array); 
   } else {
     $this->con->setDatos("UPDATE vivienda SET cv_d_r_v=".$cv_d_r_v.", cv_tv=".$cv_tv.", cv_sp=".$cv_sp.", cv_si=".$cv_si.", cv_mc=".$cv_mc.", cv_nd=".$cv_nd.", cv_npd=".$cv_npd.", cv_total=".$cv_total."  WHERE id=".$id_v);
   
   }
    
    }

     public function guardar_salud_familiar(){
            extract($_REQUEST);     
            if(empty($esif))$esif=0;else $esif;
            if(empty($esif_ttep))$esif_ttep=0;else $esif_ttep;
            if(empty($esif_op_i))$esif_op_i=0;else $esif_op_i;
            if(empty($esif_total))$esif_total=0;else $esif_total;
            if(empty($id_responsable))$id_responsable='NULL';else $id_responsable;
            if(empty($id_sm))$sm=null;else $id_sm;

          if ($id_sm == null) {
            $this->con->setDatos("insert into salud_familiar (esif,esif_ttep,esif_op_i,esif_total) values (".$esif.",".$esif_ttep.",".$esif_op_i.",".$esif_total.")");
             $cv=$this->con->getDatos("SELECT @@IDENTITY AS id");
             $fk_salud_familiar = $cv[0]['id'];
             $this->con->setDatos("UPDATE datos_responsable SET fk_salud_familiar=".$fk_salud_familiar." WHERE id=".$id_responsable);
             $_array = array('id_sm' => $fk_salud_familiar);
             echo json_encode($_array);
          } else {
             $this->con->setDatos("UPDATE salud_familiar SET esif=".$esif.", esif_ttep=".$esif_ttep.",esif_op_i=".$esif_op_i.",esif_total=".$esif_total."  WHERE id=".$id_sm);
             
          }

    }

    public function puntos_ingresos()
    {  
       $numi1i=1;
       $numi1f=2;
       $numi2i=3;
       $numi2f=4;
       $numi3i=5;
       $numi3f=6;
       $numi4i=7;
       $numi4f=8;
       $numi5i=8;
       $field='';
       if($this->no_int_familia>=$numi1i && $this->no_int_familia<=$numi1f)  $field='id1';
       else if($this->no_int_familia>=$numi2i &&  $this->no_int_familia<=$numi2f)  $field='id2';
       else if($this->no_int_familia>=$numi3i &&  $this->no_int_familia<=$numi3f)  $field='id3';
       else if($this->no_int_familia>=$numi4i &&  $this->no_int_familia<=$numi4f)  $field='id4';
       else if($this->no_int_familia>=$numi5i)  $field='id5';

       $ing="";
       if($this->i_m_total>=41633)  $ing=$this->i_m_total.">=cs.rango_inicial";
       else  $ing= $this->i_m_total.">=cs.rango_inicial  AND ".$this->i_m_total."<= cs.rango_final";
       $cv=$this->con->getDatos("SELECT c.fk_salario,cs.ingreso_veces,cs.rango_inicial,cs.rango_final,
                                (select c2.id FROM concentrado as c2 WHERE c2.fk_dependientes=1 and c2.fk_salario=c.fk_salario) as id1,  
                                (select puntos FROM concentrado as c2 WHERE c2.fk_dependientes=1 and c2.fk_salario=c.fk_salario) as dependientes12puntos,  
                                (select c2.id FROM concentrado as c2 WHERE c2.fk_dependientes=2 and c2.fk_salario=c.fk_salario) as id2, 
                                (select puntos FROM concentrado as c2 WHERE c2.fk_dependientes=2 and c2.fk_salario=c.fk_salario) as dependientes34puntos,
                                (select c2.id FROM concentrado as c2 WHERE c2.fk_dependientes=3 and c2.fk_salario=c.fk_salario) as id3, 
                                (select puntos FROM concentrado as c2 WHERE c2.fk_dependientes=3 and c2.fk_salario=c.fk_salario) as dependientes56puntos,
                                (select c2.id FROM concentrado as c2 WHERE c2.fk_dependientes=4 and c2.fk_salario=c.fk_salario) as id4,
                                (select puntos FROM concentrado as c2 WHERE c2.fk_dependientes=4 and c2.fk_salario=c.fk_salario) as dependientes78puntos,
                                (select c2.id FROM concentrado as c2 WHERE c2.fk_dependientes=5 and c2.fk_salario=c.fk_salario) as id5,
                                (select puntos FROM concentrado as c2 WHERE c2.fk_dependientes=5 and c2.fk_salario=c.fk_salario) as dependientes8maspuntos   
                                 from concentrado as c LEFT JOIN cat_salarios as cs on cs.id=c.fk_salario  WHERE ".$ing."  
                                  GROUP BY cs.ingreso_veces,cs.id,c.fk_salario,cs.rango_inicial,cs.rango_final order by(cs.id)");



      $valor="";
      
      foreach ($cv as $key) {
        $valor= $key[$field];
      }
    
     return $valor;

      
    }


    public function guardar_puntos_gral(){
extract($_REQUEST);
       
  if(empty($p_g_ig))$p_g_ig='0';else $p_g_ig;
  if(empty($p_g_eg))$p_g_eg='0';else $p_g_eg;
  if(empty($p_g_v))$p_g_v='0';else $p_g_v;
  if(empty($p_g_s))$p_g_s='0';else $p_g_s;
  if(empty($p_g_o))$p_g_o='0';else $p_g_o;
  if(empty($p_g_total))$p_g_total='0';else $p_g_total;
  if(empty($nombre_ts))$nombre_ts='0';else $nombre_ts;
  if(empty($cedula_ts))$cedula_ts='0';else $cedula_ts;
  if(empty($diag_ts))$diag_ts='NULL';else $diag_ts;
  if(empty($r_m_ts))$r_m_ts='';else $r_m_ts;
  if(empty($id_responsable))$id_responsable='NULL';else $id_responsable;
  if(empty($fk_concentrado))$fk_concentrado='NULL';else $fk_concentrado;
  if(empty($id_radio))$id_radio='NULL';else $id_radio;

  if ($id_pg== null) {
     echo($this->con->setDatos("insert into puntos_generales (p_g_ig,p_g_eg,p_g_v,p_g_s,p_g_o,p_g_total,nombre_ts,cedula_ts,diag_ts,r_m_ts,id_radio) values (".$p_g_ig.",".$p_g_eg.",".$p_g_v.",".$p_g_s.",".$p_g_o.",".$p_g_total.",'".utf8_decode($nombre_ts)."','".$cedula_ts."','".utf8_decode($diag_ts)."','".utf8_decode($r_m_ts)."',".$id_radio.")") ? "GUARDAR" : "ERROR");
  
   $cv=$this->con->getDatos("SELECT @@IDENTITY AS id");
   $fk_puntos_generales = $cv[0]['id'];

   $this->con->setDatos("UPDATE datos_responsable SET fk_puntos_generales=".$fk_puntos_generales." , fk_concentrado=".$fk_concentrado." , status=1 WHERE id=".$id_responsable);


  } else {
     $eliminar=$this->con->getDatos("DELETE FROM puntos_generales WHERE id=".$id_pg);
      echo($this->con->setDatos("insert into puntos_generales (p_g_ig,p_g_eg,p_g_v,p_g_s,p_g_o,p_g_total,nombre_ts,cedula_ts,diag_ts,r_m_ts,id_radio) values (".$p_g_ig.",".$p_g_eg.",".$p_g_v.",".$p_g_s.",".$p_g_o.",".$p_g_total.",'".utf8_decode($nombre_ts)."','".$cedula_ts."','".utf8_decode($diag_ts)."','".utf8_decode($r_m_ts)."',".$id_radio.")") ? "GUARDAR" : "ERROR");
  
   $cv=$this->con->getDatos("SELECT @@IDENTITY AS id");
   $fk_puntos_generales = $cv[0]['id'];

   $this->con->setDatos("UPDATE datos_responsable SET fk_puntos_generales=".$fk_puntos_generales." , fk_concentrado=".$fk_concentrado." , status=1 WHERE id=".$id_responsable);


  }



    

    }
 
public function eliminar_pacientes($id){
    $this->con->setDatos("DELETE  FROM pacientes WHERE id=".$id);
}

    public function guardar_ocupacion(){
extract($_REQUEST);
       
  if(empty($ocupacion))$ocupacion='NULL';else $ocupacion;
  if(empty($fk_tipos_ocupaciones))$fk_tipos_ocupaciones='NULL';else $fk_tipos_ocupaciones;
  echo($this->con->setDatos("insert into ocupaciones(ocupacion,fk_tipos_ocupaciones) values ('".$ocupacion."',".$fk_tipos_ocupaciones.")") ? "GUARDAR" : "ERROR");
  
   

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

  public function ingreso_externo(){
   extract($_REQUEST);
  if(empty($si_ext))$si_ext='NULL';else $si_ext;

    if(isset($fk_especialidades_ih))$this->fk_especialidades_ih=$fk_especialidades_ih;
  
  if(empty($n_e_ext))$n_e_ext='NULL';else $n_e_ext;

  if(empty($fk_unidad_hospitalaria))$fk_unidad_hospitalaria='NULL';else $fk_unidad_hospitalaria;


 $fecha_ingreso1=date("Y-m-d"); 

  echo($this->con->setDatos("insert into ingresos_hospitalarios(servicio_ingreso,fecha_ingreso,fk_paciente_ingreso,fk_unidad_hospitalaria,fk_especialidades_ih) values ('".$si_ext."','".$fecha_ingreso1."',".$id_exportar.",".$fk_unidad_hospitalaria.",".$fk_especialidades_ih.")") ? "GUARDAR" : "ERROR");
  
 $this->con->setDatos("insert into no_expedientes (no_expediente,fk_unidad_medica,fk_paciente_exp) values ('".$n_e_ext."',".$fk_unidad_hospitalaria.",".$id_exportar.")");
 
  }




 public function egreso_familiar(){
extract($_REQUEST);
  if(empty($i_m_j_f))$i_m_j_f=0;else $i_m_j_f;
  if(empty($i_m_esposo))$i_m_esposo=0;else $i_m_esposo;
  if(empty($i_m_hijo))$i_m_hijo=0;else $i_m_hijo;
  if(empty($i_m_otros))$i_m_otros=0;else $i_m_otros;
  if(empty($i_alimentacion))$i_alimentacion=0;else $i_alimentacion;
  if(empty($i_renta_predial))$i_renta_predial=0;else $i_renta_predial;
  if(empty($i_agua))$i_agua=0;else $i_agua;
  if(empty($i_luz))$i_luz=0;else $i_luz;
  if(empty($i_combustible))$i_combustible=0;else $i_combustible;
  if(empty($i_trasporte))$i_trasporte=0;else $i_trasporte;
  if(empty($i_eduacion))$i_eduacion=0;else $i_eduacion;
  if(empty($p_total_e))$p_total_e=0;else $p_total_e;
  if(empty($id_egreso))$id_egreso= null; else $id_egreso;

    $this->con->setDatos("insert into egreso_familiar (i_m_j_f,i_m_esposo,i_m_hijo,otros_apoyos,i_m_otros,i_alimentacion,i_renta_predial,i_agua,i_luz,i_combustible,i_trasporte,i_eduacion,i_total,total_regla,i_m_total,p_total_e) values (".$i_m_j_f.",".$i_m_esposo.",".$i_m_hijo.",'".$otros_apoyos."',".$i_m_otros.",".$i_alimentacion.",".$i_renta_predial.",".$i_agua.",".$i_luz.",".$i_combustible.",".$i_trasporte.",".$i_eduacion.",".$i_total.",".$total_regla.",".$i_m_total.",".$p_total_e.")");
    $cef=$this->con->getDatos("SELECT @@IDENTITY AS id");
    $fk_ingreso_familiar = $cef[0]['id'];
    $this->con->setDatos("UPDATE datos_responsable SET fk_ingreso_familiar=".$fk_ingreso_familiar." WHERE id=".$id_responsable);
   
    
    }

public function eliminar_egreso($id_egreso){
    $this->con->setDatos("DELETE  FROM egreso_familiar WHERE id=".$id_egreso);
}

public function eliminar_esef($id){

     $this->con->setDatos("UPDATE datos_responsable SET status=0 WHERE id=".$id);
}

  function consultar_pacientes_url($fk_unidad)
{   
     $array=$this->con->getDatos("EXECUTE c_ese '".$fk_unidad."'");
     $_array=array();
     $i=0;
      $fecha_elaboracion="";
     foreach ($array as $key)
      {  $i++;    
        if($key["fecha_elaboracion"]==null) $fecha_elaboracion="";
        else $fecha_elaboracion=date_format($key["fecha_elaboracion"], 'd-m-Y');
        $_array[]=array("id"=>$key['id'],"no_expediente"=>$key['no_expediente'],"fecha_elaboracion"=>$fecha_elaboracion,"folio_sp"=>utf8_encode($key['folio_sp']),"nombre_unidad"=>utf8_encode($key['nombre_unidad']),"nombre"=>utf8_encode($key['nombre']),"edad"=>$key['edad'],"sexo"=>utf8_encode($key['sexo']),"domicilio_actual"=>utf8_encode($key['domicilio_actual']),"telefono"=>utf8_encode($key['telefono']),"derecho_habiente"=>utf8_encode($key['derecho_habiente']),"ap_p"=>utf8_encode($key['ap_p']),"ap_m"=>utf8_encode($key['ap_m']),"paginas"=> $i);

      }
   echo json_encode($_array);
    
  }

  function consultar_pacientes_externos_url($fk_unidad2)
{   

     $array=$this->con->getDatos("EXECUTE c_externa '".$fk_unidad2."'");
     $_array=array();
     $i=0;
     $fecha_elaboracion="";
     foreach ($array as $key)
      {  $i++;    
        if($key["fecha_elaboracion"]==null) $fecha_elaboracion="";
        else $fecha_elaboracion=date_format($key["fecha_elaboracion"], 'd-m-Y');
        $_array[]=array("id"=>$key['id'],"fecha_elaboracion"=>$fecha_elaboracion,"folio_sp"=>utf8_encode($key['folio_sp']),"nombre"=>utf8_encode($key['nombre']),"unidad_ingreso"=>utf8_encode($key['unidad_ingreso']),"curp"=>utf8_encode($key['curp']),"ap_p"=>utf8_encode($key['ap_p']),"ap_m"=>utf8_encode($key['ap_m']),"paginas"=> $i);

      }
   echo json_encode($_array);
    
  }


 function consultar_estudioslocales_url($id_unidad3)
{   
  $array=$this->con->getDatos("EXECUTE ese_locales '".$id_unidad3."'");
     $_array=array();
     $i=0;
      $fecha_elaboracion="";
     foreach ($array as $key)
      {  $i++;    
        if($key["fecha_elaboracion"]==null) $fecha_elaboracion="";
        else $fecha_elaboracion=date_format($key["fecha_elaboracion"], 'd-m-Y');
        $_array[]=array("id"=>$key['id'],"no_expediente"=>$key['no_expediente'],"fecha_elaboracion"=>$fecha_elaboracion,"folio_sp"=>utf8_encode($key['folio_sp']),"nombre_unidad"=>utf8_encode($key['nombre_unidad']),"nombre"=>utf8_encode($key['nombre']),"edad"=>$key['edad'],"sexo"=>utf8_encode($key['sexo']),"domicilio_actual"=>utf8_encode($key['domicilio_actual']),"telefono"=>utf8_encode($key['telefono']),"derecho_habiente"=>utf8_encode($key['derecho_habiente']),"ap_p"=>utf8_encode($key['ap_p']),"ap_m"=>utf8_encode($key['ap_m']),"id_responsable"=>$key['id_responsable'],"curp"=>$key['curp'],"paginas"=> $i); 

      }
   echo json_encode($_array);
    
  }

  function c_estudioslocales_url($id_uni)
{   //XXXX

  $array=$this->con->getDatos("EXECUTE ingresos_paciente '".$id_uni."'");
     $_array=array();
     $i=0;
      $fecha_elaboracion="";
      $fecha_ingreso="";
      $fecha_egreso="";
     foreach ($array as $key)
      {  $i++;    
        if($key["fecha_elaboracion"]==null) $fecha_elaboracion="";
        else $fecha_elaboracion=date_format($key["fecha_elaboracion"], 'd-m-Y H:i:s');
         
         if($key["fecha_ingreso"]==null) $fecha_ingreso="";
        else $fecha_ingreso=date_format($key["fecha_ingreso"], 'd-m-Y H:i:s');
         
         if($key["fecha_egreso"]==null) $fecha_egreso="";
        else $fecha_egreso=date_format($key["fecha_egreso"], 'd-m-Y H:i:s');

        $_array[]=array("id_responsable"=>$key['id_responsable'],"id"=>$key['id'],"curp"=>$key['curp'],"fecha_egreso"=>$fecha_egreso,"fecha_ingreso"=>$fecha_ingreso,"fecha_elaboracion"=>$fecha_elaboracion,"observaciones"=>utf8_encode($key['observaciones']),"ubicacion"=>utf8_encode($key['ubicacion']),"estado_paciente"=>$key['estado_paciente'],"nomenclatura"=>$key['nomenclatura'],"servicio"=>utf8_encode($key['servicio']),"edad"=>$key['edad'],"ap_p"=>utf8_encode($key['ap_p']),"ap_m"=>utf8_encode($key['ap_m']),"nombre"=>utf8_encode($key['nombre']),"folio_sp"=>$key['folio_sp'],"no_expediente"=>$key['no_expediente'],"paginas"=> $i); 

      }
   echo json_encode($_array);
    
  }



 function consultar_estudioslocales_detalle($id_u,$curp,$folio_sp)
{   

  $array=$this->con->getDatos("SELECT p.id ,p.fecha_elaboracion,p.folio_sp,p.no_expediente,p.servicio_ingreso,ua.nombre as nombre_unidad,p.nombre,p.ap_m,p.ap_p,p.edad,p.sexo,p.domicilio_actual,p.telefono,p.derecho_habiente,dr.id as id_responsable  FROM pacientes AS p LEFT JOIN unidades_adm AS ua ON ua.id=fk_unidad_P 
 LEFT JOIN datos_responsable as dr on dr.id=p.fk_datos_responsable 
 WHERE dr.status=1 and p.fk_unidad_ingreso=".$id_u." AND p.curp='".$curp."' AND p.folio_sp='".$folio_sp."'");
     $_array=array();
     $i=0;
     $fecha_elaboracion="";
     foreach ($array as $key)
      {  $i++;    
         if($key["fecha_elaboracion"]==null) $fecha_elaboracion="";
        else $fecha_elaboracion=date_format($key["fecha_elaboracion"], 'd-m-Y');
       $_array[]=array("servicio_ingreso"=>$key['servicio_ingreso'],"id"=>$key['id'],"no_expediente"=>$key['no_expediente'],"fecha_elaboracion"=>$fecha_elaboracion,"folio_sp"=>utf8_encode($key['folio_sp']),"nombre_unidad"=>utf8_encode($key['nombre_unidad']),"nombre"=>utf8_encode($key['nombre']),"edad"=>$key['edad'],"sexo"=>utf8_encode($key['sexo']),"domicilio_actual"=>utf8_encode($key['domicilio_actual']),"telefono"=>utf8_encode($key['telefono']),"derecho_habiente"=>utf8_encode($key['derecho_habiente']),"ap_p"=>utf8_encode($key['ap_p']),"ap_m"=>utf8_encode($key['ap_m']),"id_responsable"=>$key['id_responsable'],"paginas"=> $i); 

      }
   echo json_encode($_array);

  }

   function c_e_detalle($id,$curp1,$folio_sp1)
{   

  $array=$this->con->getDatos("SELECT p.id,
p.folio_sp,p.no_expediente,p.nombre,p.ap_m,p.ap_p,p.edad,ser.servicio,c.nomenclatura,p.estado_paciente,ub.descripcion as ubicacion,p.observaciones,p.fecha_elaboracion,p.fecha_egreso,p.fecha_ingreso,p.domicilio_actual,p.curp,dr.id as id_responsable FROM pacientes AS p  
LEFT JOIN camas as c on c.id=p.fk_cama  
LEFT JOIN servicios AS ser ON ser.id=c.fk_servicio
LEFT JOIN ubicaciones AS ub ON ub.id=p.fk_ubicacion
LEFT JOIN datos_responsable as dr on dr.id=p.fk_datos_responsable 
  WHERE dr.status=2 and p.fk_unidad_ingreso=".$id." AND p.curp='".$curp1."'");
     $_array=array();
     $i=0;
     $fecha_elaboracion="";
     $fecha_ingreso="";
     $fecha_egreso="";
     foreach ($array as $key)
      {  $i++;    
        if($key["fecha_elaboracion"]==null) $fecha_elaboracion="";
        else $fecha_elaboracion=date_format($key["fecha_elaboracion"], 'd-m-Y H:i:s');
         
         if($key["fecha_ingreso"]==null) $fecha_ingreso="";
        else $fecha_ingreso=date_format($key["fecha_ingreso"], 'd-m-Y H:i:s');
         
         if($key["fecha_egreso"]==null) $fecha_egreso="";
        else $fecha_egreso=date_format($key["fecha_egreso"], 'd-m-Y H:i:s');

      $_array[]=array("id_responsable"=>$key['id_responsable'],"id"=>$key['id'],"curp"=>$key['curp'],"fecha_egreso"=>$fecha_egreso,"fecha_ingreso"=>$fecha_ingreso,"fecha_elaboracion"=>$fecha_elaboracion,"observaciones"=>utf8_encode($key['observaciones']),"ubicacion"=>utf8_encode($key['ubicacion']),"estado_paciente"=>$key['estado_paciente'],"nomenclatura"=>$key['nomenclatura'],"servicio"=>utf8_encode($key['servicio']),"edad"=>$key['edad'],"ap_p"=>utf8_encode($key['ap_p']),"ap_m"=>utf8_encode($key['ap_m']),"nombre"=>utf8_encode($key['nombre']),"folio_sp"=>$key['folio_sp'],"no_expediente"=>$key['no_expediente'],"paginas"=> $i); 

      }
   echo json_encode($_array);

  }




function cpp($id){
    $array=$this->con->getDatos("SELECT p.publicado,dr.status,p.act_nacimiento,p.copia_sp,p.pase, p.id,p.caso_medico_legal ,p.folio_sp,p.no_expediente,p.nombre,p.ap_m,p.ap_p,p.edad,p.sexo,p.domicilio_actual,p.derecho_habiente,p.fk_cama,c.nomenclatura,c.fk_servicio, p.fk_ubicacion, p.estado_paciente, p.diagnostico_medico, p.observaciones, p.fecha_egreso,p.fecha_ingreso FROM pacientes AS p LEFT JOIN camas as c on c.id=p.fk_cama  LEFT JOIN datos_responsable as dr on dr.id=p.fk_datos_responsable where p.id=".$id);
  foreach ($array as $key) {
 $fecha_egreso="";
    $fecha_ingreso="";
      if(isset($key["fecha_egreso"]))
          $fecha_egreso=date_format($key["fecha_egreso"], 'Y-m-d H:i:s');
        if(isset($key["fecha_ingreso"]))
         $fecha_ingreso= date_format($key["fecha_ingreso"], 'Y-m-d H:i:s');
    
          $_array=array("fecha_egreso"=>$fecha_egreso,"fecha_ingreso"=>$fecha_ingreso,"publicado"=>$key['publicado'],"pase"=>$key['pase'],"copia_sp"=>$key['copia_sp'],"act_nacimiento"=>$key['act_nacimiento'],"esc"=>$key['status'],"caso_medico_legal"=>utf8_encode($key['caso_medico_legal']),"nomenclatura"=>utf8_encode($key['nomenclatura']),"nombre"=>utf8_encode($key['nombre']),"ap_p"=>utf8_encode($key['ap_p']),"ap_m"=>utf8_encode($key['ap_m']),"id"=>$key['id'],"folio_sp"=>$key['folio_sp'],"no_expediente"=>$key['no_expediente'],"estado_paciente"=>$key['estado_paciente'],"observaciones"=>utf8_encode($key['observaciones']),"diagnostico_medico"=>utf8_encode($key['diagnostico_medico']),"fk_ubicacion"=>$key['fk_ubicacion'],"fk_servicio"=>$key['fk_servicio'],"fk_cama"=>$key['fk_cama'],"derecho_habiente"=>$key['derecho_habiente'],"domicilio_actual"=>utf8_encode($key['domicilio_actual']),"sexo"=>$key['sexo'],"edad"=>$key['edad']); 
    
   }

   echo  json_encode($_array);

}


function traspaso_datos($id){

extract($_REQUEST);
 //if(empty($fkunidadingreso))$fkunidadingreso= null; else $fkunidadingreso;

 if(empty($si_ext))$si_ext= null; else $si_ext;
 if(empty($fk_especialidades_ih))$fk_especialidades_ih=null; else $fk_especialidades_ih;

$fkunidadingreso=$_SESSION['fk_unidad_adm'];


 

  $array=$this->con2->getDatos("SELECT p.id, p.fecha_elaboracion, p.folio_sp, p.unidad_referencia, p.nombre,p.ap_p,p.ap_m,p.no_expediente,p.servicio_ingreso,p.fk_especialidad, p.diagnostico_egreso, p.edad,p.sexo, p.estado_civil, p.religion, p.curp, p.eaphic,p.cual, p.fecha_nacimiento,p.lugar_nacimineto,p.hali,p.cual1,p.escolaridad,p.fk_ocupacion_p,o.ocupacion,p.domicilio_actual,p.referencia_domiciliaria,p.telefono,p.derecho_habiente,p.fk_unidad_P,ua.nombre AS nombre_unidad,p.nucleo_basico,p.caso_medico_legal,p.donacion_sangre,p.folio, di.id AS id_informante, di.nombre_informante, di.edad_informante, di.parentesco, di.sexo_informante, di.ocupacion_informante, di.telefono_informante, dr.id AS id_responsable,dr.nombre_responsable, dr.edad_responsable,dr.parentesco_responsable,dr.escolaridad_responsable,dr.fk_concentrado,dr.religion_responsable,dr.telefono_responsable, ocu.id as ocupacion_responsable,t_oc.puntos,t_oc2.puntos as puntos_paciente, dr.lugar_trabajo,dr.direccion_responsable,dr.hali_responsable,dr.cual2,dr.nombre_padre_resp,dr.edad_padre,dr.religion_padre,dr.estado_civil_padre,dr.telefono_padre,dr.nombre_madre,dr.edad_madre,dr.religion_madre,dr.estado_civil_madre,dr.telefono_madre,dr.hali_madre,dr.cual3,dr.no_int_familia,dr.v_p,dr.v_m,dr.fk_salud_familiar,sf.esif,sf.esif_op_i,sf.esif_ttep,sf.esif_total,sf.id as id_sm,v.id as id_vivienda, v.cv_d_r_v,v.cv_tv,v.cv_sp,v.cv_si,v.cv_mc,v.cv_nd,v.cv_npd,v.cv_total,ef.id AS id_egreso,ef.i_m_j_f, ef.i_m_esposo,ef.i_m_hijo,ef.otros_apoyos,ef.i_m_otros,ef.i_alimentacion,ef.i_renta_predial,ef.i_agua,ef.i_luz,ef.i_combustible,ef.i_trasporte,ef.i_eduacion,ef.i_total,ef.total_regla,ef.i_m_total,ef.p_total_e,pg.id as id_pg ,pg.p_g_ig,pg.p_g_eg,pg.p_g_v,pg.p_g_s,pg.p_g_o,pg.p_g_total,pg.p_g_total,pg.nombre_ts,pg.cedula_ts,pg.diag_ts,pg.r_m_ts,p.descripcion,p.iqgif,p.fk_unidad_ingreso,p.fk_usuario FROM pacientes AS p LEFT JOIN  unidades_adm AS ua ON ua.id=fk_unidad_P LEFT JOIN ocupaciones as o ON o.id=fk_ocupacion_p  LEFT JOIN datos_informante AS di ON di.id=fk_datos_informante LEFT JOIN datos_responsable AS dr ON dr.id=fk_datos_responsable LEFT JOIN ocupaciones as ocu ON ocu.id=fk_ocupacion LEFT JOIN tipos_ocupaciones as t_oc ON t_oc.id=ocu.fk_tipos_ocupaciones LEFT JOIN salud_familiar as sf on sf.id=dr.fk_salud_familiar LEFT JOIN vivienda as v ON v.id=dr.fk_vivienda LEFT JOIN egreso_familiar as ef on ef.id=dr.fk_ingreso_familiar LEFT JOIN puntos_generales as pg on pg.id=dr.fk_puntos_generales LEFT JOIN tipos_ocupaciones as t_oc2 ON t_oc2.id=o.fk_tipos_ocupaciones WHERE p.id=".$id);

  foreach ($array as $key) {
  
 if(empty($n_e_ext))$n_e_ext= $key['no_expediente']; else $n_e_ext;
        $hoy = date("Y-m-d H:i:s");
          $fecha_nacimiento="";
      if(isset($key["fecha_nacimiento"]))
          $fecha_nacimiento=date_format($key["fecha_nacimiento"], 'Y-m-d');
        $up=$key['fk_unidad_P'];
 if($key['fk_unidad_P']>=1)$up=$key['fk_unidad_P']; else  $up= "null";
 if($key['iqgif']>=1)$iqgif=$key['iqgif']; else  $iqgif= "null";
   
 if($key['fk_ocupacion_p']>=0)$fkocupacionp=$key['fk_ocupacion_p']; else  $fkocupacionp="null";

     echo($this->con->setDatos("insert into pacientes (fecha_elaboracion,folio_sp,unidad_referencia,nombre,no_expediente,servicio_ingreso,diagnostico_egreso,edad,sexo,estado_civil,religion,curp,eaphic,cual,fecha_nacimiento,lugar_nacimineto,hali,cual1,escolaridad,fk_ocupacion_p,domicilio_actual,referencia_domiciliaria,telefono,derecho_habiente,fk_unidad_P,nucleo_basico,caso_medico_legal,donacion_sangre,folio,fk_usuario,fk_unidad_ingreso,ap_p,ap_m,descripcion,fk_especialidad,iqgif) values (GETDATE(),'".$key['folio_sp']."','".$key['unidad_referencia']."','".$key['nombre']."','".$n_e_ext."','".$si_ext."','".$key['diagnostico_egreso']."','".$key['edad']."','".$key['sexo']."','".$key['estado_civil']."','".$key['religion']."','".$key['curp']."','".$key['eaphic']."','".$key['cual']."','".$fecha_nacimiento."','".$key['lugar_nacimineto']."','".$key['hali']."','".$key['cual']."','".$key['escolaridad']."',".$fkocupacionp.",'".$key['domicilio_actual']."','".$key['referencia_domiciliaria']."','".$key['telefono']."','".$key['derecho_habiente']."',".$up.",'".$key['nucleo_basico']."','".$key['caso_medico_legal']."','".$key['donacion_sangre']."','".$key['folio']."',".$_SESSION['idUsuario'].",".$fkunidadingreso.",'".$key['ap_p']."','".$key['ap_m']."','".$key['descripcion']."',".$fk_especialidades_ih.",".$iqgif.")") ? "GUARDAR" : "ERROR");
       $idpe=$this->con->getDatos("SELECT @@IDENTITY AS id");
              $idpe1=$idpe[0]['id'];
 
      $this->con->setDatos("insert into datos_informante (nombre_informante,edad_informante,parentesco,sexo_informante,ocupacion_informante,telefono_informante) values ('".$key['nombre_informante']."','".$key['edad_informante']."','".$key['parentesco']."','".$key['sexo_informante']."','".$key['ocupacion_informante']."','".$key['telefono_informante']."')");
      $iddi=$this->con->getDatos("SELECT @@IDENTITY AS id");
              $idie1=$iddi[0]['id'];


     $this->con->setDatos("insert into salud_familiar (esif,esif_ttep,esif_op_i,esif_total) values (".$key['esif'].",".$key['esif_ttep'].",".$key['esif_op_i'].",".$key['esif_total'].")");
             $cv=$this->con->getDatos("SELECT @@IDENTITY AS id");
             $fk_salud_familiar2 = $cv[0]['id'];
             
     $this->con->setDatos("insert into vivienda (cv_d_r_v,cv_tv,cv_sp,cv_si,cv_mc,cv_nd,cv_npd,cv_total) values (".$key['cv_d_r_v'].",".$key['cv_tv'].",".$key['cv_sp'].",".$key['cv_si'].",".$key['cv_mc'].",".$key['cv_nd'].",".$key['cv_npd'].",".$key['cv_total'].")");
              $cv2=$this->con->getDatos("SELECT @@IDENTITY AS id");
              $fk_vivienda2 = $cv2[0]['id'];

    $this->con->setDatos("insert into egreso_familiar (i_m_j_f,i_m_esposo,i_m_hijo,otros_apoyos,i_m_otros,i_alimentacion,i_renta_predial,i_agua,i_luz,i_combustible,i_trasporte,i_eduacion,i_total,total_regla,i_m_total,p_total_e) values (".$key['i_m_j_f'].",".$key['i_m_esposo'].",".$key['i_m_hijo'].",'".$key['otros_apoyos']."',".$key['i_m_otros'].",".$key['i_alimentacion'].",".$key['i_renta_predial'].",".$key['i_agua'].",".$key['i_luz'].",".$key['i_combustible'].",".$key['i_trasporte'].",".$key['i_eduacion'].",".$key['i_total'].",".$key['total_regla'].",".$key['i_m_total'].",".$key['p_total_e'].")");
              $cef2=$this->con->getDatos("SELECT @@IDENTITY AS id");
              $fk_ingreso_familiar2 = $cef2[0]['id'];
     
   
    $this->con3->setDatos("insert into datos_responsable (nombre_responsable,edad_responsable,parentesco_responsable,escolaridad_responsable,religion_responsable,telefono_responsable,fk_ocupacion,lugar_trabajo,direccion_responsable,hali_responsable,cual2,nombre_padre_resp,edad_padre,religion_padre,estado_civil_padre,telefono_padre,nombre_madre,edad_madre,religion_madre,estado_civil_madre,telefono_madre,hali_madre,cual3,no_int_familia,status,v_p,v_m,fk_concentrado,fk_salud_familiar,fk_vivienda,fk_ingreso_familiar) values ('".$key['nombre_responsable']."','".$key['edad_responsable']."','".$key['parentesco_responsable']."','".$key['escolaridad_responsable']."','".$key['religion_responsable']."','".$key['telefono_responsable']."',".$key['ocupacion_responsable'].",'".$key['lugar_trabajo']."','".$key['direccion_responsable']."','".$key['hali_responsable']."','".$key['cual2']."','".$key['nombre_padre_resp']."','".$key['edad_padre']."','".$key['religion_padre']."','".$key['estado_civil_padre']."','".$key['telefono_padre']."','".$key['nombre_madre']."','".$key['edad_madre']."','".$key['religion_madre']."','".$key['estado_civil_madre']."','".$key['telefono_madre']."','".$key['hali_madre']."','".$key['cual3']."','".$key['no_int_familia']."',0,'".$key['v_p']."','".$key['v_m']."',".$key['fk_concentrado'].",".$fk_salud_familiar2.",".$fk_vivienda2.",".$fk_ingreso_familiar2.")");
    $idre=$this->con3->getDatos("SELECT @@IDENTITY AS id");
      $idre1=$idre[0]['id']; 

       $this->con->setDatos("UPDATE pacientes SET fk_datos_responsable=".$idre1." , fk_datos_informante=".$idie1." WHERE id=".$idpe1);   
      
   

   }


}



}
?>