<?php 
include_once '../../php/conexion.php';
include_once '../../php/modulo_estatus.php';
include_once '../../php/estado.php';

$con = new conexion();
$tsocial= new modulo_estatus();
$estado= new estado();

?>


  <script>
          $(document).ready(function(){ 

        $("#nombrePaciente").autocomplete({
              source: "../php/autocompletar.php",
              minLength: 12
          
          });  
         $("#NoExp").autocomplete({
              source: "../php/completarNoExp.php",
              minLength: 1
          
          }); 
            $("#TrabajoSocial").autocomplete({
              source: "../php/completarTrabajo.php",
              minLength: 1
          
          });   
             $("#Especialidad").autocomplete({
              source: "../php/completarEspecialidad.php",
              minLength: 1
          
          });   
           $("#UnidadqueRefiere").autocomplete({
              source: "../php/completarUnidad.php",
              minLength: 1
          
          });  
           


           
              });

            $("#nombrePaciente").focusout(function(){
             llenarDatosPaciente();

          });

            $("#NoExp").focusout(function(){
             llenarDatosPaciente2();

          });


function llenarDatosPaciente()
{  
              var nombrePaciente=$("#nombrePaciente").val();
            
               $.ajax({url:"../php/main.php",
                dataType:"json",
                data:"opcion=BUSCARPACIENTE&nombrePaciente="+nombrePaciente,type:"POST",
              cache:false,success:function(respuesta){
               jQuery("#Fecha").val(respuesta[0].Fecha);
               jQuery("#NoExp").val(respuesta[0].NoExp);
               jQuery("#id_expediente").val(respuesta[0].id_expediente);
               jQuery("#FechaCReferencia").val(respuesta[0].FechaCReferencia);
               jQuery("#Medico").val(respuesta[0].Medico);
               jQuery("#Especialidad").val(respuesta[0].Especialidad);
               jQuery("#FolioSpopular").val(respuesta[0].FolioSpopular);
               jQuery("#Calle").val(respuesta[0].Calle);
               jQuery("#colonia").val(respuesta[0].colonia);
               jQuery("#localidad").val(respuesta[0].localidad);
               jQuery("#Diagnostico").val(respuesta[0].Diagnostico);
               jQuery("#UnidadqueRefiere").val(respuesta[0].UnidadqueRefiere);
               jQuery("#Sexo option[value="+respuesta[0].Sexo+"]").attr("selected",true);
               jQuery("#Medico").val(respuesta[0].Medico);
               jQuery("#TrabajoSocial").val(respuesta[0].TrabajoSocial);
               jQuery("#FechaCReferencia").val(respuesta[0].FechaCReferencia);
               jQuery("#DiagnosticoFinal").val(respuesta[0].DiagnosticoFinal);
               //  alert(respuesta);
               // alert(respuesta[0].Fecha);
               /*   jQuery("#fk_estado_nacimiento option[value="+respuesta.entidad_nacimiento+"]").attr("selected",true);
                  jQuery("#sexo       option[value="+respuesta.sexo+"]").attr("selected",true);
                  jQuery("#afiliacion option[value="+respuesta.afiliacion+"]").attr("selected",true);
                   $("#nombre").val(respuesta.nombre);
                   $("#fecha_nacimiento").val(respuesta.fecha_nacimiento);
                   jQuery("#tipo_vialidad option[value="+respuesta.tipo_vialidad+"]").attr("selected",true);                  
                   jQuery("#numero_afiliacion").val(respuesta.numero_afiliacion);
                   jQuery("#nombre_vialidad").val(respuesta.nombre_vialidad);
                   jQuery("#numero_exterior").val(respuesta.numero_exterior);
                   jQuery("#numero_interior").val(respuesta.numero_interior)
                   jQuery("#nombre_asentamiento").val(respuesta.nombre_asentamiento);
                   jQuery("#tipo_asentamiento option[value="+respuesta.tipo_asentamiento+"]").attr("selected",true);
                   jQuery("#fk_estado option[value="+respuesta.fk_estado+"]").attr("selected",true);
                   clickResponse('#fk_municipio','../php/main.php',"opcion=MOSTRARMUNICIPIO&id="+respuesta.fk_estado);                    
                   setTimeout(function(){ jQuery("#fk_municipio option[value="+respuesta.fk_municipio+"]").attr("selected",true); }, 1000);
                   $("#codigo_postal").val(respuesta.cp);
                   $("#telefono").val(respuesta.telefono);
                   jQuery("#localidad").val(respuesta.localidad);*/
                   // calcularEdad(jQuery("#fecha_nacimiento").val());
                 // jQuery("#fk_municipio option[value="+respuesta.fk_municipio+"]").attr("selected",true);
                  // alert(respuesta.fk_municipio);
                  }});

}

