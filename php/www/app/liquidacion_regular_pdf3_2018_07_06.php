<?php 
 include ("fpdf181/fpdf.php");
 include ("conexion/conectar.php");
  include ("funct_restar_horas.php");
  include ("ajuste_horas.php");
//$pdf = new FPDF();

			//$pdf->AddPage();
//class PDF extends FPDF
//{
			// Cabecera de página
			//function Header()
//			{
//
//				$this->Image('images/logo2.png',10,8,33);
//				// Arial bold 15
//				$this->SetFont('Arial','B',15);
//				// Movernos a la derecha
//				$this->Cell(80);
//				// Título
//				$this->Cell(30,10,html_entity_decode("Liquidaci&oacute;n de Salario"),0,0,'C');
//				// Salto de línea
//				$this->Ln(20);
//			}
//			
//			// Pie de página
//			function Footer()
//			{
//				// Posición: a 1,5 cm del final
//				$this->SetY(-15);
//				// Arial italic 8
//				$this->SetFont('Arial','I',8);
//				// Número de página
//				$this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
//			}
	//		}
			

	
	//$id=explode("--", $_GET['id']);
	$fila = 0;
	$fila2 = 0;
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
	$fila3=0;
	$fila4=0;
	$fila5=0;
	$personal='';
	$prestamo_id='';
	$mat_cabecera =array();
	$mat_detalle =array();
	$mat_deta =array();
	$mat_detalle2 =array();	
	$mat_personal=array();
	$aux2=explode("-", $_GET['desde']);
	//$aux2=explode("-", '2017-05-01');
	$inicial= $aux2[2]."-".$aux2[1]."-".$aux2[0];
	$aux2=explode("-", $_GET['hasta']);
	//$aux2=explode("-", '2017-05-31');
	$final=$aux2[2]."-".$aux2[1]."-".$aux2[0];
	
	$query10="SELECT liquiregular.*,personal.`apellidos` FROM liquiregular,personal WHERE liquiregular.desde='".$inicial."' and liquiregular.hasta='".$final."'  AND personal.`id`=liquiregular.`personal_id` ORDER BY personal.`apellidos`  ASC" ;
	//echo $query10;
	//$query10="SELECT * FROM liquiregular WHERE liquiregular.desde='2017-05-1' and liquiregular.hasta='2017-05-31'  order by personal_id  asc" ;
	//echo $query10."<br>";
	$res2=mysql_query($query10,$con);
	while($query10 = mysql_fetch_array($res2) )
		{
			$desde=$query10['desde'];
			$hasta=$query10['hasta'];
			$mat_cabecera[$fila2][0]=$query10['fecha'];
			$mat_cabecera[$fila2][1]=$query10['desde'];	
			$mat_cabecera[$fila2][2]=$query10['hasta'];						
			$mat_cabecera[$fila2][3]=$query10['totalPagar'];
			$total_a_pagar=$query10['totalPagar'];
			$mat_cabecera[$fila2][4]=$query10['canhorastraba'];	
			$mat_cabecera[$fila2][5]=$query10['personal_id'];
			$mat_cabecera[$fila2][6]=$query10['id'];
			$mat_cabecera[$fila2][7]=0;
			$mat_cabecera[$fila2][15]=$query10['gsxhora'];
			$personal_id=$query10['personal_id'];
			$jornalxhora=$query10['gsxhora'];
			$fila2=$fila2+1;	
		}
