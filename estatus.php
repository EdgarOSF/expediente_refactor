<?php  
include_once 'php/conexion.php';
include_once 'php/modulo_estatus.php';
$con = new conexion();
$estatus= new modulo_estatus();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ESTATUS DEL PACIENTE</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="resources/font-awesome-4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="resources/css/ionicons.min.css"> 
  <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="resources/plugins/datatable/css/dataTables.editor.min.css">
  <link rel="icon" href="img/iconmonitor.png" type="image/x-icon"/>
<link rel="shortcut icon" href="img/1.png" type="image/x-icon"/>
  <!--<link rel="shortcut icon" href="resources/img/logo3.png" type="image/x-icon"/>-->
  <style>
     tr:nth-child(even) {
        background:rgba(255,152,0,0.31);
    }
    tr:nth-child(odd){
        

    }
  </style>
</head>
<body class="hold-transition login-page" style="background: rgb(255,255,255);">


   <video controls="true" width="100%" class="video-stream html5-main-video"  style=" display: none;" tabindex="-1"  id="videogeneral"   preload="metadata" >
     <source src="archivos/<?php  echo $estatus->consultar_video($_GET['id_unidad']).".mp4" ?>" type="video/mp4" />
  
    Su navegador no soporta contenido multimedia.
</video>

    <div class="box-body" id="general">
        
    <div class="row" style="">
       <div class="col-lg-3" align="left">  <img class="img-responsive"  alt="Responsive image" align="center" src="img/logo1.png" style="margin-top: 0px;width: 250px;">
       </div>
       <div class="col-lg-7">
         
    <h1 align="center" style=" width:850px;margin-top: 0;font-size: 2em;font-weight: 700;    "><?php echo $_GET['nombre_unidad'] ?></h1> 
      
       </div>

         <div class="col-lg-2"><h3>Actualizado a las : <?php  echo $estatus->consultar_hora( $_GET["id_unidad"]); ?></h3></div>
      
      
    </div>
   
   
            <div class="panel-body table-responsive" id="divpaciente" style="height: 800px">
             <table id="tabla_pacientes" style="font-size: 16px; " class="table table-sm">
                <thead>
                <tr style="color: black;font-size: 25px;   text-transform: uppercase; ">   
                 
               
               
                  <th style="border-bottom:7px solid black;">SERVICIO</th>   
                  <th style="border-bottom:7px solid black;">UBICACION</th>         
                  <th style="border-bottom:7px solid black;">Cama</th>
                  <th style="border-bottom:7px solid black;">No. EXPEDIENTE</th> 
                  
                  <th style="border-bottom:7px solid black;">Estado de Salud</th>
                  <th style="border-bottom:7px solid black;">Fecha de Ingreso</th>
                   <th style="border-bottom:7px solid black;">Observaciones</th>
                
                </tr>
                </thead>
                <tbody style=" font-family: Calibri, Candara, Segoe; 
               font-size: 27px;
  font-style: normal; text-transform: uppercase; font-weight: 700;" id="bodytabla">
                <?php 
               /* $fkunidad=774;
                  $array= $con->getDatos("SELECT p.id,p.fecha_ingreso,p.nombre,p.edad,p.sexo,ua.nombre AS nombre_unidad,p.estado_paciente,p.fecha_egreso,p.observaciones,s.servicio as servicio,p.estatus FROM pacientes AS p LEFT JOIN unidades_adm AS ua ON ua.id=fk_unidad_ingreso  
                    LEFT JOIN servicios as s on s.id=p.fk_servicio_ingresa WHERE p.fk_unidad_ingreso='".$fkunidad."'");
                   $i=0;
                  $fecha_ingreso="";
                 
                  foreach ($array as $key) {
                    if(isset($key["fecha_ingreso"]))
                          $fecha_ingreso=date_format($key["fecha_ingreso"], 'd-m-Y');
                          
                    
                           echo "<tr><td>".utf8_encode($key["nombre"])."</td>
                              
                              <td>".utf8_encode($key["sexo"])."</td>
                              <td>".utf8_encode($key["servicio"])."</td>
                              <td>".utf8_encode($key["estado_paciente"])."</td>
                              <td>".$fecha_ingreso."</td></tr>";
            }  */?>
                </tbody>
               
              </table>


</div>
<MARQUEE WIDTH="100%" style="background: black; color:white;font-family: Calibri, Candara, Segoe; font-size: 26px; font-style: normal; text-transform: uppercase; font-weight: 700;" HEIGHT=40>
<?php  echo $estatus->consultar_marque($_GET['id_unidad']) ?>
</MARQUEE>
</div>
</div>
</div>
<footer class="text-muted" align="center">
    <div >
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a>Unidad de Tecnologías de la Información</a>.</strong> Todos los derechos reservados
  </footer>
</div>

<script src="views/plugins/jQuery/jquery-3.6.4.min.js"></script>
<script src="views/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="resources/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="resources/plugins/datatable/js/dataTables.tableTools.min.js"></script>



