<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require_once dirname(__FILE__) . '../../librerias/phpexcel/Classes/PHPExcel.php';
include_once dirname(__FILE__) .'../../librerias/phpexcel/Classes/PHPExcel/IOFactory.php';

require_once 'conexion.php';
extract($_REQUEST);
$conexion= new conexion();
$datos=$conexion->getDatos("SELECT ih.fecha_ingreso as fecha_elaboracion,ih.servicio_ingreso,ih.espcialidad,no_e.no_expediente,p.folio_sp, p.unidad_referencia, p.nombre,p.ap_p,p.ap_m, p.diagnostico_egreso, p.edad,p.sexo, p.estado_civil, p.religion, p.curp, p.eaphic,p.cual, p.fecha_nacimiento,p.lugar_nacimineto,p.hali,p.cual1,p.escolaridad,o.ocupacion,p.domicilio_actual,p.referencia_domiciliaria,p.telefono,p.derecho_habiente,ua.nombre AS nombre_unidad,p.nucleo_basico,p.caso_medico_legal,p.donacion_sangre,p.folio, di.id AS id_informante, di.nombre_informante, di.edad_informante, di.parentesco, di.sexo_informante, di.ocupacion_informante, di.telefono_informante, dr.id AS id_responsable,dr.nombre_responsable, dr.edad_responsable,dr.parentesco_responsable,dr.escolaridad_responsable,dr.religion_responsable,dr.telefono_responsable, ocu.ocupacion as ocupacion_responsable,t_oc.puntos, dr.lugar_trabajo,dr.direccion_responsable,dr.hali_responsable,dr.cual2,dr.nombre_padre_resp,dr.edad_padre,dr.religion_padre,dr.estado_civil_padre,dr.telefono_padre,dr.nombre_madre,dr.edad_madre,dr.religion_madre,dr.estado_civil_madre,dr.telefono_madre,dr.hali_madre,dr.cual3,dr.no_int_familia,dr.fk_salud_familiar,sf.esif,sf.esif_op_i,sf.esif_ttep,sf.esif_total,v.id as id_vivienda, v.cv_d_r_v,v.cv_tv,v.cv_sp,v.cv_si,v.cv_mc,v.cv_nd,v.cv_npd,v.cv_total,ef.id AS id_egreso,ef.i_m_j_f, ef.i_m_esposo,ef.i_m_hijo,ef.otros_apoyos,ef.i_m_otros,ef.i_alimentacion,ef.i_renta_predial,ef.i_agua,ef.i_luz,ef.i_combustible,ef.i_trasporte,ef.i_eduacion,ef.i_total,ef.total_regla,ef.i_m_total,pg.id as id_pg ,pg.p_g_ig,pg.p_g_eg,pg.p_g_v,pg.p_g_s,pg.p_g_o,pg.p_g_total,pg.p_g_total,pg.nombre_ts,pg.cedula_ts,pg.diag_ts,pg.r_m_ts from ingresos_hospitalarios as ih LEFT JOIN pacientes as p on p.id=ih.fk_paciente_ingreso  LEFT JOIN datos_responsable as dr on dr.id=p.fk_datos_responsable LEFT JOIN no_expedientes as no_e on no_e.fk_paciente_exp=p.id LEFT JOIN  unidades_adm AS ua ON ua.id=fk_unidad_P LEFT JOIN ocupaciones as o ON o.id=fk_ocupacion_p  LEFT JOIN datos_informante AS di ON di.id=fk_datos_informante  LEFT JOIN ocupaciones as ocu ON ocu.id=fk_ocupacion LEFT JOIN tipos_ocupaciones as t_oc ON t_oc.id=ocu.fk_tipos_ocupaciones LEFT JOIN salud_familiar as sf on sf.id=dr.fk_salud_familiar LEFT JOIN vivienda as v ON v.id=dr.fk_vivienda LEFT JOIN egreso_familiar as ef on ef.id=dr.fk_ingreso_familiar LEFT JOIN puntos_generales as pg on pg.id=dr.fk_puntos_generales WHERE p.id='".$id."'");

