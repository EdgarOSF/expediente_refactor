<?php
session_start();
session_name("sesion_usuario");
include_once '../../php/conexion.php';
$con = new conexion();
?>
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<script src="../resources/js/validator.min.js"></script>
      

    <center><h2> <i class="fa  fa-file-text-o"></i> Estudios Externos Ingresados</h1></center>
       
          <div class="box-body" >
            <div class="panel-body table-responsive">
              <table id="tabla_estudios_externos" style="font-size: 17px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                 
                  <th></th>
                  <th>Fecha de Ingreso</th>
                  <th>No. Espediente</th>
                  <th>No. Seguro Popular</th>
                  <th>Nombre   </th>  
                  <th>Ap. p</th>  
                  <th>Ap. m </th>  
                  <th>Sexo</th>
                  <th>Edad</th>
                  <th>Domicilio Actual</th>
                  <th>Telefono</th>
                  <th>Derecho Habiente</th>
                  <th>Servicio de Ingreso</th>
                  <th>Especialidad</th>
                </tr>
                </thead>
                <tbody>
           
                </tbody>
                <tfoot>
                   <tr>
                  <th></th>
                  <th>Fecha de Ingreso</th>
                  <th>No. Espediente</th>
                  <th>No. Seguro Popular</th>
                  <th>Nombre   </th>  
                  <th>Ap. p</th>  
                  <th>Ap. m </th> 
                  <th>Sexo</th>
                  <th>Edad</th>
                  <th>Domicilio Actual</th>
                  <th>Telefono</th>
                  <th>Derecho Habiente</th>
                   <th>Servicio de Ingreso</th>
                  <th>Especialidad</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>

<script>

$("#tabla_estudios_externos").DataTable(
            { "language": {
                "url": "../resources/json/Spanish.json"
            },
            "bProcessing": true,
            "sAjaxDataProp":"",   
            "iDisplayStart": 0,
             "order": [[ 0, "asc" ]],
             "searching" : true,
              "paging": true,
             "ajax": "../php/main.php?opcion=CONSULTAR_ESTUDIOEXTERNOS_URL&id_unidad4="+<?php echo $_SESSION['fk_unidad_adm'] ?>,
              
              "columns": [   
                   { "data": "id" },
                   { "data": "fecha_ingreso" },
                   { "data": "no_expediente" },
                   { "data": "folio_sp" },
                   { "data": "nombre" },
                   { "data": "ap_p" },
                   { "data": "ap_m" },
                   { "data": "edad" },
                   { "data": "sexo" },
                   { "data": "domicilio_actual" },
                   { "data": "telefono" },
                   { "data": "derecho_habiente" },
                   { "data": "servicio_ingreso" },
                   { "data": "nom_especialidad" },

              ],
              "columnDefs" :[
                   { 
                      "targets": 0,
                      "render": function (data, type, row, meta) {
                        console.log(row);
                        return "<a style='color:green'  onclick='reporte("+data+")' ><i class='fa fa-fw fa-file-pdf-o' style='cursor:pointer'></i></a>";
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
             
      });



function reporte(id) {
document.location.href="../php/informe_externo.php?id="+id;
   return false;
}

 
    
</script>