function llenarDatosPaciente2()
{   
             
              var NoExp=jQuery("#NoExp").val();
               $.ajax({url:"../php/main.php",
                dataType:"json",
                data:"opcion=BUSCARPACIENTE2&NoExp="+NoExp,type:"POST",
              cache:false,success:function(respuesta){
               jQuery("#Fecha").val(respuesta[0].Fecha);
                jQuery("#nombrePaciente").val(respuesta[0].nombre);
               jQuery("#id_expediente").val(respuesta[0].id_expediente);
               jQuery("#FechaCReferencia").val(respuesta[0].FechaCReferencia);
               jQuery("#Medico").val(respuesta[0].Medico);
               jQuery("#Especialidad").val(respuesta[0].Especialidad);
               jQuery("#FolioSpopular").val(respuesta[0].FolioSpopular);
               jQuery("#Calle").val(respuesta[0].Calle);
               jQuery("#colonia").val(respuesta[0].colonia);
               jQuery("#localidad").val(respuesta[0].localidad);
               jQuery("#Diagnostico").val(respuesta[0].Diagnostico);
               jQuery("#UnidadqueRefiere").val(respuesta[0].UnidadqueRefiere);
               jQuery("#Sexo option[value="+respuesta[0].Sexo+"]").attr("selected",true);
               jQuery("#Medico").val(respuesta[0].Medico);
               jQuery("#TrabajoSocial").val(respuesta[0].TrabajoSocial);
               jQuery("#FechaCReferencia").val(respuesta[0].FechaCReferencia);
               jQuery("#DiagnosticoFinal").val(respuesta[0].DiagnosticoFinal);
          
                  }});

}
        </script>
        
<div class="modal-content">
           
              <div class="modal-body">
              <div class="box-body">
        
       <form role="formCita" id="formCita" name="formCita"  autocomplete="off" >
              <input type="hidden" name="id_expediente" id="id_expediente">
             
         <H3> DATOS DEL PACIENTE</H3>
                 <div class="row">
                      <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Nombre:</label>
                  </div>
                  <input type="text" class="form-control" id="nombrePaciente"  style="text-transform: uppercase;" name="nombrePaciente" placeholder="nombre del Paciente"  required>
                </div>
              </div>
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Calle:</label>
                  </div>
                  <input type="text" class="form-control" id="Calle" name="Calle" style="text-transform: uppercase;"  placeholder="NOMBRE DEL PACIENTE" required>
                  <!--<button type="button" onclick="mostrarModalPaciente()" class="btn btn-primary">Agregar Paciente</button> -->
                </div>
              </div>
              </div>
                
              </div>
                   <div class="row">
                      <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Colonia:</label>
                  </div>
                  <input type="text" class="form-control" id="colonia" style="text-transform: uppercase;" name="colonia" placeholder="Colonia"  required>
                </div>
              </div>
              </div>
              <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Localidad:</label>
                  </div>
                  <input type="text" class="form-control" id="localidad" name="localidad" style="text-transform: uppercase;"  placeholder="Localidad" required>
                  <!--<button type="button" onclick="mostrarModalPaciente()" class="btn btn-primary">Agregar Paciente</button> -->
                </div>
              </div>
              </div>
                 <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Sexo:</label>
                  </div>
               <select id="Sexo" name="Sexo" class="form-control">
                 <option>---</option>
                 <option value="M">M</option>
                 <option value="F">F</option>
               </select>
                </div>
              </div>
              </div>
                
              </div>
         

