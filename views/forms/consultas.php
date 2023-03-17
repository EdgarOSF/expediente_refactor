<?php
session_start();
session_name("sesion_usuario");
include_once '../../php/conexion.php';
$con=new conexion();

?>
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>

<script src="../resources/js/validator.min.js"></script>



<div class="box box-success">  
<div class="box-body">    
<h2> <i class="fa fa-fw fa-file-excel-o"></i> Reportes</h2><br>


<div class="modal fade" id="mymodal123" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >
      <div class="modal-header">
        <h3 class="modal-title" >Informe Personalizado</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="box-body">
          <br>
            <form role="form" id="form-carga-reporte-nutricion-r" name="form-carga-reporte-nutricion-r" action="" method="post"  >
    
<div class="row">
  <div class="col-md-12">
    <h3>Elija las columnas a generar</h3>
  </div>
</div>
 <div class="row">
                <div class="col-xs-4">
                 
                     
                    <div class="form-group">
                 

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables22[peso]" checked="checked">
                       Peso
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables22[suplemento_alimenticio]" checked="checked">
                       Suplemento Alimenticio
                    </label>
                  </div>

                   <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables22[nombre_suplemento]">
                            Nombre Suplemento
                          </label>
                         </div>
                           <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables22[dx_medico]">
                            Dx Medico
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables22[dx_nutricio]">
                             Dx Nutricio
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables22[dx_talla_edad]">
                           Dx Talla/Edad
                          </label>
                         </div>
                       
                </div>
                  
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                  
                 <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables22[ganancia_peso_sdg]">
                            Ganancia de Peso Para SDG
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables22[pe_eg]">
                          PE/EG
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables22[desarrollo_ultrasonido]">
                             Desarrollo Ultrasonido
                          </label>
                         </div>
                  
                
                        
                            <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables22[imc_pregestacional]" checked="checked">
                             IMC Pregestacional
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables22[tratamiento_nutricio]" checked="checked">
                             Tratamiento Nutricio
                          </label>
                         </div>
                              <div class="checkbox" >
                          <label>
                            <input type="checkbox" name="variables22[fecha]" checked="checked">
                             Fecha
                          </label>
                         </div>
                        
                  </div>
                </div>

              
                </div>
                <div class="row">
                  <div class="col-md-10">
                      <button type="submit" id="RE" class="btn btn-primary pull-right">Generar Documento</button>
                     
                  </div>
                </div>
              
            </form>
        </div>

             <div class="box-body">
            <div class="panel-body table-responsive">
              <table id="example12314" style="font-size: 15px " class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th></th>
                
                  <th>No de Expediente</th>
                  <th>Nombre</th>
                  <th>Edad</th>
                  <th>Municipio</th>
                  <th>Direccion</th>
                </tr>
                </thead>
                <tbody>
                  
                <?php 
                  $array= $con->getDatos("SELECT p.id,p.no_expediente,p.nombre,p.edad, municipios.nombre as nombre_municipio ,p.direccion FROM pacientes as p LEFT JOIN municipios ON municipios.id=fk_municipio  WHERE p.referido=1 AND p.estatus_trabajo_social= 1");
              
                
                  foreach ($array as $key) { 
                    
                    echo "  
                  <tr>
                <td> <input type='radio' checked='checked' id='agregarts' name='agregarts' value='".$key['id']."' /></td> 
                <td>".$key["no_expediente"]."</td>
                <td>".$key["nombre"]."</td>
                <td>".$key["edad"]."</td>
                <td>".$key["nombre_municipio"]."</td>
                <td>".$key["direccion"]."</td>
              </tr>
               ";
            } ?>
                </tbody>
                <tfoot>
                   <tr>
                  <th></th>
                 
                  <th>No de Expediente</th>
                  <th>Nombre</th>
                  <th>Edad</th>
                  <th>Municipio</th>
                  <th>Direccion</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       <!-- <button type="button" class="btn btn-primary">Crear Informe</button> -->
      </div>
    </div>
  </div>
</div>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Trabajo Social</a></li>
    <li><a data-toggle="tab" href="#menu1">Control Prenatal</a></li>
      <li><a data-toggle="tab" href="#menu2">Nutricion</a></li>
  <li><a data-toggle="tab" href="#menu3">Psicologia</a></li>
