<?php 
ini_set('display_errors', 0);
session_start();
include_once 'conexion.php';
class admision_hospitalaria
{  
	 public $id_expediente,
$Fecha,
$FechaReingreso,
$NoExp,
$FolioSpopular,
$nombrePaciente,
$Especialidad,
$Calle,
$colonia,
$localidad,
$Diagnostico,
$UnidadqueRefiere,
$Sexo,
$TrabajoSocial,
$FechaCReferencia,
$DiagnosticoFinal,
$Medico;
public $fecha_egreso,$fecha_ingreso;

  
    public function admision_hospitalaria()
   {   
   	$this->con = new conexion();
   }
   public function obtenerDatosPacientes()
   {  extract($_REQUEST);
      $this->id_expediente=$id_expediente;
      $this->Fecha=$Fecha;
      $this->FechaReingreso=$FechaReingreso;
      $this->NoExp=$NoExp;
      $this->FolioSpopular=$FolioSpopular;
      $this->nombrePaciente=$nombrePaciente;
      $this->Especialidad=$Especialidad;
      $this->Calle=$Calle;
      $this->colonia=$colonia;
      $this->localidad=$localidad;
      $this->Diagnostico=$Diagnostico;
      $this->UnidadqueRefiere=$UnidadqueRefiere;
      $this->Sexo=$Sexo;
      $this->TrabajoSocial=$TrabajoSocial;
      $this->FechaCReferencia=$FechaCReferencia;
      $this->DiagnosticoFinal=$DiagnosticoFinal;
      $this->Medico=$Medico;
   
   }

