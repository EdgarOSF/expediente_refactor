<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EXPEDIENTES</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="resources/font-awesome-4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="resources/css/ionicons.min.css"> 
  <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="views/plugins/iCheck/square/blue.css">
  <!--<link rel="shortcut icon" href="resources/img/logo3.png" type="image/x-icon"/>-->
  <link rel="shortcut icon" href="img/3.png" type="image/x-icon"/>
</head>
<body class="hold-transition login-page" style="background: url('img/ts6.jpg') no-repeat fixed center;">

<div class="content">
  <div class="login-box" >
  <div class="login-logo">
    
  </div>
  <div class="login-box-body" style="background: rgba(21, 143, 36, 0.22);">
    <div class="row">
   <div class="col-md-6" align="center" >
     <img src="img/logo1.png" class="img-responsive " width="100%" height="100%" >    
   </div>
    <div class="col-md-6 " align="center" >
    <!--<img src="img/logo44.png" class="img-responsive visible-md visible-lg" width="100%" height="100%" >-->
    </div>
  </div>
    <p class="login-box-msg" style="color: white;  font-size: 20px; font-weight: bold;  ">Iniciar Sesión</p>
    <?php if (!empty($errors)): ?>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>


    <form class="login-bx" id="form-login" name="form-login">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
           <div id="error" style="display:none;color:white" >  
            <p style="color:red">Usuario / Contraseña no válidos</p>
          <div class="clearfix"></div>
        </div>
        </div>
        <div class="col-xs-4"><br>
          <button type="submit" class="btn btn-danger btn-block btn-flat">Iniciar</button>
        </div>
      </div>
    </form><br>


    <div align="center" >
    <div class="social-auth-links text-right" style="color:white; font-size: 15px;">
      <label>Expedientes</label><br>
       
    </div>  
     <br>
</div>
  </div>
</div>
</div>
</div>
</div>
<script src="views/plugins/jQuery/jquery-3.6.4.min.js"></script>
<script src="views/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="views/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
   <script type="text/javascript" src="resources/js/validator.min.js" ></script>
   <script src="resources/index/post.js"></script>
<script> 
// $(document).ready(function(){

//   $("#form-login").submit(function (event) {
//     const formData = {
//       usuario: $("#usuario").val(),
//       password: $("#password").val(),
//       opcion: "iniciar_sesion",
//     };

//     console.log(formData);

//     $.post( "php/main.php", formData, function( data ) {
//       alert('exito');
//       console.log(data);
//     });

//     // $.ajax({
//     //   type: "POST",
//     //   url: "php/main.php",
//     //   data: formData,
//     //   dataType: "json",
//     //   encode: true,
//     // }).done(function (data) {
//     //   console.log(data);
//     //   if(data[0].existe) {  
//     //     document.location.href="views/index.php";
//     //   } else {
//     //     $("#error").show("slow");
//     //   }
//     // });
//     event.preventDefault();

//   });

//       // $('#form-login').on('submit', function(e) {
//       //     e.preventDefault();
//       //       var usuario=$("#usuario").val();
//       //       var password=$("#password").val();
//       //       var opcion = 'iniciar_sesion';
//       //       console.log('usuario: ', usuario);
//       //       console.log('password: ', password);
//       //      $.ajax({
//       //         url:"php/main.php",
//       //         // dataType:"json",
//       //         // method: "POST",
//       //         // data:"opcion=iniciar_sesion&usuario="+usuario+"&password="+password,
//       //         type:"POST",
//       //         data: {"opcion": opcion, "usuario": usuario, "password": password},
//       //         cache: false,
//       //         success: function(respuesta) {
//       //           console.log('respuesta: ', respuesta);
//       //             if(respuesta[0].existe) {  
//       //               document.location.href="views/index.php";
//       //             } else { 
//       //               $("#error").show("slow");
//       //             }
//       //         }
//       //       });
           
//       //     //  return false;
//       // });
// });
    

</script>
</body>
</html>
