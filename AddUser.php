<?php
require_once 'Clases/Usuario.php';

$usuario = $_POST['user'];
$password = $_POST['password'];

$user= new Usuario();

$user->setUser($usuario);
$user->setPassword($password);



    $user->save();






echo 'usuario: '.$usuario.', pass: '.$password;

?>