<?php
session_start();
session_name("sesion_usuario");
include_once '../../php/conexion.php';
include_once '../../php/modulo_estatus.php';
$tsocial= new modulo_estatus();
$con = new conexion();
?>
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="../resources/plugins/select2-4.0.3/dist/css/select2.css">
<link rel="stylesheet" href="../resources/plugins/select2-4.0.3/dist/css/select2-bootstrap.css">
<link rel="stylesheet"  href="../resources/plugins/datatimer/bootstrap-datetimepicker.min.css" >


<script  src="plugins/datatimer/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script  src="plugins/datatimer/locales/bootstrap-datetimepicker.fr.js"charset="UTF-8" ></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script  src="../resources/js/bootstrap-switch.js" ></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
<script src="../resources/js/validator.min.js"></script>
<script src="../resources/js/bootstrap-confirmation.min.js"></script>

<script src="plugins/select2/select2.full.min.js"></script>


 

    <center><h2> <i class="fa  fa-file-text-o"></i> Estudios Socio Economicos</h1></center>
       
          <div class="box-body" >
            <div class="panel-body table-responsive">

<br>

 <div class="row">
               
                  <div class="col-md-4">
                    <div class="input-group">
                  <div class="input-group-addon">
                    <label>SERVICIO:</label>
                  </div>
                     <select class="form-control" id="ser" name="ser"  required >
                      <?php    
                      $array= $con->getDatos("SELECT * FROM servicios WHERE fk_unidad=".$_SESSION['fk_unidad_adm']);

                       foreach ($array as $key)
                       {  
                         echo "<option value='".$key['id']."'>".$key['servicio']."</option>";
                       }  
          
                     ?>
                      
                     </select>
                   </div>
                  </div>
                <div class="col-md-6">

                  <a id="informe" class="btn btn-primary"><i class="fa fa-file"></i> CENSO HOSPITALARIO .XLSX</a>
                </div>
              </div>

<br><br><br>
              <table id="tabla_pacientes_estudiolocal" style="font-size: 17px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                 

                  <th></th>
                  <th></th>       <th></th>
                   <th></th>
                  <th>Fecha de Ingreso</th>
                  <th>Folio</th>
                  <th>No. Expediente</th>
                  <th>Unidad de Referencia</th>
                  <th>Nombre del Paciente</th>
                  <th>Ap_P</th>
                  <th>Ap_M</th>
                  <th>Edad</th>
                  <th>Sexo</th>
                  <th>Domicilio Actual</th>
                  <th>Telefono</th>
                  <th>Derecho Habiente</th>
                </tr>
                </thead>
                <tbody>
        
                </tbody>
                <tfoot>
                   <tr>
   
                  <th></th>
                   <th></th>       <th></th>
                    <th></th>
                  <th>Fecha de Ingreso</th>
                  <th>Folio</th>
                  <th>No. Expediente</th>
                  <th>Unidad de Referencia</th>
                  <th>Nombre del Paciente</th>
                  <th>Ap_P</th>
                  <th>Ap_M</th>
                  <th>Edad</th>
                  <th>Sexo</th>
                  <th>Domicilio Actual</th>
                  <th>Telefono</th>
                  <th>Derecho Habiente</th>
                </tr>
                </tfoot>
              </table>
           
              </div>
            </div>