</ul>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <br>
<form role="form" id="form-carga-reporte" name="form-carga-reporte" action="" method="post"  >
    <div class="row">
  <div class="col-md-4">
      <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha Inicial :</label>
                  </div>
                  <input type="text" class="form-control" id="fecha_inicial" name="fecha_inicial" placeholder="Ingrese la Fecha Inicial" required> 
                </div>
              </div>
  </div>
    <div class="col-md-4">
      <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha Final :</label>
                  </div>
                  <input type="text" class="form-control" id="fecha_final" name="fecha_final" placeholder="Ingrese la Fecha Final" required> 
                </div>
              </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <h3>Elija las columnas a generar</h3>
  </div>
</div>
 <div class="row">
                <div class="col-xs-4">
                 
                     
                    <div class="form-group">
                 

                  <div class="checkbox">
                    <label>
                      <input type="checkbox"  name="variables[no_expediente]" checked="checked" >
                    Numero de Expediente
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables[nombre]" checked="checked" >
                    Nombre
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables[edad]" checked="checked">
                    Edad
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables[edad_conyuge]" checked="checked">
                    Edad del Conyuge
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables[fk_municipio]" checked="checked">
                      Municipio
                    </label>
                  </div>
                 <div class="checkbox">
                        <label>
                      <input type="checkbox" name="variables[direccion]" checked="checked">
                    
                       Direccion
                      
                    </label>
                  </div>
                      <div class="checkbox" checked="checked">
                    <label>
                      <input type="checkbox" name="variables[fecha_nacimiento]" checked="checked">
                      Fecha de Nacimiento
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables[estado_civil]" checked="checked">
                       Estado Civil
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables[ocupacion]" checked="checked">
                       Ocupacion
                    </label>
                  </div>

                   <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables[escolaridad]">
                            Escolaridad
                          </label>
                         </div>
                </div>
                  
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables[telefono]">
                            Telefono
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables[unidad_referencia]">
                             Unidad Referida
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables[nivel_socioeconomico]">
                            Nivel Socioeconomico
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables[mpfc]">
                             MPTC
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables[adicciones]">
                          Adicciones
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables[abuso_sexual]">
                             Abuso Sexual
                          </label>
                         </div>
                            <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[ppspe]" checked="checked">
                             Papás que platicaron sobre Preve. de Emb
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[psepe]" checked="checked">
                             Platica de sexualidad Esc. Preve. de Emb
                          </label>
                         </div>
                              <div class="checkbox" checked="checked">
                          <label>
                            <input type="checkbox" name="variables[estupro]" checked="checked">
                             Estupro
                          </label>
                         </div>
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[motivo_embarazo]" checked="checked">
                           Motivo de Embarazo
                          </label>
                         </div>
                  </div>
                </div>

                 <div class="col-xs-4">
                    <div class="form-group">
     
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[motivo_acepta]" checked="checked">
                            Metodo que Acepta
                          </label>
                         </div>
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[diagnostico_social]" checked="checked">
                           Diagnóstico Social
                          </label>
                         </div>
                         
                           <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[derechohabiente]" checked="checked">
                           Derechohabiente
                          </label>
                         </div>
                            <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[no_derechohabiente]" checked="checked">
                           No. Derechohabiente
                          </label>
                         </div>
                           <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[fecha_ingreso]" checked="checked">
                           Fecha de Ingreso
                          </label>
                         </div>
                             <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[fecha_egreso]" checked="checked">
                           Fecha de Egreso
                          </label>
                         </div>
                           <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[referido]" checked="checked">
                           Referido 
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables[observaciones]" checked="checked">
                           Observacion
                          </label>
                         </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                      <button type="submit" class="btn btn-primary pull-right">Generar Documento</button>
                  </div>
                </div>
            </form>
              
</div>

