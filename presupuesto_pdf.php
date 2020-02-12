<?php
require('FPDF/fpdf.php');

class PDF extends FPDF
{
    function RoundedRect($x, $y, $w, $h, $r, $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
        $xc = $x+$w-$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

        $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
        $xc = $x+$w-$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x+$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }

function Header()
{
$this->SetLeftMargin(15); 

if(isset($_GET['id'])){ $id = $_GET['id']; }else{ $id = ""; }
if(isset($_GET['t'])){ $t = $_GET['t']; }else{ $t = ""; }
	
#Establecemos los márgenes izquierda, arriba y derecha: 

	require('controlador/Conexion.php');
	require_once('funciones/funciones.php');
	$sql = "SELECT *
	FROM presupuestos where id_presupuesto = '$id'  ";
	$q_reporte = mysqli_query($sql,$bd);   
	$reporte = mysqli_fetch_array($q_reporte);
	$cliente = utf8_decode(nombre_cliente($reporte["id_cliente"],'nombre'));
	$rif = utf8_decode(campo_cliente($reporte["id_cliente"],'rif_cedula'));
	$direccion = utf8_decode(campo_cliente($reporte["id_cliente"],'direccion'));
	$tlf = utf8_decode(campo_cliente($reporte["id_cliente"],'telefonos'));
	
    // Logo
	if($t == 'F'){
	}else{
    $this->Image('FPDF/LOGO.png',15, 5, 175, 50,'PNG');
    $this->SetFont('Arial','',10);
    //$this->Cell(179,24,'FECHA: '.$fecha_sol,0,0,'R');
    $this->Ln(43);
	}
	
    $this->SetFont('Arial','B',13);
	if($t == 'P'){
    $this->Cell(190, 12,'PRESUPUESTO N° ',0, 2,'L');
    $this->Cell(190, -12,cambiarformatofecha($reporte["fecha_crea"]),0, 2,'R');
	}elseif($t == 'N'){
    $this->Cell(190, 12,'NOTA DE ENTREGA N° '.$reporte["numero"],0, 2,'L');
    $this->Cell(190, -12,cambiarformatofecha($reporte["fecha_crea"]),0, 2,'R');
	}elseif($t == 'F'){
    $this->Cell(190, 12,'FACTURA N° '.$reporte["numero_factura"],0, 2,'L');
    $this->Cell(190, -12,cambiarformatofecha($reporte["fecha_crea"]),0, 2,'R');
	}
    //$this->Cell(330, 20,cambiarformatofecha($reporte["fecha_crea"]),1, 5,'C');
    //$this->Cell(45, 20,'PRESUPUESTO N°: '.$reporte["numero"],0, 1,'L');
    $this->SetFont('Arial','B',12);
	if($t == 'F' || $t == 'N'){
    $this->Ln(10);
	}else{
    $this->Ln(10);
	}
	
    $this->SetFont('Arial','B',10);
    $this->Cell(190, 40,'',0, 0,'C');
    $this->Ln(5);
    $this->Cell(200, 0,'CLIENTE:  '.strtoupper($cliente),45, 5,'L');
    $this->Cell(335, 0,'TÉCNICO',145, 5,'C');
    $this->Ln(6);
	
    $this->SetFont('Arial','B',10);
    $this->Cell(200, 0,'RIF / CEDULA:  '.strtoupper($rif),45, 5,'L');
    $this->SetFont('Arial','',10);
    $this->Cell(335, 0,'Prueba SAVCA',145, 5,'C');
    $this->Ln(6);
	
    $this->SetFont('Arial','B',10);
    $this->Cell(200, 0,'DIRECCIÓN:  '.strtoupper($direccion),45, 5,'L');
    $this->SetFont('Arial','',10);
    $this->Cell(335, 0,'18.040.727',145, 5,'C');
    $this->Ln(6);
	
    $this->SetFont('Arial','B',10);
    $this->Cell(200, 0,'TELÉFONOS:  '.$tlf,45, 5,'L');
    $this->Ln(7);
	
	
    $this->Cell(190, 15,'',0, 0,'C');
    $this->Ln(3);
	$w = array(105, 30, 28, 30);
	$this->SetFont('Arial','B',11);
	$this->Cell($w[0],5,'DESCRIPCIÓN',0,0,'L');
	$this->Cell($w[1],5,'CANTIDAD',0,0,'C');
	$this->Cell($w[2],5,'UNITARIO',0,0,'C');
	$this->Cell($w[3],5,'NETO',0,0,'C');
    $this->Ln(8);
}



// PRESUPUESTO
function ImprovedTable($header, $data)
{
		{	
	
		require('controlador/Conexion.php');
		require_once('funciones/funciones.php');
		
		if(isset($_GET['id'])){ $id = $_GET['id']; }else{ $id = ""; }
				
		//PRESUPUESTO
		$sql_detalle = "SELECT *
		FROM presupuestos 
		where id_presupuesto = '$id' order by id_item asc ";
		//echo $sql_detalle;
		$q_reporte_detalle = mysqli_query($sql_detalle,$bd); 
		$resultado = mysqli_num_rows($q_reporte_detalle);  
		//echo $resultado;
		 
		if($resultado > '0'){
		 
		$i = 0; 
		
		// Anchuras de las columnas
		$w = array(105, 30, 28, 30);
    	$this->SetFont('Arial','',9);
		
		while($reporte_detalle = mysqli_fetch_array($q_reporte_detalle)){
		
		$this->Cell($w[0],5,strtoupper($reporte_detalle["desc_item"]),'0',0,'L');
				
    	$this->SetFont('Arial','',9);
		$this->Cell($w[1],5," ".strtoupper($reporte_detalle["cantidad"]).'','0',0,'C');
		
    	$this->SetFont('Arial','',9);		
		$this->Cell($w[2],5," ".number_format($reporte_detalle["precio"], 0, ',', '.').'','0',0,'C');
		
    	$this->SetFont('Arial','',9);		
		$this->Cell($w[3],5," ".number_format($reporte_detalle["precio"]*$reporte_detalle["cantidad"], 0, ',', '.').'','0',0,'C');
		
		$this->Ln(7);
		
		$i++; 
		}
		
		$this->Cell(array_sum($w),0,'','0');
		//$this->Ln();
		
		
		}
	}
	// Línea de cierre
}

// PRESUPUESTO FINAL
function ImprovedTablePrecio($header, $data)
{
		{	
		
		require('controlador/Conexion.php');
		require_once('funciones/funciones.php');
		
		if(isset($_GET['id'])){ $id = $_GET['id']; }else{ $id = ""; }
		
		$sql_detalle = "SELECT *
		FROM presupuestos 
		where id_presupuesto = '$id' ";
		//echo $sql_detalle;
		$q_reporte_detalle = mysqli_query($sql_detalle,$bd); 
		$resultado = mysqli_num_rows($q_reporte_detalle);  
		$reporte_detalle = mysqli_fetch_array($q_reporte_detalle);
		 
		if($resultado > '0'){
	
			//$this->Ln(3);
			
			if($reporte_detalle["moneda"] == 'Bolivares'){
			//$this->Cell(60, 30,'',1, 0,'R');
			}else{
			//$this->Cell(190, 20,'',1, 0,'C');
			}
			$this->Ln(6);
			
			
			
			$this->SetFont('Arial','B',10);
			$this->Cell(250, 0,'SUB-TOTAL:'.$tlf,45, 5,'C');
			$this->SetFont('Arial','',10);
			$this->Cell(330, 0,''.number_format(cantidad_presupuesto($id), 0, ',', '.').' '.$reporte_detalle["moneda"],45, 5,'C');
			$this->Ln(10);
			
			if($reporte_detalle["moneda"] == 'Bolivares'){
			$this->SetFont('Arial','B',10);
			$this->Cell(250, 0,'I.V.A. ('.$reporte_detalle["iva"].'%):',45, 5,'C');
			$this->SetFont('Arial','',10);
			$this->Cell(330, 0,''.number_format((cantidad_presupuesto($id)*0.12), 0, ',', '.').' '.$reporte_detalle["moneda"],45, 5,'C');
			$this->Ln(10);
			}
			
			$this->SetFont('Arial','B',10);
			$this->Cell(250, 0,'NETO:'.$tlf,45, 5,'C');
			$this->SetFont('Arial','',10);
			if($reporte_detalle["moneda"] == 'Bolivares'){
			$this->Cell(330, 0,''.number_format(cantidad_presupuesto($id)+(cantidad_presupuesto($id)*0.12), 0, ',', '.').' '.$reporte_detalle["moneda"],45, 5,'C');
			}else{
			$this->Cell(330, 0,''.cantidad_presupuesto($id).' '.$reporte_detalle["moneda"],45, 5,'C');
			}
			
			$this->Ln(10);
		}
		
	}
	// Línea de cierre
}


}