<div class="modal fade" tabindex="-1" role="dialog" id="moadal_detalle_p2">
  <div class="modal-dialog modal-lg modal-prymari" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mensaje !</h4>
      </div>
      <div class="modal-body">
          <center><h2> <i class="fa  fa-file-text-o"></i> Detalle de Ingresos</h1></center>
       
          <div class="box-body" >
            <div class="panel-body table-responsive">
              <table id="detalle_ese" style="font-size: 14px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                 
                  <th></th>
                
                  <th>Fecha de Ingreso</th>
                  <th>Folio</th>
                  <th>No. Expediente</th>
                        <th>Servicio que ingresa</th>
                  <th>Unidad de Referencia</th>
                  <th>Nombre del Paciente</th>
                  <th>Ap_P</th>
                  <th>Ap_M</th>
                  <th>Edad</th>
                  <th>Sexo</th>
                  <th>Domicilio Actual</th>
                  <th>Telefono</th>
                  <th>Derecho Habiente</th>
                </tr>
                </thead>
                <tbody>
        
                </tbody>
                <tfoot>
                   <tr>
                  
                  <th></th>
             
                  <th>Fecha de Ingreso</th>
                  <th>Folio</th>
                  <th>No. Expediente</th>
                        <th>Servicio que ingresa</th>
                  <th>Unidad de Referencia</th>
                  <th>Nombre del Paciente</th>
                  <th>Ap_P</th>
                  <th>Ap_M</th>
                  <th>Edad</th>
                  <th>Sexo</th>
                  <th>Domicilio Actual</th>
                  <th>Telefono</th>
                  <th>Derecho Habiente</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade bd-example-modal-lg" tabindex="-1"  id="modal_pantalla" role="dialog" id="detalle_estudio">
  <div class="modal-dialog modal-lg modal-prymari" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa  fa-file-text-o">Ingreso del paciente detallado</i></h4>
      </div>
      <div class="modal-body">
     
       
          <div class="box-body" >
            <div class="panel-body table-responsive">


   <form role="form" action="" id="formestatus" name="formestatus" method="post" >
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="fk_unidad_ingreso" id="fk_unidad_ingreso" value="<?php  echo $_SESSION['fk_unidad_adm']; ?>">
              <div class="row">

                 <div class="col-lg-8">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Numero de Expediente:</label>
                  </div>
                  <input type="number" class="form-control" id="no_expediente" name="no_expediente"placeholder="Numero de Expediente" required  disabled>
                </div>
              </div>
              </div>
       
               <div class="col-lg-4">
              <div class="form-group">
                    
                   <label>Mostrar en la Pantalla: 
                      <input type="checkbox"  id="publicado"  name="publicado"  data-size='mini' >
                    </label>
                 
             
              </div>
        </div>
             </div>
            <div class="row">
      <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Nombre:</label>
                  </div>
                  <input type="text" class="form-control" id="nombre" name="nombre"placeholder="Nombre del Paciente" required disabled>
                </div>
              </div>
              </div>

  <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Domicilio:</label>
                  </div>
                  <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio" disabled>
                </div>
              </div>
              </div></div>

                  <div class="row">

                <div class="col-lg-12">
 <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Derechohabiente:</label>
                  </div>
                  <select class="form-control" id="derechohabiente" disabled name="derechohabiente"><OPTION value="">---</OPTION><option>IMSS</option><option>ISSET</option><option>ISSSTE</option><option>NAVAL</option><option>PEMEX</option><option>SEGURO POPULAR</option><option>OTRO</option></select>
                </div>
              </div>    </div>
                     <div class="col-lg-12">
              <div class="form-group">
                    <div class="input-group">
                  <div class="input-group-addon">
                    <label>Caso Médico legal:  </label>
                     </div>
                     <input type="text" name="caso_medico_legal" id="caso_medico_legal" class="form-control" disabled>
                    
                   
                  </div>
          
              </div>
              </div>

          </div>
          <div class="row">
    <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Edad: </label>
                  </div>
                     <input type="text" id="edad" name="edad" class="form-control" disabled>
                 </div>
              </div>
  
              </div>

  <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Sexo: </label>
                  </div>
                    <select class="form-control" id="sexo" name="sexo" disabled required><OPTION value="">---</OPTION><option>MASCULINO</option><OPTION>FEMENINO</OPTION></select>
                 </div>
              </div> </div>
               
              </div>


 <div class="row">
              <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Servicio:</label>
                  </div>
                   <select class="form-control select2" style="width: 100%;" id="fk_servicio_ingresa" name="fk_servicio_ingresa" required>
                   <option value="">Seleccione el Servicio</option>
                   <?php  
                   $array= $con->getDatos("SELECT * FROM servicios WHERE fk_unidad=".$_SESSION['fk_unidad_adm']);
                 
                  foreach ($array as $key) {
                       echo "<option value='".$key['id']."'>".utf8_encode($key['servicio'])."</option>";
                     }
                   ?>
                  </select>
             </div>
              </div>
              </div> </div>



               <div class="row">
               <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Cama:</label>
                  </div>
               <select class="form-control select2" style="width: 100%;"id="cama" name="cama" >
                   <option value="">Seleccione la cama</option>
                  
                  </select>
                   </div>
              </div>
              </div> </div>

                    <div class="row">
               <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Ubicación:</label>
                  </div>
                  <select class="form-control select2" style="width: 100%;" id="ubicacion" name="ubicacion" required>
                   <option value="">Seleccione la Ubicacion</option>
                   <?php  
                   $array= $con->getDatos("SELECT * FROM ubicaciones WHERE fk_unidad_adm=".$_SESSION['fk_unidad_adm']);
                 
                  foreach ($array as $key) {
                       echo "<option value='".$key['id']."'>".utf8_encode($key['descripcion'])."</option>";
                     }
                   ?>
                  </select>
                   </div>
              </div>
              </div> </div>  
              <div class="row">
               <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Estado del Paciente:</label>
                  </div>
                  <select class="form-control" id="estado_paciente" name="estado_paciente" required > <option value="">---</option><option>Estable</option><option>Delicado</option><option>Grave</option></select>
                   </div>
              </div>
              </div>  
              
     
 
                   </div>

                         <div class="row">
               <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Diagnostico Médico:</label>
                  </div>
                   <input type="text" id="diagnostico_medico" name="diagnostico_medico" placeholder="Diagnostico Médico" class="form-control" >

                   </div>
              </div>
              </div>  
              
     
 
                   </div>

          
            <div class="row">
               <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>observacion:</label>
                  </div>
                  <input type="text" class="form-control"  placeholder="observacion" id="observaciones" name="observaciones" >
                   </div>
              </div>
              </div>
    </div> 
    <div class="row">
 <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha de ingreso:</label>
                  </div>
                   <input type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso" data-date-format="yyyy-mm-dd hh:ii:ss" placeholder="FECHA DE INGRESO">
              </div>
              </div>
              </div>
      <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha de egreso:</label>
                  </div>
               <input type="text" class="form-control" id="fecha_egreso" name="fecha_egreso" data-date-format="yyyy-mm-dd hh:ii:ss" placeholder="FECHA DE EGRESO">
              </div>
              </div>
              </div>





            </div>

        <br><br>
      <div class="row">       
      <div class="col-lg-3">
              <div class="form-group">
                     
                   <label>E.S.C: 

                      
                      <input type="checkbox"  id="esc"  name="esc" data-size='mini' >
                
                    </label>
              
             
              </div>
        </div>
         
         
                 <div class="col-lg-3">
              <div class="form-group">
                
                    <label>Acta.Naci: 
                      <input type="checkbox"  id="acta_nacimiento"  name="acta_nacimiento"  data-size='mini' >
                    </label>
                  
                 
               
             
              </div>
              </div>
                     
      <div class="col-lg-3">
              <div class="form-group">
                     
                   <label>Copia SP: 
                      <input type="checkbox"  id="copia_sp"  name="copia_sp"  data-size='mini' >
                    </label>
              
             
              </div>
        </div>
         
           <div class="col-lg-3">
              <div class="form-group">
                    
                   <label>Pase: 
                      <input type="checkbox"  id="pase"  name="pase"  data-size='mini' >
                    </label>
                 
             
              </div>
        </div>
             
            </div>
     
              <div class="row">
               <div class="alert alert-success alert-dismissible" id="alertaguardar" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje!</h4>
                <div id="mensaje"></div>
              </div>
                  </div>
      <div class="modal-footer">
                 <button type="submit" class="btn btn-primary pull-right" >Guardar</button>
    
      </div>

    </div><!-- /.modal-content -->
       </form> 
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->








