<?php
session_start();
session_name("sesion_usuario");
include_once '../../php/conexion.php';
$con = new conexion();
?>
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<script src="../resources/js/bootstrap-confirmation.min.js"></script>
      

    <center><h2> <i class="fa  fa-file-text-o"></i> Egresos Hospitalarios</h1></center>
       
          <div class="box-body" >
            <div class="panel-body table-responsive">
              <table id="tabla_pacientes_estudiolocal" style="font-size: 17px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>

                  <th></th>
                  <th></th>  
                  <th></th>
                  <th>Folio sp</th>
                  <th>No. Expediente</th>
                  <th>Nombre</th>
                  <th>Ap. P</th>
                  <th>Ap. M</th>
                  <th>Edad</th>
                  <th>Sevicio</th>
                  <th>Cama</th>
                  <th>Estado de salud</th>
                  <th>Ubicación</th>
                  <th>Observaciones</th>
                  <th>Fecha de elaboración</th>
                  <th>Fecha de Ingreso</th>
                  <th>Fecha de Egreso</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                   <tr>
                  <th></th>
                  <th></th>  
                  <th></th>
                  <th>Folio sp</th>
                  <th>No. Expediente</th>
                  <th>Nombre</th>
                  <th>Ap. P</th>
                  <th>Ap. M</th>
                  <th>Edad</th>
                  <th>Sevicio</th>
                  <th>Cama</th>
                  <th>Estado de salud</th>
                  <th>Ubicación</th>
                  <th>Observaciones</th>
                  <th>Fecha de elaboración</th>
                  <th>Fecha de Ingreso</th>
                  <th>Fecha de Egreso</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>




<div class="modal fade" tabindex="-1" role="dialog" id="detalle_estudio_ingreso">
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
                <th>Folio sp</th>
                  <th>No. Expediente</th>
                  <th>Nombre</th>
                  <th>Ap. P</th>
                  <th>Ap. M</th>
                  <th>Edad</th>
                  <th>Sevicio</th>
                  <th>Cama</th>
                  <th>Estado de salud</th>
                  <th>Ubicación</th>
                  <th>Observaciones</th>
                  <th>Fecha de elaboración</th>
                  <th>Fecha de Ingreso</th>
                  <th>Fecha de Egreso</th>
                </tr>
                </thead>
                <tbody>
        
                </tbody>
                <tfoot>
                   <tr>
                  
                  <th></th>
                  <th>Folio sp</th>
                  <th>No. Expediente</th>
                  <th>Nombre</th>
                  <th>Ap. P</th>
                  <th>Ap. M</th>
                  <th>Edad</th>
                  <th>Sevicio</th>
                  <th>Cama</th>
                  <th>Estado de salud</th>
                  <th>Ubicación</th>
                  <th>Observaciones</th>
                  <th>Fecha de elaboración</th>
                  <th>Fecha de Ingreso</th>
                  <th>Fecha de Egreso</th>
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






<script>
function detalle_ingreso(id,folio_sp){


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
             "ajax": "../php/main.php?opcion=C_E_DETALLE&id_u="+<?php echo $_SESSION['fk_unidad_adm'] ?> +"&curp="+id+"&folio_sp="+folio_sp,
              
              "columns": [   
                   { "data": "id" },
                   { "data": "folio_sp" },
                   { "data": "no_expediente" },
                   { "data": "nombre" },
                   { "data": "ap_p" },
                   { "data": "ap_m" },
                   { "data": "edad" },
                   { "data": "servicio" },
                   { "data": "nomenclatura" },
                   { "data": "estado_paciente" },
                   { "data": "ubicacion" },
                   { "data": "observaciones"},
                   { "data": "fecha_elaboracion"},
                   { "data": "fecha_ingreso"},
                   { "data": "fecha_egreso"},
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
  $("#detalle_estudio_ingreso").modal("show");

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




$( document ).ready(function() {





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
             "ajax": "../php/main.php?opcion=C_ESTUDIOLOCAL_URL&id_unidad3="+<?php echo $_SESSION['fk_unidad_adm'] ?>,
              
              "columns": [   
                   { "data": "id" },
                   { "data": "id" },
                   { "data": "curp" },
                   { "data": "folio_sp" },
                   { "data": "no_expediente" },
                   { "data": "nombre" },
                   { "data": "ap_p" },
                   { "data": "ap_m" },
                   { "data": "edad" },
                   { "data": "servicio" },
                   { "data": "nomenclatura" },
                   { "data": "estado_paciente" },
                   { "data": "ubicacion" },
                   { "data": "observaciones"},
                   { "data": "fecha_elaboracion"},
                   { "data": "fecha_ingreso"},
                   { "data": "fecha_egreso"},
                   
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
                          if ($_SESSION["idTipoUsuario"]==1 || $_SESSION["idTipoUsuario"]==2 || $_SESSION["idTipoUsuario"]==3 || $_SESSION["idTipoUsuario"]==5){
                        ?>
                        return "<a style='color:green; cursor:pointer' data-title='La Copia se visualiza en el Modulo de Ingreso.'   data-toggle='confirmation_editar2' id='"+data+"'><i class='glyphicon glyphicon-duplicate' style='cursor:pointer'></i></a>";
                      <?php 
                    }
                    else{
                      ?>
 return "<a style='color:green; cursor:pointer' ><i class='glyphicon glyphicon-duplicate' style='cursor:pointer'></i></a>";
                
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


   

function reporte(id) {
document.location.href="../php/cinformes.php?id="+id;
   return false;
}
    
</script>
