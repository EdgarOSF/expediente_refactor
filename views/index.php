<?php ini_set('display_errors', 0);
include_once '../php/conexion.php';
$con = new conexion();
session_start();
session_name("sesion_usuario");
if(isset($_SESSION['nombre']))
{

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>EXPEDIENTES</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resources/font-awesome-4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../resources/css/ionicons.min.css"> 
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="../resources/css/bootstrap-switch.css">
  <link rel="shortcut icon" href="../img/2.png" type="image/x-icon"/>
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<style type="text/css">
/*
#content{
width: 100%;
height:100%;
}
#content img {width: 100%;
height: 100%;
}*/

</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header" >

    <!-- Logo -->
    <a href="index.php" class="logo" style="background-color: rgba(95, 200, 153, 0.68)" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>EXPEDIENTES</b></span>
    </a>

    <!-- Header Navbar -->
   <nav class="navbar navbar-static-top" role="navigation" style="background-color: rgba(95, 200, 153, 0.68)">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a  class="dropdown-toggle"  href="index.php">
            
              <i class="fa fa-fw fa-refresh"></i>
            
            </a>


          
          </li>
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-fw fa-th"></i>
              <span class="label label-warning">
                   <?php //echo $modulo_unidad->no_pacientes_referidos(); ?>
              </span>
            </a>


            <ul class="dropdown-menu">
             
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <?php 
        
            ?>
              
                  <?php 
            
                  ?>
                   <!-- 
                    <li>

                    <a href="#" id="p_e">
                      <i class="fa fa-users text-aqua"></i> Pacientes Externos
                    </a>
                  </li>
                   -->
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer" id="1"><a href="#">Ver Todos</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
    
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header" style="background-color: rgba(95, 200, 153, 0.68)">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php  echo $_SESSION['nombre']; ?>
                  <small><?php  echo $_SESSION['descripcion']; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" id="cerrar" onclick="cerrar()">cerrar sesion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
   <aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['alias']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
        </div>
      </div>
   
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu"  >


        <li class="header active"  style="color:white;">Panel de Expedientes</li>
         <li ><a style="cursor:pointer"  onclick="menu('#ingresos')" ><i class="glyphicon glyphicon-log-in"></i>EXPEDIENTES</a></li>
      <?php 


          
            ?>
           
          
         <?php 
         
         
            ?>
          
          







       
         <?php

       
         if($_SESSION['idTipoUsuario']==2 || $_SESSION['idTipoUsuario']==1 || $_SESSION['idTipoUsuario']==3 || $_SESSION['idTipoUsuario']==5 || $_SESSION['idTipoUsuario']==6 )
              {
            ?>

              <li class="header active"  style="color:white;">Detalles Trabajo Social</li>
        <li id="lista_r" style="color:white;" class="treeview">
          <a href="#" onclick="menu('#consulta')">
            <i class="fa fa-table"></i> <span>Reportes</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        
        </li>
         <?php
             }
             if($_SESSION['idTipoUsuario']==2)
              {
          
             ?>
         <li class="treeview" id="lista_u" style="color:white;">
           <a href="#" style="cursor:pointer" onclick="menu('#usuario')" > 
            <i class="fa fa-user">
            </i> <span>Usuarios</span>
          </a>
        </li>
        <?php
             }
             if($_SESSION['idTipoUsuario']==1)
              {
          
             ?>
          <li class="treeview" id="lista_ua" style="color:white;">
           <a href="#" style="cursor:pointer" onclick="menu('#usuario_admin')" > 
            <i class="fa fa-user">
            </i> <span>Usuarios Admin</span>
          </a>
        </li>
        <?php } ?>
      


  <?php
          
             if($_SESSION['idTipoUsuario']==1 || $_SESSION['idTipoUsuario']==5|| $_SESSION['idTipoUsuario']==2 || $_SESSION['idTipoUsuario']==6)
              {
          
             ?>

        <li class="header active"  style="color:white;">Herramientas para la Pantalla</li>


  
      
       <li class="treeview">
           <a  style="cursor:pointer" onclick="menu('#nota_informativa')" > 
            <i class="fa fa-fw fa-tags">
            </i> <span>Nota Informativa</span>
          </a>
        </li>


              <li class="treeview">
           <a  style="cursor:pointer" onclick="menu('#servicio')" > 
            <i class="fa fa-fw fa-wrench">
            </i> <span>Servicios</span>
          </a>
        </li>
<li class="treeview">
           <a  style="cursor:pointer" onclick="menu('#cama')" > 
            <i class="fa fa-fw fa-bed">
            </i> <span>Camas</span>
          </a>
        </li>
    <li class="treeview">
           <a  style="cursor:pointer" onclick="menu('#ubicacion')" > 
            <i class="fa fa-fw fa-map-marker">
            </i> <span>Ubicaciones</span>
          </a>
        </li>


<?php
}
?>
       
    </section>
    <!-- /.sidebar -->
  </aside>


<div class="example-modal">
        <div class="modal" id="modal1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
           
              <div class="modal-body">
               <div class="box-body" >
            <div class="panel-body table-responsive">
            <form  name="formulario-empleado" id="formulario-empleado">
              <div class="modal-body">
                 <div class="box box-success"  >
                 <div class="box-body">
                      
          
           <h3><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Nuevo Empleo</h3><hr>
                <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><label for="nombre">Empleo:</label></div>           
                           <input type="text"  name="ocupacion"  id="ocupacion" value="" placeholder="Ocupacion" class="form-control" required>        
                    </div><br>
                  </div>   
                </div></div>
               <div class="row">
                  <div class="col-md-12">
                   <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><label for="tipo_usuario">Tipo de Empleo:</label></div>
                       <select class="form-control" name="fk_tipos_ocupaciones" id="fk_tipos_ocupaciones" required>
                          <option value="">Elija una opcion</option>
                        
                         
                        <?php
                            $tipos= $con->getDatos("select * from tipos_ocupaciones");
                  $i=0;
                  foreach ($tipos as $key) {
                  
                    echo "<option value='".$key['id']."'>".$key['tipo']."</option>";

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
             
             
              </div>
            </div>
              </div>
                 <div class="alert alert-success alert-dismissible" id="alertaguardar123" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Mensaje!</h4>
                <div id="mensaje123"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit"  class="btn btn-danger pull-right">Guardar</button>
              </div>
                </form>
            </div>
          </div>
        </div>
      </div>

      <div class="example-modal">
        <div class="modal" id="pacientes_e">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Pacientes Referidos</h4>
              </div>
              <div class="modal-body">
               <div class="box-body" >
            <div class="panel-body table-responsive">
                 <table id="tabla_pacientes2" style="font-size: 14px" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                 
                  <th></th>
                  <th>Fecha de Ingreso</th>
                  <th>Folio</th>
                  <th>No. Expediente</th>
                  <th>Unidad de Referencia</th>
                  <th>Nombre del Paciente</th>
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
                  <th>Fecha de Ingreso</th>
                  <th>Folio</th>
                  <th>No. Expediente</th>
                  <th>Unidad de Referencia</th>
                  <th>Nombre del Paciente</th>
                  <th>Edad</th>
                  <th>Sexo</th>
                  <th>Domicilio Actual</th>
                  <th>Telefono</th>
               
                  <th>Derecho Habiente</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
               
              </div>
            </div>
          </div>
        </div>
      </div>

  <div class="content-wrapper" id="contentimg">
    <section class="content" id="content"   >

   <div class="row">
        <img src="../img/ts5.5.jpg"  >
<div class="col-md-12">
  </div>
        </div>
    </section>
      </div>

    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2019 </strong> Todos los derechos Reservados
  </footer>
</div>
<script>
</script>

<script src="../resources/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../resources/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="../resources/plugins/datatable/js/buttons.flash.min.js"></script>
<script src="../resources/plugins/datatable/js/jszip.min.js"></script>
<script src="../resources/plugins/datatable/js/pdfmake.min.js"></script>
<script src="../resources/plugins/datatable/js/vfs_fonts.js"></script>
<script src="../resources/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="../resources/plugins/datatable/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="../resources/plugins/datatable/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../resources/plugins/datatable/css/buttons.dataTables.min.css">

<script src="../resources/js/jquery-ui.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<!---<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>-->
<!--<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">-->
<script src="../resources/js/validator.min.js"></script>
<script>
   
 

$('#formulario-empleado').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) 
        {   
        } 
        else 
        {   
            var dataString = $('#formulario-empleado').serialize();
             
        $.ajax({
            type: "POST",
            url: "../php/main.php",
            data: dataString+"&opcion=GUARDAR_OCUPACION",
            success: function(data) { 
          
          if(data=="GUARDAR"){
             $("#alertaguardar123").removeClass("alert-danger");
             $("#alertaguardar123").addClass("alert-success");
             $("#mensaje123").html("SUS DATOS HAN SIDO GUARDADOS");



           $("#alertaguardar123").fadeIn(800,function(){
                $("#modalnuevouser").modal("hide");
                 setTimeout(function(){
             $("#modal1").modal("hide");
              }, 400);
                location.reload();
               });
             
           }
          else if(data=="ERROR"){
              $("#alertaguardar123").removeClass("alert-success");
              $("#alertaguardar123").addClass("alert-danger"); 
              $("#mensaje123").html("ERROR AL GUARDAR");

              $("#alertaguardar123").fadeIn(800);
             }
            
              
       
            }
        });
        }
        return false;
    });

