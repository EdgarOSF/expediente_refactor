<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<?php 
session_start();
echo $_SESSION["rfc"]   ;
echo date('d-m-Y');
?>
<div class="row"  >
  <div class="col-md-12">
    <div class="content">
    <div class="box-body" >
    <div class="panel-body table-responsive">
        <table id="tabla_citas" class="table table-bordered table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                
                <th>Curp</th>
           
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Curp</th>
   
            </tr>
        </tfoot>
    </table>
    </div>
    </div>
   </div>        
  </div>
</div>

             

   
<script>
    
    $(document).ready(function() 
  {
    $('#tabla_citas').DataTable(
            { "language": {
                "url": "../resources/json/Spanish.json"
            },
            "bProcessing": true,
            "sAjaxDataProp":"",   
            "iDisplayStart": 0,
             "order": [[ 0, "asc" ]],
             "searching" : true,
              "paging": true,
             "ajax": "../php/main.php?opcion=CONSULTAR_CITAS&id_unidad="+<?php echo $_SESSION['fk_unidad_adm'] ?>,
        "columns": [
           // { "data": "expediente"},
            { "data": "Curp" }
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
}
 );
    function enviar()
    {
       var datos= jQuery("#formCheck").serialize();
         $.ajax({url:"main.php",cache:false,type:"POST", data:"opcion=TRASPASO_DATOS&"+datos,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){  
                  alert(respuesta)
                   }});
    }

</script>
<form id="formCheck" name="formCheck">
<input type="checkbox" name="provincias[]" value="capital_federal" /> Capital Federal<br />
<input type="checkbox" name="provincias[]" value="catamarca" /> Catamarca<br />
<input type="checkbox" name="provincias[]" value="chaco" /> Chaco<br />
<input type="checkbox" name="provincias[]" value="chubut" /> Chubut<br />
<input type="checkbox" name="provincias[]" value="cordoba" /> Córdoba<br />
<input type="checkbox" name="provincias[]" value="corrientes" /> Corrientes<br />
<input type="checkbox" name="provincias[]" value="entre_rios" /> Entre Ríos<br />
<input type="checkbox" name="provincias[]" value="formosa" /> Formosa<br />
<input type="checkbox" name="provincias[]" value="jujuy" /> Jujuy<br />
<input type="checkbox" name="provincias[]" value="la_pampa" /> La Pampa <br />
<button type="button" onclick="enviar()"></button>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>


<?php 
session_start();
echo $_SESSION["rfc"];
echo date('d-m-Y');
?>

             

   
<script>

    function enviar()
    {
       var datos= jQuery("#formCheck").serialize();
         $.ajax({url:"main.php",cache:false,type:"POST", data:"opcion=TRASPASO_DATOS&"+datos,
         beforeSend : function()
              {    
              } ,
        success:function(respuesta){  
                  alert(respuesta)
                  }});
    
    }

</script>
<form id="formCheck" name="formCheck">
<input type="checkbox" name="provincias[]" value="24" /> 24<br />
<input type="checkbox" name="provincias[]" value="12" /> 12<br />
<input type="checkbox" name="provincias[]" value="8" /> 8<br />
<input type="checkbox" name="provincias[]" value="4" /> 4<br />

<button type="button" onclick="enviar()"></button>
</form>

<!DOCTYPE html>
<html>
<body>

<p>Click the button to display the first character of the string "HELLO WORLD".</p>

<button onclick="myFunction()">Try it</button>

<p id="demo"></p>

<script>
function myFunction() {
  //alert(jQuery("#provincias").attr('value'));
    var horas="";
    var str = "24.12.";
    var res = str.charAt(0);
    document.getElementById("demo").innerHTML = str;
    for (var i =0; i< str.length;  i++) 
    {    if(str.charAt(i)!=='.')
         {
          horas=horas+str.charAt(i);
          alert(horas);
         }
         // alert(str[i]);
    }
}
</script>

</body>
</html>