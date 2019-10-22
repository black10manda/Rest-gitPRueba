<?php

require_once 'Clases/Usuario.php';

$user= new Usuario();

$idU=$_GET['id'];

$reg=$user->getUserByIDUser($idU);
echo json_encode($reg);

?>