<?php
include ('validacion_session.php');
$usuario = $_SESSION['login'];
    
    
if (isset($_SESSION['login'])) {	
session_destroy();
header('Location: index.php');  
}  

?>
