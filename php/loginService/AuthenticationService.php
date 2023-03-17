<?php

// Clase que representa al servicio de autenticación
class AuthenticationService {
  private $connection;

  public function __construct($host, $username, $password, $database) {
    $this->connection = new mysqli($host, $username, $password, $database);    
    if ($this->connection->connect_error) {
      die('Error de conexión: ' . $this->connection->connect_error);
    }
  }

  public function authenticate($username, $password) {
    $query = "SELECT * FROM usuarios WHERE nombre='$username' AND contrasena='$password' AND estatus=1";
    $result = $this->connection->query($query);

    mysqli_close($this->connection);

    if ($result->num_rows > 0) {
        
      return true;
    }

    return false;
  }

  public function __destruct() {
    $this->connection->close();
  }
}

?>
