<?php
ini_set('display_errors', 0);
session_start();
session_name("sesion_usuario");

?>

<!--<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css"> 
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>-->
<link rel="stylesheet" href="../resources/plugins/datatimepicker/css/jquery.datetimepicker.css"> 
<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.css"> 
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css"> 
<link rel="stylesheet" href="../resources/plugins/select2-4.0.3/dist/css/select2.css">
<link rel="stylesheet" href="../resources/plugins/select2-4.0.3/dist/css/select2-bootstrap.css">

<script src="../resources/js/bootstrap-confirmation.min.js"></script>
<script src="../resources/js/validator.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script src="../resources/js/bootstrap-confirmation.min.js"></script>
<script src="../resources/js/bootstrap-switch.js" ></script>
<script src="../resources/plugins/datatimepicker/js/jquery.datetimepicker.full.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<link href="../resources/css/jqueryui.css" type="text/css" rel="stylesheet"/>
<script src="plugins/datepicker/locales/bootstrap-datepicker.es.js">      </script>


   
<br>
             
<div class="bs-example" data-example-id="button-tag-button-group-justified"> 
  <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group"> 
  <div class="btn-group" role="group"> <button type="button" onclick='clickResponse("#resultado","forms/formulario_consulta.php")' class="btn btn-primary"> <span class="glyphicon glyphicon-list-alt"></span>  AGREGAR CONSULTAS </button>  </div> 
  <div class="btn-group" role="group"> <button type="button" onclick='clickResponse("#resultado","forms/formulario_consulta_calendario.php")' class="btn btn-success"><span class="glyphicon glyphicon-calendar"></span>    BUSCAR CONSULTAS POR PERIODOS</button> </div>
 
</div>
   <div id="resultado"></div>
