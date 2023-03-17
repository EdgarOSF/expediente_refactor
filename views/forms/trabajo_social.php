<?php
session_start();
session_name("sesion_usuario");
include_once '../../php/conexion.php';
include_once '../../php/modulo_trabajo_social.php';
$con = new conexion();
$tsocial= new modulo_trabajo_social();
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
                     <div class="col-lg-4 ">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>No. DE EXPEDIENTE:</label>
                  </div>
                   <input type="text" class="form-control" id="no_expediente" name="no_expediente" placeholder="NUMERO DE EXPEDIENTE" >
              </div>
              </div>
              </div>
                 
              </div>
              
            <div class="row ">
             
              
              <div class="col-lg-4" >
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>UNIDAD DE REFERENCIA: </label>
                    </div>
                      <SELECT class="form-control" value="" id="unidad_referencia" name="unidad_referencia"> <option>---</option> <option>ESPONTANEO</option><option>REFERIDO</option> </SELECT>
                </div>
              </div>
              </div>
              <div class="col-md-4" id="o_u" >  
<div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>UNIDAD:</label>
                  </div>

                 <SELECT class="form-control select2" style="width: 100%;    text-transform: uppercase;" value="" id="fk_unidad_p" name="fk_unidad_p">

                      <option value="">---</option>
                                                        
                       <?php
                           $tipos= $con->getDatos("SELECT * FROM unidades_adm");
                             $i=0;
                            foreach ($tipos as $key) {
                              
                               echo "<option value='".$key['id']."'>".(utf8_encode($key['nombre']))."</option>";

                             }
                        ?> 
                </SELECT>
                   </div>
              </div>


              </div> 
                   
                  <div class="col-lg-4" id="o_n">
              <div class="form-group">
                <div class="input-group" id="nucleo_b">
                  <div class="input-group-addon">
                    <label>NUCLEO BASICO:</label>
                  </div>
                   <input type="number" class="form-control" id="nucleo_basico" name="nucleo_basico" placeholder="NUCLEO BASICO" >
             </div>
              </div>
              </div>


           <div class="col-lg-4" id="descripcion1" style="display:none">
              <div class="form-group" >
                <div class="input-group" >
                  <div class="input-group-addon" >
                    <label>DESCRIPCIÓN:</label>
                  </div>
                   <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="DESCRIPCÓN DE LA UNIDAD" >
             </div>
              </div>
              </div>


              </div>
<br><br>

              <div class="row">
 <div class="col-lg-4 ">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>SERVICIO QUE INGRESO:</label>
                  </div>
                 <SELECT class="form-control" value="" id="servicio_ingreso" name="servicio_ingreso"> <option>---</option> <option>URGENCIAS</option><option>CONSULTA EXTERNA</option><OPTION>PERICIAL</OPTION> </SELECT>
                 </div>
              </div>
              </div>
              
              
                          <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>ESPECIALIDAD:</label>
                  </div>
                 <SELECT class="form-control select2" style="width: 100%;" value="" id="fk_especialidad" name="fk_especialidad">
                      <option value="">---</option>                          
                       <?php
                           $tipos= $con->getDatos("SELECT * FROM especialidades_medicas");
                             $i=0;
                            foreach ($tipos as $key) {
                              
                               echo "<option value='".$key['id']."'>".(utf8_encode($key['nom_especialidad']))."</option>";

                             }
                        ?> 
                </SELECT>
                   </div>
              </div>
              </div>
              
                        
              <div class="col-lg-4 ">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>DIAGNOSTICO DE INGRESO:</label>
                  </div>
                   <input type="text" class="form-control" id="diagnostico_egreso" name="diagnostico_egreso" placeholder="DIAGNOSTICO DE INGRESO" required>
              </div>
              </div>
              </div>

                   <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>CASO MEDICO LEGAL:</label>
                  </div>
                 <SELECT class="form-control" value="" id="caso_medico_legal" name="caso_medico_legal"> <option>---</option> <option>SI</option><option>NO</option> </SELECT>
                   </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>DERECHO-HABIENTE:</label>
                  </div>
                  <select class="form-control" id="derecho_habiente" name="derecho_habiente">
                    <option>---</option>
                    <option>IMSS</option>
                    <OPTION>ISSET</OPTION>
                    <OPTION>ISSSTE</OPTION>
                    <OPTION>NAVAL</OPTION>
                    <OPTION>PEMEX</OPTION>
                    <OPTION>SEGURO POPULAR</OPTION>
                    <OPTION>OTROS...</OPTION></select>
                  </div>
              </div>
              </div>
               
                <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>FOLIO DEL S.P: </label>
                    </div>
                    <input type="text"  class="form-control" id="folio_sp" name="folio_sp" maxlength="12" minlength="12"  placeholder="FOLIO DEL SEGURO POPULAR" >
                 </div>
              </div>
              </div>

              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>DONACION DE SANGRE:</label>
                  </div>
                 <SELECT class="form-control" value="" id="donacion_sangre" name="donacion_sangre"> <option>---</option> <option>SI</option><option>NO</option> </SELECT>
                   </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>FOLIO:</label>
                  </div>
                   <input type="text" class="form-control" id="folio" name="folio" placeholder="FOLIO" disabled>
               </div>
              </div>
              </div>
</div>


  <div class="row"> 
    <br>    <br>
              <div class="col-lg-4">
               <div class="form-group">
               <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>NOMBRE:</label>
                  </div>
                   <input  type="text" class="form-control" id="nombre" name="nombre" placeholder="NOMBRE " required>
              </div>
              </div>
              </div>
              </div>
               <div class="col-lg-4">
                <div class="form-group">
               <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>APELLIDO PATERNO</label>
                  </div>
                   <input type="text" class="form-control" id="ap_p" name="ap_p" placeholder="APELLIDO PATERNO" required>
              </div>
              </div>
              </div>
              </div>
               <div class="col-lg-4">
                <div class="form-group">
               <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>APELLIDO MATERNO</label>
                  </div>
                   <input type="text" class="form-control" id="ap_m" name="ap_m" placeholder=" APELLIDO METERNO" required>
              </div>
              </div>
              </div>
              </div>
              
             
           
              
                <div class="col-lg-2">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>EDAD:</label>
                  </div>
  
                 <select class="form-control" id="edad" name="edad" ><option>---</option>
                  <option>1 Mes</option><option>2 Mes</option><option>3 Mes</option><option>4 Mes</option><option>5 Mes</option><option>6 Mes</option><option>7 Mes</option><option>8 Mes</option><option>9 Mes</option><option>10 Mes</option> <option>11 Mes</option> 
                  <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
                  <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                  <option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
                  <option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option>
                  <option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option>
                  <option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option><option>60</option>
                  <option>61</option><option>62</option><option>63</option><option>64</option><option>65</option><option>66</option><option>67</option><option>68</option><option>69</option><option>70</option>
                  <option>71</option><option>72</option><option>73</option><option>74</option><option>75</option><option>76</option><option>77</option><option>78</option><option>79</option><option>80</option>
                  <option>81</option><option>82</option><option>83</option><option>84</option><option>85</option><option>86</option><option>87</option><option>88</option><option>89</option><option>90</option>
                  <option>91</option><option>92</option><option>93</option><option>94</option><option>95</option><option>96</option><option>97</option><option>98</option><option>99</option><option>100</option>
                 </select>
            </div>
              </div>
              </div>
               <div class="col-lg-2">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>SEXO:</label>
                  </div>
                 <SELECT class="form-control" value="" id="sexo" name="sexo"> 
                  <option>---</option>
                  <option>MASCULINO</option>
                  <option>FEMENINO</option>
                   </SELECT>
                   </div>
              </div>
              </div> 
              <div class="col-lg-4 ">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>ESTADO CIVIL:</label>
                  </div>
                 <SELECT class="form-control" value="" id="estado_civil" name="estado_civil"> <option>---</option><option>SOLTERO(A)</option> <option>CASADO(A)</option><option>VIUDO(A)</option><OPTION>DIVORCIADO(A)</OPTION> <OPTION>UNION LIBRE</OPTION></SELECT>
                   </div>
    
              </div>
              </div>
                <div class="col-lg-4 ">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>RELIGION:</label>
                  </div>
                 <SELECT class="form-control" value="" id="religion" name="religion"> <option>---</option> <option>CATOLICA</option><option>CRISTIANA</option><OPTION>TESTIGO DE JEHOVA</OPTION><OPTION>ADVENTISTA DEL SEPTIMO DIA</OPTION><OPTION>PENTECOSTES</OPTION><OPTION>PRESBITERIANA</OPTION><OPTION>LUZ DEL MUNDO</OPTION><OPTION>OTRAS...</OPTION><OPTION>SIN RELIGION</OPTION></SELECT>
                   </div>
              </div>
              </div>
               <div class="col-lg-4 ">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>CURP:</label>
                  </div>
                  <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" maxlength="18"minlength="18">
                </div>
              </div>
              </div>
                <div class="col-lg-4 ">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>PROCEDIMIENTO QUE INTERFIERA EN SUS CREENCIAS:</label>
                  </div>
               <select class="form-control" id="eaphic"  name="eaphic"><option>---</option><option>SI</option><option>NO</option></select>
                </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>CUAL?:</label>
                  </div>
                  <input type="text" id="cual" name="cual" class="form-control" placeholder="CUAL..." disabled>
                </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>FECHA DE NMTO:</label>
                  </div>
                   <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="FECHA DE NACIMIENTO" >
              </div>
              </div>
              </div>
                  <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>LUGAR DE NMTO:</label>
                  </div>
                
            <select class="form-control" id="lugar_nacimineto" name="lugar_nacimineto">
              <option>---</option>
<option>AGUASCALIENTES</option>
<option>BAJA CALIFORNIA NTE.</option>
<option>BAJA CALIFORNIA SUR</option>
<option>CAMPECHE</option>
<option>COAHUILA </option>
<option>COLIMA </option>
<option>CHIAPAS</option>
<option>CHIHUAHUA</option>
<option>DISTRITO FEDERAL</option>
<option>DURANGO</option>
<option>GUANAJUATO</option>
<option>GUERRERO</option>
<option>HIDALGO</option>
<option>JALISCO</option>
<option>MEXICO</option>
 <option>MICHOACAN</option>
<option>MORELOS</option>
<option>NAYARIT</option>
<option>NUEVO LEON</option>
<option>OAXACA</option>
<option>PUEBLA</option>
<option>QUERETARO</option>
<option>QUINTANA ROO</option>
<option>SAN LUIS POTOSI</option>
<option>SINALOA</option>
<option>SONORA</option>
<option>TABASCO</option>
<option>TAMAULIPAS</option>
<option>TLAXCALA</option>
<option>VERACRUZ</option>
<option>YUCATAN</option>
<option>ZACATECAS</option>
<option>SERV. EXTERIOR MEXICANO </option>
<option>NACIDO EN EL EXTRANJERO </option> 
            </select>
            </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>HABLA UNA LENGUA INDIGENA:</label>
                  </div>
                <select class="form-control" id="hali"  name="hali"><option>---</option><option>SI</option><option>NO</option></select>
               </div>
              </div>
              </div>
                <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>CUAL?:</label>
                  </div>
                  <input type="text" id="cual1" name="cual1" class="form-control" placeholder="CUAL..." disabled>
                </div>
              </div>
              </div>
                  <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>ESCOLARIDAD:</label>
                  </div>
                 <SELECT class="form-control" value="" id="escolaridad" name="escolaridad">
                  <option>---</option>
          
