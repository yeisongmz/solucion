<?php
 include ("fpdf181/fpdf.php");
 include ("conexion/conectar.php");
 include ("funct_restar_horas.php");
  include ("ajuste_horas.php");
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
	$query2="select * from liquiregular where id='".$id[0]."' " ;
//	echo $query2;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$desde=$query4['desde'];
			$hasta=$query4['hasta'];
			$mat_cabecera[$fila][0]=$query4['fecha'];
			$mat_cabecera[$fila][1]=$query4['desde'];
			$mat_cabecera[$fila][2]=$query4['hasta'];
			$mat_cabecera[$fila][3]=$query4['totalPagar'];
			$total_a_pagar=$query4['totalPagar'];
			$mat_cabecera[$fila][4]=$query4['canhorastraba'];
			$mat_cabecera[$fila][5]=$query4['personal_id'];
			$jornalxhora = $query4['gsxhora'];
			$personal_id=$query4['personal_id'];
			$fila=$fila+1;
		}
		$query2="select jornalxhora,jornalxmin,sueldoreal from personal where id='".$personal_id."' and estado = 1 " ;
	//echo $query2;
	$res=mysql_query($query2,$con);

	while($query4 = mysql_fetch_array($res) )
		{

			$jornalxhora = $query4['jornalxhora'];
			$jornalxmin = $query4['jornalxmin'];

		}
// ******************************************************************************************
//  aqui se calcula el sueldo BASE
        $sueldoreal = $jornalxhora * $mat_cabecera[0][4];
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
			$mat_detalle[$fila][1]="Bonificacion";
			$mat_detalle[$fila][2]=$query4['concepto'];
			$total_bobif=$total_bobif+$query4['importe'];

			$fila=$fila+1;
		}
	// PARTE DE ASISTENCIAS
		$query2="select *  from asistencia where personal_id='".$personal_id."' and fecha_asistencia>='".$desde."' and fecha_asistencia<='".$hasta."'  " ;

	$res=mysql_query($query2,$con);
	$total_cobro_diario=0;
	$semana_diurna=0;
	$semana_nocturna=0;
	$domingo_diurno=0;
	$domingo_nocturno=0;


	$h_entrada=0;
	$h_salida=0;
	$h_trabajadas=0;
	$h_nocturnas=0;


	while($query4 = mysql_fetch_array($res) )
		{
			$fecha_asistencia=explode('-',$query4['fecha_asistencia']);
			$dia=jddayofweek (cal_to_jd(CAL_GREGORIAN, $fecha_asistencia[1],$fecha_asistencia[2], $fecha_asistencia[0]),0);
			//TOTAL HORAS TRABAJADAS...............
			//.....................................
			//.....................................
					$aux=explode(':',$query4['hs_entrada']);
					$h_entrada=hora(intval($aux[0]).'.'.intval($aux[1]));
					$aux=explode(':',$query4['hs_salida']);
					$h_salida=hora(intval($aux[0]).'.'.intval($aux[1]));
					$h_trabajadas=$query4['hs_cantidad'];//intval($aux2[0]).'.'.$aux2[1];
					$h_nocturnas=$query4['horas_nocturnas'];


			//DOMINGOS
			$aux=0;
			if($dia==0)
				{
					// DIURNOS DOMINGOS
					$domingo_diurno=number_format($domingo_diurno,'2','.','')+(number_format($h_trabajadas,'2','.','')-number_format($h_nocturnas,'2','.',''));
					if($h_nocturnas>0)
					{
						$aux2=(number_format($h_nocturnas,'2','.',''))*$jornalxhora*1.3;
						$domingo_nocturno=number_format($domingo_nocturno,'2','.','')+number_format($h_nocturnas,'2','.','');
					}

				}
				else//LUNES A SABADOS
				{

					$semana_diurna=number_format($semana_diurna,'2','.','')+(number_format($h_trabajadas,'2','.','')-number_format($h_nocturnas,'2','.',''));
					if($h_nocturnas>0)
					{
						$semana_nocturna=number_format($semana_nocturna,'2','.','')+number_format($h_nocturnas,'2','.','');
					}

				}
			//$total_horas=number_format($total_horas,'2','.','')+number_format($h_trabajadas,'2','.','');
			$h_entrada=0;
			$h_salida=0;
			$h_trabajadas=0;
			$h_nocturnas=0;
		}

		$aux=$domingo_diurno*1.3;
		$aux=$aux*$jornalxhora;
		$aux2=$domingo_nocturno*1.3;
		$aux2=$aux2*$jornalxhora;


		$total_cobro_diario	=round((($semana_diurna)*$jornalxhora)+(($semana_nocturna)*$jornalxhora*1.3)+$aux+$aux2);
		//echo $total_cobro_diario.'<br>';