<h3>DATOS DE LA CONSULTA</h3>

   <div class="row">
             <div class="col-lg-6">
            <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Número de Expediente:</label>
                  </div>
                   <input type="text" class="form-control" id="NoExp" name="NoExp"  placeholder="Numero" >
              </div>
              </div>
              </div>

     

            </div>
                     <div class="row">

            

    <div class="col-lg-6">
           <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha:</label>
                  </div>
                    <div class="bootstrap-timepicker timepicker">
                       <input  class="form-control" id="Fecha" name="Fecha" type="text" placeholder="Hora de llegada" >           
                   </div>
              </div>
              </div>

             
              </div>






              <div class="col-lg-6">
           <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha C Referencia:</label>
                  </div>
                   <input type="text" class="form-control" id="FechaCReferencia" name="FechaCReferencia"   placeholder="FECHA DE ATENCION">
              </div>
              </div>

             
              </div>

            </div>
            <div class="row">
               <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Trabajo Social:</label>
                  </div>
                <input type="text" class="form-control" id="TrabajoSocial" name="TrabajoSocial" required>
                   </div>
              </div>
              </div>
             
               <div class="col-lg-6">
            <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Unidad que refiere</label>
                  </div>
                   <input type="text" class="form-control" id="UnidadqueRefiere" name="UnidadqueRefiere" required>
              </div>
              </div>
              </div>
    </div>
           <div class="row">
  <div class="col-lg-6">
           <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Folio S Polular:</label>
                  </div>
                   
                       <input  class="form-control" id="FolioSpopular" name="FolioSpopular" type="text" placeholder="Folio Seguro Popular" required>           
               
              </div>
              </div>

             
              </div>
              <div class="col-lg-6">
           <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Medico:</label>
                  </div>
                   <input type="text" class="form-control" id="Medico"  style="text-transform: uppercase;" name="Medico"  placeholder="Nombre del Medico" required>
              </div>
              </div>

             
              </div>

            </div>
              <div class="row">
  <div class="col-lg-6">
           <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Diagnóstico</label>
                  </div>
                   
                       <textarea rows="4" cols="50" class="form-control" id="Diagnostico" name="Diagnostico" type="text" placeholder="Diagnostico" required>

                      </textarea>       
               
              </div>
              </div>

             
              </div>
              <div class="col-lg-6">
           <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Diagnostico Final:</label>
                  </div>
                   <textarea rows="4" cols="50" class="form-control" id="DiagnosticoFinal" name="DiagnosticoFinal" type="text" placeholder="Diagnostico" required>

                      </textarea>  
              </div>
              </div>

             
              </div>
             
            </div>
  
             <div class="row">             
                  <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Especialidad:</label>
                  </div>
                <input type="text" class="form-control" id="Especialidad" name="Especialidad" required>
                 
                   </div>
              </div>
              </div>

                
                </div>
       
            
                   <div class="row"> 
           
                    <div class="col-md-12">
                   <button type="submit" id="guardarCitas" name="guardarCitas" value="guardar" class="btn btn-primary pull-right">Guardar Expediente</button>
                  
                   <button type="button" onclick="verificarExpediente()" id="actualizarCitas" name="actualizarCitas" value="actualizar" class="btn btn-success">Actualizar Expediente</button>
                   <button type="button" onclick="limpiar()" id="actualizarCitas" name="actualizarCitas" value="actualizar" class="btn btn-info">Limpiar</button>
                    <button type="button" onclick="eliminar()" id="actualizarCitas" name="actualizarCitas" value="elimimar" class="btn btn-info">Eliminar</button>
                   </div>

                  </div>
                      <div class="row"> 
           
                    <div class="col-md-12">
                  <div  id="alertaguardarCita"   role="alert">
                   <div id="mensaje"></div>
                  </div>
                   </div>

                  </div>
                     
                
                  

     </form>
 

                   
     

     <!--            <h3>DATOS DEL PACIENTE</h3>
     
         <form  id="formPaciente" name="formPaciente" method="post" autocomplete="off" >

             
            

                    <div class="row">
                      <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Curp:</label>
                  </div>
                  <input type="text" class="form-control" id="curp" onkeyup="llenarDatosPaciente();" style="text-transform: uppercase;" name="curp" placeholder="CURP"  required>
                </div>
              </div>
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Nombre:</label>
                  </div>
                  <input type="text" class="form-control" id="nombre" name="nombre" style="text-transform: uppercase;"  placeholder="NOMBRE DEL PACIENTE" required>
               
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
                   <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"  placeholder="FECHA DE NACIMIENTO" required>
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
                                     echo "
                                      <select  class='form-control' style='width: 100%; text-transform: uppercase;'  id='fk_estado_nacimiento' name='fk_estado_nacimiento' required>
                                      ".$estado->HTMLEstados()."</select>";
                                  ?>
                          
                                </div>
                              </div>
                              </div>
              
              </div>
           
            
             <div class="row">
             <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Sexo: </label>
                  </div>
                    <select class="form-control" id="sexo" name="sexo" required><OPTION value="">---</OPTION>
                      <option value="MASCULINO">MASCULINO</option>
                      <OPTION value="FEMENINO">FEMENINO</OPTION>
                    </select>
                 </div>
              </div>
              </div>
          <div class="col-lg-3">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Afiliación: </label>
                  </div>
                    <select class="form-control" id="afiliacion" name="afiliacion" required><OPTION value="">---</OPTION>
                    <option value="1">IMSS</option>
                    <option value="2">ISSSTE</option>
                    <option value="3">PEMEX</option>
                    <option value="4">SEDENA</option>
                    <option value="5">SEMAR</option>
                    <option value="6">GOB. ESTATAL</option>
                    <option value="7">SEGURO PRIVADO</option>
                    <option value="8">SEGURO POPULAR</option>
                    <option value="9">SE IGNORA</option>
                    <option value="10">OTRO</option>
                    <option value="11">PROSPERA</option>
                    <option value="12">NINGUNA</option>
                  </select>
                 </div>
              </div>
              </div>
                     <div class="col-lg-3">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Numero de Afiliación:</label>
                  </div>
                  <input type="text" class="form-control" id="numero_afiliacion" style="text-transform: uppercase;" name="numero_afiliacion" placeholder="No. de Afiliacion" required>
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
                  <input type="number" class="form-control" id="edad" name="edad" min="1" max="23" >
            
                 </div>
              </div>
              </div>
                                      <div class="col-lg-3">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Edad (Dias): </label>
                  </div>
                  <input type="number" class="form-control" name="dia" id="dia" min="1" max="31" readonly>
           
                 </div>
              </div>
              </div>
            <div class="col-lg-3">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Edad (Meses): </label>
                  </div>
                     <input type="number" class="form-control" name="meses" id="meses" min="1" max="11" readonly>
                 </div>
              </div>
              </div>
                            <div class="col-lg-3">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Edad (Años): </label>
                  </div>
                   <input type="number" class="form-control" name="anios" id="anios" min="1" max="100" readonly>
                 </div>
              </div>
              </div>

            
              
              </div>
             




              <h3>DOMICILIO ACTUAL DEL PACIENTE</h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Tipo de Vialidad:</label>
                  </div>
                  <select class="form-control" id="tipo_vialidad" name="tipo_vialidad" required >
                       <option value="">-----</option>
                       <option value="1">ANDADOR</option>
                       <option value="2">AVENIDA</option>
                       <option value="3">BOULEVARD</option>
                       <option value="4">CALLE</option>
                       <option value="5">CALLEJON</option>
                       <option value="6">CALZADA</option>
                       <option value="7">CERRADA</option>
                       <option value="8">CIRCUITO</option>
                       <option value="9">CIRCUNVALACION</option>
                       <option value="10">CONTINUACION</option>
                       <option value="11">CORREDOR</option>
                       <option value="12">DIAGONAL</option>
                       <option value="13">EJE VIAL</option>
                       <option value="14">PASAJE</option>
                       <option value="15">PEATONAL</option>
                       <option value="16">PERIFERICO</option>
                       <option value="17">PRIVADA</option>
                       <option value="18">PROLONGACION</option>
                       <option value="19">RETORNO</option>
                       <option value="20">VIADUCTO</option>
                       <option value="21">CARRETERA</option>
                       <option value="22">BRECHA</option>
                       <option value="23">CAMINO</option>
                       <option value="24">TERRACERIA</option>
                       <option value="25">VEREDA</option>
                       <option value="26">NE</option>
                       <option value="27"> AMPLIACION </option>
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
                  <input type="text" class="form-control" id="nombre_vialidad" style="text-transform: uppercase;" name="nombre_vialidad" placeholder="Nombre de la Vialidad" required>
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
                   <input type="text" class="form-control" id="numero_exterior" style="text-transform: uppercase;" name="numero_exterior" placeholder="Numero exterior" required>
                </div>
              </div>
              </div>
              <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Número Int:</label>
                  </div>
                  <input type="text" class="form-control" id="numero_interior" style="text-transform: uppercase;" name="numero_interior" placeholder="Numero exterior" required>
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
                  
            
                  <select class="form-control" id="tipo_asentamiento" name="tipo_asentamiento" required>
                          <option value="">-----</option>
                          <option value="1">AEROPUERTO</option>
                          <option value="2">AMPLIACION</option>
                          <option value="3">BARRIO</option>
                          <option value="4">CANTON</option>
                          <option value="5">CIUDAD</option>
                          <option value="6">CIUDAD INDUSTRIAL</option>
                          <option value="7">COLONIA</option>
                          <option value="8">CONDOMINIO</option>
                          <option value="9">CONJUNTO HABITACIONAL</option>
                          <option value="10">CORREDOR INDUSTRIAL</option>
                          <option value="11">COTO</option>
                          <option value="12">CUARTEL</option>
                          <option value="13">EJIDO</option>
                          <option value="14">EXHACIENDA</option>
                          <option value="15">FRACCION</option>
                          <option value="16">FRACCIONAMIENTO</option>
                          <option value="17">GRANJA</option>
                          <option value="18">HACIENDA</option>
                          <option value="19">INGENIO</option>
                          <option value="20">MANZANA</option>
                          <option value="21">PARAJE</option>
                          <option value="22">PARQUE INDUSTRIAL</option>
                          <option value="23">PRIVADA</option>
                          <option value="24">PROLONGACION</option>
                          <option value="25">PUEBLO</option>
                          <option value="26">PUERTO</option>
                          <option value="27">RANCHERIA</option>
                          <option value="28">RANCHO</option>
                          <option value="29">REGION</option>
                          <option value="30">RESIDENCIAL</option>
                          <option value="31">RINCONADA</option>
                          <option value="31">SECCION</option>


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
                  <input type="text" class="form-control" id="nombre_asentamiento" style="text-transform: uppercase;" name="nombre_asentamiento" placeholder="Nombre Asentamiento" required>
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
                               echo "<select class='form-control select2' id='fk_estado' name='fk_estado' required>
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
                  <select class="form-control" id="fk_municipio" name="fk_municipio" required>
                   <option value="">---</option>
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
                  <input type="text" class="form-control" id="localidad" style="text-transform: uppercase;" name="localidad" placeholder="Localidad" required> 

               
                </div>
              </div>
              </div>
               <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Codigo Postal:</label>
                  </div>
                  <input type="text" class="form-control" id="codigo_postal" style="text-transform: uppercase;" name="codigo_postal" placeholder="Codigo Postal" required>
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
                   <input type="text" id="telefono" name="telefono" style="text-transform: uppercase;" placeholder="Telefono" class="form-control" required>

                   </div>
              </div>
              </div>  
              
     
 
                   </div>
                     <div class="row">
               <div  id="alertaguardarPaciente">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                
                <div id="mensaje2"></div>
              </div>
                  </div>

   <button type="submit" id="guardarPaci" name="guardarPac"  class="btn btn-primary pull-right">Guardar Paciente</button>

                   
         </form> 
          

       
      -->     

   </div></div></div>

        <!-- /.box-body -->
        <br>
      <hr>
      

      

