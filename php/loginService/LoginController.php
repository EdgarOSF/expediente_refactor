<?php

require_once 'AuthenticationService.php';

// Clase que representa el controlador de inicio de sesión
class LoginController {
  private $authService;

  public function __construct(AuthenticationService $authService) {
    $this->authService = $authService;
  }

  public function index() {
    // Renderizar la vista de inicio de sesión
    require 'index.php';
  }

  public function login() {
    $errors = [];

    $username = $_POST['usuario'];
    $password = $_POST['password'];

    if ($this->authService->authenticate($username, $password)) {
      // Iniciar sesión
      echo "Inicio de sesión exitoso";
    } else {
      $errors[] = 'Invalid username or password';
      $this->index();
    }
  }
}

?>
