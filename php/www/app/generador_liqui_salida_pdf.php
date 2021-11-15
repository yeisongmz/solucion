<?php include ("fpdf181/fpdf.php");
 include ("conexion/conectar.php");

	$id=explode("--",$_GET['id']);
	$desde='';
	$hasta='';
	$mat_cabecera =array();
	$mat_detalle =array();
	$mat_detalle2 =array();
	$fila=0;
	$horas=0;
	$total_bobif=0;
	$total_egresos=0;
	$total_a_pagar=0;
	$personal='';
	$jornalxhora=0;
	$jornalxmin=0;
	$nro_docum='';
	$importeIPS=0;
	$concepto_prestmo='';
	$query2="select * from liquisalida where id='".$id[0]."' " ;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_cabecera[$fila][0]=$query4['fechaemision'];
			$mat_cabecera[$fila][1]=$query4['fecharetiro'];	
			$mat_cabecera[$fila][2]=$query4['totalPagar'];						
			$personal_id=$query4['personal_id'];

			$desde=$query4['desde'];

			$hasta=$query4['hasta'];
	
			$id[0]=$query4['id'];
			$fila=$fila+1;			
			
		}
		
		
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
			//$total_bobif=$total_bobif+$query4['importe'];
			$fila=$fila+1;			
		}	
		
	$query2="select jornalxhora,jornalxmin from personal where id='".$personal_id."' " ;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$jornalxhora=$query4['jornalxhora'];
			$jornalxmin=$query4['jornalxmin'];
		}	
		
$query2="select sum(hs_cantidad) as total from asistencia where personal_id='".$personal_id."' and fecha_asistencia>='".$desde."' and fecha_asistencia<='".$hasta."' group by personal_id "  ;

	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$horas=$query4['total'];
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
			$mat_detalle2[$fila][1]='Adelanto - ';//.$query4['obs'];	
			$mat_detalle2[$fila][2]='Adelanto - ';
			$total_egresos=$total_egresos+	$query4['importe'];					
			$fila=$fila+1;			
		}	
$query2="select importe,concepto,obs from descuentos where liquiregular_id='".$id[0]."' and personal_id='".$personal_id."'  " ;
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila][0]=$query4['importe'];
			$mat_detalle2[$fila][1]='Descuento - '.$query4['concepto'];//.$query4['obs'];	
			$mat_detalle2[$fila][2]=$query4['concepto'];
			$total_egresos=$total_egresos+	$query4['importe'];					
			$fila=$fila+1;			
		}
		
//************ AUSENCIAS INJUSTIFICADAS

$query2="select fecha,cant_horas,motivo from ausencias where personal_id='".$personal_id."' and fecha>='".$desde."' and fecha<='".$hasta."' and liquiregular_id ='".$id[0]."'  and tipo='Injustificada' order by fecha asc " ;

	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$importe_ausencias=$jornalxhora*$query4['cant_horas'];	
			$mat_detalle2[$fila][0]=$importe_ausencias;
			$mat_detalle2[$fila][1]='Descuento - '."Ausencia injust. ".$query4['cant_horas']."(hs)";;	
			$mat_detalle2[$fila][2]="Ausencia injust. ".$query4['cant_horas']."(hs)";
			$total_egresos=$total_egresos+$importe_ausencias;						
			$fila=$fila+1;			
		}
			
//**********************************************		
$query2="select id,motivo from prestamos where  personal_id='".$personal_id."'  " ;
//echo $query2."<br>";
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
	{
		$prestamo_id = $query4['id'];
		$concepto_prestmo= $query4['motivo'];
		$query2="select monto,numero,Prestamos_id from cuotas where Prestamos_id='".$prestamo_id."' and estado='Pagado' and idliquidacion='".$id[0]."' " ;
		$res2=mysql_query($query2,$con);
		while($query4 = mysql_fetch_array($res2) )
		{
			$mat_detalle2[$fila][0]=$query4['monto'];
			$mat_detalle2[$fila][1]='Cuota '.$query4['numero'];	
			$mat_detalle2[$fila][2]=$query4['Prestamos_id'];
			$total_egresos=$total_egresos+$query4['monto'];	
			if(is_numeric($mat_detalle2[$fila][2]))
			{
			$query2="select plazo,motivo from prestamos where id='".$mat_detalle2[$fila][2]."' and personal_id='".$personal_id."'  " ;
			//echo $query2."<br>";
			$res3=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res3) )
				{
					$mat_detalle2[$fila][1] =$mat_detalle2[$fila][1]."/".$query4['plazo']." - ".$concepto_prestmo;
				}
			
			}				
			$fila=$fila+1;			
		}	
		
		}
		//echo $total_egresos."<br>"	;