<div class="row"  >
  <div class="col-md-12">
    <div class="content">
    <div class="box-body" >
    <div class="panel-body table-responsive">
        <table id="tabla_citas" class="table table-bordered table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Eliminar</th>
                <th>No. Expediente</th>
                <th>Fecha</th>         
                <th>Nombre de Pacinte</th>
                <th>Nombre del Médico</th>                
           
            </tr>
        </thead>
        <tfoot>
            <tr><th>Eliminar</th>
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
<script>

 /* function mostrarModalPaciente()
  {    $("#modal").modal("show");
  } */
function eliminar()
{ var noexp=jQuery("#NoExp").val();
   $.ajax({url:"../php/main.php",type:"post",cache:false,data:"opcion=ELIMINAREXP2&id="+noexp,beforeSend:function(){// $(idComponente).html("<div class='row' id='' > <div class='col-lg-12' align='center'><img align='center' src='../resources/img/loading.gif'   /></div></div>");
      },
           success:function(respuesta){
             jQuery("#alertaguardarCita").show();
             $("#alertaguardarCita").removeClass("alert-danger");
             $("#alertaguardarCita").addClass("alert-success");
             $("#mensaje").html("PACIENTE ELIMINADO");
            setTimeout(function(){ jQuery("#alertaguardarCita").hide() }, 3000);
            limpiar();
           }
         });
}
function actualizar()
{  if  (jQuery("#id_expediente").val()=='')
   {alert("SOLO PUEDE GUARDAR");
  }
  else{ var datos= jQuery("#formCita").serialize();
  // alert(datos);
  
  //alert(jQuery("guardarCitas").val())
   $.ajax({url:"../php/main.php",type:"post",cache:false,data:"opcion=ACTUALIZAREXP&"+datos,beforeSend:function(){// $(idComponente).html("<div class='row' id='' > <div class='col-lg-12' align='center'><img align='center' src='../resources/img/loading.gif'   /></div></div>");
      },
           success:function(respuesta){
               if(respuesta=="GUARDAR"){
           jQuery("#alertaguardarCita").show();
             $("#alertaguardarCita").removeClass("alert-danger");
             $("#alertaguardarCita").addClass("alert-success");
             $("#mensaje").html("LOS DATOS SE HAN GUARDADO CORRECTAMENTE");
            setTimeout(function(){ jQuery("#alertaguardarCita").hide() }, 3000);
            limpiar();
           }
          else if(respuesta=="ERROR"){
            jQuery("#alertaguardarCita").show();
              $("#alertaguardarCita").removeClass("alert-success");
              $("#alertaguardarCita").addClass("alert-danger"); 
              $("#mensaje").html("ERROR AL GUARDAR");
              setTimeout(function(){ jQuery("#alertaguardarCita").hide() }, 3000);
             }
        
            tabla_consulta.ajax.url("../php/main.php?opcion=CONSULTAR_CITAS").load();
              }}); 
 }
}
$(document).ready(function(){






$(".select2").select2({theme:"bootstrap"});
   // $('#hora_llegada').timepicker({});

      jQuery('#fecha_nacimiento').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
      }).datepicker("setDate", new Date());
      jQuery('#hora_llegada').timepicker({defaultTime: 'current',minuteStep: 1});
      jQuery('#hora_atencion').timepicker({defaultTime: 'current',minuteStep: 1});
        
  $("#informe").click(function(){
    var ser= $("#ser").val();
     document.location.href="../php/informe.php?idservicio="+ser;
  });

  
 /* $("#fk_estado").change(function()
  {
     $.ajax({url:"../php/main.php",type:"GET",data:"opcion=OBTENER_MUNICIPIOS&id="+this.value,cache:false,success:function(respuesta){
     
      $("#fk_municipio").html(respuesta);
     
     }});

  });*/
 //$("[name='caso_medico_legal']").bootstrapSwitch();
 $("[name='esc']").bootstrapSwitch();
 $("[name='cml']").bootstrapSwitch();
 $("[name='acta_nacimiento']").bootstrapSwitch();
 $("[name='copia_sp']").bootstrapSwitch();
 $("[name='pase']").bootstrapSwitch();

   

  })


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