<OPTION>Preescolar o Kinder</OPTION>
<OPTION>Primaria</OPTION>
<OPTION>Secundaria</OPTION>
<OPTION>Preparatoria o Bachillerato</OPTION>
<OPTION>Bachillerato Técnico o Especializado</OPTION>
<OPTION>Carrera Técnica o Comercial</OPTION>
<OPTION>Técnico Superior Universitario</OPTION>
<OPTION>Licenciatura o Profesional</OPTION>
<OPTION>Posgrado</OPTION>
<OPTION>Doctorado</OPTION>
<OPTION>Postdoctorado</OPTION>
<OPTION>Ninguno</OPTION>


                </SELECT>
                   </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>OCUPACION:</label>
                  </div>
                 <SELECT class="form-control select2" style="width: 100%;    text-transform: uppercase;" value="" id="fk_ocupacion_p" name="fk_ocupacion_p">
                      <option value="">---</option>                          
                       <?php
                           $tipos= $con->getDatos("SELECT o.id,o.ocupacion,tos.puntos FROM ocupaciones AS o LEFT JOIN tipos_ocupaciones AS tos ON tos.id=fk_tipos_ocupaciones");
                             $i=0;
                            foreach ($tipos as $key) {
                              
                           echo "<option value='".$key['id']."'>".(utf8_encode($key['ocupacion']))."    [puntos=".$key['puntos']."]"."</option>";

                             }
                        ?> 
                </SELECT>
                   </div>
              </div>
              </div>
                  <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>DOMICILIO ACTUAL:</label>
                  </div>
                   <input type="text" class="form-control" id="domicilio_actual" name="domicilio_actual" placeholder="DOMICILIO ACTUAL DEL PACIENTE" >
              </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>REFERENCIA DOMICILIARIA:</label>
                  </div>
                   <textarea class="form-control" style="text-transform: uppercase;" name="referencia_domiciliaria" id="referencia_domiciliaria" rows="1" placeholder="REFERENCIA DEL DOMICILIO"></textarea>
                   </div>
              </div>
              </div>
                 <div class="col-lg-4  " >
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>TELEFONO:</label>
                  </div>
                 <input type="text" class="form-control" id="telefono" name="telefono" maxlength="10"minlength="10" placeholder="TELEFONO DEL PACIENTE" >
                  </div>
              </div>
              </div>
             

           
              </div>
            </div>
              </div></div>




              <h3 class="modal-title"> <i class="fa fa-fw  fa-male"></i>DATOS DEL INFORMANTE</h3> <br> 
                <div class="box box-success">

            
              <div class="box-body" >
                
      <div class="row"><div class="col-lg-1">
              <div class="form-group">
               <div class="radio">
                    <label>
                      <input type="radio"    name="informante" id="optionsRadios1" value="1" >
                    INFORMANTE
                    </label>
                  </div>
              </div>
              </div>
                 <div class="col-lg-2">
              <div class="form-group">
               <div class="radio">
                    <label>
                      <input type="radio"  name="informante" id="optionsRadios0" value="0" checked >
                    SIN INFORMANTE
                    </label>
                  </div>
              </div>
              </div></div>

                <div class="row"  id="ocultar" style="display:none">
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>NOMBRE:</label>
                  </div>
                    <input type="text" class="form-control" id="nombre_informante" name="nombre_informante" placeholder="NOMBRE DEL INFORMANTE">
            </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>EDAD: </label>
                  </div>
                    <input type="number" class="form-control" name="edad_informante" id="edad_informante" placeholder="EDAD DEL INFPORMANTE" >
                  </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>PARENTESCO:</label>
                  </div>
           <select class="form-control" id="parentesco" name="parentesco"  ><option>---</option>
            <option>PADRE</option>
            <OPTION>MADRE</OPTION>
            <OPTION>HIJO(A)</OPTION>
             <option>CONYUGE(A)</option>
            <OPTION>YERNO</OPTION>
            <OPTION>NUERA</OPTION>
             <option>SUEGRO(A)</option>
            <OPTION>ABUELO(A)</OPTION>
            <OPTION>NIETO(A)</OPTION>
             <option>HERMANO(A)</option>
            <OPTION>CUÑADO(A)</OPTION>
            <OPTION>BISABUELO(A)</OPTION>
            <OPTION>BISNIETOS(A)</OPTION>
            <OPTION>TÍO(A)</OPTION>
            <OPTION>SOBRINO(A)</OPTION>
            <OPTION>PRIMO(A) </OPTION>
            <OPTION>NINGUNO</OPTION>
            
          </select>  
              </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>SEXO:</label>
                  </div>
                 <SELECT class="form-control" value="" id="sexo_informante" name="sexo_informante" > <option>---</option> <option>MASCULINO</option><option>FEMENINO</option> </SELECT>
                   </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>OCUPACION:</label>
                  </div>
                 <SELECT class="form-control select2" style="width: 100%; text-transform: uppercase;" value="" id="ocupacion_informante" name="ocupacion_informante" >
                     <option value="">---</option>           
                        <?php
                            $tipos= $con->getDatos("SELECT * FROM ocupaciones");
                               $i=0;
                              foreach ($tipos as $key) {
                              
                                echo "<option value='".$key['ocupacion']."'>".(utf8_encode($key['ocupacion']))."</option>";

                              }
                        ?>
                        </select>
                   </SELECT>
                   </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>TELEFONO: </label>
                  </div>
                   <input type="text" name="telefono_informante" id="telefono_informante" maxlength="10"minlength="10" class="form-control" placeholder="TELEFONO DEL INFORMANTE">
                </div>
              </div>

              </div> 

               <div class="col-lg-12">
              <div class="form-group">
                <button type="button" class="btn btn-primary pull-right" id="mandar_datos1" onclick="mandar_datos()" >Mandar Informacion <i class="glyphicon glyphicon-share-alt"></i></button>
              </div>
              
              </div>
 
              </div>

          
              </div></div>
                <h3 class="modal-title"> <i class="fa fa-fw  fa-male"></i>DATOS DEL FAMILIAR RESPONSABLE</h3><br> 
               
              <div class="box box-success">
              <div class="box-body"><br>
          
              <div class="row">
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>NOMBRE:</label>
                  </div>
                  <input type="text" class="form-control" id="nombre_responsable" name="nombre_responsable" placeholder="NOMBRE DEL RESPONSABLE">
                </div>
              </div>
              </div>
                <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>EDAD:</label>
                  </div>
                 <input type="number" class="form-control" id="edad_responsable" minlength="1" name="edad_responsable" placeholder="EDAD DEL RESPONSABLE">
            </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>PARENTESCO:</label>
                  </div>
            <select class="form-control" id="parentesco_responsable" name="parentesco_responsable"><option>---</option>
            <option>PADRE</option>
            <OPTION>MADRE</OPTION>
            <OPTION>HIJO(A)</OPTION>
             <option>CONYUGE(A)</option>
            <OPTION>YERNO</OPTION>
            <OPTION>NUERA</OPTION>
             <option>SUEGRO(A)</option>
            <OPTION>ABUELO(A)</OPTION>
            <OPTION>NIETO(A)</OPTION>
             <option>HERMANO(A)</option>
            <OPTION>CUÑADO(A)</OPTION>
            <OPTION>BISABUELO(A)</OPTION>
            <OPTION>BISNIETOS(A)</OPTION>
            <OPTION>TÍO(A)</OPTION>
            <OPTION>SOBRINO(A)</OPTION>
            <OPTION>PRIMO(A) </OPTION>
            <OPTION>NINGUNO</OPTION>
            
          </select>  
              </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>ESCOLARIDAD:</label>
                  </div>
                  <SELECT class="form-control" value="" id="escolaridad_responsable" name="escolaridad_responsable">
                   <option>---</option> 
                   <OPTION>Preescolar o Kinder</OPTION>
                      <OPTION>Primaria</OPTION>
                      <OPTION>Secundaria</OPTION>
                      <OPTION>Preparatoria o Bachillerato</OPTION>
                      <OPTION>Bachillerato Técnico o Especializado</OPTION>
                      <OPTION>Carrera Técnica o Comercial</OPTION>
                      <OPTION>Técnico Superior Universitario</OPTION>
                      <OPTION>Licenciatura o Profesional</OPTION>
                      <OPTION>Posgrado</OPTION>
                      <OPTION>Doctorado</OPTION>
                      <OPTION>Postdoctorado</OPTION>
                      <OPTION>Ninguno</OPTION>
                  </SELECT>
                   </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>RELIGION:</label>
                  </div>
             <SELECT class="form-control" value="" id="religion_responsable" name="religion_responsable"> 
             <option>---</option>
              <option>CATOLICA</option>
              <option>CRISTIANA</option>
              <OPTION>TESTIGO DE JEHOVA</OPTION>
              <OPTION>ADVENTISTA DEL SEPTIMO DIA</OPTION>
              <OPTION>PENTECOSTES</OPTION>
              <OPTION>PRESBITERIANA</OPTION>
              <OPTION>LUZ DEL MUNDO</OPTION>
              <OPTION>OTRAS...</OPTION>
              <OPTION>SIN RELIGION</OPTION></SELECT>
                
                   </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>TELEFONO: </label>
                  </div>
                   <input type="text" name="telefono_responsable" id="telefono_responsable" maxlength="10"minlength="10" class="form-control" placeholder="TELEFONO DEL RESPOINSABLE" >
                </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>OCUPACION:</label>
                  </div>
                 <SELECT class="form-control select2" style="width: 100%; text-transform: uppercase;" value="" id="fk_ocupacion" name="fk_ocupacion"> 
                    <option value="">---</option>
                                                        
                        <?php
                            $tipos= $con->getDatos("SELECT o.id,o.ocupacion,tos.puntos FROM ocupaciones AS o LEFT JOIN tipos_ocupaciones AS tos ON tos.id=fk_tipos_ocupaciones");
                               $i=0;
                              foreach ($tipos as $key) {
                              
                                echo "<option value='".$key['id']."'>".(utf8_encode($key['ocupacion']))."    [puntos=".$key['puntos']."]"."</option>";

                              }
                        ?>
                      
                        </SELECT>
                   </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>LUGAR DE TRABAJO: </label>
                  </div>
                  <input type="text" name="lugar_trabajo" id="lugar_trabajo" class="form-control" placeholder="LUGAR DONDE TRABAJA EL RESPONSABLE">
                 </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>DIRECCION: </label>
                  </div>
                  <input type="text" name="direccion_responsable" id="direccion_responsable" class="form-control" placeholder="DIRECCION DEL RESPONSABLE(CALLE/COLONIA/MUNICIPIO/ESTADO)">
                 </div>
              </div>
              </div>
                <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>HABLA UNA LENGUA INDIGENA:</label>
                  </div>
                <select class="form-control" id="hali_responsable"  name="hali_responsable"><option>---</option><option>SI</option><option>NO</option></select>
               </div>
              </div>
              </div>
                <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>CUAL?:</label>
                  </div>
                  <input type="text" id="cual2" name="cual2" class="form-control" placeholder="CUAL..." >
                </div>
              </div>
              </div>

                  
              </div>
             
              <h5 class="modal-title"> <i class="fa fa-fw  fa-list-ul"></i>DATOS DEL PADRE</h5><br> 
              <div class="row">  
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>NOMBRE DEL PADRE:</label>
                  </div>
                  <input type="text" class="form-control" id="nombre_padre_resp" name="nombre_padre_resp" placeholder="NOMBRE DEL PADRE" >
                </div>
              </div>
              </div>
                <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>EDAD:</label>
                  </div>
                 <input type="number" class="form-control" id="edad_padre" name="edad_padre" placeholder="EDAD DEL PADRE" >
            </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>RELIGION:</label>
                  </div>
                  <SELECT class="form-control" value="" id="religion_padre" name="religion_padre"> <option>---</option> <option>CATOLICA</option><option>CRISTIANA</option><OPTION>TESTIGO DE JEHOVA</OPTION><OPTION>ADVENTISTA DEL SEPTIMO DIA</OPTION><OPTION>PENTECOSTES</OPTION><OPTION>PRESBITERIANA</OPTION><OPTION>LUZ DEL MUNDO</OPTION><OPTION>OTRAS...</OPTION><OPTION>SIN RELIGION</OPTION></SELECT>
                
                   </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>ESTADO CIVIL:</label>
                  </div>
                 <SELECT class="form-control" value="" id="estado_civil_padre" name="estado_civil_padre"> <option>---</option> <option>CASADO(A)</option><option>SOLTERO(A)</option> <OPTION>DIVORCIADO(A)</OPTION> <OPTION>UNION LIBRE</OPTION></SELECT>
                   </div>
              </div>
              </div>
                <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>TELEFONO: </label>
                  </div>
                   <input type="text" name="telefono_padre" id="telefono_padre" maxlength="10" minlength="10" class="form-control" placeholder="TELEFONICO DEL PADRE" >
                </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>VIVE: </label>
                  </div>
              <select class="form-control" id="v_p" name="v_p"><option>---</option> <option>SI</option><option>NO</option> </select>
                </div>
              </div>
              </div>
              </div>
            <h5 class="modal-title"> <i class="fa fa-fw   fa-list-ul"></i>DATOS DE LA MADRE</h5><br>
                <div class="row">
             
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>NOMBRE DE LA MADRE:</label>
                  </div>
                  <input type="text" class="form-control"  id="nombre_madre"  name="nombre_madre" placeholder="NOMBRE DE LA MADRE">
                </div>
              </div>
              </div>
                <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>EDAD:</label>
                  </div>
                 <input type="number" class="form-control" id="edad_madre" name="edad_madre" placeholder="EDAD DE LA MADRE" >
            </div>
              </div>
              </div>
               <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>RELIGION:</label>
                  </div>
                  <SELECT class="form-control" value="" id="religion_madre" name="religion_madre"> <option>---</option> <option>CATOLICA</option><option>CRISTIANA</option><OPTION>TESTIGO DE JEHOVA</OPTION><OPTION>ADVENTISTA DEL SEPTIMO DIA</OPTION><OPTION>PENTECOSTES</OPTION><OPTION>PRESBITERIANA</OPTION><OPTION>LUZ DEL MUNDO</OPTION><OPTION>OTRAS...</OPTION><OPTION>SIN RELIGION</OPTION></SELECT>
                
                   </div>
              </div>
              </div>
              </div>

                <div class="row">
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>ESTADO CIVIL:</label>
                  </div>
                 <SELECT class="form-control" value="" id="estado_civil_madre" name="estado_civil_madre"> <option>---</option> <option>CASADO(A)</option><option>SOLTERO(A)</option> <OPTION>DIVORCIADO(A)</OPTION> <OPTION>UNION LIBRE</OPTION></SELECT>
                   </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>TELEFONO: </label>
                  </div>
                   <input type="text" name="telefono_madre" id="telefono_madre" maxlength="10"minlength="10" class="form-control" placeholder="TELEFONICO DE LA MADRE" >
                </div>
              </div>

              </div>
                   <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>VIVE: </label>
                  </div>
              <select class="form-control" id="v_m" name="v_m"><option>---</option> <option>SI</option><option>NO</option> </select>
                </div>
              </div>
              </div>
             
               <br><br>    <br><br>
              </div>
               <h5 class="modal-title"> <i class="fa fa-fw   fa-list-ul"></i>DATOS GENERALES</h5><br>
              <div class="row">
                   <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>ALGUNOS DE LOS PADRES HABLA ALGUNA LENGUA INDIGENA:</label>
                  </div>
                <select class="form-control" id="hali_madre"  name="hali_madre"><option>---</option><option>SI</option><option>NO</option></select>
               </div>
              </div>
              </div>
                <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>CUAL?:</label>
                  </div>
                  <input type="text" id="cual3" name="cual3" class="form-control" placeholder="CUAL..." >
                </div>
              </div>
              </div>
             
               <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>NUMERO DE DEPENDIENTES EN LA FAMILIA:</label>
                  </div>
                  <input type="number" id="no_int_familia" name="no_int_familia" class="form-control" placeholder="NUMERO DE INTEGRANTES EN LA FAMILIA..." >
                </div>
              </div>
              </div> 
              <div class="col-lg-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>INDENTIFICAR QUIEN GENERA EL INGRESO FAMILIAR:</label>
                  </div>
                 <SELECT class="form-control" id="iqgif" name="iqgif"><option value="">---</option><option value="1">PACIENTE</option><OPTION value="2">RESPONSABLE</OPTION></SELECT>
                </div>
              </div>
              </div>
            </div>
              </div></div>

                <div class="alert alert-success alert-dismissible" id="alertaguardar" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje!</h4>
                <div id="mensaje"></div>
              </div>
              <!-- /.box-body -->
              </div>
               </div>



              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" >Cerrar</button>
                 <button type="submit" class="btn btn-primary pull-right" id="guardar_p" >Guardar</button>
                <button type="button" class="btn btn-primary pull-right" onclick="actualizar_pacientes()" style="display:none" id="actualizar_p" >Actualizar</button>
              </div>
              
            </div>
            </form>
            <!--/.modal-content-->
          </div>
        </div>

     <div class="example-modal"  >
        <div class="modal fade bs-example-modal-lg" id="ESE">
          <div class="reveal-modal xlarge">
  <form role="form" action="" id="trabajo_social" name="trabajo_social" method="post" >
            <div class="modal-content" style="background:#ecefed">
              <div class="modal-header">
     <input type="hidden" id="id_responsable" name="id_responsable" >
          <input type="hidden" id="id_pg" name="id_pg" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> <i class="fa fa-arrow-circle-up"></i> Ingreso del Paciente</h4>
              </div>
              <div class="modal-body">
              <div class="box-body">
          
        <div class="row">
          <div class="col-md-6">
       <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tabla</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive " style="display: block;">
         <input type="hidden" id="id_radio" name="id_radio" >
         <form  role="form"  method="post" action="" id="id_formulario_radio" name="id_formulario_radio" >
        <table id="tabla" style="font-size: 16px" class="table table-bordered table-striped table-hover ">
                <thead>
                <tr>
                   <th>Ingresos de Salario Minimo</th>
                   <th>Dependientes 1 a 2 puntos</th>
                   <th>Dependientes 3 a 4 puntos</th>
                   <th>Dependientes 5 a 6 puntos</th>
                   <th>Dependientes 7 a 8 puntos</th>
                   <th>Dependientes 9 a + puntos</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                 //   $tsocial->consultar_paciente_datos(3237);
                   
                       
                   
                     $datos= $con->getDatos("
                                        SELECT c.fk_salario,cs.ingreso_veces,
                                        (select c2.id FROM concentrado as c2 WHERE c2.fk_dependientes=1 and c2.fk_salario=c.fk_salario) as id1,  
                                        (select puntos FROM concentrado as c2 WHERE c2.fk_dependientes=1 and c2.fk_salario=c.fk_salario) as dependientes12puntos,  
                                        (select c2.id FROM concentrado as c2 WHERE c2.fk_dependientes=2 and c2.fk_salario=c.fk_salario) as id2, 
                                        (select puntos FROM concentrado as c2 WHERE c2.fk_dependientes=2 and c2.fk_salario=c.fk_salario) as dependientes34puntos,
                                        (select c2.id FROM concentrado as c2 WHERE c2.fk_dependientes=3 and c2.fk_salario=c.fk_salario) as id3, 
                                        (select puntos FROM concentrado as c2 WHERE c2.fk_dependientes=3 and c2.fk_salario=c.fk_salario) as dependientes56puntos,
                                        (select c2.id FROM concentrado as c2 WHERE c2.fk_dependientes=4 and c2.fk_salario=c.fk_salario) as id4,
                                        (select puntos FROM concentrado as c2 WHERE c2.fk_dependientes=4 and c2.fk_salario=c.fk_salario) as dependientes78puntos,
                                        (select c2.id FROM concentrado as c2 WHERE c2.fk_dependientes=5 and c2.fk_salario=c.fk_salario) as id5,
                                        (select puntos FROM concentrado as c2 WHERE c2.fk_dependientes=5 and c2.fk_salario=c.fk_salario) as dependientes8maspuntos   
                                         from concentrado as c LEFT JOIN cat_salarios as cs on cs.id=c.fk_salario GROUP BY cs.ingreso_veces,cs.id,c.fk_salario order by(cs.id)");
                               $i=0;
                              foreach ($datos as $key) {
                              
                               //echo '<tr><td>'.$key['ingreso_veces'].'</td><td><input id="'.$key['id1'].'" '.$tsocial->ischecado($key['id1']).' type="radio" value="'.$key['id1'].'" >'.$key['dependientes12puntos'].'</td><td><input id="'.$key['id2'].'" '.$tsocial->ischecado($key['id2']).' type="radio" value="'.$key['id2'].'" >'.$key['dependientes34puntos'].'</td><td><input id="'.$key['id3'].'" '.$tsocial->ischecado($key['id3']).' type="radio" value="'.$key['id3'].'" >'.$key['dependientes56puntos'].'</td><td><input id="'.$key['id4'].'" '.$tsocial->ischecado($key['id4']).' type="radio" value="'.$key['id4'].'" >'.$key['dependientes78puntos'].'</td><td><input id="'.$key['id5'].'" '.$tsocial->ischecado($key['id5']).' type="radio" value="'.$key['id5'].'" >'.$key['dependientes8maspuntos'].'</td></tr>';
                               echo '<tr>
                               <td>'.$key['ingreso_veces'].'</td>
                               <td><input disabled id="f'.$key['id1'].'"  type="radio" value="'.$key['dependientes12puntos'].'" >'.$key['dependientes12puntos'].'</td>
                               <td><input disabled id="f'.$key['id2'].'"  type="radio" value="'.$key['dependientes34puntos'].'" >'.$key['dependientes34puntos'].'</td>
                               <td><input disabled id="f'.$key['id3'].'"  type="radio" value="'.$key['dependientes56puntos'].'" >'.$key['dependientes56puntos'].'</td>
                               <td><input disabled id="f'.$key['id4'].'"  type="radio" value="'.$key['dependientes78puntos'].'" >'.$key['dependientes78puntos'].'</td>
                               <td><input disabled id="f'.$key['id5'].'"  type="radio" value="'.$key['dependientes8maspuntos'].'" >'.$key['dependientes8maspuntos'].'</td>
                               </tr>';
                               

                              }



                    
                  ?>

                </tbody>
               
              </table>
     </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
         
        </div>
      </div>
</div>
  <div class="col-md-3">
       <div class="box box-default">
        <div class="box-header with-border">
          <center><h3 class="box-title">Ingreso Familiar (Promedio Mensual)</h3></center>
          <div class="box-tools pull-right">
              <input type="hidden" id="id_egreso" name="id_egreso" >
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">
         
        <table id="tabla" style="font-size: 13px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                 <th>Integrantes</th>
                   <th>Cantidades</th>
                </tr>
                </thead>
                <tbody>
                       <tr><td>Jefe de Familia</td><td><input  class="form-control" id="i_m_j_f" placeholder="Ingreso mensual del Jefe de Familia" ></td> </tr>
                      <tr> <td>Esposo(a)</td><td><input  class="form-control" id="i_m_esposo" placeholder="Ingreso mensual del Esposo(a)"></td></tr>
                     <tr><td>Hijo</td><td><input  class="form-control" id="i_m_hijo" placeholder="Ingreso mensual del Hijo" ></td></tr>
                     <tr>
                      <td> 
                        <select class="form-control" id="otros_apoyos" name="otros_apoyos">
                          <option>Otros</option> 
                          <option>Prospera</option>
                          <option>Corazon Amigo</option>
                          <option>Cambia tu Tiempo</option>
                          <option>70 y Mas</option>
                        </select>
                      </td>
                      <td>
                        <input  class="form-control" id="i_m_otros" placeholder="Ingreso mensual de otros" >
                      </td>
                    </tr>
                     <tr><td><center><strong>Total</strong></center></td><td><strong><input class="form-control" id="i_m_total"  placeholder="Total del Ingreso mensual" disabled style="text-align:center"></strong></td></tr>
                    
                 
                </tbody>
              
              </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
         
        </div>
      </div>
</div>
  <div class="col-md-3">
       <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Egreso Familiar Mensual</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
         </div>
        </div>
        <div class="box-body" style="display: block;">
         
        <table id="tabla" style="font-size: 13px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                   <th>Integrantes</th>
                   <th>Cantidades</th>
                </tr>
                </thead>
                <tbody>
               
                     <tr><td>Alimentacion</td><td><input class="form-control" id="i_alimentacion" placeholder="Ingreso mensual de Alimentacion"></td> </tr>
                     <tr><td>Renta o Predio</td><td><input class="form-control" id="i_renta_predial" placeholder="Ingreso mensual de Renta o Predial"></td></tr>
                     <tr><td>Agua</td><td><input class="form-control" id="i_agua" placeholder="Ingreso mensual de Agua"></td></tr>
                     <tr><td>Luz</td><td><input class="form-control" id="i_luz" placeholder="Ingreso mensual de luz"></td></tr>
                     <tr><td>Combustible</td><td><input class="form-control" id="i_combustible" placeholder="Ingreso mensual de Combustible"></td></tr>
                     <tr><td>Transporte</td><td><input class="form-control" id="i_trasporte" placeholder="Ingreso mensual de Transporte"></td></tr>
                     <tr><td>Educacion</td><td><input class="form-control" id="i_eduacion" placeholder="Ingreso mensual de Educacion"></td></tr>
                     <tr><td><center><strong>Total</strong></center></td><td><strong><input class="form-control" id="i_total" placeholder="Total del Ingreso mensual" disabled style="text-align:center"></strong></td></tr>
                    
                </tbody>
              
              </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
         
        </div>
      </div>
</div>

</div>




      <div class="row">
          <div class="col-md-6">
       <div class="box box-default">
        <div class="box-header with-borders">
          
        <div class="box-tools pull-right">

           <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">
         
 <form  name="formulario" id="formulario">
            
              <div class="modal-body">

                  <h4 class="modal-title"> <i class="fa fa-fw fa-user"></i>Caracteristicas de la Vivienda</h4>

              
                 <div class="box box-success"  >
                  <br>
                 <div class="box-body">
                      
              <input type="hidden" id="id_v" name="id_v" >
                <div class="row">
                  <div class="col-md-11">
                  <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                          <label >DERECHOS REALES (uso, goce, disfrute)</label>
                        </div>           
                          <select class="form-control" id="cv_d_r_v" name="cv_d_r_v">
                           
                            <option value="0">Otro (Institucional, Albergues o sin Vivienda)</option>
                            <option value="1">Arrendada (Rentada), Hipotecada o con Vivienda </option>
                            <option value="2">Comodato (Prestada)</option>
                            <option value="3">Propia Pagada</option>
                          </select>

                    </div>
                  </div>   
                </div>
               
              </div>
                <div class="row">
                  <div class="col-md-11">
                     <div class="form-group">
                    <div class="input-group"> 
                      <div class="input-group-addon">
                          <label >TIPOS DE VIVIENDA</label>
                        </div>           
                          <select class="form-control" id="cv_tv" name="cv_tv">
                            <option value="0">Grupo 1 SIN VIVIENDO JACAL O CHOZA</option>
                            <option value="1">Grupo 2 VECINDARIO/CUARTOS IMPROVIS</option>
                            <option value="2">Grupo 3 CASA DEPTO. POPULAR</option>
                            <option value="5">Grupo 4 CASA DEPTO. RESIDENCIAL</option>
                          </select> </div>
                    </div>
                  </div> 
                   
                </div>
             
               <div class="row">
                  <div class="col-md-11">
                     <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"> 
                          <label >SERVICIOS PUBLICOS</label>
                        </div>           
                          <select class="form-control" id="cv_sp" name="cv_sp">
                        
                            <option value="0">De 0 a 1 Servicio Publico</option>
                            <option value="1">2 Servicios Publicos</option>
                            <option value="2">3 Servicios Publicos</option>
                            <option value="3">4 a mas Servicio Publico</option>
                          </select> </div>
                    </div>
                  </div> 
                  
                </div>
             
              <div class="row">
                  <div class="col-md-11">
                     <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"> 
                          <label >SERVICIOS INTRADOMICILIARIOS (agua,luz,drenaje,telefono)</label>
                        </div>           
                          <select class="form-control" id="cv_si" name="cv_si">
                           
                            <option value="0">0 - 1 Servicios</option>
                            <option value="1">2 Servicios</option>
                            <option value="2">3 Servicios</option>
                            <option value="3">4 o mas Servicio Publico</option>
                          </select> </div>
                    </div>
                  </div> 
                  
                </div>
           
                  <div class="row">
                  <div class="col-md-11">
                     <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"> 
                          <label >MATERIAL DE CONSTRUCCION</label>
                        </div>           
                          <select class="form-control" id="cv_mc" name="cv_mc">
                        
                            <option value="0">Lamina, Madera, Material de la Region</option>
                            <option value="1">Mixta</option>
                            <option value="2">Mamposteria</option>
                          </select> </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-11">
                     <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"> 
                          <label >NUMERO DE DORMITORIOS</label>
                        </div>           
                          <select class="form-control" id="cv_nd" name="cv_nd">
                           
                            <option value="0">1 - 2</option>
                            <option value="1">3 - 4</option>
                            <option value="2">5 o mas</option>
                          </select>
                           </div>
                    </div>
                  </div>
                </div>
                   <div class="row">
                  <div class="col-md-11">
                     <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"> 
                          <label >NUMERO DE PERSONAS POR DORMITORIOS</label>
                        </div>           
                          <select class="form-control"  id="cv_npd" name="cv_npd">
                         
                            <option value="0">4 o mas Personas</option>
                            <option value="1">3 Personas</option>
                            <option value="2">1 y 2 Persona</option>
                          </select> </div>
                    </div>
                  </div>
                </div> <br>
                  
                <div class="row">
              <div class="col-md-11">   </div> 
              <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Total de Puntos:</label>
                  </div>
                  <strong><input type="text" class="form-control  " id="cv_total" name="cv_total" disabled style="text-align:center"></strong>
            </div>
              </div>
              </div>
                </div>
<button type="button" class="btn btn-primary btn-sm pull-right" id="guardar_v" onclick="caracteristicas_vivienda()"><i class="fa fa-save"></i></button>
<button type="button" class="btn btn-primary btn-sm  " style="display:none" id="update_vivienda" onclick="update_v_2()"><i class="fa fa-edit"></i></button>          
             </div>
          </div><br><br><br>


    <h4 class="modal-title"> <i class="fa fa-fw fa-user"></i>Estado de Salud de los Integrantes de la Familia</h4>

   <div class="box box-success box-responsive"  ><br>
                 <div class="box-body">
                <div class="row">
                  <input type="hidden" id="id_sm" name="id_sm" >
                  <div class="col-md-11">
                  <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                          <label>ESTADO DE SALUD DE LOS INTEGRANTES DE LA FAMILIA</label>
                        </div>           
                          <select class="form-control" id="esif" name="esif">
                          
                            <option value="0">Dos o principal proveedor economico enfermo</option>
                            <option value="1">Un enfermo</option>
                            <option value="2">Ningun enfermo</option>
                          </select>

                    </div><br>
                  </div>   
                </div>
               
              </div>
                <div class="row">
                  <div class="col-md-11">
                     <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                          <label>TIEMPO DE TRATAMIENTO DE LA ENFERMEDAD DEL PACIENTE</label>
                        </div>           
                          <select class="form-control"  id="esif_ttep" name="esif_ttep">
                          
                            <option value="0">Mas de 6 meses</option>
                            <option value="1">De 3 a 6 meses</option>
                            <option value="2">Menos de 3 meses o sin co-morbilidad</option>
                          </select> </div><br>
                    </div>
                  </div> 
                   
                </div>
             
               <div class="row">
                  <div class="col-md-11">
                     <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                          <label>OTROS PROBLEMAS DE SALUD DEL PACIENTE, QUE SE ATIENDE EN OTRA INSTITUCION</label>
                        </div>           
                          <select class="form-control"  id="esif_op_i" name="esif_op_i">
                        
                            <option value="0">SI</option>
                            <option value="1">NO</option>
                          </select> </div><br>
                    </div>
                  </div> 
                  
                </div>
             
            
                <div class="row">
              <div class="col-md-11">   </div>
            <div class="col-lg-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                      <label>Total de Puntos:</label>
                  </div>
                  <strong><input type="text" class="form-control  " id="esif_total" name="esif_total" disabled style="text-align:center"></strong>
            </div>
              </div>
              </div>
              </div>
   <button type="button" class="btn btn-primary btn-sm pull-right" id="guardar_s" onclick="estado_salud()"><i class="fa fa-save"></i></button> <br>
   <button type="button" class="btn btn-primary btn-sm  " style="display:none" id="update_sm" onclick="update_sm1()"><i class="fa fa-edit"></i></button>          

             </div>
          </div>




              </div>
         
               </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
         
        </div>
      </div>
</div>
   <div class="col-md-6">
       <div class="box box-default">
        <div class="box-header with-border">
          
          <h3 class="box-title">Porcentaje de egresos respecto al ingreso  familia  </h3>

            <button type="button" class="btn btn-primary btn-sm" id="update_egreso" onclick="Update_iigreso_familiar()" style="display:none"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-primary btn-sm" id="guardar_egreso" onclick="Guardar_iigreso_familiar()"><i class="fa fa-save"></i></button>
   
          <div class="box-tools pull-right">

           <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
         </div>
        </div>
        <div class="box-body" style="display: block;">
         
        <table id="tabla" style="font-size: 13px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                   <th>Rangos</th>
                   <th>Puntos</th>
                </tr>
                </thead>
                <tbody>
                 
                     <tr><td>75 o mas </td><td style="text-align:center">0 <input type="radio" name="p_egreso" id="t4_75_mas" value="0" disabled></td> </tr>
                     <tr><td>50 - 74 </td><td style="text-align:center">3 <input type="radio" name="p_egreso" id="t4_50_74" value="3" disabled></td></tr>
                     <tr><td>25 - 49 </td><td style="text-align:center">7 <input type="radio" name="p_egreso" id="t4_25_49" value="7" disabled ></td></tr>
                     <tr><td>menor a 25 </td><td style="text-align:center">10 <input type="radio" name="p_egreso" id="t4_menor_25" value="10" disabled></tr>
                </tbody>
              
              </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
        </div>
      </div>
</div>

  <div class="col-md-3">
       <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">OCUPACION</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" style="display: block;">
         
        <table id="tabla" style="font-size: 13px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                 <th>Ocupacion</th>
                   <th>Puntos</th>
                </tr>
                </thead>
                <tbody>
                     <tr><td>Desempleados</td><td style="text-align:center" >0 <input type="radio" name="ocupacion" id="o0" value="0" disabled ></td> </tr>
                     <tr><td>Subempleados</td><td style="text-align:center" >1 <input type="radio" name="ocupacion" id="o1" value="1" disabled ></td></tr>
                     <tr><td>Obreros</td><td style="text-align:center" >2 <input type="radio" name="ocupacion" id="o2" value="2" disabled></td></tr>
                     <tr><td>Empleados</td><td style="text-align:center" >3 <input type="radio" name="ocupacion" id="o3" value="3" disabled></td></tr>
                     <tr><td>Tecnico</td><td style="text-align:center" >4 <input type="radio" name="ocupacion" id="o4" value="4" disabled></td> </tr>
                     <tr><td>Profesionista</td  ><td style="text-align:center">6 <input type="radio" name="ocupacion" id="o6" value="6" disabled></td></tr>
                     <tr><td>Empresario y Ejecutivo</td><td style="text-align:center" >10 <input type="radio" name="ocupacion" id="10" value="10" disabled></td></tr>
                     <tr><td><center><strong>Total</strong></center></td><td><input class="form-control" id="ocupacion_total" placeholder="Total del Ingreso mensual" disabled></td></tr>
                    
                 
                </tbody>
              
              </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
         
        </div>
      </div>
</div>

 <div class="col-md-3">
       <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title ">CRITERIOS Y VARIABLES DE PODERACION</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
         <input type="hidden" id="id_concentrado" name="id_concentrado" >
        <!-- /.box-header -->
        <div class="box-body table-responsive" style="display: block;">

        <table id="tabla" style="font-size: 13px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr> 
                 <th></th>
                 <th>Criterios y Variables de Poderacion</th>
                 <th>Puntos</th>
                 <th>Pts generados</th>
                </tr>
                </thead>
                <tbody>
                     <tr><td>a</td><td>Ingreso Familiar</td><td>55</td><td><strong><input clas="form-control" style="text-align:center" id="p_g_ig" name="p_g_ig" disabled></td></strong></td></tr>
                     <tr><td>b</td><td>Egreso Faliliares</td><td>10</td><td><strong><input clas="form-control" style="text-align:center" id="p_g_eg" name="p_g_eg" disabled></td></strong></td></tr>
                     <tr><td>c</td><td>Vivienda</td><td>20</td><td><strong><input clas="form-control" style="text-align:center" id="p_g_v" name="p_g_v" disabled></td></strong></td></tr>
                     <tr><td>d</td><td>Salud Familiar</td><td>5</td><td><strong><input clas="form-control" style="text-align:center" id="p_g_s" name="p_g_s" disabled></td></strong></td></tr>
                     <tr><td>e</td><td>Ocupacion</td><td>10</td><td><strong><input clas="form-control" style="text-align:center" id="p_g_o" name="p_g_o" disabled></td></strong></tr>
                     <tr><td></td><td>TOTAL</td><td>100</td><td><strong><input clas="form-control" style="text-align:center" id="p_g_total" name="p_g_total" disabled></td></strong></td> </tr>
                </tbody>
              
              
              </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
         
        </div>
      </div>
</div>



 <div class="col-md-6">
       <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">ESCALA DE CALIFICACION</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">
           <br><br>
        <table id="tabla" style="font-size: 13px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr> 
                 <th>0-12</th>
                 <th>13-24</th>
                 <th>25-36</th>
                 <th>37-52</th>
                 <th>53-68</th>
                 <th>69-84</th>
                 <th>85-100</th>
                 <th></th>
                </tr>
                </thead>
              
                <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" id="progressbar11">
    30 %
  </div>
</div>
              </table> <br><br><br>

     <div class="row"> <div class="col-md-7 ">
<div class="form-group-addon">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Trabajadora Social:</label>
                  </div>
                  <input type="text" class="form-control" id="nombre_ts" name="nombre_ts" value="<?php  echo $_SESSION['nombre']; ?>" disabled>
                </div>
              </div>

     </div>
<div class="col-md-5">
  <div class="form-group-addon">
                <div class="input-group">
                  <div class="input-group-addon">
                    <label>Cedula Profesional: </label>
                  </div>
                  <input type="text" class="form-control" id="cedula_ts" name="cedula_ts" value="<?php  echo $_SESSION['cedula']; ?>"  disabled>
                </div>
              </div>
</div>
      </div>

  
        </div><br>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
         
        </div>
      </div>

</div>



</div>
  <div class="row">
          <div class="col-md-12">
       <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">TRABAJO SOCIAL</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">
         
        <form>
            <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><label >DIAGNOSTICO SOCIAL:</label></div>           
                            <textarea class="form-control" name="diag_ts" id="diag_ts" rows="4" maxlength="300"minlength="0" ></textarea>
                    </div><br>
                  </div>   
                </div></div>
                  <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><label >RECLASIFICACION Y MOTIVO:</label></div>           
                            <textarea class="form-control" name="r_m_ts" id="r_m_ts" rows="4" maxlength="150"minlength="0"></textarea>
                    </div><br>
                  </div>   
                </div></div>
        </form>

        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="display: block;">
         
        </div>
      </div>
</div>
  

</div>





                <div class="alert alert-success alert-dismissible" id="alertaguardar_diag" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje!</h4>
                <div id="mensaje_diag"></div>
              </div>
              <!-- /.box-body -->
              </div>
               </div>



              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                 <button type="button" onclick="puntos_generados()" class="btn btn-primary pull-right">Guardar</button>
              </div>
              
            </div>
            </form>



          </div>
        </div>




         <div class="example-modal ">
        <div class="modal fade " id="modal_consulta_externos">
          <div class="reveal-modal xlarge">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                <h4 class="modal-title"></h4>
              </div>
             <div class="modal-body">
               <div class="box-body" >
            <div class="panel-body table-responsive" >
            <div class="row">
              <div class="col-md-2">
            <!-- <img src="../img/tsicono.png" alt="Fjords" width="150" height="100" ala> -->
            </div>
          </div>
             <center><h2 class="modal-title"> <i class="fa fa-fw  fa-database"> </i>Estudios Socio-Económico del Externos</h2> <br><br><br>
                </center>
        <div class="row">
              <div class="col-md-12">
     <center><a class="btn  btn-primary" id="btn_ingrear_paciente"> <!-- biton cuadrado class (btn-app) -->
                <i class="fa fa-download"></i> Ingresar
              </a>
              </center>
            </div>
          </div>
              <table id="tabla_pacientes_externos"  style="height: 100px; overflow-y: scroll; font-size: 14px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                 <th></th>
                   <th>Fecha de elaboración</th> 
                   <th>folio Seguro Popular</th>
                   <th>Nombre</th>
                   <th>Ap Paterno</th>
                   <th>Ap Materno</th>
                   <th>curp</th>
                   <th>Unidad de Ingreso</th>            
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <tr>
                   <th></th>
                   <th>Fecha de elaboración</th> 
                   <th>folio Seguro Popular</th>
                   <th>Nombre</th>
                   <th>Ap Paterno</th>
                   <th>Ap Materno</th>
                   <th>curp</th>
                   <th>Unidad de Ingreso</th>    
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" id="evento"  class="btn btn-primary">Ingresar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>




<div class="modal fade" tabindex="-1" role="dialog" id="modal_mensaje">
  <div class="modal-dialog  modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mensaje !</h4>
      </div>
      <div class="modal-body">
        <h2>Seleccione el Paciente...</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" tabindex="-1" role="dialog" id="modal_mensaje_responsable">
  <div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mensaje !</h4>
      </div>
      <div class="modal-body">
        <h2>Ingrese los datos del Responsble...</h2>
        <h5>El Sistema no genera el estidio socio economico si no se ingresa el Responsable</h5>
        <h5>*Nombre</h5>
        <h5>*Ocupacion responsable</h5>
        <h5>*Numero de integrantes de la familia</h5>
        <h5>*Indentificar quien genera el ingreso familiar</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="m_m_r_e">
  <div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mensaje !</h4>
      </div>
      <div class="modal-body">
        <h2>Verificar todos sus datos antes de generar el estidio socio economico.</h2>
        <h5>El Sistema no genera el estidio socio economico si no se ingresa todos los campos</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="amr()">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="example-modal">
        <div class="modal " id="m_informacios_diagnostico">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Informacion del Paciente</h4>
              </div>
              <div class="modal-body">
              

                <div class="box box-primary">
          <!--  <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div> --> 
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="form_exportar">
              <div class="box-body">
                  <input type="hidden" id="id_exportar_1" name="id_exportar_1" >
                        <input type="hidden" id="fkunidadingreso" name="fkunidadingreso" value="<?php  echo $_SESSION['fk_unidad_adm']; ?>">
                <div class="form-group" >
                <div class="input-group" id="1_con">
                  <div class="input-group-addon">
                    <label>Nombre: </label>
                  </div>
                  <input type="text" name="nombre_con" id="nombre_con" class="form-control" disabled>
                 </div>
              </div>
                 <div class="form-group" >
                <div class="input-group" id="2_con">
                  <div class="input-group-addon">
                    <label>Ap Paterno: </label>
                  </div>
                  <input type="text" name="ap_p_con" id="ap_p_con" class="form-control" disabled>
                 </div>
              </div>
                <div class="form-group" >
                <div class="input-group" id="3_con">
                  <div class="input-group-addon">
                    <label>Ap Materno: </label>
                  </div>
                  <input type="text" name="ap_m_con" id="ap_m_con" class="form-control" disabled>
                 </div>
              </div>
              <div class="form-group" >
                <div class="input-group" id="4_con">
                  <div class="input-group-addon">
                    <label>No. Seguro Popular: </label>
                  </div>
                  <input type="text" name="sp_con" id="sp_con" class="form-control" disabled>
                 </div>
              </div>
                <div class="form-group">
                <div class="input-group"  id="5_con">
                  <div class="input-group-addon">
                    <label>Curp: </label>
                  </div>
                  <input type="text" name="curp_con" id="curp_con" class="form-control" disabled>
                 </div>
              </div>
               <div class="form-group" >
                <div class="input-group" id="6_con">
                  <div class="input-group-addon">
                    <label>Dirección: </label>
                  </div>
                  <input type="text" name="direc_con" id="direc_con" class="form-control" disabled>
                 </div>
              </div>
              <div class="form-group" >
                <div class="input-group" id="7_con">
                  <div class="input-group-addon">
                    <label>Telefono: </label>
                  </div>
                  <input type="number" name="tel_con" id="tel_con" class="form-control" disabled>
                 </div>
              </div>
                <div class="form-group"  id="9_con"  style="display:none" >
                <div class="input-group" >
                  <div class="input-group-addon">
                     <label>Servicio que ingreso:</label>
                  </div>
                  <SELECT class="form-control" value="" id="si_ext" name="si_ext"> <option>---</option> <option>URGENCIAS</option><option>CONSULTA EXTERNA</option> </SELECT>
               </div>
              </div>

               <div class="form-group">
                <div class="input-group" id="10_con"  style="display:none">
                  <div class="input-group-addon">
                    <label>ESPECIALIDAD:</label>
                  </div>

                 <SELECT class="form-control select2" style="width: 100%; text-transform: uppercase;" value="" id="fk_especialidades_ih" name="fk_especialidades_ih">

                      <option value="NULL">---</option>
                                                        
                       <?php
                           $tipos= $con->getDatos("SELECT * FROM especialidades_medicas");
                             $i=0;
                            foreach ($tipos as $key) {
                              
                               echo "<option value='".$key['id']."'>".(utf8_encode($key['nom_especialidad']))."</option>";

                             }
                        ?> 
                </SELECT>
                   </div>
              </div>
     <div class="form-group" >
                <div class="input-group" id="11_con" style="display:none">
                  <div class="input-group-addon">
                    <label>No. Expediente: </label>
                  </div>
                  <input type="text" name="n_e_ext" id="n_e_ext" class="form-control" >
                 </div>
              </div>

                <div class="checkbox" id="8_con">
                  <label>
                    <input type="checkbox" id="checkbox_aceptar">Esta seguro de ingresar a este paciente.!
                  </label>
                </div>
                 <div id="error420" style="display:none;color:white" >  
            <p style="color:red">Para ingresar seleccione el aviso!</p>
          <div class="clearfix"></div>
        </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" class="btn btn-primary" id="btn_ingresar_100">Ingresar al Sistema</button>
                <button type="button" class="btn btn-success pull-right" id="btn_ingresar_200" style="display:none" onclick="ingresar_externos()">Guardar</button> 
              </div>
            </form>
          </div>


              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>




    <h2> <i class="fa  fa-file-text"></i>  Control de Trabajo Social</h2>
        <div class="box-header">
            
              
             <div class="row">
              <div class=" col-xs-12 col-sm-8 col-md-4 col-lg-3">
          <div class="info-box bg-green" id="nuevo_paciente">
            <span class="info-box-icon"><i class="fa fa-fw fa-user-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number">Pacientes</span>

              <div class="progress">
             
              </div>
                  <span class="progress-description">
                    Ingresar Paciente
                  </span>
            </div>
          </div>
          </div>

   
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-3 ">
      <div class="info-box bg-green" id="ESE_BOTON" onclick="consulta_diagnostico()" role="dialog" aria-hidden="true">
            <span class="info-box-icon"><i class="fa fa-fw fa-user-md"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number">Diagnóstico Social</span>
              <div class="progress">
              </div>
                  <span class="progress-description">
                    Estudio Socio-Económico
                  </span>
            </div>
          </div>
          </div> 


          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-3 ">
      <div class="info-box bg-green" id="consulta_externa"  role="dialog" aria-hidden="true">
            <span class="info-box-icon"><i class="fa fa-fw  fa-database"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number">Estudios Socio Económico Externos</span>
              <div class="progress">
              </div>
                  <span class="progress-description">
                  Consulta General  
                  </span>
            </div>
          </div>
          </div> 
        
        

          </div>
    
            </div>
          <div class="box-body" >
            <div class="panel-body table-responsive">
             <table id="tabla_pacientes" style="font-size: 16px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                 <th></th>
                  <th></th>
                  <th></th>
                  <th>Fecha de Ingreso</th>
                  <th>Folio SP</th>
                  <th>No. Expediente</th>
                  <th>Unidad de Referencia</th>
                  <th>Nombre del Paciente</th>
                  <th>Ap. Paterno</th>
                  <th>Ap. Materno</th>
                  <th>Edad</th>
                  <th>Sexo</th>
                  <th>Domicilio Actual</th>
                  <th>Telefono</th>
                  <th>Derecho Habiente</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                   <tr>
                  <th></th>
                  <th></th>
                   <th></th>
                  <th>Fecha de Ingreso</th>
                  <th>Folio SP</th>
                  <th>No. Expediente</th>
                  <th>Unidad de Referencia</th>
                  <th>Nombre del Paciente</th>
                    <th>Ap. Paterno</th>
                  <th>Ap. Materno</th>
                  <th>Edad</th>
                  <th>Sexo</th>
                  <th>Domicilio Actual</th>
                  <th>Telefono</th>
                  <th>Derecho Habiente</th>
                </tr>
                </tfoot>
              </table>


<script>

$("#consulta_externa").click(function(){
   $("#modal_consulta_externos").modal("show");
});

$("#btn_ingrear_paciente").click(function(){
 var id_paciente_externo=$('input:radio[name=id_es_gral]:checked').val();

if (id_paciente_externo==null) {
 $("#modal_mensaje").modal("show");
}
else  {


    $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=CONSULTAR_PACIENTE_TS&id="+id_paciente_externo,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
            $("#id_exportar_1").val(respuesta.id);
            $("#nombre_con").val(respuesta.nombre);
            $("#ap_p_con").val(respuesta.ap_p);
            $("#ap_m_con").val(respuesta.ap_m);
            $("#curp_con").val(respuesta.curp);
            $("#tel_con").val(respuesta.telefono);
            $("#direc_con").val(respuesta.domicilio_actual);
            $("#sp_con").val(respuesta.folio_sp);
 $("#m_informacios_diagnostico").modal("show");
        }});

}

});


