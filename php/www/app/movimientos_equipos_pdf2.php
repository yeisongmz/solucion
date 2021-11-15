<?php
include ("fpdf181/fpdf.php"); include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
//$equipos= explode("--",$_GET['equipos']);
//$origenes= explode("--",$_GET['origenes']);
if(isset($_GET['id']))
{
$destinos= 13;//explode("--",$_GET['destinos']);
//$cantidades= explode("--",$_GET['cantidades']);
$desde=$_GET['desde'];//"2021-01-01";//date('d-m-Y');
$hasta=$_GET['hasta'];//"2021-10-01";//date('d-m-Y');

$pdf = new FPDF();

$pdf->AddPage('P','A4');
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
			$pdf->AddPage('L','A4');
			$pdf->SetFont('Times','',12);
			$pdf->SetFillColor(0,0,0);
			$aux = explode("-",$desde);	
			$pdf->Cell(40,7,"Desde : ".$aux[2].'/'.$aux[1].'/'.$aux[0],0,1 , 'L',false);
			$aux = explode("-",$hasta);	
			$pdf->Cell(40,7,"Hasta  : ".$aux[2].'/'.$aux[1].'/'.$aux[0],0,1 , 'L',false);			
			$pdf->Cell(40,7,"Detalle de movimientos de equipos",0,1 , 'L',false);
			$pdf->Ln(2);
			$pdf->Cell(75,7,"EQUIPO",1,0 , 'L',false);
			$pdf->Cell(75,7,"ORIGEN",1,0 , 'L',false);
			$pdf->Cell(75,7,"DESTINO",1,0 , 'L',false);
			//$pdf->Cell(20,7,"CANT.",1,0 , 'R',false);
			$pdf->Cell(20,7,"FECHA",1,1 , 'R',false);
		$pdf->SetFont('Arial','',8);
		if($_GET['id']=="0")
		{
			$query2="SELECT * FROM mov_equipo where fecha>='$desde' and fecha<='$hasta' and (tipo='Maquinaria' or tipo='Herramienta') order by fecha";
			$resultado = mysql_query($query2,$con) ;
		}
		else
		{
			$query2="SELECT * FROM mov_equipo where fecha>='$desde' and fecha<='$hasta' and (tipo='Maquinaria' or tipo='Herramienta') and equipos_id='".$_GET['id']."' order by fecha";
			$resultado = mysql_query($query2,$con) ;
		}
						
										



while($query4=mysql_fetch_array($resultado))
{
	$query2b="SELECT descrip FROM equipos where id='".$query4['equipos_id']."'  ";
    $resultadob = mysql_query($query2b,$con) ;
	$query4b=mysql_fetch_array($resultadob);
	$pdf->Cell(75,7,$query4b['descrip'],1,0 , 'L',false);
	
	$query2b="SELECT ubicacion FROM ubicacion_dep where id='".$query4['idubic_origen']."'  ";
    $resultadob = mysql_query($query2b,$con) ;
	$query4b=mysql_fetch_array($resultadob);
	
	$pdf->Cell(75,7,$query4b['ubicacion'],1,0 , 'L',false);
	
	$query2b="SELECT ubicacion FROM ubicacion_dep where id='".$query4['idubic_destino']."'  ";
    $resultadob = mysql_query($query2b,$con) ;
	$query4b=mysql_fetch_array($resultadob);
	
	$pdf->Cell(75,7,$query4b['ubicacion'],1,0 , 'L',false);
	//$pdf->Cell(20,7,$query4['cantidad'],1,0 , 'R',false);
	$aux = explode("-",$query4['fecha']);	
	$pdf->Cell(20,7,$aux[2].'/'.$aux[1].'/'.$aux[0],1,1 , 'R',false);		
	
}
$pdf->Output();
}
?>