$('#fecha_egreso').datepicker(
  {
      autoclose: true , 
      language: 'es',
       format: 'dd-mm-yyyy'
    });
$('#FechaCReferencia').datepicker( {
      autoclose: true , 
      language: 'es',
       format: 'yyyy-mm-dd'
    }).datepicker("setDate", new Date());
 $('#Fecha').datepicker( {
      autoclose: true , 
      language: 'es',
       format: 'yyyy-mm-dd'
    }).datepicker("setDate", new Date());
  


 
$("#fk_servicio_ingresa").select2({theme:"bootstrap"});
$("#cama").select2({theme:"bootstrap"});

$('#formCita').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {  
        } 
        else 
        {  

          var NoExp = jQuery("#NoExp").val();
 $.ajax({url:"../php/main.php",dataType:"json",type:"post",cache:false,data:"opcion=VERIFICAREXPEDIENTE&NoExp="+NoExp,beforeSend:function(){// $(idComponente).html("<div class='row' id='' > <div class='col-lg-12' align='center'><img align='center' src='../resources/img/loading.gif'   /></div></div>");
      },
           success:function(respuesta){
            
           if (respuesta[0].nombre!=='vacio')
           { 
            var pregunta= confirm("ESTE NÚMERO DE EXPEDIENTE ESTÁ A NOMBRE DE "+respuesta[0].nombre+" ¿DESEA CONTINUAR CON EL REGISTRO?");
             if(pregunta)
              guardar();
           }
          else
            //alert('NO EXISTE');
             guardar();
              }}); 
            
        return false;
        }
    });

