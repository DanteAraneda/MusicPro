<?php 
session_start();

session_destroy();
$sesionusuario="";
header('Location:login.php');

?>