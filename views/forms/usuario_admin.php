<?php
session_start();
session_name("sesion_usuario");
include_once '../../php/conexion.php';
 $con = new conexion();
?>
<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../plugins/select2/select2.min.css">
<link rel="stylesheet" href="../../resources/plugins/select2-4.0.3/dist/css/select2.css">
<link rel="stylesheet" href="../../resources/plugins/select2-4.0.3/dist/css/select2-bootstrap.css">
<link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
<script src="../../resources/js/validator.min.js"></script>
<script  src="../../resources/js/bootstrap-switch.js" ></script>
<script  src="../plugins/select2/select2.min.js" ></script>
<script src="../plugins/select2/select2.full.min.js"></script>


    <h2> <i class="fa fa-fw fa-user"></i> Usuarios Administradores</h2>
        <div class="box-header">
            
              <a class="btn bg-maroon" id="new_usuario">
                <i class="fa fa-fw fa-file"></i> Nuevo Usuario 
              </a>
              </a>    
          
          <!-- /.info-box -->
       
            </div>
          <div class="box-body" >



          <div class="example-modal ">
        <div class="modal fade" id="modalnuevouser">
          <div class="modal-dialog ">
            <div class="modal-content" style="background:#ecefed">
            <form  name="formulario-usuario" id="formulario-usuario">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                   <h4 class="modal-title"> <i class="fa fa-fw fa-user"></i> Usuarios Administrador</h4>
               
              </div>
              <div class="modal-body">
                 <div class="box box-success"  >
                 <div class="box-body">
                      
          
           <h3><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Nuevo Usuario</h3><hr>
                <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><label for="nombre">Nombre:</label></div>           
                           <input type="hidden" name="id" id="id" value="" >
                           <input type="text"  name="nombre"  id="nombre" value="" placeholder="Nombre" class="form-control" required>        
                    </div><br>
                  </div>   
                </div></div>
                  <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><label for="nombre">Cedula:</label></div>           
                          
                           <input type="text"  name="cedula"  id="cedula" value="" placeholder="Cedula de Trabajadora Social" class="form-control" required>        
                    </div><br>
                  </div>   
                </div></div>
                <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><label for="alias">Alias:</label></div>
                      <input type="text"  name="alias"  id="alias" value=""   placeholder="descripcion" class="form-control" required>
                    </div><br>
                    </div>
                  </div>   
                </div>
               <div class="row">
                  <div class="col-md-12">
                   <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                      <label for="password">Password:</label></div>
                      <input type="password" name="password" id="password" value=""  placeholder="Password" class="form-control" required>
                    </div><br>
                  </div>   </div>
               </div>
             
               <div class="row">
                  <div class="col-md-12">
                   <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><label for="tipo_usuario">Rol:</label></div>
                       <select class="form-control" name="fk_tipo_usuario" id="fk_tipo_usuario" required>
                          <option value="">Elija una opcion</option>
                        
                         
                        <?php
                            $tipos= $con->getDatos("select * from tipo_usuario where id>=2");
                  $i=0;
                  foreach ($tipos as $key) {
                  
                    echo "<option value='".$key['id']."'>".$key['descripcion']."</option>";

                  }
                        ?>
                        </select>
                        
                    </div><br>      
                </div>   </div>
           </div> 
                <div class="row">
                  <div class="col-md-12">
                   <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><label for="tipo_usuario">Unidad:</label></div>
                       <select class="form-control select2" style="width: 100%;" value="" name="unidad" id="unidad" required>
                          <option value="">Elija una opcion</option>
                        
                         
                        <?php
                            $tipos= $con->getDatos("select * from unidades_adm ");
                  $i=0;
                  foreach ($tipos as $key) {
                  
                    echo "<option value='".$key['id']."'>".utf8_encode($key['nombre'])."</option>";

                  }
                        ?>
                        </select>
                        
                    </div><br>      
                </div>   </div>
           </div> 






            <div class="row">
            <br>
            
              <div class="col-md-12" align="right" >
                     
              </div>
              </div>
         
                          
             </div>
          </div>

              </div>
              <div class="modal-footer">
                <div class="alert alert-success alert-dismissible" id="alertaguardar" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje!</h4>
                <div id="mensaje"></div>
              </div>
              <div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-2">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>
              </div>
              <div class="col-md-2">
                  <button type="submit" id="actualizar_usuario" style="display: none;" class="btn btn-danger pull-right">Actualizar</button>
                   <button type="submit" id="guardar_usuario" class="btn btn-danger pull-right">Guardar</button>
              </div>


              </div>
               
                  
                
               
              </div>
               </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
        


            <div class="panel-body table-responsive">
              <table id="tabla-datos-usuarios" style="font-size: 15px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>       
                  <th></th>  
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Cedula</th>
                  <th>Alias</th>
                  <th>Unidad</th>
                  <th>Tipo Usuario</th>
                  <th>Estatus</th>
                  
                </tr>
                </thead>
                <tbody>               
                <tr>
                <?php 
                $fk_unidad_adm= $_SESSION["fk_unidad_adm"];
                  $array= $con->getDatos("SELECT u.id,u.nombre,u.cedula,u.alias,u.password,u.fk_tipo_usuario,u.fk_unidad_adm,u.estatus,ua.nombre as unidad,tu.descripcion as tipo_usuario FROM usuarios as u LEFT JOIN unidades_adm as ua ON ua.id=u.fk_unidad_adm LEFT JOIN tipo_usuario AS tu ON tu.id=u.fk_tipo_usuario");
                  $i=0;
                  foreach ($array as $key) {
                  
                    echo "  
              
                 <td><a style='color:green;font-size:19px' onclick='editarUsuario(".$key['id'].")' ><i class='fa fa-fw fa-edit' style='cursor:pointer'></i></a></td>
                    
                <td>".(++$i)."</td>
                <td>".$key["nombre"]."</td>
                <td>".$key["cedula"]."</td>
                <td>".$key["alias"]."</td>
                <td>".utf8_encode($key["unidad"])."</td>
                <td>".$key["tipo_usuario"]."</td>
                <td><input type='checkbox' id='user-activo'  name='user-activo' value='".$key['id']."' ".(($key['estatus']==1) ? ("checked='checked'") : "")."data-size='mini' ></td>
              </tr> 
               ";
                }

               ?>
              </tr>
                </tbody>
                <tfoot>
                  <tr>
                  <th></th>       
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>cedula</th>
                  <th>Alias</th>
                  <th>Unidad</th>
                  <th>Tipo Usuario</th>
                  <th>Estatus</th>
                   
                </tr>
                </tfoot>
              </table>
              </div>
            </div>