$("#btn_ingresar_100").click(function(){

	  if( $("#checkbox_aceptar").is(':checked') ) {
		 
        $("#1_con").css("display","none");
        $("#2_con").css("display","none");
        $("#3_con").css("display","none");
        $("#4_con").css("display","none");
        $("#5_con").css("display","none");
        $("#6_con").css("display","none");
        $("#7_con").css("display","none");
        $("#8_con").css("display","none");
        $("#error420").css("display","none");
        $("#btn_ingresar_100").css("display","none");
        $("#btn_ingresar_200").show(); 
        $("#9_con").show();   $("#10_con").show(); $("#11_con").show();


		} else { $("#error420").show();
		 
		 }
   

	});




$('#trabajo_social').validator().on('submit', function (e) {

      if (e.isDefaultPrevented()) 
        {   
        } 
        else 
        {  
             
        var dataString = $('#trabajo_social').serialize();
            
        $.ajax({
            type: "POST",
            url: "../php/main.php",
            data: dataString+"&opcion=GUARDAR_PACIENTE_ESE",
            success: function(data) { 
          
          if(data=="GUARDAR"){
             $("#alertaguardar").removeClass("alert-danger");
             $("#alertaguardar").addClass("alert-success");
             $("#mensaje").html("SUS DATOS HAN SIDO GUARDADOS");

              $("#alertaguardar").fadeIn(800,function(){
                $("#modal").modal("hide");
                 setTimeout(function(){
               menu('#trabajo_social');
              }, 400);
             
               }); 
           }
          else if(data=="ERROR"){
              $("#alertaguardar").removeClass("alert-success");
              $("#alertaguardar").addClass("alert-danger"); 
              $("#mensaje").html("ERROR AL GUARDAR <br>* Verifique que todos sus datos esten bien capturados<br>* El numero de expediente esta duplicado");

              $("#alertaguardar").fadeIn(800);
             } 
               
            } 
        });
        return false;

        }
    });
  
 
      $("#example2").DataTable({
       "language": {
            "url": "../resources/json/Spanish.json"
        }
    });

  $("#nuevo_paciente").click(function(){
    $("#modal").modal("show");
     $("#trabajo_social")[0].reset();
     $("#actualizar_p").css("display","none");
      $("#guardar_p").show();
     $("#ocultar").delay(300).fadeOut(300);
     var id123 =$("#id").val(""); 
      //$("#id").val(respuesta.id);

$("#descripcion1").css("display","none");
//$("#o_n").css("display","none");
$("#o_n").show();

            $("#folio_sp").attr("disabled","disabled"); 
            $("#unidad_referencia").removeAttr("disabled");
            $("#nombre").removeAttr("disabled");
            $("#fk_unidad_p").attr("disabled","disabled").val("").trigger('change.select2');
            $("#no_expediente").removeAttr("disabled");
            $("#servicio_ingreso").removeAttr("disabled");
            $("#fk_especialidad").removeAttr("disabled").val("").trigger('change.select2');
            $("#diagnostico_egreso").removeAttr("disabled");
            $("#edad").removeAttr("disabled");
            $("#sexo").removeAttr("disabled");
            $("#estado_civil").removeAttr("disabled");
            $("#religion").removeAttr("disabled");
            $("#curp").removeAttr("disabled");
            $("#eaphic").removeAttr("disabled");
            $("#cual").attr("disabled","disabled");
            $("#fecha_nacimiento").removeAttr("disabled");
            $("#lugar_nacimineto").removeAttr("disabled");
            $("#hali").removeAttr("disabled");
            $("#cual1").attr("disabled","disabled");
            $("#escolaridad").removeAttr("disabled");
            $("#fk_ocupacion_p").removeAttr("disabled").val("").trigger('change.select2');
            $("#domicilio_actual").removeAttr("disabled");
            $("#referencia_domiciliaria").removeAttr("disabled");
            $("#telefono").removeAttr("disabled");
            $("#derecho_habiente").removeAttr("disabled");
            $("#nombre_unidad").removeAttr("disabled");
            $("#nucleo_basico").attr("disabled","disabled");
            $("#caso_medico_legal").removeAttr("disabled");
            $("#donacion_sangre").removeAttr("disabled");
            $("#folio").attr("disabled","disabled");
            $("#nombre_informante").removeAttr("disabled");
            $("#edad_informante").removeAttr("disabled");
            $("#parentesco").removeAttr("disabled");
            $("#sexo_informante").removeAttr("disabled");
            $("#ocupacion_informante").removeAttr("disabled").val("").trigger('change.select2');
            $("#telefono_informante").removeAttr("disabled");
            $("#nombre_responsable").removeAttr("disabled");
            $("#edad_responsable").removeAttr("disabled");
            $("#parentesco_responsable").removeAttr("disabled");
            $("#escolaridad_responsable").removeAttr("disabled");
            $("#religion_responsable").removeAttr("disabled");
            $("#telefono_responsable").removeAttr("disabled");
            $("#fk_ocupacion").removeAttr("disabled").val("").trigger('change.select2');
            $("#lugar_trabajo").removeAttr("disabled");
            $("#direccion_responsable").removeAttr("disabled");
            $("#hali_responsable").removeAttr("disabled");
            $("#cual2").attr("disabled","disabled");
            $("#nombre_padre_resp").removeAttr("disabled");
            $("#edad_padre").removeAttr("disabled");
            $("#religion_padre").removeAttr("disabled");
            $("#estado_civil_padre").removeAttr("disabled");
            $("#telefono_padre").removeAttr("disabled");
            $("#nombre_madre").removeAttr("disabled");
            $("#edad_madre").removeAttr("disabled");
            $("#religion_madre").removeAttr("disabled");
            $("#estado_civil_madre").removeAttr("disabled");
            $("#telefono_madre").removeAttr("disabled");
            $("#hali_madre").removeAttr("disabled");
            $("#cual3").attr("disabled","disabled");
            $("#no_int_familia").removeAttr("disabled"); 
            $("#v_p").removeAttr("disabled"); 
            $("#v_m").removeAttr("disabled"); 
            $("#ap_p").removeAttr("disabled"); 
            $("#ap_m").removeAttr("disabled");
            $("#iqgif").removeAttr("disabled");

  });

