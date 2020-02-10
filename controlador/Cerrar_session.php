<?php
session_start();
$login = $_SESSION['login'];
    
    
if (isset($_SESSION['login'])) {	
session_destroy();
header('Location: index.php');  
}  

?>
