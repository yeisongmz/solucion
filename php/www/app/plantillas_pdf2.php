<?php 
 include ("fpdf181/fpdf.php");
 include ("conexion/conectar.php");



class PDF extends FPDF
			{
			// Cabecera de página
			function Header()
			{

				//$this->Image('images/logo2.png',10,8,33);
				// Arial bold 15
				$this->SetFont('Arial','B',15);
				// Movernos a la derecha
				$this->Cell(80);
				// Título
				$this->Cell(30,10,html_entity_decode("PLANTILLA"),0,1,'C');
				// Salto de línea
				$this->Ln(2);
			}
			
			// Pie de página
			function Footer()
			{
				// Posición: a 1,5 cm del final
				$this->SetY(-15);
				// Arial italic 8
				$this->SetFont('Arial','I',8);
				// Número de página
				$this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,1,'C');
			}
			}
			
			$pdf = new PDF();
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont('Times','',12);
			$pdf->SetFillColor(0,0,0);
			
			$query2="SELECT * FROM plantillas where id='".$_GET['id']."' ";
			$resultado = mysql_query($query2,$con) ;
			$query4=mysql_fetch_array($resultado);
				$pdf->SetFillColor(184,180,180);
				$pdf->Cell(100,7,"Nombre: ".$query4['nombre'],0,1 , 'L',false);
				$pdf->Cell(100,7,"Descripcion",0,0 , 'L',true);
				$pdf->Cell(32,7,"Cantidad",0,0 , 'R',true);
				$pdf->Cell(32,7,"Frec. Repos.",0,0 , 'R',true);		
				$pdf->Ln();
				
				
$query2="SELECT * FROM deta_plantilla where plantillas_id='".$_GET['id']."' ";
$resultado = mysql_query($query2,$con) ;
$mat_detalle=array();$fila=0;
while($query4=mysql_fetch_array($resultado))
{
	$mat_detalle[$fila][0]=$query4['equipos_id'];
	$mat_detalle[$fila][1]=$query4['cantidad'];
	$mat_detalle[$fila][2]=$query4['frecuencia'];
	$query2B="SELECT * FROM equipos where id='".$query4['equipos_id']."' ";
	$resultadoB = mysql_query($query2B,$con) ;
	$query4B=mysql_fetch_array($resultadoB);
	$mat_detalle[$fila][4]=$query4B['descrip'];
	$fila++;
}
				
				
				for($i=0;$i<count($mat_detalle);$i++)
				{
					$pdf->Cell(100,7,utf8_decode($mat_detalle[$i][4]),1,0,false);
					$pdf->Cell(32,7,number_format($mat_detalle[$i][1],'0',',','.'),1,0 , 'R' );
					$pdf->Cell(32,7,$mat_detalle[$i][2],1,1,'R',false);

				}
				
				$pdf->Output();
				