<div id="menu1" class="tab-pane fade">
<br>
  <form role="form2" id="form-reporte-prenatal" name="form-reporte-prenatal" action="" method="post"  >
    <div class="row">
  <div class="col-md-4">
      <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha Inicial :</label>
                  </div>
                  <input type="text" class="form-control" id="fecha_inicialx" name="fecha_inicialx" placeholder="Ingrese la Fecha Inicial" required> 
                </div>
              </div>
  </div>
    <div class="col-md-4">
      <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha Final :</label>
                  </div>
                  <input type="text" class="form-control" id="fecha_finalx" name="fecha_finalx" placeholder="Ingrese la Fecha Final" required> 
                </div>
              </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <h3>Elija las columnas a generar</h3>
  </div>
</div>
 <div class="row">
                <div class="col-xs-4">
                 
                     
                    <div class="form-group">
                 

                  <div class="checkbox">
                    <label>
                      <input type="checkbox"  name="variablesx[no_expediente]" checked="checked" >
                    Numero de Expediente
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variablesx[nombre]" checked="checked" >
                    Nombre
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variablesx[edad]" checked="checked">
                    Edad
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variablesx[edad_conyuge]" checked="checked">
                    Edad del Conyuge
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variablesx[fk_municipio]" checked="checked">
                      Municipio
                    </label>
                  </div>
                 <div class="checkbox">
                        <label>
                      <input type="checkbox" name="variablesx[direccion]" checked="checked">
                    
                       Direccion
                      
                    </label>
                  </div>
                      <div class="checkbox" checked="checked">
                    <label>
                      <input type="checkbox" name="variablesx[fecha_nacimiento]" checked="checked">
                      Fecha de Nacimiento
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variablesx[estado_civil]" checked="checked">
                       Estado Civil
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variablesx[ocupacion]" checked="checked">
                       Ocupacion
                    </label>
                  </div>

                   <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variablesx[escolaridad]">
                            Escolaridad
                          </label>
                         </div>
                  <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variablesx[telefono]">
                            Telefono
                          </label>
                         </div>
                   <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variablesx[unidad_referencia]">
                             Unidad Referida
                          </label>
                         </div>
                    <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variablesx[nivel_socioeconomico]">
                            Nivel Socioeconomico
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variablesx[mpfc]">
                             MPFC
                          </label>
                         </div>
                           <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variablesx[adicciones]">
                          Adicciones
                          </label>
                         </div>

                           <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variablesx[abuso_sexual]">
                             Abuso Sexual
                          </label>
                         </div>
                </div>
                  
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                          
                         
                          
                        
                        
                            <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[ppspe]" checked="checked">
                             Papás que platicaron sobre Preve. de Emb
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[psepe]" checked="checked">
                             Platica de sexualidad Esc. Preve. de Emb
                          </label>
                         </div>
                              <div class="checkbox" checked="checked">
                          <label>
                            <input type="checkbox" name="variablesx[estupro]" checked="checked">
                             Estupro
                          </label>
                         </div>
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[motivo_embarazo]" checked="checked">
                           Motivo de Embarazo
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[motivo_acepta]" checked="checked">
                            Metodo que Acepta
                          </label>
                         </div>
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[diagnostico_social]" checked="checked">
                           Diagnóstico Social
                          </label>
                         </div>
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[derechohabiente]" checked="checked">
                           Derechohabiente
                          </label>
                         </div>
                            <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[no_derechohabiente]" checked="checked">
                           No. Derechohabiente
                          </label>
                         </div>
                           <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[fecha_ingreso]" checked="checked">
                           Fecha de Ingreso
                          </label>
                         </div>

                           
                             <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[fecha_egreso]" checked="checked">
                           Fecha de Egreso
                          </label>
                         </div>
                           <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[referido]" checked="checked">
                           Referido 
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[observaciones]" checked="checked">
                           Observacion
                          </label>
                         </div>

                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[no_parejas_sexuales]" checked="checked">
                            No. de parejas Sexuales
                          </label>
                         </div>
                       
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[inicio_sexual]" checked="checked">
                            Inicio de Vida Sexual
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[violencia]" checked="checked">
                            Violencia
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[numero_consultas_unidad]" checked="checked">
                            Numero de Consultas en Unidad
                          </label>
                         </div>
                  </div>
                </div>

                 <div class="col-xs-4">
                    <div class="form-group">
           
                          
                           <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[hb_htc]" checked="checked">
                            HB/HTC
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[fpp]" checked="checked">
                            Fecha probable de Parto
                          </label>
                         </div>
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[mpf_solicitado]" checked="checked">
                            Metodo de Planificación Familiar Solicitado
                          </label>
                         </div>
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[fx_nacimiento_via]" checked="checked">
                            FX. Nacimiento/Via
                          </label>
                         </div>
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[dx_egreso_mpf]" checked="checked">
                            Dx.Egreso + MPF
                          </label>
                         </div>

                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[diagnostico_clinico]" checked="checked">
                            Diagnostico
                          </label>
                         </div>

                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[laboratorio_clinico]" checked="checked">
                            Laboratorio
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[patologia_clinico]" checked="checked">
                            Patologia Agregada
                          </label>
                         </div>

                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[sexo]" >
                            Sexo del Producto
                          </label>
                         </div>
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[peso]" >
                            Peso del Producto
                          </label>
                         </div>
                         <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[capurro]">
                            Capurro del Producto
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[apgar]" >
                            Apgar del Producto
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variablesx[observaciones_producto]" >
                            Observaciones del Producto
                          </label>
                         </div>


                    </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                      <button type="submit"  class="btn btn-primary pull-right">Generar Documento</button>
                  </div>
                </div>
            </form>
