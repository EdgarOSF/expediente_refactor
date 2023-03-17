<?php
session_start();
session_name("sesion_usuario");
include_once '../../php/conexion.php';
 $con = new conexion();
 $id_usuario= $_SESSION["idUsuario"];
?>

<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>  
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../resources/js/validator.min.js"></script>
<script src="../resources/js/bootstrap-confirmation.min.js"></script>

 
      <div class="example-modal" id="example-modal" >
        <div class="modal" id="modal">
          <div class="modal-dialog modal-lg">
              <form role="form" action="" id="formunidad" name="formunidad" method="post" >
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="unidad_referencia" id="unidad_referencia" value="<?php  echo $_SESSION['nombre_unidad']; ?>">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> <i class="fa fa-arrow-circle-up"></i> Ingreso de Paciente </h4>
              </div>
              <div class="modal-body">
              <div class="box-body">
               <div class="form-group">
                <div class="row">
              </div>
              </div>
              <h3 class="modal-title"> <i class="fa fa-user"></i> Datos del Paciente</h3><br> 
            <div class="row">
              <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Nombre:</label>
                  </div>
                  <input type="text" class="form-control" id="nombre" name="nombre"placeholder="Nombre del Paciente" required>
                </div>
              </div>
              </div>
               <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Edad: </label>
                  </div>
                    <input type="number" placeholder="Edad de la paciente" class="form-control" min="9" max="19" id="edad" name="edad" required>
                 </div>
              </div>
              </div>
              </div>

                <div class="row">
              <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Municipio:</label>
                  </div>
                   <select class="form-control" id="municipio" name="municipio" required>
                   <option value="">Seleccione el Municipio</option>
                   <?php  
                   $array= $con->getDatos("SELECT * FROM municipios WHERE fk_estado=27");
                 
                  foreach ($array as $key) {
                       echo "<option value='".$key['id']."'>".$key['nombre']."</option>";
                     }
                   ?>
                  </select>
             </div>
              </div>
              </div>
               <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Dirección:</label>
                  </div>
                  <input type="text" class="form-control"  placeholder="Dirección" id="direccion" name="direccion" required>
                   </div>
              </div>
              </div>
              </div>
               <div class="row">
              <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Dignostico Medico:</label>
                  </div>
                   <textarea class="form-control" rows="4" placeholder="Dignostico Medico de la Paciente" id="diagnostico_referencia" name="diagnostico_referencia" required></textarea >
            </div>
              </div>
              </div>
               </div>
                <div class="alert alert-success alert-dismissible" id="alertaguardar" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje!</h4>
                <div id="mensaje"></div>
              </div>
              </div>
               </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                 <button type="submit" id="guardar" name="guardar" class="btn btn-primary pull-right">Guardar</button>
              </div>
              
            </div>
            </form>
            <!--/.modal-content-->
          </div>
        </div>
         <div class="modal modal-primary" id="modal1">
          <div class="modal-dialog modal-lg">
              <form role="form" action="" id="" name="form-exportar" method="post" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal1" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> <i class="fa fa-arrow-circle-up"></i> Citas</h4>
              </div>
              <div class="modal-body">
        
              <div class="box-body">
               <div class="form-group">
               
                </div>
                <!-- /.input group -->
              </div>
              </div>
              <!-- /.box-body -->
               </div>
               
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                 <button type="submit" id="" class="btn btn-primary pull-right">Guardar</button>
              </div>
              
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
        </div>
    <h2> <i class="fa fa-fw fa-file"></i> Ingreso del Paciente</h2>
        <div class="box-header">
            
              <a class="btn bg-maroon" id="nuevo_paciente">
                <i class="fa fa-fw fa-file"></i> Ingreso de Paciente
              </a>
              </a>
              <a class="btn bg-maroon" data-title='Esta seguro?'  id="referirPaciente">
                <i class="fa fa-fw fa-share-square-o"></i> Referir
              </a>
          
          <!-- /.info-box -->
       
            </div>
          <div class="box-body" >
            <div class="panel-body table-responsive">
              <table id="exampleuni" style="font-size: 16px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Edad</th>
                  <th>Municipio</th>
                  <th>Direccion</th>
                  <th>Diagnostico Medico</th>
                  <th>Referido</th>
                </tr>
                </thead>
                <tbody> 

 <?php 
                  $array= $con->getDatos("SELECT pacientes.id,pacientes.nombre,edad,municipios.nombre AS nombre_municipio,direccion,diagnostico_referencia,referido FROM pacientes LEFT JOIN municipios ON municipios.id=pacientes.fk_municipio WHERE fk_cat_usuarios=".$id_usuario);
                   $i=0;
                  foreach ($array as $key) {

                    echo "  
                  <tr>
                <td> <input type ='radio' id='check_referir' name='check_referir' value='".$key['id']."' /> </td>
                <td><a style='color:green' onclick='editarPacienteUnidad(".$key['id'].")' ><i class='fa fa-fw fa-edit' style='cursor:pointer'></i></a></td>
                <td><a  style='color:red; cursor:pointer' data-title='Esta seguro?'   data-toggle='confirmation' id='".$key['id']."' ><span class='glyphicon glyphicon-remove'></span></a></td>
                <td>".(++$i)."</td>
                <td>".$key["nombre"]."</td>
                <td>".$key["edad"]."</td>
                <td>".$key["nombre_municipio"]."</td>
                <td>".$key["direccion"]."</td>
                <td>".$key["diagnostico_referencia"]."</td>
                <td>".(($key["referido"]==1) ?  " <i class='fa fa-check' style='color:green'></i>" : " ").

                 "</td>
              </tr>
               ";
            } ?>
                </tbody>
                <tfoot>
                  <tr>
                   <th></th>
                   <th></th>
                   <th></th>
                   <th>ID</th>
                   <th>Nombre</th>
                   <th>Edad</th>
                   <th>Municipio</th>
                   <th>Direccion</th>
                   <th>Diagnostico Medico</th>
                  <th>Referido</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            
