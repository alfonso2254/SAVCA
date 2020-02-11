
<?php 
session_start();
$usuario=$_SESSION['usuario'];
include('../controlador/conexion.php');

$clave=$_POST[clave];
$clave2==$_POST[clave2];


$sql = "UPDATE usuarios SET clave='$clave', clave2='$clave2' WHERE usuario='".$_POST['usuario']."'";
mysql_query($sql);
 
$result = mysql_query($sql);
echo "<meta http-equiv='refresh' content='0;url=admin.php' />";
?>