function guardar()
{
     var datos= jQuery("#formCita").serialize();
  // alert(datos);
  //alert(jQuery("guardarCitas").val())
   $.ajax({url:"../php/main.php",type:"post",cache:false,data:"opcion=GUARDARCITAADMIN&"+datos,beforeSend:function(){// $(idComponente).html("<div class='row' id='' > <div class='col-lg-12' align='center'><img align='center' src='../resources/img/loading.gif'   /></div></div>");
      },
           success:function(respuesta){
         //   alert(respuesta);
           if(respuesta=="GUARDAR"){
           jQuery("#alertaguardarCita").show();
             $("#alertaguardarCita").removeClass("alert-danger");
             $("#alertaguardarCita").addClass("alert-success");
             $("#mensaje").html("LOS DATOS SE HAN GUARDADO CORRECTAMENTE");
            setTimeout(function(){ jQuery("#alertaguardarCita").hide() }, 3000);
            limpiar();
           }
          else if(respuesta=="ERROR"){
            jQuery("#alertaguardarCita").show();
              $("#alertaguardarCita").removeClass("alert-success");
              $("#alertaguardarCita").addClass("alert-danger"); 
              $("#mensaje").html("ERROR AL GUARDAR");
              setTimeout(function(){ jQuery("#alertaguardarCita").hide() }, 3000);
             }
            tabla_consulta.ajax.url("../php/main.php?opcion=CONSULTAR_CITAS").load();
              }}); 
}
function verificarExpediente()
{
  var NoExp = jQuery("#NoExp").val();
 $.ajax({url:"../php/main.php",dataType:"json",type:"post",cache:false,data:"opcion=VERIFICAREXPEDIENTE&NoExp="+NoExp,beforeSend:function(){// $(idComponente).html("<div class='row' id='' > <div class='col-lg-12' align='center'><img align='center' src='../resources/img/loading.gif'   /></div></div>");
      },
           success:function(respuesta){
            
         
              actualizar();
         
              }}); 
}