<script> 
var cronometro;
function reproducir_video()
{ 
     $("#general").hide();
    $("#videogeneral").show();   
      var vid = document.getElementById("videogeneral");
    
         vid.autoplay=true;
         vid.load();


      $("#videogeneral").on('ended', function(){
         $("#videogeneral").hide("slow");
          location.reload();
      });
    
}
 function detenerse()
    {
        clearInterval(cronometro);
    }

$(document).ready(function() {
  
  
   var table=$("#tabla_pacientes").DataTable(
        { "language": {
            "url": "resources/json/Spanish.json"
        },
        "bProcessing": true,
        "sAjaxDataProp":"",   
        "iDisplayStart": 0,
         "order": [[ 0, "asc" ]],
        searching: false,
         
           "bPaginate": true,
          "bInfo":false,
         "ajax": "php/main.php?opcion=C_PACIENTES_PANTALLA&id_unidad="+<?php echo $_GET["id_unidad"] ?>,
          "columns": [
                 { "data": "servicio" },
                 { "data": "ubicacion" },
                 { "data": "cama" },
                 { "data": "no_expediente" },
                 { "data": "estado_paciente" },
                 { "data": "fecha_ingreso" },
                { "data": "observaciones" },
          ],

        "fnDrawCallback": function(oSettings) {
       
            $('.dataTables_paginate').hide();
            $('.dataTables_length').hide();
        
    }
      

  });



 var i=0;
cronometro = setInterval( function () {
   var cantidad_registros=0;
   var paginas=0;
   
   $.ajax({url:"php/main.php?opcion=C_PACIENTES_PANTALLA&id_unidad="+<?php echo $_GET["id_unidad"]?>,type:"POST",cache:false,async:false,dataType:"json",success:function(respuesta){
        cantidad_registros=respuesta.length;

       }});

   paginas = cantidad_registros/10;
   var paginasr=Math.round( paginas);
   if(paginas>paginasr)
   {
    paginasr+=1;
   }
 if(i == paginasr) {
  
  i=0;
var tiempo1=2;

 var hora = new Date();
 var minuto= hora.getMinutes();
    if(true) 
    {    detenerse();
         reproducir_video();
     
    }

 table.ajax.reload();
 }
   table.page(i).draw(false);
   

    i++;
}, 14000 );







//$('.dataTables_paginate').addClass('dropdown_pager');


  //var totalPages = $('.dropdown_pager ul li:nth-last-child(2) a').attr('data-dt-idx');
  
  /* find pagination and change classes */
  //$('.dropdown_pager').removeClass('dataTables_paginate paging_simple_numbers');
  //$('.dropdown_pager').addClass('btn-group pull-right');
  
  // wrap all except next and previous button in appropriate tags
  //$('.dropdown_pager ul').each(function (){
 //   $(this).children().not('.previous, .next').wrapAll('<div class="btn-group" id="example_paginate"><ul class="dropdown-menu pull-right"></ul></div>');
  //});
  
  // add toggle button before dropdown-menu
  //$( '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><small>' + activePage + ' of ' + totalPages + '</small> <span class="caret"></span></button>' ).insertBefore('.dropdown_pager ul .btn-group ul');
  
  
  /* convert pagination to drop down */
  //$('.dropdown_pager ul:first-child').addClass('btn-group');
  /* find all the list items with paginate_button and remove it*/
  //$('.dropdown_pager li').removeClass('paginate_button');

});


/*$(document).ready(function() {
      var fk_unidad=774;
    var cuerpohtml="<table id='tabla_pacientes' style='font-size: 16px; ' class='table table-bordered table-striped table-hover'><thead><tr><th>Nombre</th><th>Sexo</th><th>Servicio</th><th>Estado del paciente</th><th>Fecha </th></tr></thead><tbody style='font: 120% sans-serif small-caps; font-size:30px;  text-transform: uppercase;'' id='bodytabla'>";
    var cuerpohtml2="";
    var i=0;
    $.ajax({url:"php/main.php",type:"POST",dataType:"json",data:"opcion=CONSULTAR_PACIENTES&fk_unidad="+fk_unidad,cache:false,success:function(respuesta){


       
      for (key in respuesta) {
       i++;
       // if(i<=10)
      //  {
           cuerpohtml+="<tr><td>"+respuesta[key].nombre+"</td><td>"+respuesta[key].sexo+"</td><td>"+respuesta[key].servicio+"</td><td>"+respuesta[key].estado_paciente+"</td><td>"+respuesta[key].fecha_ingreso+"</td></tr>";
   
        //}
       // else
       // {    
         /*     cuerpohtml2+="<tr><td>"+respuesta[key].nombre+"</td><td>"+respuesta[key].sexo+"</td><td>"+respuesta[key].servicio+"</td><td>"+respuesta[key].estado_paciente+"</td><td>"+respuesta[key].fecha_ingreso+"</td></tr>";
*/
       // }


 /*     }
       cuerpohtml+="</tbody><tfoot><tr> <th>Nombre</th><th>Sexo</th><th>Servicio</th><th>Estado del paciente</th><th>Fecha </th></tr></tfoot></table>";
       $("#divpaciente").html(cuerpohtml);
    }});
});

 var table = $("#tabla_pacientes").dataTable();


      //setInterval(getRandValue, 3000);
     
     // table.rows(".selected").data();
     
 

    
});
*/
</script>

</body>
</html>
