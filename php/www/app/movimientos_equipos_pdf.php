<?php
include ("fpdf181/fpdf.php");
$equipos= explode("--",$_GET['equipos']);
$origenes= explode("--",$_GET['origenes']);
$destinos= explode("--",$_GET['destinos']);
$cantidades= explode("--",$_GET['cantidades']);
$fecha=date('d-m-Y');
$pdf = new FPDF();

$pdf->AddPage('L','Legal');
$pdf->SetFont('Arial','',12);

	
class PDF extends FPDF
			{
			// Cabecera de página
			function Header()
			{

				$this->Image('images/logo2.png',10,8,33);
				// Arial bold 15
				$this->SetFont('Arial','B',15);
				// Movernos a la derecha
				$this->Cell(80);
				// Título
				$this->Cell(30,10,'',0,0,'C');
				// Salto de línea
				$this->Ln(20);
			}
			
			// Pie de página
			function Footer()
			{
				// Posición: a 1,5 cm del final
				$this->SetY(-15);
				// Arial italic 8
				$this->SetFont('Arial','I',8);
				// Número de página
				$this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
			}
			}
			
			
			
			$pdf = new PDF();
			$pdf->AliasNbPages();
			$pdf->AddPage('L','Legal');
			$pdf->SetFont('Times','',12);
			$pdf->SetFillColor(0,0,0);
			$pdf->Cell(40,7,$fecha,0,1 , 'L',false);			
			$pdf->Cell(40,7,"Detalle de movimientos de equipos",0,1 , 'L',false);
			$pdf->Ln(2);
			$pdf->Cell(80,7,"EQUIPO",1,0 , 'L',false);
			$pdf->Cell(120,7,"ORIGEN",1,0 , 'L',false);
			$pdf->Cell(120,7,"DESTINO",1,0 , 'L',false);
			$pdf->Cell(20,7,"CANT.",1,1 , 'R',false);
		$pdf->SetFont('Arial','',8);



for($i=0;$i<count($equipos)-1;$i++)
{
	$pdf->Cell(80,7,$equipos[$i],1,0 , 'L',false);
	$pdf->Cell(120,7,$origenes[$i],1,0 , 'L',false);
	$pdf->Cell(120,7,$destinos[$i],1,0 , 'L',false);
	$pdf->Cell(20,7,$cantidades[$i],1,1 , 'R',false);		
	
}
$pdf->Output();
?>