function cerrar()
{
        $.ajax({url:"../php/main.php",data:"opcion=CERRAR_SESION",type:"POST",
        cache:false,success:function(respuesta){
           
           document.location.href="../index.php";
          }
        });
 }
      $("#example1").DataTable({
       "language": {
            "url": "../resources/json/Spanish.json"
        }
    });

  $("#agregar_empleos").click(function(){
    $("#modal1").modal("show");
  });
  $("#p_e").click(function(){
    $("#pacientes_e").modal("show");
  });

  function menu(opcion) 
    { 
      switch(opcion)
       {  
        /* case "#trabajo_social" : clickResponse("#content","forms/trabajo_social.php");break;
       case "#usuario" : clickResponse("#content","forms/usuario.php"); break;
        case "#usuario_admin" : clickResponse("#content","forms/usuario_admin.php"); break;
        case "#grafica" : clickResponse("#content","forms/graficas.php"); break;
        case "#paciente" : clickResponse("#content","forms/paciente.php"); break;
        case "#pacientes_externos" : clickResponse("#content","forms/paciente_externos.php"); break;
        case "#cama" : clickResponse("#content","forms/camas.php"); break;
        case "#servicio" : clickResponse("#content","forms/servicios.php"); break;
        case "#ubicacion" : clickResponse("#content","forms/ubicaciones.php"); break;
        case "#egresos" : clickResponse("#content","forms/egresos.php"); break;
        case "#nota_informativa" : clickResponse("#content","forms/nota_informativa.php"); break;*/
        case "#ingresos" : clickResponse("#content","forms/admision_hospitalaria.php"); break;
       }
    }

     function clickResponse(idComponente,url,datos)
   { 
    $.ajax({url:url,type:"GET",cache:false,data:datos,beforeSend:function(){// $(idComponente).html("<div class='row' id='' > <div class='col-lg-12' align='center'><img align='center' src='../resources/img/loading.gif'   /></div></div>");
  },
           success:function(respuesta){
             $(idComponente).html(respuesta);
              }});    
   }
    menu('#grafica');