function limpiar(){
         
               jQuery("#NoExp").val("");
               jQuery("#id_expediente").val("");
              
               jQuery("#Medico").val("");
               jQuery("#Especialidad").val("");
               jQuery("#FolioSpopular").val("");
               jQuery("#Calle").val("");
               jQuery("#colonia").val("");
               jQuery("#localidad").val("");
               jQuery("#Diagnostico").val("");
               jQuery("#UnidadqueRefiere").val("");
               jQuery("#nombrePaciente").val("");
               jQuery("#Medico").val("");
               jQuery("#TrabajoSocial").val("");
               
               jQuery("#DiagnosticoFinal").val("");
}
function eliminarExp(id)
{   var answer = confirm("¿Deseas eliminar este registro?")
    if (answer){
   $.ajax({url:"../php/main.php",type:"post",cache:false,data:"opcion=ELIMINAREXP&id="+id,beforeSend:function(){// $(idComponente).html("<div class='row' id='' > <div class='col-lg-12' align='center'><img align='center' src='../resources/img/loading.gif'   /></div></div>");
      },
           success:function(respuesta){
      
            alert(respuesta);
            tabla_consulta.ajax.url("../php/main.php?opcion=CONSULTAR_CITAS").load();
              }}); 
     }else alert("ACCIÓN CANCELADA");
}



</script>  




