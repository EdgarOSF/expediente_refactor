<?php

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$opcion = $_POST['opcion'];

if ($usuario === '' || $password === ''){
    echo json_encode('error');
} else {
    echo json_encode('usuario: '.$usuario.' password: '.$password. ' opcion: '.$opcion);
}



?>