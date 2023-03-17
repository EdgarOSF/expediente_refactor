<?php

require_once 'LoginController.php';

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'expendientes';

$authService = new AuthenticationService($host, $username, $password, $database);
$loginController = new LoginController($authService);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $loginController->login();
} else {
  $loginController->index();
}

?>
