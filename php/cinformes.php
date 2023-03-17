<?php
ini_set('display_errors', 0);
session_start();
//include_once '../librerias/phpexcel/PHPExcel.php';
//include_once '../librerias/phpexcel/PHPExcel/IOFactory.php';
require_once dirname(__FILE__) . '../../librerias/PHPExcel-1.8.1/Classes/PHPExcel.php';
//include("../librerias/mpdf60/mpdf.php");
//include_once dirname(__FILE__) .'../../librerias/phpexcel/Classes/PHPExcel/IOFactory.php';
$mPDFLibraryPath = '../librerias/mpdf60';

require_once 'conexion.php';
extract($_REQUEST);
$conexion= new conexion();

$datos=$conexion->getDatos("SELECT p.id, p.fecha_elaboracion, p.folio_sp,p.fk_unidad_P, p.unidad_referencia,p.descripcion, p.nombre,p.ap_p,p.ap_m,p.no_expediente,p.servicio_ingreso,p.fk_especialidad,em.nom_especialidad,p.diagnostico_egreso, p.edad,p.sexo, p.estado_civil, p.religion, p.curp, p.eaphic,p.cual, p.fecha_nacimiento,p.lugar_nacimineto,p.hali,p.cual1,p.escolaridad,o.ocupacion,p.domicilio_actual,p.referencia_domiciliaria,p.telefono,p.derecho_habiente,ua.nombre AS nombre_unidad,p.nucleo_basico,p.caso_medico_legal,p.donacion_sangre,p.folio, di.id AS id_informante, di.nombre_informante, di.edad_informante, di.parentesco, di.sexo_informante, di.ocupacion_informante, di.telefono_informante, dr.id AS id_responsable,dr.nombre_responsable, dr.edad_responsable,dr.parentesco_responsable,dr.escolaridad_responsable,dr.religion_responsable,dr.telefono_responsable, ocu.ocupacion as ocupacion_responsable,t_oc.puntos, dr.lugar_trabajo,dr.direccion_responsable,dr.hali_responsable,dr.cual2,dr.nombre_padre_resp,dr.v_m,dr.v_p,dr.edad_padre,dr.religion_padre,dr.estado_civil_padre,dr.telefono_padre,dr.nombre_madre,dr.edad_madre,dr.religion_madre,dr.estado_civil_madre,dr.telefono_madre,dr.hali_madre,dr.cual3,dr.no_int_familia,dr.fk_salud_familiar,sf.esif,sf.esif_op_i,sf.esif_ttep,sf.esif_total,v.id as id_vivienda, v.cv_d_r_v,v.cv_tv,v.cv_sp,v.cv_si,v.cv_mc,v.cv_nd,v.cv_npd,v.cv_total,ef.id AS id_egreso,ef.i_m_j_f, ef.i_m_esposo,ef.i_m_hijo,ef.otros_apoyos,ef.i_m_otros,ef.i_alimentacion,ef.i_renta_predial,ef.i_agua,ef.i_luz,ef.i_combustible,ef.i_trasporte,ef.i_eduacion,ef.i_total,ef.total_regla,ef.i_m_total,pg.id as id_pg ,pg.p_g_ig,pg.p_g_eg,pg.p_g_v,pg.p_g_s,pg.p_g_o,pg.p_g_total,pg.p_g_total,pg.nombre_ts,pg.cedula_ts,pg.diag_ts,pg.r_m_ts,pg.id_radio,ui.nombre as nombre_ingreso_unidad FROM pacientes AS p LEFT JOIN  unidades_adm AS ua ON ua.id=fk_unidad_P LEFT JOIN ocupaciones as o ON o.id=fk_ocupacion_p  LEFT JOIN datos_informante AS di ON di.id=fk_datos_informante LEFT JOIN datos_responsable AS dr ON dr.id=fk_datos_responsable LEFT JOIN ocupaciones as ocu ON ocu.id=fk_ocupacion LEFT JOIN tipos_ocupaciones as t_oc ON t_oc.id=ocu.fk_tipos_ocupaciones LEFT JOIN salud_familiar as sf on sf.id=dr.fk_salud_familiar LEFT JOIN vivienda as v ON v.id=dr.fk_vivienda LEFT JOIN egreso_familiar as ef on ef.id=dr.fk_ingreso_familiar LEFT JOIN puntos_generales as pg on pg.id=dr.fk_puntos_generales LEFT JOIN especialidades_medicas as em on em.id=p.fk_especialidad LEFT JOIN  unidades_adm AS ui ON ui.id=fk_unidad_ingreso WHERE p.id='".$id."'");

