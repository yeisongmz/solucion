<?php include ("fpdf181/fpdf.php");
 include ("conexion/conectar.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


	
	//$id=explode("--", $_GET['id']);
	$fila = 0;
	$fecha='';
	$desde='';
	$hasta='';
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
	$aux2=explode("-",$_GET['desde']);	
	$fecha_inicial=$aux2[2]."-".$aux2[1]."-".$aux2[0];
	$aux2=explode("-",$_GET['hasta']);
   	$fecha_final=$aux2[2]."-".$aux2[1]."-".$aux2[0];
//	$query2="select * from liquiregular where id='".$id[0]."' " ;
	$query2="select * from liquiregular where desde='".$fecha_inicial."' and hasta='".$fecha_final."' " ;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_cabecera[$fila][0]=$query4['fecha'];
			$mat_cabecera[$fila][1]=$query4['desde'];	
			$mat_cabecera[$fila][2]=$query4['hasta'];						
			$mat_cabecera[$fila][3]=$query4['totalPagar'];
			$mat_cabecera[$fila][4]=$query4['canhorastraba'];	
			$personal_id=$query4['personal_id'];
			$id[0]=$query4['id'];
			$fila=$fila+1;			
		
// ******************************************************************************************
// ******************************************************************************************
//
//                       				INGRESOS
// ******************************************************************************************
// ******************************************************************************************



	$query2="select importe,concepto,obs from bonificacion where liquiregular_id='".$id[0]."' and personal_id='".$personal_id."'  " ;

	$res=mysql_query($query2,$con);
	$fila = 0;
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle[$fila][0]=$query4['importe'];
			$mat_detalle[$fila][1]="Bonif.: ";//.$query4['obs'];	
			$mat_detalle[$fila][2]=$query4['concepto'];
			$total_bobif=$total_bobif+$query4['importe'];
			$fila=$fila+1;			
		}	
// ******************************************************************************************
// ******************************************************************************************
		
		
		
		
// ******************************************************************************************
// ******************************************************************************************
//
//                       				EGRESOS
// ******************************************************************************************
// ******************************************************************************************
	$fila = 0;	
	$query2="select importe,obs from adelantos where liquiregular_id='".$id[0]."' and personal_id='".$personal_id."'  " ;
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila][0]=$query4['importe'];
			$mat_detalle2[$fila][1]='Adelanto:';//.$query4['obs'];	
			$mat_detalle2[$fila][2]='Adelanto';
			$total_egresos=$total_egresos+	$query4['importe'];					
			$fila=$fila+1;			
		}	
$query2="select importe,concepto,obs from descuentos where liquiregular_id='".$id[0]."' and personal_id='".$personal_id."'  " ;
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila][0]=$query4['importe'];
			$mat_detalle2[$fila][1]='Descuento:';//.$query4['obs'];	
			$mat_detalle2[$fila][2]=$query4['concepto'];
			$total_egresos=$total_egresos+	$query4['importe'];					
			$fila=$fila+1;			
		}
		
			
$query2="select id from prestamos where  personal_id='".$personal_id."'  " ;
//echo $query2."<br>";
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$prestamo_id = $query4['id'];
			
		}	
		
		
		
				
$query2="select monto,numero,Prestamos_id from cuotas where Prestamos_id='".$prestamo_id."' and estado='Pagado' " ;
//echo $query2."<br>";
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila][0]=$query4['monto'];
			$mat_detalle2[$fila][1]='Cuota '.$query4['numero'];	
			$mat_detalle2[$fila][2]=$query4['Prestamos_id'];
			$total_egresos=$total_egresos+	$query4['monto'];					
			$fila=$fila+1;			
		}	
		for($i=0;$i<$fila;$i++)
		{
			if(is_numeric($mat_detalle2[$i][2]))
			{
			$query2="select plazo,motivo from prestamos where id='".$mat_detalle2[$i][2]."' and personal_id='".$personal_id."'  " ;
			//echo $query2."<br>";
			$res=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res) )
				{
					$mat_detalle2[$i][1] =$mat_detalle2[$i][1]."/".$query4['plazo']."  - ".$query4['motivo'];
				}
			
			}
		}
