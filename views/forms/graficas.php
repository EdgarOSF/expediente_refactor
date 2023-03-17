<?php
session_start();
session_name("sesion_usuario");
include_once '../../php/conexion.php';
$con=new conexion();

?>


 
<h2> <i class="fa fa-fw fa-pie-chart"></i> Graficas</h2><br>

        <!-- /.col (LEFT) -->
        <div class="col-md-7">
          <!-- LINE CHART -->
             <div class="box box-success">
            <div class="box-header with-border">
           
             
              <h3 class="box-title">Pacientes por niveles Socio Economico</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <div id="chartdiv" style=" height: 250px; font-size: 10px;"></div>
                 <div class="container-fluid">
                  <div class="row text-center" >
                         <div class="col-sm-3" style="float: none !important;display: inline-block;">
                         <label class="text-left">Radio:</label>
                          <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                          </div>

                      <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Angulo:</label>
                        <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>  
                      </div>
                  
                      <div class="col-sm-3" style="float: none !important;display: inline-block;">
                        <label class="text-left">Profundidad:</label>
                        <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                      </div></div>
             </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <div class="col-md-5">
  <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Pacientes por el Servicio de Ingreso</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
           <div id="donut-chart" style="height: 300px;"></div>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
          <!-- /.box -->

<script src="plugins/flot/jquery.flot.min.js"></script>
<script src="plugins/flot/jquery.flot.resize.min.js"></script>
<script src="plugins/flot/jquery.flot.pie.min.js"></script>
<script src="plugins/flot/jquery.flot.categories.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="plugins/amcharts/amcharts.js"></script>
<script src="plugins/amcharts/serial.js"> </script>
<script src="plugins/amcharts/themes/chalk.js"> </script>
<script>
  function labelFormatter(label, series) {
  
    return '<div style="font-size:13px; text-align:center; padding:2px; color: Black; font-weight: 600;">'
        + label
        + "<br>"
        + Math.round(series.percent)+ " %</div>";
       // + series.percent+"% </div>";
  }
 $(function () {
  var donutData="";

   var fk = "<?php  echo $_SESSION['fk_unidad_adm']; ?>";
  $.ajax({url:"../php/main.php",async:false,data:"opcion=CONSULTAR_GRAFICA_ESCALA_INGRESO&fk="+fk,cache:false,type:"POST",dataType:"json",success:function(respuesta){
    
   donutData = respuesta;
   }});

    $.plot("#donut-chart", donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.5,
          label: {
            show: true,
            radius: 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: true
      }
    });
    /*
     * END DONUT CHART
     */

 
 
  var datos="";
    $.ajax({url:"../php/main.php",async:false,data:"opcion=CONSULTAR_GRAFICA_ESCALA_CALIFICACION&fk="+fk ,cache:false,type:"POST",dataType:"json",success:function(respuesta){
    
    datos = respuesta;
   }});
    
var chart = AmCharts.makeChart("chartdiv", {
         "theme": "light",
      "type": "serial",
    "startDuration": 2,
      "dataProvider":datos,
      "valueAxes": [{
        "stackType": "3d",
           
          "position": "left",
          "axisAlpha":1,
          "gridAlpha":1,        
      }],
      "graphs": [{

          "balloonText": "[[category]]: <b>[[value]] Pacientes</b>",
          "labelText": "[[value]] Pacientes",
          "colorField": "color",
          "fillAlphas": 0.85,
          "lineAlpha": 0.1,
          "type": "column",
          "topRadius":1,
          "valueField": "value"
      }],
      "depth3D": 40,
    "angle": 30,
      "chartCursor": {
          "categoryBalloonEnabled": true,
          "cursorAlpha": 0,
          "zoomable": true
      },    
      "categoryField": "label",
      "categoryAxis": {
          "gridPosition": "start",
          "axisAlpha":0,
          "gridAlpha":0,
          "labelRotation": 20,
         
          "tickLength": 20
      },

      "export": {
        "enabled": true
       }

  },0);

  jQuery('.chart-input').off().on('input change',function() {
    var property  = jQuery(this).data('property');
    var target    = chart;
    chart.startDuration = 0;

    if ( property == 'topRadius') {
      target = chart.graphs[0];
    }

    target[property] = this.value;
    chart.validateNow();
  });

});
 </script>
 
<style>
  <style>
#chartdiv {
  width   : 100%;
  height    : 100%
  font-size : 11px;
  
}

</style>