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
 <div class="col-md-10" >

      <div class="box box-default">
        <div class="box-header with-border">
          <center><h3 class="box-title">Información a mostrar en la pantalla</h3></center>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">
          <div class="row">
             <div class="col-md-12" >
                <label>Ingrese la información a mostrar:</label>
              <textarea class="form-control" name="marquetex" id="marquetex"  >
                <?php
                  echo $tsocial->consultar_marque($_SESSION["fk_unidad_adm"]);
                ?>
              </textarea>
            </div>

          </div>
          <div class="row">
              <br>
            <div class="col-md-12" >
               <button type="button" id="guardar2" name="guardar2" class="btn btn-primary pull-right">Guardar</button>
            </div>
            </div>
           <div class="box-footer" style="display: block;">
         
        </div>

        
      </div>
  </div>
</div>

 </div>
      


<script>


$("#guardar2").click(function()
{ var marquetex= $("#marquetex").val(); 
 $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=GUARDAR_MARQUE&id_unidad="+<?php echo  $_SESSION["fk_unidad_adm"]  ?>+"&marquetex="+marquetex, beforeSend : function(){  } ,
        success:function(respuesta)
        { 
        }

      });

});

</script>