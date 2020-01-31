<?php

$server = 'localhost';
$username = 'root';
$password = "";
$database = 'cotizaciones';

$conexion = new mysqli($server,$username,$password,$database);

if (!$conexion) {
  echo "Verifica tu conexion con la base de datos.";
}
else {
  echo "Error";
}

 ?>