$ruta = '../plantillas/';
$extension=".xlsx";
$titulo="formatofinal.xlsx";
$hoja=0;
$tipo='excel';
$_objPHPExcel = new PHPExcel();
$archivo= $titulo;
$archivo_salida=date('Y-m-d H:i:s');
$objPHPExcel = PHPExcel_IOFactory::load($ruta.$titulo);
      if(is_int($hoja)) { $objWorkSheet = $objPHPExcel->getSheet($hoja); }
      else { $objWorkSheet = $objPHPExcel->getSheetByName($hoja); }
      $_objPHPExcel->addExternalSheet($objWorkSheet,0);
      $_objPHPExcel->removeSheetByIndex(1);
      $_objPHPExcel->setActiveSheetIndex(0);

    

      
     // if($tipo == 'pdf') { $_objPHPExcel->getActiveSheet()->setShowGridLines(false); }

 
      if($_objPHPExcel->getSheetCount() > 1) { $_objPHPExcel->removeSheetByIndex(0); }
  
      if($tipo == 'excel')
      {
        $extension = '.xlsx';
        $_objWriter = PHPExcel_IOFactory::createWriter($_objPHPExcel, 'Excel2007');
      }
      else if($tipo == 'pdf')
      {
        $extension = '.pdf';
        $_objWriter = PHPExcel_IOFactory::createWriter($_objPHPExcel, 'PDF');
         $_objWriter->setFont('helvetica');
         $_objWriter->writeAllSheets();
      }
    foreach ($datos as $key) {
       $fecha_elaboracion="";
      if(isset($key["fecha_elaboracion"]))
          $fecha_elaboracion=date_format($key["fecha_elaboracion"], 'd-m-Y');

        $fecha_nacimiento="";
      if(isset($key["fecha_nacimiento"]))
          $fecha_nacimiento=date_format($key["fecha_nacimiento"], 'd-m-Y');

          $_objPHPExcel->getActiveSheet()->setCellValue("I13", $key['nombre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("T13", $key['ap_p']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AF13", $key['ap_m']);
          $_objPHPExcel->getActiveSheet()->setCellValue("J10", $fecha_elaboracion);
          $_objPHPExcel->getActiveSheet()->setCellValue("AI9", $key['folio_sp']);
          $_objPHPExcel->getActiveSheet()->setCellValue("G15", $key['no_expediente']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AK11", $key['unidad_referencia']);
          $_objPHPExcel->getActiveSheet()->setCellValue("U15", $key['servicio_ingreso']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AJ15", $key['espcialidad']);
          $_objPHPExcel->getActiveSheet()->setCellValue("J17", $key['diagnostico_egreso']);
          $_objPHPExcel->getActiveSheet()->setCellValue("D19", $key['edad']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Y19", $key['religion']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AI19", $key['curp']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Q19", $key['estado_civil']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AE21", $key['cual']);
          $_objPHPExcel->getActiveSheet()->setCellValue("H22", $fecha_nacimiento);
          $_objPHPExcel->getActiveSheet()->setCellValue("U22", $key['lugar_nacimineto']);
          $_objPHPExcel->getActiveSheet()->setCellValue("S24", $key['cual1']);
          $_objPHPExcel->getActiveSheet()->setCellValue("R25", $key['ocupacion']);
          $_objPHPExcel->getActiveSheet()->setCellValue("F25", $key['escolaridad']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AE25", $key['telefono']);
          $_objPHPExcel->getActiveSheet()->setCellValue("G27", $key['domicilio_actual']);
          $_objPHPExcel->getActiveSheet()->setCellValue("K29", $key['referencia_domiciliaria']);
          $_objPHPExcel->getActiveSheet()->setCellValue("H33", $key['nombre_unidad']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AK33", $key['nucleo_basico']);
          $_objPHPExcel->getActiveSheet()->setCellValue("T36", $key['folio']);
          $_objPHPExcel->getActiveSheet()->setCellValue("F38", $key['nombre_informante']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AL38", $key['edad_informante']);
          $_objPHPExcel->getActiveSheet()->setCellValue("M40", $key['ocupacion_informante']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Z40", $key['telefono_informante']);
          $_objPHPExcel->getActiveSheet()->setCellValue("M43", $key['nombre_responsable']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM43", $key['edad_responsable']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Q45", $key['escolaridad_responsable']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AB45", $key['religion_responsable']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM45", $key['telefono_responsable']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Z47", $key['lugar_trabajo']);
          $_objPHPExcel->getActiveSheet()->setCellValue("F49", $key['direccion_responsable']);
          $_objPHPExcel->getActiveSheet()->setCellValue("F47", $key['ocupacion_responsable']);
          $_objPHPExcel->getActiveSheet()->setCellValue("H52", $key['nombre_padre_resp']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Y52", $key['edad_padre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AG52", $key['religion_padre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("F53", $key['estado_civil_padre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Y53", $key['telefono_padre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("H54", $key['nombre_madre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Y54", $key['edad_madre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AG54", $key['religion_madre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("F55", $key['estado_civil_madre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Y55", $key['telefono_madre']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Y57", $key['cual3']);
          $_objPHPExcel->getActiveSheet()->setCellValue("N58", $key['no_int_familia']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AC62", $key['i_m_j_f']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AC63", $key['i_m_esposo']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AC65", $key['i_m_hijo']);
          $_objPHPExcel->getActiveSheet()->setCellValue("Y69", $key['otros_apoyos']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AC69", $key['i_m_otros']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AC70", $key['i_m_total']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM63", $key['i_alimentacion']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM65", $key['i_renta_predial']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM66", $key['i_agua']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM67", $key['i_luz']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM68", $key['i_combustible']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM69", $key['i_trasporte']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM70", $key['i_eduacion']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM71", $key['i_total']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO95", $key['p_g_eg']);
          $_objPHPExcel->getActiveSheet()->setCellValue("S114", $key['p_g_v']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO96", $key['p_g_v']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO94", $key['p_g_ig']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO97", $key['p_g_s']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO98", $key['p_g_o']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AO99", $key['p_g_total']);
          $_objPHPExcel->getActiveSheet()->setCellValue("V110", $key['nombre_ts']);
          $_objPHPExcel->getActiveSheet()->setCellValue("AM110", $key['cedula_ts']);
          $_objPHPExcel->getActiveSheet()->setCellValue("I117", $key['diag_ts']);
          $_objPHPExcel->getActiveSheet()->setCellValue("J120", $key['r_m_ts']);
          $_objPHPExcel->getActiveSheet()->setCellValue("R51", $key['cual2']);



  
         
         
             
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
                $_objPHPExcel->getActiveSheet()->setCellValue("D10","X"); 
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
                $_objPHPExcel->getActiveSheet()->setCellValue("F40","X");
             }
             if ($sexo_informante == "FEMENINO") {
                $_objPHPExcel->getActiveSheet()->setCellValue("H40","X");
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
                 $_objPHPExcel->getActiveSheet()->getStyle("AN75")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
             }
              if ($punto_total_e == 3) {
              
                 $_objPHPExcel->getActiveSheet()->getStyle("AN76")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));
             }
              if ($punto_total_e == 7) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN77","X");

                 $_objPHPExcel->getActiveSheet()->getStyle("AN77")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($punto_total_e == 10) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN78")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_d_r_v == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S82")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_d_r_v == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S83")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_d_r_v == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S84")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_d_r_v == 3) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S85")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_tv == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S87")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_tv == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S88")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_tv == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S89")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_tv == 5) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S90")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_sp == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S93")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_sp == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S94")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_sp == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S95")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_sp == 3) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S96")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
           
             if ($cv_si == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S98")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_si == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S99")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_si == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S100")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_si == 3) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S101")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_mc == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S103")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_mc == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S104")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_mc == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S105")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_nd == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S107")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_nd == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S108")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($cv_nd == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S109")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($cv_npd == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S111")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
               if ($cv_npd == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S112")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
                   if ($cv_npd == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("S113")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
                if ($esif == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN81")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
 if ($esif == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN82")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($esif == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN83")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($esif_ttep == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN85")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($esif_ttep == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN86")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($esif_ttep == 2) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN87")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($esif_op_i == 0) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN89")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($esif_op_i == 1) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN90")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total <= 12) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("V102")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
             if ($p_g_total >= 12 && $p_g_total <=24 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("X102")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total >= 25 && $p_g_total <=36 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AA102")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total >= 37 && $p_g_total <=52 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AD102")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total >= 53 && $p_g_total <=68 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AI102")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total >= 69 && $p_g_total <=84 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AL102")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              if ($p_g_total >= 85 && $p_g_total <=100 ) {
               // $_objPHPExcel->getActiveSheet()->setCellValue("AN78","X");
                $_objPHPExcel->getActiveSheet()->getStyle("AN102")->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => 'a7d490'
        )
    ));

             }
              else { 
              
              }

                

          $_objWriter->save($archivo);    
        }






   if($tipo=='excel')
     { header('Content-type: application/force-download');
      header('Content-Disposition: attachment; filename="'.$archivo_salida.$extension.'"');
      header('Content-Transfer-Encoding: binary');
      readfile($archivo);
    }
    else if($tipo=='pdf')
    {
       $size = filesize($archivo);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$archivo_salida.$extension.'"');
        header('Cache-Control: max-age=0');
        $_objWriter->save('php://output');
     
    }
   
       
exit;

//9933085610
?>



