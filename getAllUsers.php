<?php

require_once 'Clases/Usuario.php';

$user= new Usuario();

$reg=$user->getAllUsers();
echo json_encode($reg);

?>