<script>
function detalle_ingreso(id,folio_sp){

$("#moadal_detalle_p2").modal("show");

  $("#detalle_ese").DataTable(
            { "language": {
                "url": "../resources/json/Spanish.json"
  ,
            },
    
            "bProcessing": true,
            "sAjaxDataProp":"",   
            "iDisplayStart": 0,
             "order": [[ 0, "asc" ]],
             "searching" : false,
              "paging": false,
              "destroy": true,
             "ajax": "../php/main.php?opcion=CONSULTAR_ESTUDIOLOCAL_DETALLE&id_u="+<?php echo $_SESSION['fk_unidad_adm'] ?> +"&curp="+id+"&folio_sp="+folio_sp,
              
              "columns": [   
                   { "data": "id" },
                   { "data": "fecha_elaboracion"},
                   { "data": "folio_sp" },
                   { "data": "no_expediente" },
                   { "data": "servicio_ingreso" },
                   { "data": "nombre_unidad" },
                   { "data": "nombre" },
                   { "data": "ap_p" },
                   { "data": "ap_m" },
                   { "data": "edad" },
                   { "data": "sexo" },
                   { "data": "domicilio_actual" },
                   { "data": "telefono" },
                   { "data": "derecho_habiente" },
                   
              ],
              "columnDefs" :[
                   { 
                      "targets": 0,
                      "render": function (data, type, row, meta) {
                   
                      //  return "<a style='color:green'  onclick='reporte("+data+")' ><i class='fa fa-fw fa-file-pdf-o' style='cursor:pointer'></i></a>";
                       return "<a style='color:green'  href='../php/cinformes.php?id="+row.id+"' target='_blank' ><i class='fa fa-fw fa-file-pdf-o' style='cursor:pointer'></i></a>";

                      }
                    },
                    
                           

              ],
            /*   initComplete: function () {
            this.api().columns().every( function () {

                  
            var column = this;
            if(column.index()!=0  && column.index()!=1 && column.index()!=2 && column.index()!=3 && column.index()!=4 && column.index()!=7 && column.index()!=9 && column.index()!=10 && column.index()!=11 && column.index()!=12 && column.index()!=13)
              {  var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
                 }
            } );
         
        },*/
              "drawCallback": function( settings ) {
                  
                   /*       $("[data-toggle=confirmation_editar]").confirmation(
                              {
                                container:"body",
                               btnOkLabel: 'Aceptar ',
                               btnCancelLabel: ' Cancelar',
                               onConfirm:function(event, element) {  
                                var id= $(element).attr("id");
                                 $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=ELIMINAR_ESEF&id="+id,
                                   beforeSend : function()
                                        {    
                                        } ,
                                  success:function(respuesta){ 
                                  }});
                          menu('#trabajo_social'); 
                         }});

                       */

           
        }
      });
  
}




