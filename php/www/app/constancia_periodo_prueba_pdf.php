<?php include ("fpdf181/fpdf.php");
 include ("conexion/conectar.php");
$x= explode("--",$_GET['id']);
$id=$x[0];
$fecha=$_GET['fecha'];
$inicio=$_GET['inicio'];
$fin=$_GET['fin'];
$docu=$_GET['docu'];
$apellidos= '';
$nombre= '';
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','',12);

	$query2="select * from personal where id='".$id."' " ;
	$res=mysql_query($query2,$con);
					
					while($query4 = mysql_fetch_array($res) )
						{
							$apellidos= $query4['apellidos'];
							$nombre= $query4['nombres'];
							
						}
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
			$pdf->AddPage();
			$pdf->SetFont('Times','',12);
			$pdf->SetFillColor(0,0,0);
			
			$pdf->Cell(40,7,"Asuncion,".$fecha,0,1 , 'L',false);
			$pdf->Cell(40,7,"Sr./Sra.: ".$nombre."  ".$apellidos,0,1 , 'L',false);
			$pdf->SetFont('Arial','U'); 
			$pdf->Cell(40,20,"Presente",0,1 , 'LU',false);
			$pdf->SetFont('Arial',''); 
			$pdf->Cell(40,5,"Le comunicamos que su periodo de prueba tiene una duracion de 60 dias, iniciando el dia ".$inicio,0,1 , 'L',false);
			$pdf->Cell(40,5,"con fecha de culminacion el dia ".$fin,0,1 , 'L',false);
			$pdf->Ln(20);
			$pdf->Cell(40,10,"Firma.............................................",0,1 , 'L',false);
			$pdf->Cell(60,10,"C.I.:".$docu,0,1 , 'C',false);
		

$pdf->Output();

?>