$("#PR").click(function(){
    $("#modalreferidosts").modal("show");
  });


 $(document).ready(function(){
  

  $("#tabla_pacientes").DataTable(
            { "language": {
                "url": "../resources/json/Spanish.json"
            },
            "bProcessing": true,
            "sAjaxDataProp":"",   
            "iDisplayStart": 0,
             "order": [[ 0, "asc" ]],
             "searching" : true,
              "paging": true,
             "ajax": "../php/main.php?opcion=CONSULTAR_PACIENTES_URL&id_unidad="+<?php echo $_SESSION['fk_unidad_adm'] ?>,
              
              "columns": [   
                   { "data": "id" },
                   { "data": "id" },
                   { "data": "id" },
                   { "data": "fecha_elaboracion" },
                   { "data": "folio_sp" },
                   { "data": "no_expediente" },
                   { "data": "nombre_unidad" },
                   { "data": "nombre" },
                   { "data": "ap_p" },
                   { "data": "ap_m" },
                   { "data": "edad" },
                   { "data": "sexo" },
                   { "data": "domicilio_actual" },
                   { "data": "telefono" },
                   { "data": "derecho_habiente" },
                  
                   
              ],
              "columnDefs" :[
                   { 
                      "targets": 0,
                      "render": function (data, type, row, meta) {
                        console.log(row);
                        return " <input type='radio'  id='check_paciente' name='check_paciente' value='"+data+"' />";
                      }
                    },
                     {   "targets": 1,
                      "render": function (data, type, row, meta) {
                        return "<a style='color:green;font-size:19px' onclick='editarPacienteTS("+data+")' ><i class='fa fa-fw fa-edit' style='cursor:pointer'></i></a>";
                      }
                    },
                     { 
                      "targets": 2,
                      "render": function (data, type, row, meta ) {
                       <?php   
                       if($_SESSION["idTipoUsuario"]==1 || $_SESSION["idTipoUsuario"]==2 || $_SESSION["idTipoUsuario"]==3 || $_SESSION["idTipoUsuario"]==5)
                         {
                        ?>  
                          return "<a   style='color:red; cursor:pointer; font-size:19px;' data-title='Esta seguro?'   data-toggle='confirmation' id='"+data+"' data-singleton='true' data-popout='true'><span class=' fa fa-fw fa-trash-o'></span></a>";

                         <?php 
                         }
                         else
                         {
                         ?>
                          return "<a   style='color:red; cursor:pointer; font-size:19px;' ><span class=' fa fa-fw fa-trash-o'></span></a>";
                          <?php 
                          }
                          ?>

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
              "drawCallback": function( settings ) {
                    $("[data-toggle=confirmation]").confirmation(
                        {container:"body",
                         btnOkLabel: 'Eliminar',
                        btnCancelLabel: 'Cancelar',
                         onConfirm:function(event, element) {  
                          var id= $(element).attr("id");
                           $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=ELIMINAR_PACIENTES&id="+id,
                             beforeSend : function()
                                  {    
                                  } ,
                            success:function(respuesta){ 
                             
                            }});
                    menu('#trabajo_social');   
                          
                        }});   
           
        }
      });

  });


 $("#tabla_pacientes_externos").DataTable(
            { "language": {
                "url": "../resources/json/Spanish.json"
            },
            "bProcessing": true,
            "sAjaxDataProp":"",   
            "iDisplayStart": 0,
             "order": [[ 0, "asc" ]],
             "searching" : true,
              "paging": true,
             "ajax": "../php/main.php?opcion=CONSULTAR_PACIENTES_EXTERNOS_URL&id_unidad2="+<?php echo $_SESSION['fk_unidad_adm'] ?>,
              
              "columns": [   
                   { "data": "id" },
                   { "data": "fecha_elaboracion" },
                   { "data": "folio_sp" },
                   { "data": "nombre" },
                   { "data": "ap_p" },
                   { "data": "ap_m" },
                   { "data": "curp" },
                   { "data": "unidad_ingreso" },
                   
              ],
              "columnDefs" :[
                   { 
                      "targets": 0,
                      "render": function (data, type, row, meta) {
                        console.log(row);
                        return " <input type ='radio' id='id_es_gral' name='id_es_gral' value='"+data+"' />";
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


    $('input').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });



  $(".select2").select2({theme:"bootstrap"});

  
$("#fk_unidad_p").change(function(){


  var valor1=$("#fk_unidad_p").val();


if (valor1==776) {

$("#o_n").css("display","none");
$("#descripcion1").show();


} else{  

$("#descripcion1").css("display","none"); 
$("#o_n").show();
}

});




var cv_s1=0;
var cv_s2=0;
var cv_s3=0;
var cv_s4=0;
var cv_s5=0;
var cv_s6=0;
var cv_s7=0;

var cv_total=0;

$("#cv_d_r_v").change(function(){
      cv_s1 =parseInt(0+$("#cv_d_r_v").val());
      cv_s2 =parseInt(0+$("#cv_tv").val());
      cv_s3 =parseInt(0+$("#cv_sp").val());
      cv_s4 =parseInt(0+$("#cv_si").val());
      cv_s5 =parseInt(0+$("#cv_mc").val());
      cv_s6 =parseInt(0+$("#cv_nd").val());
      cv_s7 =parseInt(0+$("#cv_npd").val());

      cv_total=(cv_s1+cv_s2+cv_s3+cv_s4+cv_s5+cv_s6+cv_s7);
      $("#cv_total").val(cv_total); 
});

$("#cv_tv").change(function(){
      cv_s1 =parseInt(0+$("#cv_d_r_v").val());
      cv_s2 =parseInt(0+$("#cv_tv").val());
      cv_s3 =parseInt(0+$("#cv_sp").val());
      cv_s4 =parseInt(0+$("#cv_si").val());
      cv_s5 =parseInt(0+$("#cv_mc").val());
      cv_s6 =parseInt(0+$("#cv_nd").val());
      cv_s7 =parseInt(0+$("#cv_npd").val());

      cv_total=(cv_s1+cv_s2+cv_s3+cv_s4+cv_s5+cv_s6+cv_s7);
      $("#cv_total").val(cv_total); 
});
$("#cv_sp").change(function(){
       cv_s1 =parseInt(0+$("#cv_d_r_v").val());
      cv_s2 =parseInt(0+$("#cv_tv").val());
      cv_s3 =parseInt(0+$("#cv_sp").val());
      cv_s4 =parseInt(0+$("#cv_si").val());
      cv_s5 =parseInt(0+$("#cv_mc").val());
      cv_s6 =parseInt(0+$("#cv_nd").val());
      cv_s7 =parseInt(0+$("#cv_npd").val());

      cv_total=(cv_s1+cv_s2+cv_s3+cv_s4+cv_s5+cv_s6+cv_s7);
      $("#cv_total").val(cv_total); 
});

 $("#cv_si").change(function(){
      cv_s1 =parseInt(0+$("#cv_d_r_v").val());
      cv_s2 =parseInt(0+$("#cv_tv").val());
      cv_s3 =parseInt(0+$("#cv_sp").val());
      cv_s4 =parseInt(0+$("#cv_si").val());
      cv_s5 =parseInt(0+$("#cv_mc").val());
      cv_s6 =parseInt(0+$("#cv_nd").val());
      cv_s7 =parseInt(0+$("#cv_npd").val());

      cv_total=(cv_s1+cv_s2+cv_s3+cv_s4+cv_s5+cv_s6+cv_s7);
      $("#cv_total").val(cv_total); 
});

$("#cv_mc").change(function(){
      cv_s1 =parseInt(0+$("#cv_d_r_v").val());
      cv_s2 =parseInt(0+$("#cv_tv").val());
      cv_s3 =parseInt(0+$("#cv_sp").val());
      cv_s4 =parseInt(0+$("#cv_si").val());
      cv_s5 =parseInt(0+$("#cv_mc").val());
      cv_s6 =parseInt(0+$("#cv_nd").val());
      cv_s7 =parseInt(0+$("#cv_npd").val());

      cv_total=(cv_s1+cv_s2+cv_s3+cv_s4+cv_s5+cv_s6+cv_s7);
      $("#cv_total").val(cv_total); 
});

$("#cv_nd").change(function(){
     cv_s1 =parseInt(0+$("#cv_d_r_v").val());
      cv_s2 =parseInt(0+$("#cv_tv").val());
      cv_s3 =parseInt(0+$("#cv_sp").val());
      cv_s4 =parseInt(0+$("#cv_si").val());
      cv_s5 =parseInt(0+$("#cv_mc").val());
      cv_s6 =parseInt(0+$("#cv_nd").val());
      cv_s7 =parseInt(0+$("#cv_npd").val());

      cv_total=(cv_s1+cv_s2+cv_s3+cv_s4+cv_s5+cv_s6+cv_s7);
      $("#cv_total").val(cv_total); 
});
  
  $("#cv_npd").change(function(){
 
      cv_s1 =parseInt(0+$("#cv_d_r_v").val());
      cv_s2 =parseInt(0+$("#cv_tv").val());
      cv_s3 =parseInt(0+$("#cv_sp").val());
      cv_s4 =parseInt(0+$("#cv_si").val());
      cv_s5 =parseInt(0+$("#cv_mc").val());
      cv_s6 =parseInt(0+$("#cv_nd").val());
      cv_s7 =parseInt(0+$("#cv_npd").val());

      cv_total=(cv_s1+cv_s2+cv_s3+cv_s4+cv_s5+cv_s6+cv_s7);
      $("#cv_total").val(cv_total); 
});

var esif_s1=0; 
var esif_s2=0;
var esif_s3=0;

var esif_total=0;

$("#esif").change(function(){
 
        esif_s1=parseInt(0+$("#esif").val()); 
        esif_s2=parseInt(0+$("#esif_ttep").val());
        esif_s3=parseInt(0+$("#esif_op_i").val());
   esif_total=(esif_s1+esif_s2+esif_s3);
    $("#esif_total").val(esif_total);
});

$("#esif_ttep").change(function(){
 
        esif_s1=parseInt(0+$("#esif").val()); 
        esif_s2=parseInt(0+$("#esif_ttep").val());
        esif_s3=parseInt(0+$("#esif_op_i").val());
   esif_total=(esif_s1+esif_s2+esif_s3);
    $("#esif_total").val(esif_total);
});
$("#esif_op_i").change(function(){
 
        esif_s1=parseInt(0+$("#esif").val()); 
        esif_s2=parseInt(0+$("#esif_ttep").val());
        esif_s3=parseInt(0+$("#esif_op_i").val());
   esif_total=(esif_s1+esif_s2+esif_s3);
    $("#esif_total").val(esif_total);
});


 $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });

 $("#optionsRadios1").click(function(){
        $("#ocultar").fadeIn(800).delay(3000);

  });

$("#optionsRadios0").click(function(){
    
    $("#ocultar").delay(100).fadeOut(100);
   
  });
  

$('#fecha_egreso').datepicker({
      autoclose: true , 
      language: 'es',
      format: 'yyyy-mm-dd'
    });

$('#fecha_nacimiento').datepicker({
      autoclose: true , 
      language: 'es',
       format: 'yyyy-mm-dd'
    });



 function editarPacienteTS(id)
   {

    $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=CONSULTAR_PACIENTE_TS&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 




            $("#fk_unidad_p").val(respuesta.fk_unidad_p).trigger('change.select2').attr("disabled", "disabled");
        //  $("#fk_unidad_p").val(respuesta.fk_unidad_p).attr("disabled", "disabled");

        var fkunidadp = respuesta.fk_unidad_p;

if (fkunidadp==776) {
$("#o_n").css("display","none");
$("#descripcion1").show();
$("#descripcion").val(respuesta.descripcion).attr("disabled", "disabled");


} else{ 
 $("#o_n").show();
$("#descripcion1").css("display","none"); 
}
    $("#fk_especialidad").val(respuesta.fk_especialidad).trigger('change.select2').attr("disabled", "disabled");
            $("#id").val(respuesta.id);
            $("#id_responsable").val(respuesta.id_responsable);
            $("#id_informante").val(respuesta.id_informante);
            $("#folio_sp").val(respuesta.folio_sp).attr("disabled", "disabled");
            $("#unidad_referencia").val(respuesta.unidad_referencia).attr("disabled", "disabled");
            $("#nombre").val(respuesta.nombre).attr("disabled", "disabled");
            $("#no_expediente").val(respuesta.no_expediente).attr("disabled", "disabled");
            $("#servicio_ingreso").val(respuesta.servicio_ingreso).attr("disabled", "disabled");
        
            
            $("#diagnostico_egreso").val(respuesta.diagnostico_egreso).attr("disabled", "disabled");
            $("#edad").val(respuesta.edad).attr("disabled", "disabled");
            $("#sexo").val(respuesta.sexo).attr("disabled", "disabled");
            $("#estado_civil").val(respuesta.estado_civil).attr("disabled", "disabled");
            $("#religion").val(respuesta.religion).attr("disabled", "disabled");
            $("#curp").val(respuesta.curp).attr("disabled", "disabled");
            $("#eaphic").val(respuesta.eaphic).attr("disabled", "disabled");
            $("#cual").val(respuesta.cual).attr("disabled", "disabled");
            $("#fecha_nacimiento").val(respuesta.fecha_nacimiento).attr("disabled", "disabled");
            $("#lugar_nacimineto").val(respuesta.lugar_nacimineto).attr("disabled", "disabled");
            $("#hali").val(respuesta.hali).attr("disabled", "disabled");
            $("#cual1").val(respuesta.cual1).attr("disabled", "disabled");
            $("#escolaridad").val(respuesta.escolaridad).attr("disabled", "disabled");
            $("#fk_ocupacion_p").val(respuesta.fk_ocupacion_p).trigger('change.select2').attr("disabled", "disabled");
            $("#domicilio_actual").val(respuesta.domicilio_actual).attr("disabled", "disabled");
            $("#referencia_domiciliaria").val(respuesta.referencia_domiciliaria).attr("disabled", "disabled");
            $("#telefono").val(respuesta.telefono).attr("disabled", "disabled");
            $("#derecho_habiente").val(respuesta.derecho_habiente).attr("disabled", "disabled");
   
         

            $("#nucleo_basico").val(respuesta.nucleo_basico).attr("disabled", "disabled");
            $("#caso_medico_legal").val(respuesta.caso_medico_legal).attr("disabled", "disabled");
            $("#donacion_sangre").val(respuesta.donacion_sangre).attr("disabled", "disabled");
            $("#folio").val(respuesta.folio).attr("disabled", "disabled");
            var activo = respuesta.id_informante;
            if (activo==null){
              $("#optionsRadios0").prop("checked",true);
              $("#optionsRadios1").prop("checked",false);
              $("#ocultar").delay(100).fadeOut(100);
            }else
            {
               $("#optionsRadios0").prop("checked",false);
              $("#optionsRadios1").prop("checked",true);
              $("#ocultar").fadeIn(800).delay(3000);
            };

            $("#nombre_informante").val(respuesta.nombre_informante).attr("disabled", "disabled");
            $("#edad_informante").val(respuesta.edad_informante).attr("disabled", "disabled");
            $("#parentesco").val(respuesta.parentesco).attr("disabled", "disabled");
            $("#sexo_informante").val(respuesta.sexo_informante).attr("disabled", "disabled");
            $("#ocupacion_informante").val(respuesta.ocupacion_informante).attr("disabled", "disabled");
            $("#telefono_informante").val(respuesta.telefono_informante).attr("disabled", "disabled");
            //...Datos del Responsable

            $("#nombre_responsable").val(respuesta.nombre_responsable).attr("disabled", "disabled");
            $("#edad_responsable").val(respuesta.edad_responsable).attr("disabled", "disabled");
            $("#parentesco_responsable").val(respuesta.parentesco_responsable).attr("disabled", "disabled");
            $("#escolaridad_responsable").val(respuesta.escolaridad_responsable).attr("disabled", "disabled");
            $("#religion_responsable").val(respuesta.religion_responsable).attr("disabled", "disabled");
            $("#telefono_responsable").val(respuesta.telefono_responsable).attr("disabled", "disabled");
            $("#fk_ocupacion").val(respuesta.ocupacion_responsable).trigger('change.select2').attr("disabled", "disabled");

            $("#lugar_trabajo").val(respuesta.lugar_trabajo).attr("disabled", "disabled");
            $("#direccion_responsable").val(respuesta.direccion_responsable).attr("disabled", "disabled");
            $("#hali_responsable").val(respuesta.hali_responsable).attr("disabled", "disabled");
            $("#cual2").val(respuesta.cual2).attr("disabled", "disabled");
            $("#nombre_padre_resp").val(respuesta.nombre_padre_resp).attr("disabled", "disabled");
            $("#edad_padre").val(respuesta.edad_padre).attr("disabled", "disabled");
            $("#religion_padre").val(respuesta.religion_padre).attr("disabled", "disabled");
            $("#estado_civil_padre").val(respuesta.estado_civil_padre).attr("disabled", "disabled");
            $("#telefono_padre").val(respuesta.telefono_padre).attr("disabled", "disabled");
            $("#nombre_madre").val(respuesta.nombre_madre).attr("disabled", "disabled");
            $("#edad_madre").val(respuesta.edad_madre).attr("disabled", "disabled");
            $("#religion_madre").val(respuesta.religion_madre).attr("disabled", "disabled");
            $("#estado_civil_madre").val(respuesta.estado_civil_madre).attr("disabled", "disabled");
            $("#telefono_madre").val(respuesta.telefono_madre).attr("disabled", "disabled");
            $("#hali_madre").val(respuesta.hali_madre).attr("disabled", "disabled");
            $("#cual3").val(respuesta.cual3).attr("disabled", "disabled");
            $("#no_int_familia").val(respuesta.no_int_familia).attr("disabled", "disabled");
            $("#v_p").val(respuesta.v_p).attr("disabled", "disabled");
            $("#v_m").val(respuesta.v_m).attr("disabled", "disabled");
            $("#ap_p").val(respuesta.ap_p).attr("disabled", "disabled"); 
            $("#ap_m").val(respuesta.ap_m).attr("disabled", "disabled");
            $("#iqgif").val(respuesta.iqgif).attr("disabled", "disabled");
            $("#guardar_p").css("display","none");
            $("#actualizar_p").show();
            // $("#guardar_p").css("display");
            $("#modal").modal("show"); 

        }});
   }
     
   

