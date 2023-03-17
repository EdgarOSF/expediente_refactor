<?php
require_once dirname(__FILE__) . '../../librerias/PHPExcel-1.8.1/Classes/PHPExcel.php';
$mPDFLibraryPath = '../librerias/mpdf60';
ini_set('display_errors', 0);
session_start();
require_once 'conexion.php';
extract($_REQUEST);
$conexion= new conexion();
 date_default_timezone_set('America/Mexico_City');
 
$ruta = '../plantillas/';
$titulo="censohospitalario.xlsx";
$hoja=0;
$fileFormat = 'xlsx';
$fileName = "Registro-".date('Y-m-d');
$_objPHPExcel = new PHPExcel();
   
   $objPHPExcel = PHPExcel_IOFactory::load($ruta.$titulo);
      if(is_int($hoja)) { $objWorkSheet = $objPHPExcel->getSheet($hoja); 
      }
      else { $objWorkSheet = $objPHPExcel->getSheetByName($hoja); }
          $_objPHPExcel->getProperties()->setTitle("Reporte"); // Titulo 
          $objWorkSheet->setShowGridLines(true);
          $_objPHPExcel->addExternalSheet($objWorkSheet,0);

          $_objPHPExcel->setActiveSheetIndex(0);
          $idservicio=$_GET['idservicio'];

          $array2=$conexion->getDatos("SELECT * FROM servicios WHERE id=".$idservicio);

       
        $array=$conexion->getDatos("SELECT sv.servicio,p.publicado,dr.status,p.act_nacimiento,p.copia_sp,p.pase, p.id,p.caso_medico_legal ,p.folio_sp,p.no_expediente,p.nombre,p.ap_m,p.ap_p,p.edad,p.sexo,p.domicilio_actual,p.derecho_habiente,p.fk_cama,c.nomenclatura,c.consecutivo,c.fk_servicio, p.fk_ubicacion, p.estado_paciente, p.diagnostico_medico, p.observaciones,p.fecha_ingreso FROM pacientes AS p 
LEFT JOIN camas as c on c.id=p.fk_cama  
LEFT JOIN datos_responsable as dr on dr.id=p.fk_datos_responsable 
LEFT JOIN servicios as sv ON sv.id=c.fk_servicio
WHERE dr.status=1 AND p.fk_unidad_ingreso='".$_SESSION['fk_unidad_adm']."' AND sv.id=".$idservicio." AND  p.fk_cama is not null  AND p.fecha_egreso IS NULL ORDER BY(consecutivo) ASC");

     $_array=array();
      $i=8;
      $fecha_egreso="";
      $fecha_ingreso="";
      $_objPHPExcel->getActiveSheet()->setCellValue("C6","".utf8_encode($array2[0]['servicio']));
      $_objPHPExcel->getActiveSheet()->setCellValue("F2","".utf8_encode($_SESSION["nombre_unidad"]));

    
          $estilo = array( 
            'borders' => array(
              'outline' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
              )
            )
          );
      $filas=count($array)+7;
       $_objPHPExcel->getActiveSheet()
                ->getStyle('B8:U'.$filas)
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
                ->getColor()
                ->setRGB('000000');
     
      $_objPHPExcel->getActiveSheet()->setCellValue("L5",date('d-m-Y H:i:s'));
        $_objPHPExcel->getActiveSheet()->setCellValue("Q5",strtoupper($_SESSION['nombre']));

    
     foreach ($array as $key)
      {     
       
        if($key["fecha_egreso"]==null) $fecha_egreso="";
        else $fecha_egreso=date_format($key["fecha_egreso"], 'd-m-Y H:i:s');
        if($key["fecha_ingreso"]==null) $fecha_ingreso="";
        else $fecha_ingreso=date_format($key["fecha_ingreso"], 'd-m-Y H:i:s');

        
         $_objPHPExcel->getActiveSheet()->setCellValue("B".$i, $key['nomenclatura']);
         $_objPHPExcel->getActiveSheet()->setCellValue("C".$i, $key['nombre']);
         $_objPHPExcel->getActiveSheet()->setCellValue("D".$i, $key['no_expediente']);
         $_objPHPExcel->getActiveSheet()->setCellValue("E".$i, $key['edad']);
         $_objPHPExcel->getActiveSheet()->setCellValue("F".$i, ($key['sexo']=="MASCULINO") ? "M" :"F");
         $_objPHPExcel->getActiveSheet()->setCellValue("G".$i, $key['domicilio_actual']);

         $_objPHPExcel->getActiveSheet()->setCellValue("J".$i, $key['derecho_habiente']);
         $_objPHPExcel->getActiveSheet()->setCellValue("K".$i, $key['diagnostico_medico']);
         $_objPHPExcel->getActiveSheet()->setCellValue("L".$i, $fecha_ingreso);
         $_objPHPExcel->getActiveSheet()->setCellValue("M".$i, $fecha_egreso);

      
      
         $_objPHPExcel->getActiveSheet()->setCellValue("N".$i, $key['dias']+1);
         $_objPHPExcel->getActiveSheet()->setCellValue("O".$i, $key['caso_medico_legal']);
         $_objPHPExcel->getActiveSheet()->setCellValue("P".$i, $key['observaciones']);

         $_objPHPExcel->getActiveSheet()->setCellValue("Q".$i, ($key['status']==1) ?  "x": "");
         $_objPHPExcel->getActiveSheet()->setCellValue("R".$i, ($key['caso_medico_legal']=="SI") ?  "x": "");
         $_objPHPExcel->getActiveSheet()->setCellValue("S".$i, ($key['act_nacimiento']==1) ?  "x": "");
         $_objPHPExcel->getActiveSheet()->setCellValue("T".$i, ($key['copia_sp']==1) ?  "x": "");
         $_objPHPExcel->getActiveSheet()->setCellValue("U".$i, ($key['pase']==1) ?  "x": "");
      

          $i++;
    /*    $_array[]=array("id"=>$key['id'],"no_expediente"=>$key['no_expediente'],"cama"=>$key['cama'],"fecha_ingreso"=>$fecha_ingreso,"fecha_captura"=>date_format($key["fecha_captura"], 'd-m-Y'),"nombre"=>utf8_encode($key['nombre']),"edad"=>$key['edad'],"sexo"=>utf8_encode($key['sexo']),"nombre_unidad"=>utf8_encode($key['nombre_unidad']),"estado_paciente"=>utf8_encode($key['estado_paciente']),"fecha_egreso"=>$fecha_egreso,"ubicacion"=>$key['ubicacion'],"observaciones"=>utf8_encode($key['observaciones']),"servicio"=>utf8_encode($key['servicio']),"estatus"=>$key['estatus'],'publicado'=>$key['publicado'],"paginas"=> $i);*/

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