<br>

  </div>

  <div id="menu2" class="tab-pane fade">

  <br>
    <div class="box-header">
            
              <a class="btn bg-maroon" id="nuevo_reporte">
                <i class="fa fa-fw fa-file"></i>Reporte Personalizado
              </a>
              </a>
               
          <!-- /.info-box -->
       
            </div>
<br>  


<form role="form" id="form-carga-reporte-nutricion" name="form-carga-reporte-nutricion" action="" method="post"  >
    <div class="row">
  <div class="col-md-4">
      <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha Inicial :</label>
                  </div>
                  <input type="text" class="form-control" id="fecha_inicial_nutricion" name="fecha_inicial_nutricion" placeholder="Ingrese la Fecha Inicial" required> 
                </div>
              </div>
  </div>
    <div class="col-md-4">
      <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha Final :</label>
                  </div>
                  <input type="text" class="form-control" id="fecha_final_nutricion" name="fecha_final_nutricion" placeholder="Ingrese la Fecha Final" required> 
                </div>
              </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <h3>Elija las columnas a generar</h3>
  </div>
</div>
 <div class="row">
                <div class="col-xs-4">
                 
                     
                    <div class="form-group">
                 

                  <div class="checkbox">
                    <label>
                      <input type="checkbox"  name="variables2[no_expediente]" checked="checked" >
                    Numero de Expediente
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables2[nombre]" checked="checked" >
                    Nombre
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables2[edad]" checked="checked">
                    Edad
                    </label>
                  </div>
               
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables2[nombre_municipio]" checked="checked">
                      Municipio
                    </label>
                  </div>
                 <div class="checkbox">
                        <label>
                      <input type="checkbox" name="variables2[direccion]" checked="checked">
                       Direccion
                    </label>
                  </div>
                      <div class="checkbox" checked="checked">
                    <label>
                      <input type="checkbox" name="variables2[talla]" checked="checked">
                      Talla
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables2[peso]" checked="checked">
                       Peso
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables2[suplemento_alimenticio]" checked="checked">
                       Suplemento Alimenticio
                    </label>
                  </div>

                   <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables2[nombre_suplemento]">
                            Nombre Suplemento
                          </label>
                         </div>
                </div>
                  
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                  
              
                  
                
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables2[dx_medico]">
                            Dx Medico
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables2[dx_nutricio]">
                             Dx Nutricio
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables2[dx_talla_edad]">
                           Dx Talla/Edad
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables2[ganancia_peso_sdg]">
                            Ganancia de Peso Para SDG
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables2[pe_eg]">
                          PE/EG
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables2[desarrollo_ultrasonido]">
                             Desarrollo Ultrasonido
                          </label>
                         </div>
                            <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables2[imc_pregestacional]" checked="checked">
                             IMC Pregestacional
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables2[tratamiento_nutricio]" checked="checked">
                             Tratamiento Nutricio
                          </label>
                         </div>
                              <div class="checkbox" checked="checked">
                          <label>
                            <input type="checkbox" name="variables2[fecha]" checked="checked">
                             Fecha
                          </label>
                         </div>
                        
                  </div>
                </div>

              
                </div>
                <div class="row">
                  <div class="col-md-10">
                      <button type="submit" class="btn btn-primary pull-right">Generar Documento</button>
                     
                  </div>
                </div>
              
            </form>

  </div>

   <div id="menu3" class="tab-pane fade">
    <br>
   <form role="form" id="form-carga-reporte-psicologia" name="form-carga-reporte-psicologia" action="" method="post"  >
    <div class="row">
  <div class="col-md-4">
      <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha Inicial :</label>
                  </div>
                  <input type="text" class="form-control" id="fecha_inicial_psicologia" name="fecha_inicial_psicologia" placeholder="Ingrese la Fecha Inicial" required> 
                </div>
              </div>
  </div>
    <div class="col-md-4">
      <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Fecha Final :</label>
                  </div>
                  <input type="text" class="form-control" id="fecha_final_psicologia" name="fecha_final_psicologia" placeholder="Ingrese la Fecha Final" required> 
                </div>
              </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <h3>Elija las columnas a generar</h3>
  </div>
