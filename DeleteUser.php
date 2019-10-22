<?php
require_once 'Clases/Usuario.php';

$idDelete = $_POST['id'];


$user= new Usuario();

$user->delete($idDelete);




//echo 'usuario: '.$usuario.', pass: '.$password;

?>