// ******************************************************************************************
// ******************************************************************************************				
	$query2="select apellidos,nombres,jornalxhora,jornalxmin,nro_docum from personal where id='".$personal_id."' and estado=1 " ;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$personal = $query4['apellidos'].", ".$query4['nombres'];
			$jornalxhora = $query4['jornalxhora'];
			$jornalxmin= $query4['jornalxmin'];
			$nro_docum=$query4['nro_docum'];
		}
		
		mysql_close($con);
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
$string = utf8_encode("Liquidación de Salario");
$converted = html_entity_decode($string , ENT_COMPAT, 'UTF-8');				
				$this->Cell(30,10,$converted,0,0,'C');
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
			$aux = explode(".",$mat_cabecera[0][4]);
			$total_a_pagar=($jornalxhora*$aux[0]);
			if(count($aux)>1)
			{
			$total_a_pagar=$total_a_pagar+($jornalxmin*$aux[1]);
			}
			else
			{
				$aux[1]='0';
			}
			$total_a_pagar=($jornalxhora*$aux[0])+($jornalxmin*$aux[1]);
			$total_bobif=$total_bobif+$total_a_pagar;
				$pdf -> SetY(25);    // set the cursor at Y position 5
				$pdf -> SetX(20); 
				for($i=1;$i<2;$i++)
				{
				$pdf->Cell(0,0,"Personal",0,0 , 'L',false);
				$pdf -> SetY(25);    // set the cursor at Y position 5
				$pdf -> SetX(60);
				$pdf->Cell(0,0,":  ".$personal,0,1);
				$pdf -> SetY(25);    // set the cursor at Y position 5
				$pdf -> SetX(150);
				//$pdf->Cell(0,0,"Hs Trab.",0,1);
				$pdf -> SetY(25);    // set the cursor at Y position 5
				$pdf -> SetX(175);
				//$pdf->Cell(0,0,":  ".$aux[0],0,1);
				$pdf -> SetY(30);    // set the cursor at Y position 5
				$pdf -> SetX(20);
$string = "Fecha de Emisi&oacute;n";
$converted = html_entity_decode($string , ENT_COMPAT, 'UTF-8');					
				$pdf->Cell(0,0,$converted,0,0 , 'L',false);
				$pdf -> SetY(30);    // set the cursor at Y position 5
				$pdf -> SetX(60);
				$pdf->Cell(0,0,":  ".$mat_cabecera[0][0],0,0 , 'L',false);
				$pdf -> SetY(30);    // set the cursor at Y position 5
				$pdf -> SetX(150);
				//$pdf->Cell(0,0,"Min. Trab.",0,1);
				$pdf -> SetY(30);    // set the cursor at Y position 5
				$pdf -> SetX(175);
				//$pdf->Cell(0,0,":  ".$aux[1],0,1);
				$pdf -> SetY(35);    // set the cursor at Y position 5
				$pdf -> SetX(20);
				$pdf->Cell(0,0,"Periodo",0,0 , 'L',false);		
				$pdf -> SetY(35);    // set the cursor at Y position 5
				$pdf -> SetX(60);		
				$pdf->Cell(0,0,":  ".$mat_cabecera[0][1]."  -  ".$mat_cabecera[0][2],0,0 , 'L',false);				
				$pdf->Ln();

				}
			
				
				$pdf->Line(10, 45, 200, 45); // 20mm from each edge
				$pdf -> SetY(55);    // set the cursor at Y position 5
				$pdf -> SetX(20);	
				$pdf->Cell(0,0,"Ingresos",0);
				
				$pdf->SetFillColor(184,180,180);
				$pdf -> SetY(60);    // set the cursor at Y position 5
				$pdf -> SetX(20);	
				for($i=0;$i<1;$i++)
				{
				$pdf->Cell(100,7,"Concepto",1,0 , 'L',false);
				$pdf->Cell(40,7,"Importe",1,0 , 'R',false);
				$pdf->Ln();
				}
			//	SetY(5);    // set the cursor at Y position 5