$("#eaphic").click(function(){
  var SI="SI"; var NO="NO";

var valor1=$("#eaphic").val();
  
if (valor1==SI) {

  $("#cual").removeAttr("disabled");
} else if(valor1==NO){
   $("#cual").attr("disabled","disabled");

};

});


$("#hali").click(function(){
  var SI="SI"; var NO="NO";

var valor1=$("#hali").val();
  
if (valor1==SI) {

  $("#cual1").removeAttr("disabled");
} else if(valor1==NO){
   $("#cual1").attr("disabled","disabled");

};

});







$("#hali_responsable").click(function(){
  var SI="SI"; var NO="NO";

var valor1=$("#hali_responsable").val();
  
if (valor1==SI) {

  $("#cual2").removeAttr("disabled");
} else if(valor1==NO){
  $("#cual2").attr("disabled","disabled");

};

});


$("#hali_madre").click(function(){
  var SI="SI"; var NO="NO";

var valor1=$("#hali_madre").val();
  
if (valor1==SI) {

  $("#cual3").removeAttr("disabled");
} else if(valor1==NO){
   $("#cual3").attr("disabled","disabled");

};

});

$("#unidad_referencia").click(function(){

var UR=$("#unidad_referencia").val();
var REFERIDO ="REFERIDO";var ESPONTANEO="ESPONTANEO";

if (UR == REFERIDO) {
 //$("#fk_unidad_p").val('').trigger('change.select2');
// $("#nucleo_basico").val("");
 //$("#o_u").show();
 //$("#o_n").show();
 $("#fk_unidad_p").removeAttr("disabled");
 $("#nucleo_basico").removeAttr("disabled");


} 
else if(UR==ESPONTANEO){

 //$("#fk_unidad_p").val('').trigger('change.select2');
 //$("#nucleo_basico").val("");
$("#fk_unidad_p").attr("disabled","disabled").val("").trigger('change.select2');
$("#nucleo_basico").attr("disabled","disabled").val("");
$("#descripcion1").css("display","none");
//$("#o_n").css("display","none");
$("#o_n").show();
};
});