function copiar_datos(id){
 /*   var id_exportar=$('input:radio[name=id_es_gral]:checked').val();
    var fkunidadingreso =$("#fkunidadingreso").val(); 
    var si_ext=$("#si_ext").val(); 
    var n_e_ext=$("#n_e_ext").val();
    var fk_especialidades_ih=$("#fk_especialidades_ih").val();


var datos =id_exportar+"&fkunidadingreso="+fkunidadingreso+"&si_ext="+si_ext+"&fk_especialidades_ih="+fk_especialidades_ih+"&n_e_ext="+n_e_ext;
*/
    $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=TRASPASO_DATOS&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){  
                  menu("#trabajo_social");
        }});
   }

function ingreso(id){





  $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=CONSULTAR_PACIENTE_PANTALLA&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
        
var nombrecompleto = respuesta.nombre+" "+respuesta.ap_p+" "+respuesta.ap_m ;
             $("#id").attr("value",respuesta.id);
            // $("#no_expediente").attr("value",respuesta.no_expediente);
             $("#nombre").attr("value",nombrecompleto);
             $("#edad").attr("value",respuesta.edad);
             $("#sexo").val(respuesta.sexo);
              $("#domicilio").val(respuesta.domicilio_actual);
             $("#fk_servicio_ingresa").val(respuesta.fk_servicio).trigger('change.select2');
             $("#estado_paciente").val(respuesta.estado_paciente);
             $("#observaciones").val(respuesta.observaciones);
            $("#derechohabiente").val(respuesta.derecho_habiente);
             $("#caso_medico_legal").val(respuesta.caso_medico_legal);
          $("#ubicacion").val(respuesta.fk_ubicacion).trigger('change.select2');
            $("#diagnostico_medico").val(respuesta.diagnostico_medico);
       $("#no_expediente").val(respuesta.no_expediente);    

             if(respuesta.fk_cama==null)$("#cama").html("<option value=''></option>");
             else
             $("#cama").html("<option value='"+respuesta.fk_cama+"'>"+respuesta.nomenclatura+"</option>");


/*
              $.ajax({url:"../php/main.php",dataType:"json",data:"opcion=CONSULTAR_CAMAS&fk_servicio="+respuesta.fk_servicio,type:"POST",cache:false,
              success:function(respuesta)
               {var datos="<option value=''>Camas disponibles</option>";  
                for (key in respuesta)
                  { datos+="<option value='"+respuesta[key].id+"'>"+respuesta[key].nomenclatura+"</option>";
                    
                  }
                  $("#cama").html(datos);
               }}); 
]*/
             $("#cama").val(respuesta.fk_cama).trigger('change.select2');
          
             $("#fecha_ingreso").val(respuesta.fecha_ingreso);
           
             $("#fecha_egreso").val(respuesta.fecha_egreso);
           
         
           

         
             if(respuesta.publicado==1)
             {  
               $("[name='publicado']").bootstrapSwitch('state',true);
                 
             }
             else
             {
                $("[name='publicado']").bootstrapSwitch('state',false);
             }
            

             if(respuesta.esc==1)
             {  
               $("[name='esc']").bootstrapSwitch('state',true);
                 
             }
             else
             {
                $("[name='esc']").bootstrapSwitch('state',false);
             }
           
             if(respuesta.act_nacimiento==1)
             {
                $("[name='acta_nacimiento']").bootstrapSwitch('state',true);
             }
             else
             {
                 $("[name='acta_nacimiento']").bootstrapSwitch('state',false);
             }
            if(respuesta.copia_sp==1)
             {
                $("[name='copia_sp']").bootstrapSwitch('state',true);
             }
             else
             {
                 $("[name='copia_sp']").bootstrapSwitch('state',false);
             }
             if(respuesta.pase==1)
             {
                $("[name='pase']").bootstrapSwitch('state',true);
             }
             else
             {
                 $("[name='pase']").bootstrapSwitch('state',false);
             }

        }});