//		echo $fila2."<br>";
for($fila3=0;$fila3<$fila2;$fila3++)
		{
			$id[0]= $mat_cabecera[$fila3][6];
// ******************************************************************************************
// ******************************************************************************************
//
//                       				INGRESOS
// ******************************************************************************************
// ******************************************************************************************



	$query2="select importe,concepto,obs,personal_id from bonificacion where liquiregular_id='".$id[0]."' and personal_id='".$mat_cabecera[$fila3][5]."'  " ;
	//$query2="select importe,concepto,obs,personal_id from bonificacion where liquiregular_id='".$id[0]."' and personal_id='125'  " ;
//echo $query2."<br>";
	$res=mysql_query($query2,$con);
	//$fila = 0;
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle[$fila][0]=$query4['importe'];
			$mat_detalle[$fila][1]="Bonificacion";	
			$total_pasajes=0;
			$total_otros=0;
			if($query4['concepto']=='PASAJE')
			{
				$total_pasajes=$total_pasajes+$mat_detalle[$fila][0];
				$mat_detalle[$fila][10]=$total_pasajes;//[$fila][10]+$mat_detalle[$fila][0];
				$mat_detalle[$fila][11]='PASAJE';
			}
			else
			{
				$total_otros=$total_otros+$mat_detalle[$fila][0];
				$mat_detalle[$fila][10]=$total_otros;//[$fila][10]+$mat_detalle[$fila][0];	
				$mat_detalle[$fila][11]='OTROS';
			}
			$mat_detalle[$fila][2]=$query4['concepto'];
			$mat_detalle[$fila][3]=$query4['personal_id'];
			$total_bobif=$total_bobif+$query4['importe'];
			//echo $mat_detalle[$fila][0]."  --  ".$mat_detalle[$fila][3]."<br>";
			$fila=$fila+1;
			$total_pasajes=0;			
		}

		$query2="select jornalxhora,jornalxmin from personal where id='".$mat_cabecera[$fila3][5]."' and estado = 1 " ;
	//echo $query2;
	$res=mysql_query($query2,$con);
	$jornalxhora=0;
	while($query4 = mysql_fetch_array($res) )
		{
			
			//$jornalxhora = $query4['jornalxhora'];
			
		}	
		// PARTE DE ASISTENCIAS	
		$query2="select *  from asistencia where personal_id='".$mat_cabecera[$fila3][5]."' and fecha_asistencia>='".$desde."' and fecha_asistencia<='".$hasta."'  " ;
//echo $query2.'<br>';
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
						$aux2=(number_format($h_nocturnas,'2','.',''))*$mat_cabecera[$fila3][15]*1.3;
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
		$aux=$aux*$mat_cabecera[$fila3][15];
		$aux2=$domingo_nocturno*1.3;
		$aux2=$aux2*$mat_cabecera[$fila3][15];
		
	
		$total_cobro_diario	=round((($semana_diurna)*$mat_cabecera[$fila3][15])+(($semana_nocturna)*$mat_cabecera[$fila3][15]*1.3)+$aux+$aux2);	
		$mat_cabecera[$fila3][20]=$total_cobro_diario	;
		//echo $total_cobro_diario.'<br>';
// ******************************************************************************************
// ******************************************************************************************
		
		
		
		
// ******************************************************************************************
// ******************************************************************************************
//
//                       				EGRESOS
// ******************************************************************************************
// ******************************************************************************************
	//$fila = 0;	
	

	$query2="select importe,obs from adelantos where liquiregular_id='".$id[0]."' and personal_id='".$mat_cabecera[$fila3][5]."'  " ;
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila4][0]=$query4['importe'];
			$mat_detalle2[$fila4][1]='Adelanto:'.$query4['obs'];	
			$mat_detalle2[$fila4][2]='Adelanto';
			$mat_detalle2[$fila4][3]=$mat_cabecera[$fila3][5];
			$mat_cabecera[$fila3][7]=$mat_cabecera[$fila3][7]+$query4['importe'];	
			$total_egresos=$total_egresos+	$query4['importe'];					
			$fila4=$fila4+1;			
		}	
		