$("#lista_grafica").addClass("active");


$("#lista_ts").click(function() {
   $("#lista_ts").addClass("active");
   $("#lista_grafica").removeClass("active");
   $("#lista_el").removeClass("active");
   $("#lista_ee").removeClass("active");
   $("#lista_r").removeClass("active");
   $("#lista_u").removeClass("active");
   $("#lista_ua").removeClass("active");
});
  

   $("#lista_el").click(function() {
   $("#lista_el").addClass("active");
   $("#lista_ts").removeClass("active");
   $("#lista_grafica").removeClass("active");
   $("#lista_ee").removeClass("active");
   $("#lista_r").removeClass("active");
   $("#lista_u").removeClass("active");
   $("#lista_ua").removeClass("active");
});
   $("#lista_ee").click(function() {
   $("#lista_ee").addClass("active");
   $("#lista_ts").removeClass("active");
   $("#lista_grafica").removeClass("active");
   $("#lista_el").removeClass("active");
   $("#lista_r").removeClass("active");
   $("#lista_u").removeClass("active");
   $("#lista_ua").removeClass("active");
});

 $("#lista_r").click(function() {
   $("#lista_r").addClass("active");
   $("#lista_ts").removeClass("active");
   $("#lista_grafica").removeClass("active");
   $("#lista_el").removeClass("active");
   $("#lista_ee").removeClass("active");
   $("#lista_u").removeClass("active");
   $("#lista_ua").removeClass("active");
});

  $("#lista_u").click(function() {
   $("#lista_u").addClass("active");
   $("#lista_ts").removeClass("active");
   $("#lista_grafica").removeClass("active");
   $("#lista_el").removeClass("active");
   $("#lista_ee").removeClass("active");
   $("#lista_r").removeClass("active");
   $("#lista_ua").removeClass("active");
});

    $("#lista_ua").click(function() {
   $("#lista_ua").addClass("active");
   $("#lista_ts").removeClass("active");
   $("#lista_grafica").removeClass("active");
   $("#lista_el").removeClass("active");
   $("#lista_ee").removeClass("active");
   $("#lista_r").removeClass("active");
   $("#lista_u").removeClass("active");
});


   $("#lista_grafica").click(function() {
   $("#lista_grafica").addClass("active");
   $("#lista_ts").removeClass("active");
   $("#lista_ua").removeClass("active");
   $("#lista_el").removeClass("active");
   $("#lista_ee").removeClass("active");
   $("#lista_r").removeClass("active");
   $("#lista_u").removeClass("active");
});


    
</script>
</body>
</html>
<?php 
}
else
{
  echo "<script>document.location.href='../index.php'</script>";
}
?>

