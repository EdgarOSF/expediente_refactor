<?php 
session_start();
?>
<div class="modal-content">
           
              <div class="modal-body">
              <div class="box-body">

<form id="busqueda_consulta" name="busqueda_consulta" method="post" autocomplete="off">

<div class="row">
	 <div class="col-lg-5">
           <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha Inicial:</label>
                  </div>
                   <input type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="2015-08-15"  placeholder="FECHA INICIAL" required="">
              </div>
              </div>

             
              </div>
               <div class="col-lg-5">
           <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha Final:</label>
                  </div>
                   <input type="text" class="form-control" id="fecha_egreso" name="fecha_egreso"   placeholder="FECHA FINAL" required="">
              </div>
              </div>

             
              </div>
                  <div class="col-lg-2">
           <div class="form-group">
                <div class="input-group">
              
                   <button type="submit" id="guardarCitas" name="guardarCitas" class="btn btn-primary pull-right">Consultar</button>
              </div>
              </div>

             
              </div>
              
</div>

<div class="row"  >
  <div class="col-md-12">
    <div class="content">
    <div class="box-body" >
    <div class="panel-body table-responsive">
        <table id="tabla_cita" class="table table-bordered table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                
                <th>No. Expediente</th>
                <th>Fecha</th>         
                <th>Nombre de Pacinte</th>
                <th>Nombre del Médico</th> 
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No. Expediente</th>
                <th>Fecha</th>         
                <th>Nombre de Pacinte</th>
                <th>Nombre del Médico</th> 
            </tr>
        </tfoot>
    </table>
    </div>
    </div>
   </div>        
  </div>
</div>
  </div>        
  </div>
</div>

<script>
 function leer(){
  tabla_consulta2=  $('#tabla_cita').DataTable(
            { "language": {
                "url": "../resources/json/Spanish.json"
            },
            "bProcessing": true,
            "sAjaxDataProp":"",   
            "iDisplayStart": 0,
             "order": [[ 0, "asc" ]],
            
              "paging": false,
             "ajax": "../php/main.php?opcion=CONSULTAR_CITAS",
        "columns": [
           // { "data": "expediente"},
            { "data": "NoExpa" },
            { "data": "Fecha" },
            { "data": "nombrePaciente" },
           { "data": "Medico" }
        ],
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ],

    } );

}
$(document).ready(function() {
 
  leer();

});

 
$('#fecha_ingreso').datepicker(
  {
      autoclose: true , 
      language: 'es',
       format: 'yyyy-mm-dd'
    });

$('#fecha_egreso').datepicker(
  {
      autoclose: true , 
      language: 'es',
       format: 'yyyy-mm-dd'
    });


$('#busqueda_consulta').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {  
        } 
        else 
        {  
           if(jQuery("#fecha_ingreso").val()>jQuery("#fecha_egreso").val())
           alert("VERIFIQUE LAS FECHAS");
           else{

           var datos= jQuery("#busqueda_consulta").serialize();
           tabla_consulta2.ajax.url("../php/main.php?opcion=CONSULTAR_PERIODO_CONSULTA&"+datos).load();}
                
           return false;
        }
    });

</script>