// ******************************************************************************************
// ******************************************************************************************				
	$query2="select apellidos,nombres,jornalxhora,jornalxmin,nro_docum,importeIPS from personal where id='".$personal_id."' and estado=0 " ;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$personal = $query4['apellidos'].", ".$query4['nombres'];
			$jornalxhora = $query4['jornalxhora'];
			$jornalxmin= $query4['jornalxmin'];
			$nro_docum=$query4['nro_docum'];
			$importeIPS=$query4['importeIPS'];
		}
		
		mysql_close($con);




$pdf = new FPDF();
$pdf->AddPage();
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
				$string = "Liquidacion de Salario";
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
			
				$pdf->Cell(40,10,"Personal",0,0 , 'L',false);
				$pdf->Cell(40,10,":  ".$personal,0,1);


$string = "Fecha de Emision";
$converted = html_entity_decode($string , ENT_COMPAT, 'UTF-8');


				$pdf->Cell(40,10,$converted,0,0 , 'L',false);
				$pdf->Cell(20,10,":  ".$mat_cabecera[0][0],0,1 , 'L',false);
				$pdf->Ln();

			
				$aux = explode(".",$horas);
			if(count($aux))
			{
				$total_a_pagar=($jornalxhora*$aux[0])+($jornalxmin*$aux[1]);
			}
			else
			{
				$total_a_pagar=$jornalxhora*$aux[0];
			}
			//$total_bobif=$total_bobif+$total_a_pagar;
			
				$pdf->Line(10, 60, 200, 60); // 20mm from each edge
				$pdf->Cell(20,10,"Ingresos y bonificaciones",0,1);
				$pdf->SetFillColor(184,180,180);
				$pdf->Cell(90,7,"Concepto",1,0 , 'L',true);
				$pdf->Cell(90,7,"Importe",1,1 , 'R',true);
				$pdf->Cell(90,7,"Sueldo Basico",1,0 , 'L' );
				$pdf->Cell(90,7,number_format($total_a_pagar,'0',',','.'),1,1 , 'R' );
				$total_bobif=0;
				for($i=0;$i<count($mat_detalle);$i++)
				{
					$pdf->Cell(90,7,"Bonif. - ".$mat_detalle[$i][2],1,0);
					$pdf->Cell(90,7,number_format($mat_detalle[$i][0],'0',',','.'),1,1 , 'R' );
					$total_bobif=$total_bobif+$mat_detalle[$i][0];
				}
				$total_bobif=$total_bobif+$total_a_pagar;
				//echo $total_bobif."<br>";
				$pdf->Cell(90,7,"Total",1,0 , 'L',true);
				$pdf->Cell(90,7,number_format($total_bobif,'0',',','.'),1,1 , 'R',true);
				$pdf->Cell(50,10,"Detalle de descuentos realizados",0,1,false);
				$pdf->Cell(90,7,"Concepto",1,0 , 'L',true);
				$pdf->Cell(90,7,"Importe",1,1 , 'R',true);
				for($i=0;$i<count($mat_detalle2);$i++)
				{
				$pdf->Cell(90,7,$mat_detalle2[$i][1],1,0);
				$pdf->Cell(90,7,number_format($mat_detalle2[$i][0],'0',',','.'),1,1 ,'R' );
				}
				$pdf->Cell(90,7,"Total",1,0 , 'L',true);
				$pdf->Cell(90,7,number_format($total_egresos,'0',',','.'),1,1 , 'R',true);
				$pdf->Ln();
				//echo $total_egresos."<br>";
				$total_a_pagar=$total_bobif-$total_egresos;
				$pdf->Cell(90,7,"Total a Pagar",1,0 , 'L',true);
				$pdf->Cell(90,7,number_format($total_a_pagar,'0',',','.'),1,1 , 'R',true);
				$pdf->Ln();
			$pdf->Ln();
				$pdf->Cell(40,7,"Recibi Conforme:",0,1 , 'L',false);
				$pdf->Cell(40,7,$personal,0,1 , 'L',false);
				$pdf->Cell(40,7,$nro_docum,0,1 , 'L',false);
		

$pdf->Output();
?>