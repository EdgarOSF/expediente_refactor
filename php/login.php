<?php
include_once 'conexion.php';
class login { 
 	private $con;
    private $usuario,$password,$alias,$rol,$unidad,$estatus,$id,$cedula;
    
    public function login()
	   {  
	   	extract($_REQUEST);  
	    $this->con = new conexion();
	  
	   }
    
	public function iniciarSesion($usuario, $password)
       {
       	// extract($_REQUEST);  
       	// $this->usuario = $usuario;
		// $password = md5($password);
    	$datos=$this->con->getDatos("select * from usuarios where nombre='$usuario' and contrasena='$password' AND estatus=1");
		     if(count($datos)!=0) 
		          {
		           $_array[]=array("existe"=>true);
			        if(!isset($_SESSION)) 
					    { 
					        session_start(); 
					        session_name("sesion_usuario");
					    }	
              $_SESSION["nombre"]       = $datos[0]['nombre'];
          
			   		echo json_encode($_array);
				   }
			  else 
			 	{ $_array[]=array("existe"=>false);
			      echo json_encode($_array);
			 	}
	    }
	  
   
	public function cerrarSesion()
   {  session_start();
	  session_name("sesion_usuario");
	  session_destroy();
   }

   public function habilitar($id_usuario,$estatus)
   {  echo "UPDATE usuarios SET estatus='".$estatus."' WHERE id=".$id_usuario;
       $ishabilitado=0;
      if($estatus=="true")$ishabilitado=1; 
      else $ishabilitado=0;

      $this->con->setDatos("UPDATE usuarios SET estatus='".$ishabilitado."' WHERE id=".$id_usuario);
      echo "hola";

   }

   public function nuevo_usuario()
   {  extract($_REQUEST);
   	  if(isset($id)) $this->id=$id;
   	  $this->nombre=$nombre;
      $this->cedula=$cedula;
   	  $this->alias=$alias;
   	  if(isset($password)) $this->password= md5($password);
   	  $this->rol=$fk_tipo_usuario;
   	  $this->unidad=$unidad;
     if($this->id==null)
     {  echo ($this->con->setDatos("INSERT INTO usuarios (nombre,cedula,alias,password,fk_tipo_usuario,fk_unidad_adm,estatus)VALUES ('".$this->nombre."','".$this->cedula."','".$this->alias."','".$this->password."',".$this->rol.",".$this->unidad.",0) ") ? "GUARDAR" : "ERROR");
     }
     else
     {   


     if ($this->password == "46d2be275ed2dd86ab2b5388f7346d15") {
        echo ($this->con->setDatos("UPDATE usuarios SET nombre='".$this->nombre."',cedula='".$this->cedula."',alias='".$this->alias."',fk_tipo_usuario=".$this->rol.", fk_unidad_adm=".$this->unidad." WHERE id=".$this->id) ? "GUARDAR" : "ERROR");
      } else {
         echo ($this->con->setDatos("UPDATE usuarios SET nombre='".$this->nombre."',cedula='".$this->cedula."',password='".$this->password."',alias='".$this->alias."',fk_tipo_usuario=".$this->rol.", fk_unidad_adm=".$this->unidad." WHERE id=".$this->id) ? "GUARDAR" : "ERROR");

      }



     }
   }

   public function consultar_usuario($id)
   {
   	  $datos =$this->con->getDatos("SELECT * FROM usuarios WHERE id=".$id);
   	  $array=array("id"=>$datos[0]['id'],"nombre"=>$datos[0]['nombre'],"cedula"=>$datos[0]['cedula'],"alias"=>$datos[0]['alias'],"rol"=>$datos[0]['fk_tipo_usuario'],"unidad"=>$datos[0]['fk_unidad_adm']);
   	  echo json_encode($array);
   }
 }

?>