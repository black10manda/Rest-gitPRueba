<?php
require_once 'Clases/Usuario.php';

$usuario = $_POST['user'];
$password = $_POST['password'];
$id = $_POST['id'];

$user= new Usuario();

$user->setId($id);
$user->setUser($usuario);
$user->setPassword($password);

$user->update();




//echo 'usuario: '.$usuario.', pass: '.$password;

?>