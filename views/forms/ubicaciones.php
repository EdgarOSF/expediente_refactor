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
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
<script src="../resources/js/bootstrap-confirmation.min.js"></script>
<script src="../resources/js/validator.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script src="../resources/js/bootstrap-confirmation.min.js"></script>
<script  src="../resources/js/bootstrap-switch.js" ></script>



<div class="row" >
  <div class="col-md-7"><br>
     <div class="box box-default">
        <div class="box-header with-border">
          <center><h3 class="box-title"><strong>Ingreso de Ubicación</strong></h3></center>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm" onclick="limpiar()" ><i class="glyphicon glyphicon-file"></i></button>
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">
        
       <form role="form" action="" id="formubicacion" name="formubicacion" method="post" >
              <input type="hidden" name="id_ubicacion" id="id_ubucacion">
              <input type="hidden" name="fk_unidad_ingreso" id="fk_unidad_ingreso" value="<?php  echo $_SESSION['fk_unidad_adm']; ?>">

            <div class="modal-content">
           
              <div class="modal-body">
              <div class="box-body">
               
             
            <div class="row">
              <div class="col-lg-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Descripcion:</label>
                  </div>
                  <input type="text" class="form-control" id="descripciom" name="descripcion" placeholder="Nombre del Servicio" required>
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

                    <div class="col-md-12">
                      <button type="submit" id="guardar" name="guardar" class="btn btn-primary pull-right">Guardar</button>

                    </div>

                   </div>
<br>
                   <div class="row"  >
  <div class="col-md-12">
      <table id="tabla_ubicacion" style="font-size: 16px; " class="table table-bordered table-striped table-hover">
                <thead>
                <tr>   
                  <th></th>
                       <th>Id</th> 
                        <th>Nombre de la Ubicacion</th>           
                     
                
                </tr>
                </thead>
                <tbody >
                <?php 
                $fkunidad=$_SESSION['fk_unidad_adm'];
                  $array= $con->getDatos("SELECT * FROM ubicaciones WHERE fk_unidad_adm='".$fkunidad."'");
                   $i=0;
                  
                  foreach ($array as $key) {
                
                           echo "<tr>
             <td><a  style='color:red; cursor:pointer; font-size:19px;' data-title='Esta seguro?'   data-toggle='confirmation' id='".$key['id']."' ><span class=' fa fa-fw fa-trash-o'></span></a></td>
             
            
              <td>".(++$i)."</td><td>".utf8_encode($key["descripcion"])."</td></tr> ";
            }  ?>
                </tbody>
                <tfoot>
                  <tr>  
                  <th></th>
                      <th>Id</th> 
                        <th>Nombre de la Ubicacion</th>           
                </tr>
                </tfoot>
              </table>
  </div>
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



 function editarUbicacion(id)
   {     $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=CONSULTAR_UBICACION&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
        
             $("#id_ubicacion").attr("value",respuesta.id);
             $("#descripcion").attr("value",respuesta.descripcion);
        }});
   }

  $("[data-toggle=confirmation]").confirmation(
    {container:"body",
     btnOkLabel: 'Eliminar',
    btnCancelLabel: 'Cancelar',
     onConfirm:function(event, element) {  
      var id= $(element).attr("id");
      $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=ELIMINAR_UBICACION&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
          menu('#ubicacion');
        }});
      
    }});

 $("#tabla_ubicacion").DataTable({
       "language": {
            "url": "../resources/json/Spanish.json"
        }
    });


$('#formubicacion').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {  
        } 
        else 
        {  
             var dataString = $('#formubicacion').serialize();
        $.ajax({
            type: "POST",
            url: "../php/main.php",
            data: dataString+"&opcion=GUARDAR_UBICACION",
            success: function(data) {
          
          if(data=="GUARDAR"){
             $("#alertaguardar").removeClass("alert-danger");
             $("#alertaguardar").addClass("alert-success");
             $("#mensaje").html("SUS DATOS HAN SIDO GUARDADOS");
              $("#alertaguardar").fadeIn(800,function(){

                menu('#ubicacion');
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
</script>
