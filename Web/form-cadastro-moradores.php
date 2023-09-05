<?php 
session_start();

require 'logica.php';

if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}

require 'header.php';
?>