</div>
 <div class="row">
                <div class="col-xs-4">
                 
                     
                    <div class="form-group">
                 
                 <div class="checkbox">
                    <label>
                      <input type="checkbox"  name="variables3[fecha_ingreso]" checked="checked" >
                    Fecha De Ingreso
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"  name="variables3[no_expediente]" checked="checked" >
                    Numero de Expediente
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables3[nombre]" checked="checked" >
                    Nombre
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables3[edad]" checked="checked">
                    Edad
                    </label>
                  </div>
               
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables3[nombre_municipio]" checked="checked">
                      Municipio
                    </label>
                  </div>
                 <div class="checkbox">
                        <label>
                      <input type="checkbox" name="variables3[direccion]" checked="checked">
                       Direccion
                    </label>
                  </div>
                      <div class="checkbox" checked="checked">
                    <label>
                      <input type="checkbox" name="variables3[religion]" checked="checked">
                      Religion
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables3[estado_civil_padres]" checked="checked">
                       Estado Civil de los Padres
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="variables3[adicciones_padres]" checked="checked">
                       Adicciones en los Padres
                    </label>
                  </div>

                   <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables3[menarca]">
                          Menarca
                          </label>
                         </div>
                                <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables3[inicio_sexual]">
                            Inicio de vida Sexual
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables3[no_parejas_sexuales]">
                             Numero de parejas Sexuales
                          </label>
                         </div>
                </div>
                  
                </div>
                <div class="col-xs-4">
                    <div class="form-group">
                  
              
                  
                
                   
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables3[nombre_pareja]">
                           Nombre de la Pareja
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables3[edad_pareja]">
                            Edad de la Pareja
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables3[adicciones_pareja]">
                          Adicciones en la Pareja
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" checked="checked" name="variables3[adicciones_paciente]">
                             Adicciones en la Paciente
                          </label>
                         </div>
                            <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables3[metodo_planificacion]" checked="checked">
                             Metodo de Planificacion
                          </label>
                         </div>
                          <div class="checkbox">
                          <label>
                            <input type="checkbox" name="variables3[suicidio]" checked="checked">
                             Suicidio
                          </label>
                         </div>
                              <div class="checkbox" checked="checked">
                          <label>
                            <input type="checkbox" name="variables3[violencia]" checked="checked">
                             Violencia
                          </label>
                         </div>
                            <div class="checkbox" checked="checked">
                          <label>
                            <input type="checkbox" name="variables3[referencia]" checked="checked">
                             Referencia 
                          </label>
                         </div>
                           <div class="checkbox" checked="checked">
                          <label>
                            <input type="checkbox" name="variables3[diagnostico_cie_10]" checked="checked">
                           Diagnostico Cie 10
                          </label>
                         </div>
                          <div class="checkbox" checked="checked">
                          <label>
                            <input type="checkbox" name="variables3[observaciones]" checked="checked">
                           Observaciones
                          </label>
                         </div>
                         <div class="checkbox" checked="checked">
                          <label>
                            <input type="checkbox" name="variables3[diagnostico_medico]" checked="checked">
                          Diagnostico Medico
                          </label>
                         </div>
                        
                  </div>
                </div>

              
                </div>
                <div class="row">
                  <div class="col-md-10">
                      <button type="submit" class="btn btn-primary pull-right">Generar Documento</button>
                     
                  </div>
                </div>
              
            </form>

  </div>
   