$pdf = new PDF();
$pdf->SetFont('Arial','',8);
$pdf->AliasNbPages();
$pdf->AddPage();

require('controlador/Conexion.php');
$sql_detalle = "SELECT *
FROM presupuestos 
where id_presupuesto = '$id' order by id_item asc ";
$q_reporte_detalle = mysqli_query($sql_detalle,$bd); 
$resultado = mysqli_num_rows($q_reporte_detalle);
if($resultado == '1'){
$alto = 0;
}else{  
$alto = (7*$resultado)-7;
}
//echo $alto;
//$pdf->SetFillColor(192);
if($t == 'F'){
//$pdf->RoundedRect(15, 9, 190, 12, 3, '13','');
$pdf->RoundedRect(15, 20, 142, 28, 3, '13','');
$pdf->RoundedRect(160, 20, 45, 28, 3, '13','');
$pdf->RoundedRect(15, 50, 190, 10, 3, '13','');
//$pdf->RoundedRect(120, 140, 85, 30, 3, '13','');
$pdf->RoundedRect(120, 70+$alto, 85, 28, 3, '13','');
}else{
//$pdf->RoundedRect(15, 53, 190, 12, 3, '13','');
$pdf->RoundedRect(15, 63, 142, 28, 3, '13','');
$pdf->RoundedRect(160, 63, 45, 28, 3, '13','');
$pdf->RoundedRect(15, 93, 190, 10, 3, '13','');


$pdf->RoundedRect(120, 113+$alto, 85, 28, 3, '13','');
}	

$pdf->ImprovedTable($header,$data);
$pdf->ImprovedTablePrecio($header,$data);
$pdf->Output();
?>