$query2="select importe,concepto,obs from descuentos where liquiregular_id='".$id[0]."' and personal_id='".$mat_cabecera[$fila3][5]."'  " ;
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila4][0]=$query4['importe'];
			$mat_detalle2[$fila4][1]='Descuento - '.$query4['concepto'];	
			$mat_detalle2[$fila4][2]=$query4['concepto'];
			$mat_detalle2[$fila4][3]=$mat_cabecera[$fila3][5];
			$mat_cabecera[$fila3][7]=$mat_cabecera[$fila3][7]+$query4['importe'];	
			$total_egresos=$total_egresos+	$query4['importe'];					
			$fila4=$fila4+1;			
		}
		
		$query2="select * from ausencias where liquiregular_id='".$id[0]."' and personal_id='".$mat_cabecera[$fila3][5]."' and tipo='Injustificada'" ;
		//$res=mysql_query($query2,$con);
		//echo $query2.'<br>';
		//echo $fila4.'<br>';
		while($query4 = mysql_fetch_array($res) )
			{
				$mat_detalle2[$fila4][0]=intval($jornalxhora*$query4['cant_horas']);
				$mat_detalle2[$fila4][1]='Ausencia Injustificada';	
				$mat_detalle2[$fila4][2]='Ausencia Injustificada';
				$mat_detalle2[$fila4][3]=$mat_cabecera[$fila3][5];
				$mat_cabecera[$fila3][7]=$mat_cabecera[$fila3][7]+intval($jornalxhora*$query4['cant_horas']);	
				$total_egresos=$total_egresos+intval($jornalxhora*$query4['cant_horas']);					
				$fila4=$fila4+1;			
			}			
		
		
$query2="select * from liquidetalle where liquiregular_id='".$id[0]."'  and tipo='DESCUENTO' and concepto like'Ausencia injust.%'  " ;
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$mat_detalle2[$fila4][0]=$query4['importe'];
			$mat_detalle2[$fila4][1]='Descuento - '.$query4['concepto'];	
			$mat_detalle2[$fila4][2]=$query4['concepto'];
			$mat_detalle2[$fila4][3]=$mat_cabecera[$fila3][5];
			$mat_cabecera[$fila3][7]=$mat_cabecera[$fila3][7]+$query4['importe'];				
			$total_egresos=$total_egresos+$query4['importe'];					
			$fila4=$fila4+1;			
		}		
		//echo $total_pasajes.'<br>';			
	$query2="select id from prestamos where  personal_id='".$mat_cabecera[$fila3][5]."'  " ;
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$prestamo_id = $query4['id'];
			$query3="select monto,numero,Prestamos_id from cuotas where Prestamos_id='".$prestamo_id."' and estado='Pagado' and idliquidacion='".$id[0]."' " ;
//echo $query3."<br>";
	$res2=mysql_query($query3,$con);
	
	while($query5 = mysql_fetch_array($res2) )
		{
			$mat_detalle2[$fila4][0]=$query5['monto'];
			$mat_detalle2[$fila4][1]='Cuota '.$query5['numero'];	
			$mat_detalle2[$fila4][2]=$query5['Prestamos_id'];
			$mat_detalle2[$fila4][3]=$mat_cabecera[$fila3][5];
			$mat_cabecera[$fila3][7]=$mat_cabecera[$fila3][7]+$query5['monto'];	
			$total_egresos=$total_egresos+	$query5['monto'];					
			if(is_numeric($mat_detalle2[$fila4][2]))
			{
			$query3="select plazo,motivo from prestamos where id='".$mat_detalle2[$fila4][2]."' and personal_id='".$mat_cabecera[$fila3][5]."'  " ;
			//echo $query2."<br>";
			$res5=mysql_query($query3,$con);
			while($query5 = mysql_fetch_array($res5) )
				{
					$mat_detalle2[$fila4][1] =$mat_detalle2[$fila4][1]."/".$query5['plazo'];
				}
			
			}
			$fila4=$fila4+1;			
		}	
		
	}
	