/*
$("#unidad").change(function(){

var unidad=$("#unidad").val();

var clues=$("#nucleo_basico").val(unidad);

});
*/

$("#derecho_habiente").click(function(){
  var SEGURO_POPULAR="SEGURO POPULAR"; 

var valor=$("#derecho_habiente").val();
  
if (valor==SEGURO_POPULAR) {

  $("#folio_sp").removeAttr("disabled");
} else if(valor!=SEGURO_POPULAR){
   $("#folio_sp").attr("disabled","disabled");

};

});

$("#donacion_sangre").click(function(){
  var SI="SI"; var NO="NO";

var valor1=$("#donacion_sangre").val();
  
if (valor1==SI) {

  $("#folio").removeAttr("disabled");
} else if(valor1==NO){
   $("#folio").attr("disabled","disabled");

};

});

$("#ocupacion_responsable").change(function(){
 var data=$("#ocupacion_responsable").val();

});

 
var sumaTotal1=0;
var sumaTotal2=0;
var sumaTotal3=0;
var sumaTotal4=0;
var sumaTotalfull=0;
var sTotal1=0;
var sTotal2=0;
var sTotal3=0;
var sTotal4=0;
var sTotal5=0;
var sTotal6=0;
var sTotal7=0;
var sTotalfull=0;

$("#i_m_j_f").keyup(function(){
  var i_m_j_f =parseFloat($("#i_m_j_f").val());
   sumaTotal1 =i_m_j_f;
    if (isNaN(sumaTotal1)){
      sumaTotal1=0;
      sumaTotalfull=(sumaTotal1+sumaTotal2+sumaTotal3+sumaTotal4);
    }
   else   sumaTotalfull=(sumaTotal1+sumaTotal2+sumaTotal3+sumaTotal4); 
    $("#i_m_total").val("$ "+sumaTotalfull+".00");
  
});

$("#i_m_esposo").keyup(function(){
 var i_m_esposo =parseFloat($("#i_m_esposo").val());
    sumaTotal2 = i_m_esposo;
    if (isNaN(sumaTotal2)) 
    { sumaTotal2=0;
      sumaTotalfull=(sumaTotal1+sumaTotal2+sumaTotal3+sumaTotal4);
    }
  else sumaTotalfull=(sumaTotal1+sumaTotal2+sumaTotal3+sumaTotal4);
    $("#i_m_total").val("$ "+sumaTotalfull+".00");
    regla_tres();
    
});
$("#i_m_hijo").keyup(function(){
   var i_m_hijo=parseFloat($("#i_m_hijo").val());
   sumaTotal3 =i_m_hijo;
       if (isNaN(sumaTotal3))  
        {  sumaTotal3=0;
           sumaTotalfull=(sumaTotal1+sumaTotal2+sumaTotal3+sumaTotal4);
        }
    else sumaTotalfull=(sumaTotal1+sumaTotal2+sumaTotal3+sumaTotal4);
    $("#i_m_total").val("$ "+sumaTotalfull+".00");
    regla_tres();
});
$("#i_m_otros").keyup(function(){
    var i_m_otros=parseFloat($("#i_m_otros").val());
    sumaTotal4 = i_m_otros;
      if (isNaN(sumaTotal4)) { 
        sumaTotal4=0;
        sumaTotalfull=(sumaTotal1+sumaTotal2+sumaTotal3+sumaTotal4);
      }
 else sumaTotalfull=(sumaTotal1+sumaTotal2+sumaTotal3+sumaTotal4);
    $("#i_m_total").val("$ "+sumaTotalfull+".00");
    regla_tres();
});


   //  i_trasporte i_eduacion 



$("#i_alimentacion").keyup(function(){
  var i_alimentacion =parseFloat($("#i_alimentacion").val());
   sTotal1 =i_alimentacion;
    if (isNaN(sTotal1))  
      {  sTotal1=0;
         sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
      }
  else sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    $("#i_total").val("$ "+sTotalfull+".00");
regla_tres();
});

$("#i_renta_predial").keyup(function(){
  var i_renta_predial =parseFloat($("#i_renta_predial").val());
   sTotal2 =i_renta_predial;
    if (isNaN(sTotal2))  { sTotal2=0;
     sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    }
else   sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    $("#i_total").val("$ "+sTotalfull+".00");
regla_tres();
});

$("#i_agua").keyup(function(){
  var i_agua =parseFloat($("#i_agua").val());
   sTotal3 =i_agua;
    if (isNaN(sTotal3))  { 
      sTotal3=0;
        sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    }
 else  sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    $("#i_total").val("$ "+sTotalfull+".00");
regla_tres();
});
$("#i_luz").keyup(function(){
  var i_luz =parseFloat($("#i_luz").val());
       sTotal4 =i_luz;
    if (isNaN(sTotal4)) { sTotal4=0;
      sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    }
 else  sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    $("#i_total").val("$ "+sTotalfull+".00");
regla_tres();
});
$("#i_combustible").keyup(function(){
  var i_combustible =parseFloat($("#i_combustible").val());
   sTotal5 =i_combustible;
    if (isNaN(sTotal5))  {
      sTotal5=0;
      sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    }
  else sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    $("#i_total").val("$ "+sTotalfull+".00");
regla_tres();
});

$("#i_combustible").keyup(function(){
  var i_combustible =parseFloat($("#i_combustible").val());
   sTotal5 =i_combustible;
    if (isNaN(sTotal5))  { 
       sTotal5=0;
       sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
     }
 else  sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    $("#i_total").val("$ "+sTotalfull+".00");
regla_tres();
});

