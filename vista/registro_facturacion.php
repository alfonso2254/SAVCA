<?php 
//ini_set("session.cookie_lifetime","36000");	
session_start();

//Inicio de variable de session para cerrar despues de 15 min
//if (!isset($_SESSION['nombre_conectado_visa'])) {
//header("Location: index.php");
//}

//fin


date_default_timezone_set('America/Caracas');
//$nombre = $_SESSION["nombre_conectado_visa"];
$usuario = $_SESSION["usuario"];
$cargo = $_SESSION["cargo"];
$accion = $_GET["accion"];	

require_once('../funciones/funciones.php');
$resultado = permisos('AGREGAR_PRESUPUESTO',$login);
if($resultado == '0');

$accion_reg = isset($_POST["accion_reg"]);

if($accion_reg == 'GUARDAR_SOLICITUD'){

require_once('../funciones/funciones.php');

require('../controlador//Conexion.php'); 
$sql_categoria ="select MAX(id_presupuesto) from presupuestos where id_presupuesto != ''";
$q_categoria  = mysql_query($sql_categoria,$con);
$categoria = mysql_fetch_array($q_categoria);
$id_presu = $categoria[0]+1;

for ($i=1;$i<=30;$i++){

$id_cliente = utf8_decode($_POST['id_cliente' ]);
$desc_item = utf8_decode($_POST['desc_item' . $i]);
$cantidad = ($_POST['cantidad' . $i]);
$precio = ($_POST['precio' . $i]);
$precio_total = $precio*$cantidad;
$moneda = utf8_decode($_POST['moneda']);

if($moneda == 'Dolares'){
$iva = "";
}else{
$iva = ($_POST['iva']);
}


$fecha_m = date('Y-m-d');
$hora_crea = date('h:i:s a',strtotime("-30 minute"));

list($anio,$mes,$dia)=explode("-",$fecha_m);
$fec = $anio.$mes.$dia;

$numero = $fec.$id_presu;

if($_POST["id_cliente" ] != '' && $_POST['desc_item' . $i] != '' && $_POST['cantidad' . $i] != '' && $_POST['precio' . $i] != ''  && $_POST['moneda'] != ''){
		
		require('../controlador/Conexion.php');

		$sql="INSERT INTO presupuestos (id_presupuesto, numero, id_cliente, id_item, desc_item, cantidad, precio, precio_total, iva, moneda, fecha_crea, hora_crea, usuario_crea";
		$sql = $sql." ) VALUES ('$id_presu', '$numero', '$id_cliente', '$i', '$desc_item', '$cantidad', '$precio', '$precio_total', '$iva', '$moneda', '$fecha_m', '$hora_crea', '$login')";	
		//echo $sql;
		$q_registro = mysql_query($sql,$con);

		if ($q_registro == true){	
		print '<script language="JavaScript">';
		print 'alert("El Presupuesto fue agregado exitosamente");';	
		print "location.href = 'ver_presupuestos.php';"; 	 	 
		print '</script>';
		} else {
		print '<script language="JavaScript">';
		print 'alert("No se pudo guardar el registro.");';
		print 'location.href=("registro_facturacion.php");';	 	 
		print '</script>';
		} 


}
}
		
		
		}// FIN IF VERIFICAR USUARIO EXISTE
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    
    <link rel="shortcut icon" href="images/logo.png">
    <title>PHOENIX SECURITY | REGISTRAR PRESUPUESTO</title>

    <!--Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

<script type="text/javascript" language="javascript">
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return ((key >= 48 && key <= 57) || (key==46)) 
}

function ver_iva(id){
		if(id == 'Bolivares'){
			document.getElementById("iva").disabled  = false;
			}else{
			document.getElementById("iva").disabled  = true;
			}
		}
</script>    
</head>

<body>

<section id="container" >


