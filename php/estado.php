<?php
include_once 'conexion.php';
class estado
{
	private $id,$nombre,$con;

	public function estado()
	{
		$this->con = new conexion();
	}
	public function HTMLEstados()
	{ $html="";
	  //$datos=$this->con->getDatos("SELECT id_expediente,nombrePaciente FROM expedientes");
      $html="<option value=''></option>";
     /* foreach ($datos as $key) 
      {
      	$html.="<option value='".$key['id_expediente']."'>".utf8_encode($key['nombrePaciente'])."</option>";
      }*/
      return  $html;
	}

	public function HTMLMunicipios($id)
	{ $html="";
	  $datos=$this->con->getDatos("SELECT * FROM municipio WHERE fk_estado=".$id);
      $html="<option value=''></option>";
      foreach ($datos as $key) 
      {
      	$html.="<option value='".$key['id']."'>".$key['nombre']."</option>";
      }
      echo  $html;

	}
}

?>