// ******************************************************************************************
// ******************************************************************************************




// ******************************************************************************************
// ******************************************************************************************
//
//                       				EGRESOS
// ******************************************************************************************
// ******************************************************************************************
	$fila = 0;



//****************************************************************
	$query2="select importe,obs from adelantos where liquiregular_id='".$id[0]."' and personal_id='".$personal_id."'  " ;
	$res=mysql_query($query2,$con);

	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila][0]=$query4['importe'];
			$mat_detalle2[$fila][1]='Adelanto';
			$mat_detalle2[$fila][2]='Adelanto';
			$total_egresos=$total_egresos+$query4['importe'];
			$fila=$fila+1;
		}
$query2="select importe,concepto,obs from descuentos where liquiregular_id='".$id[0]."' and personal_id='".$personal_id."'  " ;
	$res=mysql_query($query2,$con);

	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila][0]=$query4['importe'];
			$mat_detalle2[$fila][1]='Descuento - '.$query4['concepto'];
			$mat_detalle2[$fila][2]=$query4['concepto'];

			$total_egresos=$total_egresos+$query4['importe'];
			$fila=$fila+1;
		}
$query2="select * from liquidetalle where liquiregular_id='".$id[0]."'  and tipo='DESCUENTO' and concepto like'Ausencia injust.%'  " ;
	$res=mysql_query($query2,$con);

	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila][0]=$query4['importe'];
			$mat_detalle2[$fila][1]='Descuento - '.$query4['concepto'];
			$mat_detalle2[$fila][2]=$query4['concepto'];
			$total_egresos=$total_egresos+$query4['importe'];
			$fila=$fila+1;
		}


$query2="select id from prestamos where  personal_id='".$personal_id."'  " ;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
		$prestamo_id = $query4['id'];
		$query2="select monto,numero,Prestamos_id from cuotas where Prestamos_id='".$prestamo_id."' and estado='Pagado' and idliquidacion='".$id[0]."' " ;
		$res2=mysql_query($query2,$con);

	while($query4 = mysql_fetch_array($res2) )
		{
			$mat_detalle2[$fila][0]=$query4['monto'];
			$mat_detalle2[$fila][1]='Cuota '.$query4['numero'];
			$mat_detalle2[$fila][2]=$query4['Prestamos_id'];
			$total_egresos=$total_egresos+	$query4['monto'];
			if(is_numeric($mat_detalle2[$fila][2]))
			{
			$query2="select plazo,motivo from prestamos where id='".$mat_detalle2[$fila][2]."' and personal_id='".$personal_id."'  " ;
			$res3=mysql_query($query2,$con);
			while($query4 = mysql_fetch_array($res3) )
				{
					$mat_detalle2[$fila][1] =$mat_detalle2[$fila][1]."/".$query4['plazo'];
				}
			}
			$fila=$fila+1;
		}
	}





