<?php

$server = 'localhost';
$username = 'root';
$password = "";
$database = 'SAVCA';

$conexion = mysqli_connect($server,$username,$password,$database);

if (!$conexion) {
  echo "Conectado correctamente.";
}
else {
  echo "Error, Verifica tu conexion con la base de datos.";
}


 ?>



