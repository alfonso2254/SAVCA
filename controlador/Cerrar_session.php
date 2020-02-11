<?php

//iniciamos la session existente
session_start();

//Destruimos la session
session_destroy();

//Redirecciona luego de destruir la session
header('location:../index.php');  
  

?>
