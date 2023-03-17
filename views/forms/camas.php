<?php
session_start();
session_name("sesion_usuario");
include_once '../../php/conexion.php';
include_once '../../php/modulo_estatus.php';
$con = new conexion();
$tsocial= new modulo_estatus();
?>

<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css"> 
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css"> 
<link rel="stylesheet" href="../resources/plugins/select2-4.0.3/dist/css/select2.css">
<link rel="stylesheet" href="../resources/plugins/select2-4.0.3/dist/css/select2-bootstrap.css">

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../resources/js/bootstrap-confirmation.min.js"></script>
<script src="../resources/js/validator.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script src="../resources/js/bootstrap-confirmation.min.js"></script>
<script  src="../resources/js/bootstrap-switch.js" ></script>



<div class="row" >
  <div class="col-md-12"><br>
     <div class="box box-default">
        <div class="box-header with-border">
          <center><h3 class="box-title"><strong>Ingreso de Cama</strong></h3></center>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm" onclick="limpiar()" ><i class="glyphicon glyphicon-file"></i></button>
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">
        
       <form role="form" action="" id="formcama" name="formcama" method="post" >
              <input type="hidden" name="id_cama" id="id_cama">
              <input type="hidden" name="fk_unidad_ingreso" id="fk_unidad_ingreso" value="<?php  echo $_SESSION['fk_unidad_adm']; ?>">

            <div class="modal-content">
           
              <div class="modal-body">
              <div class="box-body">
               
             
            <div class="row">
              <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Servicio:</label>
                  </div>
                 <select class="form-control select2" id="fk_servicio" name="fk_servicio" required>
                   <option value="">Seleccione el Servicio</option>
                   <?php  
                   $array= $con->getDatos("SELECT * FROM servicios WHERE fk_unidad=".$_SESSION['fk_unidad_adm']);
                 
                  foreach ($array as $key) {
                       echo "<option value='".$key['id']."'>".utf8_encode($key['servicio'])."</option>";
                     }
                   ?>
                  </select>
                </div><br>
                 <div class="input-group">
                  <div class="input-group-addon">
                      <label>Consecutivo:</label>
                  </div>
                  <input type="text" class="form-control" id="consecutivo" maxlength="10" name="consecutivo" placeholder="Consecutivo" required>
                </div><br>
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Nomenclatura:</label>
                  </div>
                  <input type="text" class="form-control" id="nomenclatura" maxlength="10" name="nomenclatura" placeholder="Nomenclatura" required>
                </div><br>
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Censable:</label>
                  </div>
                  <select class="form-control" id="censable" name="censable"><option></option> <option value="1">SI</option> <option value="0">NO</option></select>
                </div>
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
            
                   <div class="row"> 

                    <div class="col-md-7">
                      <button type="submit" id="guardar_cama" name="guardar_cama" class="btn btn-primary pull-right">Guardar</button>

                    </div>

                   </div>


<div class="row"  >
  <div class="col-md-12">
   
            <div class="panel-body table-responsive">
             <table id="tabla_cama" style="font-size: 16px; " class="table table-bordered table-striped table-hover">
                <thead>
                <tr>   
                  <th></th>  <th></th>
                       <th>Id</th> 
                         <th>Servicio</th> 
                        <th>Nomenclatura</th>  
                         <th>Censable</th>  
                   
                     
                 
                </tr>
                </thead>
                <tbody >
                <?php 
                $fkunidad=$_SESSION['fk_unidad_adm'];
                  $array= $con->getDatos("SELECT c.id,c.nomenclatura,s.servicio, c.censable,c.fk_unidad_adm,c.disponible FROM camas as c  LEFT JOIN servicios as s ON s.id=c.fk_servicio WHERE c.fk_unidad_adm=".$fkunidad."  ORDER BY(s.servicio) ASC");
                   $i=0;
                  
                  foreach ($array as $key) {
                
                           echo "<tr>
             <td><a  style='color:red; cursor:pointer; font-size:19px;' data-title='Esta seguro?'   data-toggle='confirmation' id='".$key['id']."' ><span class=' fa fa-fw fa-trash-o'></span></a></td>
             <td><a style='color:green;font-size:19px' onclick='editarCama(".$key['id'].")' ><i class='fa fa-fw fa-edit' style='cursor:pointer'></i></a></td>
             
             
            
              <td>".(++$i)."</td><td>".utf8_encode($key["servicio"])."</td><td>".utf8_encode($key["nomenclatura"])."</td><td>". (($key["censable"]==1) ? "SI" : "NO")."</td></tr> ";
            }  ?>
                </tbody>
                <tfoot>
                  <tr>  
                  <th></th>  <th></th>
                      <th>Id</th> 
                       <th>Servicio</th> 
                        <th>Nomenclatura</th>   
                         <th>Censable</th>  
                           
                </tr>
                </tfoot>
              </table>
</div></div>
</div>            


    
              </div>



        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
         
        </div>
      </div>
              


  </div>
</div></div>
  <div class="col-md-6" >

   
</div>


      


<script>
$(document).ready(function(){
 $(".xdsoft_datetimepicker").hide();

});

  
 function editarCama(id)
   {     $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=CONSULTAR_CAMA&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
    
             $("#id_cama").attr("value",id);
             $("#nomenclatura").val(respuesta.nomenclatura);
             $("#censable").val(respuesta.censable);
             $("#fk_servicio").val(respuesta.fk_servicio);
                 $("#consecutivo").val(respuesta.consecutivo);
        }});
   }

  $("[data-toggle=confirmation]").confirmation(
    {container:"body",
     btnOkLabel: 'Eliminar',
    btnCancelLabel: 'Cancelar',
     onConfirm:function(event, element) {  
      var id= $(element).attr("id");
      $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=ELIMINAR_CAMA&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
          menu('#cama');
        }});
      
    }});

 $("#tabla_cama").DataTable({
       "language": {
            "url": "../resources/json/Spanish.json"
        }
    });


$('#formcama').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {  
        } 
        else 
        {  
             var dataString = $('#formcama').serialize();
        $.ajax({
            type: "POST",
            url: "../php/main.php",
            data: dataString+"&opcion=GUARDAR_CAMA",
            success: function(data) {
          
          if(data=="GUARDAR"){
             $("#alertaguardar").removeClass("alert-danger");
             $("#alertaguardar").addClass("alert-success");
             $("#mensaje").html("SUS DATOS HAN SIDO GUARDADOS");
              $("#alertaguardar").fadeIn(800,function(){

                menu('#cama');
              });
             // menu('#servicio');
           }
          else if(data=="ERROR"){
              $("#alertaguardar").removeClass("alert-success");
              $("#alertaguardar").addClass("alert-danger"); 
              $("#mensaje").html("ERROR AL GUARDAR");
             }
               $("#alertaguardar").fadeIn(800,function(){
                $("#modal").modal("hide");
                $("#modal").fadeIn(800);
               // 
               });
       
            }
        });
        return false;
        }
    });

function limpiar(){
             $("#id").val(""); 
             $("#nombre").val("");
            

}
function habilitar_estatus(componente)
{  
   if ($(componente).is(':checked')) {
     var id= componente.value;
            $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=HABILITAR_CAMA&id="+id,
        success:function(respuesta){ 
    
        }
      })
   }
   else {
     var id= componente.value;
            $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=DESHABILITAR_CAMA&id="+id,
        success:function(respuesta){ 
    
        }
      })
   }
}
</script>