$ruta = '../plantillas/';
$titulo="formatofinal.xlsx";
$hoja=0;
$fileFormat = 'pdf';
$fileName = "Estudio Socio-Economico".date('Y-m-d');
$_objPHPExcel = new PHPExcel();
   
   $objPHPExcel = PHPExcel_IOFactory::load($ruta.$titulo);
      if(is_int($hoja)) { $objWorkSheet = $objPHPExcel->getSheet($hoja); 
      }
      else { $objWorkSheet = $objPHPExcel->getSheetByName($hoja); }
          $_objPHPExcel->getProperties()->setTitle("Reporte"); // Titulo 
          $objWorkSheet->setShowGridLines(true);
          $_objPHPExcel->addExternalSheet($objWorkSheet,0);

          $_objPHPExcel->setActiveSheetIndex(0);
        
      foreach ($datos as $key) {
         $fecha_elaboracion="";
      if(isset($key["fecha_elaboracion"]))
          $fecha_elaboracion=date_format($key["fecha_elaboracion"], 'Y-m-d H:i:s');

        $fecha_nacimiento="";
      if(isset($key["fecha_nacimiento"]))
          $fecha_nacimiento=date_format($key["fecha_nacimiento"], 'd-m-Y');

          $fecha = date("Y-m-d H:i:s");

          $_objPHPExcel->getActiveSheet()->setCellValue("V112","Fecha/Hora de Impresion: ".$fecha."Por el Usuario: ".$_SESSION['nombre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("N6", utf8_encode($key['nombre_ingreso_unidad']));
          $_objPHPExcel->getActiveSheet()->setCellValue("I13", utf8_encode($key['nombre']));
          $_objPHPExcel->getActiveSheet()->setCellValue("T13", utf8_encode($key['ap_p']));
          $_objPHPExcel->getActiveSheet()->setCellValue("AF13", utf8_encode($key['ap_m']));
          $_objPHPExcel->getActiveSheet()->setCellValue("I10", $fecha_elaboracion);
          $_objPHPExcel->getActiveSheet()->setCellValue("AI9", $key['folio_sp']);
          $_objPHPExcel->getActiveSheet()->setCellValue("G15", $key['no_expediente']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AK11",utf8_encode( $key['unidad_referencia']));
          $_objPHPExcel->getActiveSheet()->setCellValue("U15", $key['servicio_ingreso']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AJ15",utf8_encode( $key['especialidad']));
          $_objPHPExcel->getActiveSheet()->setCellValue("J17", utf8_encode($key['diagnostico_egreso']));
          $_objPHPExcel->getActiveSheet()->setCellValue("D19", $key['edad']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Y19", utf8_encode($key['religion']));
          $_objPHPExcel->getActiveSheet()->setCellValue("AI19", $key['curp']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Q19", utf8_encode($key['estado_civil']));
          $_objPHPExcel->getActiveSheet()->setCellValue("AE21",utf8_encode( $key['cual']));
          $_objPHPExcel->getActiveSheet()->setCellValue("H22", $fecha_nacimiento);
          $_objPHPExcel->getActiveSheet()->setCellValue("U22", utf8_encode($key['lugar_nacimineto']));
          $_objPHPExcel->getActiveSheet()->setCellValue("S24", utf8_encode($key['cual1']));
          $_objPHPExcel->getActiveSheet()->setCellValue("U25", utf8_encode($key['ocupacion']));
          $_objPHPExcel->getActiveSheet()->setCellValue("F25", utf8_encode($key['escolaridad']));
          $_objPHPExcel->getActiveSheet()->setCellValue("AJ25", $key['telefono']);
          $_objPHPExcel->getActiveSheet()->setCellValue("G27", utf8_encode($key['domicilio_actual']));
          $_objPHPExcel->getActiveSheet()->setCellValue("I29", utf8_encode($key['referencia_domiciliaria']));      
          $_objPHPExcel->getActiveSheet()->setCellValue("AO33", $key['nucleo_basico']);
          $_objPHPExcel->getActiveSheet()->setCellValue("T36", $key['folio']);
          $_objPHPExcel->getActiveSheet()->setCellValue("F38", utf8_encode($key['nombre_informante']));
          $_objPHPExcel->getActiveSheet()->setCellValue("AL38", $key['edad_informante']);
          $_objPHPExcel->getActiveSheet()->setCellValue("M40", utf8_encode($key['ocupacion_informante']));
          $_objPHPExcel->getActiveSheet()->setCellValue("Z40", $key['telefono_informante']);
          $_objPHPExcel->getActiveSheet()->setCellValue("M43", utf8_encode($key['nombre_responsable']));
          $_objPHPExcel->getActiveSheet()->setCellValue("AM43", $key['edad_responsable']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Q45", utf8_encode($key['escolaridad_responsable']));
          $_objPHPExcel->getActiveSheet()->setCellValue("AB45", utf8_encode($key['religion_responsable']));
          $_objPHPExcel->getActiveSheet()->setCellValue("AM45", $key['telefono_responsable']);
          $_objPHPExcel->getActiveSheet()->setCellValue("T47", utf8_encode($key['lugar_trabajo']));
          $_objPHPExcel->getActiveSheet()->setCellValue("F49", utf8_encode($key['direccion_responsable']));
          $_objPHPExcel->getActiveSheet()->setCellValue("F47", utf8_encode($key['ocupacion_responsable']));
          $_objPHPExcel->getActiveSheet()->setCellValue("H52", utf8_encode($key['nombre_padre_resp']));

          $_objPHPExcel->getActiveSheet()->setCellValue("AG52", utf8_encode($key['religion_padre']));
          $_objPHPExcel->getActiveSheet()->setCellValue("F53", utf8_encode($key['estado_civil_padre']));
          $_objPHPExcel->getActiveSheet()->setCellValue("Y53", $key['telefono_padre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("H54", utf8_encode($key['nombre_madre']));
     
          $_objPHPExcel->getActiveSheet()->setCellValue("AG54", utf8_encode($key['religion_madre']));
          $_objPHPExcel->getActiveSheet()->setCellValue("F55", utf8_encode($key['estado_civil_madre']));
          $_objPHPExcel->getActiveSheet()->setCellValue("Y55", $key['telefono_madre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Y57", utf8_encode($key['cual3']));
          $_objPHPExcel->getActiveSheet()->setCellValue("N58", $key['no_int_familia']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AC62", $key['i_m_j_f']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AC63", $key['i_m_esposo']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AC65", $key['i_m_hijo']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Y69", $key['otros_apoyos']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AC69", $key['i_m_otros']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AC70", $key['i_m_total']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM62", $key['i_alimentacion']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM64", $key['i_renta_predial']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM65", $key['i_agua']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM66", $key['i_luz']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM67", $key['i_combustible']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM68", $key['i_trasporte']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM69", $key['i_eduacion']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM70", $key['i_total']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO94", $key['p_g_eg']);
          $_objPHPExcel->getActiveSheet()->setCellValue("S113", $key['p_g_v']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO95", $key['p_g_v']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO93", $key['p_g_ig']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO96", $key['p_g_s']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO97", $key['p_g_o']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO98", $key['p_g_total']);
          $_objPHPExcel->getActiveSheet()->setCellValue("V109", utf8_encode($key['nombre_ts']));
          $_objPHPExcel->getActiveSheet()->setCellValue("AL109", $key['cedula_ts']); 
          $_objPHPExcel->getActiveSheet()->setCellValue("I119", utf8_encode($key['r_m_ts']));
          $_objPHPExcel->getActiveSheet()->setCellValue("R51",  $key['cual2']);

$_objPHPExcel->getActiveSheet()->setCellValue("H115", substr(utf8_encode($key['diag_ts']),0,100) );
$_objPHPExcel->getActiveSheet()->setCellValue("A117", substr(utf8_encode($key['diag_ts']), 100,124) );
$_objPHPExcel->getActiveSheet()->setCellValue("A118", substr(utf8_encode($key['diag_ts']), 224,100) );

         


 $no_integrantes=$key['no_int_familia'];
 $ingre_family=$key['p_g_ig'];
 $id_radio=$key['id_radio'];
 $v_p=$key['v_p'];
  $v_m=$key['v_m'];


 if ($v_p == "NO"){
                $_objPHPExcel->getActiveSheet()->setCellValue("Y52","X"); 
             } else {
                        $_objPHPExcel->getActiveSheet()->setCellValue("Y52", $key['edad_padre']);
             }

              if ($v_m == "NO"){
                $_objPHPExcel->getActiveSheet()->setCellValue("Y54","X"); 
             } else {
                   $_objPHPExcel->getActiveSheet()->setCellValue("Y54", $key['edad_madre']);
             }


if ($no_integrantes==1 or $no_integrantes==2) {
 
  if ($ingre_family==0) {
       $_objPHPExcel->getActiveSheet()->getStyle("F62")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==10) {
       $_objPHPExcel->getActiveSheet()->getStyle("F64")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
    if ($ingre_family==15) {
       $_objPHPExcel->getActiveSheet()->getStyle("F66")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
     if ($ingre_family==20) {
       $_objPHPExcel->getActiveSheet()->getStyle("F68")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==25) {
       $_objPHPExcel->getActiveSheet()->getStyle("F70")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==30) {
       $_objPHPExcel->getActiveSheet()->getStyle("F72")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==35) {
       $_objPHPExcel->getActiveSheet()->getStyle("F73")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==40) {
       $_objPHPExcel->getActiveSheet()->getStyle("F74")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==45) {
       $_objPHPExcel->getActiveSheet()->getStyle("F75")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==50) {
       $_objPHPExcel->getActiveSheet()->getStyle("F76")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==55) {
       $_objPHPExcel->getActiveSheet()->getStyle("F77")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }

} 



if ($no_integrantes==3 or $no_integrantes==4) {
 
  if ($ingre_family==0) {
       $_objPHPExcel->getActiveSheet()->getStyle("K62")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==5) {
       $_objPHPExcel->getActiveSheet()->getStyle("K64")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
    if ($ingre_family==10) {
       $_objPHPExcel->getActiveSheet()->getStyle("K66")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
     if ($ingre_family==15) {
       $_objPHPExcel->getActiveSheet()->getStyle("K68")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==20) {
       $_objPHPExcel->getActiveSheet()->getStyle("K70")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==25) {
       $_objPHPExcel->getActiveSheet()->getStyle("K72")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==30) {
       $_objPHPExcel->getActiveSheet()->getStyle("K73")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==35) {
       $_objPHPExcel->getActiveSheet()->getStyle("K74")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==40) {
       $_objPHPExcel->getActiveSheet()->getStyle("K75")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==45) {
       $_objPHPExcel->getActiveSheet()->getStyle("K76")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==50) {
       $_objPHPExcel->getActiveSheet()->getStyle("K77")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  
} 


if ($no_integrantes==5 or $no_integrantes==6) {
 
  if ($id_radio==3) {
       $_objPHPExcel->getActiveSheet()->getStyle("O62")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($id_radio==7) {
       $_objPHPExcel->getActiveSheet()->getStyle("O64")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
    if ($ingre_family==5) {
       $_objPHPExcel->getActiveSheet()->getStyle("O66")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
     if ($ingre_family==10) {
       $_objPHPExcel->getActiveSheet()->getStyle("O68")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==15) {
       $_objPHPExcel->getActiveSheet()->getStyle("O70")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==20) {
       $_objPHPExcel->getActiveSheet()->getStyle("O72")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==25) {
       $_objPHPExcel->getActiveSheet()->getStyle("O73")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==30) {
       $_objPHPExcel->getActiveSheet()->getStyle("O74")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==35) {
       $_objPHPExcel->getActiveSheet()->getStyle("O75")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==40) {
       $_objPHPExcel->getActiveSheet()->getStyle("O76")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==45) {
       $_objPHPExcel->getActiveSheet()->getStyle("O77")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }

} 



if ($no_integrantes==7 or $no_integrantes==8) {
 
  if ($id_radio==4) {
       $_objPHPExcel->getActiveSheet()->getStyle("R62")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($id_radio==8) {
       $_objPHPExcel->getActiveSheet()->getStyle("R64")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
    if ($id_radio==13) {
       $_objPHPExcel->getActiveSheet()->getStyle("R66")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
     if ($ingre_family==5) {
       $_objPHPExcel->getActiveSheet()->getStyle("R68")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==10) {
       $_objPHPExcel->getActiveSheet()->getStyle("R70")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==15) {
       $_objPHPExcel->getActiveSheet()->getStyle("R72")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==20) {
       $_objPHPExcel->getActiveSheet()->getStyle("R73")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==25) {
       $_objPHPExcel->getActiveSheet()->getStyle("R74")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==30) {
       $_objPHPExcel->getActiveSheet()->getStyle("R75")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==35) {
       $_objPHPExcel->getActiveSheet()->getStyle("R76")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==40) {
       $_objPHPExcel->getActiveSheet()->getStyle("R77")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  
} 

if ($no_integrantes>=9) {
 
  if ($id_radio==55) {
       $_objPHPExcel->getActiveSheet()->getStyle("U62")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($id_radio==9) {
       $_objPHPExcel->getActiveSheet()->getStyle("U64")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
    if ($id_radio==14) {
       $_objPHPExcel->getActiveSheet()->getStyle("U66")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
     if ($id_radio==19) {
       $_objPHPExcel->getActiveSheet()->getStyle("U68")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
   if ($ingre_family==5) {
       $_objPHPExcel->getActiveSheet()->getStyle("U70")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==10) {
       $_objPHPExcel->getActiveSheet()->getStyle("U72")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==15) {
       $_objPHPExcel->getActiveSheet()->getStyle("U73")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==20) {
       $_objPHPExcel->getActiveSheet()->getStyle("U74")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==25) {
       $_objPHPExcel->getActiveSheet()->getStyle("U75")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==30) {
       $_objPHPExcel->getActiveSheet()->getStyle("U76")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  if ($ingre_family==35) {
       $_objPHPExcel->getActiveSheet()->getStyle("U77")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
  }
  
} 



           $fkunidadp=$key['fk_unidad_P'];
          if($fkunidadp==776) {
             $_objPHPExcel->getActiveSheet()->setCellValue("H33", $key['descripcion']);

           }
           else
            { $_objPHPExcel->getActiveSheet()->setCellValue("H33", $key['nombre_unidad']);
            }
       
            $p_g_o=$key['p_g_o'];
          $sexo=$key['sexo'];
          $eaphic=$key['eaphic'];
          $hali=$key['hali'];
          $derecho_habiente=$key['derecho_habiente'];
          $caso_medico_legal=$key['caso_medico_legal'];
          $donacion_sangre = $key['donacion_sangre'];
          $sexo_informante = $key['sexo_informante'];
          $nombre_informante = $key['nombre_informante'];
          $parentesco = $key['parentesco'];
          $parentesco_responsable = $key['parentesco_responsable'];
          $hali_madre = $key['hali_madre'];
          $hali_responsable = $key['hali_responsable'];
          $punto_total_e = $key['p_g_eg'];
          $cv_d_r_v = $key['cv_d_r_v'];
          $cv_tv = $key['cv_tv'];
          $cv_sp = $key['cv_sp'];
          $cv_si = $key['cv_si'];
          $cv_mc = $key['cv_mc'];
          $cv_nd = $key['cv_nd'];
          $cv_npd = $key['cv_npd'];
          $esif = $key['esif'];
          $esif_ttep = $key['esif_ttep'];
          $esif_op_i = $key['esif_op_i'];
          $p_g_total = $key['p_g_total'];
             

          if ($p_g_o == 0){
                        $_objPHPExcel->getActiveSheet()->getStyle("AC92")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
                  if ($p_g_o == 1){
                        $_objPHPExcel->getActiveSheet()->getStyle("AC93")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
                  if ($p_g_o == 2){
                        $_objPHPExcel->getActiveSheet()->getStyle("AC94")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
                  if ($p_g_o == 4){
                        $_objPHPExcel->getActiveSheet()->getStyle("AC96")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
                  if ($p_g_o == 6){
                        $_objPHPExcel->getActiveSheet()->getStyle("AC97")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
                  if ($p_g_o == 10){
                        $_objPHPExcel->getActiveSheet()->getStyle("AC98")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }

              if ($hali_responsable == "SI"){
                $_objPHPExcel->getActiveSheet()->setCellValue("M51","X"); 
             }



              if ($hali_responsable == "NO"){
                $_objPHPExcel->getActiveSheet()->setCellValue("O51","X"); 
             }
             if($sexo == "MASCULINO") {
                $_objPHPExcel->getActiveSheet()->setCellValue("I19","X");
              }
             if ($sexo == "FEMENINO") {
                $_objPHPExcel->getActiveSheet()->setCellValue("K19","X"); 
             } 
             if ($eaphic == "SI"){
                $_objPHPExcel->getActiveSheet()->setCellValue("Y21","X"); 
             }
              if ($eaphic == "NO"){
                $_objPHPExcel->getActiveSheet()->setCellValue("AA21","X"); 
             }
             if ($hali == "SI"){
                $_objPHPExcel->getActiveSheet()->setCellValue("M24","X"); 
             }
              if ($hali == "NO"){
                $_objPHPExcel->getActiveSheet()->setCellValue("O24","X"); 
             }
             if ($derecho_habiente == "IMSS") {
                $_objPHPExcel->getActiveSheet()->setCellValue("D31","X"); 
             }
             if ($derecho_habiente == "ISSET") {
                $_objPHPExcel->getActiveSheet()->setCellValue("H31","X"); 
             }
             if ($derecho_habiente == "ISSSTE") {
                $_objPHPExcel->getActiveSheet()->setCellValue("L31","X"); 
             }
             if ($derecho_habiente == "NAVAL") {
                $_objPHPExcel->getActiveSheet()->setCellValue("P31","X"); 
             }
             if ($derecho_habiente == "PEMEX") {
                $_objPHPExcel->getActiveSheet()->setCellValue("T31","X"); 
             }
             if ($derecho_habiente == "SEGURO POPULAR") {
                $_objPHPExcel->getActiveSheet()->setCellValue("AA31","X"); 
             }
             if ($derecho_habiente == "OTROS...") {
                $_objPHPExcel->getActiveSheet()->setCellValue("AF31","X"); 
             }
             if ($caso_medico_legal == "SI") {
                 $_objPHPExcel->getActiveSheet()->setCellValue("I35","X");
             }
             if ($caso_medico_legal == "NO") {
                 $_objPHPExcel->getActiveSheet()->setCellValue("K35","X");
             }
             if ($donacion_sangre == "SI") {
                $_objPHPExcel->getActiveSheet()->setCellValue("N36","X");
             }
             if ($donacion_sangre == "NO") {
                $_objPHPExcel->getActiveSheet()->setCellValue("P36","X");
             }
             if ($sexo_informante == "MASCULINO") {
                $_objPHPExcel->getActiveSheet()->setCellValue("E40","X");
             }
             if ($sexo_informante == "FEMENINO") {
                $_objPHPExcel->getActiveSheet()->setCellValue("G40","X");
             }
             if ($nombre_informante == NULL) {
              $_objPHPExcel->getActiveSheet()->setCellValue("AP40","X");
             }
             if ($parentesco != "---") { 
              $_objPHPExcel->getActiveSheet()->setCellValue("AB38", $parentesco);
             }
             if ($parentesco_responsable != "---") {
            $_objPHPExcel->getActiveSheet()->setCellValue("F45", $parentesco_responsable);
             }
              if ($hali_madre == "SI") {
                $_objPHPExcel->getActiveSheet()->setCellValue("S57","X");
             }
             if ($hali_madre == "NO") {
                $_objPHPExcel->getActiveSheet()->setCellValue("U57","X");
             } 
             if ($punto_total_e == 0) {
                //$_objPHPExcel->getActiveSheet()->setCellValue("AN75","X");
                 $_objPHPExcel->getActiveSheet()->getStyle("AN74")->getFill()->applyFromArray(array(
                  'type' => PHPExcel_Style_Fill::FILL_SOLID,
                  'startcolor' => array(
                       'rgb' => 'a7d490'
                  )
              ));
             }
              if ($punto_total_e == 3) {
              
                 $_objPHPExcel->getActiveSheet()->getStyle("AN75")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
             }
              if ($punto_total_e == 7) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN77","X");

                 $_objPHPExcel->getActiveSheet()->getStyle("AN76")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($punto_total_e == 10) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN77")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_d_r_v == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S81")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_d_r_v == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S82")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_d_r_v == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S83")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_d_r_v == 3) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S84")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_tv == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S86")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_tv == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S87")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_tv == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S88")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_tv == 5) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S89")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_sp == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S92")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_sp == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S93")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_sp == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S94")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_sp == 3) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S95")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
           
             if ($cv_si == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S97")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_si == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S98")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_si == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S99")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_si == 3) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S100")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_mc == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S102")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_mc == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S103")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_mc == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S104")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_nd == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S106")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_nd == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S107")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_nd == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S108")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_npd == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S110")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
               if ($cv_npd == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S111")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
                   if ($cv_npd == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S112")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
                if ($esif == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN80")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
 if ($esif == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN81")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($esif == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN82")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($esif_ttep == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN84")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($esif_ttep == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN85")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($esif_ttep == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN86")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($esif_op_i == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN88")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($esif_op_i == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN89")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total <= 12) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("V101")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($p_g_total >= 13 && $p_g_total <=24 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("X101")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total >= 25 && $p_g_total <=36 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AA101")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total >= 37 && $p_g_total <=52 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AD101")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total >= 53 && $p_g_total <=68 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AI101")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total >= 69 && $p_g_total <=84 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AL101")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total >= 85 && $p_g_total <=100 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN101")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              else { 
              
              }

           

       
       
        }


if ($fileFormat == 'pdf') {
 PHPExcel_Settings::setPdfRenderer(PHPExcel_Settings::PDF_RENDERER_MPDF, $mPDFLibraryPath);
     
 $objWriter = PHPExcel_IOFactory::createWriter($_objPHPExcel, 'PDF');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment;filename="'.$fileName.'.pdf"');

} 
else { 
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$fileName.'.xlsx"');
    $objWriter = PHPExcel_IOFactory::createWriter($_objPHPExcel, 'Excel2007');

}
 header('Cache-Control: max-age=0');
  $objWriter->save('php://output');

exit;
?>