$("#i_trasporte").keyup(function(){
  var i_trasporte =parseFloat($("#i_trasporte").val());
   sTotal6 =i_trasporte;
    if (isNaN(sTotal6)) {  sTotal6=0;
      sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    }
 else  sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    $("#i_total").val("$ "+sTotalfull+".00");
regla_tres();
});

$("#i_eduacion").keyup(function(){
  var i_eduacion =parseFloat($("#i_eduacion").val());
   sTotal7 =i_eduacion;
    if (isNaN(sTotal7)) { sTotal7=0;
   sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    }
 else  sTotalfull=(sTotal1+sTotal2+sTotal3+sTotal4+sTotal5+sTotal6+sTotal7);
    $("#i_total").val("$ "+sTotalfull+".00");
regla_tres();
});

var total_regla=0;
function regla_tres(){
sumaTotalfull
sTotalfull

total_regla=((sTotalfull*100)/(sumaTotalfull));

  
 if(total_regla >=75)
  {
   var p_total_e = $("#t4_75_mas").prop("checked",true).val();
  $("#p_g_eg").val(p_total_e);
    $("#t4_menor_25").prop("checked",false);
    $("#t4_50_74").prop("checked",false); 
    $("#t4_25_49").prop("checked",false); 
    
  }
 if (total_regla <=25) 
  {
  $("#t4_75_mas").prop("checked",false);
    var p_total_e= $("#t4_menor_25").prop("checked",true).val();
         $("#t4_50_74").prop("checked",false); 
            $("#t4_25_49").prop("checked",false); 
     $("#p_g_eg").val(p_total_e);
  }
if (total_regla >=50 && total_regla<=74) 
  {
   var p_total_e= $("#t4_50_74").prop("checked",true).val();
      $("#t4_75_mas").prop("checked",false);
     $("#t4_menor_25").prop("checked",false);  
    $("#t4_25_49").prop("checked",false); 
    $("#p_g_eg").val(p_total_e);
  
  }
if (total_regla >=25 && total_regla<=49) 
  {
   var p_total_e= $("#t4_25_49").prop("checked",true).val(); 
      $("#t4_75_mas").prop("checked",false);
     $("#t4_menor_25").prop("checked",false);
         $("#t4_50_74").prop("checked",false); 
         $("#p_g_eg").val(p_total_e);
            
  }

}



function consulta_diagnostico(id)
   {  
 var id=  $('input:radio[name=check_paciente]:checked').val();
 $("#p_g_ig").val("");
 $("#p_g_eg").val("");
 $("#p_g_s").val("");
 $("#p_g_v").val("");
 $("#p_g_o").val("");
 $("#p_g_total").val("");
 $("#t4_75_mas").prop("checked",false);
 $("#t4_menor_25").prop("checked",false);
 $("#t4_50_74").prop("checked",false); 
 $("#t4_25_49").prop("checked",false); 
 

   if (id==null) {
    $("#modal_mensaje").modal("show"); 
 } else{

 
      $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json",data:"opcion=CONSULTAR_PACIENTE_PODERACION&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
  

$("#id_responsable").val(respuesta.id_responsable);

  if (respuesta.puntos==null || respuesta.iqgif==null || respuesta.fk_ocupacion_p==null  || respuesta.no_int_familia==null){
    $("#modal_mensaje_responsable").modal("show");
     $("#ESE").modal("hide");
  
    }
  else { 
  

      for (var i=1;i<=54;i++)
      {
              $("#f"+i).prop("checked",false); 
      }
 
    //$("#id_formradio").trigger('reset');
  
    //$("#id_formulario_radio")[0].reset();
    $("#ESE").modal("show");


var id_concentrado=$("#f"+respuesta.id_check).prop("checked",respuesta.stat).val();

$("#f"+respuesta.id_check).removeAttr("disabled","disabled");

var id_radio =$("#id_radio").val(respuesta.id_check);



    $("#p_g_ig").val(id_concentrado);

$("#id_concentrado").val(respuesta.id_check);



  if (respuesta.id_pg==null) { 
              $("#diag_ts").removeAttr("disabled").val("");
              $("#r_m_ts").removeAttr("disabled").val("");
             // $("#guardar_s").removeAttr("disabled");
}
            else { 
             
              $("#diag_ts").val(respuesta.diag_ts);
              $("#r_m_ts").val(respuesta.r_m_ts);
              $("#id_pg").val(respuesta.id_pg)
             // $("#guardar_s").attr("disabled","disabled");
              
            }



 if (respuesta.id_sm==null) {
              $("#id_sm").val("");
              $("#esif").removeAttr("disabled").val("");
              $("#esif_ttep").removeAttr("disabled").val("");
              $("#esif_op_i").removeAttr("disabled").val("");
              $("#esif_total").val("");
              $("#p_g_s").val("");
              $("#update_sm").css("display","none");
              $("#guardar_s").show();

}
            else {
           $("#id_sm").val(respuesta.id_sm);

              $("#esif").attr("disabled","disabled").val(respuesta.esif);
              $("#esif_ttep").attr("disabled","disabled").val(respuesta.esif_ttep);
              $("#esif_op_i").attr("disabled","disabled").val(respuesta.esif_op_i);
              $("#esif_total").attr("disabled","disabled").val(respuesta.esif_total);
              $("#p_g_s").val(respuesta.esif_total);
              
              $("#guardar_s").css("display","none");
              $("#update_sm").show();
             
            }

            if (respuesta.id_vivienda==null) {
              $("#id_v").val("");
              $("#cv_d_r_v").removeAttr("disabled").val("");
              $("#cv_tv").removeAttr("disabled").val("");
              $("#cv_sp").removeAttr("disabled").val("");
              $("#cv_si").removeAttr("disabled").val("");
              $("#cv_mc").removeAttr("disabled").val("");
              $("#cv_nd").removeAttr("disabled").val("");
              $("#cv_npd").removeAttr("disabled").val("");
              $("#guardar_v").removeAttr("disabled");
              $("#cv_total").val("");
               $("#update_vivienda").css("display","none");
               $("#guardar_v").show();
}
            else {
              $("#id_v").val(respuesta.id_vivienda);
              $("#cv_mc").attr("disabled","disabled").val(respuesta.cv_mc);
              $("#cv_d_r_v").attr("disabled","disabled").val(respuesta.cv_d_r_v);
              $("#cv_tv").attr("disabled","disabled").val(respuesta.cv_tv);
              $("#cv_sp").attr("disabled","disabled").val(respuesta.cv_sp);
              $("#cv_si").attr("disabled","disabled").val(respuesta.cv_si);
             
              $("#cv_nd").attr("disabled","disabled").val(respuesta.cv_nd);
              $("#cv_npd").attr("disabled","disabled").val(respuesta.cv_npd);
              $("#cv_total").attr("disabled","disabled").val(respuesta.cv_total);
              $("#p_g_v").val(respuesta.cv_total);
             
                $("#update_vivienda").show();
               $("#guardar_v").css("display","none");

            }

     if (respuesta.id_egreso==null) {
              
              $("#i_m_j_f").removeAttr("disabled").val("");
              $("#i_m_esposo").removeAttr("disabled").val("");
              $("#i_m_hijo").removeAttr("disabled").val("");
              $("#otros_apoyos").removeAttr("disabled").val("Otros");
              $("#i_m_otros").removeAttr("disabled").val("");
              $("#i_alimentacion").removeAttr("disabled").val("");
              $("#i_renta_predial").removeAttr("disabled").val("");
              $("#i_agua").removeAttr("disabled").val("");
              $("#i_luz").removeAttr("disabled").val("");
              $("#i_combustible").removeAttr("disabled").val("");
              $("#i_trasporte").removeAttr("disabled").val("");
              $("#i_eduacion").removeAttr("disabled").val("");

              sumaTotalfull=0;
              total_regla=0;

              $("#i_m_total").val("");  
               $("#id_egreso").val("");
              
           //  $("#guardar_egreso").removeAttr("disabled");
             $("#i_total").val("");
             $("#i_m_total").val("");
              $("#guardar_egreso").show();
               $("#update_egreso").css("display","none");


}
            else {
            
               $("#i_m_j_f").attr("disabled","disabled").val(respuesta.i_m_j_f);
               $("#i_m_esposo").attr("disabled","disabled").val(respuesta.i_m_esposo);
               $("#i_m_hijo").attr("disabled","disabled").val(respuesta.i_m_hijo);
               $("#otros_apoyos").attr("disabled","disabled").val(respuesta.otros_apoyos);
               $("#i_m_otros").attr("disabled","disabled").val(respuesta.i_m_otros);
               $("#i_alimentacion").attr("disabled","disabled").val(respuesta.i_alimentacion);
               $("#i_renta_predial").attr("disabled","disabled").val(respuesta.i_renta_predial);
               $("#i_agua").attr("disabled","disabled").val(respuesta.i_agua);
               $("#i_luz").attr("disabled","disabled").val(respuesta.i_luz);
               $("#i_combustible").attr("disabled","disabled").val(respuesta.i_combustible);
               $("#i_trasporte").attr("disabled","disabled").val(respuesta.i_trasporte);
               $("#i_eduacion").attr("disabled","disabled").val(respuesta.i_eduacion);
               $("#p_g_eg").attr("disabled","disabled").val(respuesta.p_total_e);
               $("#id_egreso").val(respuesta.id_egreso);
               $("#update_egreso").show();
               $("#i_m_total").attr("disabled","disabled").val(respuesta.i_m_total);
               $("#i_total").val(respuesta.i_total);
               $("#guardar_egreso").css("display","none");

                var t_r =respuesta.total_regla;
              
                 if(t_r >=75)
                  {
                  $("#t4_75_mas").prop("checked",true);
                    $("#t4_menor_25").prop("checked",false);
                    $("#t4_50_74").prop("checked",false); 
                    $("#t4_25_49").prop("checked",false); 
                  }
                 if (t_r <=25) 
                  {
                  $("#t4_75_mas").prop("checked",false);
                 $("#t4_menor_25").prop("checked",true);
                         $("#t4_50_74").prop("checked",false); 
                            $("#t4_25_49").prop("checked",false); 
                  }
                if (t_r >=50 && t_r<=74) 
                  {
                   $("#t4_50_74").prop("checked",true);
                      $("#t4_75_mas").prop("checked",false);
                     $("#t4_menor_25").prop("checked",false);
                       
                            $("#t4_25_49").prop("checked",false); 
                  }
                if (t_r >=25 && t_r<=49) 
                  {
                     $("#t4_25_49").prop("checked",true); 
                     $("#t4_75_mas").prop("checked",false);
                     $("#t4_menor_25").prop("checked",false);
                     $("#t4_50_74").prop("checked",false);      
                  }



            }



}
          

          if(respuesta.iqgif == 1){

                   $("#ocupacion_total").val(respuesta.puntos_paciente);
                   $("#p_g_o").val(respuesta.puntos_paciente);

                  if (respuesta.puntos_paciente == 0) 
                  {
                    $("#o0").prop("checked",true);
                  }

                  if (respuesta.puntos_paciente == 1) 
                  {
                    $("#o1").prop("checked",true);
                  }

                  if (respuesta.puntos_paciente == 2) 
                  {
                    $("#o2").prop("checked",true);
                   
                  }

                  if (respuesta.puntos_paciente == 3) 
                  {
                    $("#o3").prop("checked",true);
                  }

                  if (respuesta.puntos_paciente == 4) 
                  {
                    $("#o4").prop("checked",true);
                  } 

                  if (respuesta.puntos_paciente == 6) 
                  {
                    $("#o6").prop("checked",true);
                  }

                  if (respuesta.puntos_paciente == 10) 
                  {
                    $("#10").prop("checked",true);

                  } 

          }
          else {
 
                  $("#ocupacion_total").val(respuesta.puntos);
                   $("#p_g_o").val(respuesta.puntos);

                  if (respuesta.puntos == 0) 
                  {
                    $("#o0").prop("checked",true);
                  } 
                  if (respuesta.puntos == 1) 
                  {
                    $("#o1").prop("checked",true);
                  } 
                  if (respuesta.puntos == 2) 
                  {
                    $("#o2").prop("checked",true);
                   
                  }
                  if (respuesta.puntos == 3) 
                  {
                    $("#o3").prop("checked",true);
                  }
                  if (respuesta.puntos == 4) 
                  {
                    $("#o4").prop("checked",true);
                  } 
                  if (respuesta.puntos == 6) 
                  {
                    $("#o6").prop("checked",true);
                  }
                  if (respuesta.puntos == 10) 
                  {
                    $("#10").prop("checked",true);

                  } 

          }
            
        
 
suma_puntos();

          }


          });
   };
 

       }
 
function chequedoenlinea(id){

 $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json",data:"opcion=CONSULTAR_PACIENTE_TS2&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
var id_concentrado=$("#f"+respuesta.id_check).prop("checked",respuesta.stat).val();

    $("#p_g_ig").val(id_concentrado);
var idradios= $("#id_radio").val(respuesta.id_check); 

$("#id_concentrado").val(respuesta.id_check);

     suma_puntos();

        }});
   
} 

/*
$("[data-toggle=confirmation_update]").confirmation(
    {container:"body",
     btnOkLabel: 'Actualizar',
    btnCancelLabel: 'Cancelar',
     onConfirm:function(event, element) {  
      var id= $(element).attr("id");
       $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=ELIMINAR_PACIENTES&id="+id,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
         
        }}); 
//menu('#trabajo_social');   
      
    }});

*/

function Update_iigreso_familiar(){
var id_egreso =$("#id_egreso").val();
      $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=ELIMINAR_EGRESO&id_egreso="+id_egreso,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
         
        }});

  $("#guardar_egreso").show();
  $("#update_egreso").css("display","none");
  $("#i_m_j_f").removeAttr("disabled").val("");
  $("#i_alimentacion").removeAttr("disabled").val("");
  $("#i_trasporte").removeAttr("disabled").val("");
  $("#i_combustible").removeAttr("disabled").val("");
  $("#i_luz").removeAttr("disabled").val("");
  $("#i_agua").removeAttr("disabled").val("");
  $("#i_eduacion").removeAttr("disabled").val("");
  $("#i_m_otros").removeAttr("disabled").val("");
  $("#i_m_hijo").removeAttr("disabled").val("");
  $("#i_m_esposo").removeAttr("disabled").val("");
  $("#otros_apoyos").removeAttr("disabled").val("Otros");
  $("#i_renta_predial").removeAttr("disabled").val("");
  $("#i_m_total").val(""); 
  $("#i_total").val("");
  $("#t4_75_mas").prop("checked",false);
  $("#t4_menor_25").prop("checked",false);
  $("#t4_50_74").prop("checked",false); 
  $("#t4_25_49").prop("checked",false); 
 

}

