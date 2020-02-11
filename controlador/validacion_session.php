<?php 
include('conexion.php');


$usuario = $_POST['Nombre_Usuario'];

$password = $_POST['Clave_Usuario'];

$consulta = "SELECT * FROM usuarios WHERE login='$usuario' and password='$password' ";

$resultado = mysqli_query($bd, $consulta);

$imprimenombre = $resultado->fetch_assoc();

$_SESSION['nombre'] = $imprimenombre['nombre'];
$_SESSION['id'] = $imprimenombre['id'];

$fila= mysqli_num_rows($resultado);
if ($fila>0) {
  header("location:../menu.php");
}else{
  echo '<script>
    alert("Usted no se encuentra registrado");
    window.history.go(-1);
  </script>';
  exit();
}
mysqli_free_result($resultado);
mysql_close($db);


 ?>