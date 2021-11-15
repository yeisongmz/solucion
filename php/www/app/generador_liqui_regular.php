 <?php session_start();
 include ("conexion/conectar.php");
 include ("ajuste_horas.php");
 include ("funct_restar_horas.php");
 $personal=explode(",", $_GET['personal']);
 $x=explode("-", $_GET['desde']);
 $desde=$x[2]."-".$x[1]."-".$x[0];
 $x=explode("-", $_GET['hasta']);
 
 $hasta=$x[2]."-".$x[1]."-".$x[0];
 $fecha_ips=$x[2]."-".$x[1]."-15";
 $opcion=$_GET['opcion'];
 $id_personal='';
 $id_liquidacion=0;
 $total_premios=0;
 $total_descuentos=0;
 $total_prestamos=0;
 $total_salario=0;
 $total_a_cobrar=0;
 $total_horas=0;
 $total_dias=0;
 $total_ausencias=0;
 $prestamo_id='';
 $bonificaciones=0;
 $adelantos=0;
 $concepto='';
 $importe_ausencias=0;
 $fila=0;
 $jornalxhora=0;
 $jornalxmin=0;
 $mat = array();
 $descuentos_mat =array();
 $bonificaciones_mat =array();
 $adelantos_mat =array();
 $importeIPS=0;
 $creador = $_SESSION["user"];
 $neto=null;
 //echo $personal[0]."<br>";
// echo $personal[1]."<br>";
// echo $desde."<br>";
// echo $hasta."<br>";
// echo $opcion."<br>";
	$query2="select id,jornalxhora,jornalxmin,aporta_ips,importeIPS from personal where apellidos='".$personal[1]."' and nombres ='".$personal[0]."' and estado = 1 " ;
	//echo $query2;
	$res=mysql_query($query2,$con);
	$aporta='n';
	while($query4 = mysql_fetch_array($res) )
		{
			$id_personal = $query4['id'];
			$jornalxhora = $query4['jornalxhora'];
			$jornalxmin = $query4['jornalxmin'];
			$aporta=$query4['aporta_ips'];
			$importeIPS= $query4['importeIPS'];
		}
if($aporta=='S')
{
	$importeIPS=($importeIPS*9)/100;
	$query2="select id,concepto from conceptos where concepto like'%IPS%' " ;
	$res=mysql_query($query2,$con);
	$concepto_id='';
	$concepto_desc='';
	while($query4 = mysql_fetch_array($res) )
		{
			$concepto_id=$query4['id'];
			$concepto_desc=$query4['concepto'];
		}
		$query2="INSERT INTO descuentos(personal_id,Conceptos_id,fecha,importe,concepto,creador)  VALUES('".$id_personal."','".$concepto_id."','".$fecha_ips."','".intval($importeIPS)."','".$concepto_desc."','".$creador."')";
		//echo $query2;
		$resultado = mysql_query($query2);	
}
		
		
		
//************ AUSENCIAS INJUSTIFICADAS

$query2="select fecha,cant_horas,motivo from ausencias where personal_id='".$id_personal."' and fecha>='".$desde."' and fecha<='".$hasta."' and (liquiregular_id is null or  liquiregular_id =0) and tipo='Injustificada' order by fecha asc " ;
	$res=mysql_query($query2,$con);
	$fila = 0;
	while($query4 = mysql_fetch_array($res) )
		{
			$importe_ausencias=$jornalxhora*$query4['cant_horas'];	
			$total_descuentos=$total_descuentos+intval($importe_ausencias);
			$descuentos_mat[$fila][0]=$importe_ausencias;
			$descuentos_mat[$fila][1]="Ausencia injust. ".$query4['cant_horas']."(hs)";
			$descuentos_mat[$fila][2]='Descuento';	
							
			$fila=$fila+1;			
		}
				
//*********** DESCUENTOS
	$query2="select fecha,importe,concepto,conceptos_id from descuentos where personal_id='".$id_personal."' and fecha>='".$desde."' and fecha<='".$hasta."' and (liquiregular_id is null or  liquiregular_id =0) order by fecha asc " ;
	$res=mysql_query($query2,$con);
	//$fila = 0;
	while($query4 = mysql_fetch_array($res) )
		{
			$total_descuentos=$total_descuentos+$query4['importe'];
			$descuentos_mat[$fila][0]=$query4['importe'];
			$descuentos_mat[$fila][1]=$query4['concepto'];	
			$descuentos_mat[$fila][2]='DESCUENTO';
			$descuentos_mat[$fila][3]=$query4['conceptos_id'];							
			$fila=$fila+1;			
		}

