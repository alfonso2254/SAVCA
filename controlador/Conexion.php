<?php

$server = 'localhost';
$username = 'root';
$password = "";
$database = 'SAVCA';

$bd = mysqli_connect($server,$username,$password,$database);

if ($bd) {
  echo "Conectado correctamente.";
}
else {
  echo "Error, Verifica tu conexion con la base de datos.";
}


 ?>