//$pdf -> SetFont('Arial', 'I', 8);  // set the font
//$pdf->Cell(40,200,'Descritpion');  // draw a cell at pos 5 that has a a width 40 and height
				$pdf -> SetY(60);    // set the cursor at Y position 5
				$pdf -> SetX(20);
				$pdf->Ln();
				//$pdf -> SetY(67);    // set the cursor at Y position 5
				$pdf -> SetX(20);
				
				$pdf->Cell(100,7,"Sueldo Basico",1,0 , 'L' );
				$pdf -> SetY(67);    // set the cursor at Y position 5
				$pdf -> SetX(120);
				
				$pdf->Cell(40,7,number_format($total_a_pagar,'0',',','.'),1,0 , 'R' );

				$pdf -> SetY(70);    // set the cursor at Y position 5
				$pdf -> SetX(20);
				$pdf->Ln();
				$pdf -> SetY(74);    // set the cursor at Y position 5
				$pdf -> SetX(20);
				for($i=0;$i<count($mat_detalle);$i++)
				{
				
				$pdf -> SetX(20);
				
					$pdf->Cell(100,7,$mat_detalle[$i][1],1);
					
					$pdf->Cell(40,7,number_format($mat_detalle[$i][0],'0',',','.'),1,0 , 'R' );
					$pdf->Ln();
				}
				for($i=0;$i<1;$i++)
				{
					$pdf -> SetX(20);
				$pdf->Cell(100,7,"Total",1,0 , 'L',true);
				$pdf->Cell(40,7,number_format($total_bobif,'0',',','.'),1,0 , 'R',true);
				$pdf->Ln();
				}
				$pdf -> SetY(105);
				$pdf -> SetX(20);
				$pdf->Cell(0,0,"Egresos",0);

				$pdf -> SetY(120);
				$pdf -> SetX(20);
				
				$pdf->Ln();
				$pdf -> SetY(110);
				$pdf -> SetX(20);
				for($i=0;$i<1;$i++)
				{
					
				$pdf->Cell(100,7,"Concepto",1,0 , 'L',false);
				$pdf->Cell(40,7,"Importe",1,0 , 'R',false);
				$pdf->Ln();
				}
				 

				for($i=0;$i<count($mat_detalle2);$i++)
				{
					$pdf -> SetX(20);
				$pdf->Cell(100,7,$mat_detalle2[$i][1],1);
				$pdf->Cell(40,7,number_format($mat_detalle2[$i][0],'0',',','.'),1,0 , 'R' );
				$pdf->Ln();
				}
				for($i=0;$i<1;$i++)
				{
				$pdf -> SetX(20);
				$pdf->Cell(100,7,"Total",1,0 , 'L',true);
				$pdf->Cell(40,7,number_format($total_egresos,'0',',','.'),1,0 , 'R',true);
				$pdf->Ln();
				}
				$total_a_pagar=$total_bobif-$total_egresos;
				$pdf -> SetY(170);
				for($i=0;$i<1;$i++)
				{
				$pdf -> SetX(20);
				$pdf->Cell(100,7,"Total a Pagar",1,0 , 'L',true);
				$pdf->Cell(40,7,number_format($total_a_pagar,'0',',','.'),1,0 , 'R',true);
				$pdf->Ln();
				}
				
				$pdf -> SetY(220);
				
				for($i=0;$i<1;$i++)
				{
				$pdf -> SetX(20);
				$pdf->Cell(40,7,"Recibi Conforme:",0,1 , 'L',false);
				$pdf -> SetY(225);
				$pdf -> SetX(20);
				$pdf->Cell(40,7,$personal,0,1 , 'L',false);
				$pdf -> SetY(230);
				$pdf -> SetX(20);
				$pdf->Cell(40,7,$nro_docum,0,1 , 'L',false);

//				$pdf->Ln();
				}
//				$total_egresos
		}

$pdf->Output();

?>