   public function obtenerDatosPaciente()
   {
      extract($_REQUEST);
      $this->curp=$curp;
      $this->nombre=$nombre;
      $this->fecha_nacimiento=$fecha_nacimiento;
      $this->fk_estado_nacimiento=$fk_estado_nacimiento;
      $this->sexo=$sexo;
      $this->afiliacion=$afiliacion;
      $this->numero_afiliacion=$numero_afiliacion;
      $this->tipo_vialidad=$tipo_vialidad;
      $this->nombre_vialidad=$nombre_vialidad;
      $this->numero_exterior=$numero_exterior;
      $this->numero_interior=$numero_interior;
      $this->tipo_asentamiento=$tipo_asentamiento;
      $this->nombre_asentamiento=$nombre_asentamiento;
      $this->fk_estado=$fk_estado;
      $this->fk_municipio=$fk_municipio;
      $this->localidad=$localidad;
      $this->codigo_postal=$codigo_postal;
      $this->telefono=$telefono;
   
    }
     public function obtenerDatosCitas()
    {  extract($_REQUEST);   
      $this->fecha_ingreso=$fecha_ingreso; 
      $this->fecha_egreso=$fecha_egreso;
    
    }
   function verificarExpediente($NoExp)
   {
    $result=$this->con->getDatos("select nombrePaciente from expedientes where NoExp='".$NoExp."'");
    $fila=count($result);
    if($fila>=1)   
    foreach ($result as $key) 
    {  $_array[] = array('nombre' =>  utf8_encode($key['nombrePaciente']));
    }
    else
      $_array[] = array('nombre' => 'vacio' );
    echo json_encode($_array);
   }
   public function isExiste()
   {  $this->obtenerDatosPaciente();
     $datos=$this->con->getDatos("SELECT * FROM  pacientes WHERE curp='".$this->curp."'");  
     $fila=count($datos);
     if($fila>=1) return true;
     else return false;
   }
   public function guardar_paciente(){
       $this->obtenerDatosPaciente();
	   
      if($this->isExiste())
        { 

         echo (!$this->con->getDatos("UPDATE pacientes SET 
          nombre='".$this->nombre."', 
          fecha_nacimiento='".$this->fecha_nacimiento."',
          lugar_nacimiento='".$this->fk_estado_nacimiento."',
          sexo='".$this->sexo."',
          derecho_habiente='".$this->afiliacion."',
          hali='".$this->numero_afiliacion."',
          cual1='".$this->tipo_vialidad."',
          nombre_viabilidad='".$this->nombre_vialidad."',
          numero_exterior='".$this->numero_exterior."',
          numero_interior='".$this->numero_interior."',
          tipo_asentamiento='".$this->tipo_asentamiento."',
          nombre_asentamiento='".$this->nombre_asentamiento."',
          fk_estado='".$this->fk_estado."',
          fk_municipio='".$this->fk_municipio."',
          localidad='".$this->localidad."',
          cp='".$this->codigo_postal."',
          telefono='".$this->telefono."' where curp='".$this->curp."'")?"ACTUALIZADO":"ERROR");
        }
        else
       echo ($this->con->setDatos("INSERT INTO pacientes (curp,
        nombre,
        fecha_nacimiento,
        lugar_nacimiento,
        sexo,
        derecho_habiente,
        hali,
        cual1,
        nombre_viabilidad,
        numero_exterior,
        numero_interior,
        tipo_asentamiento,
        nombre_asentamiento,
        fk_estado,
        fk_municipio,
        localidad,
        cp,
        telefono)  
                                                VALUES('".$this->curp."',
                                                   '".$this->nombre."',
                                                   '".$this->fecha_nacimiento."',
                                                   '".$this->fk_estado_nacimiento."',
                                                   '".$this->sexo."',
                                                   '".$this->afiliacion."',
                                                   '".$this->numero_afiliacion."',
                                                   '".$this->tipo_vialidad."',
                                                   '".$this->nombre_vialidad."',
                                                   '".$this->numero_exterior."',
                                                   '".$this->numero_interior."',
                                                   '".$this->tipo_asentamiento."',
                                                   '".$this->nombre_asentamiento."',
                                                   '".$this->fk_estado."',
                                                   '".$this->fk_municipio."',
                                                   '".$this->localidad."',
                                                   '".$this->codigo_postal."',
                                                   '".$this->telefono."')")
                                           ?"GUARDAR":"ERROR");                                
      

 }
 public function guardar_cita()
 {  $this->obtenerDatosPacientes(); 
   /*if(empty($this->id_expediente))
    echo "vacio";
  else echo "lleno";*/
 /* echo  "/".$this->Medico."/".$this->id_expediente."/".$this->Fecha."/".$this->FechaReingreso."/".$this->NoExp."/".$this->FolioSpopular."/".$this->nombrePaciente."/".$this->Especialidad."/".$this->Calle."/".$this->colonia."/".$this->localidad."/".$this->Diagnostico."/".$this->UnidadqueRefiere."/".$this->Sexo."/".$this->TrabajoSocial."/".$this->FechaCReferencia."/".$this->DiagnosticoFinal."";*/
  echo (!$this->con->setDatos("INSERT INTO expedientes (Fecha,NoExp,FolioSpopular,nombrePaciente,Especialidad,Calle,colonia,localidad,Diagnostico,UnidadqueRefiere,Sexo,Medico,TrabajoSocial,FechaCReferencia,DiagnosticoFinal) 
     VALUES('".$this->Fecha."','".$this->NoExp."','".$this->FolioSpopular."','".$this->nombrePaciente."','".$this->Especialidad."','".$this->Calle."','".$this->colonia."','".$this->localidad."','".$this->Diagnostico."','".$this->UnidadqueRefiere."','".$this->Sexo."','".$this->Medico."','".$this->TrabajoSocial."','".$this->FechaCReferencia."','".$this->DiagnosticoFinal."')")?"GUARDAR":"ERROR");
 //echo $this->Fecha;
 }

 public function seleccionarPaciente()
 {
  $this->obtenerDatosPacientes();
  $result=$this->con->getDatos("SELECT id_expediente,Fecha,NoExp,FolioSpopular,Especialidad,Calle,colonia,localidad,Diagnostico,UnidadqueRefiere,Sexo,Medico,TrabajoSocial,FechaCReferencia,DiagnosticoFinal FROM expedientes where nombrePaciente='".$this->nombrePaciente."' and id_expediente=(select max(id_expediente) from expedientes where (nombrePaciente='".$this->nombrePaciente."' or NoExp='".$this->NoExp."')");
  //$respuesta = new stdClass();

   foreach ($result as $key)
   {  $_array[]=array(
    'id_expediente'=>utf8_encode($key['id_expediente']),
    'Fecha'=>date('Y-m-d', strtotime($key['Fecha'])),
    'NoExp'=>utf8_encode($key['NoExp']),
    'FolioSpopular'=>utf8_encode($key['FolioSpopular']),
    'Especialidad'=>utf8_encode($key['Especialidad']),
    'Calle'=>utf8_encode($key['Calle']),
    'colonia'=>utf8_encode($key['colonia']),
    'localidad'=>utf8_encode($key['localidad']),
    'Diagnostico'=>utf8_encode($key['Diagnostico']),
    'UnidadqueRefiere'=>utf8_encode($key['UnidadqueRefiere']),
    'Sexo'=>utf8_encode($key['Sexo']),
    'Medico'=>utf8_encode($key['Medico']),
    'TrabajoSocial'=>utf8_encode($key['TrabajoSocial']),
    'FechaCReferencia'=>date('Y-m-d', strtotime($key['FechaCReferencia'])),
    'DiagnosticoFinal'=>utf8_encode($key['DiagnosticoFinal']));
      
   }  
      
  
  echo json_encode($_array);
 }
 public function seleccionarPaciente2()
 {
  $this->obtenerDatosPacientes();
  $result=$this->con->getDatos("SELECT id_expediente,nombrePaciente,Fecha,NoExp,FolioSpopular,Especialidad,Calle,colonia,localidad,Diagnostico,UnidadqueRefiere,Sexo,Medico,TrabajoSocial,FechaCReferencia,DiagnosticoFinal FROM expedientes where  NoExp='".$this->NoExp."'  and id_expediente=(select max(id_expediente) from expedientes where  NoExp='".$this->NoExp."' )");
  //$respuesta = new stdClass();

   foreach ($result as $key)
   {  $_array[]=array(
    'id_expediente'=>utf8_encode($key['id_expediente']),
    'nombre'=>utf8_encode($key['nombrePaciente']),
    'Fecha'=>date('Y-m-d', strtotime($key['Fecha'])),
    'NoExp'=>utf8_encode($key['NoExp']),
    'FolioSpopular'=>utf8_encode($key['FolioSpopular']),
    'Especialidad'=>utf8_encode($key['Especialidad']),
    'Calle'=>utf8_encode($key['Calle']),
    'colonia'=>utf8_encode($key['colonia']),
    'localidad'=>utf8_encode($key['localidad']),
    'Diagnostico'=>utf8_encode($key['Diagnostico']),
    'UnidadqueRefiere'=>utf8_encode($key['UnidadqueRefiere']),
    'Sexo'=>utf8_encode($key['Sexo']),
    'Medico'=>utf8_encode($key['Medico']),
    'TrabajoSocial'=>utf8_encode($key['TrabajoSocial']),
    'FechaCReferencia'=>date('Y-m-d', strtotime($key['FechaCReferencia'])),
    'DiagnosticoFinal'=>utf8_encode($key['DiagnosticoFinal']));
      
   }  
      
  
  echo json_encode($_array);
 }
 public function actualizar()
 {  $this->obtenerDatosPacientes();
   // echo $this->NoExp;
  echo(!$this->con->setDatos("UPDATE expedientes set NoExp='".$this->NoExp."',Fecha='".$this->Fecha."',FolioSpopular='".$this->FolioSpopular."',nombrePaciente='".$this->nombrePaciente."',Especialidad='".$this->Especialidad."',Calle='".$this->Calle."',colonia='".$this->colonia."',localidad='".$this->localidad."',Diagnostico='".$this->Diagnostico."',UnidadqueRefiere='".$this->UnidadqueRefiere."',Sexo='".$this->Sexo."',Medico='".$this->Medico."',TrabajoSocial='".$this->TrabajoSocial."',FechaCReferencia='".$this->FechaCReferencia."',DiagnosticoFinal='".$this->DiagnosticoFinal."' where id_expediente='".$this->id_expediente."'")?"GUARDAR":"ERROR");
 }
 public function tablaCitas()
 {
   $array=$this->con->getDatos("SELECT id_expediente,Fecha,NoExp,FolioSpopular,nombrePaciente,Especialidad,Calle,colonia,localidad,Diagnostico,UnidadqueRefiere,Sexo,Medico,TrabajoSocial,FechaCReferencia,DiagnosticoFinal from expedientes WHERE Fecha='".date('Y-m-d')."'");
   $fila=count($array);
   if($fila>=1)  
   foreach ($array as $key) 
   {   $_array[]=array('id_expediente'=>$key['id_expediente'],'NoExpa'=>$key['NoExp'],'Fecha'=>date('d-m-Y', strtotime($key['Fecha'])),'nombrePaciente'=>$key['nombrePaciente'],'Medico'=>$key['Medico'],'Especialidad'=>$key['Especialidad']);
   }
   else
   {   $_array[]=array('id_expediente'=>'','NoExpa'=>'','Fecha'=>'','nombrePaciente'=>'','Medico'=>'','Especialidad'=>'');
   }

   echo json_encode($_array);   



 }
 public function eliminarExp($id)
 {
  echo ($this->con->setDatos("delete from expedientes where id_expediente='".$id."'")?"ERROR":"SE A ELIMINADO");
 }
  public function eliminarExp2($id)
 {
  echo ($this->con->setDatos("delete from expedientes where NoExp='".$id."'")?"ERROR":"SE A ELIMINADO");
 }
 public function tablasPorPeriodos()
  { 
  $this->obtenerDatosCitas();
   $array=$this->con->getDatos("SELECT id_expediente,Fecha,NoExp,FolioSpopular,nombrePaciente,Especialidad,Calle,colonia,localidad,Diagnostico,UnidadqueRefiere,Sexo,Medico,TrabajoSocial,FechaCReferencia,DiagnosticoFinal from expedientes WHERE Fecha>='".date('Y-m-d', strtotime($this->fecha_ingreso))."' and Fecha<='".date('Y-m-d', strtotime($this->fecha_egreso))."'");
   $fila=count($array);
   if($fila>=1)  
   foreach ($array as $key) 
   {   $_array[]=array('id_expediente'=>$key['id_expediente'],'NoExpa'=>utf8_encode($key['NoExp']),'Fecha'=>date('d-m-Y', strtotime($key['Fecha'])),'nombrePaciente'=>utf8_encode($key['nombrePaciente']),'Medico'=>utf8_encode($key['Medico']),'Especialidad'=>utf8_encode($key['Especialidad']));
   }
   else
   {   $_array[]=array('id_expediente'=>'','NoExpa'=>'','Fecha'=>'','nombrePaciente'=>'','Medico'=>'','Especialidad'=>'');
   }

   echo json_encode($_array);  
   


  /*  
    $array=$this->con->getDatos("SELECT cp.fk_curp_paciente,cp.motivo_consulta,p.nombre,cp.hora_atencion,cp.hora_llegada,cp.fecha_ingreso,cp.cedula_medico FROM citasPacientes cp inner join pacientes p on cp.fk_curp_paciente=p.curp WHERE cp.fk_unidad_ingreso=".$id_unidad." and cp.fecha_ingreso>='".date('d-m-Y', strtotime($this->fecha_ingreso))."' and cp.fecha_ingreso<='".date('d-m-Y', strtotime($this->fecha_egreso))."'");
  $fila=count($array);
   if($fila>=1)
   foreach ($array as $key) 
   {   $_array[]=array('Curp'=>$key['fk_curp_paciente'],'Motivo_consulta'=>$key['motivo_consulta'],'nombre'=>$key['nombre'],'Hora_atencion'=>$key['hora_atencion'],'Hora_llegada'=>$key['hora_llegada'],'Fecha_ingreso'=>$key['fecha_ingreso'],'Cedula_medico'=>$key['cedula_medico']);
   }
   else
   {   $_array[]=array('Curp'=>'','Motivo_consulta'=>'','nombre'=>'','Hora_atencion'=>'','Hora_llegada'=>'','Fecha_ingreso'=>'','Cedula_medico'=>'');
   }
    echo json_encode($_array);*/
  }



}

?>