//*********** PRESTAMOS
	$query2="select id,idconcepto from prestamos where personal_id='".$id_personal."'  " ;
	$res=mysql_query($query2,$con);
	$fila=0;
	while($query4 = mysql_fetch_array($res) )
		{
			$prestamo_id = $query4['id'];
			$concepto  = $query4['idconcepto'];
			
			$query2="select monto,numero,fevtocuota from cuotas where Prestamos_id='".$prestamo_id."'  and fevtocuota>='".$desde."' and fevtocuota<='".$hasta."' and (idliquidacion=0 or idliquidacion is null)  order by numero asc " ;
		//echo "<br>".$query2."<br>";
		$res2=mysql_query($query2,$con);

	while($query4 = mysql_fetch_array($res2) )
		{
			$mat[$fila][0] = $query4['monto'];
			$total_prestamos=$total_prestamos+$query4['monto'];
			$mat[$fila][1] = $query4['numero'];
			$mat[$fila][2] = $query4['fevtocuota'];
			$mat[$fila][3] = 0;		
			$mat[$fila][4] = 'PRESTAMO';			
			$mat[$fila][5] = 'CUOTA '.$query4['numero'];	
			$mat[$fila][6] = $prestamo_id;	
						
			$fila = $fila+1;
		}		
		}
	
	
//*********** ASISTENCIAS
	//$query2="select SUM(hs_cantidad) AS total  from asistencia where personal_id='".$id_personal."' and fecha_asistencia>='".$desde."' and fecha_asistencia<='".$hasta."' GROUP BY personal_id " ;
	$query2="select *  from asistencia where personal_id='".$id_personal."' and fecha_asistencia>='".$desde."' and fecha_asistencia<='".$hasta."'  " ;

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
			$total_horas=number_format($total_horas,'2','.','')+number_format($h_trabajadas,'2','.','');
			$h_entrada=0;
			$h_salida=0;
			$h_trabajadas=0;
			$h_nocturnas=0;
		}
	
		$aux=$domingo_diurno*1.3;
		$aux=$aux*$jornalxhora;
		$aux2=$domingo_nocturno*1.3;
		$aux2=$aux2*$jornalxhora;
		echo $semana_diurna.'<br>';	
	echo $jornalxhora.'<br>';
	echo $semana_nocturna.'<br>';
	echo $jornalxhora.'<br>';
	echo $aux.'<br>';
	echo $aux2.'<br>';	
		$total_cobro_diario	=round((($semana_diurna)*$jornalxhora)+(($semana_nocturna)*$jornalxhora*1.3)+$aux+$aux2);
		echo $total_cobro_diario.'<br>';
		$neto=$total_cobro_diario;
//*********** BONIFICACIONES
	$query2="select importe,Conceptos_id,obs,concepto from bonificacion where personal_id='".$id_personal."' and fecha>='".$desde."' and fecha<='".$hasta."' and (liquiregular_id is null or  liquiregular_id =0) order by fecha asc " ;

	$res=mysql_query($query2,$con);
	$fila =0;
	$bonificaciones=0;
	while($query4 = mysql_fetch_array($res) )
		{
			$bonificaciones=$bonificaciones+$query4['importe'];
		    $bonificaciones_mat[$fila][0]=$query4['importe'];
			$bonificaciones_mat[$fila][1]=$query4['Conceptos_id'];
			$bonificaciones_mat[$fila][2]='BONIF.';						 
			$bonificaciones_mat[$fila][3]=$query4['obs'];
			$bonificaciones_mat[$fila][4]=$query4['concepto'];									 			
			$fila=$fila+1;
		}

//echo "<br> bonifi=".$bonificaciones."<br>";

//*********** ADELANTOS
	$query2="select importe,obs from adelantos where personal_id='".$id_personal."' and fecha>='".$desde."' and fecha<='".$hasta."'  and (liquiregular_id is null or  liquiregular_id =0)" ;
//echo $query2."<br>";
	$res=mysql_query($query2,$con);
	$fila =0;
	while($query4 = mysql_fetch_array($res) )
		{
			$adelantos=$adelantos+$query4['importe'];
			$adelantos_mat[$fila][0]=$query4['importe'];
			$adelantos_mat[$fila][1]="ADELANTOS";
			$adelantos_mat[$fila][2]=$query4['obs'];
			$fila=$fila+1;
		}


//******************** REGISTRO EN TABLA LIQUIREGULAR
		
	$fe_ultmodi = date('Y-m-d');	
	
	
		
		$y=$total_horas;//$jornalxhora*$x[0];
		echo $y.'<br>';
		echo $total_descuentos.' descuentos '.'<br>';
		echo $total_prestamos.' total_prestamos '.'<br>';
		echo $adelantos.' adelantos '.'<br>';
		$x2=$total_descuentos+$total_prestamos+$adelantos;
		echo $x2.'<br>';
		$total_a_cobrar =$total_cobro_diario+$bonificaciones;
		echo $total_a_cobrar.'<br>';
		$total_a_cobrar = $total_a_cobrar-$x2;
		echo $total_a_cobrar.'<br>';
		$query2="INSERT INTO liquiregular(personal_id,fecha,desde,hasta,totalPagar,canhorastraba,creador,fe_ultmodi,gsxhora,neto)  VALUES('".$id_personal."','".$fe_ultmodi."','".$desde."','".$hasta."','".intval($total_a_cobrar)."','".$total_horas."','".$creador."','".$fe_ultmodi."','".$jornalxhora."','$neto')";
		//echo $query2.'<br>';
		$resultado = mysql_query($query2);
	//******************** REGISTRO EN TABLA LIQUIREGULAR-DETALLES
	$query2="select id from liquiregular where personal_id='".$id_personal."' and fecha='".$fe_ultmodi."' and desde='".$desde."' and hasta='".$hasta."' and canhorastraba='".$total_horas."' and totalPagar='".intval($total_a_cobrar)."'  " ;
