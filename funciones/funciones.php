<?php

function cambiarFormatoFecha($fecha){
list($anio,$mes,$dia)=explode("-",$fecha);
return $dia."/".$mes."/".$anio;
}


function cambiarFormatoFecha2($fecha){
list($dia,$mes,$anio)=explode("/",$fecha);
return $anio."-".$mes."-".$dia;
}

function cambiarFormatoFecha3($fecha){
list($dia,$mes,$anio)=explode("/",$fecha);
return $anio."-".$mes."-".$dia;
}



function getMonthDays($Month, $Year) 
{ 
   //Si la extensión que mencioné está instalada, usamos esa. 
   if( is_callable("cal_days_in_month")) 
   { 
      return cal_days_in_month(CAL_GREGORIAN, $Month, $Year); 
   } 
   else 
   { 
      //Lo hacemos a mi manera. 
      return date("d",mktime(0,0,0,$Month+1,0,$Year)); 
   } 
}



function total_clientes(){
	require('../controlador/Conexion.php');
	$sql = "select count(*) from clientes ";
	//echo $sql;
	$rs  = mysql_query($sql,$bd);
	@$row = mysql_fetch_array($rs);
	return utf8_encode($row[0]);
};
	


//USUARIOS

function campo_usuarios($login,$campo){
	require('../controlador/Conexion.php');
	$sql = "select $campo from usuarios where login = '$login' ";
	$rs  = mysql_query($sql,$bd);
	@$row = mysql_fetch_array($rs);
	return utf8_encode($row[0]);
};


function nombre_cliente($campo){
	require('../controlador/Conexion.php');
	$sql = "select nombre from clientes where id = '$campo' ";
	$rs  = mysql_query($sql,$bd);
	@$row = mysql_fetch_array($rs);
	return utf8_encode($row[0]);
};

function campo_cliente($id,$campo){
	require('../controlador/Conexion.php');
	$sql = "select $campo from clientes where id = '$id' ";
	$rs  = mysql_query($sql,$bd);
	@$row = mysql_fetch_array($rs);
	return utf8_encode($row[0]);
};

function campo_presu($id,$campo){
	require('../controlador/Conexion.php');
	$sql = "select $campo from presupuestos where id_presupuesto = '$id' ";
	$rs  = mysql_query($sql,$bd);
	@$row = mysql_fetch_array($rs);
	return utf8_encode($row[0]);
};



function campo_presu_mod($id,$campo,$item){
	require('../controlador/Conexion.php');
	$sql = "select $campo from presupuestos where id_presupuesto = '$id' and id_item = '$item' ";
	$rs  = mysql_query($sql,$bd);
	@$row = mysql_fetch_array($rs);
	return utf8_encode($row[0]);
};


function cantidad_presupuesto($campo){
	require('../controlador/Conexion.php');
	$sql = "select sum(precio_total) from presupuestos where id_presupuesto = '$campo' ";
	$rs  = mysql_query($sql,$bd);
	@$row = mysql_fetch_array($rs);
	return ($row[0]);
};


function cantidad_item($campo){
	require('../controlador/Conexion.php');
	$sql = "select count(id_item) from presupuestos where id_presupuesto = '$campo' ";
	$rs  = mysql_query($sql,$bd);
	@$row = mysql_fetch_array($rs);
	return ($row[0]);
};


function hora($login,$fecha,$campo){
	require('../controlador/Conexion.php');
	$sql = "select (hora) from ingresos_usuarios where usuario = '$login' and fecha = '$fecha' and acceso = 'Ingreso' order by id asc limit 1 ";
	//echo $sql;
	$rs  = mysql_query($sql,$bd);
	@$row = mysql_fetch_array($rs);
	return utf8_encode($row[0]);
};

function hora_salida($login,$fecha,$campo){
	require('../controlador/Conexion.php');
	$sql = "select (hora) from ingresos_usuarios where usuario = '$login' and fecha = '$fecha' and acceso = 'Salida' order by id desc limit 1 ";
	//echo $sql;
	$rs  = mysql_query($sql,$bd);
	@$row = mysql_fetch_array($rs);
	return utf8_encode($row[0]);
};


?>