<script>
 $("#exampleuni").DataTable({
       "language": {
            "url": "../resources/json/Spanish.json"
        }
    });

$(document).ready(function() {
   $("#nuevo_paciente").click(function(){
    $("#modal").modal("show");
  });

});

$('#formunidad').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {  
        } 
        else 
        {  
             var dataString = $('#formunidad').serialize();
        $.ajax({
            type: "POST",
            url: "../php/main.php",
            data: dataString+"&opcion=guardar_unidad",
            success: function(data) {
          
          if(data=="GUARDAR"){
             $("#alertaguardar").removeClass("alert-danger");
             $("#alertaguardar").addClass("alert-success");
             $("#mensaje").html("SUS DATOS HAN SIDO GUARDADOS");
           }
          else if(data=="ERROR"){
              $("#alertaguardar").removeClass("alert-success");
              $("#alertaguardar").addClass("alert-danger"); 
              $("#mensaje").html("ERROR AL GUARDAR");
             }
               $("#alertaguardar").fadeIn(800,function(){
                $("#modal").modal("hide");
                $("#modal").fadeIn(800);
                menu('#unidad');
               });
       
            }
        });
        return false;
        }
    });

  $("[data-toggle=confirmation]").confirmation(
    {container:"body",
     btnOkLabel: 'Eliminar',
    btnCancelLabel: 'Cancelar',
     onConfirm:function(event, element) {  
      var id= $(element).attr("id");
      $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=ELIMINAR_REGISTRO&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
          menu('#unidad');
        }});
      
    }});
 
   $("#referirPaciente").confirmation(
    {container:"body",
     btnOkLabel: 'Referir',
    btnCancelLabel: 'Cancelar',
     onConfirm:function(event, element) {  
    
     var id=  $('input:radio[name=check_referir]:checked').val();
    // if($("#check_referir").is(':checked')) 
      
               $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=REFERIR_PACIENTE&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 

         menu('#unidad');
        }});  
    }}); 
   
   function editarPacienteUnidad(id)
   {     $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=CONSULTAR_PACIENTE_UNIDAD&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
             $("#id").attr("value",respuesta.id);
             $("#nombre").attr("value",respuesta.nombre);
             $("#edad").attr("value",respuesta.edad);
             $("#municipio").val(respuesta.fk_municipio);
             $("#direccion").attr("value",respuesta.direccion);
             $("#diagnostico_referencia").html(respuesta.diagnostico_referencia);

             $("#modal").modal("show");
        }});
   }

/*
    $('#guardar').click(function(){
    });

      $("#exampleuni").DataTable({
       "language": {
            "url": "../resources/json/Spanish.json"
        }
    });

  $("#nuevo_paciente").click(function(){
    $("#modal").modal("show");
  });

$("#1").click(function(){
    $("#modal1").modal("show");
  });


});*/

</script>