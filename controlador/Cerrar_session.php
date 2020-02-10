<?php
session_start();
$login = $_SESSION['login']
    
    
require ('conexion.php')
    
if (isset($_SESSION['login'])) {	
session_destroy();
header('Location: index.php');  
}  

?>
