<?php 
include ("fpdf181/fpdf.php"); include ("conexion/conectar.php");
date_default_timezone_set('America/Bahia');
//$sucdestino_id= $_GET['sucdestino_id'];//'39';
//$desde= $_GET['desde'];//"2021-06-01";
//$hasta=$_GET['hasta'];//"2021-08-30";
$query2="select * from remision where numero='10975' ";
$resultado = mysql_query($query2,$con) ;
echo $query2.'<br>';
$matriz=array();$fi=0;
$a="";$a1="";$a2="";
$id="";
while($query4=mysql_fetch_array($resultado))
{
	$id= $query4['id']; 
}
$query2="select * from remisiondeta where Remision_id='$id' ";
echo $query2.'<br>';
$resultado2= mysql_query($query2,$con) ;
while($query4=mysql_fetch_array($resultado2))
{
	$matriz[$fi][0]=$query4['equipos_id'];
	$matriz[$fi][1]=$query4['dsc_producto'];
	$matriz[$fi][2]=$query4['cantidad'];
	$matriz[$fi][3]=$query4['unidadMed'];
	
	echo $matriz[$fi][0].';'.$matriz[$fi][1].';'.$matriz[$fi][2].';'.$matriz[$fi][3].'<br>';
	$fi++;	
}

/*$pdf = new FPDF();
$pdf->AddPage('L','Legal');
$pdf->SetFont('Arial','',12);



class PDF extends FPDF
			{
			// Cabecera de página
			function Header()
			{

				
				$this->SetFont('Arial','B',12);
				$this->Ln(3);
				
				// Título
				
			
							
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
			}*/