<script >
   function clickResponse(idComponente,url,datos)
   {  
    $.ajax({url:url,type:"post",cache:false,data:datos,beforeSend:function(){// $(idComponente).html("<div class='row' id='' > <div class='col-lg-12' align='center'><img align='center' src='../resources/img/loading.gif'   /></div></div>");
    },
           success:function(respuesta){
           // alert(respuesta);
             $(idComponente).html(respuesta);
              }});    
   }
   $( document ).ready(function() {
     clickResponse("#resultado","forms/formulario_consulta.php"); 
});
</script>



 <!--  
    <div class="example-modal" id="example-modal">
        <div class="modal fade " id="modal">
          <div class="reveal-modal xlarge">
            <form role="form" action="" id="trabajo_social" name="trabajo_social" method="post" >
            <div class="modal-content" style="background:#ecefed">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> <i class="fa fa-arrow-circle-up"></i> Ingreso del Paciente</h4>
              </div>
          <input type="hidden" id="fk_usuario" name="fk_usuario" value="<?php  echo $_SESSION['idUsuario']; ?>">
               <input type="hidden" id="fk_unidad_ingreso" name="fk_unidad_ingreso" value="<?php  echo $_SESSION['fk_unidad_adm']; ?>">
               <input type="hidden" id="id" name="id" >
               <input type="hidden" id="id_informante" name="id_informante" >
               <input type="hidden" id="id_responsable" name="id_responsable" > 
             

              <div class="modal-body">
              <div class="box-body">
                  <label id="fecha_i" class="pull-right" ><h4>FECHA DE ELABORACION: <strong><?php $fecha = date("Y-m-d"); echo "$fecha"; ?></strong> </h4></label>


              <h3 class="modal-title"> <i class="fa fa-user"></i> Datos Generales del Paciente</h3> 
             
             <div class="box box-success">
                 <div class="form-group">
              <div class="box-body">
            
         
             

                    <div class="row">
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Nombre:</label>
                  </div>
                  <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="NOMBRE DEL PACIENTE" required>
                  
                </div>
              </div>
              </div>
                <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Curp:</label>
                  </div>
                  <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" required>
                </div>
              </div>
              </div>
              </div>
                     <div class="row">
            

               <div class="col-lg-6 col-md-6">
           <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha de Nacimiento:</label>
                  </div>
                   <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"  placeholder="FECHA DE NACIMIENTO">
              </div>
              </div>

             
              </div>
                <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <label>Entidad Nacimiento:</label>
                                  </div>
                                  <?php 
                                    /* echo "<select class='form-control select2' style='width: 100%; text-transform: uppercase;'  id='fk_estado_nacimiento' name='fk_estado_nacimiento'>

                                      ".$estado->HTMLEstados()."</select>";*/
                                  ?>
                          
                                </div>
                              </div>
                              </div>
              
              </div>
           
                 <div class="row">
    
                                      <div class="col-lg-3">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Edad (Horas): </label>
                  </div>
                  <input type="number" class="form-control" id="edad" name="edad" min="1" max="24">
              
                 </div>
              </div>
              </div>
              <div class="col-lg-3">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Dias: </label>
                  </div>
                  <input type="number" class="form-control" name="dia" id="dia" min="1" max="31">
          
                 </div>
              </div>
              </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Meses: </label>
                  </div>
                    <select class="form-control" id="edadMeses" name="edadMeses"><OPTION value="">---</OPTION>
                      
                      <option>1 Mes</option><option>2 Mes</option><option>3 Mes</option><option>4 Mes</option><option>5 Mes</option><option>6 Mes</option><option>7 Mes</option><option>8 Mes</option><option>9 Mes</option><option>10 Mes</option> <option>11 Mes</option> <

                    </select>
                 </div>
              </div>
              </div>
                 <div class="col-lg-3">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Añsos: </label>
                  </div>
                  <input type="number" class="form-control" name="anios" id="anios" min="1" max="100">
          
                 </div>
              </div>
              </div>
              </div>
             <DIV class="row">
             <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Sexo: </label>
                  </div>
                    <select class="form-control" id="sexo" name="sexo" required><OPTION value="">---</OPTION><option>MASCULINO</option><OPTION>FEMENINO</OPTION></select>
                 </div>
              </div>
              </div>
          <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Afiliación: </label>
                  </div>
                    <select class="form-control" id="sexo" name="sexo" required><OPTION value="">---</OPTION><option>SEGURO POPULAR</option></select>
                 </div>
              </div>
              </div>

              <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Numero de Afiliación:</label>
                  </div>
                  <input type="text" class="form-control" id="numero_afiliacion" name="numero_afiliacion" placeholder="No. de Afiliacion" required>
                </div>
              </div>
              </div>
              </div>

              
   





            </div>
              </div></div>



            
              <h3 class="modal-title"> <i class="fa fa-fw  fa-male"></i>Domicilio actual del Paciente</h3> <br> 
                <div class="box box-success">

            
              <div class="box-body" >
                
          <div class="row">
                        <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Tipo de Vialidad:</label>
                  </div>
                  <select class="form-control" id="tipo_vialidad" name="tipo_vialidad" >
                       <option>
                         AMPLIACION
                       </option>
                       <option>ANDADOR</option>
                       <option>AVENIDA</option>
                       <option>BOULEVARD</option>
                       <option>CALLE</option>
                       <option>CALLEJON</option>
                       <option>CALZADA</option>
                       <option>CERRADA</option>
                       <option>CIRCUITO</option>
                       <option>CIRCUNVALACION</option>
                       <option>CONTINUACION</option>
                       <option>CORREDOR</option>
                       <option>DIAGONAL</option>
                       <option>EJE VIAL</option>
                       <option>PASAJE</option>
                       <option>PEATONAL</option>
                       <option>PERIFERICO</option>
                       <option>PRIVADA</option>
                       <option>PROLONGACION</option>
                       <option>RETORNO</option>
                       <option>VIADUCTO</option>
                       <option>CARRETERA</option>
                       <option>BRECHA</option>
                       <option>CAMINO</option>
                       <option>TERRACERIA</option>
                       <option>VEREDA</option>
                       <option>NE</option>
                  </select>
                </div>
              </div>
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Nombre de la Vialidad:</label>
                  </div>
                  <input type="text" class="form-control" id="nombre_vialidad" name="nombre_vialidad" placeholder="Nombre de la Vialidad">
                </div>
              </div>
              </div>
              
              </div>

                <div class="row">
                 <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Número Ext:</label>
                  </div>
                   <input type="text" class="form-control" id="numero_exterior" name="numero_exterior" placeholder="Numero exterior">
                </div>
              </div>
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Número Int:</label>
                  </div>
                  <input type="text" class="form-control" id="numero_interior" name="numero_interior" placeholder="Numero exterior">
                </div>
              </div>
              </div>
              
              </div>
                       <div class="row">
                        <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Tipo de Asentamiento Humano:</label>
                  </div>
                  <select class="form-control" id="tipo_asentamiento" name="tipo_asentamiento" >
                          <option>AEROPUERTO</option>
                          <option>AMPLIACION</option>
                          <option>BARRIO</option>
                          <option>CANTON</option>
                          <option>CIUDAD</option>
                          <option>CIUDAD INDUSTRIAL</option>
                          <option>COLONIA</option>
                          <option>CONDOMINIO</option>
                          <option>CONJUNTO HABITACIONAL</option>
                          <option>CORREDOR INDUSTRIAL</option>
                          <option>COTO</option>
                          <option>CUARTEL</option>
                          <option>EJIDO</option>
                          <option>EXHACIENDA</option>
                          <option>FRACCION</option>
                          <option>FRACCIONAMIENTO</option>
                          <option>GRANJA</option>
                          <option>HACIENDA</option>
                          <option>INGENIO</option>
                          <option>MANZANA</option>
                          <option>PARAJE</option>
                          <option>PARQUE INDUSTRIAL</option>
                          <option>PRIVADA</option>
                          <option>PROLONGACION</option>
                          <option>PUEBLO</option>
                          <option>PUERTO</option>
                          <option>RANCHERIA</option>
                          <option>RANCHO</option>
                          <option>REGION</option>
                          <option>RESIDENCIAL</option>
                          <option>RINCONADA</option>
                          <option>SECCION</option>


                  </select>
                </div>
              </div>
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Nombre del Asentamiento Humano:</label>
                  </div>
                  <input type="text" class="form-control" id="nombre_asentamiento" name="nombre_asentamiento" placeholder="Nombre Asentamiento">
                </div>
              </div>
              </div>
              
              </div>
       
                <div class="row">
               <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                                <label>Entidad Federativa:</label>
                            </div>
                            <?php 
                               echo "<select class='form-control select2' id='fk_estado' name='fk_estado'>
                                ".$estado->HTMLEstados()."</select>";
                            ?>
                    
                          </div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Municipio:</label>
                  </div>
                  <select class="form-control select2" id="fk_municipio" name="fk_municipio" >
                  
                  </select>
                </div>
              </div>
              </div>
             
              
              </div>
                 <div class="row">
             
                        <div class="col-lg-6 col-md-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Localidad:</label>
                  </div>
                  <select class="form-control" id="localidad" name="localidad" >

                  </select>
                </div>
              </div>
              </div>
               <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Codigo Postal:</label>
                  </div>
                  <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Codigo Postal">
                </div>
              </div>
              </div>
              </div>



                    <div class="row">
               <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Teléfono:</label>
                  </div>
                   <input type="text" id="telefono" name="telefono" placeholder="Telefono" class="form-control" >

                   </div>
              </div>
              </div>  
              
     
 
                   </div>

 
 

             
                


          
              </div> </div>

                <div class="alert alert-success alert-dismissible" id="alertaguardar" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje!</h4>
                <div id="mensaje"></div>
              </div>
             
              </div>
               </div>



              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" >Cerrar</button>
                 <button type="submit" class="btn btn-primary pull-right" id="guardar_p" >Guardar</button>
                <button type="button" class="btn btn-primary pull-right" onclick="actualizar_pacientes()" style="display:none" id="actualizar_p" >Actualizar</button>
              </div>
              
            </div>
            </form>
          
          </div>
        </div>  -->