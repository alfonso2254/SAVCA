<?php 
$accion = $_POST['accion'];

if($accion == 'VALIDAR_USUARIO'){

require('Conexion.php');
$nombre = $_POST['Nombre_Usuario'];
$clave = utf8_decode($_POST['Clave_Usuario']);

$sql = "select * from usuarios
where (name = '$nombre' or login = '$nombre') and password = '$clave' and estatus = 'Activo' ";
$datos = mysqli_query($sql,$con);

if(mysqli_num_rows($datos) > 0) {
@session_start();
$nombre_conect = mysqli_result($datos,0,"name");
$_SESSION['nombre_conectado_visa'] = $nombre_conect;
$email = mysqli_result($datos,0,"email");
$_SESSION['email'] = $email;
$login = mysqli_result($datos,0,"login");
$_SESSION['login'] = $login;
$rank = mysqli_result($datos,0,"rank");
$_SESSION['rank'] = $rank;

$so = php_uname()." ".PHP_OS;

//NAVEGADOR

function ObtenerNavegador($user_agent) {
     $navegadores = array(
          'Opera' => 'Opera',
          'Mozilla Firefox'=> '(Firebird)|(Firefox)',
          'Galeon' => 'Galeon',
          'Google Chrome'=>'Gecko',
		  'Google Chrome'=>'chrome',
          'MyIE'=>'MyIE',
          'Lynx' => 'Lynx',
          'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)',
          'Konqueror'=>'Konqueror',
          'Internet Explorer 8' => '(MSIE 8\.[0-9]+)',
		  'Internet Explorer 7' => '(MSIE 7\.[0-9]+)',
          'Internet Explorer 6' => '(MSIE 6\.[0-9]+)',
          'Internet Explorer 5' => '(MSIE 5\.[0-9]+)',
          'Internet Explorer 4' => '(MSIE 4\.[0-9]+)',
);
foreach($navegadores as $navegador=>$pattern){
       if (eregi($pattern, $user_agent))
       return $navegador;
    }
return 'Desconocido';
}
$explorador = ObtenerNavegador($_SERVER['HTTP_USER_AGENT']);
$ip = $_SERVER['REMOTE_ADDR'];
$info = php_uname()." ".PHP_OS;
date_default_timezone_set('America/Caracas');
$hora = date('h:i:s a');
$fecha = date('Y-m-d');

$sql_ingresos = "insert into ingresos_usuarios (ip, usuario, nombre, acceso, fecha, hora, info, navegador)
					VALUES ('$ip', '$login', '$nombre_conect', 'Ingreso', '$fecha', '$hora', '$info', '$explorador')";
$q_ingresos = mysqli_query($sql_ingresos,$con);


print '<script language="JavaScript">';
//print 'alert("BIENVENIDO A PHOENIX SECURITY 2019");';
print 'location.href=("panel.php");';
print '</script>';

}else{

print '<script language="JavaScript">';
print 'alert("Datos Incorrectos Intentelo de Nuevo.");';
print 'location.href=("index.php");';
print '</script>';
}

}


$navegador = ($_SERVER['HTTP_USER_AGENT']);?>


 ?>