</div>

</div></div>


<script>
    $(document).ready(function(){

   $('#fecha_inicial').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });

     $('#fecha_final').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });

    $('#fecha_inicialx').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });

     $('#fecha_finalx').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });

  


$('#fecha_inicial_nutricion').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });

     $('#fecha_final_nutricion').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });
$('#fecha_inicial_psicologia').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });

     $('#fecha_final_psicologia').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });

$('#fecha_inicial_nutricion_r').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });

     $('#fecha_final_nutricion_r').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });
 });
  $("#example12314").DataTable({
       "language": {
            "url": "../resources/json/Spanish.json"
        }
    });
    $("#nuevo_reporte").click(function(){

      $("#mymodal123").modal("show");
    });
    $('#form-carga-reporte').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {   
        } 
        else 
        {   var fecha_inicial=$("#fecha_inicial").val();
            var fecha_final=$("#fecha_final").val();
           var datos=$('#form-carga-reporte').serialize();
     
         document.location.href="../php/cinformes.php?"+datos+"&titulo=reporte&fecha_inicial="+fecha_inicial+"&fecha_final="+fecha_final;
         //$('#export').attr('disabled', false);
         return false;
        }
      });



     $('#form-carga-reporte-nutricion').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {   
        } 
        else 
        { 

          var fecha_inicial_nutricion=$("#fecha_inicial_nutricion").val();
            var fecha_final_nutricion=$("#fecha_final_nutricion").val();
           var datos=$('#form-carga-reporte-nutricion').serialize();
         document.location.href="../php/cinforme_nutricion.php?"+datos+"&titulo=reporte&fecha_inicial="+fecha_inicial_nutricion+"&fecha_final="+fecha_final_nutricion;
         return false;
        }
      });

       
       $('#form-carga-reporte-nutricion-r').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {   
        } 
        else 
        { 
                var id=  $('input:radio[name=agregarts]:checked').val();
   
          var fecha_inicial_nutricion_r=$("#fecha_inicial_nutricion_r").val();
            var fecha_final_nutricion_r=$("#fecha_final_nutricion_r").val();
           var datos=$('#form-carga-reporte-nutricion-r').serialize();
         document.location.href="../php/cinforme_nutricion2.php?"+datos+"&titulo=reporte&id="+id;
         return false;
        }
      });


      $('#form-carga-reporte-psicologia').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {   
        } 
        else 
        { 
       
   
          var fecha_inicial_psicologia=$("#fecha_inicial_psicologia").val();
            var fecha_final_psicologia=$("#fecha_final_psicologia").val();
           var datos=$('#form-carga-reporte-psicologia').serialize();
         document.location.href="../php/cinforme_psicologia.php?"+datos+"&titulo=reporte&fecha_inicial="+fecha_inicial_psicologia+"&fecha_final="+fecha_final_psicologia;
    
         return false;
        }
      });

       $('#form-carga-reporte').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {   
        } 
        else 
        {   var fecha_inicial=$("#fecha_inicial").val();
            var fecha_final=$("#fecha_final").val();
           var datos=$('#form-carga-reporte').serialize();
     
         document.location.href="../php/cinformes.php?"+datos+"&titulo=reporte&fecha_inicial="+fecha_inicial+"&fecha_final="+fecha_final;
         //$('#export').attr('disabled', false);
         return false;
        }
      });

      $('#form-reporte-prenatal').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {   
        } 
        else 
        {   var fecha_inicialx=$("#fecha_inicialx").val();
            var fecha_finalx=$("#fecha_finalx").val();
           var datosx=$('#form-reporte-prenatal').serialize();
         document.location.href="../php/cinformes_prenatal.php?"+datosx+"&titulo=reporte&fecha_inicial="+fecha_inicialx+"&fecha_final="+fecha_finalx;
         //$('#export').attr('disabled', false);
         return false;
        }
      });


</script>