$("#modal_pantalla").modal("show");
}


$( document ).ready(function() {


$("#informe").click(function(){
    var ser= $("#ser").val();
     document.location.href="../php/informe.php?idservicio="+ser;
  });



 $("[name='esc']").bootstrapSwitch();

 $("[name='acta_nacimiento']").bootstrapSwitch();
 $("[name='copia_sp']").bootstrapSwitch();
 $("[name='pase']").bootstrapSwitch();
  $("[name='publicado']").bootstrapSwitch();




 $("#tabla_pacientes_estudiolocal").DataTable(
            { "language": {
                "url": "../resources/json/Spanish.json"
            },
            "bProcessing": true,
            "sAjaxDataProp":"",   
            "iDisplayStart": 0,
             "order": [[ 0, "asc" ]],
             "searching" : true,
              "paging": true,
             "ajax": "../php/main.php?opcion=CONSULTAR_ESTUDIOLOCAL_URL&id_unidad3="+<?php echo $_SESSION['fk_unidad_adm'] ?>,
              
              "columns": [   
                   { "data": "id" },
                   { "data": "id_responsable" },
                   { "data": "curp" },
                   { "data": "id" },
                   { "data": "fecha_elaboracion"},
                   { "data": "folio_sp" },
                   { "data": "no_expediente" },
                   { "data": "nombre_unidad" },
                   { "data": "nombre" },
                   { "data": "ap_p" },
                   { "data": "ap_m" },
                   { "data": "edad" },
                   { "data": "sexo" },
                   { "data": "domicilio_actual" },
                   { "data": "telefono" },
                   { "data": "derecho_habiente" },
                   
              ],
              "columnDefs" :[
                   { 
                      "targets": 0,
                      "render": function (data, type, row, meta) {
                     
                    //    return "<a style='color:green'  onclick='reporte("+data+")' ><i class='fa fa-fw fa-file-pdf-o' style='cursor:pointer'></i></a>";
                                return "<a style='color:green'  href='../php/cinformes.php?id="+row.id+"' target='_blank' ><i class='fa fa-fw fa-file-pdf-o' style='cursor:pointer'></i></a>";
                      }
                    },
                     {   "targets": 1,
                      "render": function (data, type, row, meta) {

                  <?php   
                       if($_SESSION["idTipoUsuario"]==1 || $_SESSION["idTipoUsuario"]==2 || $_SESSION["idTipoUsuario"]==5  )
                         {
                        ?>  
                        return "<a style='color:green; cursor:pointer' data-title='El registro se Editara en el Modulo de Ingreso.'   data-toggle='confirmation_editar' id='"+data+"'><i class='glyphicon glyphicon-pencil' style='cursor:pointer'></i></a>";
                
                         <?php 
                         }
                         else
                         {
                         ?>
                         return "<a style='color:green; ' ><i class='glyphicon glyphicon-pencil' style='cursor:pointer'></i></a>";
                     <?php 
                          }
                          ?>

                       }

                         
                    },
                    {   "targets": 2,
                      "render": function (data, type, row, meta) {
                        
                         
                         return "<a style='color:green'  onclick='detalle_ingreso(\""+data+"\",\""+row.folio_sp+"\")' ><i class='glyphicon glyphicon-list' style='cursor:pointer'></i></a>";

                      
                      }
                    },
                     {   "targets": 3,
                      "render": function (data, type, row, meta) {
                        
                         
                         return "<a style='color:green'  onclick='ingreso("+data+")' ><i class='glyphicon glyphicon-share' style='cursor:pointer'></i></a>";

                      
                      }
                    },
                           

              ],
            /*   initComplete: function () {
            this.api().columns().every( function () {

                  
            var column = this;
            if(column.index()!=0  && column.index()!=1 && column.index()!=2 && column.index()!=3 && column.index()!=4 && column.index()!=7 && column.index()!=9 && column.index()!=10 && column.index()!=11 && column.index()!=12 && column.index()!=13)
              {  var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
                 }
            } );
         
        },*/
              "drawCallback": function( settings ) {
                  
                          $("[data-toggle=confirmation_editar]").confirmation(
                              {
                                container:"body",
                               btnOkLabel: 'Aceptar ',
                               btnCancelLabel: ' Cancelar',
                               onConfirm:function(event, element) {  
                                var id= $(element).attr("id");
                                 $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=ELIMINAR_ESEF&id="+id,
                                   beforeSend : function()
                                        {    
                                        } ,
                                  success:function(respuesta){ 
                                      $("#lista_ts").addClass("active");
                                     $("#lista_el").removeClass("active");
  
                                  }});
                          menu('#trabajo_social'); 
                         }});

                                $("[data-toggle=confirmation_editar2]").confirmation(
                              {
                                container:"body",
                               btnOkLabel: 'Aceptar ',
                               btnCancelLabel: ' Cancelar',
                               onConfirm:function(event, element) {  
                                  $("#lista_ts").addClass("active");
                                  $("#lista_el").removeClass("active");
  
                                var id= $(element).attr("id");

                                var fk_especialidades_ih=null;
                                   $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=TRASPASO_DATOS&id="+id+"&fk_especialidades_ih="+fk_especialidades_ih,
                                   beforeSend : function()
                                 {    
                                 } ,
                               success:function(respuesta){  
                                      menu("#trabajo_social");
                         
                 
                               }});


                                
                         }});


           
        }
      });

  });