<script>
 function leer(){
  tabla_consulta=  $('#tabla_citas').DataTable(
            { "language": {
                "url": "../resources/json/Spanish.json"
            },
            "bProcessing": true,
            "sAjaxDataProp":"",   
            "iDisplayStart": 0,
             "order": [[ 0, "asc" ]],
             "searching" : true,
              "paging": false,
             "ajax": "../php/main.php?opcion=CONSULTAR_CITAS",
        "columns": [
           { "data": "id_expediente"},
            { "data": "NoExpa" },
            { "data": "Fecha" },
            { "data": "nombrePaciente" },
           { "data": "Medico" }
        ],
          "columnDefs" :[
                   { 
                      "targets": 0,
                      "render": function (data, type, row, meta) {
         
                    //    return "<a style='color:green'  onclick='reporte("+data+")' ><i class='fa fa-fw fa-file-pdf-o' style='cursor:pointer'></i></a>";
                                return "<a style='color:red'  onclick='eliminarExp(\""+row.id_expediente+"\")' ><i class='fa fa-fw fa-trash-o' style='cursor:pointer'></i></a>";
                      }
                    },],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );

}

$(document).ready(function() {
 
  leer();

});
$('#formCitass').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {  
        } 
        else 
        {  
         
 

  var datos= jQuery("#formCita").serialize();
  // alert(datos);
  //alert(jQuery("guardarCitas").val())
   $.ajax({url:"../php/main.php",type:"post",cache:false,data:"opcion=GUARDARCITAADMIN&"+datos,beforeSend:function(){// $(idComponente).html("<div class='row' id='' > <div class='col-lg-12' align='center'><img align='center' src='../resources/img/loading.gif'   /></div></div>");
      },
           success:function(respuesta){
         //   alert(respuesta);
           if(respuesta=="GUARDAR"){
           jQuery("#alertaguardarCita").show();
             $("#alertaguardarCita").removeClass("alert-danger");
             $("#alertaguardarCita").addClass("alert-success");
             $("#mensaje").html("LOS DATOS SE HAN GUARDADO CORRECTAMENTE");
            setTimeout(function(){ jQuery("#alertaguardarCita").hide() }, 3000);
            limpiar();
           }
          else if(respuesta=="ERROR"){
            jQuery("#alertaguardarCita").show();
              $("#alertaguardarCita").removeClass("alert-success");
              $("#alertaguardarCita").addClass("alert-danger"); 
              $("#mensaje").html("ERROR AL GUARDAR");
              setTimeout(function(){ jQuery("#alertaguardarCita").hide() }, 3000);
             }
            tabla_consulta.ajax.url("../php/main.php?opcion=CONSULTAR_CITAS").load();
              }});    } 
        
           return false;
        
    });
$('#formPaciente').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {  
        } 
        else 
        {  
         
          var datos=jQuery("#formPaciente").serialize();
    
    $.ajax({url:"../php/main.php",type:"post",cache:false,data:"opcion=GUARDARPACIENTEADMIN&"+datos,beforeSend:function(){// $(idComponente).html("<div class='row' id='' > <div class='col-lg-12' align='center'><img align='center' src='../resources/img/loading.gif'   /></div></div>");
    },
           success:function(respuesta){
           
             if(respuesta=="GUARDAR"){
           jQuery("#alertaguardarPaciente").show();
             $("#alertaguardarPaciente").removeClass("alert-danger");
             $("#alertaguardarPaciente").addClass("alert-success");
             $("#mensaje2").html("LOS DATOS DEL PACIENTE SE HAN GUARDADO CORRECTAMENTE");
            setTimeout(function(){ jQuery("#alertaguardarPaciente").hide() }, 3000);
            
           }
           else if(respuesta=="ACTUALIZADO"){
            jQuery("#alertaguardarPaciente").show();
             $("#alertaguardarPaciente").removeClass("alert-danger");
              $("#alertaguardarPaciente").addClass("alert-success");
              $("#mensaje2").html("LOS DATOS DEL PACIENTE SE HAN ACTUALIZADO CORRECTAMENTE");
              setTimeout(function(){ jQuery("#alertaguardarPaciente").hide() }, 3000);
             }
          else if(respuesta=="ERROR"){
            jQuery("#alertaguardarPaciente").show();
              $("#alertaguardarPaciente").removeClass("alert-success");
              $("#alertaguardarPaciente").addClass("alert-danger"); 
              $("#mensaje2").html("ERROR AL GUARDAR");
              setTimeout(function(){ jQuery("#alertaguardarPaciente").hide() }, 3000);
             }
              }});   
           return false;
        }
    });

</script>
