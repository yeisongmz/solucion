<?php
include ("fpdf181/fpdf.php"); include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
//$equipos= explode("--",$_GET['equipos']);
//$origenes= explode("--",$_GET['origenes']);
//$destinos= 13;//explode("--",$_GET['destinos']);
//$cantidades= explode("--",$_GET['cantidades']);
//$desde="2021-01-01";//date('d-m-Y');
//$hasta="2021-10-01";//date('d-m-Y');
if(isset($_GET['id']))
{
	$opcion=$_GET['opcion'];
	if($opcion==1)
	{
		
	}
	if($opcion==2)
	{
		
	}
	if($opcion==3)
	{
		
	}
	if($_GET['id']=="0")
	{
		$query2="SELECT * FROM ubicacion_dep where  id in (select Ubicacion_dep_id from stock)  order by ubicacion";
	}
	else
	{
		$query2="SELECT * FROM ubicacion_dep where id='".$_GET['id']."' and  id in (select Ubicacion_dep_id from stock)  order by ubicacion";
	}
$resultado = mysql_query($query2,$con) ;
$mat=array();$fila=0;
while($query4=mysql_fetch_array($resultado))
{
	$mat[$fila][0]=$query4['id'];
	$mat[$fila][1]=str_replace('"',"",$query4['ubicacion']);
	$mat[$fila][2]="";
	$mat[$fila][3]="";
	$fila++;
}

$pdf = new FPDF();

$pdf->AddPage('P','Legal');
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
			$pdf->AddPage('P','A4');
			$pdf->SetFont('Times','',12);
			$pdf->SetFillColor(219,219,219);
			/*$aux = explode("-",$desde);	
			$pdf->Cell(40,7,"Desde : ".$aux[2].'/'.$aux[1].'/'.$aux[0],0,1 , 'L',false);
			$aux = explode("-",$hasta);	
			$pdf->Cell(40,7,"Hasta  : ".$aux[2].'/'.$aux[1].'/'.$aux[0],0,1 , 'L',false);			
			$pdf->Cell(40,7,"Detalle de movimientos de equipos",0,1 , 'L',false);
			$pdf->Ln(2);
			$pdf->Cell(75,7,"EQUIPO",1,0 , 'L',false);
			$pdf->Cell(75,7,"ORIGEN",1,0 , 'L',false);
			$pdf->Cell(75,7,"DESTINO",1,0 , 'L',false);
			$pdf->Cell(20,7,"CANT.",1,0 , 'R',false);
			$pdf->Cell(20,7,"FECHA",1,1 , 'R',false);*/
			$pdf->Cell(40,7,"STOCK POR CLIENTE/DEPOSITO",0,1 , 'L',false);
			$pdf->Cell(40,7,"Fecha : ".date('d/m/Y'),0,1 , 'L',false);
		$pdf->SetFont('Arial','',8);
		$pdf->SetX(30);
for($i=0;$i<$fila;$i++)
{
	
	$pdf->Cell(110,7,"",0,1 , 'L',false);
	$pdf->Cell(110,7,"",0,1 , 'L',false);
	$pdf->SetX(30);
	$pdf->SetFont('Arial','b',10);
	$pdf->Cell(110,7,$mat[$i][1],0,1 , 'L',false);
	$pdf->SetFont('Arial','',8);
	$pdf->SetX(30);
	$pdf->Cell(75,7,"EQUIPO",1,0 , 'L',true);
	$pdf->Cell(20,7,"CANTIDAD",1,1 , 'L',true);
	if($opcion==1)
	{
		$query2="SELECT * FROM stock where Ubicacion_dep_id='".$mat[$i][0]."' ";
	}
	if($opcion==2)
	{
		$query2="SELECT * FROM stock where Ubicacion_dep_id='".$mat[$i][0]."' and equipos_id in (select id from equipos  where tipo='Herramienta' or tipo='Maquinaria')";
	}
	if($opcion==3)
	{
		$query2="SELECT * FROM stock where Ubicacion_dep_id='".$mat[$i][0]."' and equipos_id in (select id from equipos  where tipo='Insumo' )";
	}
	//echo $query2;
	$resultado = mysql_query($query2,$con) ;
	while($query4=mysql_fetch_array($resultado))
	{
		$query2b="SELECT descrip FROM equipos where id='".$query4['equipos_id']."' ";
		$resultadob = mysql_query($query2b,$con) ;
		$query4b=mysql_fetch_array($resultadob);
		$pdf->SetX(30);
		$pdf->Cell(75,7,$query4b['descrip'],1,0 , 'L',false);
		$pdf->Cell(20,7,$query4['cantidad'],1,1 , 'R',false);
	}
	
	
	
	
}
$pdf->Output();
}
?>