$("#fk_servicio_ingresa").change(function(){
   var fk_servicio=$("#fk_servicio_ingresa").val();
    $.ajax({url:"../php/main.php",dataType:"json",data:"opcion=CONSULTAR_CAMAS&fk_servicio="+fk_servicio,type:"POST",cache:false,
      success:function(respuesta)
       {var datos="<option value=''>Camas disponibles</option>";  
        for (key in respuesta)
          { datos+="<option value='"+respuesta[key].id+"'>"+respuesta[key].nomenclatura+"</option>";
            
          }
          $("#cama").html(datos);
       }
  });

});

$('#fecha_egreso').datetimepicker({

      language: 'es',
   weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
});
$('#fecha_ingreso').datetimepicker({
   weekStart: 1,
   language: 'es',
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
});


   $("#cama").select2({theme:"bootstrap"});
$("#fk_servicio_ingresa").select2({theme:"bootstrap"});
$("#ubicacion").select2({theme:"bootstrap"});

$('#formestatus').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {  
        } 
        else 
        {  
             var dataString = $('#formestatus').serialize();
        $.ajax({
            type: "POST",
            url: "../php/main.php",
            data: dataString+"&opcion=guardar_paciente2",
            success: function(data) {
         
       /*  if(data=="GUARDAR"){
             $("#alertaguardar").removeClass("alert-danger");
             $("#alertaguardar").addClass("alert-success");
             $("#mensaje").html("SUS DATOS HAN SIDO GUARDADOS");
          


           }
          else if(data=="ERROR"){
              $("#alertaguardar").removeClass("alert-success");
              $("#alertaguardar").addClass("alert-danger"); 
              $("#mensaje").html("ERROR AL GUARDAR");
             }
          else if(data=="ERROR2"){
              $("#alertaguardar").removeClass("alert-success");
              $("#alertaguardar").addClass("alert-danger"); 
              $("#mensaje").html("ERROR AL GUARDAR YA EXISTE UN PACIENTE CON EL MISMO NUMERO DE EXPEDIENTE");
             }
               $("#alertaguardar").fadeIn(800,function(){
                $("#modal_pantalla").modal("hide");
                $("#modal_pantalla").fadeIn(800);
                setTimeout(function(){
                   menu('#paciente');
                   },400)
              
               });

*/
       
            }
        });
        return false;
        }
    });

function reporte(id) {
document.location.href="../php/cinformes.php?id="+id;
   return false;
}
    
</script>