<script type="text/javascript">
          $(".select2").select2({theme:"bootstrap"});    
$("[name='user-activo']").bootstrapSwitch();
$('input[name="user-activo"]').on('switchChange.bootstrapSwitch', function(event, state) {
  
  $.ajax({url:"../php/main.php",data:"opcion=HABILITAR_USUARIO&estatus="+state+"&id="+event.target.value,type:"POST",cache:false,
      success:function(respuesta)
       {  
       }
  });
});

$("#tabla-datos-usuarios").DataTable({
       "language": {
            "url": "../resources/json/Spanish.json"
        }
    });

$("#new_usuario").click(function(){
    $("#password").removeAttr("disabled");
      $("#id").val("");
      $("#nombre").val("");
      $("#alias").val("");
      $("#password").val("");
      $("#fk_tipo_usuario").val("");
      $("#fk_unidad_adm").val("");
   $("#modalnuevouser").modal("show");
});
$('#formulario-usuario').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {   
        } 
        else 
        {   
            var dataString = $('#formulario-usuario').serialize();
             
        $.ajax({
            type: "POST",
            url: "../php/main.php",
            data: dataString+"&opcion=GUARDAR_USUARIO",
            success: function(data) { 
          
          if(data=="GUARDAR"){
             $("#alertaguardar").removeClass("alert-danger");
             $("#alertaguardar").addClass("alert-success");
             $("#mensaje").html("SUS DATOS HAN SIDO GUARDADOS");



           $("#alertaguardar").fadeIn(800,function(){
                $("#modalnuevouser").modal("hide");
                 setTimeout(function(){
               menu('#usuario_admin');
              }, 400);
             
               });
              /*$("#alertaguardar").fadeIn(800,function(){
                $("#modalnuevouser").fadeIn(1200);
                $("#modalnuevouser").modal("hide");
                menu('#usuario');
               });*/
           }
          else if(data=="ERROR"){
              $("#alertaguardar").removeClass("alert-success");
              $("#alertaguardar").addClass("alert-danger"); 
              $("#mensaje").html("ERROR AL GUARDAR");

              $("#alertaguardar").fadeIn(800);
             }
            
              
       
            }
        });
        }
        return false;
    });


  


function editarUsuario(id)
{ $("#actualizar_usuario").show();  
 $("#guardar_usuario").hide();  
  $("#modalnuevouser").modal("show");
    $.ajax({url:"../php/main.php",dataType:"json",data:"opcion=CONSULTAR_USUARIO&id="+id,type:"POST",cache:false,
      success:function(respuesta)
       {    $("#id").val(respuesta.id);
            $("#nombre").val(respuesta.nombre);
            $("#cedula").val(respuesta.cedula);
            $("#alias").val(respuesta.alias);
            $("#password").val("*******************");
            $("#fk_tipo_usuario").val(respuesta.rol);
            $("#unidad").val(respuesta.unidad);
          
       }
  });
}
</script>