// ******************************************************************************************
// ******************************************************************************************
	$query2="select apellidos,nombres,jornalxhora,jornalxmin,nro_docum from personal where id='".$personal_id."' and estado=1 " ;
	$res=mysql_query($query2,$con);
	while($query4 = mysql_fetch_array($res) )
		{
			$personal = $query4['apellidos'].", ".$query4['nombres'];
			//$jornalxhora = $query4['jornalxhora'];
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
				$this->Cell(30,10,html_entity_decode("Liquidacion de Salario"),0,1,'C');
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

			//$total_a_pagar=($jornalxhora*$aux[0]);
//			if(count($aux)>1)
//			{
//			$total_a_pagar=$total_a_pagar+($jornalxmin*$aux[1]);
//			}
//			else
//			{
//				$aux[1]='0';
//			}
//echo $total_a_pagar;
			//$aux2=$total_a_pagar-$total_bobif;
			$aux2=$total_cobro_diario;
			$total_bobif=$total_bobif+$aux2;

				$pdf->Cell(32,7,"Personal",0,0 , 'L',false);
				$pdf->Cell(120,7,":  ".iconv('UTF-8', 'windows-1252',$personal),0,1);
				//$pdf->Cell(20,7,"Hs Trab.",0,0);
//				$pdf->Cell(20,7,":  ".$aux[0],0,1);
				$pdf->Cell(32,7,"Fecha de Emision",0,0 , 'L',false);
				$pdf->Cell(120,7,":  ".$mat_cabecera[0][0],0,1 , 'L',false);
				//$pdf->Cell(20,7,"Min. Trab.",0,0);
				//$pdf->Cell(20,7,":  ".$aux[1],0,1);
				$pdf->Cell(32,7,"Periodo",0,0 , 'L',false);
				$pdf->Cell(20,7,":  ".$mat_cabecera[0][1]."  -  ".$mat_cabecera[0][2],0,1 , 'L',false);
				$pdf->Ln();
				$pdf->Line(10, 60, 200, 60); // 20mm from each edge
				$pdf->Cell(20,7,"Ingresos",0,1,false);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFillColor(184,180,180);

				$pdf->Cell(100,7,"Concepto",1,0 , 'L',false);
				$pdf->Cell(40,7,"Importe",1,1 , 'R',false);

				$pdf->Cell(100,7,"Sueldo Basico",1,0 , 'L' );
                $sueldoreal = $total_cobro_diario ;
				$pdf->Cell(40,7,number_format($sueldoreal,'0',',','.'),1,1 , 'R' );
                //$pdf->Cell(40,7,number_format($aux2,'0',',','.'),1,1 , 'R' );

				for($i=0;$i<count($mat_detalle);$i++)
				{
					if($mat_detalle[$i][2]=="HORAS EXTRAS")
					{
						$pdf->Cell(100,7,"HORAS EXTRAS",1,0,false);
					}
					else
					{
						$pdf->Cell(100,7,$mat_detalle[$i][1],1,0,false);
					}
					$pdf->Cell(40,7,number_format($mat_detalle[$i][0],'0',',','.'),1,1 , 'R' );

                    $suma_ingreso = $suma_ingreso +  $mat_detalle[$i][0] ;
				}
                $total_bobif = $suma_ingreso + $sueldoreal ;
				$pdf->Cell(100,7,"Total",1,0 , 'L',true);
				$pdf->Cell(40,7,number_format($total_bobif,'0',',','.'),1,1 , 'R',true);
				$pdf->Ln();





				$pdf->Cell(20,7,"Egresos",0,1,false);



				$pdf->Cell(100,7,"Concepto",1,0 , 'L',false);
				$pdf->Cell(40,7,"Importe",1,1 , 'R',false);


				for($i=0;$i<count($mat_detalle2);$i++)
				{

				$pdf->Cell(100,7,$mat_detalle2[$i][1],1,0,false);
				$pdf->Cell(40,7,number_format($mat_detalle2[$i][0],'0',',','.'),1,1 , 'R' );

				}

				$pdf->Cell(100,7,"Total",1,0 , 'L',true);
				$pdf->Cell(40,7,number_format($total_egresos,'0',',','.'),1,1 , 'R',true);
				$pdf->Ln();

				$total_a_pagar=$total_bobif-$total_egresos;


				$pdf->Cell(100,7,"Total a Pagar",1,0 , 'L',true);
				$pdf->Cell(40,7,number_format($total_a_pagar,'0',',','.'),1,1 , 'R',true);


				$pdf->Ln();
				$pdf->Ln();
				$pdf->Cell(40,7,"Recibi Conforme:",0,1 , 'L',false);
				$pdf->Cell(40,7,$personal,0,1 , 'L',false);
				$pdf->Cell(40,7,$nro_docum,0,1 , 'L',false);



$pdf->Output();

?>