function Guardar_iigreso_familiar()
   { 

  var id=  $('input:radio[name=check_paciente]:checked').val(); 
  var i_m_otros=$("#i_m_otros").attr("disabled","disabled").val();
  var i_m_hijo=$("#i_m_hijo").attr("disabled","disabled").val();
  var i_m_esposo=$("#i_m_esposo").attr("disabled","disabled").val();
  var i_m_j_f=$("#i_m_j_f").attr("disabled","disabled").val();
  var otros_apoyos=$("#otros_apoyos").attr("disabled","disabled").val();
  var i_alimentacion=$("#i_alimentacion").attr("disabled","disabled").val();
  var i_trasporte=$("#i_trasporte").attr("disabled","disabled").val();
  var i_combustible=$("#i_combustible").attr("disabled","disabled").val();
  var i_luz=$("#i_luz").attr("disabled","disabled").val();
  var i_agua=$("#i_agua").attr("disabled","disabled").val();
  var i_eduacion=$("#i_eduacion").attr("disabled","disabled").val();
  var i_renta_predial=$("#i_renta_predial").attr("disabled","disabled").val();
  var i_m_total=sumaTotalfull;
  var i_total= sTotalfull;
  var id_responsable=$("#id_responsable").val();
  var p_total_e= $("#p_g_eg").val();


     var datos = "id="+id+"&i_m_otros="+i_m_otros+"&i_m_hijo="+i_m_hijo+"&i_m_esposo="+i_m_esposo+"&i_m_j_f="+i_m_j_f+"&otros_apoyos="+otros_apoyos+"&i_alimentacion="+i_alimentacion+"&i_trasporte="+i_trasporte+"&i_combustible="+i_combustible+"&i_luz="+i_luz+"&i_agua="+i_agua+"&i_eduacion="+i_eduacion+"&i_renta_predial="+i_renta_predial+"&i_m_total="+i_m_total+"&total_regla="+total_regla+"&i_total="+i_total+"&id_responsable="+id_responsable+"&p_total_e="+p_total_e;
  

if (i_m_j_f =="" || i_alimentacion=="" ) {
  $("#i_m_j_f").removeAttr("disabled");
  $("#i_alimentacion").removeAttr("disabled");
  $("#i_trasporte").removeAttr("disabled");
  $("#i_combustible").removeAttr("disabled");
  $("#i_luz").removeAttr("disabled");
  $("#i_agua").removeAttr("disabled");
  $("#i_eduacion").removeAttr("disabled");
  $("#i_m_otros").removeAttr("disabled");
  $("#i_m_hijo").removeAttr("disabled");
  $("#i_m_esposo").removeAttr("disabled");
  $("#otros_apoyos").removeAttr("disabled");
  $("#i_renta_predial").removeAttr("disabled");

$("#guardar_egreso").removeAttr("disabled");
  alert("Ingrese Todos los Ingresos");
} else{
  
    $.ajax({url:"../php/main.php",cache:false, type:"POST", data:"opcion=EGRESO_FAMILIAR&id="+datos,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
       //   alert(respuesta.id);
         chequedoenlinea(id);
         suma_puntos();
         
        }});

$("#update_egreso").show();
  $("#guardar_egreso").css("display","none");
    
}


   
  
   }

   function update_v_2(){
          $("#update_vivienda").css("display","none");
          $("#guardar_v").show();
        $("#cv_d_r_v").removeAttr("disabled");
        $("#cv_tv").removeAttr("disabled");
        $("#cv_sp").removeAttr("disabled");
        $("#cv_si").removeAttr("disabled");
        $("#cv_mc").removeAttr("disabled");
        $("#cv_nd").removeAttr("disabled");
        $("#cv_npd").removeAttr("disabled");
        $("#cv_total").removeAttr("disabled");
   }
 
   function caracteristicas_vivienda(){

     var id=  $('input:radio[name=check_paciente]:checked').val();
     var  cv_d_r_v=$("#cv_d_r_v").attr("disabled","disabled").val();
     var  cv_tv=$("#cv_tv").attr("disabled","disabled").val();
     var  cv_sp=$("#cv_sp").attr("disabled","disabled").val();
     var  cv_si=$("#cv_si").attr("disabled","disabled").val();
     var  cv_mc=$("#cv_mc").attr("disabled","disabled").val();
     var  cv_nd=$("#cv_nd").attr("disabled","disabled").val();
     var  cv_npd=$("#cv_npd").attr("disabled","disabled").val();
     var  cv_total=$("#cv_total").attr("disabled","disabled").val();
     var id_responsable=$("#id_responsable").val();
     var id_v=$("#id_v").val();
          $("#p_g_v").val(cv_total);
       suma_puntos();
   var datos = "id="+id+"&cv_d_r_v="+cv_d_r_v+"&cv_tv="+cv_tv+"&cv_sp="+cv_sp+"&cv_si="+cv_si+"&cv_mc="+cv_mc+"&cv_nd="+cv_nd+"&cv_npd="+cv_npd+"&cv_total="+cv_total+"&id_responsable="+id_responsable+"&id_v="+id_v;

if (cv_d_r_v ==null || cv_tv==null || cv_sp==null || cv_si==null || cv_mc==null || cv_nd==null || cv_npd==null) {
  alert("Seleccione la Opcion..!")
        $("#cv_d_r_v").removeAttr("disabled");
        $("#cv_tv").removeAttr("disabled");
        $("#cv_sp").removeAttr("disabled");
        $("#cv_si").removeAttr("disabled");
        $("#cv_mc").removeAttr("disabled");
        $("#cv_nd").removeAttr("disabled");
        $("#cv_npd").removeAttr("disabled");
        $("#cv_total").removeAttr("disabled");
 

} else{

  $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=GUARDAR_VIVIENDA&id="+datos,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
            
      
               $("#id_v").val(respuesta.id_v);
          

        }});
        $("#update_vivienda").show();
         $("#guardar_v").css("display","none");

};
    
   
        
   }


 function update_sm1(){ 
          $("#update_sm").css("display","none");
          $("#guardar_s").show();

        $("#esif").removeAttr("disabled");
        $("#esif_ttep").removeAttr("disabled");
        $("#esif_op_i").removeAttr("disabled");
     
      
   }
   
   function estado_salud(){
     var id=$('input:radio[name=check_paciente]:checked').val();
     var id_responsable=$("#id_responsable").val();
     var  esif=$("#esif").attr("disabled","disabled").val();
     var  esif_ttep=$("#esif_ttep").attr("disabled","disabled").val();
     var  esif_op_i=$("#esif_op_i").attr("disabled","disabled").val();
     var  esif_total=$("#esif_total").attr("disabled","disabled").val();
     var  id_sm=$("#id_sm").val();
     $("#p_g_s").val(esif_total);
      suma_puntos();
 
var datos = id_sm+"&esif="+esif+"&esif_ttep="+esif_ttep+"&esif_op_i="+esif_op_i+"&esif_total="+esif_total+"&id_responsable="+id_responsable;

if (esif ==null || esif_ttep ==null ||  esif_op_i ==null){
  alert("Seleccione la Opcion..!");

        $("#esif").removeAttr("disabled");
        $("#esif_ttep").removeAttr("disabled");
        $("#esif_op_i").removeAttr("disabled");
     
      
} else {

  $.ajax({url:"../php/main.php",cache:false,type:"POST",dataType:"json", data:"opcion=GUARDAR_SALUD_FAMILIAR&id_sm="+datos,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
            
               $("#id_sm").val(respuesta.id_sm);
           
        }});
   $("#update_sm").show();
               $("#guardar_s").css("display","none");

}
    
   }

function ingresar_externos(){
    var id_exportar=$('input:radio[name=id_es_gral]:checked').val();
    var fkunidadingreso =$("#fkunidadingreso").val(); 
    var si_ext=$("#si_ext").val(); 
    var n_e_ext=$("#n_e_ext").val();
    var fk_especialidades_ih=$("#fk_especialidades_ih").val();


var datos =id_exportar+"&fkunidadingreso="+fkunidadingreso+"&si_ext="+si_ext+"&fk_especialidades_ih="+fk_especialidades_ih+"&n_e_ext="+n_e_ext;

    $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=TRASPASO_DATOS&id="+datos,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){  
               if(respuesta=="GUARDAR"){
               $("#m_informacios_diagnostico").modal("hide");
                $("#modal_consulta_externos").modal("hide");
               setTimeout(function(){
                          menu("#trabajo_social");
                          }, 400); 
           }
          else if(respuesta=="ERROR"){
              $("#alertaguardar_diag").removeClass("alert-success");
              $("#alertaguardar_diag").addClass("alert-danger"); 
              $("#mensaje_diag").html("ERROR AL GUARDAR <br>* Verifique que todos sus datos esten bien capturados<br>* El numero de expediente esta duplicado");

              $("#alertaguardar_diag").fadeIn(800);
             } 
        }});
   }

function puntos_generados(){


var id=$('input:radio[name=check_paciente]:checked').val();
     var id_responsable=$("#id_responsable").val();
     var  p_g_ig=$("#p_g_ig").val();
     var  p_g_eg=$("#p_g_eg").val();
     var  p_g_v=$("#p_g_v").val();
     var  p_g_s=$("#p_g_s").val();
     var  p_g_o=$("#p_g_o").val();
     var  p_g_total=$("#p_g_total").val();
     var  nombre_ts=$("#nombre_ts").val();
     var  cedula_ts=$("#cedula_ts").val();
     var  diag_ts=$("#diag_ts").val();
     var  r_m_ts=$("#r_m_ts").val();
     var  fk_concentrado=$("#id_concentrado").val();
     var  id_radio=$("#id_radio").val();
      var  id_pg=$("#id_pg").val();

     if (diag_ts=="") {  
      setTimeout(function(){
               $("#ESE").modal("hide");
              }, 300);
       $("#m_m_r_e").modal("show"); } else{

   var datos = "id="+id+"&p_g_ig="+p_g_ig+"&p_g_eg="+p_g_eg+"&p_g_v="+p_g_v+"&p_g_s="+p_g_s+"&p_g_o="+p_g_o+"&p_g_total="+p_g_total+"&nombre_ts="+nombre_ts+"&cedula_ts="+cedula_ts+"&diag_ts="+diag_ts+"&r_m_ts="+r_m_ts+"&id_responsable="+id_responsable+"&fk_concentrado="+fk_concentrado+"&id_radio="+id_radio+"&id_pg="+id_pg;

    $.ajax({url:"../php/main.php",cache:false,type:"POST", data:"opcion=GUARDAR_PUNTOS_GRAL&id="+datos,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){ 
            
               if(respuesta=="GUARDAR"){
                  $("#lista_el").addClass("active");

   $("#lista_ts").removeClass("active");
  
             $("#alertaguardar_diag").removeClass("alert-danger");
             $("#alertaguardar_diag").addClass("alert-success");
             $("#mensaje_diag").html("SUS DATOS HAN SIDO GUARDADOS");

              $("#alertaguardar_diag").fadeIn(800,function(){
                $("#ESE").modal("hide");
                 setTimeout(function(){
                  menu('#paciente');
              }, 400);
             
               });
           }
          else if(respuesta=="ERROR"){
              $("#alertaguardar_diag").removeClass("alert-success");
              $("#alertaguardar_diag").addClass("alert-danger"); 
              $("#mensaje_diag").html("ERROR AL GUARDAR <br>* Verifique que todos sus datos esten bien capturados<br>* El numero de expediente esta duplicado");

              $("#alertaguardar_diag").fadeIn(800);
             } 
               

        }});
   

     };
     

   }


function suma_puntos(){
  var total_p =0;
  var p_g_ig =parseFloat($("#p_g_ig").val());
  var p_g_eg =parseFloat($("#p_g_eg").val());
  var p_g_v =parseFloat($("#p_g_v").val());
  var p_g_s =parseFloat($("#p_g_s").val());
  var p_g_o =parseFloat($("#p_g_o").val());
  if (isNaN(p_g_ig) ) { p_g_ig=0;};
  if (isNaN(p_g_eg) ) { p_g_eg=0;};
  if (isNaN(p_g_v) ) { p_g_v=0;};
  if (isNaN(p_g_s) ) { p_g_s=0;};
  if (isNaN(p_g_o) ) { p_g_o=0;};
  total_p=(p_g_ig+p_g_eg+p_g_v+p_g_s+p_g_o);
  $("#p_g_total").val(total_p);
  $("#progressbar11").css("width",total_p+"%");
  $("#progressbar11").html(""+total_p+" %");

}

  function actualizar_pacientes(){
     $("#actualizar_p").css("display","none");
      $("#guardar_p").show();
            $("#descripcion").removeAttr("disabled");
            $("#fk_unidad_p").removeAttr("disabled");
            $("#folio_sp").removeAttr("disabled");
            $("#unidad_referencia").removeAttr("disabled");
            $("#nombre").removeAttr("disabled");
            $("#no_expediente").removeAttr("disabled");
            $("#servicio_ingreso").removeAttr("disabled");
            $("#fk_especialidad").removeAttr("disabled");
            $("#diagnostico_egreso").removeAttr("disabled");
            $("#edad").removeAttr("disabled");
            $("#sexo").removeAttr("disabled");
            $("#estado_civil").removeAttr("disabled");
            $("#religion").removeAttr("disabled");
            $("#curp").removeAttr("disabled");
            $("#eaphic").removeAttr("disabled");
            $("#cual").removeAttr("disabled");
            $("#fecha_nacimiento").removeAttr("disabled");
            $("#lugar_nacimineto").removeAttr("disabled");
            $("#hali").removeAttr("disabled");
            $("#cual1").removeAttr("disabled");
            $("#escolaridad").removeAttr("disabled");
            $("#fk_ocupacion_p").removeAttr("disabled");
            $("#domicilio_actual").removeAttr("disabled");
            $("#referencia_domiciliaria").removeAttr("disabled");
            $("#telefono").removeAttr("disabled");
            $("#derecho_habiente").removeAttr("disabled");
            $("#nombre_unidad").removeAttr("disabled");
            $("#nucleo_basico").removeAttr("disabled");
            $("#caso_medico_legal").removeAttr("disabled");
            $("#donacion_sangre").removeAttr("disabled");
            $("#folio").removeAttr("disabled");
            $("#nombre_informante").removeAttr("disabled");
            $("#edad_informante").removeAttr("disabled");
            $("#parentesco").removeAttr("disabled");
            $("#sexo_informante").removeAttr("disabled");
            $("#ocupacion_informante").removeAttr("disabled");
            $("#telefono_informante").removeAttr("disabled");
            $("#nombre_responsable").removeAttr("disabled");
            $("#edad_responsable").removeAttr("disabled");
            $("#parentesco_responsable").removeAttr("disabled");
            $("#escolaridad_responsable").removeAttr("disabled");
            $("#religion_responsable").removeAttr("disabled");
            $("#telefono_responsable").removeAttr("disabled");
            $("#fk_ocupacion").removeAttr("disabled");
            $("#lugar_trabajo").removeAttr("disabled");
            $("#direccion_responsable").removeAttr("disabled");
            $("#hali_responsable").removeAttr("disabled");
            $("#cual2").removeAttr("disabled");
            $("#nombre_padre_resp").removeAttr("disabled");
            $("#edad_padre").removeAttr("disabled");
            $("#religion_padre").removeAttr("disabled");
            $("#estado_civil_padre").removeAttr("disabled");
            $("#telefono_padre").removeAttr("disabled");
            $("#nombre_madre").removeAttr("disabled");
            $("#edad_madre").removeAttr("disabled");
            $("#religion_madre").removeAttr("disabled");
            $("#estado_civil_madre").removeAttr("disabled");
            $("#telefono_madre").removeAttr("disabled");
            $("#hali_madre").removeAttr("disabled");
            $("#cual3").removeAttr("disabled");
            $("#no_int_familia").removeAttr("disabled");
            $("#v_p").removeAttr("disabled"); 
            $("#v_m").removeAttr("disabled");
            $("#ap_p").removeAttr("disabled"); 
            $("#ap_m").removeAttr("disabled");
            $("#iqgif").removeAttr("disabled");

  }

  function amr(){
   setTimeout(function(){
               $("#ESE").modal("show");
              }, 400);

   }



function mandar_datos(){
 var nom_inf=$("#nombre_informante").val();
 $("#nombre_responsable").val(nom_inf);

 var edad_inf=$("#edad_informante").val();
 $("#edad_responsable").val(edad_inf);


 var parentesco_inf=$("#parentesco").val();
 $("#parentesco_responsable").val(parentesco_inf);

 var tel_inf=$("#telefono_informante").val();
 $("#telefono_responsable").val(tel_inf);

alert("La ocupacion del informante no se Transfirio");
}

</script>
