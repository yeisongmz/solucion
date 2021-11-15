<?php 
 include ("fpdf181/fpdf.php");
 include ("conexion/conectar.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


	$jornalxhora=0;
	$jornalxmin=0;
	$id=explode("--", $_GET['id']);
	$fila = 0;
	$fecha='';
	$desde='';
	$hasta='';
	$sueldo_basico=0;
	$total_a_pagar='';
	$total_horas='';
	$total_minutos='';
	$total_bobif=0;
	$total_egresos=0;
	$personal_id='';
	$jornalxhora='';
	$jornalxmin='';
	$nro_docum='';
	$aux='';
	$personal='';
	$prestamo_id='';
	$mat_cabecera =array();
	$mat_detalle =array();
	$mat_detalle2 =array();	
	$periodo='';
	$query2="select * from liquiregular where id='".$id[0]."' " ;
//	echo $query2;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$aux=explode('-',$query4['fe_ultmodi']);
			$mat_cabecera[$fila][0]=$aux[2].'/'.$aux[1].'/'.$aux[0];
			$mat_cabecera[$fila][1]=$query4['desde'];	
			$mat_cabecera[$fila][2]=$query4['hasta'];
			$periodo=explode('-',$query4['hasta']);					
			$mat_cabecera[$fila][3]=$query4['totalPagar'];
			$mat_cabecera[$fila][4]=$query4['canhorastraba'];
			$mat_cabecera[$fila][5]=$query4['personal_id'];	
			$personal_id=$query4['personal_id'];
			$sueldo_basico=$query4['totalPagar'];
			$fila=$fila+1;			
		}
		$query2="select * from personal where id='".$personal_id."' and estado = 1 " ;
		$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$jornalxmin = $query4['jornalxmin'];
			$personal = $query4['apellidos'].", ".$query4['nombres'];
			$jornalxmin= $query4['jornalxmin'];
			$nro_docum=$query4['nro_docum'];
		}
// ******************************************************************************************
// ******************************************************************************************
//
//                       				INGRESOS
// ******************************************************************************************
// ******************************************************************************************



// ******************************************************************************************
// ******************************************************************************************
		
		
		
		
// ******************************************************************************************
// ******************************************************************************************
//
//                       				EGRESOS
// ******************************************************************************************
// ******************************************************************************************
	$fila = 0;	
	

$query2="select * from liquidetalle where liquiregular_id='".$id[0]."'  and tipo='Egreso'   " ;
	//$res=mysql_query($query2,$con);
	//
//	while($query4 = mysql_fetch_array($res) )
//		{
//			$mat_detalle2[$fila][0]=$query4['importe'];
//			$mat_detalle2[$fila][1]=$query4['concepto'];	
//			$mat_detalle2[$fila][2]=$query4['concepto'];
//			$total_egresos=$total_egresos+$query4['importe'];					
//			$fila=$fila+1;			
//		}		
		

		
		mysql_close($con);
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
				$this->Cell(30,10,html_entity_decode("Liquidacion de Aguinaldo"),0,1,'C');
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
				$this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,1,'C');
			}
			}
			
			$pdf = new PDF();
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont('Times','',12);
			$pdf->SetFillColor(0,0,0);
			$aux = explode(".",$mat_cabecera[0][4]);
			
			//$total_a_pagar=($sueldo_basico);
//			if(count($aux)>1)
//			{
//			$total_a_pagar=$total_a_pagar+($jornalxmin*$aux[1]);
//			}
//			else
//			{
//				$aux[1]='0';
//			}
//			$total_bobif=$total_bobif+$total_a_pagar;
				
				$pdf->Cell(32,7,"Personal",0,0 , 'L',false);
				$pdf->Cell(120,7,":  ".$personal,0,1);
				//$pdf->Cell(20,7,"Hs Trab.",0,0);
//				$pdf->Cell(20,7,":  ".$aux[0],0,1);
				$pdf->Cell(32,7,"Fecha de Emision",0,0 , 'L',false);
				$pdf->Cell(120,7,":  ".$mat_cabecera[0][0],0,1 , 'L',false);
				//$pdf->Cell(20,7,"Min. Trab.",0,0);
				//$pdf->Cell(20,7,":  ".$aux[1],0,1);
				$pdf->Cell(32,7,"Periodo",0,0 , 'L',false);		
				$pdf->Cell(20,7,":  ".$periodo[0],0,1 , 'L',false);				
				$pdf->Ln();
				$pdf->Line(10, 60, 200, 60); // 20mm from each edge
				$pdf->Cell(20,7,"Ingresos",0,1,false);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFillColor(184,180,180);

				
				$pdf->Cell(100,7,"Concepto",1,0 , 'L',false);
				$pdf->Cell(40,7,"Importe",1,1 , 'R',false);

				
			
				
				$pdf->Cell(100,7,"Total sueldos/12",1,0 , 'L' );
				$pdf->Cell(40,7,number_format($sueldo_basico,'0',',','.'),1,1 , 'R' );

				for($i=0;$i<count($mat_detalle);$i++)
				{
					$pdf->Cell(100,7,$mat_detalle[$i][1],1,0,false);
					$pdf->Cell(40,7,number_format($mat_detalle[$i][0],'0',',','.'),1,1 , 'R' );

				}
				
				$pdf->Cell(100,7,"Total",1,0 , 'L',true);
				$pdf->Cell(40,7,number_format($sueldo_basico,'0',',','.'),1,1 , 'R',true);
				$pdf->Ln();
				
				
				
				
				
				//$pdf->Cell(20,7,"Egresos",0,1,false);
//
//				
//					
//				$pdf->Cell(100,7,"Concepto",1,0 , 'L',false);
//				$pdf->Cell(40,7,"Importe",1,1 , 'R',false);
//				 
//
//				for($i=0;$i<count($mat_detalle2);$i++)
//				{
//				
//				$pdf->Cell(100,7,$mat_detalle2[$i][1],1,0,false);
//				$pdf->Cell(40,7,number_format($mat_detalle2[$i][0],'0',',','.'),1,1 , 'R' );
//				
//				}
//			
//				$pdf->Cell(100,7,"Total",1,0 , 'L',true);
//				$pdf->Cell(40,7,number_format($total_egresos,'0',',','.'),1,1 , 'R',true);
				$pdf->Ln();
					
				$total_a_pagar=$total_bobif-$total_egresos;
				
				
				$pdf->Cell(100,7,"Total a Pagar",1,0 , 'L',true);
				$pdf->Cell(40,7,number_format(($sueldo_basico)-$total_egresos,'0',',','.'),1,1 , 'R',true);
				
				
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Cell(40,7,"Recibi Conforme:",0,1 , 'L',false);
				$pdf->Cell(40,7,$personal,0,1 , 'L',false);
				$pdf->Cell(40,7,$nro_docum,0,1 , 'L',false);

		

$pdf->Output();

?>