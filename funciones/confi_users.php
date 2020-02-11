
<?php session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include('../controlador/Conexion.php');


$clave=$_POST[clave];
$clave2=$_POST[clave2];
$clave3=$_POST[clave3];

if($clave==NULL|$clave2==NULL|$clave3==NULL){

echo "<script>alert('Todos los campos son obligatorios, por favor intente de nuevo. Gracias');</script>";
echo "<meta http-equiv='refresh' content='0;url=admin_clave.php' />";

}elseif($clave2 != $clave3){

echo "<script>alert('Las contraseñas no coinciden, por favor intente de nuevo. Gracias');</script>";
echo "<meta http-equiv='refresh' content='0;url=admin_clave.php' />";

}

$registro="SELECT usuario, clave FROM usuarios WHERE usuario='".$_SESSION['usuario']."' AND clave='".$_SESSION['clave']."'";
mysql_query($registro);
if($_POST['clave']==$_SESSION['clave']){

$clave=sha1(md5($clave));

$sql = "UPDATE usuarios SET clave='$clave3' WHERE usuario='".$_SESSION['usuario']."' AND clave='".$_SESSION['clave']."'";
mysql_query($sql);
 
$result = mysql_query($sql);
echo "<meta http-equiv='refresh' content='0;url=admin.php' />";

}else{

echo "<script>alert('La contraseña actual no coincide, por favor intente de nuevo. Gracias');</script>";
echo "<meta http-equiv='refresh' content='0;url=admin_clave.php' />";
}
?>