//echo $query2.'<br>';
	$res=mysql_query($query2,$con);
	
	while($query4 = mysql_fetch_array($res) )
		{
			$id_liquidacion=$query4['id'];
		}
		
			//************ PRESTAMOS *************
			for($i=0;$i<count($mat);$i++)
			{
				//echo $mat[$i][0]."<br>";
				$query2="INSERT INTO liquidetalle(Conceptos_id,LiquiRegular_id,importe,tipo,concepto,creador,fe_ultmodi)  VALUES('".$mat[$i][3]."','".$id_liquidacion."','".intval($mat[$i][0])."','".$mat[$i][4]."','".$mat[$i][5]."','".$creador."','".$fe_ultmodi."')";
				
		$resultado = mysql_query($query2);
		
				
			}
			//************ DESCUENTOS *************
			for($i=0;$i<count($descuentos_mat);$i++)
			{
				$query2="INSERT INTO liquidetalle(Conceptos_id,LiquiRegular_id,importe,tipo,concepto,creador,fe_ultmodi)  VALUES('".$descuentos_mat[$i][0]."','".$id_liquidacion."','".intval($descuentos_mat[$i][0])."','".$descuentos_mat[$i][2]."','".$descuentos_mat[$i][1]."','".$creador."','".$fe_ultmodi."')";
			//echo $query2.'<br>';
		$resultado = mysql_query($query2);
//		
//				
			}
//			//************ BONIFICACIONES *************
			for($i=0;$i<count($bonificaciones_mat);$i++)
			{
				$query2="INSERT INTO liquidetalle(Conceptos_id,LiquiRegular_id,importe,tipo,concepto,creador,fe_ultmodi)  VALUES('".$bonificaciones_mat[$i][1]."','".$id_liquidacion."','".intval($bonificaciones_mat[$i][0])."','".$bonificaciones_mat[$i][2]."','".$bonificaciones_mat[$i][4]."','".$creador."','".$fe_ultmodi."')";
//					echo $query2.'<br>';
		$resultado = mysql_query($query2);
//		
//				
			}	
//		//************ ADELANTOS *************
			for($i=0;$i<count($adelantos_mat);$i++)
			{
				$query2="INSERT INTO liquidetalle(Conceptos_id,LiquiRegular_id,importe,tipo,concepto,creador,fe_ultmodi)  VALUES('0','".$id_liquidacion."','".$adelantos_mat[$i][0]."','".intval($adelantos_mat[$i][1])."','".$adelantos_mat[$i][2]."','".$creador."','".$fe_ultmodi."')";
	//echo $query2.'<br>';		
		$resultado = mysql_query($query2);
//		
//				
			}						
////*************************************************************************************************			
////*************************************************************************************************			
////
////                             		ACTUALIZACIONES
////
////*************************************************************************************************			
////*************************************************************************************************	
//
////                                		CUOTAS		
for($i=0;$i<count($mat);$i++)
			{
		$query2="update cuotas set idliquidacion='".$id_liquidacion."',estado='Pagado' where  fevtocuota>='".$desde."' and fevtocuota<='".$hasta."' and  Prestamos_id='".$mat[$i][6]."' and (idliquidacion is null or  idliquidacion =0)";
		
		$resultado = mysql_query($query2);
			}
		
//										ADELANTOS		

		$query2="update adelantos set liquiregular_id='".$id_liquidacion."' where fecha >='".$desde."' and fecha<='".$hasta."' and personal_id='".$id_personal."' and (liquiregular_id is null or  liquiregular_id =0)";
		$resultado = mysql_query($query2);		
		//echo $query2."<br>";
//										BONIFICACION		

		$query2="update bonificacion set liquiregular_id='".$id_liquidacion."' where fecha >='".$desde."' and fecha<='".$hasta."' and personal_id='".$id_personal."' and (liquiregular_id is null or  liquiregular_id =0)";
		$resultado = mysql_query($query2);		
				
//										DESCUENTOS		

		$query2="update descuentos set liquiregular_id='".$id_liquidacion."' where fecha >='".$desde."' and fecha<='".$hasta."' and personal_id='".$id_personal."' and (liquiregular_id is null or  liquiregular_id =0)";
		//echo $query2;
		$resultado = mysql_query($query2);
		
//										AUSENCIAS INJUSTIFICADAS		

		$query2="update ausencias set liquiregular_id='".$id_liquidacion."' where fecha >='".$desde."' and fecha<='".$hasta."' and personal_id='".$id_personal."' and (liquiregular_id is null or  liquiregular_id =0) and tipo='Injustificada' ";
		$resultado = mysql_query($query2);				
//		
//		
		mysql_close($con);									
echo '<script type="text/javascript" language="javascript">window.location.replace("busca_liquidaciones_regulares.php");</script>'; 									
?>