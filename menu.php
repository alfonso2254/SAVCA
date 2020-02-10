<?php 	
require_once('funciones.php');
$login = $_SESSION["login"];
date_default_timezone_set('America/Caracas');
$fecha = date('d/m/Y');
?>
<style type="text/css">
<!--
.Estilo1 {
	font-family: "Courier New", Courier, monospace;
	font-size: 24px;
	font-weight: bold;
	color: #FFFFFF;
}
-->
</style>

<header class="header fixed-top clearfix">

<div class="brand">

    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
	
    <a href="panel.php" class="Estilo1"><div align="center" style="margin-top:5px;">PHOENIX<BR>SECURITY</div></a>
</div>
<!--logo end-->


<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
		<form class="cmxform form-horizontal " id="commentForm" method="post" action="perfil.php" autocomplete=off>
		<input type="text" class="form-control search" id="busq" name="busq" placeholder=" Buscar Cliente">
		</form>
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/logo.png">
                <span class="username"><? echo utf8_encode($nombre); ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <!--<li><a href="#"><i class=" fa fa-suitcase"></i>Perfil</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>-->
				<?php if( ($rank == 'Administrador' ) || ($cargo == 'Administrador' || $cargo == 'Supervisor') ){ ?>
                <li><a href="cambiar_clave.php?login=<? echo ($login); ?>"><i class="fa fa-cog"></i> Cambiar Clave</a></li>
				<? }else{}?>
                <li><a href="cerrar_sesion.php"><i class="fa fa-key"></i> Cerrar Sesi&oacute;n</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        <!--<li>
            <div class="toggle-right-box">
                <div class="fa fa-bars"></div>
            </div>
        </li>-->
    </ul>
</div>
</header>

<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">

                <li>
                    <a class="active" href="panel.php">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span></a>
                </li>
                  
                <?
				$resultado1 = permisos('AGREGAR_CLIENTES',$login);
				$resultado2 = permisos('VER_CLIENTES',$login);
				if($resultado1 == '1' || $resultado2 == '1'){
				?>         
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Clientes</span></a>
                    <ul class="sub">
						<?
                        $resultado = permisos('AGREGAR_CLIENTES',$login);
                        if($resultado == '1'){
                        ?>
                        <li><a href="registro_cliente.php">Agregar Cliente</a></li>
                        <? }else{}?>
						<?
                        $resultado = permisos('VER_CLIENTES',$login);
                        if($resultado == '1'){
                        ?> 
                        <li><a href="ver_clientes.php">Ver Clientes</a></li>
						<? }else{}?> 
                    </ul>
                </li>
                <? }else{}?> 
				
				<?
				$resultado1 = permisos('AGREGAR_CLIENTES',$login);
				$resultado2 = permisos('VER_CLIENTES',$login);
				if($resultado1 == '1' || $resultado2 == '1'){
				?>         
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i>
                        <span>Presupuestos</span></a>
                    <ul class="sub">
						<?
                        $resultado = permisos('AGREGAR_PRESUPUESTO',$login);
                        if($resultado == '1'){
                        ?>
                        <li><a href="registro_presupuesto.php">Agregar Presupuesto</a></li>
                        <? }else{}?>
						<?
                        $resultado = permisos('VER_PRESUPUESTOS',$login);
                        if($resultado == '1'){
                        ?> 
                        <li><a href="ver_presupuestos.php">Ver Presupuestos</a></li>
                        <li><a href="ver_reporte_presupuesto.php">Ver Reporte de Presupuestos</a></li>
						<? }else{}?> 
                    </ul>
                </li>
                <? }else{}?>
                
                <?
				$resultado1 = permisos('AGREGAR_USUARIOS',$login);
				$resultado2 = permisos('VER_USUARIOS',$login);
				$resultado3 = permisos('DAR_PERMISOS',$login);
				$resultado4 = permisos('QUITAR_PERMISOS',$login);
				if($resultado1 == '1' || $resultado2 == '1' || $resultado3 == '1' || $resultado4 == '1'){
				?> 
  				<li class="sub-menu"> 	
                    <a href="#">
                        <i class="fa fa-desktop"></i>
                        <span>Usuarios</span></a>
                    <ul class="sub">
						<?
                        $resultado = permisos('AGREGAR_USUARIOS',$login);
                        if($resultado == '1'){
                        ?> 
                        <li><a href="registro_usuarios.php">Agregar Usuario</a></li>
						<? }else{}?>
						<?
                        $resultado = permisos('VER_USUARIOS',$login);
                        if($resultado == '1'){
                        ?>  
                        <li><a href="ver_usuarios.php">Ver Usuarios</a></li>
						<? }else{}?>
						
						<?
                        $resultado = permisos('DAR_PERMISOS',$login);
                        if($resultado == '1'){
                        ?>  
                        <li><a href="asignar_permisos.php">Dar Permisos a Usuarios</a></li>
						<? }else{}?>
						<?
                        $resultado = permisos('QUITAR_PERMISOS',$login);
                        if($resultado == '1'){
                        ?>  
                        <li><a href="quitar_permisos.php">Quitar Permisos a Usuarios</a></li>
						<? }else{}?> 
						
						
                    </ul>
                </li>
                <? }else{}?>
                
                
                <li>
                    <a href="ver_facturados.php">
                        <i class="fa fa-file-text-o"></i>
                        <span>Facturados</span></a>
                </li>
                
                
                <li>
                    <a href="cambiar_clave.php?login=<? echo ($login); ?>">
                        <i class="fa fa-key"></i>
                        <span>Cambio de Clave</span></a>
                </li>
                
                
                <li>
                    <a href="cerrar_sesion.php">
                        <i class="fa fa-key"></i>
                        <span>Cerrar Sesi&oacute;n</span></a>
                </li>
                
            </ul>
            
            </div>
    </div>
</aside>