<? include('../vista/menu_izquierdo.php');  ?>

    <section id="main-content">
        <section class="wrapper">
           
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h4>Agregar Presupuesto</h4> 
							
							
                              <!--<span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>-->
                            
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                            
						<form name="form1" id="form1" autocomplete="off" method="post" >
						
						<div class="form-group ">
                                <div class="col-lg-8"><label for="nombre" >CLIENTE</label>
									<select class="form-control m-bot15" id="id_cliente" name="id_cliente" required>
									<option value="" >Seleccionar Cliente</option>
									<?php
									require('../controlador/Conexion.php'); 
									$sql_categoria ="select * from clientes where nombre != '' order by nombre asc";
									$q_categoria  = mysql_query($sql_categoria,$con);
									while ( $categoria = mysql_fetch_array($q_categoria)) { 
									$campo = $categoria["id"];
									$campo1 = $categoria["nombre"];
									$campo2 = $categoria["rif_cedula"]; ?>
									<option value="<?php echo utf8_encode($campo); ?>" <? if ($campo==$est) { ?> selected <? } ?>><? echo "Nombre: ".utf8_encode($campo1).". Rif/Cedula: ".$campo2; ?></option>
									<?php };?>
									</select>
								  
								  </div> 
								  
								  <div class="col-lg-2"><label for="nombre" >MONEDA</label>
                                            <select class="form-control m-bot15" id="moneda" name="moneda" required onChange="ver_iva(this.value);" >
                                            <option value="" >Seleccionar</option>
                                            <?php
                                            require('./controlador/Conexion.php'); 
                                            $sql_categoria ="select moneda from categorias where moneda != '' order by moneda asc";
                                            $q_categoria  = mysql_query($sql_categoria,$con);
                                            while ( $categoria = mysql_fetch_array($q_categoria)) { 
                                            $campo = $categoria["moneda"]; ?>
                                            <option value="<?php echo utf8_encode($campo); ?>" <? if ($campo==$est) { ?> selected <? } ?>><? echo utf8_encode($campo); ?></option>
                                            <?php };?>
                                            </select>
                                  </div>
                                        
									<div class="col-lg-2"><label for="iva" >IVA</label>
										<input class="form-control m-bot15" id="iva" name="iva" minlength="2" type="text" value="" disabled="disabled" onKeyPress="return soloNumeros(event);"  maxlength="5" />
										
									</div>
										
								  </div> 
                                    
										
									<div class="form-group ">
								
									<div class="col-lg-1" align="center"><label for="nombre" >ID</label></div>
								
									<div class="col-lg-6" align="center"><label for="nombre">DESCRIPCIÓN DEL ITEM</label></div>
									
									<div class="col-lg-2" align="center"><label for="nombre">CANTIDAD</label></div>
									
									<div class="col-lg-3" align="center"><label for="nombre">PRECIO</label></div>
									
									</div>
											
									<div class="form-group">
									<?php for ( $i = 1 ; $i <= 15 ; $i ++) { ?>
										
										
                                    
                                        <div class="col-lg-1" style="height:40px;">
                                            <input class="form-control" id="id_item<? echo $i; ?>" name="id_item<? echo $i; ?>" minlength="2" type="text" value="<? echo $i; ?>" readonly  style="text-align:center" />
                                        </div>
                                    
                                        <div class="col-lg-6" style="height:40px;">
                                            <input class=" form-control" id="desc_item<? echo $i; ?>" name="desc_item<? echo $i; ?>" minlength="2" type="text" maxlength="50" />
                                        </div>
                                        
                                        <div class="col-lg-2" style="height:40px;">
                                            <input class=" form-control" id="cantidad<? echo $i; ?>" name="cantidad<? echo $i; ?>" minlength="1" type="text" onKeyPress="return soloNumeros(event);" maxlength="6"/>
                                        </div>
                                        
                                        <div class="col-lg-3" style="height:40px;">
                                            <input class=" form-control" id="precio<? echo $i; ?>" name="precio<? echo $i; ?>" minlength="1" type="text" onKeyPress="return soloNumeros(event);" maxlength="10"   />
                                        </div>	
										
                                    <?php };?>
                                        
                                        </div>
										
										
										
                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-7"><br>
                                            <button class="btn btn-primary" type="submit">Guardar</button>
                                        </div>
                                    </div>
									
									<input type="hidden" name="accion_reg" id="accion_reg" size="15" value="GUARDAR_SOLICITUD"/>
                                   
								   </form>
                                    
                              
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            
        </section>
    </section>


</section>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script src="js/validation-init.js"></script>
<script src="js/advanced-form.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

</body>
</html>
