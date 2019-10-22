<?php

require_once 'Clases/Usuario.php';

$usuario = $_POST['user'];
$password = $_POST['password'];

$user= new Usuario();

$user->logIn($usuario,$password);

?>