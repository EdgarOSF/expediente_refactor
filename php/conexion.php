<?php
 class conexion {   
    private $server="localhost";
    private $usuario="root";
    private $password="";
    private $database="expendientes";
    public  $rs;
    private $mysqli;

    public function conexion() {
      // Crear conexión
      $this->mysqli = @new mysqli($this->server, $this->usuario, $this->password, $this->database);

      // Verificar la conexión
      if ($this->mysqli->connect_error) {
        die('Error de conexión: ' . $this->mysqli->connect_error);
      }
    }    

    public function getDatos ($sentencia) { 
      $registros= array();
      $conexion = $this->conexion();
      // $sql = 'select * from usuarios where nombre="edgar" and contrasena="edgar" AND estatus=1';
      $this->rs = $conexion->query($sentencia);


      // Verificar si la consulta fue exitosa
      if (!$this->rs) {
        die('Error al ejecutar la consulta: ' . mysqli_error(conexion));
      }

      // Obtener los resultados
      while ($datos = mysqli_fetch_assoc($this->rs)) {
        echo $datos['pk_usuario'] . ' - ' . $datos['nombre'] . ' - ' . $datos['contrasena'] . '<br>';
        $registros[]=$datos;
      }

      // Liberar la memoria del resultado
      // mysqli_free_result($this->rs);

      // Cerrar la conexión
      // mysqli_close($conexion);
      // echo $registros;
      return $registros;
    }

    // public function getDatos ($sentencia) { 
    //   $registros= array();
    //   $this->rs = mysqli_query(conexion(), $sentencia);

    //   while($datos=mysqli_fetch_array( $this->rs)) {  
    //     $registros[]=$datos;
    //   }
    //   // echo $registros;
    //   return $registros;
    // }

    public function getDatos2 ($sentencia) { 
      $registros= array();
      $this->rs = $this->mysqli->query($sentencia);

      while($datos=mysqli_fetch_array( $this->rs)) {  
        $registros[]=$datos;
      }
      return $registros;
    }

    public function getRs($sentencia) {  
      $this->rs = $this->mysqli->query($sentencia); 
    }

    public function setDatos($sentencia) {  
      $this->mysqli->query($sentencia);
    }

    public function getNumFila() {  
      return mysqli_num_rows($this->rs);
    }

    public function get_mysqli_insert_id() { 
      return $this->mysqli->insert_id;
    }

    public function close() {
      $this->mysqli->close();
    }
}

// Crear una instancia de la clase
// $persona1 = new conexion();
// $persona1 = new conexion();

// Llamar al método saludar
// $persona1->conexion();
// $persona1->getDatos();

?>