// ******************************************************************************************
// ******************************************************************************************				
	$query2="select apellidos,nombres,jornalxhora,jornalxmin,nro_docum,id from personal where id='".$mat_cabecera[$fila3][5]."' " ;
	$res=mysql_query($query2,$con);

	while($query4 = mysql_fetch_array($res) )
		{
			$personal = $query4['apellidos'].", ".$query4['nombres'];
			//$jornalxhora = $query4['jornalxhora'];
			$jornalxmin= $query4['jornalxmin'];
			$nro_docum=$query4['nro_docum'];
			$mat_personal[$fila3][0]=$query4['apellidos'].", ".$query4['nombres'];
			$mat_personal[$fila3][1]=$query4['jornalxhora'];
			$mat_personal[$fila3][2]=$query4['jornalxmin'];
			$mat_personal[$fila3][3]=$query4['nro_docum'];
			$mat_personal[$fila3][4]=$query4['id'];
			
					//echo $mat_personal[$fila3][0]."<br>";	

		}
		
	
	;	
	
}	

				$pdf = new FPDF();
				$pdf->AddPage();

				class PDF extends FPDF
				{
					// Cabecera de página
					function Header()
					{
		
						$this->Image('images/logo2.png',10,8,33);
						// Arial bold 15
						$this->SetFont('Arial','B',12);
						// Movernos a la derecha
						$this->Cell(80);
						// Título
						$this->Cell(30,10,html_entity_decode("LIQUIDACION DE SALARIO"),0,0,'C');
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
			$pdf->SetFont('Times','',10);
			$pdf->SetFillColor(0,0,0);
		$contador_grupo=0;
		for($fila3=0;$fila3<count($mat_cabecera)-1;$fila3++)
		{
			$total_pasajes=0;
			//echo $total_pasajes.'<br>';
			if($contador_grupo==0)
			{
				$total_bobif=0;
				$pdf -> SetY(25);    // set the cursor at Y position 5
				$pdf -> SetX(10); 
				for($ii=0;$ii<count($mat_detalle);$ii++)
				{
					if($mat_detalle[$ii][3]==$mat_cabecera[$fila3][5])
					{
						$total_bobif=$total_bobif+$mat_detalle[$ii][0];
					}
				}
				$aux3=$mat_cabecera[$fila3][20];
				$total_bobif=$total_bobif+$total_a_pagar;
				for($ii=0;$ii<1;$ii++)
				{
					
						$pdf->Cell(40,7,"EMPLEADO/A",0,0 , 'L',false);
						$pdf->Cell(90,7,":  ".iconv('UTF-8', 'windows-1252',$mat_personal[$fila3][0]),0,1);
						//$pdf->Cell(40,10,html_entity_decode("Fecha de Emision"),0,0 , 'L',false);
						//$pdf->Cell(90,10,":  ".$mat_cabecera[0][0],0,1 , 'L',false);
						$pdf->Cell(40,7,"PERIODO DE PAGO",0,0 , 'L',false);		
						$pdf->Cell(30,7,":  ".$mat_cabecera[$fila3][1]."  -  ".$mat_cabecera[$fila3][2],0,1 , 'L',false);				
						//$pdf->Line(10, 60, 200, 60); // 20mm from each edge
						$pdf->Cell(40,7,"Pagos efectuados",0,1);
						$pdf->SetFillColor(184,180,180);
						$pdf->Cell(100,7,"Salario Basico",1,0 , 'L' );
						$pdf->Cell(40,7,number_format($aux3,'0',',','.'),1,1 , 'R' );
				
//***************************   INFRESOS - BONIFICACION ***********************************				
						$total_bobif=0;
						for($ii=0;$ii<count($mat_detalle);$ii++)
						{
						
							if($mat_detalle[$ii][3]==$mat_cabecera[$fila3][5])
							{
								if($mat_detalle[$ii][11]!=="PASAJE")
								{
									//$pdf->Cell(100,7,"Otros",1,0,false);
									$total_otros=$total_otros+$mat_detalle[$ii][0];
								}
								else
								{
									//$pdf->Cell(100,7,"Pasaje",1,0,false);
									$total_pasajes=$total_pasajes+$mat_detalle[$ii][0];
								}

					
								
								//$pdf->Cell(40,7,number_format($mat_detalle[$ii][0],'0',',','.'),1,1 , 'R' );
								$total_bobif=$total_bobif+$mat_detalle[$ii][0];
							}
						}
						$pdf->Cell(100,5,"Pasaje",1,0,false);
						$pdf->Cell(40,5,number_format($total_pasajes,'0',',','.'),1,1 , 'R' );
						$pdf->Cell(100,5,"Otros",1,0,false);
						$pdf->Cell(40,5,number_format($total_otros,'0',',','.'),1,1 , 'R' );
						$pdf->Cell(100,5,"Total",1,0 , 'L',false);
						$pdf->Cell(40,5,number_format($total_bobif+$aux3,'0',',','.'),1,1 , 'R',false);
						$total_pasajes=0;
						$total_otros=0;
				}		
						
//***************************   EGRESOS   *************************************************
						$pdf->Cell(30,7,"Descuentos efectuados",0,1);
						
						for($i=0;$i<count($mat_detalle2);$i++)
						{
							if($mat_detalle2[$i][3]==$mat_cabecera[$fila3][5])
								{
						$pdf->Cell(100,5,$mat_detalle2[$i][1],1,0);
						$pdf->Cell(40,5,number_format($mat_detalle2[$i][0],'0',',','.'),1,1 , 'R' );
								}
						}
						$pdf->Cell(100,5,"Total",1,0 , 'L',false);
						$pdf->Cell(40,5,number_format($mat_cabecera[$fila3][7],'0',',','.'),1,1 , 'R',false);
						//$total_a_pagar=($mat_cabecera[$fila3][3]+$aux3)-$mat_cabecera[$fila3][7];
						$total_a_pagar=($total_bobif+$aux3)-$mat_cabecera[$fila3][7];
						
						//$pdf->Ln();
						
						$pdf->Cell(100,5,"Saldo a cobrar",1,0 , 'L',false);
					
						$pdf->Cell(40,5,number_format($total_a_pagar,'0',',','.'),1,1 , 'R',false);
						$pdf->Ln(2);
						$nueva_fecha=date('d/m/Y');
						$pdf->Cell(40,5,"Fecha ".$nueva_fecha,0,1 , 'L',false);
						$pdf->Cell(40,5,"Recibi Conforme:",0,1 , 'L',false);
						for($ii=0;$ii<count($mat_personal);$ii++)
						{
							if($mat_personal[$ii][4]==$mat_cabecera[$fila3][5])
							{
								$pdf->Cell(180,5,iconv('UTF-8', 'windows-1252',$mat_personal[$ii][0]),0,1 , 'C',false);
								$pdf->Cell(180,5,'C.I.: '.$mat_personal[$ii][3],0,1 , 'C',false);
							}
						}
					
						$total_a_pagar=0;
						$total_bobif=0;
						$total_egresos=0;
						//$pdf->AddPage();
						$contador_grupo=$contador_grupo+1;
			}
			else// 2da liquidacion en la misma hoja
			{
				$total_bobif=0;
				$pdf -> SetY(135);    // set the cursor at Y position 5
				$pdf -> SetX(8); 
				//$pdf->Image('images/logo2.png',10,8,33);
				$pdf->MultiCell(40,10, $pdf->Image('images/logo2.png', $pdf->GetX()+2, $pdf->GetY()+3, 35) ,0,"L");
				$pdf -> SetX(10); 
				$pdf->Ln(2);
				for($ii=0;$ii<count($mat_detalle);$ii++)
				{
					if($mat_detalle[$ii][3]==$mat_cabecera[$fila3][5])
					{
						$total_bobif=$total_bobif+$mat_detalle[$ii][0];
					}
				}
				$aux3=$mat_cabecera[$fila3][20];
				$total_bobif=$total_bobif+$total_a_pagar;
				$pdf->Ln(10);
				for($ii=0;$ii<1;$ii++)
				{
					
						$pdf->Cell(40,7,"EMPLEADO/A",0,0 , 'L',false);
						$pdf->Cell(90,7,":  ".iconv('UTF-8', 'windows-1252',$mat_personal[$fila3][0]),0,1);
						//$pdf->Cell(40,10,html_entity_decode("Fecha de Emision"),0,0 , 'L',false);
						//$pdf->Cell(90,10,":  ".$mat_cabecera[0][0],0,1 , 'L',false);
						$pdf->Cell(40,7,"PERIODO DE PAGO",0,0 , 'L',false);		
						$pdf->Cell(30,7,":  ".$mat_cabecera[$fila3][1]."  -  ".$mat_cabecera[$fila3][2],0,1 , 'L',false);				
						//$pdf->Line(10, 60, 200, 60); // 20mm from each edge
						$pdf->Cell(40,7,"Pagos efectuados",0,1);
						$pdf->SetFillColor(184,180,180);
						$pdf->Cell(100,7,"Salario Basico",1,0 , 'L' );
						$pdf->Cell(40,7,number_format($aux3,'0',',','.'),1,1 , 'R' );
				
//***************************   INFRESOS - BONIFICACION ***********************************				
						$total_bobif=0;
						$total_pasajes=0;
						$total_otros=0;
						for($ii=0;$ii<count($mat_detalle);$ii++)
						{
						
							if($mat_detalle[$ii][3]==$mat_cabecera[$fila3][5])
							{
								if($mat_detalle[$ii][11]!=="PASAJE")
								{
									//$pdf->Cell(100,7,"Otros",1,0,false);
									$total_otros=$total_otros+$mat_detalle[$ii][0];
								}
								else
								{
									//$pdf->Cell(100,7,"Pasaje",1,0,false);
									$total_pasajes=$total_pasajes+$mat_detalle[$ii][0];
								}

					
								
								//$pdf->Cell(40,7,number_format($mat_detalle[$ii][0],'0',',','.'),1,1 , 'R' );
								$total_bobif=$total_bobif+$mat_detalle[$ii][0];
							}
						}
						$pdf->Cell(100,5,"Pasaje",1,0,false);
						$pdf->Cell(40,5,number_format($total_pasajes,'0',',','.'),1,1 , 'R' );
						$pdf->Cell(100,5,"Otros",1,0,false);
						$pdf->Cell(40,5,number_format($total_otros,'0',',','.'),1,1 , 'R' );
						$pdf->Cell(100,5,"Total",1,0 , 'L',false);
						$pdf->Cell(40,5,number_format($total_bobif+$aux3,'0',',','.'),1,1 , 'R',false);
						
						$total_otros=0;
				}		
						
//***************************   EGRESOS   *************************************************
						$pdf->Cell(30,7,"Descuentos efectuados",0,1);
						
						for($i=0;$i<count($mat_detalle2);$i++)
						{
							if($mat_detalle2[$i][3]==$mat_cabecera[$fila3][5])
								{
						$pdf->Cell(100,5,$mat_detalle2[$i][1],1,0);
						$pdf->Cell(40,5,number_format($mat_detalle2[$i][0],'0',',','.'),1,1 , 'R' );
								}
						}
						$pdf->Cell(100,5,"Total",1,0 , 'L',false);
						$pdf->Cell(40,5,number_format($mat_cabecera[$fila3][7],'0',',','.'),1,1 , 'R',false);
						//$total_a_pagar=($mat_cabecera[$fila3][3]+$aux3)-$mat_cabecera[$fila3][7];
						$total_a_pagar=($total_bobif+$aux3)-$mat_cabecera[$fila3][7];
						
						//$pdf->Ln();
						
						$pdf->Cell(100,5,"Saldo a cobrar",1,0 , 'L',false);
					
						$pdf->Cell(40,5,number_format($total_a_pagar,'0',',','.'),1,1 , 'R',false);
						$pdf->Ln(2);
						$nueva_fecha=date('d/m/Y');
						$pdf->Cell(40,5,"Fecha ".$nueva_fecha,0,1 , 'L',false);
						$pdf->Cell(40,5,"Recibi Conforme:",0,1 , 'L',false);
						for($ii=0;$ii<count($mat_personal);$ii++)
						{
							if($mat_personal[$ii][4]==$mat_cabecera[$fila3][5])
							{
								$pdf->Cell(180,5,iconv('UTF-8', 'windows-1252',$mat_personal[$ii][0]),0,1 , 'C',false);
								$pdf->Cell(180,5,'C.I.: '.$mat_personal[$ii][3],0,1 , 'C',false);
							}
						}
					
						$total_a_pagar=0;
						$total_bobif=0;
						$total_egresos=0;
						$pdf->AddPage();
						$contador_grupo=0;	
			}
		}
			
			$pdf->Output();
				



mysql_close($con);


?>